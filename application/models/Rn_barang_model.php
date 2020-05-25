<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rn_barang_model extends CI_Model
{

    public $table = 'rn_barang';
    public $id = 'id_barang';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_barang,kode_barang,nama_barang,harga_beli,harga_jual,stok,satuan,id_lokasi,id_kategori,id_suplier,tanggal_barang,id_admin');
        $this->datatables->from('rn_barang');
        //add this line for join
        //$this->datatables->join('table2', 'rn_barang.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('rn_barang/detail/$1'),'<i class="fa fa-book"></i>Read','class="btn btn-info btn-xs edit"')."  ".anchor(site_url('rn_barang/edit/$1'),'<i class="fa fa-edit"></i> Update','class="btn btn-success btn-xs edit"')."<a href='#' class='btn btn-danger btn-xs delete' onclick='javasciprt: return hapus($1)'><i class='fa fa-trash'></i> Delete</a>", 'id_barang');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_barang', $q);
	$this->db->or_like('kode_barang', $q);
	$this->db->or_like('nama_barang', $q);
	$this->db->or_like('harga_beli', $q);
	$this->db->or_like('harga_jual', $q);
	$this->db->or_like('stok', $q);
	$this->db->or_like('satuan', $q);
	$this->db->or_like('id_lokasi', $q);
	$this->db->or_like('id_kategori', $q);
	$this->db->or_like('id_suplier', $q);
	$this->db->or_like('tanggal_barang', $q);
	$this->db->or_like('id_admin', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_barang', $q);
	$this->db->or_like('kode_barang', $q);
	$this->db->or_like('nama_barang', $q);
	$this->db->or_like('harga_beli', $q);
	$this->db->or_like('harga_jual', $q);
	$this->db->or_like('stok', $q);
	$this->db->or_like('satuan', $q);
	$this->db->or_like('id_lokasi', $q);
	$this->db->or_like('id_kategori', $q);
	$this->db->or_like('id_suplier', $q);
	$this->db->or_like('tanggal_barang', $q);
	$this->db->or_like('id_admin', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

 