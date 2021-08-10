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
	   $this->load->library('user_agent');
    }
	
	/**
     * Get All Data from this Login method.
     *
     * @return Response
    */
	public function index_get()
	{
			$mobile_no = $this->input->get('mobile_no');
			$FCMToken = $this->input->get('FCMToken');
			$device_id = $this->input->get('device_id');
			
			$this->db->join('customer_devices','customers.customer_id=customer_devices.customer_id');
            $data = $this->db->get_where("customers", ['mobile_no' => $mobile_no,'customer_devices.is_active' => 1,'customers.is_deleted' => 0])->row_array();
			
			$Did = $data['device_id'];
			
			if($Did==$device_id)
			{
				$this->db->join('customer_devices','customers.customer_id=customer_devices.customer_id');
				$this->db->join('customer_addresses','customers.customer_id=customer_addresses.customer_id');
				$data2 = $this->db->get_where("customers",['mobile_no' => $mobile_no,'customers.is_active' => 1,'customers.is_deleted' => 0])->row_array();
				if($data2)
				{
					$this->response(array('data' => [$data2] , 'Message' => 'Data Get Successfully!', 'IsSuccess' => 'True','Success'=> REST_Controller::HTTP_OK));
				}
				else
				{
					$this->response(array('data' => [] , 'Message' => 'Data Get Not Successfully!', 'IsSuccess' => 'false','error'=> REST_Controller::HTTP_NOT_FOUND));
				}
			}
			else if($Did!=$device_id)
			{
				if ($this->agent->is_browser())
				{
					$device_id = $this->agent->browser().' '.$this->agent->version();
				}
				elseif ($this->agent->is_robot())
				{
					$device_id = $this->agent->robot();
				}
				elseif ($this->agent->is_mobile())
				{
					$device_id = $this->agent->mobile();
				}
				else
				{
					$device_id = $device_id;
				}
				
				$customer_id = $data['customer_id'];
				if(!empty($customer_id))
				{
					$is_active = 1;
					$date_added = date('Y-m-d');
					
					$add_device_data = array(
						'customer_id' => $customer_id,
						'device_id' => $device_id,
						'is_active' => $is_active,
						'date_added' => $date_added
					);
				
					$this->db->update("customer_devices",['customer_id' => $customer_id , 'is_active' => 0]);
					$this->db->join('customer_devices','customers.customer_id=customer_devices.customer_id');
					$this->db->join('customer_addresses','customers.customer_id=customer_addresses.customer_id');
					$data2 = $this->db->get_where("customers",['mobile_no' => $mobile_no,'customers.is_active' => 1,'customers.is_deleted' => 0])->row_array();
					$insert_device = $this->db->insert('customer_devices',$add_device_data);
				}
				else
				{
					$this->response(array('data' => [] , 'Message' => 'Data Get Not Successfully!', 'IsSuccess' => 'false','error'=> REST_Controller::HTTP_NOT_FOUND));
				}
				if($data2)
				{
					$this->response(array('data' => [$data2] , 'Message' => 'Data Get Successfully!', 'IsSuccess' => 'True','Success'=> REST_Controller::HTTP_OK));
				}
				else
				{
					$this->response(array('data' => [] , 'Message' => 'Data Get Not Successfully!', 'IsSuccess' => 'false','error'=> REST_Controller::HTTP_NOT_FOUND));
				}
				
			}
			else
			{
				$this->response(array('data' => [] , 'Message' => 'Data Get Not Successfully!', 'IsSuccess' => 'false','error'=> REST_Controller::HTTP_NOT_FOUND));
			}
	}	
}