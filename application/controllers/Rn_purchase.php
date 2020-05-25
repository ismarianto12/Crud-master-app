<?php

/*developed by ismarianto putra
  you can visit my site in ismarianto.com
  for more complain anda more information.  
*/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rn_purchase extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        login_access();
        hak_akses();
        $this->load->model('Rn_purchase_model');
        $this->load->library('form_validation');   
	$this->load->library('datatables');
    }

    public function index()
    {
         $x['judul'] = 'Data : Rn purchase';
         $this->template->load('template','rn_purchase/rn_purchase_list',$x);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Rn_purchase_model->json();
    }

    public function detail($id) 
    {
        $row = $this->Rn_purchase_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_purchase' => $row->id_purchase,
		'kode_purchase' => $row->kode_purchase,
		'suplier' => $row->suplier,
		'alamat_sup' => $row->alamat_sup,
		'id_barang' => $row->id_barang,
		'tanggal_purchase' => $row->tanggal_purchase,
		'detail' => $row->detail,
		'jumlah' => $row->jumlah,
	    
'judul'=>'Detail :  RN_PURCHASE',
);
            $this->template->load('template','rn_purchase/rn_purchase_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Data Tidak Di Temukan.</div>');
            redirect(site_url('rn_purchase'));
        }
    }

    public function tambah() 
    {
        $data = array(
            'judul'=>'Tambah Rn purchase',
            'button' => 'Create',
            'action' => site_url('rn_purchase/tambah_data'),
	    'id_purchase' => set_value('id_purchase'),
	    'kode_purchase' => set_value('kode_purchase'),
	    'suplier' => set_value('suplier'),
	    'alamat_sup' => set_value('alamat_sup'),
	    'id_barang' => set_value('id_barang'),
	    'tanggal_purchase' => set_value('tanggal_purchase'),
	    'detail' => set_value('detail'),
	    'jumlah' => set_value('jumlah'),
	);
        $this->template->load('template','rn_purchase/rn_purchase_form', $data);
    }
    
    public function tambah_data() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
		'kode_purchase' => $this->input->post('kode_purchase',TRUE),
		'suplier' => $this->input->post('suplier',TRUE),
		'alamat_sup' => $this->input->post('alamat_sup',TRUE),
		'id_barang' => $this->input->post('id_barang',TRUE),
		'tanggal_purchase' => $this->input->post('tanggal_purchase',TRUE),
		'detail' => $this->input->post('detail',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
	    );

            $this->Rn_purchase_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Data Berhasil Di Tambahkan.</div>');
            redirect(site_url('rn_purchase'));
        }
    }
    
    public function edit($id) 
    {
        $row = $this->Rn_purchase_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul'=>'Data RN_PURCHASE',
                'button' => 'Update',
                'action' => site_url('rn_purchase/edit_data'),
		'id_purchase' => set_value('id_purchase', $row->id_purchase),
		'kode_purchase' => set_value('kode_purchase', $row->kode_purchase),
		'suplier' => set_value('suplier', $row->suplier),
		'alamat_sup' => set_value('alamat_sup', $row->alamat_sup),
		'id_barang' => set_value('id_barang', $row->id_barang),
		'tanggal_purchase' => set_value('tanggal_purchase', $row->tanggal_purchase),
		'detail' => set_value('detail', $row->detail),
		'jumlah' => set_value('jumlah', $row->jumlah),
	    );
             $this->template->load('template','rn_purchase/rn_purchase_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-info fade-in">Data Tidak Di Temukan.</div>');
            redirect(site_url('rn_purchase'));
        }
    }
    
    public function edit_data() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id_purchase', TRUE));
        } else {
            $data = array(
		'kode_purchase' => $this->input->post('kode_purchase',TRUE),
		'suplier' => $this->input->post('suplier',TRUE),
		'alamat_sup' => $this->input->post('alamat_sup',TRUE),
		'id_barang' => $this->input->post('id_barang',TRUE),
		'tanggal_purchase' => $this->input->post('tanggal_purchase',TRUE),
		'detail' => $this->input->post('detail',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
	    );

            $this->Rn_purchase_model->update($this->input->post('id_purchase', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Edit Data Berhasil.</div>');
            redirect(site_url('rn_purchase'));
        }
    }
    
    public function hapus($id) 
    {
        $row = $this->Rn_purchase_model->get_by_id($id);

        if ($row) {
            $this->Rn_purchase_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger fade-in"><i class="fa fa-check"></i>Data Berhasil Di Hapus</div>');
            redirect(site_url('rn_purchase'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Ops Something Went Wrong Please Contact Administrator.</div>');
            redirect(site_url('rn_purchase'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_purchase', 'kode purchase', 'trim|required');
	$this->form_validation->set_rules('suplier', 'suplier', 'trim|required');
	$this->form_validation->set_rules('alamat_sup', 'alamat sup', 'trim|required');
	$this->form_validation->set_rules('id_barang', 'id barang', 'trim|required|numeric');
	$this->form_validation->set_rules('tanggal_purchase', 'tanggal purchase', 'trim|required');
	$this->form_validation->set_rules('detail', 'detail', 'trim|required');
	$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required|numeric');

	$this->form_validation->set_rules('id_purchase', 'id_purchase', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "rn_purchase.xls";
        $judul = "rn_purchase";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Purchase");
	xlsWriteLabel($tablehead, $kolomhead++, "Suplier");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Sup");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Barang");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Purchase");
	xlsWriteLabel($tablehead, $kolomhead++, "Detail");
	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah");

	foreach ($this->Rn_purchase_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_purchase);
	    xlsWriteLabel($tablebody, $kolombody++, $data->suplier);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_sup);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_barang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_purchase);
	    xlsWriteLabel($tablebody, $kolombody++, $data->detail);
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
        header("Content-Disposition: attachment;Filename=rn_purchase.doc");

        $data = array(
            'rn_purchase_data' => $this->Rn_purchase_model->get_all(),
            'start' => 0
        );
        
         $this->load->view('template','rn_purchase/rn_purchase_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'rn_purchase_data' => $this->Rn_purchase_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('rn_purchase/rn_purchase_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('rn_purchase.pdf', 'D'); 
    }

}

