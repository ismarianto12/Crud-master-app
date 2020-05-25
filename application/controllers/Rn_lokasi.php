<?php

/*developed by ismarianto putra
  you can visit my site in ismarianto.com
  for more complain anda more information.  
*/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rn_lokasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        login_access();
        hak_akses();
        $this->load->model('Rn_lokasi_model');
        $this->load->library('form_validation');   
	$this->load->library('datatables');
    }

    public function index()
    {
         $x['judul'] = 'Data : Rn lokasi';
         $this->template->load('template','rn_lokasi/rn_lokasi_list',$x);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Rn_lokasi_model->json();
    }

    public function detail($id) 
    {
        $row = $this->Rn_lokasi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_lokasi' => $row->id_lokasi,
		'nama_lokasi' => $row->nama_lokasi,
		'gedung_utama' => $row->gedung_utama,
		'tanggal_lokasi' => $row->tanggal_lokasi,
	    
'judul'=>'Detail :  RN_LOKASI',
);
            $this->template->load('template','rn_lokasi/rn_lokasi_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Data Tidak Di Temukan.</div>');
            redirect(site_url('rn_lokasi'));
        }
    }

    public function tambah() 
    {
        $data = array(
            'judul'=>'Tambah Rn lokasi',
            'button' => 'Create',
            'action' => site_url('rn_lokasi/tambah_data'),
	    'id_lokasi' => set_value('id_lokasi'),
	    'nama_lokasi' => set_value('nama_lokasi'),
	    'gedung_utama' => set_value('gedung_utama'),
	    'tanggal_lokasi' => set_value('tanggal_lokasi'),
	);
        $this->template->load('template','rn_lokasi/rn_lokasi_form', $data);
    }
    
    public function tambah_data() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
		'nama_lokasi' => $this->input->post('nama_lokasi',TRUE),
		'gedung_utama' => $this->input->post('gedung_utama',TRUE),
		'tanggal_lokasi' => $this->input->post('tanggal_lokasi',TRUE),
	    );

            $this->Rn_lokasi_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Data Berhasil Di Tambahkan.</div>');
            redirect(site_url('rn_lokasi'));
        }
    }
    
    public function edit($id) 
    {
        $row = $this->Rn_lokasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul'=>'Data RN_LOKASI',
                'button' => 'Update',
                'action' => site_url('rn_lokasi/edit_data'),
		'id_lokasi' => set_value('id_lokasi', $row->id_lokasi),
		'nama_lokasi' => set_value('nama_lokasi', $row->nama_lokasi),
		'gedung_utama' => set_value('gedung_utama', $row->gedung_utama),
		'tanggal_lokasi' => set_value('tanggal_lokasi', $row->tanggal_lokasi),
	    );
             $this->template->load('template','rn_lokasi/rn_lokasi_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-info fade-in">Data Tidak Di Temukan.</div>');
            redirect(site_url('rn_lokasi'));
        }
    }
    
    public function edit_data() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id_lokasi', TRUE));
        } else {
            $data = array(
		'nama_lokasi' => $this->input->post('nama_lokasi',TRUE),
		'gedung_utama' => $this->input->post('gedung_utama',TRUE),
		'tanggal_lokasi' => $this->input->post('tanggal_lokasi',TRUE),
	    );

            $this->Rn_lokasi_model->update($this->input->post('id_lokasi', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Edit Data Berhasil.</div>');
            redirect(site_url('rn_lokasi'));
        }
    }
    
    public function hapus($id) 
    {
        $row = $this->Rn_lokasi_model->get_by_id($id);

        if ($row) {
            $this->Rn_lokasi_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger fade-in"><i class="fa fa-check"></i>Data Berhasil Di Hapus</div>');
            redirect(site_url('rn_lokasi'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Ops Something Went Wrong Please Contact Administrator.</div>');
            redirect(site_url('rn_lokasi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_lokasi', 'nama lokasi', 'trim|required');
	$this->form_validation->set_rules('gedung_utama', 'gedung utama', 'trim|required');
	$this->form_validation->set_rules('tanggal_lokasi', 'tanggal lokasi', 'trim|required');

	$this->form_validation->set_rules('id_lokasi', 'id_lokasi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "rn_lokasi.xls";
        $judul = "rn_lokasi";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Lokasi");
	xlsWriteLabel($tablehead, $kolomhead++, "Gedung Utama");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Lokasi");

	foreach ($this->Rn_lokasi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_lokasi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->gedung_utama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_lokasi);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=rn_lokasi.doc");

        $data = array(
            'rn_lokasi_data' => $this->Rn_lokasi_model->get_all(),
            'start' => 0
        );
        
         $this->load->view('template','rn_lokasi/rn_lokasi_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'rn_lokasi_data' => $this->Rn_lokasi_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('rn_lokasi/rn_lokasi_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('rn_lokasi.pdf', 'D'); 
    }

}

