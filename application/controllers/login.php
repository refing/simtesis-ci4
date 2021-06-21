<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->library('form_validation');
    }

	public function index()
	{
		// $this->load->view('login');
		// jika form login disubmit
        if($this->input->post()){
            if($this->user_model->doLogin()) redirect(site_url('dashboard'));
        }

        // tampilkan halaman login
        $this->load->view("login");
	}
	public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        redirect(site_url('/'));
    }
	public function register()
	{
		$this->load->view('register');
	}
	public function save()
	{
		// $nama = $this->input->post('nama');
		// $email = $this->input->post('email');
		// $password = $this->input->post('password');
		// $role = $this->input->post('role');
		$this->user_model->save();
		$this->session->set_flashdata('success', 'Berhasil disimpan');
		// redirect('register');
		$this->load->view("register");
	}
}
