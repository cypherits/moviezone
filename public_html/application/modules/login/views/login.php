<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Neon Admin Panel" />
        <meta name="author" content="" />

        <?php
        echo title($title);
        if (!empty($css_initial)) {
            echo add_css($css_initial);
        }
        ?>

        <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->


    </head>
    <body class="page-body login-page login-form-fall">


        <script type="text/javascript">
            var baseurl = '<?php echo base_url() . 'admincm'; ?>';
            var base_url = '<?php echo base_url(); ?>';
            //alert('<?php //echo $this->session->userdata('first_name'), $this->session->userdata('role');  ?>');
        </script>

        <div class="login-container">

            <div class="login-header login-caret">

                <div class="login-content">

                    <img src="<?php echo base_url(); ?>themes/admin/img/cypherits.png" width="120" alt="" />

                    <p class="description">Dear user, log in to access the admin area!</p>

                    <!-- progress bar indicator -->
                    <div class="login-progressbar-indicator">
                        <h3>43%</h3>
                        <span>logging in...</span>
                    </div>
                </div>

            </div>

            <div class="login-progressbar">
                <div></div>
            </div>

            <div class="login-form">

                <div class="login-content">

                    <div class="form-login-error">
                        <h3>Invalid login</h3>
                        <p>provide correct username and password</p>
                    </div>

                    <form method="post" role="form" id="form_login">

                        <div class="form-group">

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-user"></i>
                                </div>

                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" autocomplete="off" value="azim" />
                            </div>

                        </div>

                        <div class="form-group">

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-key"></i>
                                </div>

                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" value="password" />
                            </div>

                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block btn-login">
                                <i class="entypo-login"></i>
                                Login In
                            </button>
                        </div>


                    </form>

                </div>

            </div>

        </div>


        <!-- Bottom Scripts -->
        <?php
        if (!empty($bottom_js_initial)) {
            echo add_js($bottom_js_initial);
        }
        ?>

    </body>
</html>