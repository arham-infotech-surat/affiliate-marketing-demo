<?php
class User_Modal extends CI_Model {
    
	function __construct() {
			parent::__construct();
			
			$this->admin_table="admintable";

			$this->otp_table="otp_table";
			
	}

	//---------------------- login model ---------------->
	public function fetch_user($email,$password){
		$query = $this->db->get_where($this->admin_table,array('EmailId' => $email,'Password' => $password));
		$result = $query->result_array();
			
		if($query->num_rows() > 0) {  
        	return $result;  
        }  
	   	else {  
	    	return false;       
	  	}  
	}
	//-------------------------- End --------------------->

	//----------------------- Insert Admin ------------------>
	public function insert_admin($data)
	{
		//echo "hieee";
		$result = $this->db->insert($this->admin_table,$data);
		//echo "<pre>";
		//print_r($this->db->last_query());
		return $result;
	}
	//------------------------ End -------------------------->
	
	//------------------------ fetch admin data -------------------------->
	public function fetch_admindata()
	{
		$query = $this->db->get($this->admin_table);
		$results=$query->result_array();
		return $results;
	}
	//-------------------------------- End ------------------------------->
	
	//------------------------ fetch admin details -------------------------->
	public function view_admin_data($admin_id)
	{
		$query = $this->db->get_where($this->admin_table,array('AdminId' => $admin_id));
		$result = $query->result_array();
		
		$response = "<table style='width:100%;'>";
		
		$response = "<tr>";
			$response = "<td>";
				$response = "<table cellpadding='3' cellspacing='5'>";
				while($row = mysqli_fetch_array($result))
				{
					$FirstName=ucfirst($row['FirstName']);
					$LasstName=ucfirst($row['LastName']);
					$Dob=ucfirst($row['Dob']);
					$Gender=ucfirst($row['Gender']);
					$CreatedOn=ucfirst($row['CreatedOn']);
					$CreatedBy=ucfirst($row['CreatedBy']);

					$response.= "<tr><h6 class='font-weight-semibold'>Basic Information</h6></tr>";
						$response.= "<tr>";
							$response.= "<td>Name : </td><td>".$FirstName." ".$LastName."</td>";
						$response.= "</tr>";
						$response.= "<tr>";
							$response.= "<td>Date of Birth : </td><td>".$Dob."</td>";
						$response.= "</tr>";
						$response.= "<tr>";
							$response.= "<td>Gender : </td><td>".$Gender."</td>";
						$response.= "</tr>";
						$response.= "<tr>";
							$response.= "<td>Created On : </td><td>".$CreatedOn."</td>";
						$response.= "</tr>";
						$response.= "<tr>";
							$response.= "<td>Created By : </td><td>".$CreatedBy."</td>";
						$response.= "</tr>";
				}
					$response.= "</table>";
				$response.= "</td>";

				$response.= "<td>";
				$response.= "<table cellpadding='3' cellspacing='5' style='margin-bottom: 10px;'>";
				
				while($row = mysqli_fetch_array($result))
				{
					
					$EmailId=ucfirst($row['EmailId']);
					$PhoneNo=ucfirst($row['PhoneNo']);
					$IsOnline=ucfirst($row['IsOnline']);
					$IsBlocked=ucfirst($row['IsBlocked']);
					$IsInsert=ucfirst($row['IsInsert']);
					$IsEdit=ucfirst($row['IsEdit']);
					$IsDelete=ucfirst($row['IsDelete']);

					$response.= "<tr><h6 class='font-weight-semibold'>Contact Information</h6></tr>";
					$response.= "<tr>";
						$response.= "<td>Email Id : </td><td>".$EmailId."</td>";
					$response.= "</tr>";
					$response.= "<tr>";
						$response.= "<td>Phone No : </td><td>".$PhoneNo."</td>";
					$response.= "</tr>";
				}
				$response.= "</table>";
				
				$response.= "<table>";
				while($row = mysqli_fetch_array($result))
				{
					$IsOnline=ucfirst($row['IsOnline']);
					$IsBlocked=ucfirst($row['IsBlocked']);
					$IsInsert=ucfirst($row['IsInsert']);
					$IsEdit=ucfirst($row['IsEdit']);
					$IsDelete=ucfirst($row['IsDelete']);

					$response.= "<tr><h6 class='font-weight-semibold'>Status</h6></tr>";
					$response.= "<tr>";
						$response.= "<td>Online&nbsp;&nbsp;&nbsp;</td>";
						$response.= "<td>";
						$response.= "<a>".$IsOnline."</a>";
							
						$response.= "</td>";
						
						$response.= "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Blocked&nbsp;&nbsp;&nbsp;</td>";
						$response.= "<td>";
							$response.= "<a>".$IsBlocked."</a>";
						$response.= "</td>";
					$response.= "</tr>";
					}
							$response.= "</table>";
						$response.= "</td>";
					$response.= "</tr>";
					$response.= "</table>";
					$response.= "<hr>";

					$response.= "<h6 class='font-weight-semibold'>Permissions</h6>";
					$response.= "<table>";
					while($row = mysqli_fetch_array($result))
					{
					$IsInsert=ucfirst($row['IsInsert']);
					$IsEdit=ucfirst($row['IsEdit']);
					$IsDelete=ucfirst($row['IsDelete']);
						
					$response.= "<tr>";
						$response.= "<td>Insert&nbsp;&nbsp;&nbsp;".$IsInsert."</td>";
						$response.= "<td>Insert&nbsp;&nbsp;&nbsp;".$IsEdit."</td>";
						$response.= "<td>Insert&nbsp;&nbsp;&nbsp;".$IsDelete."</td>";
					$response.= "</tr>";
					}
				$response.= "</table>";
				
		//return $result;
	}
	//-------------------------------- End ------------------------------->
	
	//------------------------ fetch emailid for recover password---------------->
	public function password_recover($email)
	{
		$this->db->select('EmailId');
		$this->db->from($this->admin_table);
		$this->db->where('EmailId',$email); 
		$query = $this->db->get();
		return $query->row_array();
	}
	//-------------------------------end---------------------------------------->

	//---------------------send otp------------------------------------------------>
	public function send_otp($findemail)
	{
		$email = $findemail['EmailId'];
		$query = $this->db->get_where($this->admin_table,array('EmailId' => $email));
		$result = $query->result_array();

		$name=$result[0]['FirstName'];

		$random_otp = rand(1000,9999);
		$created_on = date("y-m-d H:i:s");


		$_SESSION['random_otp'] = $random_otp;
		$_SESSION['EmailId'] = $email;

		$_SESSION['FirstName'] = $name;

		$_SESSION['forget_email'] = $email;


		$path1 = 'PHPMailer/PHPMailerAutoload.php';
		$path2 = 'PHPMailer/class.phpmailer.php';
		//$path3 = 'PHPMailer/content.php';

		if($query->num_rows() > 0)
		{
			$data = array(
				'otp_value' =>  $random_otp,
				'Is_expired' => 0,
				'created_on' => $created_on
			);

			require_once($path1);
			require_once($path2);

			$_SESSION['forget_email'] = $email;

			$subject = "Forget Password";
			$setfrom = "DreamInfotech";

			$mail = new PHPMailer;
			$mail -> isHTML(true);
			$mail -> isSMTP();		
			$mail -> Host = 'smtp.gmail.com';
			$mail -> SMTPSecure = 'ssl';
			$mail -> SMTPAuth = true;
			$mail -> CharSet = "UTF-8";
			$mail -> Port = 465;

			$mail -> Username   = 'bhavikdreaminfotech@gmail.com';
			$mail -> Password   = 'bhavik_dreaminfotech@123';
			$mail -> setFrom('bhavikdreaminfotech@gmail.com', 'DreamInfotech');
			$mail -> addReplyTo('replyto@example.com', 'First Last');
			$mail -> FromName = $setfrom;
			$mail -> AddAddress($email);
			$mail -> Subject = $subject;
			$mail -> msgHTML('
							<html>
							<head>
							<title>HTML email</title>
							<style>

							</style>
							</head>
							<body>
							
							<div class="c-email" style="width:60%;margin:auto;border:1px solid #BAE3FF;border-radius:5px;padding:30px 30px 12px 30px;">
						
							  <div style="text-align:center">
								<img src="https://idreaminfotech.com/wp-content/uploads/2018/01/logo.png" height="50px">
							  </div>
							  
							  <div class="c-email__content">
							    <p style="font-size:14px;font-family:roboto;color:#383838;font-weight:bold;">
							      Dear '.$_SESSION['FirstName'].',</p>
	
							    <o>You have requested to recover your password for online access to our website. We have generated a One - Time Passcode for you which will verify that you have requested access. This One - Time Passcode is time sensitive and valid for a single use.</o><br>

							    <div class="c-email__code" style="text-align:center;margin-top:10px;margin-bottom:10px">
							      <span style="font-size:15px;font-family:roboto;color:#388080;font-weight:bold;">'.$_SESSION['random_otp'].'</span>
							    </div>
							  </div>
							  <div style="text-align:center;margin-bottom:10px"> 
							  <a href="http://localhost/dialmumbai/admin/User/fetch_otp"><button class="button" style="background-color:#008CBA;border:none;border-radius:5px;color: white;padding: 10px 25px;text-align: center;text-decoration: none;display: inline-block;font-size: 12px;">Validate OTP</button></a>
							  </div>
							    <hr>
							    <div style="font-size:10px;font-family:roboto;color:#383838;text-align:center">
								    <o>Thank you for utilising our services</o><br>
								    <o>-</o><br>
									<o>Dream Infotech</o><br>
									<o>99552 44556, 99556 22885</o><br>
									<o>www.dreaminfotech@gmail.com</o><br>
									<o>Dream Infotech User Authentication</o>
								</div>
							</div>
							</body>
							</html>
						');
			if(!$mail->send())
			{
				//echo "h";die;
				$_SESSION['error'] = 'Invalid Email.';
			}
			else
			{
				//echo "hello";die;
				$result = $this->db->insert($this->otp_table,$data);
				//echo "<pre>";
				//print_r($this->db->last_query());
				echo '<script>alert("please check your email for OTP!");</script>';
				$_SESSION['success'] = 'check Your Email To Resset Password.';
				return $result;
			}
		}
		else
		{
			$_SESSION['error'] = 'Oops!!! User Email Not Exists.';
		}

	}
	//---------------------end send otp------------------------------------------------>

	//------------------------FetchOtp------------------------------------>

	public function FetchOtp($fetch_otp)
	{
			//session_start();
		date_default_timezone_set("Asia/Kolkata");
		$now = date("Y-m-d H:i:s");
		$this->db->where('otp_value',$fetch_otp);
		//$this->db->where('Is_expired !=',1);
		$this->db->where('DATE_ADD(created_on,INTERVAL 1 MINUTE) >',$now);
		$query = $this->db->get($this->otp_table);

		 
		 // echo $created_on;
		 // echo "<br>";
		 // echo "DATE_ADD(2021-01-16 10:53:56,INTERVAL 1 MINUTE)";
		 // echo "<pre>";
		 // print_r($this->db->last_query()); die;
		


		//$query = $this->db->get_where($this->otp_table,array('otp_value' => $fetch_otp,'Is_expired' => 0));
		$result = $query->result_array();
		$Is_expired = array(
			'Is_expired' =>  1
		);
		if($result)
		{	
			$incorr_otp = $this->db->get_where($this->otp_table,array('otp_value'=> $fetch_otp));
			$wrong_otp = $incorr_otp->result_array();
			//echo "<pre>";
			//print_r($wrong_otp);
			if($query->num_rows() > 0) {
				$otp_query=$this->db->update($this->otp_table,$Is_expired,array('otp_value' => $fetch_otp));
				return 3;
			}
			elseif(!$wrong_otp) {
				return 4;
			}
			else{
				$expire = $this->db->get_where($this->otp_table,array('DATE_ADD(created_on,INTERVAL 1 MINUTE) >',$now));
				$res1 = $expire->result_array();
				return 2;
			}
		}	
		else
		{
			return 2;
		}
		
	}
	
	//---------------------- FetchOtp end--------------------------------->

	//---------------admin status----------------------------->
	public function admin_Status($id,$status)
	{
		if($status==1)
		{
			$update_status = array(
				'IsBlocked' => 0
			);
			$result = $this->db->update($this->admin_table,$update_status,array('AdminId' => (int)$id));
		}
		else
		{
			$update_status = array(
				'IsBlocked' => 1
			);
			$result = $this->db->update($this->admin_table,$update_status,array('AdminId' => (int)$id));
		}
		return $result;
	}

	//-----------------admin status end---------------------->
}
?>