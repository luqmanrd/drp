<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Packing extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library ('session');
		$this->load->library('pagination'); 
		$this->load->model('packing_model');
		$this->load->model('proses_model');
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
	public function index(){
		$config['base_url'] = base_url().'packing/index/'; //site url
        $config['total_rows'] = $this->db->count_all('packing'); //total row
        $config['per_page'] = 10;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
     	$config['first_link']       = 'Awal';
        $config['last_link']        = 'Akhir';
        $config['next_link']        = 'Selanjutnya';
        $config['prev_link']        = 'Sebelumnya';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['packing'] = $this->packing_model->select_all_index($config["per_page"], $data['page'])->result();          
        $data['pagination'] = $this->pagination->create_links();

		$title['title'] = 'Data Packing';
		$data['jumlah_packing']=$config['total_rows'];
		// $data['packing']=$this->packing_model->selectAll()->result();
		$this->load->view('header',$title);
		$this->load->view('packing/packing', $data);
	}
	public function detail($id){
		$title['title'] = 'Data Packing '.$id;
		$data['packing'] = $this->packing_model->selectPacking($id)->result();
	    // print_r($data);
	    $this->load->view('header', $title); 
		$this->load->view('packing/packingdetail',$data);
	}
	public function input(){
		$title['title'] = 'Input Data Packing';
		$data['nota_proses']=$this->packing_model->getProses()->result();
		$this->load->view('header',$title); 
		$this->load->view('packing/packinginput',$data);
	}
	public function insert(){
		// $data['nota_packing']="2019.08.15.103.0006";
		// $data['nota_proses']="2019.08.15.103.0006";
		$data=$_POST;
		// echo $data['nota_proses'];
		$where['nota_proses']=$data['nota_proses'];
		$status['status']=1;
		// print_r($data);
		$this->packing_model->insert_packing($data);
		$this->packing_model->update_status_proses($status,$where);
		redirect(base_url('packing'));

	}
	public function sunting($id){
		$title['title'] = 'Sunting Data Packing';
		$data['packing'] = $this->packing_model->selectPacking($id)->result();
	    // print_r($data);
	    $this->load->view('header',$title); 
		$this->load->view('packing/packingupdate',$data);
	}
	public function simpanedit(){
		$where['nota_packing']=$_POST['nota_packing'];
		$data=$_POST;
		$id=$_POST['nota_packing'];
		$this->packing_model->update_packing($data,$where);
		redirect(base_url('packing/detail/'.$data['nota_packing']));
	}
	public function hapus($id){
		$where['nota_proses']=$id;
		$status['status']=0;
		$this->packing_model->delete_packing($id);
		$this->packing_model->update_status_proses($status,$where);
		redirect(base_url("packing"));
		// echo "halo";
	}
}