<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {

	function __construct(){
		parent::__construct();
   }

   function check_session(){
		if ($this->session->userdata('user_login') != 1)//not logged in
        redirect(base_url(), 'refresh');
	}
	
  function index(){
		$this->check_session();
		$data['page_title']  = 'Dashboard';
		$data['page_name']  = 'dashboard';
		$this->load->view($this->session->userdata('role').'/dashboard',$data);			
  }

  function users(){
		$this->check_session();
		$data['page_title']  = 'Staff List';
		$this->load->view($this->session->userdata('role').'/users',$data);			
   }
  
  function users2(){
		$this->check_session();
		$data['page_title']  = 'Staff List';
		$this->load->view($this->session->userdata('role').'/users2',$data);			
   }


 
   function get_data_from_post(){
		  $data['name']          = $this->input->post('name');
          $data['user_id']      = $this->input->post('user_id');
          $data['username']         = $this->input->post('username');
          $data['password']        = $this->input->post('password');
          $data['role']          = $this->input->post('role');
          return $data;
    }

   function get_data_from_db($update_id){
		$query = $this->M_user->get_user_by_id($update_id);
		foreach ($query as $row) {
		     $data['name']     = $row['name'];
         $data['user_id'] = $row['user_id'];
         $data['username']    = $row['username'];
         $data['password']   = $row['password'];
         $data['role']     = $row['role'];
		  }
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('user_id',$update_id);
			$this->db->update('tblusers',$data);
		 }else{
			$this->db->insert('tblusers',$data);
		}

		$this->session->set_flashdata('message','User saved successfully');
		redirect('user/read');
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

		$data['page_title']  = 'Create user';
		$this->load->view($this->session->userdata('role').'/add_user',$data);			
	}

	function delete($param=''){
	$this->db->where('user_id',$param);
    $this->db->delete('tblusers');
    $this->session->set_flashdata('message','User deleted successfully');
		redirect('user/users');
	}



 function logout(){
	$this->session->sess_destroy();
	redirect(base_url());
	}

}
