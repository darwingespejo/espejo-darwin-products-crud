<?php
defined('PREVENT_DIRECT_SCRIPT_ACCESS') OR exit('No direct script access allowed');

class Products extends Controller {
    public function __construct() {
        parent::__construct();
        $this->call->model('Product_model');
        $this->call->library('session');

        // Middleware Guard: Pag hindi logged in, ibabalik sa login page
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function index() {
        $data['products'] = $this->Product_model->get_all();
        $this->call->view('products/index', $data);
    }

    public function create() {
        if ($this->form_validation->submitted()) {
            $data = [
                'product_name' => $this->io->post('product_name'),
                'description'  => $this->io->post('description'),
                'price'        => $this->io->post('price'),
                'quantity'     => $this->io->post('quantity')
            ];
            $this->Product_model->insert($data);
            redirect('products');
        }
        $this->call->view('products/create');
    }

    public function edit($id) {
        $data['product'] = $this->Product_model->get_by_id($id);
        if ($this->form_validation->submitted()) {
            $update_data = [
                'product_name' => $this->io->post('product_name'),
                'description'  => $this->io->post('description'),
                'price'        => $this->io->post('price'),
                'quantity'     => $this->io->post('quantity')
            ];
            $this->Product_model->update($id, $update_data);
            redirect('products');
        }
        $this->call->view('products/edit', $data);
    }

    public function delete($id) {
        $this->Product_model->delete($id);
        redirect('products');
    }
}