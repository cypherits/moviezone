<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="entypo-users"></i> Categories Form</h3>
    </div>
    <div class="panel-body">
        <?php
        echo form_open('admincm/modules/categories/submit', array('class' => 'form-horizontal form-groups-bordered'));
        ?>
        <input type="hidden" name="source" value="<?=(isset($categories_ID))?$categories_ID:"insert"?>">
        <div class="form-group">
            <label class="col-sm-3 control-label">Name</label>
            <div class="col-sm-5">
                <input type="text" id="categoryName" name="Categories_name" class="form-control" placeholder="Name" required value="<?=(isset($Categories_name))?$Categories_name:""?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Alias</label>
            <div class="col-sm-5">
                <input type="text" id="categoryAlias" name="Categories_alias" class="form-control" placeholder="Alias" required value="<?=(isset($Categories_alias))?$Categories_alias:""?>">
            </div>
            <div class="col-sm-3 control-label">
                <span id="username_message"></span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Parent</label>
            <div class="col-sm-5">
                <select class="form-control selectboxit" name="Categories_parent">
                    <?= $option ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Category Status</label>
            <div class="col-sm-5">
                <select class="form-control selectboxit" name="Categories_status">
                    <option value="active" <?=(!isset($Categories_status) || $Categories_status == "active")?"selected":""?>>Active</option>
                    <option value="inactive" <?=(isset($Categories_status) && $Categories_status == "inactive")?"selected":""?>>Inactive</option>
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
    $("#categoryName").focusout(function(e){
        var name = $(this).val();
        name = name.replace(" ", "-").toLowerCase();
        $("#categoryAlias").val(name);
    });
</script>