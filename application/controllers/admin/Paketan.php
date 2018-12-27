<?php header('Access-Control-Allow-Origin: *'); ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paketan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('admin/Data_model');
	}

	public function index()
	{
		$select_paketan= $this->Data_model->select_paketan();
		$data['select_paketan'] = $select_paketan->result();

		$this->load->view('admin/paketan',$data);
	}
	public function tambah()
	{
		$submit = $this->input->post('submit');
		if(isset($submit))
		{
			$data = array(
	                  'nama_paketan' => $this->input->post('namapaketan'),
	                  'harga_paketan' => $this->input->post('hargapaketan'),
	                  'satuan_paketan' => $this->input->post('satuanpaketan'),
	                  'status_paketan' =>$this->input->post('statuspaketan'),
	                  'id_ruang' =>$this->input->post('idruangan')
	            );
			$insert_paket = $this->Data_model->insert_paketan($data);

			$id_peralatan = $this->input->post('idperalatan');

			foreach($id_peralatan as $key => $value)
			{
				$dataperalatan = array(
	                  'id_paketan' => $insert_paket,
	                  'id_peralatan' => $id_peralatan[$key]
	            );

	            $this->Data_model->insert_detail_paketan($dataperalatan);

			}

			$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade in" role="alert">Data Berhasil Ditambahkan</div>');
				redirect('admin/paketan');

		}
		else
		{
			$select_ruangan= $this->Data_model->select_ruangan();
			$select_peralatan= $this->Data_model->select_peralatan();
			$data['select_peralatan'] = $select_peralatan->result();
			$data['select_ruangan'] = $select_ruangan->result();

			$this->load->view('admin/paketantambah', $data);
		}
	}
	public function ubah($id_paketan)
	{
		$submit = $this->input->post('submit');
		if(isset($submit))
		{
			$data = array(
	                  'nama_paketan' => $this->input->post('namapaketan'),
	                  'harga_paketan' => $this->input->post('hargapaketan'),
	                  'satuan_paketan' => $this->input->post('satuanpaketan'),
	                  'status_paketan' =>$this->input->post('statuspaketan'),
	                  'id_ruang' =>$this->input->post('idruangan')
	            );
			$this->Data_model->update_paketan($data,$id_paketan);
			$this->Data_model->delete_detailpaketan($id_paketan);

			$id_peralatan = $this->input->post('idperalatan');

			foreach($id_peralatan as $key => $value)
			{
				$dataperalatan = array(
	                  'id_paketan' => $id_paketan,
	                  'id_peralatan' => $id_peralatan[$key]
	            );

	            $this->Data_model->insert_detail_paketan($dataperalatan);

			}

			$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade in" role="alert">Data Berhasil Diubah</div>');
				redirect('admin/paketan');

		}
		else
		{
			$select_ruangan= $this->Data_model->select_ruangan();
			$select_peralatan= $this->Data_model->select_peralatan();
			$select_paketandetail= $this->Data_model->select_paketandetail_get($id_paketan);
			$data['select_paketandetail'] = $select_paketandetail->result();
			$data['select_peralatan'] = $select_peralatan->result();
			$data['select_ruangan'] = $select_ruangan->result();

			$select_paketan= $this->Data_model->select_paketan_get($id_paketan);
			$data['data_paketan'] = $select_paketan->row();
			$this->load->view('admin/paketanubah',$data);
		}
	}

	public function hapus($id_paketan)
	{
		if($this->Data_model->delete_detailpaketan($id_paketan) AND $this->Data_model->delete_paketan($id_paketan))
		{
			$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade in" role="alert">Data Berhasil Dihapus</div>');
				redirect('admin/paketan');
		}
		else
		{
			$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade in" role="alert">Data Gagal Dihapus</div>');
			redirect('admin/paketan');
		}
	}

}