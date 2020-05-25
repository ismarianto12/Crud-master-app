<?php

/*developed by ismarianto putra
  you can visit my site in ismarianto.com
  for more complain anda more information.  
*/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rn_barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        login_access();
        hak_akses();
        $this->load->model('Rn_barang_model');
        $this->load->library('form_validation');   
	$this->load->library('datatables');
    }

    public function index()
    {
         $x['judul'] = 'Data : Rn barang';
         $this->template->load('template','rn_barang/rn_barang_list',$x);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Rn_barang_model->json();
    }

    public function detail($id) 
    {
        $row = $this->Rn_barang_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_barang' => $row->id_barang,
		'kode_barang' => $row->kode_barang,
		'nama_barang' => $row->nama_barang,
		'harga_beli' => $row->harga_beli,
		'harga_jual' => $row->harga_jual,
		'stok' => $row->stok,
		'satuan' => $row->satuan,
		'id_lokasi' => $row->id_lokasi,
		'id_kategori' => $row->id_kategori,
		'id_suplier' => $row->id_suplier,
		'tanggal_barang' => $row->tanggal_barang,
		'id_admin' => $row->id_admin,
	    
'judul'=>'Detail :  RN_BARANG',
);
            $this->template->load('template','rn_barang/rn_barang_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Data Tidak Di Temukan.</div>');
            redirect(site_url('rn_barang'));
        }
    }

    public function tambah() 
    {
        $data = array(
            'judul'=>'Tambah Rn barang',
            'button' => 'Create',
            'action' => site_url('rn_barang/tambah_data'),
	    'id_barang' => set_value('id_barang'),
	    'kode_barang' => set_value('kode_barang'),
	    'nama_barang' => set_value('nama_barang'),
	    'harga_beli' => set_value('harga_beli'),
	    'harga_jual' => set_value('harga_jual'),
	    'stok' => set_value('stok'),
	    'satuan' => set_value('satuan'),
	    'id_lokasi' => set_value('id_lokasi'),
	    'id_kategori' => set_value('id_kategori'),
	    'id_suplier' => set_value('id_suplier'),
	    'tanggal_barang' => set_value('tanggal_barang'),
	    'id_admin' => set_value('id_admin'),
	);
        $this->template->load('template','rn_barang/rn_barang_form', $data);
    }
    
    public function tambah_data() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
		'kode_barang' => $this->input->post('kode_barang',TRUE),
		'nama_barang' => $this->input->post('nama_barang',TRUE),
		'harga_beli' => $this->input->post('harga_beli',TRUE),
		'harga_jual' => $this->input->post('harga_jual',TRUE),
		'stok' => $this->input->post('stok',TRUE),
		'satuan' => $this->input->post('satuan',TRUE),
		'id_lokasi' => $this->input->post('id_lokasi',TRUE),
		'id_kategori' => $this->input->post('id_kategori',TRUE),
		'id_suplier' => $this->input->post('id_suplier',TRUE),
		'tanggal_barang' => $this->input->post('tanggal_barang',TRUE),
		'id_admin' => $this->input->post('id_admin',TRUE),
	    );

            $this->Rn_barang_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Data Berhasil Di Tambahkan.</div>');
            redirect(site_url('rn_barang'));
        }
    }
    
    public function edit($id) 
    {
        $row = $this->Rn_barang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul'=>'Data RN_BARANG',
                'button' => 'Update',
                'action' => site_url('rn_barang/edit_data'),
		'id_barang' => set_value('id_barang', $row->id_barang),
		'kode_barang' => set_value('kode_barang', $row->kode_barang),
		'nama_barang' => set_value('nama_barang', $row->nama_barang),
		'harga_beli' => set_value('harga_beli', $row->harga_beli),
		'harga_jual' => set_value('harga_jual', $row->harga_jual),
		'stok' => set_value('stok', $row->stok),
		'satuan' => set_value('satuan', $row->satuan),
		'id_lokasi' => set_value('id_lokasi', $row->id_lokasi),
		'id_kategori' => set_value('id_kategori', $row->id_kategori),
		'id_suplier' => set_value('id_suplier', $row->id_suplier),
		'tanggal_barang' => set_value('tanggal_barang', $row->tanggal_barang),
		'id_admin' => set_value('id_admin', $row->id_admin),
	    );
             $this->template->load('template','rn_barang/rn_barang_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-info fade-in">Data Tidak Di Temukan.</div>');
            redirect(site_url('rn_barang'));
        }
    }
    
    public function edit_data() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id_barang', TRUE));
        } else {
            $data = array(
		'kode_barang' => $this->input->post('kode_barang',TRUE),
		'nama_barang' => $this->input->post('nama_barang',TRUE),
		'harga_beli' => $this->input->post('harga_beli',TRUE),
		'harga_jual' => $this->input->post('harga_jual',TRUE),
		'stok' => $this->input->post('stok',TRUE),
		'satuan' => $this->input->post('satuan',TRUE),
		'id_lokasi' => $this->input->post('id_lokasi',TRUE),
		'id_kategori' => $this->input->post('id_kategori',TRUE),
		'id_suplier' => $this->input->post('id_suplier',TRUE),
		'tanggal_barang' => $this->input->post('tanggal_barang',TRUE),
		'id_admin' => $this->input->post('id_admin',TRUE),
	    );

            $this->Rn_barang_model->update($this->input->post('id_barang', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Edit Data Berhasil.</div>');
            redirect(site_url('rn_barang'));
        }
    }
    
    public function hapus($id) 
    {
        $row = $this->Rn_barang_model->get_by_id($id);

        if ($row) {
            $this->Rn_barang_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger fade-in"><i class="fa fa-check"></i>Data Berhasil Di Hapus</div>');
            redirect(site_url('rn_barang'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Ops Something Went Wrong Please Contact Administrator.</div>');
            redirect(site_url('rn_barang'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_barang', 'kode barang', 'trim|required');
	$this->form_validation->set_rules('nama_barang', 'nama barang', 'trim|required');
	$this->form_validation->set_rules('harga_beli', 'harga beli', 'trim|required|numeric');
	$this->form_validation->set_rules('harga_jual', 'harga jual', 'trim|required|numeric');
	$this->form_validation->set_rules('stok', 'stok', 'trim|required|numeric');
	$this->form_validation->set_rules('satuan', 'satuan', 'trim|required');
	$this->form_validation->set_rules('id_lokasi', 'id lokasi', 'trim|required|numeric');
	$this->form_validation->set_rules('id_kategori', 'id kategori', 'trim|required|numeric');
	$this->form_validation->set_rules('id_suplier', 'id suplier', 'trim|required|numeric');
	$this->form_validation->set_rules('tanggal_barang', 'tanggal barang', 'trim|required');
	$this->form_validation->set_rules('id_admin', 'id admin', 'trim|required|numeric');

	$this->form_validation->set_rules('id_barang', 'id_barang', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "rn_barang.xls";
        $judul = "rn_barang";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Barang");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Barang");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga Beli");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga Jual");
	xlsWriteLabel($tablehead, $kolomhead++, "Stok");
	xlsWriteLabel($tablehead, $kolomhead++, "Satuan");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Lokasi");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Kategori");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Suplier");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Barang");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Admin");

	foreach ($this->Rn_barang_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_barang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_barang);
	    xlsWriteNumber($tablebody, $kolombody++, $data->harga_beli);
	    xlsWriteNumber($tablebody, $kolombody++, $data->harga_jual);
	    xlsWriteNumber($tablebody, $kolombody++, $data->stok);
	    xlsWriteLabel($tablebody, $kolombody++, $data->satuan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_lokasi);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_kategori);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_suplier);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_barang);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_admin);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=rn_barang.doc");

        $data = array(
            'rn_barang_data' => $this->Rn_barang_model->get_all(),
            'start' => 0
        );
        
         $this->load->view('template','rn_barang/rn_barang_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'rn_barang_data' => $this->Rn_barang_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('rn_barang/rn_barang_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('rn_barang.pdf', 'D'); 
    }

}

