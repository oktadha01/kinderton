<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chekout extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('m_chekout');
        $this->load->model('m_favorit');
        $this->load->model('m_olah_data');

        // $this->load->library('form_validation');
        // $this->load->helper('form');
    }

    function cek_ongkir()
    {
        $data['_view'] = 'cek_ongkir/cek_ongkir';
        $data['_script'] = 'cek_ongkir/cek_ongkir_js';
        $this->load->view('cek_ongkir/cek_ongkir', $data);
    }
    function data_addtocart_detail()
    {
        $data['_view'] = 'layout/data_modal/addtocart_detail';
        $this->load->view('layout/data_modal/addtocart_detail', $data);
    }
    function data_addtocart_favorit()
    {
        $data['_view'] = 'layout/data_modal/addtocart_favorit';
        $data['foto_produk'] = $this->m_olah_data->m_list_foto_produk();
        $data['data_favorit'] = $this->m_favorit->m_data_favorit();
        // $this->load->view('layout/modal/favorit/data_favorit', $data);
        $this->load->view('layout/data_modal/addtocart_favorit', $data);
    }

    function addtocart()
    {
        $action = $this->input->post('action');
        $data_user = $this->session->userdata("id_user");
        $id_favorit = $this->input->post('id');
        $kode_chekout = $data_user . $this->input->post('kode_chekout');
        // echo $action;
        $data_favorit = array(
            'user' => $this->session->userdata("id_user"),
            'produk' => $this->input->post('id_produk'),
            'foto_favorit' => $this->input->post('id_foto'),
            'size' => $this->input->post('size'),
            'hrg_favorit' => $this->input->post('id_hrg'),
            'qty' => $this->input->post('qty'),
            'kode_chekout' => $kode_chekout,
            'status_favorit' => 'chekout',

        );

        $data_cart = array(
            'kode_cart' => $kode_chekout,
            'cart_user' => $data_user,
            'tgl_pembayaran' => $this->input->post('tgl_bayar'),
            'jam_pembayaran' => $this->input->post('jam_bayar'),
            'mode_pembayaran' => $this->input->post('nm_bayar'),
            'no_pembayaran' => $this->input->post('no_bayar'),
            'total_produk' => $this->input->post('total_produk'),
            'total_barang' => $this->input->post('total_barang'),
            'berat' => $this->input->post('berat'),
            'kurir' => $this->input->post('kurir'),
            'pelayanan' => $this->input->post('pelayanan'),
            'etd' => $this->input->post('etd'),
            'ongkir' => $this->input->post('ongkir'),
            'subtotal' => $this->input->post('subtotal'),
            'total_pembayaran' => $this->input->post('total_bayar'),
            'status_pembayaran' => 'Belum Bayar',
        );
        $this->m_chekout->m_simpan_pesanan($id_favorit, $kode_chekout, $data_cart, $action, $data_favorit);
        // $this->m_chekout->m_simpan_pesanan($action);

        // echo 1;
        exit;
    }

    function vali_pesanan()
    {
        $data['_view'] = 'olah_data/vali_pesanan';
        $data['vali_pesanan'] = $this->m_chekout->m_vali_pesanan();
        $this->load->view('olah_data/vali_pesanan', $data);
    }
    function detail_vali_pesanan()
    {
        $data['_view'] = 'olah_data/detail_vali_pesanan';
        $this->load->view('olah_data/detail_vali_pesanan', $data);
    }

    function acc_pesanan()
    {
        $kode_cart = $this->input->post('kode-cart');
        $jam_kirim = $this->input->post('jam-kirim');
        $etd_kirim = $this->input->post('etd-kirim');
        $no_resi = $this->input->post('no-resi');
        $ket_tolak = $this->input->post('ket-tolak');
        $status_pembayaran = $this->input->post('status-pembayaran');
        $this->m_chekout->m_acc_pesanan($kode_cart, $status_pembayaran, $jam_kirim, $etd_kirim, $no_resi, $ket_tolak);
    }
    function hapus_data_pesanan()
    {
        $kode_pesanan = $this->input->post('kode-pesanan');
        $foto_bukti = $this->input->post('foto-bukti');
		unlink('./upload/bukti_transfer/' . $foto_bukti);
        $this->m_chekout->m_hapus_data_pesanan($kode_pesanan);
    }

    function notif_vali_pesanan()
    {
        $sql = "SELECT * FROM cart WHERE status_pembayaran = 'Sudah Bayar' OR status_pembayaran = 'Dikemas'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
        } else {
        }
        echo json_encode($query->num_rows());
?>
        <script>
            if (<?= $query->num_rows(); ?> == '0') {
                $('.notif-pesanan').text('');
            } else {
                // $('.notif-pesanan').removeAttr('hidden', true);
            }
        </script>
    <?php
    }
    function notif_pesanan_dikirim()
    {
        $sql = "SELECT * FROM cart WHERE status_pembayaran = 'Dikirim'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
        } else {
        }
        echo json_encode($query->num_rows());
    ?>
        <script>
            if (<?= $query->num_rows(); ?> == '0') {
                $('.notif-pesanan_dikirim').text('');
            } else {
                // $('.notif-pesanan').removeAttr('hidden', true);
            }
        </script>
<?php
    }
    function pesanan_dikirim()
    {
        $data['_view'] = 'olah_data/pesanan_dikirim';
        $data['pesanan_dikirim'] = $this->m_chekout->m_pesanan_dikirim();
        $this->load->view('olah_data/pesanan_dikirim', $data);
    }

    function selesai_dikirim()
    {
        $kode_pesanan = $this->input->post('kode-pesanan');
        $this->m_chekout->m_selesai_dikirim($kode_pesanan);
        exit;
    }
    function riwayat_pesanan()
    {
        $data['_view'] = 'olah_data/riwayat_pesanan';
        $data['riwayat_pesanan'] = $this->m_chekout->m_riwayat_pesanan();
        $this->load->view('olah_data/riwayat_pesanan', $data);
    }

    function jumlah_brg_terjual()
    {
        // $data_user = $this->session->userdata("id_user");

    }
}
