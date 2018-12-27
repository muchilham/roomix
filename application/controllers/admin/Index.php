<?php header('Access-Control-Allow-Origin: *'); ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('admin/Data_model');
	}

	public function index()
	{
		$this->load->view('admin/index');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('..');
	}

}