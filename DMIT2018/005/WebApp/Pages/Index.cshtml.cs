﻿using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;
using Microsoft.Extensions.Logging;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using WebApp.Data;

namespace WebApp.Pages
{
    public class IndexModel : PageModel
    {
        private readonly ILogger<IndexModel> _logger;

        public IndexModel(ILogger<IndexModel> logger)
        {
            _logger = logger;
        }

        // This property will receive the value(s) from the form when a POST request is generated
        [BindProperty] // This attribute allows the ASP.NET to store the post data into this property
        public Translation PopularPhrase { get; set; }

        // TEMP: In leu of a database, we will use a static List<t> to store the translations
        public static List<Translation> TravelAid { get; set; } = new(); // C# 9 - simplified way of instantiating

        public void OnGet()
        { 
            // This runs when the request method is a GET
        }

        public IActionResult OnPost()
        {
            // This runs when the request method is a POST
            TravelAid.Add(PopularPhrase); // "store" the information inserted by the user
            // A class is a blueprint of what an object will look like (properties/fields)
            // and how it will behave (constructor/methods)
            // Post-Redirect-Get Pattern will be used so information is not lost on page refresh
            return RedirectToPage();
        }
    }
}
