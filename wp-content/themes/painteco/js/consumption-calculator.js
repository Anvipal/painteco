/**
 * Created by uldis on 26/03/16.
 */

var Calculator = {
    calcType: 'fourwalls',

    cfg: {
        consumption: {},
        roundwoodConsumption: 1, // ltr on m2
        plankConsumption: 2, // ltr on m2
        windowArea: 1.6 * 1.4,
        doorArea: 1 * 2
    },

    init: function(options)
    {
        jQuery.extend(this.cfg, options);
        this.handleTab();
        this.handleCalculateBtn();
    },

    handleTab: function()
    {
        jQuery('.calc-tab').click(function(e) {
            e.preventDefault();
            jQuery(this).tab('show');
            Calculator.calcType = jQuery(this).attr('aria-controls');
        });
    },

    handleCalculateBtn: function()
    {
        jQuery('#calculateBtn').click(function(e) {
            e.preventDefault();
            Calculator.calculate();
        });
    },


    getConsumption: function()
    {
        var surfaceType = jQuery('#surfaceType').val();

        if ( ! this.cfg.consumption.hasOwnProperty(surfaceType)) {
            console.error('Invalid surface type: ' + surfaceType);

            return 0;
        }

        console.log('Consumption for ' + surfaceType + ' = ' + this.cfg.consumption[surfaceType]);

        return this.cfg.consumption[surfaceType];
    },

    calculate: function()
    {
        console.info(this.calcType);
        if ('fourwalls' === this.calcType) {
            var doorCount = jQuery('#doorCount').val(),
                windowCount = jQuery('#windowCount').val(),
                width = parseFloat(jQuery('#areaWidth').val()),
                length = parseFloat(jQuery('#areaLength').val()),
                height = parseFloat(jQuery('#areaHeight').val());

            var wallArea = 2 * (width + length) * height,
                doorArea = doorCount * this.cfg.doorArea,
                windowArea = windowCount * this.cfg.windowArea;

            var totalArea = wallArea - doorArea - windowArea;

            console.log(width + ' / ' + length + ' / ' + height);
            console.log('wall: ' + wallArea);
            console.log('doors: ' + doorArea);
            console.log('windows: ' + windowArea);
            console.log('total: ' + totalArea);

            var result = totalArea / this.getConsumption();

            jQuery('#result').text(Math.ceil(result));

        } else if ('area' === this.calcType) {
            var result = jQuery('#areaTotal').val() / this.getConsumption();

            jQuery('#result').text(Math.ceil(result));

        } else {
            console.error('Invalid calculation type: ' + this.calcType);
        }
    }
};