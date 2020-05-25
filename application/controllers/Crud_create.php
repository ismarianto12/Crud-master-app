<?php 

/**
 * 
 */

class Crud_create extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
	    $this->load->library('ismarianto');
	}


	function index(){
		$x['judul'] = 'Buat Crud';
		$this->template->load('template','crud',$x);
	}
	private function readJSON($path)
	{
		$string = file_get_contents($path);
		$obj = json_decode($string);
		return $obj;
	}

	function create(){ 
      //error_reporting(0);
		$hasil = array();

		if (isset($_POST['generate']))
		{
 
			$table_name = self::safe($this->input->post('table_name'));
			$jenis_tabel = self::safe($this->input->post('jenis_tabel'));
			$export_excel = self::safe($this->input->post('export_excel'));
			$export_word = self::safe($this->input->post('export_word'));
			$export_pdf = self::safe($this->input->post('export_pdf'));
			$controller = self::safe($this->input->post('controller'));
			$model = self::safe($this->input->post('model'));

			if ($table_name <> '')
			{
   
				$table_name = $table_name;
				$c = $controller <> '' ? ucfirst($controller) : ucfirst($table_name);
				$m = $model <> '' ? ucfirst($model) : ucfirst($table_name) . '_model';
				$v_list = $table_name . "_list";
				$v_read = $table_name . "_read";
				$v_form = $table_name . "_form";
				$v_doc = $table_name . "_doc";
				$v_pdf = $table_name . "_pdf";
 
				$c_url = strtolower($c);

    
				$c_file = $c . '.php';
				$m_file = $m . '.php';
				$v_list_file = $v_list . '.php';
				$v_read_file = $v_read . '.php';
				$v_form_file = $v_form . '.php';
				$v_doc_file = $v_doc . '.php';
				$v_pdf_file = $v_pdf . '.php';

 
				$get_setting = self::readJSON(APPPATH.'/views/crud/settingjson.cfg');
				$target = $get_setting->target;

				if (!file_exists(APPPATH."views/" . $c_url))
				{
					mkdir(APPPATH."views/" . $c_url, 0777, true);
				}

				$pk = $this->ismarianto->primary_field($table_name);
				$non_pk = $this->ismarianto->not_primary_field($table_name);
				$all = $this->ismarianto->all_field($table_name);

       
				include APPPATH.'/views/crud/create_config_pagination.php';
				include APPPATH.'/views/crud/create_controller.php';
				include APPPATH.'/views/crud/create_model.php';
				if ($jenis_tabel == 'reguler_table') {
					include APPPATH.'/views/crud/create_view_list.php';
				} else {
					include APPPATH.'/views/crud/create_view_list_datatables.php';
					include APPPATH.'/views/crud/create_libraries_datatables.php';
				}
				include APPPATH.'/views/crud/create_view_form.php';
				include APPPATH.'/views/crud/create_view_read.php';

				$export_excel == 1 ? include APPPATH.'/views/crud/create_exportexcel_helper.php' : '';
				$export_word == 1 ? include APPPATH.'/views/crud/create_view_list_doc.php' : '';
				$export_pdf == 1 ? include APPPATH.'/views/crud/create_pdf_library.php' : '';
				$export_pdf == 1 ? include APPPATH.'/views/crud/create_view_list_pdf.php' : '';

				$hasil[] = $hasil_controller;
				$hasil[] = $hasil_model;
				$hasil[] = $hasil_view_list;
				$hasil[] = $hasil_view_form;
				$hasil[] = $hasil_view_read;
				$hasil[] = $hasil_view_doc;
				$hasil[] = $hasil_view_pdf;
				$hasil[] = $hasil_config_pagination;
				$hasil[] = $hasil_exportexcel;
				$hasil[] = $hasil_pdf;
			} else
			{
				$hasil[] = 'No table selected.';
			}
		}

		if (isset($_POST['generateall']))
		{  
			$hasil = array();

			$jenis_tabel = self::safe($this->input->post('jenis_tabel'));
			$export_excel = self::safe($this->input->post('export_excel'));
			$export_word = self::safe($this->input->post('export_word'));
			$export_pdf = self::safe($this->input->post('export_pdf'));

			$table_list = $this->ismarianto->table_list();
			foreach ($table_list as $row) {

				$table_name = $row['table_name'];
				$c = ucfirst($table_name);
				$m = ucfirst($table_name) . '_model';
				$v_list = $table_name . "_list";
				$v_read = $table_name . "_read";
				$v_form = $table_name . "_form";
				$v_doc = $table_name . "_doc";
				$v_pdf = $table_name . "_pdf";

       
				$c_url = strtolower($c);
 
				$c_file = $c . '.php';
				$m_file = $m . '.php';
				$v_list_file = $v_list . '.php';
				$v_read_file = $v_read . '.php';
				$v_form_file = $v_form . '.php';
				$v_doc_file = $v_doc . '.php';
				$v_pdf_file = $v_pdf . '.php';

       
				$get_setting = self::readJSON(APPPATH.'/views/crud/settingjson.cfg');
				$target = $get_setting->target;
				if (!file_exists(APPPATH."views/" . $c_url))
				{
					mkdir(APPPATH."views/" . $c_url, 0777, true);
				}

				$pk = $this->ismarianto->primary_field($table_name);
				$non_pk = $this->ismarianto->not_primary_field($table_name);
				$all = $this->ismarianto->all_field($table_name);

 
				include APPPATH.'/views/crud/create_config_pagination.php';
				include APPPATH.'/views/crud/create_controller.php';
				include APPPATH.'/views/crud/create_model.php';
				if ($jenis_tabel == 'reguler_table') {
					include APPPATH.'/views/crud/create_view_list.php';
				} else {
					include APPPATH.'/views/crud/create_view_list_datatables.php';
					include APPPATH.'/views/crud/create_libraries_datatables.php';
				}
				include APPPATH.'/views/crud/create_view_form.php';
				include APPPATH.'/views/crud/create_view_read.php';

				$export_excel == 1 ? include APPPATH.'/views/crud/create_exportexcel_helper.php' : '';
				$export_word == 1 ? include APPPATH.'/views/crud/create_view_list_doc.php' : '';
				$export_pdf == 1 ? include APPPATH.'/views/crud/create_pdf_library.php' : '';
				$export_pdf == 1 ? include APPPATH.'/views/crud/create_view_list_pdf.php' : '';

				$hasil[] = $hasil_controller;
				$hasil[] = $hasil_model;
				$hasil[] = $hasil_view_list;
				$hasil[] = $hasil_view_form;
				$hasil[] = $hasil_view_read;
				$hasil[] = $hasil_view_doc;
			}

			$hasil[] = $hasil_config_pagination;
			$hasil[] = $hasil_exportexcel;
			$hasil[] = $hasil_pdf;
		}

		$this->session->set_flashdata('hasil',$hasil); 
		redirect(base_url('Crud_create?get=hasil_sc'));
		//print_r($_POST); 
	}

	private function safe($str){
		return strip_tags(htmlentities($str, ENT_QUOTES, 'UTF-8'));
	} 
}