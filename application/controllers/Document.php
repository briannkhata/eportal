<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Document extends CI_Controller {

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
		$this->load->view($this->session->userdata('role').'/documents',$data);			
    }

    function get_data_from_post(){
        $data['document']    = $this->input->post('document');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_document->get_document_by_id($update_id);
		foreach ($query as $row) {
		    $data['document']    = $row['document'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('document_id',$update_id);
			$this->db->update('tbldocuments',$data);
		 }else{
			$this->db->insert('tbldocuments',$data);
		}

		$this->session->set_flashdata('message','Data saved successfully');
			if($update_id !=''):
    			redirect('document');
			else:
				redirect('document/read');
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
		$this->load->view($this->session->userdata('role').'/add_document',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] =  0;
		$this->db->where('document_id',$param);
        $this->db->delete('tbldocuments',$data);
    	$this->session->set_flashdata('message','Data deleted successfully');
		redirect('document');
	}
	  	
}