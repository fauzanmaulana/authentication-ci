<?php

class Main extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('User');
    }

    public function login()
    {
        $data['title'] = 'login';
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');

        if(!$this->form_validation->run()){
            $this->load->view('base/header', $data);
            $this->load->view('auth/login');
            $this->load->view('base/footer');
        }else{
            $this->session->set_userdata('user', $this->User->register());
            redirect('/');
        }
    }

    public function register()
    {
        $data['title'] = 'register';
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');

        if(!$this->form_validation->run()){
            $this->load->view('base/header', $data);
            $this->load->view('auth/register');
            $this->load->view('base/footer');
        }else{
            $this->session->set_userdata('user', $this->User->register());
            redirect('/');
        }
    }
    
    public function home()
    {
        if(!$this->session->has_userdata('user')){
            redirect('main/login');
        }

        $data['title'] = 'home';
        $data['users'] = $this->session->userdata('user');

        $this->load->view('base/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('base/footer');
    }
}
