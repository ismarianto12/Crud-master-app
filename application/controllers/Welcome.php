<?php 


 /**
  * 
  */
 class Welcome extends CI_controller
 {
 	
 	function __construct()
 	{ 
 		parent::__construct();
 		login_access();
 		$this->load->model('Dasboard_model');
 	}
 	function index(){
 		$x['grafik'] = $this->Dasboard_model->data_barang();
 		$x['judul'] = 'SELAMAT DATANG DI HALAMAN ADMINISTRATOR';
 		$this->template->load('Template','dasboard',$x);
 	} 
 	function logout(){
 		$this->session->sess_destroy();
 		redirect(base_url('?stat=1')); 
 	}
 	 

 	function _404(){
 		$x['judul'] = '404 Halaman Tidak Di Temukan.';
 		$this->template->load('Template','404',$x);   
 	}
 }