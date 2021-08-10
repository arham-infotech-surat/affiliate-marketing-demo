<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Order extends REST_Controller {
    
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
            $data = $this->db->get("orders")->result();
			if(!empty($data)){
				$this->response(array('data' => $data ,'Message' => 'Data Get Successfully!', 'IsSuccess' => 'True','Success'=>REST_Controller::HTTP_OK));
			}else{
				$this->response(array('error' => 'Order Not Found..'), REST_Controller::HTTP_NOT_FOUND);
			}
	}
	
	
	public function index_post()
	{
        $input = $this->input->post();
        $this->db->insert('orders',$input);
		$this->response(array('Message' => 'Data Add Successfully!', 'IsSuccess' => 'True','Success'=>REST_Controller::HTTP_OK));
	}
	
	

      
    
    	
}