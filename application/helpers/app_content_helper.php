<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
    if(!function_exists('encode')){        
        function encode($input) {
            return strtr(base64_encode($input), '+/=', '._-');
        }
    }

    if(!function_exists('decode')){        
        function decode($input) {
            return base64_decode(strtr($input, '._-', '+/='));
        }
    }