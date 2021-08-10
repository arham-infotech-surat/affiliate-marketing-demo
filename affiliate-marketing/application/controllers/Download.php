<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller {
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
	    $this->load->model('Download_Modal');
	    $this->load->library('form_validation');
		if (!isset($this->session->userdata('newdata')['logged_in'])) 
		{
			redirect('Login','refresh');
		} 
	   // $this->tbl_page="tbl_page";
	}

//--------------------------------------------- Index Page --------------------------------------->
	
	
	public function view_downloadcat()
	{
		//echo "hii";die;
		$data['result'] = $this->Download_Modal->fetch_downloadcat();
		$this->load->view('admin/view-downloadcat',$data);
	}
	
	
//--------------------------------------------- End ----------------------------------------------->

//--------------------------------------------- Add Testimonial --------------------------------------->
	public function add_downloadcat()
	{
		if($this->input->post('register'))
		{
			$slug = $this->input->post('slug');
			$cat_name = $this->input->post('cat_name');
			
			
			$data = array(
				'slug' => $slug,
				'cat_name' => $cat_name
				
			);
			
			$result = $this->Download_Modal->insert_downloadcat($data);
			if($result)
				{
					//$this->db->insert('user_table',$data);
					$this->session->set_flashdata('success', 'Record Added Successfully....');
					redirect('Download/add_downloadcat');
				}
				else
				{
					$this->session->set_flashdata('success', 'Record Not Added....');
					redirect('Download/add_downloadcat');
				}
		}
		else
		{
			$this->load->view('admin/add-downloadcat');
		}
	}
//--------------------------------------------- End ----------------------------------------------->

//--------------------------------------------- Testimonial ----------------------------------------------->
	public function get_downloadcat()
	{
		if($this->uri->segment(3)===False)
		{
			$cat_id = 0;
		}
		else
		{
			$cat_id = $this->uri->segment(3);
		}
		//echo $cat_id;die;
		
		$result['data'] = $this->Download_Modal->get_downloadcat_data($cat_id);
		$this->load->view('admin/update_downloadcat',$result);
	}
//--------------------------------------------- End ----------------------------------------------->
//--------------------------------------------- update ----------------------------------------------->
	public function update_downloadcat()
	{
		//echo "cnmbfh";die;
		if($this->uri->segment(3)===FALSE)
		{
			$cat_id = 0;
		}
		else
		{
			$cat_id = $this->uri->segment(3);
		}
		//echo $cat_id;die;
		
		if($this->input->post('update'))
		{
			//echo "hiee";die;
			$slug = $this->input->post('slug');
			$cat_name = $this->input->post('cat_name');
			
			
			$data = array(
				'slug' => $slug,
				'cat_name' => $cat_name
				
			);
			
			$result = $this->Download_Modal->update_downloadcatdata($data,$cat_id);
			if($result)
			{
				//$this->db->insert('user_table',$data);
				$this->session->set_flashdata('success', 'Record Updated Successfully....');
				redirect('Download/view_downloadcat');
			}
			else
			{
				$this->session->set_flashdata('success', 'Record Not Update....');
				redirect('Download/view_downloadcat');
			}
		}
	}
//--------------------------------------------- End ----------------------------------------------->
//--------------------------------------------- delete ----------------------------------------------->
	public function delete_download()
		{
			if($this->uri->segment(3)===FALSE)
			{
				$download_id = 0;
			}
			else
			{
				$download_id = $this->uri->segment(3);
			}
			
			$result = $this->Download_Modal->delete_single_download($download_id);
			
			if($result)
			{
				//$this->db->insert('user_table',$data);
				$this->session->set_flashdata('success', 'Record Delete Successfully....');
				redirect('Download/view_download');

			}
			else
			{
				$this->session->set_flashdata('success', 'Record Not Deleted....');
				redirect('Download/view_download');
			}
		}
		
		public function delete_downloadcat()
		{
			if($this->uri->segment(3)===FALSE)
			{
				$cat_id = 0;
			}
			else
			{
				$cat_id = $this->uri->segment(3);
			}
			
			$result = $this->Download_Modal->delete_single_downloadcat($cat_id);
			
			if($result)
			{
				//$this->db->insert('user_table',$data);
				$this->session->set_flashdata('success', 'Record Delete Successfully....');
				redirect('Download/view_downloadcat');

			}
			else
			{
				$this->session->set_flashdata('success', 'Record Not Deleted....');
				redirect('Download/view_downloadcat');
			}
		}
//--------------------------------------------- End ----------------------------------------------->

	public function view_download()
	{
		//echo "hii";die;
		$data['result'] = $this->Download_Modal->fetch_downloaddata();
		$this->load->view('admin/view-download',$data);
	}
	
	public function add_download()
	{
		if($this->input->post('add_download'))
		{
			//echo "hiee";die;
			if(!empty($_FILES['pdf_file']['name'])){
				//echo "heyy";die;
						$config['upload_path'] = 'assets/Uploads/certificates/'; 
						$config['allowed_types'] = 'pdf';
						$config['file_name'] = $_FILES['pdf_file']['name'];
						
						//Load upload library and initialize configuration
						$this->load->library('upload',$config);
						$this->upload->initialize($config);
						
						if($this->upload->do_upload('pdf_file')){
							//echo "hiee";die;
							$uploadData = $this->upload->data();
							$pdf_file = $uploadData['file_name'];
						}else{
							//echo "ngf";die;
							$pdf_file = '';
						}
						//echo $pdf_file;die;
					}
			
			
			if(!empty($_FILES['exl_file']['name'])){
				//echo "heyy";die;
				 		// require_once APPPATH . "/Classes/PHPExcel.php";
						$config['upload_path'] = 'assets/Uploads/certificates/'; 
						$config['allowed_types'] = 'csv|xls|xlsx|xlsm|xlsb|xltx|xltm';
						$config['file_name'] = $_FILES['exl_file']['name'];
						
						//Load upload library and initialize configuration
						$this->load->library('upload',$config);
						$this->upload->initialize($config);
						
						if($this->upload->do_upload('exl_file')){
							//echo "hiee";die;
							$uploadData = $this->upload->data();
							$exl_file = $uploadData['file_name'];
						}else{
							//echo "ngf";die;
							$exl_file = '';
						}
						//echo $exl_file;die;
					}
		
			$slug = $this->input->post('slug');
			$download_name = $this->input->post('download_name');
			$cat_ids=$this->input->post('cat_id');
			$cat_id=implode(",", $cat_ids);
			
			$data = array(
				
				'download_name' => $download_name,
				'cat_id' =>  $cat_id,
				'pdf_file' => $pdf_file,
				'exl_file' => $exl_file,
				'slug' => $slug
				
			);
			echo "<pre>"; print_r($data); die;
			$result = $this->Download_Modal->add_downloaddata($data);
			if($result)
			{
				//$this->db->insert('user_table',$data);
				$this->session->set_flashdata('success', 'Record Add Successfully....');
				redirect('Download/view_download');
			}
			else
			{
				$this->session->set_flashdata('success', 'Record Not Update....');
				redirect('Download/view_download');
			}
		}
		else
		{
			$data['result'] = $this->Download_Modal->fetch_download_data();
			$this->load->view('admin/add-download',$data);
		}
	}
	
	
	
	
	public function update_service()
	{
		if($this->uri->segment(3)===False)
		{
			$service_id = 0;
		}
		else
		{
			$service_id = $this->uri->segment(3);
		}
		//echo $service_id;die;
		
		if($this->input->post('update'))
		{
			//echo "hiee";die;

		
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
							$serviceimage = $uploadData['file_name'];
						}else{
							//echo "ngf";die;
							$serviceimage = '';
						}
						//echo $serviceimage;die;
					}
			else{
				
				$serviceimage = $this->input->post('oldimg');
			}
			
			$slug = $this->input->post('slug');
			$service_title = $this->input->post('service_title');
			$description = $this->input->post('description');
			$meta_tag_title = $this->input->post('meta_tag_title');
			
			
			
			$data = array(
				'image_name' => $serviceimage,
				'service_title' => $service_title,
				'description' => $description,
				'meta_tag_title' => $meta_tag_title,
				'slug' => $slug
			);
			
			$result = $this->Service_Modal->update_servicedata($data,$service_id);
			if($result)
			{
				//$this->db->insert('user_table',$data);
				$this->session->set_flashdata('success', 'Record Updated Successfully....');
				redirect('Service/view_service');
			}
			else
			{
				$this->session->set_flashdata('success', 'Record Not Update....');
				redirect('Service/view_service');
			}
		}
	}

	public function edit_download()
	{
		if($this->uri->segment(3)===False)
		{
			$download_id = 0;
		}
		else
		{
			$download_id = $this->uri->segment(3);
		}
		//echo $download_id;die;
		$result['downloads'] = $this->Download_Modal->get_downloads_data();
		$result['data'] = $this->Download_Modal->get_download_data($download_id);
		$this->load->view('admin/update_download',$result);
	}
	
	public function update_download()
	{
		//echo "cnmbfh";die;
		if($this->uri->segment(3)===FALSE)
		{
			$download_id = 0;
		}
		else
		{
			$download_id = $this->uri->segment(3);
		}
		//echo $download_id;die;
		
		if($this->input->post('update'))
		{
			if(!empty($_FILES['pdf_file']['name'])){
				//echo "heyy";die;
						$config['upload_path'] = 'assets/Uploads/certificates/'; 
						$config['allowed_types'] = 'pdf';
						$config['file_name'] = $_FILES['pdf_file']['name'];
						
						//Load upload library and initialize configuration
						$this->load->library('upload',$config);
						$this->upload->initialize($config);
						
						if($this->upload->do_upload('pdf_file')){
							//echo "hiee";die;
							$uploadData = $this->upload->data();
							$pdf_file = $uploadData['file_name'];
						}else{
							//echo "ngf";die;
							$pdf_file = '';
						}
						//echo $pdf_file;die;
					}
			
			
			if(!empty($_FILES['exl_file']['name'])){
				//echo "heyy";die;
						$config['upload_path'] = 'assets/Uploads/certificates/'; 
						$config['allowed_types'] = 'csv|xls|xlsx|xlsm|xlsb|xltx|xltm';
						$config['file_name'] = $_FILES['exl_file']['name'];
						
						//Load upload library and initialize configuration
						$this->load->library('upload',$config);
						$this->upload->initialize($config);
						
						if($this->upload->do_upload('exl_file')){
							//echo "hiee";die;
							$uploadData = $this->upload->data();
							$exl_file = $uploadData['file_name'];
						}else{
							//echo "ngf";die;
							$exl_file = '';
						}
						//echo $exl_file;die;
					}
			
			
			$slug = $this->input->post('slug');
			$download_name = $this->input->post('download_name');
			$cat_ids=$this->input->post('cat_id');
			$cat_id=implode(",", $cat_ids);
		
			$data = array(
				'download_name' => $download_name,
				'cat_id' => $cat_id,
				'pdf_file' => $pdf_file,
				'exl_file' => $exl_file,
				'slug' => $slug
				
			);
			
			$result = $this->Download_Modal->update_downloaddata($data,$download_id);
			if($result)
			{
				//$this->db->insert('user_table',$data);
				$this->session->set_flashdata('success', 'Record Updated Successfully....');
				redirect('Download/view_download');
			}
			else
			{
				$this->session->set_flashdata('success', 'Record Not Update....');
				redirect('Download/view_download');
			}
		}
	}
	
	public function downloadcat_MultipleDelete(){

		$delIds = $this->input->post('checkChk');

		$this->Download_Modal->downloadcat_MultipleDeleted($delIds);
		
	}
	
	
	public function download_MultipleDelete(){

		$delIds = $this->input->post('checkChk');

		$this->Download_Modal->download_MultipleDeleted($delIds);
		
	}
}


