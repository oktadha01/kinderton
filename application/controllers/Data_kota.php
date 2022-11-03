<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_kota extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		// $this->load->model('m_dashboard');

	}

	public function kota_asal()
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "http://api.rajaongkir.com/starter/city",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: 656279048052809676e144ac54c703ee"
			),
		));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		$data = json_decode($response, true);
		for ($i = 0; $i < count($data['rajaongkir']['results']); $i++) {
			echo "<option></option>";
			echo "<option value='" . $data['rajaongkir']['results'][$i]['city_id'] . "'>" . $data['rajaongkir']['results'][$i]['city_name'] . "</option>";
		}
	}
	public function kota_tujuan()
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "http://api.rajaongkir.com/starter/city",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: 656279048052809676e144ac54c703ee"
			),
		));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		$data = json_decode($response, true);
		for ($i = 0; $i < count($data['rajaongkir']['results']); $i++) {
			echo "<option></option>";
			echo "<option value='" . $data['rajaongkir']['results'][$i]['city_id'] . "'>" . $data['rajaongkir']['results'][$i]['city_name'] . "</option>";
		}
	}
}
