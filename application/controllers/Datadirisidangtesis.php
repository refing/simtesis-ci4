<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datadirisidangtesis extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->library(array('form_validation'));
        $this->load->helper(array('form', 'file', 'security', 'app_content'));
        $this->load->model(array('Daftarpengajuan_model', 'Daftarpengajuandosen_model', 'Dosen_model', 'User_model'));

        # CEK LOGIN
        if($this->User_model->isNotLogin()) redirect(site_url('login'));

        # AMBIL DATA DARI SESSION
        $this->user_id          = @$this->session->userdata('user_logged')->user_id;
        $this->user_nama        = @$this->session->userdata('user_logged')->nama;
        $this->user_email       = @$this->session->userdata('user_logged')->email;

        # LAYOUT VIEWS
        $this->layouts          = 'template/backoffice';
        $this->contents         = 'datadirisidangtesis/';
    }

    public function index()
    {
        $pengajuan  = $this->Daftarpengajuan_model->viewDetailPengajuanUser($this->user_id);
        $status     = 0;
        if($pengajuan)
        {
            $id_pengajuan   = $pengajuan->id_pengajuan;
            $edit           = $this->Daftarpengajuan_model->viewDetailPengajuan($id_pengajuan);

            # CEK APAKAH DATA-NYA MASIH ADA?
            if(!$edit)
            {
                $this->session->set_flashdata('warning', 'Data tidak tersedia!');

                redirect('datadirisidangtesis');
            }

            $status = $edit->status;

            $data['edit']                   = $edit;
            $data['dosen_pembimbing_1']     = $this->Daftarpengajuandosen_model->viewDetailPengajuanDosenPembimbing($id_pengajuan, 'dosen_pembimbing_1');
            $data['dosen_pembimbing_2']     = $this->Daftarpengajuandosen_model->viewDetailPengajuanDosenPembimbing($id_pengajuan, 'dosen_pembimbing_2');
            $data['dosen_penguji_1']        = $this->Daftarpengajuandosen_model->viewDetailPengajuanDosenPenguji($id_pengajuan, 'dosen_penguji_1');
            $data['dosen_penguji_2']        = $this->Daftarpengajuandosen_model->viewDetailPengajuanDosenPenguji($id_pengajuan, 'dosen_penguji_2');
            $data['dosen_penguji_3']        = $this->Daftarpengajuandosen_model->viewDetailPengajuanDosenPenguji($id_pengajuan, 'dosen_penguji_3');
        }

        $data['status']     = $status;
        $data['title']      = 'Data Diri Sidang Tesis';
        $data['contents']   = $this->contents . 'index';

       $this->load->view($this->layouts, $data);
    }
}