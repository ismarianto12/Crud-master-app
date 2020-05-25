<?php

/*developed by ismarianto putra
  you can visit my site in ismarianto.com
  for more complain anda more information.  
*/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Log_akses extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        login_access();
        hak_akses();
        $this->load->model('Log_akses_model');
        $this->load->library('form_validation');   
	$this->load->library('datatables');
    }

    public function index()
    {
         $x['judul'] = 'Data : Log akses';
         $this->template->load('template','log_akses/log_akses_list',$x);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Log_akses_model->json();
    }

    public function detail($id) 
    {
        $row = $this->Log_akses_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_akses' => $row->id_akses,
		'username' => $row->username,
		'akses' => $row->akses,
		'url' => $row->url,
		'waktu_akses' => $row->waktu_akses,
	    
'judul'=>'Detail :  LOG_AKSES',
);
            $this->template->load('template','log_akses/log_akses_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Data Tidak Di Temukan.</div>');
            redirect(site_url('log_akses'));
        }
    }

    public function tambah() 
    {
        $data = array(
            'judul'=>'Tambah Log akses',
            'button' => 'Create',
            'action' => site_url('log_akses/tambah_data'),
	    'id_akses' => set_value('id_akses'),
	    'username' => set_value('username'),
	    'akses' => set_value('akses'),
	    'url' => set_value('url'),
	    'waktu_akses' => set_value('waktu_akses'),
	);
        $this->template->load('template','log_akses/log_akses_form', $data);
    }
    
    public function tambah_data() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'akses' => $this->input->post('akses',TRUE),
		'url' => $this->input->post('url',TRUE),
		'waktu_akses' => $this->input->post('waktu_akses',TRUE),
	    );

            $this->Log_akses_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Data Berhasil Di Tambahkan.</div>');
            redirect(site_url('log_akses'));
        }
    }
    
    public function edit($id) 
    {
        $row = $this->Log_akses_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul'=>'Data LOG_AKSES',
                'button' => 'Update',
                'action' => site_url('log_akses/edit_data'),
		'id_akses' => set_value('id_akses', $row->id_akses),
		'username' => set_value('username', $row->username),
		'akses' => set_value('akses', $row->akses),
		'url' => set_value('url', $row->url),
		'waktu_akses' => set_value('waktu_akses', $row->waktu_akses),
	    );
             $this->template->load('template','log_akses/log_akses_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-info fade-in">Data Tidak Di Temukan.</div>');
            redirect(site_url('log_akses'));
        }
    }
    
    public function edit_data() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id_akses', TRUE));
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'akses' => $this->input->post('akses',TRUE),
		'url' => $this->input->post('url',TRUE),
		'waktu_akses' => $this->input->post('waktu_akses',TRUE),
	    );

            $this->Log_akses_model->update($this->input->post('id_akses', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Edit Data Berhasil.</div>');
            redirect(site_url('log_akses'));
        }
    }
    
    public function hapus($id) 
    {
        $row = $this->Log_akses_model->get_by_id($id);

        if ($row) {
            $this->Log_akses_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger fade-in"><i class="fa fa-check"></i>Data Berhasil Di Hapus</div>');
            redirect(site_url('log_akses'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Ops Something Went Wrong Please Contact Administrator.</div>');
            redirect(site_url('log_akses'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('akses', 'akses', 'trim|required');
	$this->form_validation->set_rules('url', 'url', 'trim|required');
	$this->form_validation->set_rules('waktu_akses', 'waktu akses', 'trim|required');

	$this->form_validation->set_rules('id_akses', 'id_akses', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "log_akses.xls";
        $judul = "log_akses";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Username");
	xlsWriteLabel($tablehead, $kolomhead++, "Akses");
	xlsWriteLabel($tablehead, $kolomhead++, "Url");
	xlsWriteLabel($tablehead, $kolomhead++, "Waktu Akses");

	foreach ($this->Log_akses_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->username);
	    xlsWriteLabel($tablebody, $kolombody++, $data->akses);
	    xlsWriteLabel($tablebody, $kolombody++, $data->url);
	    xlsWriteLabel($tablebody, $kolombody++, $data->waktu_akses);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=log_akses.doc");

        $data = array(
            'log_akses_data' => $this->Log_akses_model->get_all(),
            'start' => 0
        );
        
         $this->load->view('template','log_akses/log_akses_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'log_akses_data' => $this->Log_akses_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('log_akses/log_akses_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('log_akses.pdf', 'D'); 
    }

}

