<?php

/*developed by ismarianto putra
  you can visit my site in ismarianto.com
  for more complain anda more information.  
*/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sistem_informasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        login_access();
        hak_akses();
        $this->load->model('Sistem_informasi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'sistem_informasi/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'sistem_informasi/?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'sistem_informasi';
            $config['first_url'] = base_url() . 'sistem_informasi';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Sistem_informasi_model->total_rows($q);
        $sistem_informasi = $this->Sistem_informasi_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'sistem_informasi_data' => $sistem_informasi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'judul'=>'Data SISTEM_INFORMASI'
        );
        $this->template->load('template','sistem_informasi/sistem_informasi_list', $data);
    }

    public function detail($id) 
    {
        $row = $this->Sistem_informasi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_sistem' => $row->id_sistem,
		'nama_sistem' => $row->nama_sistem,
		'tahun_develop' => $row->tahun_develop,
		'tahun_selesai' => $row->tahun_selesai,
		'status_server' => $row->status_server,
	    
'judul'=>'Detail :  SISTEM_INFORMASI',
);
            $this->template->load('template','sistem_informasi/sistem_informasi_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Data Tidak Di Temukan.</div>');
            redirect(site_url('sistem_informasi'));
        }
    }

    public function tambah() 
    {
        $data = array(
            'judul'=>'Tambah Sistem informasi',
            'button' => 'Create',
            'action' => site_url('sistem_informasi/tambah_data'),
	    'id_sistem' => set_value('id_sistem'),
	    'nama_sistem' => set_value('nama_sistem'),
	    'tahun_develop' => set_value('tahun_develop'),
	    'tahun_selesai' => set_value('tahun_selesai'),
	    'status_server' => set_value('status_server'),
	);
        $this->template->load('template','sistem_informasi/sistem_informasi_form', $data);
    }
    
    public function tambah_data() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
		'nama_sistem' => $this->input->post('nama_sistem',TRUE),
		'tahun_develop' => $this->input->post('tahun_develop',TRUE),
		'tahun_selesai' => $this->input->post('tahun_selesai',TRUE),
		'status_server' => $this->input->post('status_server',TRUE),
	    );

            $this->Sistem_informasi_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Data Berhasil Di Tambahkan.</div>');
            redirect(site_url('sistem_informasi'));
        }
    }
    
    public function edit($id) 
    {
        $row = $this->Sistem_informasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul'=>'Data SISTEM_INFORMASI',
                'button' => 'Update',
                'action' => site_url('sistem_informasi/edit_data'),
		'id_sistem' => set_value('id_sistem', $row->id_sistem),
		'nama_sistem' => set_value('nama_sistem', $row->nama_sistem),
		'tahun_develop' => set_value('tahun_develop', $row->tahun_develop),
		'tahun_selesai' => set_value('tahun_selesai', $row->tahun_selesai),
		'status_server' => set_value('status_server', $row->status_server),
	    );
             $this->template->load('template','sistem_informasi/sistem_informasi_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-info fade-in">Data Tidak Di Temukan.</div>');
            redirect(site_url('sistem_informasi'));
        }
    }
    
    public function edit_data() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id_sistem', TRUE));
        } else {
            $data = array(
		'nama_sistem' => $this->input->post('nama_sistem',TRUE),
		'tahun_develop' => $this->input->post('tahun_develop',TRUE),
		'tahun_selesai' => $this->input->post('tahun_selesai',TRUE),
		'status_server' => $this->input->post('status_server',TRUE),
	    );

            $this->Sistem_informasi_model->update($this->input->post('id_sistem', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Edit Data Berhasil.</div>');
            redirect(site_url('sistem_informasi'));
        }
    }
    
    public function hapus($id) 
    {
        $row = $this->Sistem_informasi_model->get_by_id($id);

        if ($row) {
            $this->Sistem_informasi_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger fade-in"><i class="fa fa-check"></i>Data Berhasil Di Hapus</div>');
            redirect(site_url('sistem_informasi'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Ops Something Went Wrong Please Contact Administrator.</div>');
            redirect(site_url('sistem_informasi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_sistem', 'nama sistem', 'trim|required');
	$this->form_validation->set_rules('tahun_develop', 'tahun develop', 'trim|required');
	$this->form_validation->set_rules('tahun_selesai', 'tahun selesai', 'trim|required');
	$this->form_validation->set_rules('status_server', 'status server', 'trim|required');

	$this->form_validation->set_rules('id_sistem', 'id_sistem', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "sistem_informasi.xls";
        $judul = "sistem_informasi";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Sistem");
	xlsWriteLabel($tablehead, $kolomhead++, "Tahun Develop");
	xlsWriteLabel($tablehead, $kolomhead++, "Tahun Selesai");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Server");

	foreach ($this->Sistem_informasi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_sistem);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tahun_develop);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tahun_selesai);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status_server);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=sistem_informasi.doc");

        $data = array(
            'sistem_informasi_data' => $this->Sistem_informasi_model->get_all(),
            'start' => 0
        );
        
         $this->load->view('template','sistem_informasi/sistem_informasi_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'sistem_informasi_data' => $this->Sistem_informasi_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('sistem_informasi/sistem_informasi_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('sistem_informasi.pdf', 'D'); 
    }

}

