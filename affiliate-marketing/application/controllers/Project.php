<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {
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
	    $this->load->model('Project_Modal');
	    $this->load->library('form_validation');
		if (!isset($this->session->userdata('newdata')['logged_in'])) 
		{
			redirect('Login','refresh');
		} 
	   // $this->tbl_page="tbl_page";
	}

//--------------------------------------------- Index Page --------------------------------------->
	public function view_project()
	{
		//echo "hii";die;
		$data['result'] = $this->Project_Modal->fetch_project();
		$this->load->view('admin/project-view',$data);
	}
//--------------------------------------------- End ----------------------------------------------->

//--------------------------------------------- Index Page --------------------------------------->
	public function project_Add()
	{
		if($this->input->post('register')) //if(isset($_POST['register']))
		{
			// echo "hii"; die;
	
			$project_name = $this->input->post('project_name');
			$price = $this->input->post('price');
			$slug = $this->input->post('slug');
			
			$data = array(
				'project_name' => $project_name,
				'price' => $price,
				'slug' => $slug
			);
					
				$result = $this->Project_Modal->insert_project($data);
				if($result)
				{
					//$this->db->insert('user_table',$data);
					$this->session->set_flashdata('success', 'Record Added Successfully....');
					redirect('Project/project_Add');
				}
				else
				{
					$this->session->set_flashdata('success', 'Record Not Added....');
					redirect('Project/project_Add');
				}
			
			
		}	
		else
		{
			$this->load->view('admin/project-add');
		}
	}
//--------------------------------------------- End ----------------------------------------------->
//--------------------------------------------- Delete Project ----------------------------------------------->
	public function delete_project()
		{
			if($this->uri->segment(3)===FALSE)
			{
				$project_id = 0;
			}
			else
			{
				$project_id = $this->uri->segment(3);
			}
			
			$result = $this->Project_Modal->delete_single_project($project_id);
			//$this->load->view('admin/update_project',$result);
			if($result)
			{
				//$this->db->insert('user_table',$data);
				$this->session->set_flashdata('success', 'Record Delete Successfully....');
				redirect('Project/view_project');
			}
			else
			{
				$this->session->set_flashdata('success', 'Record Not Deleted....');
				redirect('Project/view_project');
			}
		}
//--------------------------------------------- Delete Project End ----------------------------------------------->

//--------------------------------------------- Edit Project----------------------------------------------->

	public function edit_project()
	{
		if($this->uri->segment(3)===FALSE)
		{
			$project_id = 0;
		}
		else
		{
			$project_id = $this->uri->segment(3);
		}
		
		$result['data'] = $this->Project_Modal->get_project($project_id);
		$this->load->view('admin/update_project',$result);
	}
	
//--------------------------------------------- Edit Project End ----------------------------------------------->
//--------------------------------------------- Update Project ----------------------------------------------->
	public function update_project()
	{
		//echo "cnmbfh";die;
		if($this->uri->segment(3)===FALSE)
		{
			$project_id = 0;
		}
		else
		{
			$project_id = $this->uri->segment(3);
		}
		//echo $project_id;die;
		
		if($this->input->post('update'))
		{
			//echo "hiee";die;
			$project_name = $this->input->post('project_name');
			$price = $this->input->post('price');
			$slug = $this->input->post('slug');
			
			$data = array(
				'project_name' => $project_name,
				'price' => $price,
				'slug' => $slug,
			);
			
			$result = $this->Project_Modal->update_projectdata($data,$project_id);
			if($result)
			{
				//$this->db->insert('user_table',$data);
				$this->session->set_flashdata('success', 'Record Updated Successfully....');
				redirect('Project/view_project');
			}
			else
			{
				$this->session->set_flashdata('success', 'Record Not Update....');
				redirect('Project/view_project');
			}
		}
	}
	
//--------------------------------------------- Update Favicon End ----------------------------------------------->
	public function project_MultipleDelete(){

		$delIds = $this->input->post('checkChk');

		$this->Project_Modal->project_MultipleDeleted($delIds);
		
	}

}


