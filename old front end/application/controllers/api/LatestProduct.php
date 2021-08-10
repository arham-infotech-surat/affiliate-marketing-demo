<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class LatestProduct extends REST_Controller {
    
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
		$this->db->order_by("product_id","desc");
		$data = $this->db->get("products")->result();
		if(!empty($data)){
			$this->response(array('data' => $data,'Message' => 'Data Get Successfully!', 'IsSuccess' => 'True','Success'=>REST_Controller::HTTP_OK));
		}else{
			$this->response(array('error' => 'Product Not Found..'), REST_Controller::HTTP_NOT_FOUND);
		}
	}
}