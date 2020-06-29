<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

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
	
	function __construct(){
		parent::__construct();
		$this->load->helper('url');//you can autoload this functions by configuring autoload.php in config directory  
		$this->load->library ('session');  
		$this->load->model('user_model');
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	public function index(){
		$title['title'] = 'Profil';
		$this->load->view('header',$title);
		$this->load->view('user/profil');	
	}
	public function pengaturan(){
		$title['title'] = 'Pengaturan Profil';
		$this->load->view('header',$title);
		$this->load->view('user/profilupdate');
	}

	public function cek_username(){
		$username=htmlspecialchars($_POST['username']);
		$res = $this->user_model->cek_username($username);
		if($res->num_rows() > 0 ){
			echo 1;
		}  
		else{  
			echo 0;  
		}
	}
	public function suntingProfil(){
		$where['username'] = $this->session->userdata("username");
		$data['username']=htmlspecialchars($_POST['username']);  
		// $data['password']=$this->session->userdata("password");
		$data['fullname']=htmlspecialchars($_POST['fullname']);
		$data['tgl_lahir']=htmlspecialchars($_POST['tgl_lahir']); 
		$data['jabatan']=htmlspecialchars($_POST['jabatan']); 
		$data['alamat']=htmlspecialchars($_POST['alamat']);   
		$data['no_telp']=htmlspecialchars($_POST['no_telp']); 
		$this->user_model->updateUser($where, $data, 'user');
		$sesdata = array(
			'username' => $data['username'],
			'fullname' => $data['fullname'],
			'alamat' => $data['alamat'],
			'tgl_lahir' => $data['tgl_lahir'],
			'no_telp' => $data['no_telp'],
			'jabatan' => $data['jabatan'],
		);
		$this->session->set_userdata($sesdata);
		
		redirect(base_url("profil")); 
	}
	public function cek_password(){
		$data['username'] = $this->session->userdata("username");
		$data['password'] = htmlspecialchars($_POST['password']);
		$res = $this->user_model->islogin($data);
		if($res->num_rows() > 0 ){
			$where['username'] = $this->session->userdata("username");
			$dataBaru['password'] = htmlspecialchars($_POST['passwordBaru']);
			$this->user_model->updatePassword($where, $dataBaru, 'user');
			$sesdata = array(
				'password' => $dataBaru['password']
			);

			$this->session->set_userdata($sesdata);
			echo base_url('profil'); 		
		}  
		else{  
			echo 0;  
		}
	}

}
