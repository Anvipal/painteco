/**
 * Created by uldis on 19/03/16.
 */

var LanguageSwitch = {
    cfg: {
        target: ''
    },

    init: function()
    {
        this.handleSwitch();
    },

    handleSwitch: function()
    {
        jQuery(this.cfg.target).change(function() {
            window.location = jQuery(this).val();
        });
    }
};