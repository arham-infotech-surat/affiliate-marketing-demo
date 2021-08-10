<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Notification extends REST_Controller {
    
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
	public function index_get()
	{
		$data = $this->db->get_where("notifications")->row_array();
		if(!empty($data))
		{	
			$this->response(array('data' => $data,'Message' => 'Data Get Successfully!', 'IsSuccess' => 'True','Success'=>REST_Controller::HTTP_OK));
		}else{
			$this->response(array('error' => 'Notification Not Found..'), REST_Controller::HTTP_NOT_FOUND);
		}
	}
	
    	
}