<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_document extends CI_Model {
	
		function __construct(){
			parent::__construct();
		}
		
		function get_documents(){
			$query = $this->db->get('tbldocuments');
			return $query->result_array();
		}

		function get_document_by_id($document_id){
		    $this->db->where('document_id',$document_id);
			$query = $this->db->get('tbldocuments');
			return $query->result_array();
		}

		function get_document($document_id){
   		    $this->db->where('document_id',$document_id);
			$query = $this->db->get('tbldocuments')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['document'];
				}
			}else {
				return '';
			}
			
		}

}