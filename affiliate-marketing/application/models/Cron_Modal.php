<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origins, Content-Type, X-Auth-Token, Authorization');




class Cron_Modal extends CI_Model {
	function cron_job() {
	    $msg = "Hii..! Thanks for connecting with us.";
	    $msg = wordwrap($msg,70);
	    echo  "hiiii";
	    //send mail
	    //mail("ashleytutorials07@gmail.com","Codeignator cron job by Ashish",$msg);
	}
}

?>