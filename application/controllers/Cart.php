<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('m_cart');
        // $this->load->helper('nohp');
        // panggil library text
        // $this->load->helper('text');
        // panggil library text
        // $this->load->library('user_agent');
        // $this->load->library('form_validation');
        // $this->load->helper('form');
    }
    function data_cart()
    {

        $data['cart_blmbyr'] = $this->m_cart->m_data_cart_blmbyr();
        $data['cart_sdhbyr'] = $this->m_cart->m_data_cart_sdhbyr();
        $data['cart_brgkms'] = $this->m_cart->m_data_cart_brgkms();
        $data['cart_dikirim'] = $this->m_cart->m_data_cart_dikirim();
        $data['cart_selesai_dikirim'] = $this->m_cart->m_data_cart_selesai_dikirim();
        // $data['cart_riwayat_pesanan'] = $this->m_cart->m_data_cart_riwayat_pesanan();
        $data['_view'] = 'layout/data_modal/cart';
        $this->load->view('layout/data_modal/cart', $data);
    }

    function notif_cart()
    {
        $data_user = $this->session->userdata("id_user");
        $sql = "SELECT * FROM cart WHERE cart_user = $data_user AND status_pembayaran IN ('Belum Bayar','Sudah Bayar','Dikemas','Dikirim') 
        -- AND status_pembayaran = 'Belum Bayar'
        -- AND status_pembayaran = 'Sudah Bayar'
        -- AND status_pembayaran = 'Dikemas'
        -- AND status_pembayaran = 'Dikirim'
        ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
        } else {
        }
        echo json_encode($query->num_rows());
?>
        <script>
            if (<?= $query->num_rows(); ?> == '0') {
                $('.notif-cart').attr('hidden', true);
            } else {
                $('.notif-cart').removeAttr('hidden', true);
            }
        </script>
    <?php
    }
    function expired_cart()
    {
        $kode_cart = $this->input->post('kode_cart');
        $this->m_cart->m_expired_cart($kode_cart);
        exit;
    }
    function notif_blm_byr()
    {
        $data_user = $this->session->userdata("id_user");
        $sql = "SELECT * FROM cart WHERE cart_user = $data_user AND status_pembayaran = 'Belum Bayar'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
        } else {
        }
        echo json_encode($query->num_rows());
    ?>
        <script>
            if (<?= $query->num_rows(); ?> == '0') {
                $('.notifblmbyr').attr('hidden', true);
            } else {
                $('.notifblmbyr').removeAttr('hidden', true);
            }
        </script>
    <?php
    }
    function notif_sdh_byr()
    {
        $data_user = $this->session->userdata("id_user");
        $sql = "SELECT * FROM cart WHERE cart_user = $data_user AND status_pembayaran = 'Sudah Bayar'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
        } else {
        }
        echo json_encode($query->num_rows());
    ?>
        <script>
            if (<?= $query->num_rows(); ?> == '0') {
                $('.notifsdhbyr').attr('hidden', true);
            } else {
                $('.notifsdhbyr').removeAttr('hidden', true);
            }
        </script>
    <?php
    }
    function notif_brg_kms()
    {
        $data_user = $this->session->userdata("id_user");
        $sql = "SELECT * FROM cart WHERE cart_user = $data_user AND status_pembayaran = 'Dikemas'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
        } else {
        }
        echo json_encode($query->num_rows());
    ?>
        <script>
            if (<?= $query->num_rows(); ?> == '0') {
                $('.notifbrgkms').attr('hidden', true);
            } else {
                $('.notifbrgkms').removeAttr('hidden', true);
            }
        </script>
    <?php
    }
    function notif_dikirim()
    {
        $data_user = $this->session->userdata("id_user");
        $sql = "SELECT * FROM cart WHERE cart_user = $data_user AND status_pembayaran = 'Dikirim'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
        } else {
        }
        echo json_encode($query->num_rows());
    ?>
        <script>
            if (<?= $query->num_rows(); ?> == '0') {
                $('.notifdikirim').attr('hidden', true);
            } else {
                $('.notifdikirim').removeAttr('hidden', true);
            }
        </script>
<?php
    }

    function simpan_bukti_transfer()
    {
        $tgl_byr        = mktime(0, 0, 0, date("n"), date("j"));
        $convert_tgl_tgl_byr        = date("m-d-Y", $tgl_byr);
        $config['upload_path'] = "./upload/bukti_transfer";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload("foto-bukti")) {
            $data = array('upload_data' => $this->upload->data());
            $kode_pembayaran = $this->input->post('kode-pesanan');
            $data_upload_bukti = array(

                'kode_pesanan'  => $this->input->post('kode-pesanan'),
                'an_pengirim'       => $this->input->post('an-pengirim'),
                'nominal'       => $this->input->post('nominal'),
                'bank'          => $this->input->post('bank'),
                'foto_bukti'    => $data['upload_data']['file_name'],
                'tgl_byr'          => $convert_tgl_tgl_byr,
            );

            $result = $this->m_cart->m_simpan_bukti_transfer($data_upload_bukti, $kode_pembayaran);
            echo json_decode($result);
        }
    }
}
