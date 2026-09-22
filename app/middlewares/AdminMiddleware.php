<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AdminMiddleware
{
    public function handle(Closure $next)
    {
        $session = load_class('session');

        if ($session->userdata('role') !== 'admin') {
            $session->set_flashdata('error', 'Only administrators can manage products.');
            redirect('products');
        }

        return $next();
    }
}