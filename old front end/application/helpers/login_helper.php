<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php 
/* function is_logged_in() {
  $user = $this->session->userdata('newdata')['logged_in'];
  if (!isset($user)) { 
   return false; 
  } 
 else { 
   return true;
 }
} */ 


function is_logged_in() {
    // Get current CodeIgniter instance
    $CI =& get_instance();
    // We need to use $CI->session instead of $this->session
    $user = $CI->session->userdata('newdata');
    /*if (!isset($user)) { return false; } else { return true; }*/
      if((!isset($this->session->userdata('newdata')['logged_in'])))
      {
        redirect(base_url().'Login/login_admin');   
     }
  
}

?>