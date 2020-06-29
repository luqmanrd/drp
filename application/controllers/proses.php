<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proses extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library ('session');
        $this->load->library('pagination'); 
		$this->load->model('proses_model');
		$this->load->model('intern_model');	
		$this->load->model('penerimaan_model');
		$this->load->model('supplier_model');
		$this->load->model('ikan_model');
		$this->load->model('barang_model');
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	public function index(){
        $config['base_url'] = base_url().'proses/index/'; //site url
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
		$this->load->view('header',$title);
		$this->load->view('proses/proses', $data);
	}

	public function detail($id){
		$title['title'] = 'Data Proses '.$id;
	    $data['proses'] = $this->proses_model->selectProses($id)->result();
	    // print_r($data);
	    $this->load->view('header',$title); 
		$this->load->view('proses/prosesdetail',$data);
	}

	public function input(){
		$title['title'] = 'Input Data Proses';
		$nota_penerimaan = $this->penerimaan_model->getNoNota();
		$nota_proses = $this->proses_model->getNoNota();
		if ($nota_proses!=0) {
			$nota_proses = substr($nota_proses,15,4);
		}
		if ($nota_penerimaan!=0) {
			$nota_penerimaan = substr($nota_penerimaan,15,4);
		}
		if ($nota_proses>$nota_penerimaan) {
			$no_nota = $nota_proses+1;
		}else{
			$no_nota = $nota_penerimaan+1;
		}
		if(isset ($_POST['nota_pembelian'])){
			$data['nota_pembelian']=htmlspecialchars($_POST['nota_pembelian']);
		}else{
			$data['nota_pembelian']=$this->penerimaan_model->getNotaPembelianAll()->result();
		}
		$data['no_nota']=sprintf("%04s", $no_nota);
		$data['tgl_skrg'] = date('Y-m-d');
		$data['intern'] = $this->intern_model->selectAll()->result();
		$this->load->view('header',$title); 
		$this->load->view('proses/prosesinput',$data);
	}

	public function insert(){
		$data=$_POST;

		$beratTotal=$this->proses_model->getTotalRMditerima($data['nota_pembelian']);
		$beratProses=$this->proses_model->getTotalRMterproses($data['nota_pembelian']);
		$beratInput=$data['rm_diproses'];

		if($beratTotal-($beratProses+$beratInput)<=0){
			// 5000-(3000+1000)

			$status['status']=2;
		}else if($beratTotal-($beratProses+$beratInput)>0){
			$status['status']=1;
		}else{
			$status['status']=0;
		}
		$where['nota_pembelian']=$data['nota_pembelian'];
		// print_r($data);
		$this->proses_model->insert_proses($data);
		$this->proses_model->update_status_terima($status,$where);
		// redirect(base_url("proses"));
	    $referred_from = $this->session->userdata('referred_from');
        redirect($referred_from, 'refresh');
    }
	public function sunting($id){
		$title['title'] = 'Sunting Data Proses';
		$data['proses'] = $this->proses_model->selectProses($id)->result();
		$no_nota = $data['proses']['0']->nota_proses;
		$data['no_nota'] = substr($no_nota,15,4);
		$data['intern'] = $this->intern_model->selectAll()->result();
		// print_r($data);
		$this->load->view('header',$title); 
		$this->load->view('proses/prosesupdate',$data);
	}
	public function simpanedit(){
		$where['nota_proses']=htmlspecialchars($_POST['nota_proses_awal']);
		$data['nota_proses']=htmlspecialchars($_POST['nota_proses']);
		$data['nota_pembelian']=htmlspecialchars($_POST['nota_pembelian']);
		$data['tanggal']=htmlspecialchars($_POST['tanggal']);
		$data['id_intern']=htmlspecialchars($_POST['id_intern']);
		$data['rm_diproses']=htmlspecialchars($_POST['rm_diproses']);
		$data['fillet']=htmlspecialchars($_POST['fillet']);
		$data['trimming_reg']=htmlspecialchars($_POST['trimming_reg']);
        $data['trimming_med']=htmlspecialchars($_POST['trimming_med']);
		$data['soaking_reg']=htmlspecialchars($_POST['soaking_reg']);
        $data['soaking_med']=htmlspecialchars($_POST['soaking_med']);
		$data['freezing_reg']=htmlspecialchars($_POST['freezing_reg']);
        $data['freezing_med']=htmlspecialchars($_POST['freezing_med']);
		$data['giling']=htmlspecialchars($_POST['giling']);
		$data['belly_s']=htmlspecialchars($_POST['belly_s']);
		$data['belly_d']=htmlspecialchars($_POST['belly_d']);
		$data['d_trimming']=htmlspecialchars($_POST['d_trimming']);
		$data['kerok']=htmlspecialchars($_POST['kerok']);
		$data['kulit']=htmlspecialchars($_POST['kulit']);
		$data['kepala']=htmlspecialchars($_POST['kepala']);
		$data['limbah_sirip']=htmlspecialchars($_POST['limbah_sirip']);
		$data['limbah']=htmlspecialchars($_POST['limbah']);
		$data['tk_harian_org']=htmlspecialchars($_POST['tk_harian_org']);
		$data['tk_harian_jam']=htmlspecialchars($_POST['tk_harian_jam']);
		$data['tk_jam_org']=htmlspecialchars($_POST['tk_jam_org']);
		$data['tk_jam_jam']=htmlspecialchars($_POST['tk_jam_jam']);
		$data['tk_borongan_org']=htmlspecialchars($_POST['tk_borongan_org']);
		$data['tk_borongan_jam']=htmlspecialchars($_POST['tk_borongan_jam']);
		$data['es_balok_balok']=htmlspecialchars($_POST['es_balok_balok']);
		$data['es_balok_harsat']=htmlspecialchars($_POST['es_balok_harsat']);
		$data['es_tube_bag']=htmlspecialchars($_POST['es_tube_bag']);
		$data['es_tube_harsat']=htmlspecialchars($_POST['es_tube_harsat']);
		$data['additif_kgs']=htmlspecialchars($_POST['additif_kgs']);
		$data['additif_harsat']=htmlspecialchars($_POST['additif_harsat']);

		$beratTotal=$this->proses_model->getTotalRMditerima($data['nota_pembelian']);
		$beratProses=$this->proses_model->getTotalRMterproses($data['nota_pembelian']);
		$beratProsesAwal=htmlspecialchars($_POST['rm_diproses_awal']);
		$beratInput=$data['rm_diproses'];

		if(($beratProses-$beratProsesAwal)+$beratInput>=$beratTotal){
			$status['status']=2;
		}else if(($beratProses-$beratProsesAwal)+$beratInput<$beratTotal && ($beratProses-$beratProsesAwal)+$beratInput>0){
			$status['status']=1;
		}else{
			$status['status']=0;
		}
		$identifier['nota_pembelian']=$data['nota_pembelian'];

		$this->proses_model->update_proses($data,$where);
		$this->proses_model->update_status_terima($status,$identifier);
		redirect(base_url("proses/detail/".$data['nota_proses']));
	}

	public function hapus($id){
		$nota_pembelian = $this->proses_model->getNotaPembelian($id);
		$rm_diproses = $this->proses_model->get_rm_diproses($id);
		$rm_terproses = $this->proses_model->getTotalRMterproses($nota_pembelian);
		// $data['sumproses']=$this->proses_model->selectSum($id)->result();
		// echo $rm_terproses-$rm_diproses;

		if(($rm_terproses-$rm_diproses)>0){
			$status['status']=1;
		}else{
			$status['status']=0;
		}
		$identifier['nota_pembelian']=$nota_pembelian;
		$this->proses_model->delete_proses($id);
		$this->proses_model->update_status_terima($status,$identifier);
		// redirect(base_url("proses"));
        $referred_from = $this->session->userdata('referred_from');
        redirect($referred_from, 'refresh');
		// // echo "halo";
	}
}