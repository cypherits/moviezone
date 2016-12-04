<?php
$statusIco = ($Users_status == "active")? '<i class="fa fa-check"></i>' : '<i class="fa fa-exclamation-triangle"></i>';
$statusBtnClass = ($Users_status == "active")?"btn btn-sm btn-success": "btn btn-sm btn-warning";
$statusFlip = ($Users_status == "active")? "inactive": "active";
?>
<div class="btn-group">
    <?php
    echo anchor(base_url("admincm/modules/users/switch_status/".$statusFlip."/".$Users_ID), $statusIco, array("class"=>$statusBtnClass));
    echo anchor(base_url("admincm/modules/users/edit/".$Users_ID), '<i class="fa fa-pencil"></i>', array("class"=>"btn btn-default btn-sm"));
    echo anchor(base_url("admincm/modules/users/delete/".$Users_ID), '<i class="fa fa-trash"></i>', array("class"=>"btn btn-danger btn-sm"));
    ?>
</div>