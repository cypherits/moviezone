<?php if(!defined('BASEPATH')) exit('No Direct Script Access');
class Template extends MX_Controller {

    public function __construct() {
        //logged_in();
        parent::__construct();
    }
    
    public function load_admin($title, $content, $css = NULL, $tjs = NULL, $bjs = NULL){
        logged_in();
        $this->load->helper('template');
        $data = array();
        $data['title'] = $title;
        $data['meta'] = 'meta to be loaded from module';
        $data['css_initial'] = array(
            'themes/admin/vendor/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css',
            'themes/admin/vendor/entypo/css/entypo.css',
            'themes/admin/vendor/font-awesome-4.2/css/font-awesome.min.css',
            'http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic',
            'themes/admin/css/bootstrap.css',
            'themes/admin/css/neon-core.css',
            'themes/admin/css/neon-theme.css',
            'themes/admin/css/neon-forms.css',
            'themes/admin/vendor/selectboxit/jquery.selectBoxIt.css',
            'themes/admin/css/custom.css'
        );
        $data['css_aditional'] = $css;
        $data['top_js_initial'] = 'https://code.jquery.com/jquery-1.11.1.min.js';
        $data['top_js_aditional'] = $tjs;
        $data['body_header'] = Modules::run('header/get_header');
        $data['body_menu'] = Modules::run('menu/get_menu');
        $data['body_content'] = $content;
        $data['footer'] = decipher("bbbgu9DxD8/Cga4saiynV5fYvr/1TjatAo++seDHeBPCgCeXa3/fHh3ku9l0InrH5WPmIpChv14LxxUekKpy9z4PIh285QZ6Gihsri0yHDC29mhrHeUyMmMWvJcVuPbs1jo/7deKZefwWiGmJ9/Ju0M7qnib7oq2TOx2vBLue33xhl9R0RIPinLm3L/GF6AUclxdYp6HXyZozO+K27gpdQ==");
        $data['bottom_js_initial'] = array(
            'themes/admin/vendor/gsap/main-gsap.js',
            'themes/admin/vendor/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js',
            'themes/admin/js/bootstrap.js',
            'themes/admin/vendor/selectboxit/jquery.selectBoxIt.min.js',
            'themes/admin/js/joinable.js',
            'themes/admin/js/resizeable.js',
            'themes/admin/js/neon-api.js',
            'themes/admin/js/neon-custom.js',
            'themes/admin/js/neon-demo.js',
            'themes/admin/js/project-custom.js'
            );
        $data['bottom_js_aditional'] = $bjs;
        $this->load->view('master', $data);
    }
}
