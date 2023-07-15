<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_user extends CI_Model {
	
		function __construct(){
			parent::__construct();
		}
		
		function get_active_staffs(){
		    $this->db->order_by('user_id','DESC');
		    $this->db->where('deleted',0);
   		    $this->db->where('role','staff');
			$query = $this->db->get('tblusers');
			return $query->result_array();
		}

		function get_docs(){
			$query = $this->db->get('tbldocs');
			return $query->result_array();
		}

		function get_user_by_id($user_id){
		    $this->db->where('user_id',$user_id);
			$query = $this->db->get('tblusers');
			return $query->result_array();
		}
		
		function get_name($user_id){
   		    $this->db->where('user_id',$user_id);
			$query = $this->db->get('tblusers')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['name'];
				}
			}else {
				return '';
			}
			
		}

	
}