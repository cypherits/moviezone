<?php if(!defined('BASEPATH')) exit('No Direct Script Access');
class Header extends MX_Controller{
    public function __construct() {
        parent::__construct();
        //logged_in();
    }
    public function get_header(){
        $data['title'] = "Cypher Movie Zone";
        $this->load->view('load_header', $data);
    }
}