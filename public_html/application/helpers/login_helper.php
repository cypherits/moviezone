<?php
if(!function_exists('logged_in')){
    function logged_in(){
        $ci =& get_instance();
        if($ci->session->userdata('Users_ID') == NULL){
            redirect('login');
        }
    }
}