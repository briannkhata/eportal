<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class leave_type extends CI_Controller {

	function __construct(){
 	   parent::__construct();
	}
		
	function check_session(){
			if ($this->session->userdata('user_login') != 1)//not logged in
            redirect(base_url(), 'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'leave types';
		$this->load->view($this->session->userdata('role').'/leave_types',$data);			
    }

    function get_data_from_post(){
        $data['leave_type']    = $this->input->post('leave_type');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_leave_type->get_leave_type_by_id($update_id);
		foreach ($query as $row) {
		    $data['leave_type']    = $row['leave_type'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('leave_type_id',$update_id);
			$this->db->update('tblleave_types',$data);
		 }else{
			$this->db->insert('tblleave_types',$data);
		}

		$this->session->set_flashdata('message','Data saved successfully');
			if($update_id !=''):
    			redirect('leave_type');
			else:
				redirect('leave_type/read');
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

		$data['page_title']  = 'Create leave_type';
		$this->load->view($this->session->userdata('role').'/add_leave_type',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] =  0;
		$this->db->where('leave_type_id',$param);
        $this->db->delete('tblleave_types',$data);
    	$this->session->set_flashdata('message','Data deleted successfully');
		redirect('leave_type');
	}
	  	
}