<div class="panel panel-primary">
    <div class="panel-heading">
        <h4 class="panel-title"><i class="entypo-flow-tree"></i> Categories</h4>
    </div>
    <div class="panel-body">
        <table class="table table-bordered dataTable" id="events-table">
            <thead>
            <th>Name</th>
            <th>Alias</th>
            <th>Parent</th>
            <th>Status</th>
            <th>Action</th>
            </thead>
        </table>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#events-table').dataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "<?php echo base_url().'admincm/modules/categories/get_categories'; ?>"
        });
        $('select').addClass('selectboxit');
    });
</script>