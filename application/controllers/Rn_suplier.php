<?php

/*developed by ismarianto putra
  you can visit my site in ismarianto.com
  for more complain anda more information.  
*/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rn_suplier extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        login_access();
        hak_akses();
        $this->load->model('Rn_suplier_model');
        $this->load->library('form_validation');   
	$this->load->library('datatables');
    }

    public function index()
    {
         $x['judul'] = 'Data : Rn suplier';
         $this->template->load('template','rn_suplier/rn_suplier_list',$x);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Rn_suplier_model->json();
    }

    public function detail($id) 
    {
        $row = $this->Rn_suplier_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_suplier' => $row->id_suplier,
		'nama_suplier' => $row->nama_suplier,
		'alamat_suplier' => $row->alamat_suplier,
		'no_hp' => $row->no_hp,
		'no_rek' => $row->no_rek,
	    
'judul'=>'Detail :  RN_SUPLIER',
);
            $this->template->load('template','rn_suplier/rn_suplier_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Data Tidak Di Temukan.</div>');
            redirect(site_url('rn_suplier'));
        }
    }

    public function tambah() 
    {
        $data = array(
            'judul'=>'Tambah Rn suplier',
            'button' => 'Create',
            'action' => site_url('rn_suplier/tambah_data'),
	    'id_suplier' => set_value('id_suplier'),
	    'nama_suplier' => set_value('nama_suplier'),
	    'alamat_suplier' => set_value('alamat_suplier'),
	    'no_hp' => set_value('no_hp'),
	    'no_rek' => set_value('no_rek'),
	);
        $this->template->load('template','rn_suplier/rn_suplier_form', $data);
    }
    
    public function tambah_data() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
		'nama_suplier' => $this->input->post('nama_suplier',TRUE),
		'alamat_suplier' => $this->input->post('alamat_suplier',TRUE),
		'no_hp' => $this->input->post('no_hp',TRUE),
		'no_rek' => $this->input->post('no_rek',TRUE),
	    );

            $this->Rn_suplier_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Data Berhasil Di Tambahkan.</div>');
            redirect(site_url('rn_suplier'));
        }
    }
    
    public function edit($id) 
    {
        $row = $this->Rn_suplier_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul'=>'Data RN_SUPLIER',
                'button' => 'Update',
                'action' => site_url('rn_suplier/edit_data'),
		'id_suplier' => set_value('id_suplier', $row->id_suplier),
		'nama_suplier' => set_value('nama_suplier', $row->nama_suplier),
		'alamat_suplier' => set_value('alamat_suplier', $row->alamat_suplier),
		'no_hp' => set_value('no_hp', $row->no_hp),
		'no_rek' => set_value('no_rek', $row->no_rek),
	    );
             $this->template->load('template','rn_suplier/rn_suplier_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-info fade-in">Data Tidak Di Temukan.</div>');
            redirect(site_url('rn_suplier'));
        }
    }
    
    public function edit_data() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id_suplier', TRUE));
        } else {
            $data = array(
		'nama_suplier' => $this->input->post('nama_suplier',TRUE),
		'alamat_suplier' => $this->input->post('alamat_suplier',TRUE),
		'no_hp' => $this->input->post('no_hp',TRUE),
		'no_rek' => $this->input->post('no_rek',TRUE),
	    );

            $this->Rn_suplier_model->update($this->input->post('id_suplier', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Edit Data Berhasil.</div>');
            redirect(site_url('rn_suplier'));
        }
    }
    
    public function hapus($id) 
    {
        $row = $this->Rn_suplier_model->get_by_id($id);

        if ($row) {
            $this->Rn_suplier_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger fade-in"><i class="fa fa-check"></i>Data Berhasil Di Hapus</div>');
            redirect(site_url('rn_suplier'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Ops Something Went Wrong Please Contact Administrator.</div>');
            redirect(site_url('rn_suplier'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_suplier', 'nama suplier', 'trim|required');
	$this->form_validation->set_rules('alamat_suplier', 'alamat suplier', 'trim|required');
	$this->form_validation->set_rules('no_hp', 'no hp', 'trim|required|numeric');
	$this->form_validation->set_rules('no_rek', 'no rek', 'trim|required|numeric');

	$this->form_validation->set_rules('id_suplier', 'id_suplier', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "rn_suplier.xls";
        $judul = "rn_suplier";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Suplier");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Suplier");
	xlsWriteLabel($tablehead, $kolomhead++, "No Hp");
	xlsWriteLabel($tablehead, $kolomhead++, "No Rek");

	foreach ($this->Rn_suplier_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_suplier);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_suplier);
	    xlsWriteNumber($tablebody, $kolombody++, $data->no_hp);
	    xlsWriteNumber($tablebody, $kolombody++, $data->no_rek);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=rn_suplier.doc");

        $data = array(
            'rn_suplier_data' => $this->Rn_suplier_model->get_all(),
            'start' => 0
        );
        
         $this->load->view('template','rn_suplier/rn_suplier_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'rn_suplier_data' => $this->Rn_suplier_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('rn_suplier/rn_suplier_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('rn_suplier.pdf', 'D'); 
    }

}

