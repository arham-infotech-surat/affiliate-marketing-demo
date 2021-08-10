<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class FAQ extends CI_Controller {

	
	public function __construct(){

		parent:: __construct();

	    $this->load->model('FAQ_Modal');

	    $this->load->library('form_validation');

		/*if (!isset($this->session->userdata('newdata')['logged_in'])) 

		{

			redirect('Login','refresh');

		} */

	   // $this->tbl_page="tbl_page";

	}

    #View Faq
    	public function index()
    	{
    		//$data['result'] = $this->FAQ_Modal->fetch_faqdata();
    		$this->load->view('faq');
    
    	}

//--------------------------------------------- End ----------------------------------------------->



//--------------------------------------------- Add Testimonial --------------------------------------->

	public function addfaq()
	{
		if($this->input->post('btnaddfaq'))
		{
            $faq_title = $this->input->post('faq_title');
			$description = $this->input->post('description');

			$data = array(
			    'faq_title' => $faq_title,
				'description' => $description
			);

			$result = $this->FAQ_Modal->add_faq($data);
			if($result)
				{
					$this->session->set_flashdata('success', 'Record Added Successfully....');
					$this->load->view('admin/add_faq');
				}
				else
				{
					$this->session->set_flashdata('success', 'Record Not Added....');
					redirect('FAQ/addfaq');
				}
		}
		else
		{
			//$this->session->set_flashdata('success', 'Record Added Successfully....');
			$this->load->view('admin/add_faq');
		}

	}

//--------------------------------------------- End ----------------------------------------------->



//--------------------------------------------- Testimonial ----------------------------------------------->

	public function edit_faq()
	{
		if($this->uri->segment(3)===False)
		{
			$faq_id = 0;
		}
		else
		{
			$faq_id = $this->uri->segment(3);
		}
		//echo $testimonial_id;die;

		$data['result'] = $this->FAQ_Modal->get_faq_data($faq_id);
		$this->load->view('admin/update_faq',$data);

	}

//--------------------------------------------- End ----------------------------------------------->

//--------------------------------------------- update ----------------------------------------------->

	public function update_faq()
	{
		if($this->uri->segment(3)===FALSE)
		{
			$faq_id = 0;
		}
		else
		{
			$faq_id = $this->uri->segment(3);
		}
		//echo $testimonial_id;die;
		
		if($this->input->post('btnupdatefaq'))
		{
	    	$faq_title = $this->input->post('faq_title');
			$description = $this->input->post('description');

			$data = array(
			    'faq_title' => $faq_title,
				'description' => $description
			);

			$result = $this->FAQ_Modal->update_faqdata($data,$faq_id);
			if($result)
			{
				//$this->db->insert('user_table',$data);
				$this->session->set_flashdata('success', 'Record Updated Successfully....');
				redirect('FAQ/viewfaq');
			}
			else
			{
				$this->session->set_flashdata('success', 'Record Not Update....');
				redirect('FAQ/viewfaq');
			}

		}

	}

//--------------------------------------------- End ----------------------------------------------->

//--------------------------------------------- delete ----------------------------------------------->

	public function delete_faq()
		{
			if($this->uri->segment(3)===FALSE)
			{
				$faq_id = 0;
			}
			else
			{
				$faq_id = $this->uri->segment(3);
			}

			$result = $this->FAQ_Modal->delete_single_faq($faq_id);
			if($result)
			{
				$this->session->set_flashdata('success', 'Record Delete Successfully....');
				redirect('FAQ/viewfaq');
			}
			else
			{
				$this->session->set_flashdata('success', 'Record Not Deleted....');
				redirect('FAQ/viewfaq');
			}
		}

//--------------------------------------------- End ----------------------------------------------->

}





