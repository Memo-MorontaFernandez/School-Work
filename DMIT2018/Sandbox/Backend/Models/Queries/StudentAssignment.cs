using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Backend.Models.Queries
{
    public record StudentTeamAssignment(int StudentId, string FullName, int? ClientId, string TeamLetter)
    { 
        public StudentTeamAssignment() : this(0, null, null, null) { }    
    }
    
    public class StudentAssignment
    {
        public string LastName { get; set; }
        public string FirstName { get; set; }
        public Team Assignment { get; set; }
    }
}
