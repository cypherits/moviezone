<div class="panel panel-primary">
    <div class="panel-heading">
        <h4 class="panel-title"><i class="entypo-doc-text-inv"></i> Users</h4>
    </div>
    <div class="panel-body">
        <table class="table table-bordered dataTable" id="events-table">
            <thead>
            <th>Full Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
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
            "ajax": "<?php echo base_url().'admincm/modules/users/get_users'; ?>"
        });
        $('select').addClass('selectboxit');
    });
</script>