<?php header('Access-Control-Allow-Origin: *'); ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penyewaan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('admin/Data_model');
	}

	public function index()
	{
		$select_penyewaan = $this->Data_model->select_penyewaan();
		$data['select_penyewaan'] = $select_penyewaan->result();

		$this->load->view('admin/penyewaan',$data);
	}
	public function tambah()
	{
		$submit = $this->input->post('submit');
		if(isset($submit))
		{
			$data = array(
	                  'nama_ruangan' => $this->input->post('namaruangan'),
	                  'deskripsi_ruangan' => $this->input->post('deskripsiruangan'),
	                  'harga_ruangan' => $this->input->post('hargaruangan'),
	                  'satuan_ruangan' => $this->input->post('satuanruangan'),
	                  'kapasitas_ruangan' => $this->input->post('kapasitasruangan'),
	                  'status_ruangan' =>$this->input->post('statusruangan')
	            );

			if($this->Data_model->insert_ruangan($data))
			{
				$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade in" role="alert">Data Berhasil Ditambahkan</div>');
				redirect('admin/ruangan');
			}
			else
			{
				$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade in" role="alert">Data Gagal Ditambahkan</div>');
				redirect('admin/ruangan');
			}

		}
		else
		{
			$this->load->view('admin/ruangantambah');
		}
	}
	public function ubahstatus($id_penyewaan,$status)
	{
			$data = array(
	                  'status_penyewaan' => $status
	            );

			if($this->Data_model->update_status_penyewaan($data,$id_penyewaan))
			{
				$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade in" role="alert">Data Berhasil Diubah</div>');
				redirect('admin/penyewaan');
			}
			else
			{
				$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade in" role="alert">Data Tidak Berhasil Diubah</div>');
				redirect('admin/ruangan');
			}

	}

	public function hapus($id_ruangan)
	{
		if($this->Data_model->delete_ruangan($id_ruangan))
		{
			$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade in" role="alert">Data Berhasil Dihapus</div>');
				redirect('admin/ruangan');
		}
		else
		{
			$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade in" role="alert">Data Gagal Dihapus</div>');
			redirect('admin/ruangan');
		}
	}

}