<?php if(!defined('BASEPATH')) exit('No Direct Script Access');


/* 
 * function to add css
 * Dynamically add intial ad aditional css
 */
if(!function_exists('add_css')){
    
    function add_css($href, $rel = 'stylesheet', $type = 'text/css'){
        if(!empty($href)){
            $CI =& get_instance();
            $string = '';
            if(is_array($href)){
                
                foreach ($href as $v){
                    if(strpos($v, '://')){
                        $string .= '<link rel="'.$rel.'" type="'.$type.'" href="'.$v.'">';
                    }else{
                        $string .= '<link rel="'.$rel.'" type="'.$type.'" href="'.$CI->config->site_url($v).'">';
                    }
                }
                
            }else{
                if(strpos($href, '://')){
                    $string .= '<link rel="'.$rel.'" type="'.$type.'" href="'.$href.'">';
                }else{
                    $string .= '<link rel="'.$rel.'" type="'.$type.'" href="'.$CI->config->site_url($href).'">';
                }
            }
            
            return $string;
            
        }else{
            return FALSE;
        }
    }
}

/*
 * Add Java Script
 */
if(!function_exists('add_js')){
    function add_js($src, $type = "text/javascript"){
        if(!empty($src)){
            $CI =& get_instance();
            $string = '';
            if(is_array($src)){
                
                foreach ($src as $v){
                    
                    if(strpos($v, '://')){
                        $string .= '<script type="'.$type.'" src="'.$v.'"></script>';
                    }else{
                        $string .= '<script type="'.$type.'" src="'.$CI->config->site_url($v).'"></script>';
                    }
                    
                }
                
            }else{
                
                if(strpos($src, '://')){
                    $string .= '<script type="'.$type.'" src="'.$src.'"></script>';
                }else{
                    $string .= '<script type="'.$type.'" src="'.$CI->config->site_url($src).'"></script>';
                }
                
            }
            
            return $string;
            
        }else{
            return FALSE;
        }
    }
}

/*
 * Add Title
 */

if(!function_exists('title')){
    function title($title){
        return '<title>'.$title.'</title>';
    }
}

/*
 * cipher and decypher text
 */
if(!function_exists('cypher')){
    function cipher($text, $key = NULL){
        if($key == NULL){
            $key = config_item('encryption_key');
        }
        $key = pack('H*', md5($key));
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $cipher = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $text, MCRYPT_MODE_CBC, $iv);
        $cipher = $iv.$cipher;
        return base64_encode($cipher);
    }
}

/*
 * decipher text
 */

if(!function_exists('decipher')){
    function decipher($text, $key = null){
        if($key == NULL){
            $key = config_item('encryption_key');
        }
        $key = pack('H*', md5($key));
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
        $text = base64_decode($text);
        $iv_dec = substr($text, 0, $iv_size);
        $text = substr($text, $iv_size);
        return mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $text, MCRYPT_MODE_CBC, $iv_dec);
    }
}