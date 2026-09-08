<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UsersController extends Controller
{
    public function index()
    {
        $this->db = $this->call->database();
        $usersModel = $this->call->model('UsersModel');
        $data['users'] = $usersModel->all();

        $this->call->view('users', $data);
    }
}