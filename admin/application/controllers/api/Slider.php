<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Slider extends REST_Controller {
    
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

	
	public function index_get()
	{
		$data = $this->db->get("sliders")->result();
		if(!empty($data)){
			$this->response(array('data' => $data , 'Message' => 'Data Get Successfully!', 'IsSuccess' => 'True','Success'=>REST_Controller::HTTP_OK));
		}else{
			$this->response(array('data' => [] , 'Message' => 'Data Not Get Successfully!', 'IsSuccess' => 'False','error'=>REST_Controller::HTTP_NOT_FOUND));
			//$this->response(array('error' => 'Slider Not Found..'), REST_Controller::HTTP_NOT_FOUND);
		}
	}
	
	
	

      
    
    	
}