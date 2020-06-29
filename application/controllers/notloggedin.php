<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notloggedin extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library ('session');
		$this->load->library('pagination');
		$this->load->model('dashboard_model');
		$this->load->model('penerimaan_model');
		$this->load->model('proses_model');
		$this->load->model('packing_model');
		$this->load->model('supplier_model');
		$this->load->model('ikan_model');
		if($this->session->userdata('status') == "login"){
			redirect(base_url());
		}
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
		$this->load->view('Notloggedin/header',$title);
		$this->load->view('Notloggedin/home',$data);
	}
	public function terima(){
		$penerimaan['jumlah']=$this->penerimaan_model->selectAll()->result();
		$jumlah_data_penerimaan=count($penerimaan['jumlah']);
		// echo $jumlah_data_penerimaan;
        $config['base_url'] = base_url().'notloggedin/terima/'; //site url
        $config['total_rows'] = $jumlah_data_penerimaan; //total row
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
        $data['terima'] = $this->penerimaan_model->select_all_index($config["per_page"], $data['page'])->result();          
        $data['pagination'] = $this->pagination->create_links();


		$title['title'] = 'Data Penerimaan Barang';
		$data['jumlah_terima']=$config['total_rows'];
		// $data['terima']=$this->penerimaan_model->selectAll()->result();
	    // print_r($data);
		$this->load->view('notloggedin/header',$title); 
		$this->load->view('notloggedin/penerimaan',$data);
	}
	public function penerimaandetail($id){
		$title['title'] = 'Data Penerimaan '.$id;
		$data['terima'] = $this->penerimaan_model->selectPenerimaan($id)->result();
		$data['detail'] = $this->penerimaan_model->getDetail($id)->result();
		$data['proses']=$this->proses_model->selectAllById($id)->result();
		$data['sumproses']=$this->proses_model->selectSum($id)->result();
		$data['jumlah_data_proses']=count($data['proses']);
	    // print_r($data);
		$this->load->view('notloggedin/header',$title); 
		$this->load->view('notloggedin/penerimaandetail',$data);
	}
	public function proses(){
		$config['base_url'] = base_url().'notloggedin/proses/'; //site url
        $config['total_rows'] = $this->db->count_all('proses'); //total row
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
        $data['proses'] = $this->proses_model->select_all_index($config["per_page"], $data['page'])->result();          
        $data['pagination'] = $this->pagination->create_links();

		$title['title'] = 'Data Proses';
		$data['jumlah_proses']=$config['total_rows'];
		// $data['proses']=$this->proses_model->selectAll()->result();
		$this->load->view('notloggedin/header',$title);
		$this->load->view('notloggedin/proses', $data);
	}
	public function prosesdetail($id){
		$title['title'] = 'Data Proses '.$id;
	    $data['proses'] = $this->proses_model->selectProses($id)->result();
	    // print_r($data);
	    $this->load->view('notloggedin/header',$title); 
		$this->load->view('notloggedin/prosesdetail',$data);
	}
	public function packing(){
		$config['base_url'] = base_url().'notloggedin/packing/'; //site url
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
		$this->load->view('notloggedin/header',$title);
		$this->load->view('notloggedin/packing', $data);
	}
	public function packingdetail($id){
		$title['title'] = 'Data Packing '.$id;
		$data['packing'] = $this->packing_model->selectPacking($id)->result();
	    // print_r($data);
	    $this->load->view('notloggedin/header', $title); 
		$this->load->view('notloggedin/packingdetail',$data);
	}
}