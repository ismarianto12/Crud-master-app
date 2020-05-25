<?php

/*developed by ismarianto putra
  you can visit my site in ismarianto.com
  for more complain anda more information.  
*/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        login_access();
        hak_akses();
        $this->load->model('Menu_model');
        $this->load->library('form_validation');   
	$this->load->library('datatables');
    }

    public function index()
    {
         $x['judul'] = 'Data : Menu';
         $this->template->load('template','menu/menu_list',$x);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Menu_model->json();
    }

    public function detail($id) 
    {
        $row = $this->Menu_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_menu' => $row->id_menu,
		'id_parent' => $row->id_parent,
		'nama_menu' => $row->nama_menu,
		'gambar' => $row->gambar,
		'icon' => $row->icon,
		'link' => $row->link,
		'aktif' => $row->aktif,
		'urutan' => $row->urutan,
		'position' => $row->position,
		'level' => $row->level,
	    
'judul'=>'Detail :  MENU',
);
            $this->template->load('template','menu/menu_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Data Tidak Di Temukan.</div>');
            redirect(site_url('menu'));
        }
    }

    public function tambah() 
    {
        $data = array(
            'judul'=>'Tambah Menu',
            'button' => 'Create',
            'action' => site_url('menu/tambah_data'),
	    'id_menu' => set_value('id_menu'),
	    'id_parent' => set_value('id_parent'),
	    'nama_menu' => set_value('nama_menu'),
	    'gambar' => set_value('gambar'),
	    'icon' => set_value('icon'),
	    'link' => set_value('link'),
	    'aktif' => set_value('aktif'),
	    'urutan' => set_value('urutan'),
	    'position' => set_value('position'),
	    'level' => set_value('level'),
	);
        $this->template->load('template','menu/menu_form', $data);
    }
    
    public function tambah_data() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
		'id_parent' => $this->input->post('id_parent',TRUE),
		'nama_menu' => $this->input->post('nama_menu',TRUE),
		'gambar' => $this->input->post('gambar',TRUE),
		'icon' => $this->input->post('icon',TRUE),
		'link' => $this->input->post('link',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
		'urutan' => $this->input->post('urutan',TRUE),
		'position' => $this->input->post('position',TRUE),
		'level' => $this->input->post('level',TRUE),
	    );

            $this->Menu_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Data Berhasil Di Tambahkan.</div>');
            redirect(site_url('menu'));
        }
    }
    
    public function edit($id) 
    {
        $row = $this->Menu_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul'=>'Data MENU',
                'button' => 'Update',
                'action' => site_url('menu/edit_data'),
		'id_menu' => set_value('id_menu', $row->id_menu),
		'id_parent' => set_value('id_parent', $row->id_parent),
		'nama_menu' => set_value('nama_menu', $row->nama_menu),
		'gambar' => set_value('gambar', $row->gambar),
		'icon' => set_value('icon', $row->icon),
		'link' => set_value('link', $row->link),
		'aktif' => set_value('aktif', $row->aktif),
		'urutan' => set_value('urutan', $row->urutan),
		'position' => set_value('position', $row->position),
		'level' => set_value('level', $row->level),
	    );
             $this->template->load('template','menu/menu_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-info fade-in">Data Tidak Di Temukan.</div>');
            redirect(site_url('menu'));
        }
    }
    
    public function edit_data() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id_menu', TRUE));
        } else {
            $data = array(
		'id_parent' => $this->input->post('id_parent',TRUE),
		'nama_menu' => $this->input->post('nama_menu',TRUE),
		'gambar' => $this->input->post('gambar',TRUE),
		'icon' => $this->input->post('icon',TRUE),
		'link' => $this->input->post('link',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
		'urutan' => $this->input->post('urutan',TRUE),
		'position' => $this->input->post('position',TRUE),
		'level' => $this->input->post('level',TRUE),
	    );

            $this->Menu_model->update($this->input->post('id_menu', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Edit Data Berhasil.</div>');
            redirect(site_url('menu'));
        }
    }
    
    public function hapus($id) 
    {
        $row = $this->Menu_model->get_by_id($id);

        if ($row) {
            $this->Menu_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger fade-in"><i class="fa fa-check"></i>Data Berhasil Di Hapus</div>');
            redirect(site_url('menu'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Ops Something Went Wrong Please Contact Administrator.</div>');
            redirect(site_url('menu'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_parent', 'id parent', 'trim|required|numeric');
	$this->form_validation->set_rules('nama_menu', 'nama menu', 'trim|required');
	$this->form_validation->set_rules('gambar', 'gambar', 'trim|required');
	$this->form_validation->set_rules('icon', 'icon', 'trim|required');
	$this->form_validation->set_rules('link', 'link', 'trim|required');
	$this->form_validation->set_rules('aktif', 'aktif', 'trim|required');
	$this->form_validation->set_rules('urutan', 'urutan', 'trim|required|numeric');
	$this->form_validation->set_rules('position', 'position', 'trim|required');
	$this->form_validation->set_rules('level', 'level', 'trim|required');

	$this->form_validation->set_rules('id_menu', 'id_menu', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "menu.xls";
        $judul = "menu";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Parent");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Menu");
	xlsWriteLabel($tablehead, $kolomhead++, "Gambar");
	xlsWriteLabel($tablehead, $kolomhead++, "Icon");
	xlsWriteLabel($tablehead, $kolomhead++, "Link");
	xlsWriteLabel($tablehead, $kolomhead++, "Aktif");
	xlsWriteLabel($tablehead, $kolomhead++, "Urutan");
	xlsWriteLabel($tablehead, $kolomhead++, "Position");
	xlsWriteLabel($tablehead, $kolomhead++, "Level");

	foreach ($this->Menu_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_parent);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_menu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->gambar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->icon);
	    xlsWriteLabel($tablebody, $kolombody++, $data->link);
	    xlsWriteLabel($tablebody, $kolombody++, $data->aktif);
	    xlsWriteNumber($tablebody, $kolombody++, $data->urutan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->position);
	    xlsWriteLabel($tablebody, $kolombody++, $data->level);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=menu.doc");

        $data = array(
            'menu_data' => $this->Menu_model->get_all(),
            'start' => 0
        );
        
         $this->load->view('template','menu/menu_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'menu_data' => $this->Menu_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('menu/menu_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('menu.pdf', 'D'); 
    }

}

