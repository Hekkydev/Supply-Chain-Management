<?php
defined('BASEPATH') or exit('Not open Scripting');

/**
 * Description of Pmail
 *
 * @author ASUS
 */
class Pmail {

     var $CI;
     public function __construct() {
         require_once('PHPMailer/PHPMailerAutoload.php');
         $this->CI =& get_instance();
     }


     
}
