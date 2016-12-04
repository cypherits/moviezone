<?php if(!defined('BASEPATH')) exit('No Direct Script Access');
class login extends MX_Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $data['title'] = 'Cypher CMS - Login';
        $data['css_initial'] = array(
            'themes/admin/vendor/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css',
            'themes/admin/vendor/entypo/css/entypo.css',
            'http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic',
            'themes/admin/css/bootstrap.css',
            'themes/admin/css/neon-core.css',
            'themes/admin/css/neon-theme.css',
            'themes/admin/css/neon-forms.css',
            'themes/admin/css/custom.css'
        );
        $data['bottom_js_initial'] = array(
            'themes/admin/js/jquery-1.11.0.min.js',
            'themes/admin/vendor/gsap/main-gsap.js',
            'themes/admin/vendor/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js',
            'themes/admin/js/bootstrap.js',
            'themes/admin/js/joinable.js',
            'themes/admin/js/resizeable.js',
            'themes/admin/js/jquery.validate.min.js',
            'themes/admin/js/neon-login.js',
            'themes/admin/js/neon-api.js',
            'themes/admin/js/neon-custom.js',
            'themes/admin/js/neon-demo.js'
        );
        $this->load->view('login', $data);
    }
    public function auth(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->db->where('Users_username', $username);
        $this->db->where('Users_passwords', md5($password));
        $data = $this->db->get('users');
        if($data->num_rows() == 1){
            $this->session->set_userdata((array)$data->row());
            $status = array('login_status' => 'success');
        }else{
            $status = array('login_status' => 'invalid');
        }
        echo json_encode($status);
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect('login/index');
    }
}