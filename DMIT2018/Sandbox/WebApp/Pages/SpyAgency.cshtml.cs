using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Backend.BLL;
using Backend.Models.SpyAgency;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;
using Nager.Country;

namespace WebApp.Pages
{
    public class SpyAgencyModel : PageModel
    {
        private readonly AboutService _service;
        public SpyAgencyModel(AboutService service)
        {
            _service = service;
        }

        public List<Region> WorldRegions { get; set; }
        public List<SubRegion> SubRegions { get; set; }
        public List<ICountryInfo> Countries { get; set; }

        public List<Assignment> Assignments
        {
            get
            {
                var values =
                    System.Enum.GetValues<Assignment>();
                return new List<Assignment>(values);
            }
        }

        [BindProperty(SupportsGet = true)]
        public string RegionName { get; set; }

        [BindProperty(SupportsGet = true)]
        public SubRegion SubRegionName { get; set; }

        [BindProperty(SupportsGet = true)]
        public string CountryName { get; set; }

        [BindProperty(SupportsGet = true)]
        public List<AgentAssignment> AgentAssignments { get; set; } = new List<AgentAssignment>(); // Ensure an empty list
        [BindProperty(SupportsGet = true)]
        public AgentAssignment NewlyAssignedAgent { get; set; }
        [BindProperty]
        public string AgentToRemove { get; set; }
        public string WarningMessage { get; set; }
        public string FeedbackMessage { get; set; }

        public void OnGet()
        {
            PopulateDropDownData();
            if (!string.IsNullOrEmpty(CountryName))
                AgentAssignments = _service.LocateAgents(CountryName);
        }

        private void PopulateDropDownData()
        {
            WorldRegions = _service.ListWorldRegions();
            SubRegions = _service.GetSubRegions(RegionName);
            Countries = SubRegionName == SubRegion.None ? new List<ICountryInfo>() : _service.GetCountries(SubRegionName);
        }

        public IActionResult OnPost()
        {
            // General handling of navigation
            // selecting a region/subregion/country
            return RedirectToPage(new { RegionName = RegionName, SubRegionName = SubRegionName, CountryName = CountryName });
        }

        public IActionResult OnPostChangeRegion()
        {
            // General handling of navigation
            // selecting a region/subregion/country
            return RedirectToPage
            (new { 
                RegionName = RegionName, 
                SubRegionName = (string)null, 
                CountryName = (string)null
            });
        }

        public IActionResult OnPostChangeSubRegion()
        {
            // General handling of navigation
            // selecting a region/subregion/country
            return RedirectToPage
            (new
            {
                RegionName = RegionName,
                SubRegionName = SubRegionName,
                CountryName = (string)null
            });
        }

        public IActionResult OnPostChangeCountry()
        {
            // General handling of navigation
            // selecting a region/subregion/country
            return RedirectToPage
            (new
            {
                RegionName = RegionName,
                SubRegionName = SubRegionName,
                CountryName = CountryName
            });
        }

        public void OnPostAddAgent()
        {
            // Minimal UI Validation
            if (AgentAssignments.Any(agent => agent.CodeName == NewlyAssignedAgent.CodeName))
                WarningMessage = "You cannot add duplicate agents";
            else
                // UI Processing
                AgentAssignments.Add(NewlyAssignedAgent);

            PopulateDropDownData();
        }

        public void OnPostRemoveAgent()
        {
            var agent = AgentAssignments.FirstOrDefault(person => person.CodeName == AgentToRemove);
            if (agent != null)
                AgentAssignments.Remove(agent);
            else
                WarningMessage = $"Hmm, for some reason, {AgentToRemove} is already gone.";
            
        }

        public IActionResult OnPostAssignAgents()
        {
            try
            {
                _service.DeployAgents(CountryName, AgentAssignments);
                FeedbackMessage = $"Agents have been deployed to {CountryName}";
                return RedirectToPage(new { RegionName = "", SubRegion = "", CountryName = "" });
            }
            catch (Exception ex)
            {
                WarningMessage = ex.Message;
                return Page(); 
                // Page(); preserves the user's input in the event the error occurs so that they may correct any input
            }
        }

        public IActionResult OnPostClearForm()
        {
            return RedirectToPage(new { RegionName = "", SubRegion = "", CountryName = "" });
        }
    }
}
