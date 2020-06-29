<?php  
class supplier_model extends CI_Model {  
	function __construct()  
	{  
	    parent::__construct();  
	    $this->load->database();  
	}  
	public function selectAll(){  
	    return $this->db->get('supplier');
	}  
	public function select_all_index($limit, $start){  
	    return $this->db->get('supplier',$limit, $start);
	}
	public function selectSupplier($id_supplier){
		$this->db->select('*'); 
		$this->db->from('supplier');
		$this->db->where('id_supplier', $id_supplier);
		$result = $this->db->get();		
		return $result;
	}
	public function selectAsalDaerah(){
		$query = $this->db->query('SELECT DISTINCT asal_daerah from supplier ORDER BY asal_daerah');
		return $query->result();
	}
	public function insert_supplier($data) {
		$this->db->insert('supplier', $data);
		// $this->db->query('INSERT INTO supplier (nama_supplier , asal_daerah) VALUES ($data['nama_supplier'],$data['asal_daerah'])');
	}
	public function update_supplier($data, $where){

		$this->db->where($where);
		$this->db->update('supplier', $data);
	
	}
	public function delete_supplier($id){
		$this->db->where('id_supplier', $id);
		$this->db->delete('supplier');
	}

}