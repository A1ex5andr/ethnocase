$(document).ready(function() {

    // // make navigation fixed if scrolled over 56px top
    // var nav = $('#navigation');
    // $(window).scroll(function() {
    //     if ($(this).scrollTop() > 56) {
    //         nav.addClass("f-nav");
    //     } else {
    //         nav.removeClass("f-nav");
    //     }
    // });

    // MAIN MENU
    var navigation = responsiveNav(".nav-collapse", {
        animate: true, // Boolean: Use CSS3 transitions, true or false
        transition: 160, // Integer: Speed of the transition, in milliseconds
        label: "Menu", // String: Label for the navigation toggle
        insert: "before", // String: Insert the toggle before or after the navigation
        customToggle: "", // Selector: Specify the ID of a custom toggle
        closeOnNavClick: true, // Boolean: Close the navigation when one of the links are clicked
        openPos: "relative", // String: Position of the opened nav, relative or static
        navClass: "nav-collapse", // String: Default CSS class. If changed, you need to edit the CSS too!
        navActiveClass: "js-nav-active", // String: Class that is added to <html> element when nav is active
        jsClass: "js", // String: 'JS enabled' class which is added to <html> element
        init: function() {}, // Function: Init callback
        open: function() {}, // Function: Open callback
        close: function() {} // Function: Close callback
    });


    // SLIDER
    $('.bxslider').bxSlider({
        auto: true,
        pause: 4000,
    });

    // single case picGallery
    $('.picsGallery-thumbs').find('.singleCasePic').click(function() {

        var thisUrl = window.location.search;
        // console.log(thisUrl);
        var model = thisUrl.split("=");
        // console.log(model);
        var idModel = model[1];
        // console.log(idModel);
        var idPic = $(this).attr("id");
        console.log(idPic);


        $('.picsGallery-show').empty();
        $('<img src="img/cases/iphone_5/' + idModel + '_' + idPic + '.jpg" class="singleCasePic" alt="" />').fadeIn(600).appendTo('.picsGallery-show');
    });

})