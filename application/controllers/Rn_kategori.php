<?php

/*developed by ismarianto putra
  you can visit my site in ismarianto.com
  for more complain anda more information.  
*/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rn_kategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        login_access();
        hak_akses();
        $this->load->model('Rn_kategori_model');
        $this->load->library('form_validation');   
	$this->load->library('datatables');
    }

    public function index()
    {
         $x['judul'] = 'Data : Rn kategori';
         $this->template->load('template','rn_kategori/rn_kategori_list',$x);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Rn_kategori_model->json();
    }

    public function detail($id) 
    {
        $row = $this->Rn_kategori_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kategori' => $row->id_kategori,
		'nama_kategori' => $row->nama_kategori,
		'tanggal_kategori' => $row->tanggal_kategori,
	    
'judul'=>'Detail :  RN_KATEGORI',
);
            $this->template->load('template','rn_kategori/rn_kategori_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Data Tidak Di Temukan.</div>');
            redirect(site_url('rn_kategori'));
        }
    }

    public function tambah() 
    {
        $data = array(
            'judul'=>'Tambah Rn kategori',
            'button' => 'Create',
            'action' => site_url('rn_kategori/tambah_data'),
	    'id_kategori' => set_value('id_kategori'),
	    'nama_kategori' => set_value('nama_kategori'),
	    'tanggal_kategori' => set_value('tanggal_kategori'),
	);
        $this->template->load('template','rn_kategori/rn_kategori_form', $data);
    }
    
    public function tambah_data() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
		'nama_kategori' => $this->input->post('nama_kategori',TRUE),
		'tanggal_kategori' => $this->input->post('tanggal_kategori',TRUE),
	    );

            $this->Rn_kategori_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Data Berhasil Di Tambahkan.</div>');
            redirect(site_url('rn_kategori'));
        }
    }
    
    public function edit($id) 
    {
        $row = $this->Rn_kategori_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul'=>'Data RN_KATEGORI',
                'button' => 'Update',
                'action' => site_url('rn_kategori/edit_data'),
		'id_kategori' => set_value('id_kategori', $row->id_kategori),
		'nama_kategori' => set_value('nama_kategori', $row->nama_kategori),
		'tanggal_kategori' => set_value('tanggal_kategori', $row->tanggal_kategori),
	    );
             $this->template->load('template','rn_kategori/rn_kategori_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-info fade-in">Data Tidak Di Temukan.</div>');
            redirect(site_url('rn_kategori'));
        }
    }
    
    public function edit_data() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id_kategori', TRUE));
        } else {
            $data = array(
		'nama_kategori' => $this->input->post('nama_kategori',TRUE),
		'tanggal_kategori' => $this->input->post('tanggal_kategori',TRUE),
	    );

            $this->Rn_kategori_model->update($this->input->post('id_kategori', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Edit Data Berhasil.</div>');
            redirect(site_url('rn_kategori'));
        }
    }
    
    public function hapus($id) 
    {
        $row = $this->Rn_kategori_model->get_by_id($id);

        if ($row) {
            $this->Rn_kategori_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger fade-in"><i class="fa fa-check"></i>Data Berhasil Di Hapus</div>');
            redirect(site_url('rn_kategori'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Ops Something Went Wrong Please Contact Administrator.</div>');
            redirect(site_url('rn_kategori'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_kategori', 'nama kategori', 'trim|required');
	$this->form_validation->set_rules('tanggal_kategori', 'tanggal kategori', 'trim|required');

	$this->form_validation->set_rules('id_kategori', 'id_kategori', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "rn_kategori.xls";
        $judul = "rn_kategori";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Kategori");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Kategori");

	foreach ($this->Rn_kategori_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_kategori);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_kategori);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=rn_kategori.doc");

        $data = array(
            'rn_kategori_data' => $this->Rn_kategori_model->get_all(),
            'start' => 0
        );
        
         $this->load->view('template','rn_kategori/rn_kategori_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'rn_kategori_data' => $this->Rn_kategori_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('rn_kategori/rn_kategori_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('rn_kategori.pdf', 'D'); 
    }

}

