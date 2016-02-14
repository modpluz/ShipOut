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

-->         <div class="text-center">
                <button type="button" class="btn btn-warning" id="btn_default">
                    Use Saved Info
                </button>
            </div>
            <div class="col col-md-6">
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
                <input type="checkbox" value="1" name="save_default" id="save_default"> <label for="save_default">Save this information for future use.</label>
                <div class="well well-sm">
                    <strong>Note:</strong> Existing info will be overwritten if you choose to "Save".
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success" name="crete_shipping">Get Rates</button>
            </div>
            <?=$this->Form->end()?>
        </div>
    </div>
</div>
<script language="javascript" type="text/javascript">
    $(document).ready(function ()
    {
       $('#btn_default').on('click', function () {
           $.get( "/shipment/get_default", function( data ) {
               data = $.parseJSON(data);
               if(data.id) {
                   $('input[name="sender_name"]').val(data.sender_name);
                   $('input[name="sender_company"]').val(data.sender_company);
                   $('input[name="sender_address"]').val(data.sender_address);
                   $('input[name="sender_city"]').val(data.sender_city);
                   $('input[name="sender_state"]').val(data.sender_state);
                   $('input[name="sender_country"]').val(data.sender_country);
                   $('input[name="sender_postcode"]').val(data.sender_postcode);
                   $('input[name="sender_phone"]').val(data.sender_phone);
                   $('input[name="sender_email"]').val(data.sender_email);

                   $('input[name="receiver_name"]').val(data.receiver_name);
                   $('input[name="receiver_company"]').val(data.receiver_company);
                   $('input[name="receiver_address"]').val(data.receiver_address);
                   $('input[name="receiver_city"]').val(data.receiver_city);
                   $('input[name="receiver_state"]').val(data.receiver_state);
                   $('input[name="receiver_country"]').val(data.receiver_country);
                   $('input[name="receiver_postcode"]').val(data.receiver_postcode);
                   $('input[name="receiver_phone"]').val(data.receiver_phone);
                   $('input[name="receiver_email"]').val(data.receiver_email);
               }
           });
       }) ;
    });
</script>