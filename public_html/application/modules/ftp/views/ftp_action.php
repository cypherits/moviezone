<div class="btn-group">
    <?php
    echo anchor(base_url("admincm/modules/ftp/edit/".$Ftp_ID), '<i class="fa fa-pencil"></i>', array("class"=>"btn btn-default btn-sm"));
    echo anchor(base_url("admincm/modules/ftp/delete/".$Ftp_ID), '<i class="fa fa-trash"></i>', array("class"=>"btn btn-danger btn-sm"));
    ?>
</div>