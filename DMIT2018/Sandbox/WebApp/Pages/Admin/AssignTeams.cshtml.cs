using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Backend.BLL;
using Backend.Models.Queries;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;

namespace WebApp.Pages.Admin
{
    public class AssignTeamsModel : PageModel
    {
        private readonly CapstoneService _service;
        public AssignTeamsModel(CapstoneService service)
        {
            _service = service;
        }

        public List<ClientInfo> Clients { get; set; }
        [BindProperty] // Model binding that will happen on the post request
        public List<StudentTeamAssignment> Students { get; set; }

        [TempData] // Is stored in a temporary "cookie" on the page
        public string Feedback { get; set; }
        public string ErrorMessage { get; set; }
        public List<string> ErrorDetails { get; set; } = new(); // Empty List

        public void OnGet()
        {
            Clients = _service.ListConfirmedClients();
            Students = _service.ListTeamAssignments();
        }

        public IActionResult OnPost()
        {
            try
            {
                // Send data to BLL for proccessing 
                _service.ModifyTeamAssignments(Students);
                // TODO: Do a post redirect get
                Feedback = "Students assigned to teams.";
                return RedirectToPage(); // Redirect to the current page
            }
            catch (AggregateException ex)
            {
                Clients = _service.ListConfirmedClients(); // for the drop downs
                ErrorMessage = ex.Message;
                foreach (var detail in ex.InnerExceptions) // notice the plural
                    ErrorDetails.Add(detail.Message);
                return Page();
            }
            catch (Exception ex)
            {
                // TODO: Show error message(s)
                // TODO: stay on the current page
                Clients = _service.ListConfirmedClients(); // for the drop-downs
                ErrorMessage = ex.Message;
                return Page();
            }
        }
    }
}
