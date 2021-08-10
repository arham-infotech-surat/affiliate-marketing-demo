<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

  function is_logged_in() {

      $CI =& get_instance();

      $user = $CI->session->userdata('newdata');

      if((!isset($this->session->userdata('newdata')['logged_in'])))
      {
        redirect(base_url().'Login/login_admin');   
      }
  }
?>