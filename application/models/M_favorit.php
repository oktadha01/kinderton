<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_favorit extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    function m_simpan_favorit($data)
    {
        // Query insert tempatkan disini,... 
        $result = $this->db->insert('favorit', $data);
        return $result;
    }
    function m_edit_favorit($data, $action)
    {

        if ($action == 'size-harga') {
            $this->db->set('size', $data['size'])
                ->set('hrg_favorit', $data['hrg_favorit'])
                ->where('id_favorit', $data['id_favorit'])
                ->update('favorit');
            return true;
        } else if ($action == 'qty') {
            $this->db->set('qty', $data['qty'])
                ->where('id_favorit', $data['id_favorit'])
                ->update('favorit');
            return true;
        } else {
            $this->db->set('foto_favorit', $data['foto_favorit'])
                ->where('id_favorit', $data['id_favorit'])
                ->update('favorit');
            return true;
        }
    }

    function m_hapus_data_favorit($id_favorit)
    {
        $foto = $this->db->query("DELETE FROM favorit WHERE id_favorit='$id_favorit'");
        return $foto;
    }

    function m_data_favorit()
    {
        $data_user = $this->session->userdata("id_user");

        $this->db->select('*');
        $this->db->from('favorit');
        $this->db->where('user', $data_user);
        $this->db->where('status_favorit', '');
        $this->db->join('jenis_produk', 'jenis_produk.id_jp = favorit.produk');
        $this->db->join('foto_produk', 'foto_produk.id_fotpro = favorit.foto_favorit');
        $this->db->join('harga_produk', 'harga_produk.id_hrg = favorit.hrg_favorit');
        $this->db->order_by('id_favorit', 'desc');
        $query = $this->db->get();
        return $query->result();
        // $usersquery = $this->db->get();

        // $usersResult = $usersquery->result_array();

        // return $usersResult;
    }
}
