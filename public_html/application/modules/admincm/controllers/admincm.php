<?php
class Admincm extends MX_Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        echo Modules::run("template/load_admin", "test", "test content");
    }
    public function modules($class = null, $method = null, ...$params){
        if(empty($class)){
            $this->index();
            exit();
        }else if(empty($method)){
            $moduleString = $class.'/admin_view';
        }else{
            $moduleString = $class.'/admin_'.$method;
        }
        if(!empty($params)){
            array_unshift($params, $moduleString);
            $output = call_user_func_array("Modules::run", $params);
        }else{
            $output = Modules::run($moduleString);
        }
        if(!empty($output)){
            echo $output;
        }else{
            show_404();
        }
    }
}