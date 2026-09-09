<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Auth extends Controller {
    public function __construct() {
        parent::__construct();
        $this->call->model('User_model');
        $this->call->library('session');
        $this->call->library('form_validation');
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            redirect('products');
        }
        $this->login();
    }

    public function login() {
        if ($this->session->userdata('logged_in')) {
            redirect('products');
        }

        if ($this->form_validation->submitted()) {
            $username = $this->io->post('username');
            $password = $this->io->post('password');

            $user = $this->User_model->get_user_by_username($username);

            if ($user && password_verify($password, $user['password'])) {
                $this->session->set_userdata([
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'role' => $user['role'] ?? 'user',
                    'logged_in' => TRUE
                ]);
                redirect('products');
            } else {
                $this->session->set_flashdata('error', 'Invalid username or password.');
                redirect('auth/login');
            }
        }
            $data['error'] = $this->session->flashdata('error');
            $this->call->view('auth/login', $data);
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}