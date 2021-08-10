<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Comment extends REST_Controller {
    
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
		$order_id = $this->input->get('order_id');
		if(!empty($order_id)){
			$this->db->order_by("order_status_id","DESC");
			$this->db->join('orders','orders.order_id=order_statuses.order_id');
			$this->db->join('order_products','order_products.order_id=order_statuses.order_id');
            $data = $this->db->get_where("order_statuses",['orders.order_id' => $order_id])->row_array();
			//echo $this->db->last_query();	
			if(!empty($data)){
				$this->response(array('data' => [$data],'Message' => 'Data Get Successfully!', 'IsSuccess' => 'True','Success'=>REST_Controller::HTTP_OK));
			}else{
				$this->response(array('error' => 'Order Comment Not Found..'), REST_Controller::HTTP_NOT_FOUND);
			}
		}else{
				$this->response(array('error' => 'Order Comment Not Found..'), REST_Controller::HTTP_NOT_FOUND);
			} 
	}
	
    	
}