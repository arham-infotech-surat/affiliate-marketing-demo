<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Profile extends REST_Controller {
    
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
     * Get All Data from this Login method.
     *
     * @return Response
    */
	
	public function index_get(){
		$cust = $this->db->get('customers')->result_array()	;
		$this->response($cust, REST_Controller::HTTP_OK);
	}
	
	public function index_put()
    {
		$customer_id = $this->input->get('customer_id');
        $input = $this->put();
		//$this->db->set($input);
        $data = $this->db->update('customers',$input, array('customer_id' => $customer_id));
		if($data)
		{
			$this->response(array('Message' => 'Data Get Successfully!', 'IsSuccess' => 'True','Success'=>REST_Controller::HTTP_OK));
		}
		else
		{
			$this->response(array('error' => 'Customer Profile Not Updated..'), REST_Controller::HTTP_NOT_FOUND);
		}
    }
	
	
}