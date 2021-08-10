<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notice extends CI_Controller {
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
	    $this->load->model('Notice_Modal');
	    $this->load->library('form_validation');
		if (!isset($this->session->userdata('newdata')['logged_in'])) 
		{
			redirect('Login','refresh');
		} 
	   // $this->tbl_page="tbl_page";
	}

//--------------------------------------------- Index Page --------------------------------------->
	public function view_notice()
	{
		//echo "hii";die;
		$data['result'] = $this->Notice_Modal->fetch_noticedata();
		$this->load->view('admin/view-notice',$data);
	}
//--------------------------------------------- End ----------------------------------------------->

//--------------------------------------------- Add Testimonial --------------------------------------->
	public function add_notice()
	{
		if($this->input->post('register'))
		{
			$notice_name = $this->input->post('notice_name');
			$notice_description = $this->input->post('notice_description');

			$data = array(
				'notice_name' => $notice_name,
				'notice_description' => $notice_description
			);
			
			$result = $this->Notice_Modal->insert_notice($data);
			if($result)
				{
					//$this->db->insert('user_table',$data);
					$this->session->set_flashdata('success', 'Record Added Successfully....');
					redirect('Notice/add_notice');
				}
				else
				{
					$this->session->set_flashdata('success', 'Record Not Added....');
					redirect('Notice/add_notice');
				}
		}
		else
		{
			$this->load->view('admin/add-notice');
		}
	}
//--------------------------------------------- End ----------------------------------------------->

//--------------------------------------------- Testimonial ----------------------------------------------->
	public function edit_notice()
	{
		if($this->uri->segment(3)===False)
		{
			$notice_id = 0;
		}
		else
		{
			$notice_id = $this->uri->segment(3);
		}
		//echo $notice_id;die;
		
		$result['data'] = $this->Notice_Modal->get_notice_data($notice_id);
		$this->load->view('admin/update_notice',$result);
	}
//--------------------------------------------- End ----------------------------------------------->
//--------------------------------------------- update ----------------------------------------------->
	public function update_notice()
	{
		//echo "cnmbfh";die;
		if($this->uri->segment(3)===FALSE)
		{
			$notice_id = 0;
		}
		else
		{
			$notice_id = $this->uri->segment(3);
		}
		//echo $notice_id;die;
		
		if($this->input->post('update'))
		{
			//echo "hiee";die;
			
			$notice_name = $this->input->post('notice_name');
			$notice_description = $this->input->post('notice_description');

			$data = array(
				'notice_name' => $notice_name,
				'notice_description' => $notice_description
			);
			
			$result = $this->Notice_Modal->update_noticedata($data,$notice_id);
			if($result)
			{
				//$this->db->insert('user_table',$data);
				$this->session->set_flashdata('success', 'Record Updated Successfully....');
				redirect('Notice/view_notice');
			}
			else
			{
				$this->session->set_flashdata('success', 'Record Not Update....');
				redirect('Notice/view_notice');
			}
		}
	}
//--------------------------------------------- End ----------------------------------------------->
//--------------------------------------------- delete ----------------------------------------------->
public function delete_notice()
		{
			if($this->uri->segment(3)===FALSE)
			{
				$notice_id = 0;
			}
			else
			{
				$notice_id = $this->uri->segment(3);
			}
			
			$result = $this->Notice_Modal->delete_single_notice($notice_id);
			//$this->load->view('admin/update_project',$result);
			if($result)
			{
				//$this->db->insert('user_table',$data);
				$this->session->set_flashdata('success', 'Record Delete Successfully....');
				redirect('Notice/view_notice');
			}
			else
			{
				$this->session->set_flashdata('success', 'Record Not Deleted....');
				redirect('Notice/view_notice');
			}
		}
//--------------------------------------------- End ----------------------------------------------->
}


