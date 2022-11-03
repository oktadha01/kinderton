
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_produk extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		// $this->load->model('Dashboard_model');
	}

	public function index()
	{
		// $data['_script'] = 'olah_data/olah_data_js';
		$data['_view'] = 'jenis_produk/jenis_produk';
		$this->load->view('layout/index', $data);
	}
}