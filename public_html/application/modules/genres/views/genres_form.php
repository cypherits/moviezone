<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="entypo-users"></i> Genres Form</h3>
    </div>
    <div class="panel-body">
        <?php
        echo form_open('admincm/modules/genres/submit', array('class' => 'form-horizontal form-groups-bordered'));
        ?>
        <input type="hidden" name="source" value="<?=(isset($Genres_ID))?$Genres_ID:"insert"?>">
        <div class="form-group">
            <label class="col-sm-3 control-label">Name</label>
            <div class="col-sm-5">
                <input type="text" id="genreName" name="Genres_name"category class="form-control" placeholder="Name" required value="<?=(isset($Genres_name))?$Genres_name:""?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Alias</label>
            <div class="col-sm-5">
                <input type="text" id="genreAlias" name="Genres_alias" class="form-control" placeholder="Alias" required value="<?=(isset($Genres_alias))?$Genres_alias:""?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Genre Status</label>
            <div class="col-sm-5">
                <select class="form-control selectboxit" name="Genres_status">
                    <option value="active" <?=(!isset($Genres_status) || $Genres_status == "active")?"selected":""?>>Active</option>
                    <option value="inactive" <?=(isset($Genres_status) && $Genres_status == "inactive")?"selected":""?>>Inactive</option>
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
    $("#genreName").focusout(function(e){
        var name = $(this).val();
        name = name.replace(" ", "-").toLowerCase();
        $("#genreAlias").val(name);
    });
</script>