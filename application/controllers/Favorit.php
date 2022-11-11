<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Favorit extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_favorit');
        $this->load->model('m_olah_data');

        // $this->load->library('form_validation');
        $this->load->helper('url');
        // $this->load->helper('form');
    }
    function data_favorit()
    {
        // $script['_script'] = 'layout/data_modal/addtocart_favorit_js';
        $data['_view'] = 'layout/data_modal/addtocart_favorit';
        $data['foto_produk'] = $this->m_olah_data->m_list_foto_produk();
        $data['data_favorit'] = $this->m_favorit->m_data_favorit();
        $this->load->view('layout/data_modal/addtocart_favorit', $data);
        // $this->load->view('layout/index', $script);
    }

    function select_favorit()
    {
        $data['_view'] = 'layout/nav_bottom/addto_favorit';
        $this->load->view('layout/nav_bottom/addto_favorit', $data);
    }

    function simpan_favorit()
    {
        $data_user = $this->session->userdata("id_user");
        $produk = $this->input->post('produk');
        $foto = $this->input->post('foto');
        $size = $this->input->post('size');
        $cek = $this->db->query("SELECT * FROM favorit where user='$data_user' AND produk='$produk' AND foto_favorit='$foto' AND size='$size' AND status_favorit=''");
        if ($cek->num_rows() == 1) {
            echo "Barang Sudah Ada Di Favorit";
            // redirect('opd/laporan', 'refresh');
        } else {
            // echo "Data berhasil di input,..";
            $data = array(
                'user' => $this->input->post('user'),
                'produk' => $this->input->post('produk'),
                'foto_favorit' => $this->input->post('foto'),
                'size' => $this->input->post('size'),
                'hrg_favorit' => $this->input->post('harga'),
                'qty' => $this->input->post('qty'),
            );

            $data = $this->m_favorit->m_simpan_favorit($data, $produk);
            // echo json_encode($data);
        }
    }

    function edit_favorit()
    {
        $action = $this->input->post('action');
        if ($action == 'size-harga') {
            // echo 'size';
            $data = array(
                'id_favorit' => $this->input->post('id_favorit'),
                'size' => $this->input->post('size'),
                'hrg_favorit' => $this->input->post('hrg_favorit'),
            );
            $data = $this->m_favorit->m_edit_favorit($data, $action);
        } else if ($action == 'qty') {
            // echo 'foto';
            $data = array(
                'id_favorit' => $this->input->post('id_favorit'),
                'qty' => $this->input->post('qty'),
            );
            $data = $this->m_favorit->m_edit_favorit($data, $action);
        } else {
            // echo 'foto';
            $data = array(
                'id_favorit' => $this->input->post('id_favorit'),
                'foto_favorit' => $this->input->post('foto_favorit'),
            );
            $data = $this->m_favorit->m_edit_favorit($data, $action);
        }
    }
    function hapus_data_favorit()
    {
        $id_favorit = $this->input->post('id-favorit');
        $data = $this->m_favorit->m_hapus_data_favorit($id_favorit);
        echo json_encode($data);
    }
    function notif_favorit()
    {
        $data_user = $this->session->userdata("id_user");
        $sql = "SELECT * FROM favorit WHERE user = $data_user AND status_favorit = ''";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
        } else {
        }
        echo json_encode($query->num_rows());
?>
        <script>
            if (<?= $query->num_rows(); ?> == '0') {
                $('#notif-favorit').attr('hidden', true);
            } else {
                $('#notif-favorit').removeAttr('hidden', true);
            }
        </script>
<?php
    }
}
