<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ikan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library ('session'); 
		$this->load->library('pagination'); 
		$this->load->model('ikan_model');
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
	public function index()
	{
		$config['base_url'] = base_url().'ikan/index/'; //site url
        $config['total_rows'] = $this->db->count_all('ikan'); //total row
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
        $data['ikan'] = $this->ikan_model->select_all_index($config["per_page"], $data['page'])->result();          
        $data['pagination'] = $this->pagination->create_links();
		$title['title'] = 'Data Supplier';


		$title['title'] = 'Data Ikan';
		// $data['ikan'] = $this->ikan_model->selectAll()->result();
		$this->load->view('header',$title);
		// print_r($data);
		$this->load->view('ikan/ikan', $data);
	}
	public function insert()
	{
		$title['title'] = 'Input Data Ikan';
		$this->load->view('header',$title);
		$this->load->view('ikan/ikancreate');
	}
	public function simpan()
	{
		$data['nama_ikan']=htmlspecialchars($_POST['nama_ikan']);
		$this->ikan_model->insert_ikan($data);
		redirect(base_url("ikan")); 
	}
	public function sunting($id){
		$title['title'] = 'Sunting Data Ikan';
		$data['ikan'] = $this->ikan_model->selectikan($id)->result();
		$this->load->view('header',$title);
		$this->load->view('ikan/ikanupdate', $data);
	}
	public function simpanedit(){
		$where['id_ikan']=htmlspecialchars($_POST['id_ikan']);
		$data['nama_ikan']=htmlspecialchars($_POST['nama_ikan']);
		$this->ikan_model->update_ikan($data,$where);
		redirect(base_url("ikan")); 
	}
	public function hapus($id){
		$this->ikan_model->delete_ikan($id);
		redirect(base_url("ikan"));
	}
}