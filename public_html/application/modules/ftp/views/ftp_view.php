<div class="panel panel-primary">
    <div class="panel-heading">
        <h4 class="panel-title"><i class="entypo-doc-text-inv"></i> Users</h4>
    </div>
    <div class="panel-body">
        <table class="table table-bordered dataTable" id="events-table">
            <thead>
            <th>Host Name</th>
            <th>Hosts</th>
            <th>Username</th>
            <th>Password</th>
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
            "ajax": "<?php echo base_url().'admincm/modules/ftp/get_ftp'; ?>"
        });
        $('select').addClass('selectboxit');
    });
</script>