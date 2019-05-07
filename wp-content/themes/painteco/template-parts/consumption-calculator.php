<?php
$surfaceTypeNames = [
    'planned' => esc_html__('Ēvelēts', 'painteco'),
    'nonplanned' => esc_html__('Neēvelēts', 'painteco'),
    'hardwood' => esc_html__('Cietkoks', 'painteco'),
];


$consumptionRates = [];
//print_r(get_field('product_consumption'));
foreach (get_field('product_consumption') as $surface) {
    $surfaceType = $surface['product_consumption_material'];
    $consumption = $surface['product_consumption_amount']; // m2 with 1 liter
    $consumptionRates[$surfaceType] = $consumption;
}
?>

<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    <?php echo esc_html__('Patēriņa kalkulators', 'painteco'); ?>
                </h4>
            </div>
            <div class="modal-body">
                <form class="form">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group" style="padding-bottom: 20px;">
                                <label for="surfaceType"><?php echo esc_html__('Virsmas tips', 'painteco'); ?></label>&nbsp;
                                <select class="form-control" id="surfaceType">
                                    <?php foreach ($consumptionRates as $surface => $rate): ?>
                                        <option value="<?php echo $surface; ?>"><?php echo $surfaceTypeNames[$surface]; ?> (<?php echo $rate; ?> m2/ltr)</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist" style="margin-left: 0;">
                                <li role="presentation" class="active">
                                    <a href="#fourwalls" aria-controls="fourwalls" role="tab" data-toggle="tab" class="calc-tab"><?php echo esc_html__('Visas 4 sienas', 'painteco'); ?></a>
                                </li>
                                <li role="presentation">
                                    <a href="#area" aria-controls="area" role="tab" data-toggle="tab" class="calc-tab"><?php echo esc_html__('Zināms laukums', 'painteco'); ?></a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="fourwalls">
                                    <p style="padding-top: 20px;">
                                        <strong><?php echo esc_html__('Telpas izmērs', 'painteco'); ?></strong>
                                    </p>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group" style="padding-bottom: 20px;">
                                                <label for="areaWidth"><?php echo esc_html__('Platums', 'painteco'); ?> (m)</label>&nbsp;
                                                <input type="number" id="areaWidth" value="3" class="form-field">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group" style="padding-bottom: 20px;">
                                                <label for="areaLength"><?php echo esc_html__('Garums', 'painteco'); ?> (m)</label>&nbsp;
                                                <input type="number" id="areaLength" value="5" class="form-field">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group" style="padding-bottom: 20px;">
                                                <label for="areaHeight"><?php echo esc_html__('Augstums', 'painteco'); ?> (m)</label>&nbsp;
                                                <input type="number" id="areaHeight" value="3" class="form-field">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group" style="padding-bottom: 20px;">
                                                <label for="windowCount"><?php echo esc_html__('Logu skaits', 'painteco'); ?> (1,6m x 1,4m)</label>&nbsp;
                                                <input type="number" id="windowCount" value="1" class="form-field">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group" style="padding-bottom: 20px;">
                                                <label for="doorCount"><?php echo esc_html__('Durvju skaits', 'painteco'); ?> (1m x 2m)</label>&nbsp;
                                                <input type="number" id="doorCount" value="1" class="form-field">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div role="tabpanel" class="tab-pane" id="area">
                                    <div class="row">
                                        <div style="padding-top: 20px;">
                                            <div class="form-group" style="padding-bottom: 20px;">
                                                <div class="col-xs-6 col-sm-6 col-sm-offset-6 col-sm-pull-6">
                                                    <label for="areaTotal"><?php echo esc_html__('Apstrādājamās virsmas laukums', 'painteco'); ?> (m<sup>2</sup>)</label>
                                                </div>
                                                <div class="col-xs-6 col-sm-4">
                                                    <input type="number" id="areaTotal" value="3"  class="form-field">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <span id="result" style="font-size: 2.5em; font-weight: bold;">-</span>
                            <span style="font-size: 2.5em;">ltr</span><br>
                            <button class="btn btn-primary" id="calculateBtn"><?php echo esc_html__('Rēķināt', 'painteco'); ?></button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo esc_html__('Aizvērt', 'painteco'); ?></button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<script>
    (function($) {
        setTimeout(function() {
            Calculator.init({
                consumption: {
                    <?php $counter = 0; ?>
                    <?php foreach ($consumptionRates as $surface => $rate) : ++$counter;?>
                        <?php echo $surface, ": ", $rate; echo $counter == count($consumptionRates) ? '' : ','; ?>
                    <?php endforeach; ?>
                }
            });
        }, 3000);
    })(jQuery)
</script>