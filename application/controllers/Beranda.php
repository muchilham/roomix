<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Data_model');
	}
	public function index()
	{        
		$data['get_new_katalog']= $this->Data_model->get_new_katalog();

		$this->load->view('header');
		$this->load->view('index', $data);
	}

	public function login()
	{        
		$this->load->view('header');
		$this->load->view('login');
	}

	public function register()
	{        
		$this->load->view('header');
		$this->load->view('register');
	}

	public function histori()
	{        
		$data['get_histori']= $this->Data_model->get_histori($this->session->id_user);

		$this->load->view('header');
		$this->load->view('histori', $data);
	}


	public function historidetail()
	{        
		$this->load->view('header');
		$this->load->view('historidetail');
	}


	public function keranjang()
	{        
		$this->load->view('header');
		$this->load->view('keranjang');
	}


	public function katalog()
	{        

        if (empty($this->input->get("nama")) || null === $this->input->get("nama")) 
        {
        	$data['get_all_katalog']= $this->Data_model->get_all_katalog();
        }
        else
        {
			$data['get_all_katalog']= $this->Data_model->get_search_katalog($this->input->get("nama"));
        }
		$this->load->view('header');
		$this->load->view('katalog',$data);
	}


	public function uploadpembayaran()
	{        
		$this->load->view('header');
		$this->load->view('uploadpembayaran');
	}

	public function LoginHandler()
	{
		$id_user = $this->input->post('iduser');
		$password = $this->input->post('password');
		$temp_account = $this->Data_model->Login($id_user,$password);

		if ($temp_account->num_rows() == 1)
		{
			foreach($temp_account->result() as $key)
			{
				$array_items = array(
					'id_user' => $key->id_user,
					'nama_lengkap' => $key->nama_lengkap,
					'tipe_user' => $key->tipe_user,
					'logged_in' => true
				);
				$this->session->set_userdata($array_items);
			}

			if( $this->session->tipe_user == 0)
			{
				redirect('');
			}
			else
			{
				redirect('./admin/');
			}
		}
		else
		{
			$this->session->set_flashdata('notif', '<div class="waves-effect waves-light btn-large signup-button-nav red darken-1">Login Failed!</div>');
			redirect('');
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('');
	}

	public function RegisterHandler()
	{
		date_default_timezone_set('Asia/jakarta');
		$data = array(
			'id_user' => $this->input->post('iduser'),
			'password' => $this->input->post('password'),
			'nama_lengkap' =>$this->input->post('namalengkap'),
			'email' => $this->input->post('email'),
			'alamat' =>$this->input->post('alamat'),
			'no_telp' =>$this->input->post('notelp')
		);
		if($this->Data_model->insert_user($data))
		{
			$this->session->set_flashdata('notif', '<div class="waves-effect waves-light btn-large signup-button-nav teal lighten-2">Register success!</div>');
			redirect('');
		}
		else
		{
			$this->session->set_flashdata('notif', '<div class="waves-effect waves-light btn-large signup-button-nav red darken-1">Register Failed!</div>');
			redirect('');
		}
	}

	public function AddKeranjangHandler()
	{
		$id = $this->input->post('id');
		$detail = $this->input->post('detail');
		$_SESSION["id".$id] = $id;
		$_SESSION["detail".$id] = $detail;
        echo json_encode(array('msg'=>"Berhasil menambahkan ke keranjang.", 'status'=>true));
	}


	public function DeleteKeranjangHandler($data)
	{
		$datas = explode("%7C",$data);
		$this->session->unset_userdata("id".$datas[0]);
		$this->session->unset_userdata("detail".$datas[1]);
      	redirect("beranda/keranjang/");
	}

	public function BookingHandler()
	{
		date_default_timezone_set('Asia/jakarta');
		$stat = 0;
        $id_max = "";
        $max = $this->Data_model->get_penyewaan();
        foreach($max->result() as $key)
        {
            $id_max = $key->id_penyewaan;
        }

        $nourut = (int) substr($id_max, 3,7);

        $id_penyewaan = "INV" .sprintf('%06s', $nourut + 1);

		$diff  = date_diff(date_create($this->input->post("waktupakai")),date_create($this->input->post("waktuselesai")));
		$data = array(
			"id_penyewaan" => $id_penyewaan,
			"tipe_penyewaan" => 0,
			"waktu_pakai" => $this->input->post("waktupakai"),
			"waktu_selesai" => $this->input->post("waktuselesai"),
			"total_harga_sewa" => $diff->days * $this->input->post("totalbiaya"),
			"waktu_penyewaan" => date("Y-m-d h:i:s"),
			"status_penyewaan" => 1 ,
			"id_user" => $this->session->id_user,
		);

		$this->Data_model->penyewaan($data);

		for ($i=0; $i < 100; $i++) 
	    {
	    	if($this->session->has_userdata("id".$i))
	        {
	        	$details = explode(",", $this->session->userdata("detail".$i));
	        	if($details[4] == 2)
	        	{
	        		$data1 = array(
	        			"id_penyewaan" => $id_penyewaan,
	        			"id_paketan" => $this->session->userdata("id".$i)
	        		);

          			$cek_status_katalog = $this->Data_model->cek_status_katalog($this->session->userdata("id".$i), $this->input->post("waktupakai"),$this->input->post("waktuselesai"))->num_rows();
          			if($cek_status_katalog == 0 )
          			{
          				$_SESSION["status".$i] = 1;
          				$this->Data_model->penyewaan_detail_paketan($data1);
          			}
          			else
          			{
						$stat = 1;
          				$_SESSION["status".$i] = 0;
          			}
	        	}
	        	else if ($details[4] == 1)
	        	{
	        		$data2 = array(
	        			"id_penyewaan" => $id_penyewaan,
	        			"id_peralatan" => $this->session->userdata("id".$i)
	        		);

          			$cek_status_katalog = $this->Data_model->cek_status_katalog($this->session->userdata("id".$i), $this->input->post("waktupakai"),$this->input->post("waktuselesai"))->num_rows();
          			if($cek_status_katalog == 0 )
          			{
          				$_SESSION["status".$i] = 1;
		        		$this->Data_model->penyewaan_detail_nonpaketan($data2);
		        	}
          			else
          			{
						$stat = 1;
          				$_SESSION["status".$i] = 0;
          			}
	        	}
	        	else
	        	{
	        		$data2 = array(
	        			"id_penyewaan" => $id_penyewaan,
	        			"id_ruangan" => $this->session->userdata("id".$i)
	        		);

          			$cek_status_katalog = $this->Data_model->cek_status_katalog($this->session->userdata("id".$i), $this->input->post("waktupakai"),$this->input->post("waktuselesai"))->num_rows();
          			if($cek_status_katalog == 0 )
          			{
          				$_SESSION["status".$i] = 1;
		        		$this->Data_model->penyewaan_detail_nonpaketan($data2);
		        	}
          			else
          			{
						$stat = 1;
          				$_SESSION["status".$i] = 0;
          			}
	        	}
	        }
      	}
      	if($stat == 1)
        {
        	$this->Data_model->delete_penyewaan($id_penyewaan);
        	redirect("beranda/keranjang/");
        }
        else
        {
        	for ($i=0; $i < 100; $i++) 
	    	{
		        $this->session->unset_userdata("id".$i);
		        $this->session->unset_userdata("detail".$i);
		        $this->session->unset_userdata("status".$i);
	    	}
        	redirect("beranda/histori/");
        }
	}

	public function UploadBuktiHandler()
	{
		date_default_timezone_set('Asia/jakarta');
		$this->load->library('upload');
        $nmfile = $_FILES['buktipembayaran']['name'];
        $config['upload_path'] = './assets/img/buktipembayaran/'; //Folder untuk menyimpan hasil upload
        $config['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '40000'; //maksimum besar file 4MB
        $config['max_width']  = ''; 
        $config['max_height']  = '';
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);

        if ($this->upload->do_upload('buktipembayaran'))
        {
			$gbr = $this->upload->data();
			$data = array(
				'id_penyewaan' => $this->input->post('idpenyewaan'),
				'waktu_pembayaran' => date("Y-m-d h:i:s"),
				'bukti_pembayaran' => $gbr['file_name']
			);
			if($this->Data_model->upload_bukti($data))
			{

			}
		}

      	redirect("beranda/histori/");
	}
}
