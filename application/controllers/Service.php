<?phpdefined('BASEPATH') OR exit('No direct script access allowed');class Service extends CI_Controller {	/**	 * Index Page for this controller.	 *	 * Maps to the following URL	 * 		http://example.com/index.php/welcome	 *	- or -	 * 		http://example.com/index.php/welcome/index	 *	- or -	 * Since this controller is set as the default controller in	 * config/routes.php, it's displayed at http://example.com/	 *	 * So any other public methods not prefixed with an underscore will	 * map to /index.php/welcome/<method_name>	 * @see https://codeigniter.com/user_guide/general/urls.html	 */	public function __construct(){		parent:: __construct();	    $this->load->model('Service_Modal');	    $this->load->library('form_validation');		if (!isset($this->session->userdata('newdata')['logged_in'])) 		{			redirect('Login','refresh');		} 	   // $this->tbl_page="tbl_page";	}//--------------------------------------------- Index Page --------------------------------------->    /*view service*/	public function index()	{	    $data['result']=$this->Service_Modal->getservices();	    $this->load->view('admin/view-service',$data);	}    /*add service*/    public function add_service()	{		if($this->input->post('addservice'))		{		    if(!empty($_FILES['image_name']['name']))		    {    			$config['upload_path'] = 'assets/Uploads/Images/'; 				$config['allowed_types'] = 'jpg|jpeg|png|gif';	    		$config['file_name'] = $_FILES['image_name']['name'];				//Load upload library and initialize configuration				$this->load->library('upload',$config);				$this->upload->initialize($config);				if($this->upload->do_upload('image_name'))				{					$uploadData = $this->upload->data();					$serviceimage = $uploadData['file_name'];				}				else				{                    $serviceimage = '';				}		}		else		{			//$serviceimage = $this->input->post('oldimg');			$serviceimage = '';		}						$service_title = $this->input->post('service_title');			$description = $this->input->post('description');			$meta_tag_title = $service_title;            $meta_tag_description = $service_title;            $meta_tag_keywords = $service_title;            $slug = $this->input->post('slug');            			$data = array(				'image_name' => $serviceimage,				'service_title' => $service_title,				'description' => $description,				'meta_tag_title' => $meta_tag_title,				'meta_tag_description' => $meta_tag_description,				'meta_tag_keywords' => $meta_tag_keywords,				'slug' => $slug			);			$result = $this->Service_Modal->add_servicedata($data);			if($result)			{				$this->session->set_flashdata('success', 'Record Added Successfully....');				redirect('Service/');			}			else			{				$this->session->set_flashdata('success', 'Record Not Added....');				redirect('Service/');			}		}		else		{				//$data['result'] = $this->Service_Modal->fetch_category();			$this->load->view('admin/add-service');		}	}	    /*edit service*/	public function edit_service()	{		if($this->uri->segment(3)===False)		{			$service_id = 0;		}		else		{			$service_id = $this->uri->segment(3);		}		//echo $service_id;die;		//$result['galleries'] = $this->Service_Modal->fetch_service_cat_data();				$result['data'] = $this->Service_Modal->get_service_data($service_id);		$this->load->view('admin/update_service',$result);	}		    /*update service*/	public function update_service()	{		if($this->uri->segment(3)===False)		{			$service_id = 0;		}		else		{			$service_id = $this->uri->segment(3);		}		//echo $service_id;die;		if($this->input->post('update'))		{			if(!empty($_FILES['image_name']['name'])){						$config['upload_path'] = 'assets/Uploads/Images/'; 						$config['allowed_types'] = 'jpg|jpeg|png|gif';						$config['file_name'] = $_FILES['image_name']['name'];						//Load upload library and initialize configuration						$this->load->library('upload',$config);						$this->upload->initialize($config);						if($this->upload->do_upload('image_name')){							$uploadData = $this->upload->data();							$serviceimage = $uploadData['file_name'];						}else{							$serviceimage = '';						}						//echo $serviceimage;die;					}			else{					$serviceimage = $this->input->post('oldimg');			}			$service_title = $this->input->post('service_title');			$description = $this->input->post('description');			$meta_tag_title = $service_title;			$meta_tag_description =  $service_title;			$slug = $service_title;			$data = array(				'image_name' => $serviceimage,				'service_title' => $service_title,				'description' => $description,				'meta_tag_title' => $meta_tag_title,				'meta_tag_description' => $meta_tag_title,				'slug' => $slug			);						$result = $this->Service_Modal->update_servicedata($data,$service_id);			if($result)			{				//$this->db->insert('user_table',$data);				$this->session->set_flashdata('success', 'Record Updated Successfully....');				redirect('Service');			}			else			{				$this->session->set_flashdata('success', 'Record Not Update....');				redirect('Service');			}		}	}	    /*delete service*/	public function delete_service()	{			if($this->uri->segment(3)===FALSE)			{				$service_id = 0;			}			else			{				$service_id = $this->uri->segment(3);			}						$result = $this->Service_Modal->delete_single_service($service_id);						if($result)			{				//$this->db->insert('user_table',$data);				$this->session->set_flashdata('success', 'Record Delete Successfully....');				redirect('Service/');			}			else			{				$this->session->set_flashdata('success', 'Record Not Deleted....');				redirect('Service/');			}	}}