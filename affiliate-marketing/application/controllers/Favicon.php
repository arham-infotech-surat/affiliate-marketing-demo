<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Favicon extends CI_Controller {
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
	    $this->load->model('Favicon_Modal');
	    $this->load->library('form_validation');
		if (!isset($this->session->userdata('newdata')['logged_in'])) 
		{
			redirect('Login','refresh');
		} 
	   // $this->tbl_page="tbl_page";
	}

//--------------------------------------------- Index Page --------------------------------------->
	public function view_favicon()
	{
		//echo "hii";die;
		$data['result'] = $this->Favicon_Modal->fetch_pages();
		$this->load->view('admin/favicon-view',$data);
	}
//--------------------------------------------- End ----------------------------------------------->

//--------------------------------------------- Index Page --------------------------------------->
	public function pageAdd()
	{
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
			$this->load->view('admin/pageAdd');
		}
	}
//--------------------------------------------- End ----------------------------------------------->

//--------------------------------------------- Edit Favicon----------------------------------------------->

	
	
//--------------------------------------------- Add Favicon  ----------------------------------------------->
	public function add_favicon()
	{
		
		if($this->input->post('addfavicon'))
		{
			//echo "hiee";die;
			if(!empty($_FILES['image_name']['name'])){
				//echo "heyy";die;
						$config['upload_path'] = 'assets/Uploads/Images/'; 
						$config['allowed_types'] = 'jpg|jpeg|png|gif';
						$config['file_name'] = $_FILES['image_name']['name'];
						
						//Load upload library and initialize configuration
						$this->load->library('upload',$config);
						$this->upload->initialize($config);
						
						if($this->upload->do_upload('image_name')){
							//echo "hiee";die;
							$uploadData = $this->upload->data();
							$faviconimage = $uploadData['file_name'];
						}else{
							//echo "ngf";die;
							$faviconimage = '';
						}
						//echo $faviconimage;die;
					}
			else{
				
				$faviconimage = $this->input->post('oldimage');
			}
			
			$size = $this->input->post('size');
			$relation = $this->input->post('relation');
			
			
			$data = array(
				'size' => $size,
				'relation' => $relation,
				'image_name' => $faviconimage
			);
			
			$result = $this->Favicon_Modal->add_favicon_img($data);
			if($result)
			{
				//$this->db->insert('user_table',$data);
				$this->session->set_flashdata('success', 'Record Updated Successfully....');
				redirect('Favicon/view_favicon');
			}
			else
			{
				$this->session->set_flashdata('success', 'Record Not Update....');
				redirect('Favicon/add-favicon');
			}
		}
		else
		{
			$this->load->view('admin/add-favicon');
		}
	}
//--------------------------------------------- Edit Favicon End ----------------------------------------------->
//--------------------------------------------- Update Favicon ----------------------------------------------->
	public function edit_favicon()
	{
		if($this->uri->segment(3)===FALSE)
		{
			$fav_id = 0;
		}
		else
		{
			$fav_id = $this->uri->segment(3);
		}
		
		$result['data'] = $this->Favicon_Modal->get_favicon_img($fav_id);
		$this->load->view('admin/update_favicon',$result);
	}
	
	public function update_favicon()
	{
		if($this->uri->segment(3)===FALSE)
		{
			$fav_id = 0;
		}
		else
		{
			$fav_id = $this->uri->segment(3);
		}
		//echo $fav_id;die;
		
		if($this->input->post('update'))
		{
			//echo "hiee";die;
			if(!empty($_FILES['image_name']['name'])){
				//echo "heyy";die;
						$config['upload_path'] = 'assets/Uploads/Images/'; 
						$config['allowed_types'] = 'jpg|jpeg|png|gif';
						$config['file_name'] = $_FILES['image_name']['name'];
						
						//Load upload library and initialize configuration
						$this->load->library('upload',$config);
						$this->upload->initialize($config);
						
						if($this->upload->do_upload('image_name')){
							//echo "hiee";die;
							$uploadData = $this->upload->data();
							$faviconimage = $uploadData['file_name'];
						}else{
							//echo "ngf";die;
							$faviconimage = '';
						}
						//echo $faviconimage;die;
					}
			else{
				
				$faviconimage = $this->input->post('oldimage');
			}
			
			$size = $this->input->post('size');
			$relation = $this->input->post('relation');
			
			$data = array(
				'size' => $size,
				'relation' => $relation,
				'image_name' => $faviconimage
			);
			
			$result = $this->Favicon_Modal->update_favicon_img($data,$fav_id);
			if($result)
			{
				//$this->db->insert('user_table',$data);
				$this->session->set_flashdata('success', 'Record Updated Successfully....');
				redirect('Favicon/view_favicon');
			}
			else
			{
				$this->session->set_flashdata('success', 'Record Not Update....');
				redirect('Favicon/view_favicon');
			}
		}
	}
	
//--------------------------------------------- Update Favicon End ----------------------------------------------->

}


