jQuery(document).ready(function($) {
    $('a[href^="#"]').click(function(e) {
        e.preventDefault();
        var target = $(this).attr('href');
        $('html, body').animate({
            scrollTop: $(target).offset().top
        }, 800); // Adjust the duration (in milliseconds) to your desired value
    });
});
