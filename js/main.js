$ = jQuery.noConflict();


$(document).ready(function() {


	/**
	 *	Show / hide header search field
	 */
	$(document).on("click", ".headerOpenSearch", function(e) {
		if ($(".headerSearchDiv").css("display") == "none") {
			$(".headerSearchDiv").css("display", "block");
			$(".headerSearchDiv input").focus();
		} else
			$(".headerSearchDiv").css("display", "none");
		e.preventDefault();
	});
	$(document).on("click", ".headerCloseSearch", function() {
		fadeHeaderSearch();
	});
	// click outside of the form
	$(document).on("click", function(e) {
		//console.log(e.target);
		if (!$(e.target).hasClass('headerSearchIcon') && !$(e.target).hasClass('headerOpenSearch') &&
			!$(e.target).hasClass('header-search-btn') && !$(e.target).hasClass('headerSearchForm') &&
			!$(e.target).hasClass('headerSearchFormInput')) {
			fadeHeaderSearch();
		}
	});
	// fade search box 
	function fadeHeaderSearch() {
		$(".headerSearchDiv").fadeOut("2000");
	}



	// add dropdown toggle to submenu on mobile
	$('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(e) {
		// Avoid following the href location when clicking
		e.preventDefault();
		// Avoid having the menu to close when clicking
		e.stopPropagation();
		// If a menu is already open we close it
		$('ul.dropdown-menu [data-toggle=dropdown]').parent().removeClass('open');
		// opening the one you clicked on
		$(this).parent().addClass('open');
	});




    // run all bootstrap tooltips
    // $('[data-toggle="tooltip"]').tooltip()
    $("body").tooltip({ selector: '[data-toggle=tooltip]' });


});
