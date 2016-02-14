<?php
/**
 * Login view
 */
$this->assign('title', 'Please Login');

echo $this->Form->create(null, ['url' => ['action' => 'login'], 'class' => 'form-horizontal']);
?>
<div class="col col-md-9 col-md-offset-2">
<div class="panel panel-info">
    <div class="panel-heading">
        Please Login
    </div>
    <div class="panel-body">
        <div class="form-group">
            <label for="txt_email" class="col-sm-3 control-label">Email Address</label>

            <div class="col-sm-7">
                <input type="text" id="txt_email" class="form-control required" name="email"
                       placeholder="email address" required>
            </div>
        </div>
        <div class="form-group">
            <label for="txt_pwd" class="col-sm-3 control-label">Password</label>

            <div class="col-sm-7">
                <input class="form-control required" id="txt_pwd" type="password" name="password"
                       placeholder="password" required>
            </div>
        </div>
        <div class="col col-md-offset-3">
            <button type="submit" class="btn btn-success">Login</button>
        </div>
   </div>
</div>
</div>
<?php
echo $this->Form->end();
