<?php
use Cake\Routing\Router;
?>
    <div class="panel panel-info">
        <div class="panel-heading">
            Track Shipment
        </div>
        <div class="panel-body">
            <div class="col col-md-12">
                <?=$this->Form->create(null, ['class' => 'form'])?>
                <div class="form-group col-md-8">
                    <strong>Tracking #:</strong> <input type="text" class="form-control" name="tracking_number" value="<?=!empty($tracking_number) ? $tracking_number : ''?>">
                    <button type="submit" class="btn btn-primary">Track</button>
                </div>
                <?=$this->Form->end()?>
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
            <?php if(!empty($tracking_info) && !empty($tracking_info['tracking_status'])){?>
            <div class="col col-md-12">
                <strong>Tracking Details:</strong>
                <div class="col col-md-12">
                    <table class="table table-bordered" width="100%" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <td height="30" width="15%">Date</td>
                                <td width="10%">Status</td>
                                <td>Comments</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?=$tracking_info['tracking_status']['status_date']?></td>
                                <td><span class="label label-info"><?=$tracking_info['tracking_status']['status']?></span></td>
                                <td><?=$tracking_info['tracking_status']['status_details']?></td>
                            </tr>
                            <?php
                            if (!empty($tracking_info['tracking_history'])) {
                                foreach ($tracking_info['tracking_history'] as $info) {
                            ?>
                                    <tr>
                                        <td><?=$info['status_date']?></td>
                                        <td><span class="label label-info"><?=$info['status']?></span></td>
                                        <td><?=$info['status_details']?></td>
                                    </tr>

                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php } elseif (!empty($tracking_info)) { ?>
                <div class="clearfix">&nbsp;</div>
                <div class="alert alert-danger">
                    We could not find any information for the specified tracking number.
                </div>
            <?php } ?>

        </div>
    </div>
