<?php  
class ikan_model extends CI_Model {  
	function __construct()  
	{  
	    parent::__construct();  
	    $this->load->database();  
	}  
	public function select_all_index($limit,$start){  
	    return $this->db->get('ikan',$limit,$start);
	}
	public function selectAll(){  
	    return $this->db->get('ikan');
	}
	public function selectikan($id_ikan){
		$this->db->select('*'); 
		$this->db->from('ikan');
		$this->db->where('id_ikan', $id_ikan);
		$result = $this->db->get();		
		return $result;
	}
	public function insert_ikan($data) {
		$this->db->insert('ikan', $data);
		// $this->db->query('INSERT INTO intern (nama_intern , asal_daerah) VALUES ($data['nama_intern'],$data['asal_daerah'])');
	}
	public function update_ikan($data, $where){

		$this->db->where($where);
		$this->db->update('ikan', $data);
	
	}
	public function delete_ikan($id){
		$this->db->where('id_ikan', $id);
		$this->db->delete('ikan');
	}

}