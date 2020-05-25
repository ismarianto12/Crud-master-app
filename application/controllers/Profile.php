<?php 
class profile extends CI_Controller{

function __construct(){
parent::__construct();
$this->load->library('form_validation');   
login_access();
$this->load->model("Login_model");
}

function index(){
if (isset($_POST['kirim'])) {

	if (self::_rules() != TRUE) {
		$row = $this->db->get_where('login',array('id_user'=>$this->session->id_user))->result(); 
		$x = array(
			'judul'=>'Update Profile.',
			'button' => 'Update',
			'action' => site_url('login/edit_data'),
			'id_user' => set_value('id_user', $row->id_user),
			'username' => set_value('username', $row->username),
			'password' => set_value('password', $row->password),
			'nama' => set_value('nama', $row->nama),
			'level' => set_value('level', $row->level),
			'foto' => set_value('foto', $row->foto),
			'email' => set_value('email', $row->email), 
			'aktif' => set_value('aktif', $row->aktif),
			'log' => set_value('log', $row->log));
		$this->template->load('template','profile', $x); 
	}else{ 
		if ($_FILES['foto']['name'] !='') {
			$conf['file_name'] = 'foto'.time();
			$conf['upload_path'] = 'assets/img/foto';
			$conf['allowed_types']  = 'jpg|png|bmp';

			$this->upload->initialize($conf);
			if($this->upload->do_upload('foto') == TRUE){ 
				$qdata = $this->db->get_where('login',array('id_user'=>$this->input->post('id_user')));
				$cek_id = $qdata->row_array();
				unlink('assets/img/foto/'.$cek_id['foto']);

				if ($this->session->id_user == $this->input->post('id_user', TRUE)) {
					$level = array('level'=>$cek_id['level']);
				}else{
					$level = array('level'=>$this->input->post('level'));
				}
				$data = array(
					'username' => $this->input->post('username',TRUE),
					'password' => md5($this->input->post('password',TRUE)),
					'nama' => $this->input->post('nama',TRUE), 
					'email' => $this->input->post('email',TRUE),
					'foto' => $this->upload->file_name, 
					'log' => date('Y-m-d H:i:s'),
					'aktif' =>'Y',
				); 
				$f_data= array_merge($level,$data);
				$this->Login_model->update($this->input->post('id_user', TRUE), $f_data);
				$this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Edit Data Berhasil.</div>');
				redirect(site_url('profile'));

			}else{
				$this->session->set_flashdata('message',$this->upload->dislplay_errors('<div class="callout callout-danger">','</div>'));
				redirect(base_url('profile'));
			}
		}else{
			$data = array(
				'username' => $this->input->post('username',TRUE),
				'password' => md5($this->input->post('password',TRUE)),
				'nama' => $this->input->post('nama',TRUE),
				'level' => $this->input->post('level',TRUE),
				'email' => $this->input->post('email',TRUE), 
				'log' => date('Y-m-d H:i:s'),
				'aktif' => $this->input->post('aktif',TRUE),
			);
          $this->Login_model->update($this->input->post('id_user', TRUE), $data);
		}
	}

}else{
	$data=$this->db->get_where('login',array('id_user'=>$this->session->id_user))->row_array();
	$x['judul'] = 'Edit Profile';
 	$x['username'] = $data['username'];
	$x['nama'] = $data['nama'];
	$x['email'] = $data['email'];
	$x['foto'] = $data['foto'];
	$this->template->load('template','profile',$x);
 }
}



public function _rules() 
{
$this->form_validation->set_rules('username', 'username', 'trim|required');
$this->form_validation->set_rules('password', 'password', 'trim|required');
$this->form_validation->set_rules('nama', 'nama', 'trim|required');
$this->form_validation->set_rules('email', 'email', 'trim|required'); 
$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
}

}