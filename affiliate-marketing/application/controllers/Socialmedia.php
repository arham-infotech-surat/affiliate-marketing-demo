<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Socialmedia extends CI_Controller {
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
	    $this->load->model('Socialmedia_Modal');
	    $this->load->library('form_validation');
		if (!isset($this->session->userdata('newdata')['logged_in'])) 
		{
			redirect('Login','refresh');
		} 
	   // $this->tbl_page="tbl_page";
	}

//--------------------------------------------- Index Page --------------------------------------->
	public function view_Socialmedia()
	{
		//echo "hii";die;
		$data['result'] = $this->Socialmedia_Modal->fetch_Socialmediadata();
		$this->load->view('admin/socialmedia_view',$data);
	}
//--------------------------------------------- End ----------------------------------------------->

//--------------------------------------------- Add Testimonial --------------------------------------->
	public function add_socialmedia()
	{
		if($this->input->post('register'))
		{
			$social_title = $this->input->post('social_title');
			$icon_name = $this->input->post('icon_name');
			$description = $this->input->post('description');
			$link_url = $this->input->post('link_url');
			
			
			$data = array(
				'icon_name' => $icon_name,
				'social_title' => $social_title,
				'description' => $description,
				'link_url' => $link_url
			);
			
			$result = $this->Socialmedia_Modal->insert_socialmedia($data);
			if($result)
				{
					//$this->db->insert('user_table',$data);
					$this->session->set_flashdata('success', 'Record Added Successfully....');
					redirect('Socialmedia/add_socialmedia');
				}
				else
				{
					$this->session->set_flashdata('success', 'Record Not Added....');
					redirect('Socialmedia/add_socialmedia');
				}
		}
		else
		{
			$this->load->view('admin/add-socialmedia');
		}
	}
//--------------------------------------------- End ----------------------------------------------->

//--------------------------------------------- Testimonial ----------------------------------------------->
	public function edit_social()
	{
		if($this->uri->segment(3)===False)
		{
			$social_id = 0;
		}
		else
		{
			$social_id = $this->uri->segment(3);
		}
		//echo $social_id;die;
		
		$result['data'] = $this->Socialmedia_Modal->get_social_data($social_id);
		$this->load->view('admin/update_socialmedia',$result);
	}
//--------------------------------------------- End ----------------------------------------------->
//--------------------------------------------- update ----------------------------------------------->
	public function update_socialmedia()
	{
		//echo "cnmbfh";die;
		if($this->uri->segment(3)===FALSE)
		{
			$social_id = 0;
		}
		else
		{
			$social_id = $this->uri->segment(3);
		}
		//echo $social_id;die;
		
		if($this->input->post('update'))
		{
			//echo "hiee";die;
			
			$social_title = $this->input->post('social_title');
			$icon_name = $this->input->post('icon_name');
			$description = $this->input->post('description');
			$link_url = $this->input->post('link_url');
			
			
			$data = array(
				'icon_name' => $icon_name,
				'social_title' => $social_title,
				'description' => $description,
				'link_url' => $link_url
			);
			
			$result = $this->Socialmedia_Modal->update_socialmediadata($data,$social_id);
			if($result)
			{
				//$this->db->insert('user_table',$data);
				$this->session->set_flashdata('success', 'Record Updated Successfully....');
				redirect('Socialmedia/view_Socialmedia');
			}
			else
			{
				$this->session->set_flashdata('success', 'Record Not Update....');
				redirect('Socialmedia/view_Socialmedia');
			}
		}
	}
//--------------------------------------------- End ----------------------------------------------->
//--------------------------------------------- delete ----------------------------------------------->
public function delete_social()
		{
			if($this->uri->segment(3)===FALSE)
			{
				$social_id = 0;
			}
			else
			{
				$social_id = $this->uri->segment(3);
			}
			
			$result = $this->Socialmedia_Modal->delete_single_social($social_id);
			//$this->load->view('admin/update_project',$result);
			if($result)
			{
				//$this->db->insert('user_table',$data);
				$this->session->set_flashdata('success', 'Record Delete Successfully....');
				redirect('Socialmedia/view_Socialmedia');
			}
			else
			{
				$this->session->set_flashdata('success', 'Record Not Deleted....');
				redirect('Socialmedia/view_Socialmedia');
			}
		}
//--------------------------------------------- End ----------------------------------------------->
		public function social_MultipleDelete(){

		$delIds = $this->input->post('checkChk');

		$this->Socialmedia_Modal->social_MultipleDeleted($delIds);
		
	}

}


