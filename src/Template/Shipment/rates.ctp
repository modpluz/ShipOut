    <div class="panel panel-info">
        <div class="panel-heading">
            Shipment Rates
        </div>
        <tr class="panel-body">
            <?=$this->Form->create(null, ['class' => 'form'])?>
            <h4>
                Please see below for a list of rate(s) applicable for your Shipment.
            </h4>
            <div class="col col-md-11">
                <table class="table table-bordered" width="100%" cellpadding="0" cellspacing="0">
                    <thead>
                    <tr>
                        <td height="30" width="80%">Provider</td>
                        <td>Amount</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (!empty($rates)) {
                        foreach ($rates as $rate) {
                            ?>
                            <tr>
                                <td>
                                    <input type="radio" name="rate_id" value="<?= $rate['object_id'] ?>">
                                    <?php if (!empty($rate['provider_image_75'])) {?>
                                        <img src="<?=$rate['provider_image_75']?>" alt="<?= $rate['provider'] ?>"><br>
                                    <?php } ?>
                                    <?= $rate['provider'] ?> (<?= $rate['servicelevel_name'] ?>)
                                    <div class="col text-muted">
                                        <?= $rate['duration_terms'] ?>
                                    </div>
                                <?php if (!empty($rate['servicelevel_terms'])) {?>
                                    <strong>Note:</strong>
                                    <div class="alert alert-info">
                                        <?=$rate['servicelevel_terms']?>
                                    </div>
                                <?php } ?>
                                </td>
                                <td>
                                    <?= $rate['amount'] ?> <?= $rate['currency'] ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success">Create Shipment</button>
            </div>
            <?=$this->Form->end()?>
        </div>
    </div>
