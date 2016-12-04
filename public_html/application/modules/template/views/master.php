<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shorcut icon" href="<?php echo base_url('themes/admin/img/cypherits.ico'); ?>">
        
        <script>
            base_url = '<?php echo base_url(); ?>';
        </script>
        <?php 
        
        echo title($title); 
        if(!empty($css_initial)){
            echo add_css($css_initial);
        }
        if(!empty($css_aditional)){
            echo add_css($css_aditional);
        }
        
        if(!empty($top_js_initial)){
            echo add_js($top_js_initial);
        }
        if(!empty($top_js_aditional)){
            echo $top_js_aditional;
        }
        ?>

        
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="page-body">
        <div class="page-container">

            <div class="sidebar-menu">
                <header class="logo-env">
                    
                    <div class="logo">
                        <a href="<?php echo base_url().'admincm'; ?>">
                            <?php echo img(array('src' => 'themes/admin/img/cypherits.png', 'width' => '120')); ?>
                        </a>
                    </div>

                    <div class="sidebar-collapse">
                        <a href="#" class="sidebar-collapse-icon with-animation">
                            <i class="entypo-menu"></i>
                        </a>
                    </div>

                    <div class="sidebar-mobile-menu visible-xs">
                        <a href="#" class="with-animation">
                            <i class="entypo-menu"></i>
                        </a>
                    </div>

                </header>






                <?php echo $body_menu; ?>

            </div>
            
            <!-- Main Content -->
            <div class="main-content">
                <?php echo $body_header; ?>
                
                <hr style="margin: 0px; padding: 0px; padding-bottom: 20px;">
                
                <!-- Main Body -->
                <div class="row">
                    
                    
                    <div class="col-sm-12 clearfix">
                        
                        <?php echo $body_content; ?>
                        
                    </div>
                    
                    
                </div>
                <!-- /Main Body -->
                
                <br>
                <footer class="main">
                    <?php echo $footer; ?>
                </footer>
            </div>
            <!-- /Main Content -->

        </div>



        
        <!-- Bottom Scripts -->
        <?php
            if(!empty($bottom_js_initial)){
                echo add_js($bottom_js_initial);
            }
            if(!empty($bottom_js_aditional)){
                echo add_js($bottom_js_aditional);
            }
        ?>
    </body>
</html>