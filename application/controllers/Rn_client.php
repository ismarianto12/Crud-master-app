<?php

/*developed by ismarianto putra
  you can visit my site in ismarianto.com
  for more complain anda more information.  
*/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rn_client extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        login_access();
        hak_akses();
        $this->load->model('Rn_client_model');
        $this->load->library('form_validation');   
	$this->load->library('datatables');
    }

    public function index()
    {
         $x['judul'] = 'Data : Rn client';
         $this->template->load('template','rn_client/rn_client_list',$x);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Rn_client_model->json();
    }

    public function detail($id) 
    {
        $row = $this->Rn_client_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_client' => $row->id_client,
		'nama_client' => $row->nama_client,
		'perusahaan' => $row->perusahaan,
		'divisi' => $row->divisi,
		'no_telp' => $row->no_telp,
		'alamat' => $row->alamat,
		'tanggal_client' => $row->tanggal_client,
	    
'judul'=>'Detail :  RN_CLIENT',
);
            $this->template->load('template','rn_client/rn_client_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Data Tidak Di Temukan.</div>');
            redirect(site_url('rn_client'));
        }
    }

    public function tambah() 
    {
        $data = array(
            'judul'=>'Tambah Rn client',
            'button' => 'Create',
            'action' => site_url('rn_client/tambah_data'),
	    'id_client' => set_value('id_client'),
	    'nama_client' => set_value('nama_client'),
	    'perusahaan' => set_value('perusahaan'),
	    'divisi' => set_value('divisi'),
	    'no_telp' => set_value('no_telp'),
	    'alamat' => set_value('alamat'),
	    'tanggal_client' => set_value('tanggal_client'),
	);
        $this->template->load('template','rn_client/rn_client_form', $data);
    }
    
    public function tambah_data() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
		'nama_client' => $this->input->post('nama_client',TRUE),
		'perusahaan' => $this->input->post('perusahaan',TRUE),
		'divisi' => $this->input->post('divisi',TRUE),
		'no_telp' => $this->input->post('no_telp',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'tanggal_client' => $this->input->post('tanggal_client',TRUE),
	    );

            $this->Rn_client_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Data Berhasil Di Tambahkan.</div>');
            redirect(site_url('rn_client'));
        }
    }
    
    public function edit($id) 
    {
        $row = $this->Rn_client_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul'=>'Data RN_CLIENT',
                'button' => 'Update',
                'action' => site_url('rn_client/edit_data'),
		'id_client' => set_value('id_client', $row->id_client),
		'nama_client' => set_value('nama_client', $row->nama_client),
		'perusahaan' => set_value('perusahaan', $row->perusahaan),
		'divisi' => set_value('divisi', $row->divisi),
		'no_telp' => set_value('no_telp', $row->no_telp),
		'alamat' => set_value('alamat', $row->alamat),
		'tanggal_client' => set_value('tanggal_client', $row->tanggal_client),
	    );
             $this->template->load('template','rn_client/rn_client_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-info fade-in">Data Tidak Di Temukan.</div>');
            redirect(site_url('rn_client'));
        }
    }
    
    public function edit_data() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id_client', TRUE));
        } else {
            $data = array(
		'nama_client' => $this->input->post('nama_client',TRUE),
		'perusahaan' => $this->input->post('perusahaan',TRUE),
		'divisi' => $this->input->post('divisi',TRUE),
		'no_telp' => $this->input->post('no_telp',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'tanggal_client' => $this->input->post('tanggal_client',TRUE),
	    );

            $this->Rn_client_model->update($this->input->post('id_client', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Edit Data Berhasil.</div>');
            redirect(site_url('rn_client'));
        }
    }
    
    public function hapus($id) 
    {
        $row = $this->Rn_client_model->get_by_id($id);

        if ($row) {
            $this->Rn_client_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger fade-in"><i class="fa fa-check"></i>Data Berhasil Di Hapus</div>');
            redirect(site_url('rn_client'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Ops Something Went Wrong Please Contact Administrator.</div>');
            redirect(site_url('rn_client'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_client', 'nama client', 'trim|required');
	$this->form_validation->set_rules('perusahaan', 'perusahaan', 'trim|required');
	$this->form_validation->set_rules('divisi', 'divisi', 'trim|required');
	$this->form_validation->set_rules('no_telp', 'no telp', 'trim|required|numeric');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('tanggal_client', 'tanggal client', 'trim|required');

	$this->form_validation->set_rules('id_client', 'id_client', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "rn_client.xls";
        $judul = "rn_client";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Client");
	xlsWriteLabel($tablehead, $kolomhead++, "Perusahaan");
	xlsWriteLabel($tablehead, $kolomhead++, "Divisi");
	xlsWriteLabel($tablehead, $kolomhead++, "No Telp");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Client");

	foreach ($this->Rn_client_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_client);
	    xlsWriteLabel($tablebody, $kolombody++, $data->perusahaan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->divisi);
	    xlsWriteNumber($tablebody, $kolombody++, $data->no_telp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_client);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=rn_client.doc");

        $data = array(
            'rn_client_data' => $this->Rn_client_model->get_all(),
            'start' => 0
        );
        
         $this->load->view('template','rn_client/rn_client_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'rn_client_data' => $this->Rn_client_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('rn_client/rn_client_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('rn_client.pdf', 'D'); 
    }

}

