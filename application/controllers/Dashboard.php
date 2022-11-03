<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_dashboard');
	}

	function index()
	{
		$data['_title'] = 'Dashboard';
		// $data['_menu'] = 'dashboard'; //for menu
		// $data['_submenu'] = 'dashboard'; //for submenu
		$data['_script'] = 'dashboard/index_js';
		$data['_view'] = 'dashboard/index';
		// $data['data_produk'] = $this->m_dashboard->m_produk_dashboard();
		$this->load->view('layout/index', $data);
	}
	function data_dashboard()
	{
		$data['_view'] = 'dashboard/data_dashboard';
		$this->load->view('dashboard/data_dashboard', $data);
	}
	function foto_nav()
	{
		$data['_view'] = 'layout/foto_resp_nav';
		$this->load->view('layout/foto_resp_nav', $data);
	}
}
