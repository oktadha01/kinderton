
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_produk extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_detail_produk');
		$this->load->helper('url');
	}

	public function index()
	{
	}

	function data()
	{
		$id = $this->uri->segment(3);
		$data['_title'] = 'Dashboard';
		$data['_menu'] = 'dashboard'; //for menu
		$data['_submenu'] = 'dashboard'; //for submenu
		$data['_script'] = 'detail_produk/detail_produk_js';
		$data['_view'] = 'detail_produk/detail_produk';
		$data['jenis_produk'] = $this->m_detail_produk->m_produk_detail($id);
		$this->load->view('layout/index', $data);
	}
}
