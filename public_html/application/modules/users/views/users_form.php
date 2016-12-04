<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="entypo-users"></i> Users Form</h3>
    </div>
    <div class="panel-body">
        <?php
        echo form_open('admincm/modules/users/submit', array('class' => 'form-horizontal form-groups-bordered'));
        ?>
        <input type="hidden" name="source" value="<?=(isset($Users_ID))?$Users_ID:"insert"?>">
        <div class="form-group">
            <label class="col-sm-3 control-label">Full Name</label>
            <div class="col-sm-5">
                <input type="text" name="Users_name" class="form-control" placeholder="Full Name" required value="<?=(isset($Users_name))?$Users_name:""?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Username</label>
            <div class="col-sm-5">
                <input type="text" id="username" name="Users_username" class="form-control" placeholder="Username" required value="<?=(isset($Users_username))?$Users_username:""?>">
            </div>
            <div class="col-sm-3 control-label">
                <span id="username_message"></span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Email</label>
            <div class="col-sm-5">
                <input type="email" id="email" name="Users_email" class="form-control" placeholder="Email" required value="<?=(isset($Users_email))?$Users_email:""?>">
            </div>
            <div class="col-sm-3 control-label">
                <span id="email_message"></span>
            </div>
        </div>

        <div class="form-group">
            <label for="usersPassword" class="col-sm-3 control-label">Password</label>
            <div class="col-sm-5">
                <input type="Password" Name="Users_passwords" class="form-control" placeholder="Password" <?=(!isset($Users_ID)?"required":"")?>>
            </div>
            <?php if(isset($Users_ID)){ ?>
            <label class="col-sm-3 control-label">
                leave blank to keep previous password
            </label>
            <?php }?>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Users Role</label>
            <div class="col-sm-5">
                <select class="form-control selectboxit" name="Users_role">
                    <option value="admin" <?=(isset($Users_role) && $Users_role == "admin")?"selected":""?>>Administrator</option>
                    <option value="manager" <?=(isset($Users_role) && $Users_role == "manager")?"selected":""?>>Manager</option>
                    <option value="subscriber" <?=(!isset($Users_role) || $Users_role == "subscriber")?"selected":""?>>Subscriber</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Users Status</label>
            <div class="col-sm-5">
                <select class="form-control selectboxit" name="Users_status">
                    <option value="active" <?=(!isset($Users_status) || $Users_status == "active")?"selected":""?>>Active</option>
                    <option value="inactive" <?=(isset($Users_status) && $Users_status == "inactive")?"selected":""?>>Inactive</option>
                </select>
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
<script type="text/javascript">
    $("body").on("focusout", "#username", function(e){
        var val = $(this).val();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url("admincm/modules/users/checkup"); ?>",
            data:{
                username: val
            },
            success: function(data){
                if(data === "invalid"){
                    $("#submit").addClass("disabled");
                    $("#username_message").removeClass("text-success").addClass("text-danger").text("Invalid Username! Try Another One.");
                }else{
                    $("#submit").removeClass("disabled");
                    $("#username_message").removeClass("text-danger").addClass("text-success").text("Username Available!");
                }
            }
        });
    });
    $("body").on("focusout", "#email", function(e){
        var val = $(this).val();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url("admincm/modules/users/checkup"); ?>",
            data:{
                email: val
            },
            success: function(data){
                if(data === "invalid"){
                    $("#submit").addClass("disabled");
                    $("#email_message").removeClass("text-success").addClass("text-danger").text("Invalid Email! Try Another One.");
                }else{
                    $("#submit").removeClass("disabled");
                    $("#email_message").removeClass("text-danger").addClass("text-success").text("Email Available!");
                }
            }
        });
    });
</script>