jQuery(function ($) {
    $('.alert-custom-msg-block').animate({opacity: 1.0}, 5000).fadeOut();

    try {
        ace.settings.loadState('main-container')
    } catch (e) {
    }

    try {
        ace.settings.loadState('sidebar')
    } catch (e) {
    }
});


