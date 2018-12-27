<?php header('Access-Control-Allow-Origin: *'); ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('admin/Data_model');
	}

	public function index()
	{
		$select_pengguna= $this->Data_model->select_pengguna();
		$data['select_pengguna'] = $select_pengguna->result();

		$this->load->view('admin/pengguna',$data);
	}
	public function tambah()
	{
		$submit = $this->input->post('submit');
		if(isset($submit))
		{
			$data = array(
	                  'id_user' => $this->input->post('iduser'),
	                  'password' => $this->input->post('passworduser'),
	                  'nama_lengkap' => $this->input->post('namalengkap'),
	                  'email' => $this->input->post('emailuser'),
	                  'no_telp' => $this->input->post('notelpuser'),
	                  'alamat' =>$this->input->post('alamatuser'),
	                  'tipe_user' => '1'
	            );

			if($this->Data_model->insert_pengguna($data))
			{
				$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade in" role="alert">Data Berhasil Ditambahkan</div>');
				redirect('admin/pengguna');
			}
			else
			{
				$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade in" role="alert">Data Gagal Ditambahkan</div>');
				redirect('admin/pengguna');
			}

		}
		else
		{
			$this->load->view('admin/penggunatambah');
		}
	}
	public function ubah($id_user)
	{
		$submit = $this->input->post('submit');
		if(isset($submit))
		{
			$data = array(
	                  'id_user' => $this->input->post('iduser'),
	                  'password' => $this->input->post('passworduser'),
	                  'nama_lengkap' => $this->input->post('namalengkap'),
	                  'email' => $this->input->post('emailuser'),
	                  'no_telp' => $this->input->post('notelpuser'),
	                  'alamat' =>$this->input->post('alamatuser')
	            );

			if($this->Data_model->update_pengguna($data,$id_user))
			{
				$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade in" role="alert">Data Berhasil Diubah</div>');
				redirect('admin/pengguna');
			}
			else
			{
				$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade in" role="alert">Data Tidak Berhasil Diubah</div>');
				redirect('admin/pengguna');
			}

		}
		else
		{
			$select_pengguna= $this->Data_model->select_pengguna_get($id_user);
			$data['data_pengguna'] = $select_pengguna->row();
			$this->load->view('admin/penggunaubah',$data);
		}
	}

	public function hapus($id_user)
	{
		if($this->Data_model->delete_pengguna($id_user))
		{
			$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade in" role="alert">Data Berhasil Dihapus</div>');
				redirect('admin/pengguna');
		}
		else
		{
			$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade in" role="alert">Data Gagal Dihapus</div>');
			redirect('admin/pengguna');
		}
	}

}