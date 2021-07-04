<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftarsidangtesis extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->library(array('form_validation', 'pagination'));
        $this->load->helper(array('form', 'file', 'security', 'app_content'));
        $this->load->model(array('Daftarpengajuan_model', 'Daftarpengajuandosen_model', 'Dosen_model', 'User_model'));

        # CEK LOGIN
        if($this->User_model->isNotLogin()) redirect(site_url('login'));

        # AMBIL DATA DARI SESSION
        $this->user_id          = @$this->session->userdata('user_logged')->user_id;
        $this->user_nama        = @$this->session->userdata('user_logged')->nama;
        $this->user_email       = @$this->session->userdata('user_logged')->email;

        # JUMLAH HALAMAN PAGINATION
        $this->limit            = 10;

        # LAYOUT VIEWS
        $this->layouts          = 'template/backoffice';
        $this->contents         = 'pendaftarsidangtesis/';
    }

    public function index()
    {
        if($this->input->post('reset_search_pendaftar_sidang_tesis'))
        {
            $this->session->unset_userdata('search_pendaftar_sidang_tesis');
            $this->session->unset_userdata('status_pendaftar_sidang_tesis');
        }

        $search_pendaftar_sidang_tesis = null;
        $status_pendaftar_sidang_tesis = null;

        if($this->input->post('search_pendaftar_sidang_tesis'))
        {
            $search_pendaftar_sidang_tesis = $this->input->post('search_pendaftar_sidang_tesis');
            $this->session->set_userdata('search_pendaftar_sidang_tesis', $search_pendaftar_sidang_tesis);
        }
        else if($this->session->userdata('search_pendaftar_sidang_tesis'))
        {
            $search_pendaftar_sidang_tesis = $this->session->userdata('search_pendaftar_sidang_tesis');
        }

        if($this->input->post('status_pendaftar_sidang_tesis') != 'all')
        {
            $status_pendaftar_sidang_tesis = $this->input->post('status_pendaftar_sidang_tesis');
            $this->session->set_userdata('status_pendaftar_sidang_tesis', $status_pendaftar_sidang_tesis);
        }
        else if($this->input->post('status_pendaftar_sidang_tesis') == 'all')
        {
            $this->session->unset_userdata('status_pendaftar_sidang_tesis');
        }
        else if($this->session->userdata('status_pendaftar_sidang_tesis'))
        {
            $status_pendaftar_sidang_tesis = $this->session->userdata('status_pendaftar_sidang_tesis');
        }

        $config['base_url']         = base_url('pendaftarsidangtesis/index');
        $config['total_rows']       = $this->Daftarpengajuan_model->getPengajuanAll($search_pendaftar_sidang_tesis, $status_pendaftar_sidang_tesis, $total = true);
        $config['per_page']         = $this->limit;
        $config["uri_segment"]      = 3;
        $config["num_links"]        = floor($config["total_rows"] / $config["per_page"]);
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3) ? $this->uri->segment(3)  : 0);
        $data = array(
                    'nomor'         => $page,
                    'pengajuan'     => $this->Daftarpengajuan_model->getPengajuanAll($search_pendaftar_sidang_tesis, $status_pendaftar_sidang_tesis, $total = false, $config["per_page"], $page),
                    'pagination'    => $this->pagination->create_links(),
                    'title'         => 'Daftar Pendaftar Sidang Tesis',
                    'contents'      => $this->contents . 'index',
                );

        $this->load->view($this->layouts, $data);
    }

    public function viewDetailPengajuan($id_pengajuan)
    {
        $id_pengajuan   = decode($id_pengajuan);
        $edit           = $this->Daftarpengajuan_model->viewDetailPengajuan($id_pengajuan);

        # CEK APAKAH DATA-NYA MASIH ADA?
        if(!$edit)
        {
            $this->session->set_flashdata('warning', 'Data tidak tersedia!');

            redirect('pendaftarsidangtesis');
        }

        $data['edit']                   = $edit;
        $data['dosen_pembimbing_1']     = $this->Daftarpengajuandosen_model->viewDetailPengajuanDosenPembimbing($id_pengajuan, 'dosen_pembimbing_1');
        $data['dosen_pembimbing_2']     = $this->Daftarpengajuandosen_model->viewDetailPengajuanDosenPembimbing($id_pengajuan, 'dosen_pembimbing_2');
        $data['dosen_penguji_1']        = $this->Daftarpengajuandosen_model->viewDetailPengajuanDosenPenguji($id_pengajuan, 'dosen_penguji_1');
        $data['dosen_penguji_2']        = $this->Daftarpengajuandosen_model->viewDetailPengajuanDosenPenguji($id_pengajuan, 'dosen_penguji_2');
        $data['dosen_penguji_3']        = $this->Daftarpengajuandosen_model->viewDetailPengajuanDosenPenguji($id_pengajuan, 'dosen_penguji_3');

        $data['title']      = 'Detail Pendaftar Sidang Tesis';
        $data['contents']   = $this->contents . 'viewDetailPengajuan';

       $this->load->view($this->layouts, $data);
    }

    public function acceptPengajuan($id_pengajuan)
    {
        $id_pengajuan = decode($id_pengajuan);
        
        $this->db->trans_start();
        
        $update = array(
                    'status'        => 3,
                    'updated_at'    => date('Y-m-d H:i:s'),
                );
        $this->Daftarpengajuan_model->updateDaftarPengajuan($id_pengajuan, $update);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();

            $this->session->set_flashdata('error', 'Data gagal disetujui!');
        }
        else
        {
            $this->db->trans_commit();

            $this->session->set_flashdata('success', 'Data berhasil disetujui!');     
        }

        redirect('pendaftarsidangtesis');
    }

    public function rejectPengajuan($id_pengajuan)
    {
        $id_pengajuan = decode($id_pengajuan);
        
        $this->db->trans_start();
        
        $update = array(
                    'status'        => 2,
                    'updated_at'    => date('Y-m-d H:i:s'),
                );
        $this->Daftarpengajuan_model->updateDaftarPengajuan($id_pengajuan, $update);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();

            $this->session->set_flashdata('error', 'Data gagal ditolak!');
        }
        else
        {
            $this->db->trans_commit();

            $this->session->set_flashdata('success', 'Data berhasil ditolak!');     
        }

        redirect('pendaftarsidangtesis');
    }
}