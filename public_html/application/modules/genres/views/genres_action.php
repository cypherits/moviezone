<?php
$statusIco = ($Genres_status == "active")? '<i class="fa fa-check"></i>' : '<i class="fa fa-exclamation-triangle"></i>';
$statusBtnClass = ($Genres_status == "active")?"btn btn-sm btn-success": "btn btn-sm btn-warning";
$statusFlip = ($Genres_status == "active")? "inactive": "active";
?>
<div class="btn-group">
    <?php
    echo anchor(base_url("admincm/modules/genres/switch_status/".$statusFlip."/".$Genres_ID), $statusIco, array("class"=>$statusBtnClass));
    echo anchor(base_url("admincm/modules/genres/edit/".$Genres_ID), '<i class="fa fa-pencil"></i>', array("class"=>"btn btn-default btn-sm"));
    echo anchor(base_url("admincm/modules/genres/delete/".$Genres_ID), '<i class="fa fa-trash"></i>', array("class"=>"btn btn-danger btn-sm"));
    ?>
</div>