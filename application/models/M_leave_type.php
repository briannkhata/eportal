<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_leave_type extends CI_Model {
	
		function __construct(){
			parent::__construct();
		}
		
		function get_leave_types(){
		    $this->db->where('deleted',0);
			$query = $this->db->get('tblleave_types');
			return $query->result_array();
		}

		function get_leave_type_by_id($leave_type_id){
		    $this->db->where('leave_type_id',$leave_type_id);
			$query = $this->db->get('tblleave_types');
			return $query->result_array();
		}

		function get_leave_type($leave_type_id){
   		    $this->db->where('leave_type_id',$leave_type_id);
			$query = $this->db->get('tblleave_types')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['leave_type'];
				}
			}else {
				return '';
			}
			
		}

}

