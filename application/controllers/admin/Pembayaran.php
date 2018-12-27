<?php header('Access-Control-Allow-Origin: *'); ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('admin/Data_model');
	}

	public function index()
	{
		$select_pembayaran= $this->Data_model->select_pembayaran();
		$data['select_pembayaran'] = $select_pembayaran->result();

		$this->load->view('admin/pembayaran',$data);
	}
}