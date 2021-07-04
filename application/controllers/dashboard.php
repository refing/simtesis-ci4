<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");

		if($this->user_model->isNotLogin()) redirect(site_url('login'));

        $this->layouts  = 'template/backoffice';
        $this->contents = 'dashboard/';
    }
	
	public function index()
	{
		$data = array(
                    'users'     => $this->session->userdata('user_logged'),
                    'title'     => 'Dashboard',
                    'contents'  => $this->contents . 'index',
                );

        $this->load->view($this->layouts, $data);
	}
}
