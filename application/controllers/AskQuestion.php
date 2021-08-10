<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class AskQuestion extends CI_Controller {

	
	public function __construct(){

		parent:: __construct();

	    $this->load->model('Ask_question_Modal');

	    $this->load->library('form_validation');
	    $this->session->keep_flashdata('success');

		if (!isset($this->session->userdata('newdata')['logged_in'])) 
		{
			redirect('Login','refresh');
		} 
	}
	
//--------------------------------------------- Index Page --------------------------------------->
	public function index()
	{
		//echo "hii";die
		if($this->uri->segment(3)===FALSE)
		{
			$ask_id = 0;
		}
		else
		{
			$ask_id = $this->uri->segment(3);
		}
		
		if($this->input->post('update'))
		{
		  //  echo "<pre>";
		  //  print_r($_POST);
		  //  die;
		    $cust_id = $this->input->post('cust_id');
    		$question = $this->input->post('question');
    		$ask_date = $this->input->post('ask_date');
    		$ask_que_status = $this->input->post('ask_que_status');
    		$reason = $this->input->post('reason');
    		//$cust_email = $this->Ask_question_Modal->getCustemailById($cust_id);
    		//echo $cust_email;die;
            $data = array(
                    'ask_que_status' => $ask_que_status,
                    'reason' => $reason
                ); 
                    
            $result = $this->Ask_question_Modal->changeaskquestatus($data,$ask_id);
            if($result)
            {
                $this->sendquestionemail($question,$reason,$cust_id,$ask_que_status,$ask_date);
                redirect('AskQuestion');
            }
            else
            {
                redirect('AskQuestion');
            }
		}
		
		$data['result'] = $this->Ask_question_Modal->fetch_askque_data();
		$this->load->view('admin/view-askquestion',$data);
	}
//--------------------------------------------- End ----------------------------------------------->

//--------------------------------------------- start ----------------------------------------------->
    #Send Email For Quick Solution response
    public function sendquestionemail($question,$reason,$cust_id,$ask_que_status,$ask_date)
	{

				$query1 = $this->db->get_where('customer_tbl',array('customer_id' => $cust_id));
				$que = $query1->result_array();
				//echo $this->db->last_query();die; 
				$first_name=$que[0]['first_name'];
				$last_name=$que[0]['last_name'];
				$customer_email=$que[0]['customer_email'];
                
    	  	    switch ($ask_que_status) {
                     case 1;
                        $ask_que_status="Pending";
                        break;
                     case 2;
                        $ask_que_status="Reviewing";
                        break;
                     case 3;
                        $ask_que_status="Cleared";
                        break;
                     case 4;
                        $ask_que_status="Cancelled";
                        break;
                      default:
                        $ask_que_status="Not View At all";
                 }
				$path1 = '../PHPMailer/PHPMailerAutoload.php';
				$path2 = '../PHPMailer/class.phpmailer.php';
				if ($query1->num_rows() > 0)
				{
					require_once($path1);
					require_once($path2);
			
					$subject = "Quick Solution Response";
					$setfrom = "Aadri Sage Advice";
					
					$mail = new PHPMailer;
					$mail -> isHTML(true);
					$mail -> isSMTP();
					//$mail->SMTPDebug = 2;
			    	$mail -> Host = 'smtp.hostinger.in';
					$mail -> SMTPSecure = 'ssl';
					$mail -> SMTPAuth = true;
					$mail -> CharSet = "UTF-8";
					$mail -> Port = 465;

                	$mail -> Username   = 'support@aadri.in';
					$mail -> Password   = 'Buzzly123';
				    $mail -> setFrom('support@aadri.in','S');
			
					$mail -> addReplyTo('replyto@example.com', 'First Last');
					$mail -> FromName = $setfrom;
					$mail -> AddAddress($customer_email);
					$mail -> Subject = $subject;
					$mail -> msgHTML('
							<html>
							<head>
							<title>HTML email</title>
							<style>

							</style>
							</head>
							<body>
							<div style="margin-top:20px;width:85%;margin:auto;border:1px solid #dedede;border-radius:5px;padding:20px;">
        						  
                                <div>
                                    <p style="font-size:14px;font-family:Roboto,sans-serif;color:#383838;font-weight:bold">Dear '.$first_name.' '.$last_name.',</p>
                                    <div style="margin-top:10px;margin-bottom:10px;">
                                <span style="font-size:13px;font-family:Roboto,sans-serif;"> Thanks for you connect with us for quick solution.your asked question deatil as following.</span>
                                        <br><br>
                                        <div style="font-family: Roboto,sans-serif;text-align:center;padding:10px;background-color:#dedede;color:#000;">
                                            Quick Soution Deatils
                                        </div>
                                        <br>
                                        <table>
                                            <tbody style="vertical-align: top;">
                                               <tr><td><strong>Question</strong></td><td>:</td><td>'.$question.'</td></tr>
                                              <tr><td style="width:13%;"><strong>Asked On</strong></td><td>:</td><td>'. date("d-m-Y:h:i:s", strtotime($ask_date)).'</td></tr>
                                            <tr><td style="width:13%;"><strong>Status</strong></td><td>:</td><td>'.$ask_que_status.'</td></tr>
                                            <tr><td><strong>Reason</strong></td><td>:</td><td>'.$reason.'</td></tr>
                                              
                                            </tbody>
                                        </table>						      
                				    </div>
            				    </div>
    				  
            				    <hr>
                			    <div style="font-size:10px;font-family:Roboto,sans-serif;color:#383838;text-align:center">
                				    <u></u>Thank you for utilising our services<u></u><br>
                				    <u></u>-<u></u><br>
                					<u></u>Aadri, The Sage Advice<u></u><br>
                					<u></u>99552 44556, 99556 22885<u></u><br>
                					<u></u><a href="www.aadri.in" target="_blank">www.aadri.in</a><u></u>
                                </div>
                            </div>
						</body>
						</html>
					');
				 	if (!$mail->send()) {
						 $_SESSION['error']='Invalid Email.';
					} 
					else {

					  //$result = $this->db->insert($this->otp_table,$data);
					  //echo '<script>alert("please check your email for OTP!");</script>';
					  //$this->session->set_flashdata('success','Check your email to reset Password...');
					  //$_SESSION['success']='Check your email to reset Password.';
					  return true;
					}	  
				}
				
						
			}
			
//--------------------------------------------- End ----------------------------------------------->			

//--------------------------------------------- Delete Data --------------------------------------->
	public function delete_askque()
	{
		//echo "hii";die
		if($this->uri->segment(3)===FALSE)
		{
		    $ask_id = 0;    
		}
		else
		{
		    $ask_id = $this->uri->segment(3);
		}
		
		$result = $this->Ask_question_Modal->delete_single_askque($ask_id);
		if($result)
		{
		    redirect('AskQuestion');
		}
		else
		{
		    redirect('AskQuestion');
		}
    }
//--------------------------------------------- End ----------------------------------------------->


}





