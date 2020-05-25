<?php

/*developed by ismarianto putra
  you can visit my site in ismarianto.com
  for more complain anda more information.  
*/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rn_barang_keluar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        login_access();
        hak_akses();
        $this->load->model('Rn_barang_keluar_model');
        $this->load->library('form_validation');   
	$this->load->library('datatables');
    }

    public function index()
    {
         $x['judul'] = 'Data : Rn barang keluar';
         $this->template->load('template','rn_barang_keluar/rn_barang_keluar_list',$x);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Rn_barang_keluar_model->json();
    }

    public function detail($id) 
    {
        $row = $this->Rn_barang_keluar_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_barang_keluar' => $row->id_barang_keluar,
		'kode_transaksi' => $row->kode_transaksi,
		'id_barang' => $row->id_barang,
		'id_project' => $row->id_project,
		'jumlah_keluar' => $row->jumlah_keluar,
		'penerima' => $row->penerima,
		'id_admin' => $row->id_admin,
		'tanggal_keluar' => $row->tanggal_keluar,
		'alamat_penerima' => $row->alamat_penerima,
	    
'judul'=>'Detail :  RN_BARANG_KELUAR',
);
            $this->template->load('template','rn_barang_keluar/rn_barang_keluar_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Data Tidak Di Temukan.</div>');
            redirect(site_url('rn_barang_keluar'));
        }
    }

    public function tambah() 
    {
        $data = array(
            'judul'=>'Tambah Rn barang keluar',
            'button' => 'Create',
            'action' => site_url('rn_barang_keluar/tambah_data'),
	    'id_barang_keluar' => set_value('id_barang_keluar'),
	    'kode_transaksi' => set_value('kode_transaksi'),
	    'id_barang' => set_value('id_barang'),
	    'id_project' => set_value('id_project'),
	    'jumlah_keluar' => set_value('jumlah_keluar'),
	    'penerima' => set_value('penerima'),
	    'id_admin' => set_value('id_admin'),
	    'tanggal_keluar' => set_value('tanggal_keluar'),
	    'alamat_penerima' => set_value('alamat_penerima'),
	);
        $this->template->load('template','rn_barang_keluar/rn_barang_keluar_form', $data);
    }
    
    public function tambah_data() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
		'kode_transaksi' => $this->input->post('kode_transaksi',TRUE),
		'id_barang' => $this->input->post('id_barang',TRUE),
		'id_project' => $this->input->post('id_project',TRUE),
		'jumlah_keluar' => $this->input->post('jumlah_keluar',TRUE),
		'penerima' => $this->input->post('penerima',TRUE),
		'id_admin' => $this->input->post('id_admin',TRUE),
		'tanggal_keluar' => $this->input->post('tanggal_keluar',TRUE),
		'alamat_penerima' => $this->input->post('alamat_penerima',TRUE),
	    );

            $this->Rn_barang_keluar_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Data Berhasil Di Tambahkan.</div>');
            redirect(site_url('rn_barang_keluar'));
        }
    }
    
    public function edit($id) 
    {
        $row = $this->Rn_barang_keluar_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul'=>'Data RN_BARANG_KELUAR',
                'button' => 'Update',
                'action' => site_url('rn_barang_keluar/edit_data'),
		'id_barang_keluar' => set_value('id_barang_keluar', $row->id_barang_keluar),
		'kode_transaksi' => set_value('kode_transaksi', $row->kode_transaksi),
		'id_barang' => set_value('id_barang', $row->id_barang),
		'id_project' => set_value('id_project', $row->id_project),
		'jumlah_keluar' => set_value('jumlah_keluar', $row->jumlah_keluar),
		'penerima' => set_value('penerima', $row->penerima),
		'id_admin' => set_value('id_admin', $row->id_admin),
		'tanggal_keluar' => set_value('tanggal_keluar', $row->tanggal_keluar),
		'alamat_penerima' => set_value('alamat_penerima', $row->alamat_penerima),
	    );
             $this->template->load('template','rn_barang_keluar/rn_barang_keluar_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-info fade-in">Data Tidak Di Temukan.</div>');
            redirect(site_url('rn_barang_keluar'));
        }
    }
    
    public function edit_data() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id_barang_keluar', TRUE));
        } else {
            $data = array(
		'kode_transaksi' => $this->input->post('kode_transaksi',TRUE),
		'id_barang' => $this->input->post('id_barang',TRUE),
		'id_project' => $this->input->post('id_project',TRUE),
		'jumlah_keluar' => $this->input->post('jumlah_keluar',TRUE),
		'penerima' => $this->input->post('penerima',TRUE),
		'id_admin' => $this->input->post('id_admin',TRUE),
		'tanggal_keluar' => $this->input->post('tanggal_keluar',TRUE),
		'alamat_penerima' => $this->input->post('alamat_penerima',TRUE),
	    );

            $this->Rn_barang_keluar_model->update($this->input->post('id_barang_keluar', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Edit Data Berhasil.</div>');
            redirect(site_url('rn_barang_keluar'));
        }
    }
    
    public function hapus($id) 
    {
        $row = $this->Rn_barang_keluar_model->get_by_id($id);

        if ($row) {
            $this->Rn_barang_keluar_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger fade-in"><i class="fa fa-check"></i>Data Berhasil Di Hapus</div>');
            redirect(site_url('rn_barang_keluar'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Ops Something Went Wrong Please Contact Administrator.</div>');
            redirect(site_url('rn_barang_keluar'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_transaksi', 'kode transaksi', 'trim|required');
	$this->form_validation->set_rules('id_barang', 'id barang', 'trim|required|numeric');
	$this->form_validation->set_rules('id_project', 'id project', 'trim|required|numeric');
	$this->form_validation->set_rules('jumlah_keluar', 'jumlah keluar', 'trim|required|numeric');
	$this->form_validation->set_rules('penerima', 'penerima', 'trim|required');
	$this->form_validation->set_rules('id_admin', 'id admin', 'trim|required|numeric');
	$this->form_validation->set_rules('tanggal_keluar', 'tanggal keluar', 'trim|required');
	$this->form_validation->set_rules('alamat_penerima', 'alamat penerima', 'trim|required');

	$this->form_validation->set_rules('id_barang_keluar', 'id_barang_keluar', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "rn_barang_keluar.xls";
        $judul = "rn_barang_keluar";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Transaksi");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Barang");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Project");
	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Keluar");
	xlsWriteLabel($tablehead, $kolomhead++, "Penerima");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Admin");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Keluar");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Penerima");

	foreach ($this->Rn_barang_keluar_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_transaksi);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_barang);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_project);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jumlah_keluar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->penerima);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_admin);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_keluar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_penerima);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=rn_barang_keluar.doc");

        $data = array(
            'rn_barang_keluar_data' => $this->Rn_barang_keluar_model->get_all(),
            'start' => 0
        );
        
         $this->load->view('template','rn_barang_keluar/rn_barang_keluar_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'rn_barang_keluar_data' => $this->Rn_barang_keluar_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('rn_barang_keluar/rn_barang_keluar_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('rn_barang_keluar.pdf', 'D'); 
    }

}

