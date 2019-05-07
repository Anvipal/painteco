
/**
 * Created by janis on 29/03/16.
 */

var ColorPicker = {
    cfg: {
        target: '.color',
        targetInfo: '.color-info',
    },

    init: function()
    {
        this.handlePicker();
    },

    handlePicker: function()
    {
        jQuery(this.cfg.target).click(function(e) {
            e.stopPropagation();
            jQuery(ColorPicker.cfg.targetInfo).hide();
            var colorInfo = jQuery(this).children();
            colorInfo.fadeIn();

            // Reposition for mobile/tablet
            if (jQuery(window).width() < 768) {

                colorInfo.css({'left':0});

                viewportWidth = jQuery(window).width();
                leftPos = colorInfo[0].getBoundingClientRect().left;
                width = colorInfo.width();

                leftPosCentered = ((viewportWidth - width) / 2) - leftPos;
                colorInfo.css({'left':leftPosCentered});

            }
        });

        jQuery(this.cfg.targetInfo).click(function(e) {
            e.stopPropagation();
            jQuery(this).fadeOut();
        });

    },
};