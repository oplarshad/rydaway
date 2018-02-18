// Handles the script for loading the mobile menu

jQuery(document).ready(function($) {

	$(document).ready(function() {
						
		var menuOpen = false;
		var searchOpen = false;
		
		function openMenu() {
			document.getElementById('mobile-menu-button').style.backgroundColor = '#f8f8f8';
			document.getElementById('mobile-menu-button-icon').style.color = '#0fb8ad';
			document.getElementById('main-nav').style.display = 'block';
			document.getElementById('masthead').style.background = '#1a348b';
			menuOpen = true;
		}
		
		function closeMenu() {
			document.getElementById('mobile-menu-button').style.backgroundColor = 'transparent';
			document.getElementById('mobile-menu-button-icon').style.color = '#fff';
			document.getElementById('main-nav').style.display = 'none';
			document.getElementById('masthead').style.background = 'linear-gradient(141deg, #0fb8ad 0%, #1fc8db 51%, #2cb5e8 75%)';
			menuOpen = false;
		}
		
		function openSearch() {
			document.getElementById('mobile-menu-search').style.backgroundColor = '#f8f8f8';
			document.getElementById('mobile-menu-search-icon').style.color = '#0fb8ad';
			document.getElementById('mobile-search-bar').style.display = 'block';
			searchOpen = true;
		}
		
		function closeSearch() {
			document.getElementById('mobile-menu-search').style.backgroundColor = 'transparent';
			document.getElementById('mobile-menu-search-icon').style.color = '#fff';
			document.getElementById('mobile-search-bar').style.display = 'none';
			searchOpen = false;
		}
		
		function resetHeader() {
			document.getElementById('main-nav').style.display = 'block';
		}
		
		// Mobile Search Bar Logic
		$(document).ready(function(){
						var originalSearchQuery = document.getElementById("mobileSearchInput").value;
					    $("#searchBarHeader").focusout(function(){
					        if (document.getElementById("mobileSearchInput").value != originalSearchQuery) {
						        // Submit the search
						        document.getElementById('mainSearchForm').submit();
					        }
					    });
					});
		
		// Clickable Logic
	    $('#mobile-menu-button').on('click', function() {
		    if (!menuOpen) {
			    openMenu()
			    closeSearch()
		    }
		    else { // The menu is already open. Close it.
			    closeMenu()
		    }
	    });
	    
	    $('#mobile-menu-search').on('click', function() {
		    if (!searchOpen) { // The search is not open, open it.
			    openSearch()
			    closeMenu()
		    }
		    else { // The search is already open. Close it.
			    closeSearch()
		    }
	    });
		
		// Resizing Logic
		 $(window).resize(function() {
			 if ($(window).width() > 768) {
			 	resetHeader()
			 }
			 if ($(window).width() < 768) {
			 	closeMenu()
			 }
			});
	});

});
