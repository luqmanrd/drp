<?php  
class proses_model extends CI_Model {  
	function __construct()  
	{  
	    parent::__construct();  
	    $this->load->database();  
	}
	public function select_all_index($limit,$start){
		$res = $this->db->query('SELECT `nota_proses`,`nota_pembelian`,`rm_diproses`,i.`nama_intern` FROM `proses` p JOIN `intern` i ON p.`id_intern` = i.`id_intern` ORDER BY p.`nota_pembelian` ASC LIMIT '.$start.','.$limit);
		return $res;
	}
	public function selectAll(){
		$res = $this->db->query('SELECT `nota_proses`,`nota_pembelian`,`rm_diproses`,i.`nama_intern` FROM `proses` p JOIN `intern` i ON p.`id_intern` = i.`id_intern` ORDER BY p.`nota_pembelian` ASC');
		return $res;
	}
	public function selectAllById($id){
		$res = $this->db->query("SELECT `nota_proses`,`nota_pembelian`,`rm_diproses` FROM `proses` WHERE nota_pembelian = '".$id."'");
		return $res;
	}
	public function selectSum($id){
		$res = $this->db->query("SELECT SUM(`rm_diproses`) AS `rm_diproses`, SUM(`fillet`) AS `fillet`, SUM(`trimming_reg`) AS `trimming_reg`, SUM(`soaking_med`) AS `soaking_med`, SUM(`soaking_reg`) AS `soaking_reg`,SUM(`trimming_med`) AS `trimming_med`, SUM(`freezing_reg`) AS `freezing_reg`,SUM(`freezing_med`) AS `freezing_med`, SUM(`daging_kuning`) AS `daging_kuning`, SUM(`giling`) AS `giling`, SUM(`belly_s`) AS `belly_s`,SUM(`belly_d`) AS `belly_d`,SUM(`d_trimming`) AS `d_trimming`, SUM(`kerok`) AS `kerok`, SUM(`kulit`) AS `kulit`, SUM(`kepala`) AS `kepala`, SUM(`tulang_giling`) AS `tulang_giling`, SUM(`limbah_sirip`) AS `limbah_sirip`, SUM(`limbah`) AS `limbah`, SUM(`tk_harian_jam`) AS `tk_harian_jam`, SUM(`tk_harian_org`) AS `tk_harian_org`, SUM(`tk_jam_jam`) AS `tk_jam_jam`, SUM(`tk_jam_org`) AS `tk_jam_org`, SUM(`tk_borongan_jam`) AS `tk_borongan_jam`, SUM(`tk_borongan_org`) AS `tk_borongan_org`, SUM(`es_balok_balok`) AS `es_balok_balok`, AVG(`es_balok_harsat`) AS `es_balok_harsat`, SUM(`es_tube_bag`) AS `es_tube_bag`, AVG(`es_tube_harsat`) AS `es_tube_harsat`, SUM(`additif_kgs`) AS `additif_kgs`, AVG(`additif_harsat`) AS `additif_harsat` FROM `proses` WHERE `nota_pembelian` = '".$id."'");
		return $res;
	}
	public function selectProses($id){
		$res = $this->db->query("SELECT p.*, i.`nama_intern` FROM `proses` p JOIN `intern` i ON p.`id_intern` = i.`id_intern` where p.`nota_proses` = '".$id."'");
		return $res;
	}

	public function getNoNota()
	{
		$query = $this->db->query('SELECT nota_proses from proses ORDER BY nota_proses DESC LIMIT 1');
		$result = $query->row();
		if($query->num_rows() > 0){
			return $result->nota_proses;	
		}
    	else{
    		return 0;
    	}
	}
	public function getTotalRMditerima($id){
		$res = $this->db->query("SELECT SUM(`berat`) AS `rm_diproses` FROM `detail_penerimaan` WHERE `nota_pembelian` = '".$id."'");
		$result = $res->row();
		if($res->num_rows() > 0){
			return $result->rm_diproses;	
		}
    	else{
    		return 0;
    	}
	}
	public function getTotalRMterproses($id){
		$res = $this->db->query("SELECT SUM(`rm_diproses`) AS `rm_terproses` FROM `proses` WHERE `nota_pembelian` = '".$id."'");
		$result = $res->row();
		if($res->num_rows() > 0){
			return $result->rm_terproses;	
		}
    	else{
    		return 0;
    	}
	}
	public function getNotaPembelian($id){
		$res = $this->db->query("SELECT `nota_pembelian` FROM `proses` WHERE `nota_proses`= '".$id."'");
		$result = $res->row();
		if($res->num_rows() > 0){
			return $result->nota_pembelian;	
		}
    	else{
    		return 0;
    	}
	}
	public function update_status_terima($data, $where){
		$this->db->where($where);
		$this->db->update('penerimaan', $data);
	}
	public function insert_proses($data) {
		$this->db->insert('proses', $data);
		
		// $this->db->query('INSERT INTO supplier (nama_supplier , asal_daerah) VALUES ($data['nama_supplier'],$data['asal_daerah'])');
	}

	public function update_proses($data, $where){
		$this->db->where($where);
		$this->db->update('proses', $data);
	
	}

	public function delete_proses($id){
		$this->db->where('nota_proses', $id);
		$this->db->delete('proses');
	}
	public function get_rm_diproses($id){
		$res = $this->db->query("SELECT `rm_diproses` FROM `proses` WHERE `nota_proses`='".$id."'");
		$result = $res->row();
		if($res->num_rows() > 0){
			return $result->rm_diproses;	
		}
    	else{
    		return 0;
    	}	
	}
}