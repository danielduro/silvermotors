"use strict";
jQuery(document).ready(function() {

    jQuery('.carat-slider').bxSlider({
        slideWidth: 640,
        minSlides: 1,
        maxSlides: 1,
        pagerType: 'short',
        pagerSelector: '#slider-pager',
        nextSelector: '#slider-navigation .next',
        nextText: '',
        prevSelector: '#slider-navigation .prev',
        prevText: '',
        slideMargin: 0,
        onSlideBefore: function ($slideElement, oldIndex, newIndex) {
            var newSlide = jQuery('.slide').not('.bx-clone').eq(newIndex);
            var oldSlide = jQuery('.slide').not('.bx-clone').eq(oldIndex);
            oldSlide.removeClass('active');
            newSlide.addClass('active');

            jQuery('.overview-table', newSlide).hide();
            var newOverview = jQuery('.overviews .overview').eq(newIndex);
            var oldOverview = jQuery('.overviews .overview').eq(oldIndex);

            newOverview.addClass('active');
            oldOverview.removeClass('active');
        }
    });


    var slider = jQuery('#magazine-slider').bxSlider({
        controls: false,
        pager: false,
        slideWidth: 670
    });

    jQuery("#magazine-slider-pager .bx-page").hover(function () {
        jQuery('#magazine-slider-pager .bx-page').removeClass('active');
        jQuery(this).addClass('active');
        slider.goToSlide(jQuery(this).attr('data-slide-index'));
    }, function () {

    });


    jQuery(".jslider-element").each(function() {
        jQuery(this).slider({
            from: parseInt(jQuery(this).attr('data-min')),
            to:  parseInt(jQuery(this).attr('data-max')),
            step: parseInt(jQuery(this).attr('data-step')),
            round: 1,
            format: { format: '##', locale: 'en' },
            dimension: '&nbsp;' + jQuery(this).attr('data-sign')
        });
    });

    jQuery('input[type="checkbox"]').ezMark();
});


