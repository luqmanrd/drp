<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Intern extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library ('session');  
		$this->load->library('pagination'); 
		$this->load->model('intern_model');
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
	public function index()
	{
		$config['base_url'] = base_url().'intern/index/'; //site url
        $config['total_rows'] = $this->db->count_all('intern'); //total row
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
        $data['intern'] = $this->intern_model->select_all_index($config["per_page"], $data['page'])->result();          
        $data['pagination'] = $this->pagination->create_links();

		$title['title'] = 'Data Intern';
		// $data['intern'] = $this->intern_model->selectAll()->result();
		$this->load->view('header',$title);
		// print_r($data);
		$this->load->view('intern/intern', $data);
	}
	public function insert()
	{
		$title['title'] = 'Input Data Intern';
		$this->load->view('header',$title);
		$this->load->view('intern/interncreate');
	}
	public function simpan()
	{
		$data['nama_intern']=htmlspecialchars($_POST['nama_intern']);
		$this->intern_model->insert_intern($data);
		redirect(base_url("intern")); 
	}
	public function sunting($id){
		$title['title'] = 'Sunting Data Intern';
		$data['intern'] = $this->intern_model->selectintern($id)->result();
		$this->load->view('header',$title);
		$this->load->view('intern/internupdate', $data);
	}
	public function simpanedit(){
		$where['id_intern']=htmlspecialchars($_POST['id_intern']);
		$data['nama_intern']=htmlspecialchars($_POST['nama_intern']);
		$this->intern_model->update_intern($data,$where);
		redirect(base_url("intern")); 
	}
	public function hapus($id){
		$this->intern_model->delete_intern($id);
		redirect(base_url("intern"));
	}
}