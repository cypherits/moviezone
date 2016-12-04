<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="entypo-users"></i> Users Form</h3>
    </div>
    <div class="panel-body">
        <?php
        echo form_open('admincm/modules/ftp/submit', array('class' => 'form-horizontal form-groups-bordered'));
        ?>
        <input type="hidden" name="source" value="<?=(isset($Ftp_ID))?$Ftp_ID:"insert"?>">
        <div class="form-group">
            <label class="col-sm-3 control-label">Server Name</label>
            <div class="col-sm-5">
                <input type="text" name="Ftp_name" class="form-control" placeholder="Full Name" required value="<?=(isset($Ftp_name))?$Ftp_name:""?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Host</label>
            <div class="col-sm-5">
                <input type="text" id="email" name="Ftp_host" class="form-control" placeholder="Host" required value="<?=(isset($Ftp_host))?$Ftp_host:""?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Username</label>
            <div class="col-sm-5">
                <input type="text" id="username" name="Ftp_username" class="form-control" placeholder="Username" required value="<?=(isset($Ftp_username))?$Ftp_username:""?>">
            </div>
        </div>
        <div class="form-group">
            <label for="usersPassword" class="col-sm-3 control-label">Password</label>
            <div class="col-sm-5">
                <input type="text" Name="Ftp_password" class="form-control" placeholder="Password" required value="<?=(isset($Ftp_password))?substr($Ftp_password, 0, -8):""?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-5 col-sm-offset-3">
                <button id="submit" type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>