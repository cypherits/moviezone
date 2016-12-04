<?php if(!defined('BASEPATH')) exit('No Direct Script Access.');
class Menu extends MX_Controller{
    public function __construct() {
        parent::__construct();
        //logged_in();
    }
    public function get_menu(){
        /*if($this->session->userdata('role') == 'admin'){
            $this->load->view('admin_menu');
        }else{
            $this->load->view('manager_menu');
        }*/
        $this->load->view('admin_menu');
    }
    
}