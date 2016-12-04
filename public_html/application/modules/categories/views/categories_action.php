<?php
$statusIco = ($Categories_status == "active")? '<i class="fa fa-check"></i>' : '<i class="fa fa-exclamation-triangle"></i>';
$statusBtnClass = ($Categories_status == "active")?"btn btn-sm btn-success": "btn btn-sm btn-warning";
$statusFlip = ($Categories_status == "active")? "inactive": "active";
?>
<div class="btn-group">
    <?php
    echo anchor(base_url("admincm/modules/categories/switch_status/".$statusFlip."/".$Categories_ID), $statusIco, array("class"=>$statusBtnClass));
    echo anchor(base_url("admincm/modules/categories/edit/".$Categories_ID), '<i class="fa fa-pencil"></i>', array("class"=>"btn btn-default btn-sm"));
    echo anchor(base_url("admincm/modules/categories/delete/".$Categories_ID), '<i class="fa fa-trash"></i>', array("class"=>"btn btn-danger btn-sm"));
    ?>
</div>