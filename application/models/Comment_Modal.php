<?php

class Comment_Modal extends CI_Model {
	function __construct() {
			parent::__construct();
			$this->tbl_comments="tbl_comments";
			//$this->tbl_blog_category="tbl_blog_category";
	}

//---------------Get All Comments---------------->
    public function get_blogcomments()
	{
	    $this->db->order_by('comment_id','DESC');
	    $this->db->join('customer_tbl','tbl_comments.customer_id=customer_tbl.customer_id');
	    $this->db->join('tbl_blog','tbl_comments.blog_id=tbl_blog.blog_id');
		$query = $this->db->get($this->tbl_comments);
		$results=$query->result_array();
		return $results;
	}
//---------------Get All Comments End ---------------->
//------------------------ add comment -------------------------->
	public function add_comment($formarray)
	{

		$query = $this->db->insert($this->tbl_comments,$formarray);

		//$results=$query->result_array();

		return $query;

	}
//-------------------------------- End ------------------------------->

//------------------------ fetch comment data -------------------------->	
	public function get_blogcomments_byblog($blog_id)
	{
	    $this->db->order_by('comment_id','DESC');
		$query = $this->db->get_where($this->tbl_comments,array('blog_id' => $blog_id));
		$results=$query->result_array();
		return $results;
	}
	
	public function toltal_blogcomments_byblog($blog_id)
	{
	    $this->db->select('COUNT(tbl_comments.blog_id) as totalcomments');
		$this->db->group_by('tbl_comments.blog_id'); 
	    $this->db->order_by('comment_id','DESC');
		$query = $this->db->get_where($this->tbl_comments,array('blog_id' => $blog_id));
		$results=$query->result_array();
		return $results;
	}
	
//------------------------------ End -------------------------------->

//-----------------update comment----------------------------------->
public function edit_single_comment($comment_id)
	{
	   // echo "cs";die;
	   $this->db->join('tbl_team','tbl_team.team_id=tbl_comments.team_id');
	    $this->db->join('customer_tbl','tbl_comments.customer_id=customer_tbl.customer_id');
	    $this->db->join('tbl_blog','tbl_comments.blog_id=tbl_blog.blog_id');
	    $query = $this->db->get_where($this->tbl_comments,array('comment_id' => $comment_id));
	    $result = $query->result_array();
	    return $result;
	}
//------------------ End -------------------------------------------->

//-----------------update comment----------------------------------->
public function update_single_comment($comment_id,$data)
	{
	   //echo "cs";die;
	    $query = $this->db->update($this->tbl_comments,$data,array('comment_id' => $comment_id));
	    //$result = $query->result_array();
	    //echo $this->db->last_query();die;
	    return $query;
	}
//------------------ End -------------------------------------------->


//-----------------delete comment----------------------------------->
public function delete_single_comment($comment_id)
	{
	    $query = $this->db->delete($this->tbl_comments,array('comment_id' => $comment_id));
	    return $query;
	}
//------------------------------ End -------------------------------->

//---------------------- User Status --------------->
	public function comment_status($id,$status)
	{
	    //echo "model";die;
		if($status==1)
		{
			$c_status = array(
				'comment_status' =>  '0'
				);
			$result = $this->db->update($this->tbl_comments,$c_status,array('comment_id' => (int)$id));
			//echo $this->db->last_query();
		}
		else 
		{
			$c_status = array(
				'comment_status' =>  '1'
				);
			$result = $this->db->update($this->tbl_comments,$c_status,array('comment_id' => (int)$id));
			//echo $this->db->last_query();
		}
		return $result;
	}
	//------------------------- End --------------------->



	




}

?>