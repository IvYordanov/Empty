$(document).ready(function () {	
	$('.sub-menu').prev('a').append('<span class="indicator"></span>');
	
	$('#main-menu li:has(.sub-menu)').hover(function () {
		$(this).find('a .indicator').addClass('hover-indicator');
        $(this).find('ul:first').slideDown('fast').addClass('active');	
    }, function () {
		$(this).find('a .hover-indicator').removeClass('hover-indicator');
        $(this).children('ul.active').slideUp('fast').removeClass('active');	
    });
});