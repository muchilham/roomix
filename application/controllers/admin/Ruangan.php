<?php header('Access-Control-Allow-Origin: *'); ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ruangan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('admin/Data_model');
	}

	public function index()
	{
		$select_ruangan= $this->Data_model->select_ruangan();
		$data['select_ruangan'] = $select_ruangan->result();

		$this->load->view('admin/ruangan',$data);
	}
	public function tambah()
	{
		$submit = $this->input->post('submit');
		if(isset($submit))
		{
    		$this->load->library('upload');
            $nmfile1 = $_FILES['gambarruangan1']['name'];
            $config1['upload_path'] = './assets/img/katalog/'; //Folder untuk menyimpan hasil upload
            $config1['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
            $config1['max_size'] = '40000'; //maksimum besar file 4MB
            $config1['max_width']  = ''; 
            $config1['max_height']  = '';
            $config1['file_name'] = $nmfile1; //nama yang terupload nantinya
            $this->upload->initialize($config1);
            $this->upload->do_upload('gambarruangan1');
			$gbr1 = $this->upload->data();
            
            $nmfile2 = $_FILES['gambarruangan2']['name'];
            $config2['upload_path'] = './assets/img/katalog/'; //Folder untuk menyimpan hasil upload
            $config2['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
            $config2['max_size'] = '40000'; //maksimum besar file 4MB
            $config2['max_width']  = ''; 
            $config2['max_height']  = '';
            $config2['file_name'] = $nmfile2; //nama yang terupload nantinya
            $this->upload->initialize($config2);
            $this->upload->do_upload('gambarruangan2');
			$gbr2 = $this->upload->data();


            $nmfile3 = $_FILES['gambarruangan3']['name'];
            $config3['upload_path'] = './assets/img/katalog/'; //Folder untuk menyimpan hasil upload
            $config3['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
            $config3['max_size'] = '40000'; //maksimum besar file 4MB
            $config3['max_width']  = ''; 
            $config3['max_height']  = '';
            $config3['file_name'] = $nmfile3; //nama yang terupload nantinya
            $this->upload->initialize($config3);
            $this->upload->do_upload('gambarruangan3');
			$gbr3 = $this->upload->data();


            $nmfile4 = $_FILES['gambarruangan4']['name'];
            $config4['upload_path'] = './assets/img/katalog/'; //Folder untuk menyimpan hasil upload
            $config4['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
            $config4['max_size'] = '40000'; //maksimum besar file 4MB
            $config4['max_width']  = ''; 
            $config4['max_height']  = '';
            $config4['file_name'] = $nmfile4; //nama yang terupload nantinya
            $this->upload->initialize($config4);
            $this->upload->do_upload('gambarruangan4');
			$gbr4 = $this->upload->data();


            $nmfile5 = $_FILES['gambarruangan5']['name'];
            $config5['upload_path'] = './assets/img/katalog/'; //Folder untuk menyimpan hasil upload
            $config5['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
            $config5['max_size'] = '40000'; //maksimum besar file 4MB
            $config5['max_width']  = ''; 
            $config5['max_height']  = '';
            $config5['file_name'] = $nmfile5; //nama yang terupload nantinya
            $this->upload->initialize($config5);
            $this->upload->do_upload('gambarruangan5');
			$gbr5 = $this->upload->data();
			
			$data = array(
	                  'nama_ruangan' => $this->input->post('namaruangan'),
	                  'deskripsi_ruangan' => $this->input->post('deskripsiruangan'),
	                  'harga_ruangan' => $this->input->post('hargaruangan'),
	                  'satuan_ruangan' => $this->input->post('satuanruangan'),
	                  'kapasitas_ruangan' => $this->input->post('kapasitasruangan'),
	                  'status_ruangan' =>$this->input->post('statusruangan'),
	                  'gambar_ruangan_1' => $gbr1['file_name']."|".$gbr2['file_name']."|".$gbr3['file_name'],
	                  'gambar_ruangan_2' => $gbr4['file_name']."|".$gbr5['file_name'],
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
	public function ubah($id_ruangan)
	{
		$submit = $this->input->post('submit');
		if(isset($submit))
		{
		    
    		$this->load->library('upload');
            $nmfile1 = $_FILES['gambarruangan1']['name'];
            $config1['upload_path'] = './assets/img/katalog/'; //Folder untuk menyimpan hasil upload
            $config1['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
            $config1['max_size'] = '40000'; //maksimum besar file 4MB
            $config1['max_width']  = ''; 
            $config1['max_height']  = '';
            $config1['file_name'] = $nmfile1; //nama yang terupload nantinya
            $this->upload->initialize($config1);
            $this->upload->do_upload('gambarruangan1');
			$gbr1 = $this->upload->data();
            
            $nmfile2 = $_FILES['gambarruangan2']['name'];
            $config2['upload_path'] = './assets/img/katalog/'; //Folder untuk menyimpan hasil upload
            $config2['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
            $config2['max_size'] = '40000'; //maksimum besar file 4MB
            $config2['max_width']  = ''; 
            $config2['max_height']  = '';
            $config2['file_name'] = $nmfile2; //nama yang terupload nantinya
            $this->upload->initialize($config2);
            $this->upload->do_upload('gambarruangan2');
			$gbr2 = $this->upload->data();


            $nmfile3 = $_FILES['gambarruangan3']['name'];
            $config3['upload_path'] = './assets/img/katalog/'; //Folder untuk menyimpan hasil upload
            $config3['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
            $config3['max_size'] = '40000'; //maksimum besar file 4MB
            $config3['max_width']  = ''; 
            $config3['max_height']  = '';
            $config3['file_name'] = $nmfile3; //nama yang terupload nantinya
            $this->upload->initialize($config3);
            $this->upload->do_upload('gambarruangan3');
			$gbr3 = $this->upload->data();


            $nmfile4 = $_FILES['gambarruangan4']['name'];
            $config4['upload_path'] = './assets/img/katalog/'; //Folder untuk menyimpan hasil upload
            $config4['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
            $config4['max_size'] = '40000'; //maksimum besar file 4MB
            $config4['max_width']  = ''; 
            $config4['max_height']  = '';
            $config4['file_name'] = $nmfile4; //nama yang terupload nantinya
            $this->upload->initialize($config4);
            $this->upload->do_upload('gambarruangan4');
			$gbr4 = $this->upload->data();


            $nmfile5 = $_FILES['gambarruangan5']['name'];
            $config5['upload_path'] = './assets/img/katalog/'; //Folder untuk menyimpan hasil upload
            $config5['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
            $config5['max_size'] = '40000'; //maksimum besar file 4MB
            $config5['max_width']  = ''; 
            $config5['max_height']  = '';
            $config5['file_name'] = $nmfile5; //nama yang terupload nantinya
            $this->upload->initialize($config5);
            $this->upload->do_upload('gambarruangan5');
			$gbr5 = $this->upload->data();
			
			$data = array(
	                  'nama_ruangan' => $this->input->post('namaruangan'),
	                  'deskripsi_ruangan' => $this->input->post('deskripsiruangan'),
	                  'harga_ruangan' => $this->input->post('hargaruangan'),
	                  'satuan_ruangan' => $this->input->post('satuanruangan'),
	                  'kapasitas_ruangan' => $this->input->post('kapasitasruangan'),
	                  'status_ruangan' =>$this->input->post('statusruangan'),
	                  'gambar_ruangan_1' => $gbr1['file_name']."|".$gbr2['file_name']."|".$gbr3['file_name'],
	                  'gambar_ruangan_2' => $gbr4['file_name']."|".$gbr5['file_name'],
	            );

			if($this->Data_model->update_ruangan($data,$id_ruangan))
			{
				$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade in" role="alert">Data Berhasil Diubah</div>');
				redirect('admin/ruangan');
			}
			else
			{
				$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade in" role="alert">Data Tidak Berhasil Diubah</div>');
				redirect('admin/ruangan');
			}

		}
		else
		{
			$select_ruangan= $this->Data_model->select_ruangan_get($id_ruangan);
			$data['data_ruangan'] = $select_ruangan->row();
			$this->load->view('admin/ruanganubah',$data);
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