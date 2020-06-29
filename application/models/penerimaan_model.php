<?php  
class penerimaan_model extends CI_Model {  
	function __construct()  
	{  
	    parent::__construct();  
	    $this->load->database();  
	}
	public function selectAll(){
		$res = $this->db->query('SELECT * FROM `penerimaan` p join (SELECT `nota_pembelian`, SUM(`berat`) as `totalberat` FROM `detail_penerimaan` GROUP BY `nota_pembelian`) x ON p.`nota_pembelian` = x.`nota_pembelian` JOIN `supplier` s ON p.`id_supplier` = s.id_supplier');
		return $res;
	}
	public function select_all_index($limit, $start){
		$res = $this->db->query('SELECT * FROM `penerimaan` p join (SELECT `nota_pembelian`, SUM(`berat`) as `totalberat` FROM `detail_penerimaan` GROUP BY `nota_pembelian`) x ON p.`nota_pembelian` = x.`nota_pembelian` JOIN `supplier` s ON p.`id_supplier` = s.id_supplier ORDER BY p.`tanggal` DESC LIMIT '.$start.','.$limit);
		return $res;
	}
	public function getNotaPembelianAll(){
		$this->db->select('nota_pembelian'); 
		$this->db->from('penerimaan');
		$this->db->where('status !=', 2);
		$result = $this->db->get();		
		return $result;
	}
	public function selectPenerimaan($nota_pembelian){
		$res = $this->db->query("SELECT * FROM `penerimaan` p JOIN `supplier` s ON p.`id_supplier` = s.id_supplier JOIN `ikan` i ON p.`id_ikan` = i.`id_ikan` WHERE p.`nota_pembelian` =  '".$nota_pembelian."'");
		return $res;
	}
	public function getDetail($nota_pembelian){
		$res = $this->db->query("SELECT * FROM `detail_penerimaan` d JOIN `daftar_harga` h ON d.`id_daftar_harga` = h.`id` JOIN `ikan` i ON h.`id_ikan` = i.`id_ikan` WHERE `nota_pembelian` = '".$nota_pembelian."' ORDER BY `id_daftar_harga`");
		return $res;
	}
	public function getNoNota()
	{
		$query = $this->db->query('SELECT nota_pembelian from penerimaan ORDER BY nota_pembelian DESC LIMIT 1');
		$result = $query->row();
    	if($query->num_rows() > 0){
			return $result->nota_pembelian;	
		}
    	else{
    		return 0;
    	}
	}
	public function insert_penerimaan($data) {
		$this->db->insert('penerimaan', $data);
		
		// $this->db->query('INSERT INTO supplier (nama_supplier , asal_daerah) VALUES ($data['nama_supplier'],$data['asal_daerah'])');
	}
	public function update_penerimaan($data, $where){

		$this->db->where($where);
		$this->db->update('penerimaan', $data);
	
	}
	public function delete_penerimaan($id){
		$this->db->where('nota_pembelian', $id);
		$this->db->delete('penerimaan');
	}
	public function delete_detail($id){
		$this->db->where('nota_pembelian', $id);
		$this->db->delete('detail_penerimaan');
	}
	public function insert_detail($data){
		$this->db->insert('detail_penerimaan', $data);
	}
	public function delete_AllDetail($data){
		$this->db->where($data);
		$this->db->delete('detail_penerimaan');
	}
	public function getReport($tgl_awal, $tgl_akhir){
		$res = $this->db->query("SELECT p.`nota_pembelian`, p.`nama_petani`, p.`tanggal`, q.`MC`, a.`TOTAL`, s.`nama_supplier` FROM `penerimaan` p JOIN (SELECT `packing`.`nota_packing`, `proses`.`nota_pembelian`, `packing`.`med_25`+`packing`.`med_30`+`packing`.`med_40`+`packing`.`med_50`+`packing`.`reg_25`+`packing`.`reg_30`+`packing`.`reg_40`+`packing`.`reg_50`+`packing`.`bulkpack_med_25`+`packing`.`bulkpack_med_30`+`packing`.`bulkpack_med_40`+`packing`.`bulkpack_med_50`+`packing`.`bulkpack_reg_25`+`packing`.`bulkpack_reg_30`+`packing`.`bulkpack_reg_40`+`packing`.`bulkpack_reg_50`+`packing`.`reg_kuning_25`+`packing`.`reg_kuning_30`+`packing`.`reg_kuning_40`+`packing`.`reg_kuning_50`+`packing`.`reg_2nd_25`+`packing`.`reg_2nd_30`+`packing`.`reg_2nd_40`+`packing`.`reg_2nd_50` AS `MC` FROM `proses` JOIN `packing` ON `packing`.`nota_proses`=`proses`.`nota_proses`) q ON q.`nota_pembelian` = p.`nota_pembelian` JOIN `supplier` s ON p.`id_supplier` = s.`id_supplier` JOIN (SELECT SUM(`berat`) as TOTAL, `nota_pembelian` FROM `detail_penerimaan` GROUP BY`nota_pembelian`) r ON r.`nota_pembelian` = p.`nota_pembelian` JOIN (SELECT SUM(`berat`) AS `TOTAL`, `nota_pembelian` FROM `detail_penerimaan` GROUP BY `nota_pembelian`) a ON a.`nota_pembelian` = p.`nota_pembelian` WHERE p.`tanggal` BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."'");
		return $res;
	}
}