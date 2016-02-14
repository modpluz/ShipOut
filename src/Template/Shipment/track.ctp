<?php
use Cake\Routing\Router;
?>
    <div class="panel panel-info">
        <div class="panel-heading">
            Track Shipment
        </div>
        <div class="panel-body">
            <div class="col col-md-12">
                <strong>Tracking #:</strong> <?=$shipment->tracking_number?>
            </div>
            <?php if (!empty($shipment_data['sender'])) { ?>
                <div class="col col-md-5">
                    <strong>Sender:</strong>
                    <div class="col col-md-offset-1">
                        <?=$shipment_data['sender']['name']?><br>
                        <?=$shipment_data['sender']['company']?><br>
                        <?=$shipment_data['sender']['street1']?><br>
                        <?=$shipment_data['sender']['city']?><br>
                        <?=$shipment_data['sender']['state']?><br>
                        <?=$shipment_data['sender']['zip']?><br>
                        <?=$shipment_data['sender']['country']?><br>
                        <?=$shipment_data['sender']['phone']?><br>
                        <?=$shipment_data['sender']['email']?><br>
                    </div>
                </div>
            <?php } ?>
            <?php if (!empty($shipment_data['recipient'])) { ?>
                <div class="col col-md-5">
                    <strong>Recipient:</strong>
                    <div class="col col-md-offset-1">
                        <?=$shipment_data['recipient']['name']?><br>
                        <?=$shipment_data['recipient']['company']?><br>
                        <?=$shipment_data['recipient']['street1']?><br>
                        <?=$shipment_data['recipient']['city']?><br>
                        <?=$shipment_data['recipient']['state']?><br>
                        <?=$shipment_data['recipient']['zip']?><br>
                        <?=$shipment_data['recipient']['country']?><br>
                        <?=$shipment_data['recipient']['phone']?><br>
                        <?=$shipment_data['recipient']['email']?><br>
                    </div>
                </div>
            <?php } ?>

            <div class="col col-md-12">
                <strong>Tracking Details:</strong>
                <div class="col col-md-offset-1">

                </div>
            </div>

        </div>
    </div>
