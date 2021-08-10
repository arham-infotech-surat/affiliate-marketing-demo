<?php
class Rate_Modal extends CI_Model {
    
	function __construct() {
			parent::__construct();
			
			$this->tbl_rate="tbl_rate";
			
	}

//------------------------ fetch Rate data -------------------------->
	public function fetch_rates()
	{
		$query = $this->db->get($this->tbl_rate);
		$results=$query->result_array();
		return $results;
	}
	
	public function fetch_ratedata($Rid)
	{
		$query = $this->db->get_where($this->tbl_rate,array('Rid' => $Rid));
		$results=$query->result_array();
		return $results;
	}
//-------------------------------- End ------------------------------->


//-------------------------------- Rate Add ------------------------------->
	public function insert_rate($data)
		{
			$query = $this->db->insert($this->tbl_rate,$data);
			//echo $this->db->last_query();die;
			return $query;
		}
		
	public function update_rate($data)
		{
			$query = $this->db->update($this->tbl_rate,$data);
			//echo $this->db->last_query();die;
			return $query;
		}
		
//-------------------------------- End ------------------------------->


//-------------------------------- Delete Rate------------------------------->
	public function delete_single_rate($Rid)
	{
		$query = $this->db->delete($this->tbl_rate,array('Rid' => $Rid));
		return $query;
	}
//-------------------------------- End ------------------------------->

//-----------------START------------------------------------------------------
	public function parse_file($csvfile)
	{
		//echo "hii";die;
		$query = $this->db->insert($this->tbl_rate,$csvfile);
		echo $this->db->last_query();die;
		//return $query;
	}
//--------------END-------------------------------------------

//------------IMPORT AND EXPORT------------------------------
    public function insert($data) 
	{
		$res = $this->db->insert_batch($this->tbl_rate,$data);
		if($res)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	 public function exportList() {
            $this->db->select(array('country', 'service', 'gm500', 'kg1' , 'kg1_5' , 'kg2' ,'kg2_5' , 'kg3' ,'kg3_5' , 'kg4' , 'kg4_5' , 'kg5' , 'kg5_5' , 'kg6' , 'kg7_10' , 'kg11_16' , 'kg17_20' , 'kg21_30' , 'kg31_50' , 'kg51_70' ,'kg100p' , 'days'));
            //$this->db->from('import');
            $query = $this->db->get($this->tbl_rate);
            return $query->result();
        }
//---------------ENDD------------------------
}
?>