<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

	public function __construct(){
		parent:: __construct();
	    $this->load->model('Orders_Modal');
	    $this->load->model('Product_Modal');
	    $this->load->model('Customer_Modal');
	    $this->load->model('Colour_Modal');
	}

	#Index Page
	public function index()
	{
		$data['result'] = $this->Orders_Modal->get_order_data();
		$this->load->view('admin/view_orders',$data);
	}

	public function add_orders()
	{
		if($this->input->post('btn_orders_add'))
		{
			$customer_id = $this->input->post('customer_id');
			$cust_address_id = $_SESSION["cust_address_session"]; 
			//$total_amount = $this->input->post('total_amount');
			//$total_amount = 

			$is_active = 1;
			$is_deleted = 0;
			$date_added = date('Y-m-d h-i-s');
			$date_updated = date('Y-m-d h-i-s');
			$product_id = $this->input->post('product_id');
			$colour_id = $this->input->post('colour_id');
			$quantity = $this->input->post('quantity');
			$price_per_meter = $this->input->post('price_per_meter');
			$order_note = $this->input->post('order_note');
			$order_audio_file = $this->input->post('order_audio_file');
			$notes = $this->input->post('notes');
			$audio_file = $this->input->post('audio_file');
			$comment = $this->input->post('comment');
			$added_by = $this->input->post('added_by');
			$status_id = 1;
			
			/* echo "<pre>";
			print_r($_POST);
			print_r($_POST['quantity']);
			print_r($_POST['price_per_meter']); */
			$qty=$_POST['quantity'];
			$pem=$_POST['price_per_meter'];
			
			$total_amount = 0;
			foreach ($qty as $key=>$price) {
				
				$net = $price * $pem[$key];
				$total_amount = $total_amount +  $net;
			}
		/* 	print_r($total);
			die; */
			#_data array to insert in product table..
			$data_1 = array(
				'customer_id' => $customer_id,
				'billing_address_id' => $cust_address_id,
				'shipping_address_id' => $cust_address_id,
				'total_amount' => $total_amount,
				'notes' => $order_note,
				'audio_file' => $order_audio_file,
				'date_added' => $date_added,
			);
            $id = $this->Orders_Modal->add_order_data($data_1);
			//echo $id;
            #_end..

            #_multiple batch insert in product attribute..
            foreach ($product_id as $key => $item) 
		    {
		        $data_2[] = array(
	        	    'order_id' => $id,
	                'product_id' => $product_id[$key],
	                'product_colour_id' => $colour_id[$key],
	                'quantity' => $quantity[$key],
	                'price_per_meter' => $price_per_meter[$key],
	                'notes' => $notes[$key],
	                'audio_file' => $audio_file[$key],
	                'date_added' => $date_added,
	            );
		    }
			//$result2 = $this->Orders_Modal->add_product_attributes($data_2);
			$result2 = $this->Orders_Modal->add_order_products($data_2);
			#_end..

			#_multiple batch insert in product colours..
			// echo "<pre>";print_r($_POST);die;
		
	        $data_3 = array(
	        	'order_id' => $id,
        	    'status_id' => $status_id,
				'comment' => $comment,
                'added_by' => $added_by,
                'date_added' => $date_added,
            );
	  
		   /*  echo "<pre>";
		    print_r($data_3);die; */
			$result3 = $this->Orders_Modal->add_order_statuses($data_3);
			#_end..

			if($id && $result2 && $result3)
				{
					$this->session->set_flashdata('success', 'Record Added Successfully...');
					redirect('Orders/');
				}
				else
				{
					$this->session->set_flashdata('success', 'Record Not Added...');
					redirect('Orders/');
				}
		}
		else
		{
			$data['prod_data']=$this->Product_Modal->get_product_data();
			$data['colour_data']=$this->Colour_Modal->get_colour_data();
			$data['cust_data']=$this->Customer_Modal->fetch_customerdata();
			$this->load->view('admin/add_orders',$data);
		}

	}

	#Order Product
	public function Product_order()
	{
		$data['result'] = $this->Orders_Modal->fetchProduct_order_data();
		$this->load->view('admin/view_orders_products',$data);
	}
	
	#Order Status
	public function Status_order()
	{
		$data['result'] = $this->Orders_Modal->fetchStatus_order_data();
		$this->load->view('admin/view_orders_status',$data);
	}

}	
	





