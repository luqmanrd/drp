<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Terima extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library ('session');
		$this->load->library('pagination');
		$this->load->model('penerimaan_model');
		$this->load->model('proses_model');
		$this->load->model('supplier_model');
		$this->load->model('ikan_model');
		$this->load->model('barang_model');
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
	public function index(){
		//konfigurasi pagination
		$penerimaan['jumlah']=$this->penerimaan_model->selectAll()->result();
		$jumlah_data_penerimaan=count($penerimaan['jumlah']);
		// echo $jumlah_data_penerimaan;
        $config['base_url'] = base_url().'terima/index/'; //site url
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
		$this->load->view('header',$title); 
		$this->load->view('penerimaan/penerimaan',$data);
	}
	public function detail($id){
		$title['title'] = 'Data Penerimaan '.$id;
		$data['terima'] = $this->penerimaan_model->selectPenerimaan($id)->result();
		$data['detail'] = $this->penerimaan_model->getDetail($id)->result();
		$data['proses']=$this->proses_model->selectAllById($id)->result();
		$data['sumproses']=$this->proses_model->selectSum($id)->result();
		$data['jumlah_data_proses']=count($data['proses']);
	    // print_r($data);
		$this->load->view('header',$title); 
		$this->load->view('penerimaan/penerimaandetail',$data);
	}
	public function input()
	{
		$title['title'] = 'Input Data Penerimaan Barang';
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
		$data['no_nota'] = sprintf("%04s", $no_nota);
		$data['supplier']=$this->supplier_model->selectAll()->result();
		$data['ikan'] = $this->ikan_model->selectAll()->result();
		$data['barang'] = $this->barang_model->selectAll()->result();
		$data['tgl_skrg'] = date('Y-m-d');
		// print_r($data);
		$this->load->view('header',$title); 
		$this->load->view('penerimaan/penerimaaninput',$data);
	}

	public function insert(){
		$data['nota_pembelian']=htmlspecialchars($_POST['nota_pembelian']);
		$data['id_supplier']=htmlspecialchars($_POST['id_supplier']);
		$data['id_ikan']=htmlspecialchars($_POST['id_ikan']);
		$data['tanggal']=htmlspecialchars($_POST['tanggal']);
		$data['surat_jalan']=htmlspecialchars($_POST['surat_jalan']);
		$data['no_pol']=htmlspecialchars($_POST['no_pol']);
		$data['nama_petani']=htmlspecialchars($_POST['nama_petani']);
		$data['percent_kgs_tonase']=htmlspecialchars($_POST['percent_kgs_tonase']);
		$data['grm_pcs']=htmlspecialchars($_POST['grm_pcs']);
		$data['uniformity']=htmlspecialchars($_POST['uniformity']);
		$data['suhu']=htmlspecialchars($_POST['suhu']);
		$data['ket']=htmlspecialchars($_POST['ket']);
		$data['org']=htmlspecialchars($_POST['org']);
		$data['jam']=htmlspecialchars($_POST['jam']);
		$this->penerimaan_model->insert_penerimaan($data);
		$number = count($_POST["id_barang"]);
		for($i=0; $i<$number; $i++) {
			$detail = array(
				'id_daftar_harga' => $_POST['id_barang'][$i],
				'berat' => $_POST['berat'][$i],
				'nota_pembelian' => $data['nota_pembelian']
			);
			$this->penerimaan_model->insert_detail($detail);
		}
		redirect(base_url("terima/"));
	}
	public function sunting($id){
		$title['title'] = 'Sunting Data Penerimaan Barang';
		$data['terima'] = $this->penerimaan_model->selectPenerimaan($id)->result();
		$data['detail'] = $this->penerimaan_model->getDetail($id)->result();
		$no_nota = $data['terima']['0']->nota_pembelian;
		$data['supplier'] = $this->supplier_model->selectAll()->result();
		$data['ikan'] = $this->ikan_model->selectAll()->result();
		$data['barang'] = $this->barang_model->selectAll()->result();
		$data['no_nota'] = substr($no_nota,15,4);
		// print_r($data['terima']['0']->nota_pembelian);
		// echo $no_nota;
		// print_r($data);
		$this->load->view('header',$title); 
		$this->load->view('penerimaan/penerimaanupdate',$data);
	}
	public function simpanedit(){
		// print_r($_POST);
		$where['nota_pembelian']=htmlspecialchars($_POST['nota_pembelian_awal']);
		$this->penerimaan_model->delete_AllDetail($where);
		$data['nota_pembelian']=htmlspecialchars($_POST['nota_pembelian']);
		$url=htmlspecialchars($_POST['nota_pembelian']);
		$data['id_supplier']=htmlspecialchars($_POST['id_supplier']);
		$data['id_ikan']=htmlspecialchars($_POST['id_ikan']);
		$data['tanggal']=htmlspecialchars($_POST['tanggal']);
		$data['surat_jalan']=htmlspecialchars($_POST['surat_jalan']);
		$data['no_pol']=htmlspecialchars($_POST['no_pol']);
		$data['nama_petani']=htmlspecialchars($_POST['nama_petani']);
		$data['percent_kgs_tonase']=htmlspecialchars($_POST['percent_kgs_tonase']);
		$data['grm_pcs']=htmlspecialchars($_POST['grm_pcs']);
		$data['uniformity']=htmlspecialchars($_POST['uniformity']);
		$data['suhu']=htmlspecialchars($_POST['suhu']);
		$data['ket']=htmlspecialchars($_POST['ket']);
		$data['org']=htmlspecialchars($_POST['org']);
		$data['jam']=htmlspecialchars($_POST['jam']);
		$this->penerimaan_model->update_penerimaan($data,$where);
		$number = count($_POST["id_barang"]);
		for($i=0; $i<$number; $i++) {
			$detail = array(
				'id_daftar_harga' => $_POST['id_barang'][$i],
				'berat' => $_POST['berat'][$i],
				'nota_pembelian' => $data['nota_pembelian']
			);
			$this->penerimaan_model->insert_detail($detail);
		}
		redirect(base_url("terima/detail/".$url)); 
	}
	public function hapus($id){
		$this->penerimaan_model->delete_detail($id);
		$this->penerimaan_model->delete_penerimaan($id);
		 $referred_from = $this->session->userdata('referred_from');
        redirect($referred_from, 'refresh');		// echo "halo";
	}
	public function cetaknotabeli($id){
		$this->load->library('pdf');        
		$pdf = new FPDF('l','mm','A5');
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',11);
		$pdf->Cell(150,6,'No. Nota:',0,0,'R');
		$pdf->Cell(40,6,'',0,1);
		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(120,6,'',0,0);
		$pdf->Cell(70,10,'NOTA PEMBELIAN','L,T',1);
		$pdf->Line(8,26,130,26);
		$pdf->Ln(2); /** */
		$pdf->SetFont('Arial','B',11);
		$pdf->Cell(120,6,'Supplier','B,R',0);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(55,6,'Misc','T',1);
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(15,6,'Nama:',0,0);
		$pdf->Cell(105,6,'',0,0);
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(25,6,'Date:',0,0);
		$pdf->Cell(30,6,'',0,1);
		$pdf->Cell(120,6,'',0,0);
		$pdf->Cell(25,6,'No. Surat Jalan:',0,0);
		$pdf->Cell(30,6,'',0,1);
		$pdf->Cell(120,6,'',0,0);
		$pdf->Cell(25,6,'No. Pol Mobil',0,0);
		$pdf->Cell(30,6,'',0,1);

		$pdf->SetFont('Arial','B',11);
		$pdf->Cell(50,9,'Qty',1,0,'C');
		$pdf->Cell(90,9,'DESCRIPTION',1,0,'C');
		$pdf->Cell(42,9,'TOTAL',1,1,'C');

		$pdf->SetFont('Arial','',9);
		$pdf->Cell(40,6,'','L,R',0);
		$pdf->Cell(10,6,'Kg','R',0);
		$pdf->Cell(50,6,'Patin >600','L',0);
		$pdf->Cell(40,6,'','0',0);
		$pdf->Cell(42,6,'','L,R',1,'C');

		$pdf->Cell(40,6,'','L,R',0);
		$pdf->Cell(10,6,'Kg','R',0);
		$pdf->Cell(50,6,'Patin 600-700 gr','L',0);
		$pdf->Cell(40,6,'','0',0);
		$pdf->Cell(42,6,'','L,R',1,'C');

		$pdf->Cell(40,6,'','L,R',0);
		$pdf->Cell(10,6,'Kg','R',0);
		$pdf->Cell(50,6,'Patin 700-1200 gr','L',0);
		$pdf->Cell(40,6,'','0',0);
		$pdf->Cell(42,6,'','L,R',1,'C');

		$pdf->Cell(40,6,'','L,R',0);
		$pdf->Cell(10,6,'Kg','R',0);
		$pdf->Cell(50,6,'Patin 1200-1400','L',0);
		$pdf->Cell(40,6,'','0',0);
		$pdf->Cell(42,6,'','L,R',1,'C');

		$pdf->Cell(40,6,'','L,R',0);
		$pdf->Cell(10,6,'Kg','R',0);
		$pdf->Cell(50,6,'Daging Kuning','L',0);
		$pdf->Cell(40,6,'','0',0);
		$pdf->Cell(42,6,'','L,R',1,'C');

		$pdf->SetFont('Arial','b',9);
		$pdf->Cell(40,6,'','1',0);
		$pdf->Cell(10,6,'Kg','R,B',0);
		$pdf->Cell(50,6,'','B',0);
		$pdf->Cell(40,6,'','B',0);
		$pdf->Cell(42,6,'','L,R',1,'C');

		$pdf->Cell(40,6,'','0',0);
		$pdf->Cell(10,6,'','0',0);
		$pdf->Cell(50,6,'','0',0);
		$pdf->Cell(40,6,'TOTAL','T',0,'R');
		$pdf->Cell(42,6,'','1',1,'C');

		$pdf->Cell(40,5,'Signature','B,R',1);
		$pdf->Line(50,103,120,103);
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(50,5,'Supplier',0,0,'C');
		$pdf->Cell(50,5,'Mengetahui/Menyetujui',0,0,'C');
		$pdf->Cell(50,5,'Diperiksa Oleh',0,0,'C');
		$pdf->Cell(50,5,'Pembelian',0,1,'C');
		$pdf->Ln(10);
		$pdf->Cell(50,5,'tt',0,0,'C');
		$pdf->Cell(50,5,'tt',0,0,'C');
		$pdf->Cell(50,5,'tt',0,0,'C');
		$pdf->Cell(50,5,'tt',0,0,'C');
		$pdf->Image('assets/img/drp_icon.png',5,20,20,'png');
		$pdf->Output('D',"Nota Pembelian - .pdf");  

	}
}