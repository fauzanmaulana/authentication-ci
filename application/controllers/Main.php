<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Main extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(['url', 'file', 'form']);
        $this->load->model(['User', 'Barang']);
    }

    public function login()
    {
        $data['title'] = 'login';
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if(!$this->form_validation->run()){
            $this->load->view('base/header', $data);
            $this->load->view('auth/login');
            $this->load->view('base/footer');
        }else{
            if(!$this->User->login()){
                $this->session->set_flashdata('message', 'email tidak sesuai');
                redirect('main/login');
            }else{
                if(password_verify($this->input->post('password'), $this->User->login()['password'])){
                    $this->session->set_userdata('user', [$this->User->login()]);
                    redirect('/');
                }else{
                    $this->session->set_flashdata('message', 'password tidak sesuai');
                    // redirect('main/login');
                }
            }
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
        
        if($this->session->userdata('user')[0]['role'] === 'admin'){
            $data['title'] = 'dashboard';
            $data['role'] = $this->session->userdata('user')[0]['role'];
            $data['users'] = $this->session->userdata('user');
            $data['barang'] = $this->Barang->all();
            $data['allusers'] = $this->User->all();
            $this->views('admin', $data);
        }else{
            $data['title'] = 'home';
            $data['role'] = $this->session->userdata('user')[0]['role'];
            $data['users'] = $this->session->userdata('user');
            $data['barang'] = $this->Barang->all();
            $this->views('index', $data);
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user');
        redirect('main/login');
    }

    public function createbit()
    {
        $data['title'] = 'create';
        $data['role'] = $this->session->userdata('user')[0]['role'];
        $data['users'] = $this->session->userdata('user');
        $this->views('create', $data);
    }

    public function createbitprocess()
    {
        $gambar = $_FILES['gambar']['name'];
        $config['upload_path'] = './assets/barang';
        $config['allowed_types'] = 'jpg|png|gif';

        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('gambar')) {
            echo "gagal";
            die();
        } else {
            $gambar = $this->upload->data('file_name');
        }

        $data = [
            'judul' => $this->input->post('judul'),
            'description' => $this->input->post('description'),
            'harga' => $this->input->post('harga'),
            'gambar' => $gambar,
            'user_id' => $this->session->userdata('user')[0]['id']
        ];

        $this->db->insert('barang', $data);

        redirect('main/home');
    }

    public function mybid()
    {
        $data['title'] = 'mybid';
        $data['role'] = $this->session->userdata('user')[0]['role'];
        $data['users'] = $this->session->userdata('user');
        $data['barang'] = $this->Barang->getMyBid($this->session->userdata('user')[0]['id']);
        $this->views('mybid', $data);
    }

    public function deletebid()
    {
        $id = $this->input->get('id');
        $this->db->delete('barang', ['id' => $id]);
        redirect('main/mybid');
    }

    public function bidupdate()
    {
        $data['title'] = 'update';
        $data['role'] = $this->session->userdata('user')[0]['role'];
        $data['users'] = $this->session->userdata('user');
        $data['id'] = $this->input->get('id');
        $data['barang'] = $this->Barang->detailbid($this->input->get('id'));
        $this->views('update', $data);
    }

    public function updatebid()
    {
        $id = $this->input->get('id');
        $data = array(
            'judul' => $this->input->post('judul'),
            'description' => $this->input->post('description'),
            'harga' => $this->input->post('harga'),
            'user_id' => $this->session->userdata('user')[0]['id']
        );
        $this->Barang->updatebid($id, $data);
        redirect('main/mybid');
    }

    public function exportExcelUser()
    {
        $data = $this->User->all();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // set header
        $sheet->setCellValue('A1', 'Username');
        $sheet->setCellValue('B1', 'Email');

        $rexcel = 2;

        foreach ($data as $row) {
            $sheet->setCellValue('A' . $rexcel, $row['nik']);
            $sheet->setCellValue('B' . $rexcel, $row['name']);
            $rexcel++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'reportadmin';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    private function views($name, $data){
        $this->load->view('base/header', $data);
        $this->load->view("home/$name", $data);
        $this->load->view('base/footer');
    }
}
