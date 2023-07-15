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
		$data['page_title']  = 'documents';
		$this->load->view($this->session->userdata('role').'/documents',$data);			
    }

    // function get_data_from_post(){
	// 	$data['user_id']  = $this->input->post('user_id');
	// 	$data['document_type_id']    = $this->input->post('document_type_id');
	// 	$data['document'] = $_FILES['document']['name'];
	// 	move_uploaded_file($_FILES['slip']['tmp_name'],'uploads/docs/'.$data['document']);
    //     $data['date_added'] = date('Y-m-d-H-i-s');
	// 	return $data;
    // }

    function get_data_from_db($update_id){
		$query = $this->M_document->get_document_by_id($update_id);
		foreach ($query as $row) {
		    $data['document']    = $row['document'];
		}
		return $data;
	}

	function save(){
		$data['user_id']  = $this->input->post('user_id');
		$data['document_type_id']    = $this->input->post('document_type_id');
		$data['title']    = $this->input->post('title');
		$data['document'] = $_FILES['document']['name'];
        $data['date_added'] = date('Y-m-d-H-i-s');
		move_uploaded_file($_FILES['document']['tmp_name'],'uploads/docs/'.$data['document']);
		$this->db->insert('tbldocuments',$data);
		$this->session->set_flashdata('message','Document added successfully');
    	redirect('document');
	}


	function read(){
		//$update_id = $this->uri->segment(3);
		// if(!isset($update_id)){
		// 	$update_id = $this->input->post('update_id',$update_id);
		// }
		// if(is_numeric($update_id)){
		// 	$data = $this->get_data_from_db($update_id);
		// 	$data['update_id'] = $update_id;
		// }
		// else{
		// 	$data = $this->get_data_from_post();
		// }

		$data['page_title']  = 'Create document';
		$this->load->view($this->session->userdata('role').'/add_document',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] =  0;
		$file_path = './uploads/docs/'.$this->M_document->get_document($param);
		if (file_exists($file_path)) {
			unlink($file_path);
		}
		$this->db->where('document_id',$param);
        $this->db->delete('tbldocuments');
    	$this->session->set_flashdata('message','Data deleted successfully');
		redirect('document');
	}
	  	
}