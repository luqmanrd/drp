<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	function __construct()  
	{  
		parent::__construct();  
    	$this->load->helper('url');//you can autoload this functions by configuring autoload.php in config directory  
    	$this->load->library ('session');  
    	$this->load->model('user_model');
    	  
	}  

	public function index()
	{
		if($this->session->userdata('status') == "login"){
			redirect(base_url());
		}
		else{
			$this->load->view('user/login');
		}
	}

	public function login()
	{     
		$val['username']=htmlspecialchars($_POST['username']);  
		$val['password']=htmlspecialchars($_POST['password']);  
		$res=$this->user_model->islogin($val);
		// print_r($res->row_array());
		if($res->num_rows() > 0 ){
			$data  = $res->row_array();
	        $username  = $data['username'];
	        $password = $data['password'];
	        $fullname = $data['fullname'];
	        $alamat = $data['alamat'];
	        $tgl_lahir = $data['tgl_lahir'];
	        $no_telp = $data['no_telp'];
	        $jabatan = $data['jabatan'];
	        $status = "login";
	        $sesdata = array(
	            'username' => $username,
	            'password' => $password,
	            'fullname' => $fullname,
	            'alamat' => $alamat,
	            'tgl_lahir' => $tgl_lahir,
	            'no_telp' => $no_telp,
	            'jabatan' => $jabatan,
	            'status' => $status
	        );
			// $data['userole']=
			// $data['status']="login";
			$this->session->set_userdata($sesdata);   
			echo base_url();  
		}  
		else{  
			echo 0;  
		}   
	}
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}	
