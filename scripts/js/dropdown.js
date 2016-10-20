$(document).ready(function() {
    jQuery('ul.nav li.dropdown').hover(function() {
              jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(250);
            }, function() {
              jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(250);
            });
})