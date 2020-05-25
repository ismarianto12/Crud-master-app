<?php

/*developed by ismarianto putra
  you can visit my site in ismarianto.com
  for more complain anda more information.  
*/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tmp_purchase extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        login_access();
        hak_akses();
        $this->load->model('Tmp_purchase_model');
        $this->load->library('form_validation');   
	$this->load->library('datatables');
    }

    public function index()
    {
         $x['judul'] = 'Data : Tmp purchase';
         $this->template->load('template','tmp_purchase/tmp_purchase_list',$x);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tmp_purchase_model->json();
    }

    public function detail($id) 
    {
        $row = $this->Tmp_purchase_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_barang' => $row->id_barang,
		'jumlah' => $row->jumlah,
	    
'judul'=>'Detail :  TMP_PURCHASE',
);
            $this->template->load('template','tmp_purchase/tmp_purchase_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Data Tidak Di Temukan.</div>');
            redirect(site_url('tmp_purchase'));
        }
    }

    public function tambah() 
    {
        $data = array(
            'judul'=>'Tambah Tmp purchase',
            'button' => 'Create',
            'action' => site_url('tmp_purchase/tambah_data'),
	    'id_barang' => set_value('id_barang'),
	    'jumlah' => set_value('jumlah'),
	);
        $this->template->load('template','tmp_purchase/tmp_purchase_form', $data);
    }
    
    public function tambah_data() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
		'id_barang' => $this->input->post('id_barang',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
	    );

            $this->Tmp_purchase_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Data Berhasil Di Tambahkan.</div>');
            redirect(site_url('tmp_purchase'));
        }
    }
    
    public function edit($id) 
    {
        $row = $this->Tmp_purchase_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul'=>'Data TMP_PURCHASE',
                'button' => 'Update',
                'action' => site_url('tmp_purchase/edit_data'),
		'id_barang' => set_value('id_barang', $row->id_barang),
		'jumlah' => set_value('jumlah', $row->jumlah),
	    );
             $this->template->load('template','tmp_purchase/tmp_purchase_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-info fade-in">Data Tidak Di Temukan.</div>');
            redirect(site_url('tmp_purchase'));
        }
    }
    
    public function edit_data() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('', TRUE));
        } else {
            $data = array(
		'id_barang' => $this->input->post('id_barang',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
	    );

            $this->Tmp_purchase_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Edit Data Berhasil.</div>');
            redirect(site_url('tmp_purchase'));
        }
    }
    
    public function hapus($id) 
    {
        $row = $this->Tmp_purchase_model->get_by_id($id);

        if ($row) {
            $this->Tmp_purchase_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger fade-in"><i class="fa fa-check"></i>Data Berhasil Di Hapus</div>');
            redirect(site_url('tmp_purchase'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Ops Something Went Wrong Please Contact Administrator.</div>');
            redirect(site_url('tmp_purchase'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_barang', 'id barang', 'trim|required|numeric');
	$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required|numeric');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tmp_purchase.xls";
        $judul = "tmp_purchase";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Barang");
	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah");

	foreach ($this->Tmp_purchase_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_barang);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jumlah);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tmp_purchase.doc");

        $data = array(
            'tmp_purchase_data' => $this->Tmp_purchase_model->get_all(),
            'start' => 0
        );
        
         $this->load->view('template','tmp_purchase/tmp_purchase_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'tmp_purchase_data' => $this->Tmp_purchase_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('tmp_purchase/tmp_purchase_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('tmp_purchase.pdf', 'D'); 
    }

}

