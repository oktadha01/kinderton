<?php
defined('BASEPATH') or exit('No direct script access allowed');

class More_info extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		// $this->load->model('m_dashboard');
	}

	function index()
	{
		$data['_title'] = 'More Info';
		// $data['_script'] = 'more_info/more_info_js';
		$data['_view'] = 'more_info/more_info';
		$this->load->view('layout/index', $data);
	}
	
}
