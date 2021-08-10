<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class OrderListByOrderId extends REST_Controller {
    
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
		$order_id = $this->input->get('order_id');
        if(!empty($order_id)){
			$this->db->join('order_products','order_products.order_id=orders.order_id');
            $data = $this->db->get_where("orders", ['orders.order_id' => $	])->row_array();
			if(!empty($data)){
				$this->response(array('data' => [$data],'Message' => 'Data Get Successfully!', 'IsSuccess' => 'True','Success'=>REST_Controller::HTTP_OK));
			}else{
				$this->response(array('error' => 'Order Not Found..'), REST_Controller::HTTP_NOT_FOUND);
			}
		}else{
				$this->response(array('error' => 'Order Not Found..'), REST_Controller::HTTP_NOT_FOUND);
			}  
	}

	

      
    
    	
}