<?php
use Cake\Routing\Router;
?>
    <div class="panel panel-info">
        <div class="panel-heading">
            Shipments
        </div>
        <div class="panel-body">
            <table class="table table-bordered" width="95%">
                <thead>
                    <tr>
                        <td height="30">Tracking Number</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>
            <?php
            if (!empty($shipments)) {
                foreach($shipments as $shipment) {
            ?>
                <tr>
                    <td height="30">
                        <a href="<?=Router::url(['_name' => 'Shipment::Track', 'tracking_number' => $shipment->tracking_number])?>"><?=$shipment->tracking_number?></a>
                    </td>
                    <td><?=$shipment->last_known_status?></td>
                </tr>

            <?php
                }
            } else { ?>
                <tr>
                    <td height="40" colspan="2">
                        <div class="text-center">
                            You have no shipments to track! <a href="<?=Router::url(['_name' => 'Shipment::Create'])?>">Create a Shipment</a>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <?php } ?>
        </div>
    </div>
