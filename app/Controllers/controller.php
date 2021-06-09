<?php

namespace App\Controllers;

class controller extends BaseController
{
	public function index()
	{
		return view('index');
	}
	public function dashboard()
	{
		echo view('dashboard');
	}
	public function login()
	{
		echo view('login');
	}

	public function pendaftaran()
	{
		echo view('pendaftaran');
	}
	public function daftarsempro()
	{
		echo view('daftarsempro');
	}
	public function daftarsidang()
	{
		echo view('daftarsidang');
	}
	public function daftaryudisium()
	{
		echo view('daftaryudisium');
	}

	public function datadiri()
	{
		echo view('datadiri');
	}
	
	public function jadwal()
	{
		echo view('jadwal');
	}
	public function jadwalsempro()
	{
		echo view('jadwalsempro');
	}
	public function jadwalsidang()
	{
		echo view('jadwalsidang');
	}

	public function berkas()
	{
		echo view('berkas');
	}
	public function berkassempro()
	{
		echo view('berkassempro');
	}
	public function berkassidang()
	{
		echo view('berkassidang');
	}

	public function nilai()
	{
		echo view('nilai');
	}
	public function nilaisempro()
	{
		echo view('nilaisempro');
	}
	public function nilaisidang()
	{
		echo view('nilaisidang');
	}
	public function nilaiyudisium()
	{
		echo view('nilaiyudisium');
	}
}
