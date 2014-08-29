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
        pause: 4000
    });

    // single case picGallery
    $('.picsGallery-thumbs').find('.singleProductPic').click(function() {

        var src = $(this).attr("src");
        $('.picsGallery-show img').attr("src", src);
    });

    // equal height for items blocks
    equalheight = function(container){

        var currentTallest = 0,
            currentRowStart = 0,
            rowDivs = new Array(),
            $el,
            topPosition = 0;
        $(container).each(function() {

            $el = $(this);
            $($el).height('auto')
            topPostion = $el.position().top;

            if (currentRowStart != topPostion) {
                for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
                    rowDivs[currentDiv].height(currentTallest);
                }
                rowDivs.length = 0; // empty the array
                currentRowStart = topPostion;
                currentTallest = $el.height();
                rowDivs.push($el);
            } else {
                rowDivs.push($el);
                currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
            }
            for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
                rowDivs[currentDiv].height(currentTallest);
            }
        });
    }

    $(window).load(function() {
        equalheight('.itemBlock');
    });


    //world wide delivery extras
    // if not world delivery fiill woth none to have check OK
    $('.delCost').change(function (){
        var delWorldActive = $("#delivery_3").prop('checked');
        console.log (delWorldActive);
        if (delWorldActive) {
            $('.delWorld input').val('');
            $('.delWorld').slideDown();
        }
        else {
            $('.delWorld').slideUp();
            $('.delWorld input').val('none');
        }
    });

    // check if fields are OK on submission
    $('.orderForm').on('submit', function(event) {
        var isFormValid = true;
        // check if all input fields ok!
        $(".orderInput").children().each(function() {
            if ($.trim($(this).val()).length == 0) {
                $(this).addClass("highlight");
                isFormValid = false;
                event.preventDefault();
                //alert('Form submitted!');
            } else {
                $(this).removeClass("highlight");
            }
        });
    });

    // if field has input unMask it
    $('.orderForm input').on('input', function() {
        if ($.trim($(this).val()).length > 0) {
            $(this).removeClass("highlight");
        };
    });

    // count case quantity in order
    // count price in order
    $('.inCart-item').on('click', '.quantity', function(){

        var parentTarget = $(this).offsetParent();
        var itemsTarget = parentTarget.find('.quantity-select');
        var priceSource = parentTarget.find('.itemPrice-final');
        var priceTarget = parentTarget.find('.priceTotal');
        var priceCount = priceSource.text();
        var itemsCount = itemsTarget.val();

        //add one
        if ($(this).hasClass('qPlus') && (itemsCount < 5)){
            var newItemCount = ++itemsCount;
            var newPriceCount = itemsCount * priceCount ;
            console.log(newPriceCount);
            $.ajax({
                url: "layout/cart.php",
                datatype: "JSON",
                type: "POST",
                data: newItemCount,
                success: function (data) {
                    $(itemsTarget).val(newItemCount);
                    $(priceTarget).html(newPriceCount);
                }
            });
            return false
        };
        //subtract one
        if ($(this).hasClass('qMinus') && (itemsCount > 1)){
            var newItemCount = --itemsCount;
            $.ajax({
                url: "layout/cart.php",
                datatype: "JSON",
                type: "POST",
                data: newItemCount,
                success: function (data) {
                    $(itemsTarget).val(newItemCount);
                }
            });
            return false
        };
    });

    //count case price in order
    //(function() {
    //    $.each(  $('.inCart-item'), function( key, value ) {
    //        console.log( key + ": " + value );
    //    });
    //}());


    //count finalprice in order

});