
jQuery(document).ready(function () {

mobileToggle();

if (!("ontouchstart" in document.documentElement)) {
        document.documentElement.className += " no-touch";
    } else {
        document.documentElement.className += " touch";
    }


svgjs()
jQuery('.banner-section').owlCarousel({
    loop:true,
    nav:true,
    items:1,
    dots: false,
    autoplay: true,

}); 

if (jQuery(window).width() < 767) {
jQuery('.item-main').owlCarousel({
    loop:true,
    nav:false,
    items:1,
    dots: true,
    
});




}


jQuery('.touch .areas-expertise .item').on('click', function () {
    jQuery(this).toggleClass('is-active').siblings().removeClass('is-active')
});



if (jQuery(window).width() < 767) {
jQuery('.address-block').owlCarousel({
    loop:true,
    nav:false,
    items:1,
    dots: true,
    
});

jQuery('.touch .areas-expertise .item').on('click touchstart', function () {
    jQuery(this).parent().toggleClass('is-active').siblings().removeClass('is-active')
});
}


jQuery('.toggle-mobile').click(function() {
    jQuery(this).toggleClass('active');
    jQuery('.toggle-section-inner .inner-block').toggle();
});

// Select all »a« elements with a parent class »links« and add a function that is executed on click
jQuery( '.down-arrow' ).on( 'click', function(e){
    
  // Define variable of the clicked »a« element (»this«) and get its href value.
  var href = jQuery(this).attr( 'href' );
  
  // Run a scroll animation to the position of the element which has the same id like the href value.
  jQuery( 'html, body' ).animate({
        scrollTop: jQuery( href ).offset().top
  }, '300' );
    
  // Prevent the browser from showing the attribute name of the clicked link in the address bar
  e.preventDefault();

});

// Select all »a« elements with a parent class »links« and add a function that is executed on click
if (jQuery(window).width() > 767) {
jQuery( '.inner-block .block[data-tab]' ).on( 'click', function(e){
  jQuery( 'html, body' ).animate({
        scrollTop: jQuery( '.accordian' ).offset().top - jQuery('.inner-block').height()
  }, '300' );
});
}

if (jQuery(window).width() < 767) {
jQuery( '.inner-block .block[data-tab]' ).on( 'click', function(e){
  jQuery( 'html, body' ).animate({
        scrollTop: jQuery( '.accordian' ).offset().top - 52
  }, '300' );
});
}

/*jQuery('.inner-block .block[data-tab]').click(function(e) {
    e.preventDefault();
    //Set Offset Distance from top to account for fixed nav
    var offset = 10;
    var target = ( '#' + jQuery(this).data('tab') );
    var $target = jQuery(target);
    //Animate the scroll to, include easing lib if you want more fancypants easings
    jQuery('html, body').stop().animate({
        'scrollTop': $target.offset().top - offset
    }, 800, 'swing');
}); */



});

jQuery(window).resize(function(){
    mobileToggle();

});
jQuery(document).ready(function(){
    
    jQuery('.inner-block .block').click(function(e){
        e.preventDefault();

        var tab_id = jQuery(this).attr('data-tab');
        var tab_title = jQuery(this).attr('data-title');
        var banner_image_url = jQuery(this).attr('data-image');
        console.log(banner_image_url);

        jQuery('.inner-banner-container h1').text(tab_title);
        jQuery('section.inner-banner').css('background-image', 'url("' + banner_image_url + '")');

        jQuery('.inner-block .block').removeClass('current');
        jQuery('.accordian .tab').removeClass('current');
        jQuery(this).addClass('current');
        jQuery("#"+tab_id).addClass('current');
       

    });

    
})

function svgjs(){
    jQuery('img.svg').each(function(){
        var $img = jQuery(this);
        var imgID = $img.attr('id');
        var imgClass = $img.attr('class');
        var imgURL = $img.attr('src');

        jQuery.get(imgURL, function(data) {
            // Get the SVG tag, ignore the rest
            var $svg = jQuery(data).find('svg');

            // Add replaced image's ID to the new SVG
            if(typeof imgID !== 'undefined') {
                $svg = $svg.attr('id', imgID);
            }
            // Add replaced image's classes to the new SVG
            if(typeof imgClass !== 'undefined') {
                $svg = $svg.attr('class', imgClass+' replaced-svg');
            }

            // Remove any invalid XML tags as per http://validator.w3.org
            $svg = $svg.removeAttr('xmlns:a');

            // Check if the viewport is set, else we gonna set it if we can.
            if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
                $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
            }

            // Replace image with new SVG
            $img.replaceWith($svg);

        }, 'xml');

    });
}

function mobileToggle() {
    if (jQuery(window).width() < 767) {
        jQuery('.inner-block .block').click(function() {
            jQuery('.toggle-mobile').removeClass('active');
            jQuery('.toggle-section-inner .inner-block').hide();
        });
    }
}