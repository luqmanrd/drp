<?php 
class Cetak extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('penerimaan_model');
        $this->load->model('proses_model');
        $this->load->library('pdf2');
    }
    public function penerimaan($id){
        $data['terima'] = $this->penerimaan_model->selectPenerimaan($id)->result();
        $data['detail'] = $this->penerimaan_model->getDetail($id)->result();
        $this->load->view('nota/view_penerimaan',$data);
        // print_r($data);        
    }

    public function pembelian($id){
        $data['terima'] = $this->penerimaan_model->selectPenerimaan($id)->result();
        $data['detail'] = $this->penerimaan_model->getDetail($id)->result();
        $this->load->view('nota/view_pembelian',$data);
        // print_r($data);
    }

    public function proses($id){
        $data['proses'] = $this->proses_model->selectProses($id)->result();
        $this->load->view('nota/view_proses',$data);
    }
}
?>