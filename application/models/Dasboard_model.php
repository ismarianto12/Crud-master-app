<?php 
/**
 * 
 */
class Dasboard_model extends CI_model
{
	
	function __construct()
	{
		# code...
	}

	function data_barang(){
		$this->db->select(' 
             count(a.id_barang) as jumlah_barang,count(b.id_barang_keluar) as jumlah_barang_keluar,
			 a.id_barang, b.id_barang_keluar,a.tanggal_barang,b.tanggal_keluar');
		$this->db->from('rn_barang a');
		$this->db->join('rn_barang_keluar b','a.id_barang=b.id_barang_keluar','left');
		$this->db->group_by('a.tanggal_barang,b.tanggal_keluar');
		return $this->db->get(); 
	}
}