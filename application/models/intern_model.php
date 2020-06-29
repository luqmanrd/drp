<?php  
class intern_model extends CI_Model {  
	function __construct()  
	{  
	    parent::__construct();  
	    $this->load->database();  
	}  
	public function select_all_index($limit,$start){  
	    return $this->db->get('intern',$limit,$start);
	}  
	public function selectAll(){  
	    return $this->db->get('intern');
	}
	public function selectintern($id_intern){
		$this->db->select('*'); 
		$this->db->from('intern');
		$this->db->where('id_intern', $id_intern);
		$result = $this->db->get();		
		return $result;
	}
	public function insert_intern($data) {
		$this->db->insert('intern', $data);
		// $this->db->query('INSERT INTO intern (nama_intern , asal_daerah) VALUES ($data['nama_intern'],$data['asal_daerah'])');
	}
	public function update_intern($data, $where){

		$this->db->where($where);
		$this->db->update('intern', $data);
	
	}
	public function delete_intern($id){
		$this->db->where('id_intern', $id);
		$this->db->delete('intern');
	}

}