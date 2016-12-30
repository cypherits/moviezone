<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="entypo-chat"></i> Support Form</h3>
    </div>
    <div class="panel-body">
        <?php
        echo form_open('admincm/modules/support/submit', array('class' => 'form-horizontal form-groups-bordered'));
        ?>
        <input type="hidden" name="source" value="insert">
        <div class="form-group">
            <label class="col-sm-3 control-label">User</label>
            <div class="col-sm-5">
                <input type="text" id="supportUserSearch" class="form-control" placeholder="Type here to search for user">
                <input type="hidden" name="Users_ID" required="">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Problem Description</label>
            <div class="col-sm-5">
                <textarea type="text" name="Support_description" class="form-control" placeholder="Problem Description" required></textarea>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>