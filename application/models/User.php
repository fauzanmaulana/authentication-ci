<?php

class User extends CI_model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function login()
    {
        return $this->db->get_where('users', ['email' => $this->input->post('email')])->row_array();
    }

    public function register()
    {
        $data = [
            "username" => $this->input->post('username'),
            "email" => $this->input->post('email'),
            "password" => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
        ];

        $this->db->insert('users', $data);

        return $this->db->get_where('users', ['email' => $data['email']])->result_array();
    }

    public function all()
    {
        return $this->db->get_where('users', ['role' => 'user'])->result_array();
    }
}
