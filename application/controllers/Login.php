<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
	
	function __construct(){
		parent::__construct();
    } 

    function index(){		
		$data['page_title']  = 'Login';
		$this->load->view('index',$data);	
	}


	function signin(){   
	
		if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])){

				    $username	=	$this->input->post('username');
				    $password	=	$this->input->post('password');
				    //$password	=	MD5($this->input->post('password'));			   
				    $user  =   $this->db->query("SELECT * FROM tblusers WHERE 
													  username='$username' AND 
													  password='$password' AND 
													  deleted = 0 ");
				    $row = $user->row();
						if (isset($row)){
								
							$username   =	$row->username;
							$role	=	$row->role;
							$name		=	$row->name;
							$user_id	=	$row->user_id;
													
							$this->session->set_userdata('user_login', '1');
							$this->session->set_userdata('user_id',$user_id);
							$this->session->set_userdata('username',$username);
							$this->session->set_userdata('name',$name);
 						    $this->session->set_userdata('role',$role);
							redirect(base_url().'User');
						}
								
					$data['page_title']  = 'Login';
					$this->session->set_flashdata('message','Invalid Username or Password');
					return $this->load->view('index',$data);	
					//redirect(base_url().'Login',$data);
			    }
				
	}
}
