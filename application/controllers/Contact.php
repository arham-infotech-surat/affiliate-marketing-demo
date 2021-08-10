 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

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
	    $this->load->model('Contact_Modal');
	    $this->load->library('form_validation');
	    $this->tbl_contact="tbl_contact";
	    $this->tbl_contactdetails="tbl_contactdetails";
		if (!isset($this->session->userdata('newdata')['logged_in'])) 
		{
			redirect('Login','refresh');
		} 
	}



//--------------------------------------------- Index Page --------------------------------------->
	public function index()
	{
		$data['result'] = $this->Contact_Modal->fetch_contacts();
		$this->load->view('admin/contactView',$data);
	}
//--------------------------------------------- End ----------------------------------------------->

//------------------------------------- Contact Info ---------------------------------------------->
	public function contact_Info()
	{
		if($this->uri->segment(3) === false){ //$_GET['user_Id']
			$con_id = 0;
		}
		else{
			$con_id = $this->uri->segment(3);
		}
		// echo $con_id; die;
		$result['data'] = $this->Contact_Modal->get_contact_info($con_id);
		$this->load->view('admin/contact_Info',$result);
	}
//------------------------------------------- End -------------------------------------------------> 

//--------------------------------------------- Contact Info View Page --------------------------------------->
	public function contact_InfoView()
	{
		$data['result'] = $this->Contact_Modal->fetch_contact_info();
		$this->load->view('admin/contact_InfoView',$data);
	}
//--------------------------------------------- End ----------------------------------------------->


//------------------------------------------ Contact More details Delete -------------------------------------------->
	public function delete_contact_info()
	{
		if($this->uri->segment(3) === false){
			$contact_id = 0;
		}
		else{
			$contact_id = $this->uri->segment(3);
		}
		//echo $user_Id; die;
			
		$result = $this->Contact_Modal->page_ContactInfo_Remove($contact_id);
		
		
		if($result){
			redirect('Contact/contact_InfoView');
		}
	}
//--------------------------------------------- End ------------------------------------------------->

//--------------------------------------- Edit page ------------------------------------------->
	public function edit_contact()
	{
		if($this->uri->segment(3) === false){ //$_GET['user_Id']
			$con_id = 0;
		}
		else{
			$con_id = $this->uri->segment(3);
		}
		// echo $con_id; die;
		$result['data'] = $this->Contact_Modal->get_contact_data($con_id);
		$this->load->view('admin/editContact',$result);
	}
	
	//Update Page
	public function editContact()
	{
		if($this->uri->segment(3) === false){ //$_GET['user_Id']
			$con_id = 0;
		}
		else{
			$con_id = $this->uri->segment(3);

		}
		
		if($this->input->post('Edit')) //if(isset($_POST['update']))
		{	
			$maptag=$this->input->post('maptag'); //$_POST['user_name']
			$email=$this->input->post('email');
			$contact_no=$this->input->post('contact_no');
			$opening_hours=$this->input->post('opening_hours');
			$contact_desc=$this->input->post('contact_desc');
			$branch=$this->input->post('branch');
			$meta_tag_title=$this->input->post('meta_tag_title');
			$meta_tag_description=$this->input->post('meta_tag_description');
			$meta_tag_keywords=$this->input->post('meta_tag_keywords');
		
			$data = array(
				'maptag' =>  $maptag,
				'email' => $email,
				'contact_no' =>  $contact_no,
				'opening_hours' =>  $opening_hours,
				'contact_desc' => $contact_desc,
				'branch' => $branch,
				'meta_tag_title' => $meta_tag_title,
				'meta_tag_description' => $meta_tag_description,
				'meta_tag_keywords' => $meta_tag_keywords
			);

			// $page_ID=$this->session->userdata('page_ID');
			$result = $this->Contact_Modal->edit_Contact($data,$con_id);
			if($result)
			{
			//$this->db->insert('user_table',$data);
				$this->session->set_flashdata('success', 'Record Updated Successfully....');
				// redirect('Page/pageEditAddMore');
				//redirect('Contact/');	
				$data['result'] = $this->Contact_Modal->fetch_contacts();
				$this->load->view('admin/contactView',$data);
			}
			else
			{
				$this->session->set_flashdata('success', 'Record Not Update....');
				$data['result'] = $this->Contact_Modal->fetch_contacts();
				$this->load->view('admin/contactView',$data);
			}
			
		} 
		else
		{
			$this->load->view('admin/editContact/');
		}
	}
//------------------------------------------ End Edit Add Page ------------------------------------------>

//------------------------------- Gallery Multiple Delete --------------------------->
	public function contact_MultipleDelete(){

		$delIds = $this->input->post('checkChk');

		$this->Contact_Modal->contact_MultipleDelete($delIds);
		
	}
//------------------------------------------ End ----------------------------------->


}


