<?php

class Contact_Modal extends CI_Model {

    

	function __construct() {

			parent::__construct();

			

			$this->customers="customers";
			$this->customer_addresses="customer_addresses";
			$this->tbl_contactdetails="tbl_contactdetails";

			

			

	}



//------------------------ fetch admin data -------------------------->

	public function fetch_contacts()

	{

		$query = $this->db->get($this->tbl_contact);

		$results=$query->result_array();

		return $results;

	}

//-------------------------------- End ------------------------------->



//------------------------ fetch admin data -------------------------->

	public function fetch_contact_info()

	{

		$query = $this->db->get($this->tbl_contactdetails);

		$results=$query->result_array();

		return $results;

	}

//-------------------------------- End ------------------------------->



//------------------------ fetch logo data -------------------------->

	public function get_contact_data($con_id){ // display query

			$query = $this->db->get_where($this->tbl_contact,array('con_id' => $con_id));

			$results=$query->result_array();

			return $results;		

	}

//---------------------------- End ---------------------------------->



//------------------------ fetch logo data -------------------------->

	public function get_contact_info($contact_id){ // display query

			$query = $this->db->get_where($this->tbl_contactdetails,array('contact_id' => $contact_id));

			$results=$query->result_array();

			return $results;		

	}

//---------------------------- End ---------------------------------->



//------------------------- Edit logo ------------------------------------>

	public function edit_Contact($data,$con_id)

	{

		$result = $this->db->update($this->tbl_contact,$data,array('con_id' => $con_id));
		


		return $result;

	}

//--------------------------- End -------------------------------------->

	

//---------------------------------- delete info page code---------------------------->

	public function page_ContactInfo_Remove($contact_id)

	{

		//delete single user record

		$result = $this->db->delete($this->tbl_contactdetails,array('contact_id' => $contact_id));

		return $result;

	}

//----------------------------------end ----------------------------------------->



//------------------------ Gallery Multiple Delete ---------------->

public function contact_MultipleDelete($delIds){

	if ($delIds) {

        for ($i = 0; $i < count($delIds); $i++)

        {

	        $this->db->where('contact_id', $delIds[$i]);

	        $this->db->delete($this->tbl_contactdetails);



        }

	}

    redirect('Contact/contact_InfoView');

}

//------------------------------ End ----------------------->

}

?>