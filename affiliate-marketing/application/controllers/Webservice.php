<?php
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';


class Webservice extends REST_Controller
{
    function Webservice()
    {	
        parent :: __construct();
    }
	
	 
    function register_get()
    {
		// load customer model to verify mobile no 
		//check requested mobile number exits or not. if not exit then register new customer other wise move to login page
		$this->load->model('customer_model', 'customer');
		
		//assign mobile no
		$mbl_no =  $this->get(mbl_no);
		
		//assign otp 
		$otp = $this->get('otp');
		
		//load otp model
		$this->load->model('otp_model', 'otp');
		
		//check valid opt enter or not
		$retinfo = $this->otp->CheckValidOTP($mbl_no);
		
		//check no of record found or not
		if(count($retinfo)>0) {
			//assign db otp 
			$db_otp = base64_decode($retinfo['0']['otp_text']);

			//compare input otp with db otp to check valida otp enter or not
			if($otp == $db_otp) {
				
				//key value array of machine
				$customer_info = $this->customer->verify_customer_mobile($mbl_no);
				
				//define register array
				$register = array();
				
				//assign platform name, device uuid, device info			
				$platform = $this->get(platform);
				$device_uuid = $this->get(deviceid);
				$device_info = $this->get(deviceinfo);
					
				//check customer info exits or not
				if(is_array($customer_info) && !empty($customer_info)) {
					$register['register'] = 'No';
					$register['cust_id']  = $customer_info['customer_id'];
					
					//update device ,platform, device id info
					//register new customer 
					$ret = $this->customer->UpdateDeviceInfo($platform, $device_uuid, $device_info, $customer_info['customer_id']);
				} else {

					//register new customer 
					$inserted_id = $this->customer->Insert($mbl_no, $platform, $device_uuid, $device_info);
					
					//check customer id exits or not
					if(!empty($inserted_id)) {
						//assign already exits value to array
						$register['register'] = 'Yes';
						$register['cust_id'] = $inserted_id;
					}
					
				}
				//$register = array('adsafsd');
				//check register array empty or not
		        if($register)
		        {
		            $this->response($register, 200); // 200 being the HTTP response code
		        }
		        else
		        {
		            $this->response(array('error' => 'Couldn\'t find any $register!'), 404);
		        }
			} else {
				$this->response(array('error' => 'Invalid OTP'), 200);
			}
		} else {
			$this->response(array('error' => 'Invalid OTP'), 200);
		}
    }
	
	function customerinfo_get()
	{
		//load customer model to edit profile
		$this->load->model('customer_model', 'customer');
			
		//edit customer info
		$customerinfo = $this->customer->getcustomerinfo($this->get(mbl_no));
		//$customer = array();

		if($customerinfo)
	    {
	        $this->response($customerinfo, 200); // 200 being the HTTP response code
	    }
	    else
	    {
		    $this->response(array('error' => 'Couldn\'t find any $customerinfo!'), 404);
	    }
	}

	function editprofile_get()
	{
		//assign mobile no,email, fname,lname
		$mbl_no = $this->get(mbl_no);
		$email 	= $this->get(email);
		$fname 	= $this->get(fname);
		$lname	= $this->get(lname);
		//load customer model to edit profile
		$this->load->model('customer_model', 'customer');
		
		//edit customer info
		$customer_info = $this->customer->update_profile($mbl_no, $email, $fname, $lname);
		//set succsess/error message base on info
		if($customer_info) {
			$customer['msg'] = "Profile has been updated successfully!!";
			$customer['title'] = "Success";
		} else{
			$customer['msg'] = "There was an error while updateing your profile";
			$customer['title'] = "Error";
			
		}
		
		if($customer)
        {
            $this->response($customer, 200); // 200 being the HTTP response code
        }
        else
        {
            $this->response(array('error' => 'Couldn\'t find any $customer!'), 404);
        }	
	}

	function faq_get()
	{
		//load faq model to edit profile
		$this->load->model('faq_model', 'faq');
		
		$faq_info = $this->faq->viewall(true);
		
		if($faq_info)
		{
			$this->response($faq_info, 200); // 200 being the HTTP response code
		}
		else{
			$this->response(array('error' => 'Couldn\'t find any $faq_info!'), 404);
		}
	}
	
	function contactinfo_get()
	{
		//get conatct number from config. i.e fromm settings
		$this->load->library('system');
		 
		$contact_number = $this->system->company_mobile;
		
		//$contact_number	=	array("test");
		if($contact_number) {
			$this->response($contact_number, 200); // 200 being the HTTP response code
		} else {
			$this->response(array('error' => 'Couldn\'t find any $contact_number!'), 404);
		}
		
	}
 
	function sellinfo_get()
	{
		//load sell model to get sell information
		$this->load->model('sell_model', 'sell');
		
		//asign customer id
		$cust_id = $this->get(cust_id);
		$mbl_no  = $this->get(mbl_no);
		$limit   = $this->get(limit);
		$month   = $this->get(month);
		$year    = $this->get(year);
		
		//get txn info base on customer id and mobile number
		$rsRecord = $this->sell->get_allsellinfo($cust_id, $limit, $month, $year);
			
		$txninfo	=	$rsRecord['sellinfo'];
		$monthyearinfo = $rsRecord['dateinfo'];
			
				
		//for dashboard wallet money
		if($limit != 0) 
		{
			//load sell model to get sell information
			$this->load->model('customer_model', 'customer');
			//get wallet amount base on customer id
			$info = $this->customer->getwalletcountbycustId($cust_id, 1);
			//print_r($info);
			$txninfo[0]['balance'] = number_format(floatval($info[0]->balance), 2, '.', '');
		} else {
			$txninfo[0]['balance']	=	0;
			$txninfo[0]['year']	=	$monthyearinfo['year'];
			
			global $asset;
			
			$monthName = $asset['SD_Month'][$monthyearinfo['month']];
			$txninfo[0]['month']	=	$monthName;
 			/*$monthName = date("F", mktime(0, 0, 0, $monthNum, 10));
			$txninfo[0]['month']	=	$monthName;*/
		}
				
		//$contact_number	=	array("test");
		if($txninfo) {
			$this->response($txninfo, 200); // 200 being the HTTP response code
		} else {
			$this->response(array('error' => 'Couldn\'t find any $txninfo!'), 200);
		}	
	}

	function moneyaddedinfo_get()
	{
		global $asset;
		
		//load sell model to get sell information
		$this->load->model('buy_model', 'buy');
		
		//asign customer id
		$cust_id = $this->get(cust_id);
		$mbl_no  = $this->get(mbl_no);
		$limit   = $this->get(limit);
		$month   = $this->get(month);
		$year    = $this->get(year);
		
		//get txn info base on customer id and mobile number
		$rsRecord = $this->buy->get_allbuyinfo($cust_id, $limit, $month, $year);
		
		$moneyaddedinfo	=	$rsRecord['buyinfo'];
		$monthyearinfo 	= 	$rsRecord['dateinfo'];
		
		$moneyaddedinfo[0]['year']	=	$monthyearinfo['year'];
		$monthName 					= 	$asset['SD_Month'][$monthyearinfo['month']];
		$moneyaddedinfo[0]['month']	=	$monthName;
		
		if($moneyaddedinfo) {
			$this->response($moneyaddedinfo, 200); // 200 being the HTTP response code
		} else {
			$this->response(array('error' => 'Couldn\'t find any $moneyaddedinfo!'), 200);
		}
	}
	
	/*function insertaddmoneyinfo_get()
	{
		global $config;

		//load sell model to get sell information
		$this->load->model('buy_model', 'buy');
		
		//assign variable
		$customerid = $this->get('cust_id');
		$deviceid 	= $this->get('deviceid');
		$amount 	= $this->get('amount');
		$latitude 	= $this->get('latitude');
		$longitude 	= $this->get('longitude');
		
		//insert date into moneyadded table, txn table
		$ret = $this->buy->Insert($customerid, $deviceid, $amount, $latitude, $longitude);

		if($ret){
			$response_array['money_id']	=	$ret;			
			$response_array['key']		=	$this->config->item('razor_key');
			$this->response($response_array, 200); // 200 being the HTTP response code
		} else {
			$this->response(array('error' => 'Error while adding money'), 200);
		}
	}
	*/
	/**
	* purpose: using last txn id capture payment info, check error code was null in captured payment data response, if error code was null then update money added tabl + insert dat into txn table then redirect to thank u page
	* 
*/
	function insertpaymentinfo_get()
	{
		//assign value of payment ID, moneamont, customer id
		$pay_txn_id 	= $this->get('pay_txn_id');
		$deviceid 		= $this->get('deviceid');
		$amount 		= floatval($this->get('amount'));
		$latitude 		= $this->get('latitude');
		$longitude 		= $this->get('longitude');
		$customerid		= $this->get('cust_id');
		$mbl_no			=	$this->get('mblno');
		
		//load sell model to get sell information
		$this->load->model('buy_model', 'buy');
		
		//insert date into moneyadded table, txn table
		$money_id = $this->buy->Insert($customerid, $deviceid, $amount, $latitude, $longitude, $pay_txn_id);
		//capture payment info using curl, and last txn id
		//if error_code was null then update money_added_tbl base on money id also insert amount value in cust_txn table and redirect to thank u page 		
		$pay_response = $this->buy->CapturePaymentInfo($pay_txn_id, $amount);
		
		//prepare money txn id
		$money_txn_id = date('mY').$money_id;
		
		/*if($pay_response){
			//$response['msg']	=	"Money has been added to your wallet successfully.";
			//$response['txn_id'] =  $pay_response;
			
			$this->response($pay_response, 200); // 200 being the HTTP response code
		} else {
			
			$this->response(array('error' => 'Error while adding money'), 200);
		}*/
		
		if(empty($pay_response['error_code']) && empty($pay_response['error_description']) && $pay_response['status'] == 'captured')
		{
			//update money added table
			$info = $this->buy->Update($money_id, $pay_txn_id, 'Completed', $pay_response, $money_txn_id);	
			//insert info into txn tabl
			//insert amount information to customer txn table
			$this->load->model('transaction_model', 'txn');
			
			//insert sell information
			$ret	=	$this->txn->Insert($customerid, $amount, 0, $money_id, 0);
			
			/*$balance = $this->txn->GetTotalBlanceByCustID($customerid);
			$balance = number_format(floatval($balance), 2, '.', '');*/
			//load sell model to get sell information
			$this->load->model('customer_model', 'customer');
		
			//get wallet amount base on customer id
			$custinfo = $this->customer->getwalletcountbycustId($customerid, 1);
			$balance = number_format(floatval($custinfo[0]->balance), 2, '.', '');
			
			//get buy date info by id
			$buyinfo = $this->buy->get_InfoById($money_id);
					
			//assign sell date
			$date = new DateTime($buyinfo[0]->money_date);
			
			//send msg to customer on succsessfully money added.
			$mobile		=	trim($mbl_no); 
			$amt 		= 	floatval($amount/100);		
			$message 	= 	urlencode("Hi, Rs ".$amt." has been added to your wallet. Your Updated Balance is Rs ".$balance); 
			$baseurl 	=	$this->config->item('sms_baseurl');  
			$url 		=	$baseurl."?username=".$this->config->item('sms_username')."&password=".$this->config->item('sms_password')."&type=".$this->config->item('sms_type')."&sender=".$this->config->item('sms_sender')."&mobile=".$mobile."&message=".$message; 
			$return 	= 	file($url);
			
			list($send,$msgcode) = split('[|]',$return[0]);

			/*if ($send == "SUBMIT_SUCCESS "){
				$this->response(array('msg' => "OTP has been sent successfully"), 200);
			}*/
			
			
			
			//send mail to customer
			$record = $this->buy->send_email_tocustomer($customerid, 0, $amount, $money_txn_id, $date->format('M j, Y H:i'));
						
		} else {
			$info = $this->buy->Update($money_id, 0, 'Error', $pay_response, $money_txn_id);			
		}

		if($send == "SUBMIT_SUCCESS "){
			//$response['msg']	=	"Money has been added to your wallet successfully.";
			$response['txn_id'] 	=  $money_txn_id;
			$response['balance']	=	$balance;
			
			$this->response($response, 200); // 200 being the HTTP response code
		} else {
			
			$this->response(array('error' => 'Error while adding money'), 200);
		}
		
	}
	
	function getblanceinfo_get()
	{
		//assign customer id 
		$customerid = $this->get('cust_id');
		//load sell model to get sell information
		$this->load->model('customer_model', 'customer');
		
		//get wallet amount base on customer id
		$custinfo = $this->customer->getwalletcountbycustId($customerid, 1);
		
		$balance = number_format(floatval($custinfo[0]->balance), 2, '.', '');
		
		if($balance){
			//$response['msg']	=	"Money has been added to your wallet successfully.";
			$response['balance']	=	$balance;
			
			$this->response($response, 200); // 200 being the HTTP response code
		} else {
			
			$this->response(array('error' => 'Error while adding money'), 200);
		}	
	}
	
	function getwaterqty_get()
	{
		//load sell model to get sell information
		$this->load->model('waterprice_model', 'waterprice');
		
		//get wallet amount base on customer id
		$Record = $this->waterprice->viewall();
		
		//define array
		$retinfo = array();
		$response = array();
		
		//iterate throught info 		
		foreach($Record as $info) {
			if($info['water_qty']>= 1000) {
				$retinfo['qty']	=	($info['water_qty']/1000).' Ltr.';
			} else {
				$retinfo['qty']	=	$info['water_qty'].' ml.';
			}
			$retinfo['key']	=	$info['water_qty'].'_'.$info['water_rate'].'_'.$info['water_rate_container'];
			
			array_push($response, $retinfo);
		}
		if($response){
			$this->response($response, 200); // 200 being the HTTP response code
		} else {
			
			$this->response(array('error' => 'Error while adding money'), 200);
		}
		
	}
	function insertbuywater_get()
	{
		//assign variable
		$customer_id 	=	$this->get('customer_id');
		$price			=	$this->get('price');
		$water_qty		=	$this->get('water_qty');
		$machine_no		=	$this->get('machine_no');
		$mbl_no			=	$this->get('mblno');
		//check machin code valid or not
		//include machine modal
		$this->load->model('machine_model', 'machine');
		
		//check machine code valid or not
		$ret = $this->machine->checkvalidmachinecode($machine_no);

		if($ret) {
			
			//load sell model to get sell information
			$this->load->model('customer_model', 'customer');
		
			//get wallet amount base on customer id
			$custinfo = $this->customer->getwalletcountbycustId($customer_id, 1);
			$balance = number_format(floatval($custinfo[0]->balance), 2, '.', '');

			//check total balnce was grater then  price
			if($balance >= $price) {
				
				//get machine info by machine code
				$machine_info = $this->machine->getmachineinfobymachinecode($machine_no);
				//insert info into sell table/txn table
				//load sell model to insert sell information
				$this->load->model('sell_model', 'sell');
				
				//expload filed
				$waterqty = explode("_",$water_qty);
				
				//insert into sell model
				$buy_id = $this->sell->Insert($customer_id, $machine_info->machine_id, $waterqty[0], 'ml', $price);
				
				//check inserted id
				if($buy_id) {
					$txn_no = date('mY').$buy_id;

					//if not empty the update sell_txn_no
					$ret = $this->sell->Update($buy_id, $txn_no);
					
					//insert into txn table
					//insert amount information to customer txn table
					$this->load->model('transaction_model', 'txn');
					
					//insert sell information
					$txn	=	$this->txn->Insert($customer_id, 0, $price, 0, $buy_id);
					
					//get sell date info by id
					$sellinfo = $this->sell->getsellInfobyId($buy_id);
					
					//get balance info
					/*$balance = $this->txn->GetTotalBlanceByCustID($customer_id);
					$balance = number_format(floatval($balance), 2, '.', '');*/
					//load sell model to get sell information
					$this->load->model('customer_model', 'customer');
				
					//get wallet amount base on customer id
					$custinfo = $this->customer->getwalletcountbycustId($customer_id, 1);
					$balance = number_format(floatval($custinfo[0]->balance), 2, '.', '');
					
					//send msg to customer on succsessfully money added.
					$mobile		=	trim($mbl_no); 
					$message 	= 	urlencode("Hi, thank you for choosing Hi-Tech Ro water. Your Updated Balance is Rs ".$balance); 
					$baseurl 	=	$this->config->item('sms_baseurl');  
					$url 		=	$baseurl."?username=".$this->config->item('sms_username')."&password=".$this->config->item('sms_password')."&type=".$this->config->item('sms_type')."&sender=".$this->config->item('sms_sender')."&mobile=".$mobile."&message=".$message; 
					$return 	= 	file($url);
					
					list($send,$msgcode) = split('[|]',$return[0]);
						
					//assign sell date
					$date = new DateTime($sellinfo[0]['sell_date']);
			
					//send mail to customer
					$info = $this->sell->send_email_tocustomer($customer_id, $machine_info->machine_id, $price, $txn_no, $date->format('M j, Y H:i'));
					
					

					/*if ($send == "SUBMIT_SUCCESS "){
						$this->response(array('msg' => "OTP has been sent successfully"), 200);
					}*/
					
					
					//create response array()
					$response = array();
					
					//check data inserted or not
					if($txn == TRUE && $send == "SUBMIT_SUCCESS ") {
						$response['msg'] = 'Thank you for buying water';
						$response['txn_id']	=	$txn_no;
						
						$this->response($response, 200); // 200 being the HTTP response code
					} else {
						$this->response(array('error' => 'Error while buying water'), 200);				
					}	
				} else {
						$this->response(array('error' => 'Error while buying water'), 200);				
					}
							
			} else {
				$this->response(array('error' => 'Please check your wallet balance.'), 200);				
			}
		} else {
			$this->response(array('error' => 'Please enter valid machine code'), 200);
		}
	}
	
	function sendotp_get()
	{
		//assign mobile number
		$mbl_no = $this->get('mbl_no');
		
		//load required library
		//generate 6 charachter random password
		$this->load->library('Functions');
		$OTP = $this->functions->RandomPassword(6);
		
		//Insert otp, mobile number to otp master table
		$this->load->model('otp_model', 'otp');
					
		//insert sell information
		$inserted_id	=	$this->otp->Insert($mbl_no, $OTP);
		
		//send otp message to customer
		$mobile		=	trim($mbl_no); 
		$message 	= 	urlencode($OTP." is your OTP for Hi-Tech Money."); 
		$baseurl 	=	$this->config->item('sms_baseurl');  
		$url 		=	$baseurl."?username=".$this->config->item('sms_username')."&password=".$this->config->item('sms_password')."&type=".$this->config->item('sms_type')."&sender=".$this->config->item('sms_sender')."&mobile=".$mobile."&message=".$message; 
		$return 	= 	file($url);
		
		list($send,$msgcode) = split('[|]',$return[0]);

		if ($send == "SUBMIT_SUCCESS "){
			$this->response(array('msg' => "OTP has been sent successfully"), 200);
		}
		else {
			$this->response(array('error' => 'Send message failed'), 200);
		}
	}
}
?>