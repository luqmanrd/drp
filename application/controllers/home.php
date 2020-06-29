<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		$this->load->model('dashboard_model');
	}

	public function index(){
		$data['terima'] = $this->dashboard_model->select_all_terima()->result();
		$data['proses'] = $this->dashboard_model->select_all_proses()->result();
		$data['packing'] = $this->dashboard_model->select_all_packing()->result();
		// print_r($data);
		$data['jumlah_terima']=count($data['terima']);
		$data['jumlah_proses']=count($data['proses']);
		$data['jumlah_packing']=count($data['packing']);
		// print_r($data['jumlah_packing']);
		$title['title']='HOME';
		$this->load->view('header',$title);
		$this->load->view('dashboard',$data);
	}
}
