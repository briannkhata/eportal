<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Document_type extends CI_Controller {

	function __construct(){
 	   parent::__construct();
	}
		
	function check_session(){
			if ($this->session->userdata('user_login') != 1)//not logged in
            redirect(base_url(), 'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'document types';
		$this->load->view($this->session->userdata('role').'/document_types',$data);			
    }

    function get_data_from_post(){
        $data['document_type']    = $this->input->post('document_type');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_document_type->get_document_type_by_id($update_id);
		foreach ($query as $row) {
		    $data['document_type']    = $row['document_type'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('document_type_id',$update_id);
			$this->db->update('tbldocument_types',$data);
		 }else{
			$this->db->insert('tbldocument_types',$data);
		}

		$this->session->set_flashdata('message','Data saved successfully');
			if($update_id !=''):
    			redirect('document_type');
			else:
				redirect('document_type/read');
			endif;
	}


	function read(){
		$update_id = $this->uri->segment(3);
		if(!isset($update_id)){
			$update_id = $this->input->post('update_id',$update_id);
		}
		if(is_numeric($update_id)){
			$data = $this->get_data_from_db($update_id);
			$data['update_id'] = $update_id;
		}
		else{
			$data = $this->get_data_from_post();
		}

		$data['page_title']  = 'Create document type';
		$this->load->view($this->session->userdata('role').'/add_document_type',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] =  0;
		$this->db->where('document_type_id',$param);
        $this->db->delete('tbldocument_types',$data);
    	$this->session->set_flashdata('message','Data deleted successfully');
		redirect('document_type');
	}
	  	
}