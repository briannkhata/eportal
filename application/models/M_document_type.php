<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_document_type extends CI_Model {
	
		function __construct(){
			parent::__construct();
		}
		
		function get_document_types(){
		    $this->db->where('deleted',0);
			$query = $this->db->get('tbldocument_types');
			return $query->result_array();
		}

		function get_document_type_by_id($document_type_id){
		    $this->db->where('document_type_id',$document_type_id);
			$query = $this->db->get('tbldocument_types');
			return $query->result_array();
		}

		function get_document_type($document_type_id){
   		    $this->db->where('document_type_id',$document_type_id);
			$query = $this->db->get('tbldocument_types')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['document_type'];
				}
			}else {
				return '';
			}
			
		}

}