<?php  
class barang_model extends CI_Model {  
	function __construct()  
	{  
	    parent::__construct();  
	    $this->load->database();  
	}  
	
	public function select_all_index($limit,$start){  
	    return $this->db->query('SELECT `daftar_harga`.`id`, `daftar_harga`.`size`, `ikan`.`nama_ikan`, `daftar_harga`.`harga` FROM `daftar_harga` JOIN `ikan` ON `daftar_harga`.`id_ikan` = `ikan`.`id_ikan` LIMIT '.$start.','.$limit );
	}

	public function selectAll(){  
	    return $this->db->query('SELECT `daftar_harga`.`id`, `daftar_harga`.`size`, `ikan`.`nama_ikan`, `daftar_harga`.`harga` FROM `daftar_harga` JOIN `ikan` ON `daftar_harga`.`id_ikan` = `ikan`.`id_ikan`');
	}
	public function selectbarang($id){
		$this->db->select('*'); 
		$this->db->from('daftar_harga');
		$this->db->where('id', $id);
		$result = $this->db->get();		
		return $result;
	}
	public function insert_barang($data) {
		$this->db->insert('daftar_harga', $data);
		// $this->db->query('INSERT INTO intern (nama_intern , asal_daerah) VALUES ($data['nama_intern'],$data['asal_daerah'])');
	}
	public function update_barang($data, $where){

		$this->db->where($where);
		$this->db->update('daftar_harga', $data);
	
	}
	public function delete_barang($id){
		$this->db->where('id', $id);
		$this->db->delete('daftar_harga');
	}

}