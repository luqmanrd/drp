<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('penerimaan_model');
		$this->load->library ('session');
		$this->load->library('pagination');
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
	public function index(){
		$title['title'] = "Laporan";
		$this->load->view('header',$title);
		$this->load->view('laporan/laporan');
	}
	public function getData(){
		$tgl_awal = htmlspecialchars($_POST['tgl_awal']);
		$tgl_akhir = htmlspecialchars($_POST['tgl_akhir']);
		$data['terima'] = $this->penerimaan_model->getReport($tgl_awal, $tgl_akhir)->result();
		// echo count($data['terima']);
		$i=0;
		$totalrm = 0;
		$totalmc = 0;
		if(count($data['terima'])!=0){
			echo '<table class="table table-hover table-responsive-lg"><thead><tr><th scope="col">No</th><th scope="col">Nota</th><th scope="col">Tanggal</th><th scope="col">Supplier</th><th scope="col">Total Berat</th><th scope="col">Total MC</th></tr></thead><tbody>';
			foreach ($data['terima'] as $s) {
				$i++;
				$totalrm += $s->TOTAL;
				$totalmc += $s->MC;
				echo '<tr><td>'.$i.'</td><td>'.$s->nota_pembelian.'</td><td>'.$s->tanggal.'</td><td>'.$s->nama_supplier.'</td><td>'.$s->TOTAL.'</td><td>'.$s->MC.'</td></tr>';
			}
			echo '<tr><td colspan=4 class="text-right"><strong>TOTAL</strong></td><td>'.$totalrm.'</td><td>'.$totalmc.'</td></tr>';
			echo '</tbody></table>';
		}
		else{
			echo '<div class="col-md-12 col-form-label text-center strong-grey"><strong>- Data Tidak Tersedia -</strong></div>';
		}
	}
}