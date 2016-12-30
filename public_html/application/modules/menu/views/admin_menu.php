<ul id="main-menu" class="">
    <li>
         <?php echo anchor('admincm', '<i class="entypo-gauge"></i> <span>Dashboard</span>'); ?>
    </li>
    <li>
         <?php echo anchor('#', '<i class="entypo-user"></i> <span>Users</span>'); ?>
        <ul>
            <li><?php echo anchor('admincm/modules/users/add', '<i class="entypo-dot"></i> <span>Add New User</span>'); ?></li>
            <li><?php echo anchor('admincm/modules/users/view', '<i class="entypo-dot"></i> <span>All Users</span>'); ?></li>
        </ul>
    </li>
    <li>
         <?php echo anchor('#', '<i class="entypo-folder"></i> <span>FTP</span>'); ?>
        <ul>
            <li><?php echo anchor('admincm/modules/ftp/add', '<i class="entypo-dot"></i> <span>Add New Host</span>'); ?></li>
            <li><?php echo anchor('admincm/modules/ftp/view', '<i class="entypo-dot"></i> <span>All Host</span>'); ?></li>
        </ul>
    </li>
    <li>
         <?php echo anchor('#', '<i class="entypo-flow-tree"></i> <span>Categories</span>'); ?>
        <ul>
            <li><?php echo anchor('admincm/modules/categories/add', '<i class="entypo-dot"></i> <span>Add New Category</span>'); ?></li>
            <li><?php echo anchor('admincm/modules/categories/view', '<i class="entypo-dot"></i> <span>All Categories</span>'); ?></li>
        </ul>
    </li>
    <li>
         <?php echo anchor('#', '<i class="entypo-tag"></i> <span>Genres</span>'); ?>
        <ul>
            <li><?php echo anchor('admincm/modules/genres/add', '<i class="entypo-dot"></i> <span>Add New Genre</span>'); ?></li>
            <li><?php echo anchor('admincm/modules/genres/view', '<i class="entypo-dot"></i> <span>All Genres</span>'); ?></li>
        </ul>
    </li>
    <li>
         <?php echo anchor('#', '<i class="entypo-chat"></i> <span>Support</span>'); ?>
        <ul>
            <li><?php echo anchor('admincm/modules/support/open', '<i class="entypo-dot"></i> <span>Open Support Ticket</span>'); ?></li>
            <li><?php echo anchor('admincm/modules/support/view', '<i class="entypo-dot"></i> <span>View Support Quee</span>'); ?></li>
        </ul>
    </li>
</ul>