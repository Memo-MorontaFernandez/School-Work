using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Backend.Models;
using Backend.BLL;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;

namespace WebApp.Pages.Admin
{
    public class ManageCapstoneStudentsModel : PageModel
    {
        #region Constructor Dependencies
        private readonly CapstoneService _service;
        public ManageCapstoneStudentsModel(CapstoneService service)
        {
            _service = service;
        }
        #endregion

        public List<StudentName> AllStudents { get; set; }
        public string ErrorMessage { get; set; }

        [BindProperty(SupportsGet = true)] // for post and get requests (get through the routing parameter)
        public int? SelectedStudent { get; set; }
        [BindProperty] // For Post requests
        public Student CurrentStudent { get; set; }

        [TempData]
        public string FeedbackMessage { get; set; }

        public void OnGet()
        {
            AllStudents = _service.ListCapstoneStudents();
            if (SelectedStudent.HasValue)
            {
                // Lookup and display the student information
                CurrentStudent = _service.LookupStudent(SelectedStudent.Value);
            }
        }

        public IActionResult OnPost()
        {
            return RedirectToPage(new { SelectedStudent });
        }

        public IActionResult OnPostAdd()
        {
            try
            {
                int newId = _service.AddStudent(CurrentStudent);
                FeedbackMessage = $"Successfully added {CurrentStudent.FirstName} to the list of Capstone Students.";
                return RedirectToPage(new { SelectedStudent = newId }); // Needs to match my routing parameter name (which also matches the bindproperty)
            }
            catch (Exception ex)
            {
                Exception innermost = ex;
                while (innermost.InnerException != null)
                    innermost = innermost.InnerException;
                ErrorMessage = innermost.Message;
                AllStudents = _service.ListCapstoneStudents();
                return Page();
            }
        }

        public IActionResult OnPostUpdate()
        {
            throw new NotImplementedException();
        }

        public IActionResult OnPostDelete()
        {
            throw new NotImplementedException();
        }

        public IActionResult OnPostClear()
        {
            return RedirectToPage(new { SelectedStudent = (int?)null });
        }
    }
}
