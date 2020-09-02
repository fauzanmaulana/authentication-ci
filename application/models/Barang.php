<?php

class Barang extends CI_model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function all()
    {
        return $this->db->from('barang')
          ->join('users', 'users.id=barang.user_id')
          ->get()
          ->result_array();
    }

    public function getMyBid($user_id)
    {
        return $this->db->get_where('barang', ['user_id' => $user_id])->result_array();
    }

    public function detailbid($id)
    {
        return $this->db->get_where('barang', ['id' => $id])->result_array();
    }


    public function updatebid($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('barang', $data);
    }

    public function deletebid($id)
    {
        return $this->db->delete('barang', ['id' => $id]);
    }
}
