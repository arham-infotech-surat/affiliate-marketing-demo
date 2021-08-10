<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Product extends REST_Controller {
    
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
	
	/* public function index_get($product_id  = 0)
	{
        if(!empty($product_id)){
            $data = $this->db->get_where("products", ['product_id ' => $product_id ])->row_array();
			if(!empty($data)){
				$this->response($data, REST_Controller::HTTP_OK);
			}else{
				$this->response(array('error' => 'Product Not Found..'), REST_Controller::HTTP_NOT_FOUND);
			}
        }
	} */
	
	
	public function index_get()
	{
		$data = $this->db->get("products")->result();
		$this->response(array('data' => $data,'Message' => 'Data Get Successfully!', 'IsSuccess' => 'True','Success'=>REST_Controller::HTTP_OK));
	}
	
	/* public function index_post()
	{
        $input = $this->input->post();
        $this->db->insert('products',$input);
		$this->response(array('success' => TRUE), REST_Controller::HTTP_OK);
       //$this->response(['Product created successfully.'], REST_Controller::HTTP_OK);
	} */
	
	

      
    
    	
}