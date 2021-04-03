/* SET DROPDOWN FOR MENU */
var set_dropdown_menu = function () {

    var navLi = jQuery('.navbar-nav li');

    navLi.each(function(){
        if ( jQuery(this).find('ul').length > 0 && !jQuery(this).hasClass('dropdown') ){
            jQuery(this).addClass('dropdown');
            var item = jQuery(this).find('a').first();
            item.addClass('dropdown-toggle');
            item.addClass('menu-nav');
            item.attr('data-toggle', 'dropdown');
            item.attr('role', 'button');
            item.attr('aria-haspopup', 'true');
            item.attr('aria-expanded', 'false');
            item.append('<span class="caret"></span>');
            jQuery(this).find('ul').addClass('dropdown-menu');
        }
    });
};
jQuery(document).ready(set_dropdown_menu);

$(document).ready(function(){
    $('.dropdown a.menu-nav').on("click", function(e){
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });
});