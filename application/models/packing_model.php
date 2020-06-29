<?php  
class packing_model extends CI_Model {  
	function __construct()  
	{  
	    parent::__construct();  
	    $this->load->database();  
	}
	public function select_all_index($limit,$start){
		$res = $this->db->query('SELECT nota_packing FROM packing LIMIT '.$start.','.$limit);
		return $res;
	}
	public function selectAll(){
		$res = $this->db->query('SELECT nota_packing FROM packing');
		return $res;
	}
	public function selectPacking($id){
		$res = $this->db->query("SELECT * FROM `packing` where `nota_packing` = '".$id."'");
		return $res;
	}
	public function getProses(){
		$res = $this->db->query('SELECT nota_proses FROM proses WHERE status = 0');
		return $res;
	}
	public function insert_packing($data) {
		$this->db->insert('packing', $data);
		
		// $this->db->query('INSERT INTO supplier (nama_supplier , asal_daerah) VALUES ($data['nama_supplier'],$data['asal_daerah'])');
	}
	public function update_status_proses($data, $where){
		$this->db->where($where);
		$this->db->update('proses', $data);
	}
	public function update_packing($data, $where){
		$this->db->where($where);
		$this->db->update('packing', $data);
	
	}
	public function delete_packing($id){
		$this->db->where('nota_packing', $id);
		$this->db->delete('packing');
	}
}
