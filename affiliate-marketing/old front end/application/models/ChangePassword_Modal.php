<?phpclass ChangePassword_Modal extends CI_Model {    	function __construct() {			parent::__construct();						$this->admin_user="admin_user";				}//------------------------ fetch admin data -------------------------->	public function fetch_password()	{		$query = $this->db->get($this->admin_user);		$results=$query->result_array();		return $results;	}		public function fetch_data() { // display query		$result = $this->db->get($this->admin_user);		//echo $this->db->last_query(); die;		$results=$result->result_array();		return $results;	}//-------------------------------- End ------------------------------->	public function user_checkold_pwd($old_password,$uname){ // display query		$result = $this->db->get_where($this->admin_user,array('password' => $old_password,'username' => $uname));		//echo $this->db->last_query(); die;		$result=$result->result_array();		return $result;			}	public function user_reset_pwd($confirm_password,$uname){ // display query		$con_pass = array(			'password' =>  $confirm_password		);			$result = $this->db->update($this->admin_user,$con_pass,array('username' => $uname));		//echo $this->db->last_query(); die;		//$results=$query->result_array();		return $result;		}    //update email    /* public function resetemail($email,$uname){ // display query		$emailupdate = array(			'email_id' =>  $email		);		$result = $this->db->update($this->admintable,$emailupdate,array('uname' => $uname));		//echo $this->db->last_query(); die;		return $result;		    } */}?>