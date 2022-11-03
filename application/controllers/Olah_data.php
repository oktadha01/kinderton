
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Olah_data extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_olah_data');
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->helper('form');
	}

	public function index()
	{
		if ($this->session->userdata("privilage") == 'admin') {
			$data['_title'] = 'Olah Data';
			// $data['_menu'] = 'dashboard'; //for menu
			// $data['_submenu'] = 'dashboard'; //for submenu
			$data['_script'] = 'olah_data/olah_data_js';
			$data['_view'] = 'olah_data/olah_data';
			$data['jenis_produk'] = $this->m_olah_data->m_list_jenis_produk();
			$this->load->view('layout/index', $data);
		} else {
			redirect(base_url(''));
		}
	}

	function jenis_produk()
	{
		$data['_script'] = 'olah_data/olah_data_js';
		$data['_view'] = 'olah_data/jenis_produk';
		$data['jenis_produk'] = $this->m_olah_data->m_list_jenis_produk();
		$this->load->view('olah_data/jenis_produk', $data);
		// $this->load->view('layout/index', $data);
	}

	function foto_produk()
	{
		$data['_script'] = 'olah_data/olah_data_js';
		$data['_view'] = 'olah_data/foto_produk';
		$data['jenis_produk'] = $this->m_olah_data->m_list_jenis_produk();
		$data['foto_produk'] = $this->m_olah_data->m_list_foto_produk();
		$this->load->view('olah_data/foto_produk', $data);
	}

	function select_foto_produk()
	{
		$select_produk = $this->input->post('select-nm-produk');
		// $select_produk = '155';
		$data = $this->m_olah_data->m_select_foto_produk($select_produk);
		echo json_encode($data);
		// echo $select_produk;
	}
	function list_select_foto_produk()
	{
		// $select_produk = $this->input->post('select-nm-produk');
		// $select_produk = '155';
		$data['_script'] = 'olah_data/olah_data_js';
		$data['_view'] = 'olah_data/foto_produk';
		$data['jenis_produk'] = $this->m_olah_data->m_list_jenis_produk();
		$data['foto_produk'] = $this->m_olah_data->m_select_foto_produk();
		$this->load->view('olah_data/foto_produk', $data);
	}

	function form_select_data_jenis_produk()
	{
		$data['_view'] = 'olah_data/select_jenis_produk';
		$this->load->view('olah_data/select_jenis_produk', $data);
	}
	function harga_produk()
	{
		$data['_script'] = 'olah_data/olah_data_js';
		$data['_view'] = 'olah_data/harga_produk';
		$data['harga_produk'] = $this->m_olah_data->m_list_harga_produk();
		$this->load->view('olah_data/harga_produk', $data);
	}


	function simpan_jenis_produk()
	{
		$data = array(
			'nm_jp'  => $this->input->post('nm-jp'),
			'kategori' => $this->input->post('kategori'),
			'gender' => $this->input->post('gender'),
			'desk' => $this->input->post('desk'),
		);

		$data = $this->m_olah_data->m_simpan_jenis_produk($data);
		echo json_encode($data);
	}

	function edit_jenis_produk()
	{
		$id_jp = $this->input->post('id-jp');
		$nm_jp = $this->input->post('nm-jp');
		$kategori = $this->input->post('kategori');
		$gender = $this->input->post('gender');
		$desk = $this->input->post('desk');
		$data = $this->m_olah_data->m_edit_jenis_produk($id_jp, $nm_jp, $kategori, $gender, $desk);
		echo json_encode($data);
		echo 'berhasil';
	}

	function hapus_jenis_produk()
	{
		$id_jp = $this->input->post('id-jp');
		$data = $this->m_olah_data->m_hapus_jenis_produk($id_jp);
		echo json_encode($data);
	}

	function simpan_harga_produk()
	{
		$id_hrg_produk = $this->input->post('id-hrg-produk');
		$status_produk = $this->input->post('status-produk');
		$data = array(
			'id_hrg_produk' => $this->input->post('id-hrg-produk'),
			'hrg_awal' => $this->input->post('hrg-awal'),
			'diskon' => $this->input->post('diskon'),
			'hrg_diskon' => $this->input->post('hrg-diskon'),
			'all_size' => $this->input->post('all-size'),
			'small' => $this->input->post('small'),
			'medium' => $this->input->post('medium'),
			'large' => $this->input->post('large'),
			'extra_large' => $this->input->post('extra-large'),
			'extra2_large' => $this->input->post('extra2-large'),
		);

		$data = $this->m_olah_data->m_simpan_harga_produk($data, $id_hrg_produk, $status_produk);
		echo json_encode($data);
	}

	function edit_harga_produk()
	{
		$id_hrg = $this->input->post('id-hrg');
		$id_hrg_produk = $this->input->post('id-hrg-produk');
		$hrg_awal = $this->input->post('hrg-awal');
		$diskon = $this->input->post('diskon');
		$hrg_diskon = $this->input->post('hrg-diskon');
		$all_size = $this->input->post('all-size');
		$small = $this->input->post('small');
		$medium = $this->input->post('medium');
		$large = $this->input->post('large');
		$extra_large = $this->input->post('extra-large');
		$extra2_large = $this->input->post('extra2-large');
		$status_produk = $this->input->post('status-produk');
		$tgl_akhir_promo = $this->input->post('tgl-akhir-promo');
		$jam_akhir_promo = $this->input->post('jam-akhir-promo');
		$data = $this->m_olah_data->m_edit_harga_produk($id_hrg, $id_hrg_produk, $hrg_awal, $diskon, $hrg_diskon, $all_size, $small, $medium, $large, $extra_large, $extra2_large, $tgl_akhir_promo, $status_produk, $jam_akhir_promo);
		echo json_encode($data);
		echo 'berhasil';
	}
	function hapus_hrg_produk()
	{
		$id_hrg = $this->input->post('id-hrg');
		$data = $this->m_olah_data->m_hapus_hrg_produk($id_hrg);
		echo json_encode($data);
	}
	function simpan_foto_produk()
	{

		$config['upload_path'] = "./upload";
		$config['allowed_types'] = 'gif|jpg|png';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);
		if ($this->upload->do_upload("fot_produk")) {
			$data = array('upload_data' => $this->upload->data());

			$id_fotjp = $this->input->post('id-fotjp');
			$fot_produk = $data['upload_data']['file_name'];
			$texture = $this->input->post('texture');
			$status_foto = $this->input->post('status-foto');

			$result = $this->m_olah_data->m_simpan_foto_produk($id_fotjp, $fot_produk, $texture, $status_foto);
			echo json_decode($result);
		}
	}

	function edit_foto_produk()
	{

		$fotlama = $this->input->post('fotlama');
		unlink('./upload/' . $fotlama);
		$config['upload_path'] = "./upload";
		$config['allowed_types'] = 'gif|jpg|png';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);
		if ($this->upload->do_upload("fot_produk")) {
			$data = array('upload_data' => $this->upload->data());

			$id_fotpro = $this->input->post('id-fotpro');
			$id_fotjp = $this->input->post('id-fotjp');
			$fot_produk = $data['upload_data']['file_name'];
			$texture = $this->input->post('texture');
			$status_foto = $this->input->post('status-foto');

			$result = $this->m_olah_data->m_edit_foto_produk($id_fotpro, $id_fotjp, $fot_produk, $texture, $status_foto, $fotlama);
			echo json_decode($result);
		}
	}

	function edit_fotoproduk()
	{

		$id_fotpro = $this->input->post('id-fotpro');
		$id_fotjp = $this->input->post('id-fotjp');
		$texture = $this->input->post('texture');
		$status_foto = $this->input->post('status-foto');
		$result = $this->m_olah_data->m_edit_fotoproduk($id_fotpro, $id_fotjp, $texture, $status_foto);
		echo json_decode($result);
	}
	function hapus_foto_produk()
	{
		$fotlama = $this->input->post('fotlama');
		unlink('./upload/' . $fotlama);
		$id_fotpro = $this->input->post('id-fotpro');
		$data = $this->m_olah_data->m_hapus_foto_produk($id_fotpro);
		echo json_encode($data);
	}
	function expired_promo()
	{
		$id_jp = $this->input->post('id-jp');
		$result = $this->m_olah_data->m_expired_promo($id_jp);
		echo json_decode($result);
	}
}
