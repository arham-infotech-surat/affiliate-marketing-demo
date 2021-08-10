<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
		parent:: __construct();
	    $this->load->model('User_Modal');
	    $this->load->library('form_validation');
	    $this->tbladmin="tbladmin";
		if (!isset($this->session->userdata('newdata')['logged_in'])) 
		{
			redirect('Login','refresh');
		} 
		 
		// $this->load->library('pagination');
		// $this->load->helper('login');

		 //$this->session->userdata('newdata')['logged_in'];
		/* if (!isset($this->session->userdata('newdata')['logged_in'])) 
		{
			redirect('user/login_form','refresh');
		} */
	}



//--------------------------------------------- Index Page --------------------------------------->
	public function index()
	{
		//$this->load->view('admin/header');
		$this->load->view('admin/login-admin');
		//$this->load->view('admin/footer');
	}
//--------------------------------------------- End ----------------------------------------------->

//--------------------------------------------- Fetch Otp --------------------------------------->	
	public function fetch_otp()
	{
		$this->load->view('admin/fetch-otp');
	}
//--------------------------------------------- End --------------------------------------->

//--------------------------------------------- View Admins ------------------------------------->	
	public function view_admins()
	{
		$data['result'] = $this->User_Modal->fetch_admindata();
		$this->load->view('admin/view-admins',$data);
	}
//--------------------------------------------- End --------------------------------------->

//-------------------------------------- View Admin Details ------------------------------->	
	public function view_admin_details()
	{
		$AdminId = $this->input->post('AdminId');
		$data['result'] = $this->User_Modal->view_admin_data($AdminId);
		//$this->load->view('admin/view-admins',$data);
	}
//--------------------------------------------- End --------------------------------------->

 

//--------------------------------------------- Admin Creation ------------------------------------>
	public function create_admin()
	{
		//echo "string";
		//$this->load->view('admin/header');
		//$this->load->view('admin/register-admin');
		//$this->load->view('admin/footer');
		if($this->input->post('register')) //if(isset($_POST['register']))
		{
			// echo "hii"; die;
			$this->load->library('form_validation');
			$this->form_validation->set_rules('FirstName', 'Full Name', 'required');
			$this->form_validation->set_rules('LastName', 'Last Name', 'required');
			$this->form_validation->set_rules('Dob', 'Date Of Birth', 'required');
			$this->form_validation->set_rules('Gender', 'Gender', 'required');
			$this->form_validation->set_rules('EmailId', 'Email Id', 'required|is_unique[tbladmin.EmailId]');
			$this->form_validation->set_rules('PhoneNo', 'Phone Number', 'required|is_unique[tbladmin.PhoneNo]|min_length[10]|max_length[10]');
			$this->form_validation->set_rules('Password', 'Password', 'required');
			$this->form_validation->set_rules('ConfirmPassword', 'Confirm Password', 'required|matches[Password]');
			$this->form_validation->set_rules('AdminPic', '', 'callback_file_check');
			// $this->form_validation->set_rules('address', 'Address', 'required');
			// $this->form_validation->set_rules('city', 'City', 'required');
			// $this->form_validation->set_rules('country', 'Country', 'required');
			
			// $data['fieldType'] = $this->input->get('city');
			
			if ($this->form_validation->run() == FALSE)
                {
                     $this->load->view('admin/create-admin');
		   //redirect('User/register_admin');

                }
			else{

			if(!empty($_FILES['AdminPic']['name'])){

						$config['upload_path'] = 'assets/Uploads/Images/';
						$config['allowed_types'] = 'jpg|jpeg|png';
						$config['file_name'] = $_FILES['AdminPic']['name'];
						$config['max_size']	= '1000';
						//Load upload library and initialize configuration
						$this->load->library('upload',$config);
						$this->upload->initialize($config);
						
						if($this->upload->do_upload('AdminPic')){
							$uploadData = $this->upload->data();
							$AdminPic = $uploadData['file_name'];
						}else{
							$AdminPic = '';
						}
					}else{
						$AdminPic = '';
					}
			// echo $picture; die;

				$FirstName=$this->input->post('FirstName'); //$_POST['user_name']
				$LastName=$this->input->post('LastName');
				$Dob=$this->input->post('Dob');
				$Gender=$this->input->post('Gender');
				$EmailId=$this->input->post('EmailId');
				$PhoneNo=$this->input->post('PhoneNo');
				$Password=$this->input->post('Password');
				// $gender=$this->input->post('gender');
				// $hobbies_array=implode(",", $this->input->post('hobbies'));
				
				
				$data = array(
					'FirstName' =>  $FirstName,
					'LastName' => $LastName,
					'Dob' =>  $Dob,
					'Gender' =>  $Gender,
					'EmailId' => $EmailId,
					'PhoneNo' => $PhoneNo,
					'Password' => $Password,
					'AdminPic' => $AdminPic,
					'CreatedBy' => NULL,

				);
					
				$result = $this->User_Modal->insert_admin($data);
				if($result)
				{
					//$this->db->insert('user_table',$data);
					$this->session->set_flashdata('success', 'Record Added Successfully....');
					redirect(base_url().'User/create_admin');
				}
				else
				{
					$this->session->set_flashdata('success', 'Record Not Added....');
					redirect(base_url().'User/create_admin');
				}
			
			}
		}	
		else
		{
			$this->load->view('admin/create-admin');
		}
	}
//--------------------------------------------- End ----------------------------------------------->


//-------------------------------------- File Upload Check Type --------------------------------->
	public function file_check($str){
        $allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['AdminPic']['name']);
        if(isset($_FILES['AdminPic']['name']) && $_FILES['AdminPic']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('file_check', 'Please select only jpg/jpeg/png file.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
            return false;
        }
    }
//--------------------------------------------- End ----------------------------------------------->


//------------------------------------------ Admin Login ------------------------------------------>    
	public function login_admin()
	{
			$user_email=$this->input->post('email_id');
			$user_password=$this->input->post('password');
			
			$result = $this->User_Modal->fetch_user($user_email,$user_password);
			if($result)
			{
				$FirstName=$result['0'] ['FirstName'];
				$LastName=$result['0'] ['LastName'];
				$Dob=$result['0'] ['Dob'];
				$Gender=$result['0'] ['Gender'];
				$PhoneNo=$result['0'] ['PhoneNo'];
				$EmailId=$result['0'] ['EmailId'];
				$AdminPic=$result['0'] ['AdminPic'];
				$IsSuper=$result['0'] ['IsSuper'];
				$IsInsert=$result['0'] ['IsInsert'];
				$IsEdit=$result['0'] ['IsEdit'];
				$IsDelete=$result['0'] ['IsDelete'];
				$CreatedOn=$result['0'] ['CreatedOn'];
				$CreatedBy=$result['0'] ['CreatedBy'];
				$IsBlocked=$result['0'] ['IsBlocked'];
				$IsOnline=$result['0'] ['IsOnline'];

				$newdata = array(
					'FirstName' => $FirstName,
					'LastName' => $LastName,
					'Dob' => $Dob,
					'Gender' => $Gender,
					'PhoneNo' => $PhoneNo,
					'EmailId' => $EmailId,
					'AdminPic' => $AdminPic,
					'IsSuper' => $IsSuper,
					'IsInsert' => $IsInsert,
					'IsEdit' => $IsEdit,
					'IsDelete' => $IsDelete,
					'CreatedOn' => $CreatedOn,
					'CreatedBy' => $CreatedBy,
					'IsBlocked' => $IsBlocked,
					'IsOnline' => $IsOnline,
					'logged_in' => TRUE
				);

				$this->session->set_userdata('newdata', $newdata);
				//print_r($newdata); die;
				redirect(base_url().'Home/');
			}
			else
			{
				redirect('User/');				
			}
	}
//--------------------------------------------- End ----------------------------------------------->

//--------------------------Admin Forget Password----------------------------------
	public function forget_password()
	{
		$this->load->view('admin/password_recover');
		// $email = $this->input->post('email');
		// $findemail = $this->User_Modal->password_recover($email);
		
		// if($findemail)
		// {
		// 	//echo "<script>alert('$email')</script>";
		// 	$this->User_Modal->send_otp($findemail);
		// }
		// else
		// {
		// 	echo "<script>alert('$email not found, please enter correct email id')</script>";
		// }
	}
//--------------------------Admin Forget Password End---------------------------------->

//----------------------------------fetch otp------------------------------------>
	public function FetchOtp()
	{
		//session_start();
		//echo $_SESSION["Expire_Otp"];
		if($this->input->post('btnVerify')) //if(isset($_POST['register']))
		{
			$this->form_validation->set_rules('fetch_otp', 'Enter Otp', 'required');

			if ($this->form_validation->run() == FALSE)
       		{
                        $this->load->view('admin/fetch-otp');
            }
			else{	
						$fetch_otp = $this->input->post("fetch_otp");
						
						$result = $this->User_Modal->FetchOtp($fetch_otp);
						//echo "<pre>";
						//print_r($result);
						//die;
						/*if($result==){
							redirect('User/reset_password');
						}else
						*/
						if ($result == 3) {
							redirect('User/reset_password');	
						}
						elseif($result==4){
							echo "<script>alert('Otp is Incorrect :')</script>";
							$this->load->view('admin/fetch-otp');
						}	
						else{
							echo "<script>alert('Otp is Expired :')</script>";
							$this->load->view('admin/fetch-otp');	
						}
			}
		}
		
	}
//----------------------------------fetch otp end ------------------------------------>
//----------------------------------admin reset password------------------------------------>
public function reset_password()
{
	$this->load->view('admin/reset-password');	

	$this->form_validation->set_rules('password', 'Password', 'required');
	$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[passconf]');

	if($this->input->post('reset_password'))
	{
		if ($this->form_validation->run() == FALSE)
        {
            redirect(base_url().'User/reset_password');
        }
        else
        {
            $password = $this->input->post('password');
            $passconf = $this->input->post('passconf');
            
        }
			
	}
	else
	{
		$this->load->view('admin/reset-password');
	}
	
}
//-------------------------admin reset password end------------------------------------>

//-----------------admin status------------------------------------->
	public function admin_change_sts()
	{
		//echo "hi";die;
		$id = $this->input->post('AdminId');
		$status = $this->input->post('IsBlocked');

		$result = $this->User_Modal->admin_Status($id,$status);
		if($result){
				//echo $this->db->last_query();die;
				echo 1;
			}else{
				echo 0;
			}
	}

//--------------------- admin status end------------------------------------------>
}


