<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Products extends Controller {
    public function __construct() {
        parent::__construct();
        $this->call->model('Product_model');
        $this->call->library('session');
        $this->call->library('form_validation');

        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function index() {
        $data['products'] = $this->Product_model->get_all();
        $data['success'] = $this->session->flashdata('success');
        $data['error'] = $this->session->flashdata('error');
        $this->call->view('products/index', $data);
    }

    public function create() {
        if ($this->form_validation->submitted()) {
            $data = $this->product_input();
            $error = $this->validate_product($data);
            if ($error !== null) {
                $this->session->set_flashdata('error', $error);
                redirect('products/create');
            }

            $this->Product_model->insert($data);
            $this->session->set_flashdata('success', 'Product created successfully.');
            redirect('products');
        }
        $data['error'] = $this->session->flashdata('error');
        $this->call->view('products/create', $data);
    }

    public function edit($id) {
        $data['product'] = $this->Product_model->get_by_id($id);
        if (empty($data['product'])) {
            $this->session->set_flashdata('error', 'Product not found.');
            redirect('products');
        }

        if ($this->form_validation->submitted()) {
            $update_data = $this->product_input();
            $error = $this->validate_product($update_data);
            if ($error !== null) {
                $this->session->set_flashdata('error', $error);
                redirect('products/edit/'.$id);
            }

            $this->Product_model->update($id, $update_data);
            $this->session->set_flashdata('success', 'Product updated successfully.');
            redirect('products');
        }
        $data['error'] = $this->session->flashdata('error');
        $this->call->view('products/edit', $data);
    }

    public function delete($id) {
        if ($this->Product_model->get_by_id($id)) {
            $this->Product_model->delete($id);
            $this->session->set_flashdata('success', 'Product deleted successfully.');
        } else {
            $this->session->set_flashdata('error', 'Product not found.');
        }
        redirect('products');
    }

    private function product_input() {
        return [
            'product_name' => trim((string) $this->io->post('product_name')),
            'description'  => trim((string) $this->io->post('description')),
            'price'        => trim((string) $this->io->post('price')),
            'quantity'     => trim((string) $this->io->post('quantity')),
        ];
    }

    private function validate_product($data) {
        if ($data['product_name'] === '' || strlen($data['product_name']) > 100) {
            return 'Product name is required and must not exceed 100 characters.';
        }
        if ($data['description'] === '') {
            return 'Description is required.';
        }
        if (!is_numeric($data['price']) || (float) $data['price'] < 0) {
            return 'Price must be a non-negative number.';
        }
        if (filter_var($data['quantity'], FILTER_VALIDATE_INT) === false || (int) $data['quantity'] < 0) {
            return 'Quantity must be a non-negative whole number.';
        }

        $data['price'] = number_format((float) $data['price'], 2, '.', '');
        return null;
    }
}