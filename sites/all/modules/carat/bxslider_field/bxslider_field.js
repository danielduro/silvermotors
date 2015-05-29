/**
 *  @file
 *  Initiate the BxSlider plugin.
 */

(function ($) {
    Drupal.behaviors.bxSliderField = {
        attach: function (context, settings) {
            $('.bxslider-field-gallery-wrapper', context).each(function() {
                var wrapper = jQuery(this);
                var entity_id = wrapper.attr('data-entity-id');

                var module_settings = settings.bxslider_field[entity_id];
                var bxsettings = {
                    mode: module_settings.mode,
                    speed: module_settings.speed,
                    controls: module_settings.controls,
                    pager: module_settings.pager
                };

                if(module_settings.pager_use_images) {
                    bxsettings['pagerCustom'] = jQuery('.bx-pager', wrapper);
                }

                $('.bxslider-field-gallery', wrapper).bxSlider(bxsettings);
            });
        }
    };
}(jQuery));
