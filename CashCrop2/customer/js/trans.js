jQuery('.panel-heading a').click(function() {
    $('.panel-heading a').find('i').removeClass('fa-minus'); // Hides the minus sign on click
    $(this).find('i').addClass('fa-plus fa-minus'); // add this line
    jQuery('').removeClass('active');
    jQuery('').slideUp('normal');

    if(jQuery(this).next().is(':hidden') == true) {
        jQuery(this).addClass('active');
        jQuery(this).next().slideDown('normal');
    }

});

jQuery('.accordion_content').hide();