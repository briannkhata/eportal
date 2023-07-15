<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_leave extends CI_Model {
	
		function __construct(){
			parent::__construct();
		}
		
		function get_leaves(){
   		    $this->db->order_by('date_applied','DESC');
			$query = $this->db->get('tblleaves');
			return $query->result_array();
		}

		function get_leave_by_id($leave_id){
		    $this->db->where('leave_id',$leave_id);
			$query = $this->db->get('tblleaves');
			return $query->result_array();
		}

}

