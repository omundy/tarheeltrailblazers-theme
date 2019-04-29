$ = jQuery.noConflict();


$(document).ready(function() {



	$(".headerOpenSearch").on("click", function() {
		if ($(".headerSearchDiv").css("display") == "none") {
			$(".headerSearchDiv").css("display", "block");
			$(".headerSearchDiv input").focus();
		} else
			$(".headerSearchDiv").css("display", "none");
		event.preventDefault();
	});
	$(".headerCloseSearch").on("click", function() {
		hideHeaderSearch();
	});
	// click outside of the form
	$(document).on("click", function(e) {
		//console.log(e.target);
		if (!$(e.target).hasClass('headerSearchIcon') && !$(e.target).hasClass('headerOpenSearch') &&
			!$(e.target).hasClass('header-search-btn') && !$(e.target).hasClass('headerSearchForm') &&
			!$(e.target).hasClass('headerSearchFormInput')) {
			hideHeaderSearch();
		}
	});

	function showHeaderSearch() {}

	function hideHeaderSearch() {
		$(".headerSearchDiv").fadeOut("2000");
	}



	// add dropdown toggle to submenu on mobile
	$('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
		// Avoid following the href location when clicking
		event.preventDefault();
		// Avoid having the menu to close when clicking
		event.stopPropagation();
		// If a menu is already open we close it
		$('ul.dropdown-menu [data-toggle=dropdown]').parent().removeClass('open');
		// opening the one you clicked on
		$(this).parent().addClass('open');
	});


});
