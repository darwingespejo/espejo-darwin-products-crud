<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Users extends Controller
{
    public function index()
    {
        $this->call->model('User_model');
        $data['users'] = $this->User_model->get_all_users();
        $this->call->view('users', $data);
    }
}