<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Leave extends CI_Controller {

		function __construct(){
			parent::__construct();
		}

	function check_session(){
		if ($this->session->userdata('user_login') != 1)//not logged in
        redirect(base_url(), 'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title'] = 'Leave Applications';
        $this->load->view($this->session->userdata('role').'/leaves',$data);		
	}


	function approve($param='',$param1=''){
		$this->check_session();
		$data['page_title'] = 'Approve leave | '.$this->M_user->get_name($param1);
		$data['leave_id'] = $param;
       $this->load->view($this->session->userdata('role').'/approve_leave',$data);		
	}

	function approve_leave(){
        $leave_id = $this->input->post('leave_id');
        $data['status'] = $this->input->post('status');
        $data['comment'] = $this->input->post('comment');
        $data['date_approved'] = date('Y-m-d-H-i-s');
		$this->db->where('leave_id',$leave_id);
		$this->db->update('tblleaves',$data);
		$this->session->set_flashdata('message','leave attended to successfully');
		redirect('leave');
    }

	function get_data_from_post(){
		$data['title']   = $this->input->post('title');
		$data['start_date']     = $this->input->post('start_date');
		$data['end_date']    = $this->input->post('end_date');
		//$data['leave_type_id']    = $this->input->post('leave_type_id');
		//$data['days_applied'] = ceil(abs(strtotime($data['end_date']) - strtotime($data['start_date']))/86400);
		$data['days_applied']     = $this->input->post('days_applied');
		$data['user_id']  = $this->input->post('user_id');;
        $data['date_applied'] = date('Y-m-d-H-i-s');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_leave->get_leave_by_id($update_id);
		foreach ($query as $row) {
		    //$data['leave_type_id']    = $row['leave_type_id'];
			$data['title']   = $row['title'];
			$data['start_date']  = $row['start_date'];
			$data['end_date']  = $row['end_date'];
			$data['user_id']  = $row['user_id'];
			$data['days_applied']  = $row['days_applied'];;

		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('leave_id',$update_id);
			$this->db->update('tblleaves',$data);
		 }else{
			$this->db->insert('tblleaves',$data);
		}

		$this->session->set_flashdata('message','leave saved successfully');
			if($update_id !=''):
    			redirect('leave');
			else:
				redirect('leave/read');
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

		$data['page_title']  = 'Create leave';
		$this->load->view($this->session->userdata('role').'/add_leave',$data);			
	}


	function delete($param=''){
		$this->db->where('leave_id',$param);
		$this->db->delete('leaves');
		$this->session->set_flashdata('message','leave deleted successfully');
		redirect('leave');

	}
		
}