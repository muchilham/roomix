<?php header('Access-Control-Allow-Origin: *'); ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->view('admin/laporan');
	}
}