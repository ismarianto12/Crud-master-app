<?php

/*developed by ismarianto putra
  you can visit my site in ismarianto.com
  for more complain anda more information.  
*/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        login_access();
        hak_akses();
        $this->load->model('Login_model');
        $this->load->library('form_validation');   
	$this->load->library('datatables');
    }

    public function index()
    {
         $x['judul'] = 'Data : Login';
         $this->template->load('template','login/login_list',$x);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Login_model->json();
    }

    public function detail($id) 
    {
        $row = $this->Login_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_user' => $row->id_user,
		'username' => $row->username,
		'password' => $row->password,
		'nama' => $row->nama,
		'level' => $row->level,
		'foto' => $row->foto,
		'email' => $row->email,
		'log' => $row->log,
		'aktif' => $row->aktif,
	    
'judul'=>'Detail :  LOGIN',
);
            $this->template->load('template','login/login_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Data Tidak Di Temukan.</div>');
            redirect(site_url('login'));
        }
    }

    public function tambah() 
    {
        $data = array(
            'judul'=>'Tambah Login',
            'button' => 'Create',
            'action' => site_url('login/tambah_data'),
	    'id_user' => set_value('id_user'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'nama' => set_value('nama'),
	    'level' => set_value('level'),
	    'foto' => set_value('foto'),
	    'email' => set_value('email'),
	    'log' => set_value('log'),
	    'aktif' => set_value('aktif'),
	);
        $this->template->load('template','login/login_form', $data);
    }
    
    public function tambah_data() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'level' => $this->input->post('level',TRUE),
		'foto' => $this->input->post('foto',TRUE),
		'email' => $this->input->post('email',TRUE),
		'log' => $this->input->post('log',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
	    );

            $this->Login_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Data Berhasil Di Tambahkan.</div>');
            redirect(site_url('login'));
        }
    }
    
    public function edit($id) 
    {
        $row = $this->Login_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul'=>'Data LOGIN',
                'button' => 'Update',
                'action' => site_url('login/edit_data'),
		'id_user' => set_value('id_user', $row->id_user),
		'username' => set_value('username', $row->username),
		'password' => set_value('password', $row->password),
		'nama' => set_value('nama', $row->nama),
		'level' => set_value('level', $row->level),
		'foto' => set_value('foto', $row->foto),
		'email' => set_value('email', $row->email),
		'log' => set_value('log', $row->log),
		'aktif' => set_value('aktif', $row->aktif),
	    );
             $this->template->load('template','login/login_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-info fade-in">Data Tidak Di Temukan.</div>');
            redirect(site_url('login'));
        }
    }
    
    public function edit_data() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id_user', TRUE));
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'level' => $this->input->post('level',TRUE),
		'foto' => $this->input->post('foto',TRUE),
		'email' => $this->input->post('email',TRUE),
		'log' => $this->input->post('log',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
	    );

            $this->Login_model->update($this->input->post('id_user', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Edit Data Berhasil.</div>');
            redirect(site_url('login'));
        }
    }
    
    public function hapus($id) 
    {
        $row = $this->Login_model->get_by_id($id);

        if ($row) {
            $this->Login_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger fade-in"><i class="fa fa-check"></i>Data Berhasil Di Hapus</div>');
            redirect(site_url('login'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Ops Something Went Wrong Please Contact Administrator.</div>');
            redirect(site_url('login'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('level', 'level', 'trim|required');
	$this->form_validation->set_rules('foto', 'foto', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('log', 'log', 'trim|required');
	$this->form_validation->set_rules('aktif', 'aktif', 'trim|required');

	$this->form_validation->set_rules('id_user', 'id_user', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "login.xls";
        $judul = "login";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Password");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Level");
	xlsWriteLabel($tablehead, $kolomhead++, "Foto");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Log");
	xlsWriteLabel($tablehead, $kolomhead++, "Aktif");

	foreach ($this->Login_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->username);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->level);
	    xlsWriteLabel($tablebody, $kolombody++, $data->foto);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->log);
	    xlsWriteLabel($tablebody, $kolombody++, $data->aktif);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=login.doc");

        $data = array(
            'login_data' => $this->Login_model->get_all(),
            'start' => 0
        );
        
         $this->load->view('template','login/login_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'login_data' => $this->Login_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('login/login_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('login.pdf', 'D'); 
    }

}

