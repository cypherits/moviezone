<?php if(!defined("BASEPATH")) exit("No Direct Script Access");
/**
 * Support
 * 
 * @package CI
 * @subpackage Controller
 * 
 * @author Azim Uddin <webcypherbd@gmail.com>
 */
class Support extends MX_Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function admin_open(){
        $content = $this->load->view("support/support_form","",true);
        echo Modules::run("template/load_admin", "Open New Support Ticket", $content);
    }
}