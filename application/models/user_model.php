<?php  
class user_model extends CI_Model {  
	function __construct()  
	{  
		parent::__construct();  
		$this->load->database();  
	}  

	public function islogin($data){  
	    $this->db->where('username',$data['username']);
   		$this->db->where('password',$data['password']);
	    $result = $this->db->get('user',1);
	    return $result;
	}
	public function cek_username($data){  
		$this->db->select('*'); 
		$this->db->from('user');
		$this->db->where('username', $data);
		$result = $this->db->get();
		return $result;
	}
	function updateUser($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	function updatePassword($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}