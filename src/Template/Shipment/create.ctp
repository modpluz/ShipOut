<div class="col col-md-10 col-md-offset-2">
    <div class="panel panel-info">
        <div class="panel-heading">
            Create a Shipment
        </div>
        <div class="panel-body">
            <?=$this->Form->create(null, ['class' => 'form'])?>
           <!-- <div class="form-group">
                <label for="carrier">Preferred Carrier</label>
                <select name="carrier" class="form-control col-md-4">
                    <option value="dhl">DHL Express</option>
                    <option value="fedex">Fedex</option>
                    <option value="usps">USPS</option>
                    <option value="ups">UPS</option>
                </select>
            </div>
            -->
            <!--<div class="well well-sm">
                Provide a Tracking number below and we will automatically shipping info.
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="tracking_number" placeholder="Tracking Number">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success" name="crete_shippment_from_tn">Create Shipment</button>
            </div>

            <h3 class="text-center">OR</h3>
-->            <div class="col col-md-6">
                <strong>Sender:</strong>
                <div class="well well-sm">
                    <div class="form-group">
                        <input type="text" class="form-control" name="sender_name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="sender_company" placeholder="Company">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="sender_address" placeholder="Address">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="sender_city" placeholder="City">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="sender_state" placeholder="State">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="sender_postcode" placeholder="Postal Code">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="sender_country" placeholder="Country">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="sender_phone" placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="sender_email" placeholder="Email">
                    </div>
                </div>

            </div>
            <div class="col col-md-6">
                <strong>Receiver:</strong>
                <div class="well well-sm">
                    <div class="form-group">
                        <input type="text" class="form-control" name="receiver_name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="receiver_company" placeholder="Company">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="receiver_address" placeholder="Address">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="receiver_city" placeholder="City">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="receiver_state" placeholder="State">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="receiver_postcode" placeholder="Postal Code">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="receiver_country" placeholder="Country">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="receiver_phone" placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="receiver_email" placeholder="Email">
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success" name="crete_shipping">Get Rates</button>
            </div>
            <?=$this->Form->end()?>
        </div>
    </div>
</div>