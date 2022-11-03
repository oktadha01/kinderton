<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_produk');
        $this->load->helper('url');
    }

    function gender()
    {
        $get_data = $this->uri->segment(3);
        $data['_title'] = 'Produk';
        $data['_script'] = 'produk/produk_js';
        $data['_view'] = 'produk/produk';
        $data['data_produk'] = $this->m_produk->m_data_produk($get_data);
        $this->load->view('layout/index', $data);
    }
    function category()
    {
        $get_data = $this->uri->segment(3);
        $data['_title'] = 'Produk';
        $data['_script'] = 'produk/produk_js';
        $data['_view'] = 'produk/produk';
        $data['data_produk'] = $this->m_produk->m_category($get_data);
        $this->load->view('layout/index', $data);
    }
    function unisex()
    {
        // $get_data = $this->uri->segment(3);
        $data['_title'] = 'Produk';
        $data['_script'] = 'produk/produk_js';
        $data['_view'] = 'produk/produk';
        $data['data_produk'] = $this->m_produk->m_unisex();
        $this->load->view('layout/index', $data);
    }
}
