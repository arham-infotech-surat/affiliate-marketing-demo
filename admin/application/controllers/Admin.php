<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent:: __construct();
	    $this->load->model('Admin_Modal');
		if (!isset($this->session->userdata('newdata')['logged_in'])) 
		{
			redirect('Login','refresh');
		} 
	}
 
	#View Sub Admin
		public function index()
		{
			$data['result'] = $this->Admin_Modal->fetch_admindata();
			$this->load->view('admin/view_admins',$data);
		}
	#End
	
	#Create Sub Admin
		public function create_admin()
		{
			if($this->input->post('btn_add'))
			{			
				$admin_name = $this->input->post('admin_name');
				$admin_email = $this->input->post('admin_email');
				$admin_pwd = $this->input->post('admin_pwd');
				$admin_phno = $this->input->post('admin_phno');
				$is_create = $this->input->post('is_create');
				$is_edit = $this->input->post('is_edit');
				$is_delete = $this->input->post('is_delete');;
				$is_read = $this->input->post('is_read');;
				$admin_status = "1";
				//$date_added = date('Y-m-d h-i-s');
				//$date_updated = date('Y-m-d h-i-s');
				
				$data = array(
					'admin_name' => $admin_name,
					'admin_email' => $admin_email,
					'admin_pwd' => $admin_pwd,
					'admin_phno' => $admin_phno,
					'is_create' => $is_create,
					'is_edit' => $is_edit,
					'is_delete' => $is_delete,
					'is_read' => $is_read,
					'admin_status' => $admin_status
				);
					
				$result = $this->Admin_Modal->add_sub_admin($data);
				if($result)
				{
					$this->session->set_flashdata('success', 'Record Added Successfully....');
					redirect('Admin/create_admin');
				}
				else
				{
					$this->session->set_flashdata('error', 'Record Not Added....');
					redirect('Admin/create_admin');
				}
			}
			else
			{
				$this->load->view('admin/add_admin');
			}
		}
	#End


	#Fetch Data For Edit Sub Admin
		public function edit_admin()
		{
			if($this->uri->segment(3)===FALSE)
			{
				$admin_id = 0;
			}
			else
			{
				$admin_id = $this->uri->segment(3);
			}
			
			$data['result'] = $this->Admin_Modal->get_admin_data($admin_id);
			$this->load->view('admin/update_admin',$data);

		}
	#End

	#Update Sub Admin
		public function update_admin()
		{
			if($this->uri->segment(3)===FALSE)
			{
				$admin_id = 0;
			}
			else
			{
				$admin_id = $this->uri->segment(3);
			}

			if($this->input->post('update'))
			{
				$admin_name = $this->input->post('admin_name');
				$admin_email = $this->input->post('admin_email');
				$admin_pwd = $this->input->post('admin_pwd');
				$admin_phno = $this->input->post('admin_phno');
				$is_create = $this->input->post('is_create');
				$is_edit = $this->input->post('is_edit');
				$is_delete = $this->input->post('is_delete');
				$is_read = $this->input->post('is_read');
				//$admin_status = $this->input->post('admin_status');
				//$date_added = date('Y-m-d h-i-s');
				//$date_updated = date('Y-m-d h-i-s');
				
				$data = array(
					'admin_name' => $admin_name,
					'admin_email' => $admin_email,
					'admin_pwd' => $admin_pwd,
					'admin_phno' => $admin_phno,
					'is_create' => $is_create,
					'is_edit' => $is_edit,
					'is_delete' => $is_delete,
					'is_read' => $is_read,
					//'admin_status' => $admin_status
				);
				
				$result = $this->Admin_Modal->update_admindata($data,$admin_id);
				if($result)
				{	
					$this->session->set_flashdata('success', 'Record Updated Successfully....');
					redirect('Admin');
				}
				else
				{
					$this->session->set_flashdata('error', 'Record Not Update....');
					redirect('Admin');
				}
			}
		}
	#End

//--------------------------------------------- End ----------------------------------------------->

//--------------------------------------------- delete ----------------------------------------------->

		public function delete_admin()
		{
			if($this->uri->segment(3)===FALSE)
			{
				$admin_id = 0;
			}
			else
			{
				$admin_id = $this->uri->segment(3);
			}

			$result = $this->Admin_Modal->delete_single_admin($admin_id);
			if($result)
			{
				$this->session->set_flashdata('error', 'Record Delete Successfully....');
				redirect('Admin');
			}
			else
			{
				$this->session->set_flashdata('error', 'Record Not Deleted....');
				redirect('Admin');
			}
		}

}





