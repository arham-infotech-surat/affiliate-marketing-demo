 <?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){

		parent:: __construct();

	     $this->load->model('Home_Modal');
	    // $this->load->model('Comment_Modal');
     	// $this->load->model('Team_Modal');
	    // $this->load->library('form_validation');
	    // $this->tbl_logo="tbl_logo";

		// if (!isset($this->session->userdata('newdata')['logged_in'])) 
		// {

		// 	redirect('Login','refresh');

		// } 

	}


//--------------------------------------------- Index Page --------------------------------------->

	public function index()
	{
		$data['logo'] = $this->Home_Modal->fetch_logo();
		$data['slider'] = $this->Home_Modal->fetch_sliders();
		$data['categories'] = $this->Home_Modal->fetch_cats();
		$this->load->view('index',$data);
	}
	
	public function Deals_Offers()
	{
		if($this->uri->segment(3)==FALSE)
		{
			$slider_id = 0;
		}
		else
		{
			$slider_id = $this->uri->segment(3);
		}
		
		$data['logo'] = $this->Home_Modal->fetch_logo();
		$data['slider_desc'] = $this->Home_Modal->fetch_slider_desc($slider_id);
		$this->load->view('slider_desc',$data);
	}

//--------------------------------------------- End ----------------------------------------------->

//-------------------commnets---------------------------------------
    public function comment()
	{
		$data['comments'] = $this->Comment_Modal->get_blogcomments();
		$this->load->view('admin/view-comments',$data);
	}
//------------------end---------------------------------------------


//--------------------------------------------- Index Page --------------------------------------->

	public function dashboard()
	{
		/* $data['userresults']=$this->Home_Modal->display_userdata();
		$data['blogs']=$this->Home_Modal->display_blogdata();
		$data['inq']=$this->Home_Modal->display_inqdata();
		$data['Order']=$this->Home_Modal->display_Orderdata();
		$data['payment']=$this->Home_Modal->display_paymentdata();
		$data['paydata']=$this->Home_Modal->display_payment();
		$data['orderdata']=$this->Home_Modal->display_orders();
		$data['inqdata']=$this->Home_Modal->display_inqs(); */
	    /*echo "<pre>";
		print_r($data);die;*/
		$this->load->view('admin/dashboard_new',$data);
	}

//--------------------------------------------- End ----------------------------------------------->



public function edit_logo()

	{

		if($this->uri->segment(3) === false){ //$_GET['logo_id']

			$logo_id = 0;

		}

		else{

			$logo_id = $this->uri->segment(3);

		}

		//echo $logo_id; die;

		$result['data'] = $this->Home_Modal->get_logo_data($logo_id);

		$this->load->view('admin/update_logo',$result);

	}

	

	//Update user

	public function update_logo()

	{

		if($this->uri->segment(3) === false){ //$_GET['logo_id']

			$logo_id = 0;

		}

		else{

			$logo_id = $this->uri->segment(3);

		}

		//echo $logo_id; die;

		if($this->input->post('update')) //if(isset($_POST['update']))

		{

			// echo 'hgold'; die;

			if(!empty($_FILES['image_pic']['name'])){

						$config['upload_path'] = 'assets/Uploads/Images/'; 

						$config['allowed_types'] = 'jpg|jpeg|png|gif';

						$config['file_name'] = $_FILES['image_pic']['name'];

						

						//Load upload library and initialize configuration

						$this->load->library('upload',$config);

						$this->upload->initialize($config);

						

						if($this->upload->do_upload('image_pic')){

							$uploadData = $this->upload->data();

							$userimage = $uploadData['file_name'];

						}else{

							$userimage = '';

						}

					}

			else{

				$userimage = $this->input->post('oldimage');

			}

			

			$data = array(

			'image_name' =>  $userimage,

			);

				

			$result = $this->Home_Modal->update_logo($data,$logo_id);

			if($result)

			{

			//$this->db->insert('user_table',$data);

			$this->session->set_flashdata('success', 'Record Updated Successfully....');

			redirect('Home/index');

			}

			else

			{

				$this->session->set_flashdata('success', 'Record Not Update....');

				redirect('Home/index');

			}

			

		}



		

	}
	
	//delete coments
	public function delete_comment()
	    {
	    	if($this->uri->segment(3) === false)
	    	{
			    $comment_id = 0;
		    }
		    else
		    {
			    $comment_id = $this->uri->segment(3);
		    }
		    
		    $result = $this->Comment_Modal->delete_single_comment($comment_id);
            redirect('Home/Comment');		    

	    }
	    
	   //Comment Edit
	   public function comment_reply()
	    {
	        //echo "hiee";die;
	    	if($this->uri->segment(3) === false)
	    	{
			    $comment_id = 0;
		    }
		    else
		    {
			    $comment_id = $this->uri->segment(3);
		    }
		    
		    $data['result'] = $this->Comment_Modal->edit_single_comment($comment_id);
		    $data['team'] = $this->Team_Modal->fetch_teamdata();
		    $this->load->view('admin/update_comment',$data);

	    }

        //update comment
        public function comment_update()
	    {
	        //echo "hiee";die;
	    	if($this->uri->segment(3) === false)
	    	{
			    $comment_id = 0;
		    }
		    else
		    {
			    $comment_id = $this->uri->segment(3);
		    }
		    
		    if($this->input->post('update'))
		    {
		        //echo "sdcsdc";die;
		        $reply = $this->input->post('reply');
		        $team_id = $this->input->post('team_id');
		        $reply_date = date('y-m-d');
		        $data = array(
		                       'reply' => $reply,
		                       'team_id' => $team_id,
		                       'reply_date' => $reply_date
		                     );
		    
		        
		        $result = $this->Comment_Modal->update_single_comment($comment_id,$data);
		        if($result)
		        {
		            $this->session->set_flashdata('success', 'Record Updated....');
		            redirect('Home/comment');
		        }
		        else
		        {
		            $this->session->set_flashdata('success', 'Record Not Updated....');
		            redirect('Home/comment');
		        }
		    }
	    }
//---------------------------- User status update -------------------->
		public function user_change_sts(){
            //echo "csdbh";die;
			$id=$this->input->post('comment_id');
			$status=$this->input->post('comment_status');
			
			$result = $this->Comment_Modal->comment_status($id,$status);
			if($result){
				//echo $this->db->last_query();
				echo 1;
				//redirect('Home/comment');
			}else{
				echo 0;
				//redirect('Home/comment');
			}
		
		}
	//-------------------------------- end ------------------------------->
}





