	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class slip extends CI_Controller {

		function __construct(){
			parent::__construct();
          ini_set('post_max_size','99500M');
          ini_set('upload_max_size','100000M');
          ini_set('memory_limit','128M');
          ini_set('max_execution_time','5000');
          ini_set('max_file_uploads','200');
		}

		function check_session(){
			if ($this->session->userdata('user_login') != 1)//not logged in
	        redirect(base_url(), 'refresh');
		}

		function index(){
		  $this->check_session();
		  $data['page_title']  = 'Payslips ';
		  $this->load->view($this->session->userdata('role').'/slips',$data);			
	    }

	    function add_slip(){
		  $this->check_session();
		  $data['page_title']  = 'Add Slip ';
		  $this->load->view($this->session->userdata('role').'/add_slip',$data);			
	    }

	    function add_slip_bulk(){
		  $this->check_session();
		  $data['page_title']  = 'Add Slip ';
		  $this->load->view($this->session->userdata('role').'/add_slip_bulk',$data);			
	    }


	  function upload_slip(){
		    $data['month'] = $this->input->post('month');
		    $data['year'] = $this->input->post('year');
		    $data['user_id'] = $this->input->post('user_id');
	        $data['slip'] = $_FILES['slip']['name'];
			$this->db->insert('tblslips',$data);
			move_uploaded_file($_FILES['slip']['tmp_name'],'uploads/slips/'.$data['slip']);
			$this->session->set_flashdata('message','Payslip uploaded successfully');
   			redirect('slip');
		}

	    function upload_slip_bulk(){
		    $data['month'] = $this->input->post('month');
		    $data['year'] = $this->input->post('year');
		    $total = count($_FILES['slip']['name']);         
		    for($i=0;$i<$total;$i++){
		        $data['slip'] = $_FILES['slip']['name'][$i];
       		    $data['user_id'] = substr($data['slip'],0,strpos($data['slip'],"_"));
		   		$this->db->insert('tblslips',$data);
		        move_uploaded_file($_FILES['slip']['tmp_name'][$i],'uploads/slips/'.$data['slip']);
		    }
			$this->session->set_flashdata('message','Payslips uploaded successfully');
		   	redirect('slip');
		}


		function delete($param=''){
			unlink('uploads/slips/'.$this->M_slip->get_slip($param));
			$this->db->where('slip_id',$param);
		    $this->db->delete('tblslips');
		    $this->session->set_flashdata('message','Payslip deleted successfully');
			redirect('slip');
		}

	}
