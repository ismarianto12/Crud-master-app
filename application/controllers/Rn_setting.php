<?php

/*developed by ismarianto putra
  you can visit my site in ismarianto.com
  for more complain anda more information.  
*/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rn_setting extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        login_access();
        hak_akses();
        $this->load->model('Rn_setting_model');
        $this->load->library('form_validation');   
	$this->load->library('datatables');
    }

    public function index()
    {
         $x['judul'] = 'Data : Rn setting';
         $this->template->load('template','rn_setting/rn_setting_list',$x);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Rn_setting_model->json();
    }

    public function detail($id) 
    {
        $row = $this->Rn_setting_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_setting' => $row->id_setting,
		'parameter' => $row->parameter,
		'nilai' => $row->nilai,
	    
'judul'=>'Detail :  RN_SETTING',
);
            $this->template->load('template','rn_setting/rn_setting_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Data Tidak Di Temukan.</div>');
            redirect(site_url('rn_setting'));
        }
    }

    public function tambah() 
    {
        $data = array(
            'judul'=>'Tambah Rn setting',
            'button' => 'Create',
            'action' => site_url('rn_setting/tambah_data'),
	    'id_setting' => set_value('id_setting'),
	    'parameter' => set_value('parameter'),
	    'nilai' => set_value('nilai'),
	);
        $this->template->load('template','rn_setting/rn_setting_form', $data);
    }
    
    public function tambah_data() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
		'parameter' => $this->input->post('parameter',TRUE),
		'nilai' => $this->input->post('nilai',TRUE),
	    );

            $this->Rn_setting_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Data Berhasil Di Tambahkan.</div>');
            redirect(site_url('rn_setting'));
        }
    }
    
    public function edit($id) 
    {
        $row = $this->Rn_setting_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul'=>'Data RN_SETTING',
                'button' => 'Update',
                'action' => site_url('rn_setting/edit_data'),
		'id_setting' => set_value('id_setting', $row->id_setting),
		'parameter' => set_value('parameter', $row->parameter),
		'nilai' => set_value('nilai', $row->nilai),
	    );
             $this->template->load('template','rn_setting/rn_setting_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-info fade-in">Data Tidak Di Temukan.</div>');
            redirect(site_url('rn_setting'));
        }
    }
    
    public function edit_data() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id_setting', TRUE));
        } else {
            $data = array(
		'parameter' => $this->input->post('parameter',TRUE),
		'nilai' => $this->input->post('nilai',TRUE),
	    );

            $this->Rn_setting_model->update($this->input->post('id_setting', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Edit Data Berhasil.</div>');
            redirect(site_url('rn_setting'));
        }
    }
    
    public function hapus($id) 
    {
        $row = $this->Rn_setting_model->get_by_id($id);

        if ($row) {
            $this->Rn_setting_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger fade-in"><i class="fa fa-check"></i>Data Berhasil Di Hapus</div>');
            redirect(site_url('rn_setting'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Ops Something Went Wrong Please Contact Administrator.</div>');
            redirect(site_url('rn_setting'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('parameter', 'parameter', 'trim|required');
	$this->form_validation->set_rules('nilai', 'nilai', 'trim|required');

	$this->form_validation->set_rules('id_setting', 'id_setting', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "rn_setting.xls";
        $judul = "rn_setting";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Parameter");
	xlsWriteLabel($tablehead, $kolomhead++, "Nilai");

	foreach ($this->Rn_setting_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->parameter);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nilai);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=rn_setting.doc");

        $data = array(
            'rn_setting_data' => $this->Rn_setting_model->get_all(),
            'start' => 0
        );
        
         $this->load->view('template','rn_setting/rn_setting_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'rn_setting_data' => $this->Rn_setting_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('rn_setting/rn_setting_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('rn_setting.pdf', 'D'); 
    }

}

