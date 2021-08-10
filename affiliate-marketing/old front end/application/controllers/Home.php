 <?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Home extends CI_Controller {



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

	    // $this->load->model('Home_Modal');
	    
	    $this->load->library('form_validation');

	    $this->tbl_logo="tbl_logo";

		if (!isset($this->session->userdata('newdata')['logged_in'])) 

		{

			redirect('Login','refresh');

		} 

	}







//--------------------------------------------- Index Page --------------------------------------->

	public function index()
	{
		$this->load->view('home');
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
		
		$this->load->view('admin/dashboard_new');
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





