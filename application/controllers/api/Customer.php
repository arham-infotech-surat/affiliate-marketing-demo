<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Customer extends REST_Controller {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->database();
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
	public function index_post()
	{
        $input = $this->input->post();
        $this->db->insert('customers',$input);
		//$this->response(array('success' => TRUE), REST_Controller::HTTP_OK);
       $this->response(['Item created successfully.'], REST_Controller::HTTP_OK);
	}
      
    
    	
}