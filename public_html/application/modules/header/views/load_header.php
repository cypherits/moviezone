<!-- header layer 1 -->
<div class="row">
    <div class="col-md-12 col-sm-12 clearfix text-center">
        <h2 style="font-weight: 200; margin: 0px;"><i class="entypo-newspaper"></i> <?php echo $title; ?></h2>
    </div>
</div>
<!-- /header layer 1 -->

<!-- header layer 2 -->
<div class="row">
    <div class="col-md-6 col-sm-8 clearfix">

        <ul class="user-info pull-left pull-none-xsm">
            <li class="profile-info dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <?php echo img(array('src' => 'themes/admin/img/avater.jpg', 'class' => 'img-circle', 'width' => '45')); ?>
                    <?php echo $this->session->userdata('FullName'); ?>
                </a>
                <ul class="dropdown-menu">
                    <li class="caret"></li>
                    <li><a href="#"><i class="entypo-user"></i> Edit Profile</a></li>
                    <li><a href="#"><i class="fa fa-edit"></i> Change Password</a></li>
                </ul>
            </li>
        </ul>

    </div>

    <div class="col-md-6 col-sm-4 clearfix hidden-xs">

        <ul class="list-inline links-list pull-right">
            <li><?php echo anchor('', '<i class="entypo-picture"></i> Visit Site', array('target' => '_blank')).' | '.anchor('login/logout', 'Log Out <i class="entypo-logout right"></i>'); ?></li>
        </ul>

    </div>

</div>
<!-- /header layer 2 -->