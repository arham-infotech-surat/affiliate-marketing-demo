<?phpclass Testimonial_Modal extends CI_Model {    	function __construct() {			parent::__construct();			            $this->tbl_team="tbl_team";			$this->tbl_testimonial="tbl_testimonial";				}//------------------------ fetch testimonial data -------------------------->	public function fetch_testimonial()	{        $this->db->join('tbl_team','tbl_testimonial.team_id=tbl_team.team_id');		$query = $this->db->get($this->tbl_testimonial);		$results=$query->result_array();		return $results;	}//-------------------------------- End ------------------------------->//-------------------------------- insert data ------------------------------->	public function insert_testimonial($data)	{		$query = $this->db->insert($this->tbl_testimonial,$data);		//echo $this->db->last_query();die;		return $query;	}//-------------------------------- End ------------------------------->//-------------------------------- testimonial get data ------------------------------->	public function get_testimonial_data($testimonial_id)	{		$query = $this->db->get_where($this->tbl_testimonial,array('testimonial_id' => $testimonial_id));		//echo $this->db->last_query();die;		$result = $query->result_array();		return $result;	}//-------------------------------- End ------------------------------->//-------------------------------- Update ------------------------------->public function update_testimonialdata($data,$testimonial_id)	{		$result = $this->db->update($this->tbl_testimonial,$data,array('testimonial_id' => $testimonial_id));		//echo $this->db->last_query();die;		return $result;	}//-------------------------------- End ------------------------------->//-------------------------------- delete ------------------------------->public function delete_single_testimonial($testimonial_id)	{		$result = $this->db->delete($this->tbl_testimonial,array('testimonial_id' => $testimonial_id));		//echo $this->db->last_query();die;		return $result;	}//-------------------------------- End ------------------------------->	public function testimonial_MultipleDeleted($delIds){	if ($delIds) {        for ($i = 0; $i < count($delIds); $i++)        {	        $this->db->where('testimonial_id', $delIds[$i]);	        $this->db->delete($this->tbl_testimonial);        }	}    redirect('Testimonial/view_testimonial');	}}?>