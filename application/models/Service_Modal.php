<?phpclass Service_Modal extends CI_Model {    	function __construct() {			parent::__construct();						$this->tbl_service="tbl_service";			$this->tbl_inquiry="tbl_inquiry";				}    /*view service*/	public function getservices()	{		$query = $this->db->get($this->tbl_service);		$results=$query->result_array();		return $results;	}		/*edit service*/	public function get_service_data($service_id)	{		$query = $this->db->get_where($this->tbl_service,array('service_id' => $service_id));		//echo $this->db->last_query();die;		$result = $query->result_array();		return $result;	}    /*add service*/	public function add_servicedata($data)	{		$result = $this->db->insert($this->tbl_service,$data);		//echo $this->db->last_query();die;		return $result;	}    /*update service*/	public function update_servicedata($data,$service_id)	{		$result = $this->db->update($this->tbl_service,$data,array('service_id' => $service_id));		//echo $this->db->last_query();die;		return $result;	}	    /*delete service*/	public function delete_single_service($service_id)	{		$result = $this->db->delete($this->tbl_service,array('service_id' => $service_id));		//echo $this->db->last_query();die;		return $result;	}}?>