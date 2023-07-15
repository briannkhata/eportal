<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_slip extends CI_Model {
	
		function __construct(){
			parent::__construct();
		}
		
		function get_slips(){
			$this->db->order_by('slip_id','DESC');
			$query = $this->db->get('tblslips');
			return $query->result_array();
		}

		function get_slip_by_id($slip_id){
		    $this->db->where('slip_id',$slip_id);
			$query = $this->db->get('tblslips');
			return $query->result_array();
		}

		function get_slip_by_user_id($user_id){
		    $this->db->where('user_id',$user_id);
		    $this->db->order_by('slip_id','DESC');
			$query = $this->db->get('tblslips');
			return $query->result_array();
		}

		function get_slip($slip_id){
   		    $this->db->where('slip_id',$slip_id);
			$query = $this->db->get('tblslips')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['slip'];
				}
			}else {
				return '';
			}
			
		}

		function get_days($slip_id){
   		    $this->db->where('slip_id',$slip_id);
			$query = $this->db->get('slips')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['days'];
				}
			}else {
				return '';
			}
			
		}

		function get_days_per_month($slip_id){
   		    $this->db->where('slip_id',$slip_id);
			$query = $this->db->get('slips')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['days_per_month'];
				}
			}else {
				return '';
			}
			
		}

		function get_hours_per_day($slip_id){
   		    $this->db->where('slip_id',$slip_id);
			$query = $this->db->get('slips')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['hours_per_day'];
				}
			}else {
				return '';
			}
			
		}

}

