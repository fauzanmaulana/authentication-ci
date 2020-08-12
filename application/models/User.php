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
        $this->db->where('email', 'fauzan@mail.com');
        $email =  $this->db->get('users')->result_array();
        if(!$email){
            return "email salah";
        }
        return "email bener";
    }

    public function register()
    {
        $data = [
            "username" => $this->input->post('username'),
            "email" => $this->input->post('email'),
            "password" => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
        ];

        $this->db->insert('users', $data);

        $this->db->where('email', $data['email']);
        return $this->db->get('users')->result_array();
    }
}
