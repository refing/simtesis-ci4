<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pendaftaranyudisium extends CI_Controller {

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
		$this->load->model("pendaftaran_model");
		if($this->user_model->isNotLogin()) redirect(site_url('login'));
    }

	public function index()
	{

		$data["identitas"] = $this->pendaftaran_model->getAllMahasiswa();
        $this->load->view("pendaftaran/yudisium", $data);
		
	}

	public function daftar()
	{
		$this->pendaftaran_model->save();
		$this->session->set_flashdata('success', 'Berhasil disimpan');
		$this->load->view("pendaftaran/yudisium");
	}
	
	// public function register()
	// {
	// 	$this->load->view('register');
	// }
	// public function save()
	// {
	// 	// $nama = $this->input->post('nama');
	// 	// $email = $this->input->post('email');
	// 	// $password = $this->input->post('password');
	// 	// $role = $this->input->post('role');
	// 	$this->user_model->save();
	// 	$this->session->set_flashdata('success', 'Berhasil disimpan');
	// 	// redirect('register');
	// 	$this->load->view("register");
	// }
}
