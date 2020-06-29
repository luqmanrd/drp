<?php  
class notloggedin_model extends CI_Model {  
	function __construct()  
	{  
	    parent::__construct();  
	    $this->load->database();  
	}
	public function select_all_terima(){
		$res = $this->db->query('SELECT * FROM `penerimaan` p join (SELECT `nota_pembelian`, SUM(`berat`) as `totalberat` FROM `detail_penerimaan` GROUP BY `nota_pembelian`) x ON p.`nota_pembelian` = x.`nota_pembelian` JOIN `supplier` s ON p.`id_supplier` = s.id_supplier LIMIT 3');
		return $res;
	}
	public function select_all_proses(){
		$res = $this->db->query('SELECT `nota_proses`,`nota_pembelian`,`rm_diproses`,i.`nama_intern` FROM `proses` p JOIN `intern` i ON p.`id_intern` = i.`id_intern` ORDER BY p.`nota_pembelian` ASC LIMIT 3');
		return $res;
	}
	public function select_all_packing(){
		$res = $this->db->query('SELECT nota_packing FROM packing LIMIT 3');
		return $res;
	}
}