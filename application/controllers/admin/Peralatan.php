<?php header('Access-Control-Allow-Origin: *'); ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Peralatan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('admin/Data_model');
	}

	public function index()
	{
		$select_peralatan= $this->Data_model->select_peralatan();
		$data['select_peralatan'] = $select_peralatan->result();

		$this->load->view('admin/peralatan',$data);
	}
	public function tambah()
	{
	    date_default_timezone_set('Asia/jakarta');
		$submit = $this->input->post('submit');
		if(isset($submit))
		{
    		$this->load->library('upload');
            $nmfile1 = $_FILES['gambarperalatan1']['name'];
            $config['upload_path'] = './assets/img/katalog/'; //Folder untuk menyimpan hasil upload
            $config['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '40000'; //maksimum besar file 4MB
            $config['max_width']  = ''; 
            $config['max_height']  = '';
            $config['file_name'] = $nmfile1; //nama yang terupload nantinya
            $this->upload->initialize($config);
            $this->upload->do_upload('gambarperalatan1');
			$gbr1 = $this->upload->data();
            
            $nmfile2 = $_FILES['gambarperalatan2']['name'];
            $config['upload_path'] = './assets/img/katalog/'; //Folder untuk menyimpan hasil upload
            $config['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '40000'; //maksimum besar file 4MB
            $config['max_width']  = ''; 
            $config['max_height']  = '';
            $config['file_name'] = $nmfile2; //nama yang terupload nantinya
            $this->upload->initialize($config);
            $this->upload->do_upload('gambarperalatan2');
			$gbr2 = $this->upload->data();

			$nmfile3 = $_FILES['gambarperalatan3']['name'];
            $config['upload_path'] = './assets/img/katalog/'; //Folder untuk menyimpan hasil upload
            $config['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '40000'; //maksimum besar file 4MB
            $config['max_width']  = ''; 
            $config['max_height']  = '';
            $config['file_name'] = $nmfile3; //nama yang terupload nantinya
            $this->upload->initialize($config);
            $this->upload->do_upload('gambarperalatan3');
			$gbr3 = $this->upload->data();

			$nmfile4 = $_FILES['gambarperalatan4']['name'];
            $config['upload_path'] = './assets/img/katalog/'; //Folder untuk menyimpan hasil upload
            $config['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '40000'; //maksimum besar file 4MB
            $config['max_width']  = ''; 
            $config['max_height']  = '';
            $config['file_name'] = $nmfile4; //nama yang terupload nantinya
            $this->upload->initialize($config);
            $this->upload->do_upload('gambarperalatan4');
			$gbr4 = $this->upload->data();

			$nmfile5 = $_FILES['gambarperalatan5']['name'];
            $config['upload_path'] = './assets/img/katalog/'; //Folder untuk menyimpan hasil upload
            $config['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '40000'; //maksimum besar file 4MB
            $config['max_width']  = ''; 
            $config['max_height']  = '';
            $config['file_name'] = $nmfile5; //nama yang terupload nantinya
            $this->upload->initialize($config);
            $this->upload->do_upload('gambarperalatan5');
			$gbr5 = $this->upload->data();
            
            
			$data = array(
	                  'nama_peralatan' => $this->input->post('namaperalatan'),
	                  'deskripsi_peralatan' => $this->input->post('deskripsiperalatan'),
	                  'harga_peralatan' => $this->input->post('hargaperalatan'),
	                  'satuan_peralatan' => $this->input->post('satuanperalatan'),
	                  'stok_peralatan' => $this->input->post('stokperalatan'),
	                  'status_peralatan' =>$this->input->post('statusperalatan'),
	                  'gambar_peralatan_1' => $gbr1['file_name']."|".$gbr2['file_name']."|".$gbr3['file_name'],
	                  'gambar_peralatan_2' => $gbr4['file_name']."|".$gbr5['file_name'],
	            );

			if($this->Data_model->insert_peralatan($data))
			{
				$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade in" role="alert">Data Berhasil Ditambahkan</div>');
				redirect('admin/peralatan');
			}
			else
			{
				$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade in" role="alert">Data Gagal Ditambahkan</div>');
				redirect('admin/peralatan');
			}

		}
		else
		{
			$this->load->view('admin/peralatantambah');
		}
	}
	public function ubah($id_peralatan)
	{
		$submit = $this->input->post('submit');
		if(isset($submit))
		{
		    
    		$this->load->library('upload');
            $nmfile1 = $_FILES['gambarperalatan1']['name'];
            $config['upload_path'] = './assets/img/katalog/'; //Folder untuk menyimpan hasil upload
            $config['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '40000'; //maksimum besar file 4MB
            $config['max_width']  = ''; 
            $config['max_height']  = '';
            $config['file_name'] = $nmfile1; //nama yang terupload nantinya
            $this->upload->initialize($config);
            $this->upload->do_upload('gambarperalatan1');
			$gbr1 = $this->upload->data();
            
            $nmfile2 = $_FILES['gambarperalatan2']['name'];
            $config['upload_path'] = './assets/img/katalog/'; //Folder untuk menyimpan hasil upload
            $config['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '40000'; //maksimum besar file 4MB
            $config['max_width']  = ''; 
            $config['max_height']  = '';
            $config['file_name'] = $nmfile2; //nama yang terupload nantinya
            $this->upload->initialize($config);
            $this->upload->do_upload('gambarperalatan2');
			$gbr2 = $this->upload->data();
			
			$data = array(
	                  'nama_peralatan' => $this->input->post('namaperalatan'),
	                  'deskripsi_peralatan' => $this->input->post('deskripsiperalatan'),
	                  'harga_peralatan' => $this->input->post('hargaperalatan'),
	                  'satuan_peralatan' => $this->input->post('satuanperalatan'),
	                  'stok_peralatan' => $this->input->post('stokperalatan'),
	                  'status_peralatan' =>$this->input->post('statusperalatan'),
	                  'gambar_peralatan_1' => $gbr1['file_name'],
	                  'gambar_peralatan_2' => $gbr2['file_name'],
	            );

			if($this->Data_model->update_peralatan($data,$id_peralatan))
			{
				$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade in" role="alert">Data Berhasil Diubah</div>');
				redirect('admin/peralatan');
			}
			else
			{
				$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade in" role="alert">Data Tidak Berhasil Diubah</div>');
				redirect('admin/peralatan');
			}

		}
		else
		{
			$select_peralatan= $this->Data_model->select_peralatan_get($id_peralatan);
			$data['data_peralatan'] = $select_peralatan->row();
			$this->load->view('admin/peralatanubah',$data);
		}
	}

	public function hapus($id_peralatan)
	{
		if($this->Data_model->delete_peralatan($id_peralatan))
		{
			$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade in" role="alert">Data Berhasil Dihapus</div>');
				redirect('admin/peralatan');
		}
		else
		{
			$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade in" role="alert">Data Gagal Dihapus</div>');
			redirect('admin/peralatan');
		}
	}

}