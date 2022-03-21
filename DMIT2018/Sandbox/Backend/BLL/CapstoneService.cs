using Backend.DAL;
using Backend.Entities;
using Backend.Models.Queries;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Backend.BLL
{
    public class CapstoneService
    {
        #region Constructor and Dependencies
        private readonly CapstoneContext _context;
        internal CapstoneService(CapstoneContext context)
        {
            _context = context;
        }
        #endregion

        #region A loose representation of CQRS - Command/Query Responsibility Segregation
        #region Queries (reading the database)
        public List<StudentAssignment> ListStudentAssignments(string partialStudentName, int pageNumber, int pageSize, out int totalRows)
        {
            totalRows = _context.Students.Count();
            var result = // List all the students and their capstone assignments.
                            from person in _context.Students
                            where string.IsNullOrEmpty(partialStudentName)
                                || person.FirstName.Contains(partialStudentName)
                                || person.LastName.Contains(partialStudentName)
                            orderby person.LastName, person.FirstName, person.SchoolId
                            select new StudentAssignment
                            {
                                LastName = person.LastName,
                                FirstName = person.FirstName,
                                Assignment = (from team in person.TeamAssignments
                                              select new Team
                                              {
                                                  Number = team.TeamNumber,
                                                  Client = team.Client.CompanyName,
                                                  IsConfirmed = team.Client.Confirmed
                                              }).SingleOrDefault()
                            };
            int skipRows = (pageNumber - 1) * pageSize; // page 1 = skip 0 rows, page 2 = skip pageSize
            var finalResult = result.Skip(skipRows).Take(pageSize).ToList(); // Single 'page'
            totalRows = result.Count(); // total # of rows of the result
            return finalResult;
        }
        
        public List<ClientInfo> ListConfirmedClients()
        {
            var result = from company in _context.CapstoneClients
                         where company.Confirmed
                         select new ClientInfo
                         {
                             ClientId = company.Id,
                             Company = company.CompanyName
                         };
            return result.ToList();
        }

        public List<StudentTeamAssignment> ListTeamAssignments()
        {
            var result = from person in _context.Students
                         select new StudentTeamAssignment
                         {
                             StudentId = person.StudentId,
                             FullName = $"{person.FirstName} {person.LastName}",
                             ClientId = person.TeamAssignments.Any() ? person.TeamAssignments.First().ClientId : null,
                             TeamLetter = person.TeamAssignments.Any() ? person.TeamAssignments.First().TeamNumber : null
                         };
            return result.ToList();
        }
        #endregion

        #region Commands (modifying the database)
        private void CheckForDuplicateStudents(List<StudentTeamAssignment> assignments, List<Exception> errors)
        {
            // TODO: Add this extra validation for duplicate students
            var duplicates = assignments.GroupBy(x => x.StudentId).Where(x => x.Count() > 1);
            if (duplicates.Any())
                foreach (var person in duplicates)
                {
                    var students = _context.Students.Find(person.Key);
                    errors.Add(new Exception($"The student {students.FirstName} {students.LastName} has been duplicated"));
                }
        }

        private void CheckForTeamLetterWithoutClient(IEnumerable<IGrouping<GroupingKey, StudentTeamAssignment>> teams, List<Exception> errors)
        {
            // - (xtra) no team withs a null client and a team letter ??
            if (teams.Any(team => !team.Key.ClientId.HasValue && !string.IsNullOrWhiteSpace(team.Key.TeamLetter)))
                errors.Add( new Exception("At least one student is assigned a team letter without a client"));

        }

        private void CheckMinimumTeamSize(IEnumerable<IGrouping<GroupingKey, StudentTeamAssignment>> teams, List<Exception> errors)
        {
                // smallest team is four students
            if (teams.Where(team => team.Key.ClientId.HasValue)
                //filter out the "no team" group, so that I only regard
                .Any(team => team.Count() < 4))
                errors.Add(new Exception("You cannot have any team with less than 4 students"));
        }

        private void CheckMaximumTeamSize(IEnumerable<IGrouping<GroupingKey, StudentTeamAssignment>> teams, List<Exception> errors)
        {
                // largest team is seven students
            if (teams.Where(team => team.Key.ClientId.HasValue)
                //filter out the "no team" group, so that I only regard
                .Any(team => team.Count() > 7))
                errors.Add(new Exception("You cannot have any team with more than 7 students"));
        }

        void CheckTeamLetters(IEnumerable<IGrouping<GroupingKey, StudentTeamAssignment>> teams, List<Exception> errors)
        {
            // TODO: - (3) Clients with more than seven students must be broken into separate teams, each with a team letter (starting with 'A').
            const string Letters = "ABCDEFG";
            var unassigned = new GroupingKey();
            var shortlist = teams.Where(team => team.Key != unassigned && team.Count() > 7);
            if (shortlist.Any(x => string.IsNullOrWhiteSpace(x.Key.TeamLetter)))
                errors.Add(new Exception("One or more team groups exist without an assigned team letter"));
            GroupingKey lastTeam = null;
            int teamLetterIndex = 0;
            foreach (var team in shortlist)
            {
                // prep values used for testing expectations
                if (lastTeam == null)
                    lastTeam = team.Key;
                if (lastTeam.ClientId != team.Key.ClientId)
                    teamLetterIndex = 0;
                if (team.Key.TeamLetter != Letters[teamLetterIndex].ToString())
                    errors.Add(new Exception($"Client {team.Key.ClientId} has a team letter of {team.Key.TeamLetter}, " +
                        $"but a team letter of '{Letters[teamLetterIndex]}' was expected."));
                if (team.Count() > 7)
                    errors.Add(new Exception($"The team {team.Key} has {team.Count()} members, but the max team size is {7}"));
                // prep for the next time around the loop
                teamLetterIndex++;
                lastTeam = team.Key;
            }
        }

        private void CheckClientsAreConfirmed(IEnumerable<IGrouping<GroupingKey, StudentTeamAssignment>> teams, List<Exception> errors)
        {
            // TODO: - (4) Only assign students to clients that have been confirmed as participating
            var unassigned = new GroupingKey();
            var shortlist = teams.Where(team => team.Key != unassigned);
            foreach(var team in teams)
            {
                var found = _context.CapstoneClients.Find(team.Key.ClientId);
                if (found == null)
                    errors.Add(new Exception($"The client with an id of {team.Key.ClientId} does not exist"));
                else if (!found.Confirmed)
                    errors.Add(new Exception($"The client {found.CompanyName} has not been confirmed for this semester"));
            }
        }

        private record GroupingKey(int? ClientId, string TeamLetter) 
        {
            public GroupingKey() : this(null, null) { }
        }


        public void ModifyTeamAssignments(List<StudentTeamAssignment> assignments)
        {
            // TEST: write an automation test
            // Validation
            // a - make sure we have data - This is a 'full-stop' exception
            if (assignments is null || assignments.Count == 0)
                throw new ArgumentNullException(nameof(assignments), "You must supply student assignments to modify the current team rosters");

            // b - enforce the business rules - Distinct problems with the data - Gather the problem as a 'set' of exceptions
            List<Exception> errors = new(); // Empty list of problems with the data

            IEnumerable<IGrouping<GroupingKey, StudentTeamAssignment>> teams =
                assignments.GroupBy(member => new GroupingKey { ClientId = member.ClientId, TeamLetter = member.TeamLetter })
                           .OrderBy(group => group.Key.ClientId)
                           .ThenBy(group => group.Key.TeamLetter);

            CheckForDuplicateStudents(assignments, errors);

            CheckForTeamLetterWithoutClient(teams, errors);
     
            CheckMinimumTeamSize(teams, errors);
            
            CheckMaximumTeamSize(teams, errors);

            CheckTeamLetters(teams, errors);

            CheckClientsAreConfirmed(teams, errors);

            if (errors.Any()) // Are there any business rule violations?
                throw new AggregateException("The follow business rules were violated...", errors);

            // 1)   Process the team assignments as a SINGLE transaction
            //      - The list of StudentTeamAssignments represents the current assignment for each student.
            //      - Since this may be a change in an assigned client or team letter, we need to think about
            //      - how this affect the database tables in terms of Insert/Updates/Deletes
            foreach(var change in assignments)
            {
                var existing = _context.TeamAssignments.SingleOrDefault(x => x.StudentId == change.StudentId);
                if(existing is null)
                    // We only have to add this student
                    if (change.ClientId.HasValue) // as long as the student is assigned to a client
                    {
                        _context.TeamAssignments.Add(new TeamAssignment
                        {
                            StudentId = change.StudentId,
                            ClientId = change.ClientId.Value,
                            TeamNumber = change.TeamLetter
                        });
                    }
                else
                    {
                        if (existing.ClientId != change.ClientId)
                        {
                            // remove the team assignment
                            _context.TeamAssignments.Remove(existing);
                            if (change.ClientId.HasValue) // as long as the student is assigned to a client
                            {
                                _context.TeamAssignments.Add(new TeamAssignment
                                {
                                    StudentId = change.StudentId,
                                    ClientId = change.ClientId.Value,
                                    TeamNumber = change.TeamLetter
                                });
                            }
                        }
                        // or if the client is the same and the team letter has changed (result in an update)
                        else // client ids match
                        {
                            if (existing.TeamNumber != change.TeamLetter)
                            {
                                existing.TeamNumber = change.TeamLetter;
                            }
                        }
                    }
                    // determine if the client has changed (results in a delete followed by an insert of the new information)
                    // or if the client is the same and the team letter has changed (results in an update of the information)
            }

            // ... after all our processing of the data, we do a single call to .savechanges()
            _context.SaveChanges();
        }


        #endregion
        #endregion

        #region CRUD behaviour for Student Information
        public List<Backend.Models.StudentName> ListCapstoneStudents()
        {
            var result = _context.Students.Select(person => new Backend.Models.StudentName
            {
                StudentId = person.StudentId,
                FormalName = $"{person.LastName}, {person.FirstName}"
            });
            return result.ToList();
        }

        /// <summary>
        /// Finds a <see cref="Models.Student" /> from a given database PK value
        /// </summary>
        /// <param name="studentIdPk">The Primary key for the entity (not to be confused with the school id</param>
        /// <returns><see cref="Models.Student"/>Instance or <code>null</code>if no information found in the database</returns>
        public Models.Student LookupStudent(int value)
        {
            // Remember to map our database entity results from the lookup to our view model type
            Models.Student result = null;
            var found = _context.Students.Find(value);
            if (found != null)
                result = new(found.SchoolId, found.FirstName, found.LastName);
            return result;
        }

        public int AddStudent(Backend.Models.Student student)
        {
            // Validation of no duplicates
            if (_context.Students.Any(person => person.SchoolId == student.ID))
                throw new ArgumentOutOfRangeException(nameof(student.ID), "A student already exists with that school id");

            Student newData = new() // Entity Studet, NOT Model Student
            {
                // Transferring the data from our public model to the internal entity type
                SchoolId = student.ID,
                FirstName = student.FirstName,
                LastName = student.LastName
            };
            _context.Students.Add(newData);
            _context.SaveChanges(); // This is where the Transaction processing occurs

            return newData.StudentId;

        }

        public void UpdateStudent(int studentId, Backend.Models.Student student)
        {
            // Validation of no duplicates
            if (_context.Students.Any(person => person.SchoolId == student.ID && person.StudentId != studentId))
                throw new ArgumentOutOfRangeException(nameof(student.ID), $"Another student already exists with that school id; correct that student before reassigning the {student.ID} to this student");
            // Update
            var existing = _context.Students.Find(studentId);
            if (existing is null)
                throw new ArgumentException("Could not find the specified student", nameof(studentId));

            existing.FirstName = student.FirstName;
            existing.LastName = student.LastName;
            existing.SchoolId = student.ID;
            _context.SaveChanges();
        }

        public void DeleteStudent(int studentId)
        {
            var existing = _context.Students.Find(studentId);
            if (existing is null)
                throw new ArgumentException("Could not find the specified student", nameof(studentId));
            _context.Students.Remove(existing);
            _context.SaveChanges();
        }

        #endregion

    }
}
