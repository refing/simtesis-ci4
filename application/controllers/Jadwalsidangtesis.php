<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwalsidangtesis extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->library(array('form_validation','pagination'));
        $this->load->helper(array('form', 'file', 'security', 'app_content'));
        $this->load->model(array('Jadwalthesis_model', 'User_model', 'Daftarpengajuan_model', 'Daftarpengajuandosen_model', 'Ruangan_model'));

        # CEK LOGIN
        if($this->User_model->isNotLogin()) redirect(site_url('login'));

        # JUMLAH HALAMAN PAGINATION
        $this->limit    = 10;

        # LAYOUT VIEWS
        $this->layouts  = 'template/backoffice';
        $this->contents = 'jadwalsidangtesis/';
    }

    public function index()
    {
        if($this->input->post('reset_search_jadwal'))
        {
            $this->session->unset_userdata('search_jadwal');
        }

        if($this->input->post('search_jadwal'))
        {
            $search_jadwal = $this->input->post('search_jadwal');
            $this->session->set_userdata('search_jadwal', $search_jadwal);
        }
        else if($this->session->userdata('search_jadwal'))
        {
            $search_jadwal = $this->session->userdata('search_jadwal');
        }
        else 
        {
            $search_jadwal = null;
        }

        $config['base_url']         = base_url('jadwalsidangtesis/index');
        $config['total_rows']       = $this->Jadwalthesis_model->getTotalJadwalSidangTesisAll($search_jadwal);
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
                    'daftar'        => $this->Jadwalthesis_model->getJadwalAll($search_jadwal, $config["per_page"], $page),
                    'pagination'    => $this->pagination->create_links(),
                    'title'         => 'Daftar Jadwal Sidang',
                    'contents'      => $this->contents . 'index',
                );

        $this->load->view($this->layouts, $data);
    }

    public function createJadwal()
    {        
        if($this->input->post('id_pengajuan'))
        {
            $this->form_validation->set_rules('id_pengajuan', 'Nama mahasiswa', 'trim|required|xss_clean|is_unique[jadwalthesis.id_pengajuan]');
        } 
        else
        {
            $this->form_validation->set_rules('id_pengajuan', 'Nama mahasiswa', 'trim|required|xss_clean');
        }
        
        $this->form_validation->set_rules('id_ruangan', 'Ruangan', 'trim|required|xss_clean');
        $this->form_validation->set_rules('jadwal_sidang', 'jadwal_sidang', 'trim|required|xss_clean');
        $this->form_validation->set_rules('jam_sidang', 'Jam sidang', 'trim|required|xss_clean');

        $this->form_validation->set_message('required', '{field} wajib diisi!');
        $this->form_validation->set_message('is_unique', '{field} sudah tersedia!');

        if($this->form_validation->run() == FALSE)
        {            
            $data = array(
                'pengajuan' => $this->Daftarpengajuan_model->getPengajuanSiapSidang(),
                'ruangan'   => $this->Ruangan_model->getAllRuangan(),
                'title'     => 'Form Tambah Jadwal Sidang',
                'contents'  => $this->contents . 'createJadwal',
            );

            $this->load->view($this->layouts, $data);
        }
        else
        {
            $this->db->trans_start();

            # INSERT KE JADWAL TESIS
            $jadwal_sidang  = $this->security->xss_clean(strip_tags($this->input->post('jadwal_sidang')));
            $jadwal_sidang  = date('Y-m-d', strtotime(str_replace('/', '-', $jadwal_sidang)));

            $jam_sidang     = $this->security->xss_clean(strip_tags($this->input->post('jam_sidang')));
            $jam_sidang     = date('H:i:s', strtotime(str_replace('/', '-', $jam_sidang)));

            $id_pengajuan   = $this->security->xss_clean(strip_tags($this->input->post('id_pengajuan')));

            $insert = array(
                'jadwal_sidang'     => $jadwal_sidang,
                'jam_sidang'        => $jam_sidang,
                'id_pengajuan'      => $id_pengajuan,
                'id_ruangan'        => $this->security->xss_clean(strip_tags($this->input->post('id_ruangan'))),
                'created_at'        => date('Y-m-d H:i:s'),
            );

            $this->Jadwalthesis_model->createJadwal($insert);

            # UPDATE PENGAJUAN JADI STATUS = 4
            $update = array(
                'status'        => 4,
                'updated_at'    => date('Y-m-d H:i:s'),
            );

            $this->Daftarpengajuan_model->updateDaftarPengajuan($id_pengajuan, $update);

            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE)
            {
                $this->db->trans_rollback();

                $this->session->set_flashdata('error', 'Data gagal disimpan!');
            }
            else
            {
                $this->db->trans_commit();   
                
                $this->session->set_flashdata('success', 'Data berhasil disimpan!');             
            }

            redirect('jadwalsidangtesis');
        }
    }

    function updateJadwal($id_jadwal = null)
    {
        if(!$id_jadwal)
        {
            $this->session->set_flashdata('warning', 'Data tidak tersedia!');
            redirect('jadwalsidangtesis');
        }

        $id_jadwal = decode($id_jadwal);
        
        $this->form_validation->set_rules('id_pengajuan', 'Nama Mahasiswa', 'trim|required|xss_clean');
        $this->form_validation->set_rules('id_ruangan', 'Ruangan', 'trim|required|xss_clean');
        $this->form_validation->set_rules('jadwal_sidang', 'jadwal_sidang', 'trim|required|xss_clean');
        $this->form_validation->set_rules('jam_sidang', 'Jam sidang', 'trim|required|xss_clean');
            
        $this->form_validation->set_message('required', '{field} wajib diisi!');

        if($this->form_validation->run() == FALSE)
        {            
            $ubah = $this->Jadwalthesis_model->viewDetailJadwal($id_jadwal);

            if(!$ubah)
            {
                $this->session->set_flashdata('warning', 'Data tidak tersedia!');
                redirect('jadwalsidangtesis');
            }

            $data = array(
                'ubah'      => $ubah,
                'pengajuan' => $this->Daftarpengajuan_model->getPengajuanSiapSidang(),
                'ruangan'   => $this->Ruangan_model->getAllRuangan(),
                'title'     => 'Form Ubah Jadwal Sidang',
                'contents'  => $this->contents . 'UpdateJadwal',
            );

            $this->load->view($this->layouts, $data);
        } 
        else
        {
            $this->db->trans_start();

            $jadwal_sidang      = $this->security->xss_clean(strip_tags($this->input->post('jadwal_sidang')));
            $jadwal_sidang      = date('Y-m-d', strtotime(str_replace('/', '-', $jadwal_sidang)));

            $jam_sidang         = $this->security->xss_clean(strip_tags($this->input->post('jam_sidang')));
            $jam_sidang         = date('H:i:s', strtotime(str_replace('/', '-', $jam_sidang)));

            $id_pengajuan       = $this->security->xss_clean(strip_tags($this->input->post('id_pengajuan')));
            $id_pengajuan_lama  = $this->security->xss_clean(strip_tags($this->input->post('id_pengajuan_lama')));

            $update = array(
                'jadwal_sidang'     => $jadwal_sidang,
                'jam_sidang'        => $jam_sidang,
                'id_pengajuan'      => $id_pengajuan,
                'id_ruangan'        => $this->security->xss_clean(strip_tags($this->input->post('id_ruangan'))),
                'updated_at'        => date('Y-m-d H:i:s'),
            );

            $this->Jadwalthesis_model->updateJadwal($id_jadwal, $update);

            if($id_pengajuan != $id_pengajuan_lama)
            {
                $update = array(
                    'status'        => 3,
                    'updated_at'    => date('Y-m-d H:i:s'),
                );

                $this->Daftarpengajuan_model->updateDaftarPengajuan($id_pengajuan_lama, $update);

                $update = array(
                    'status'        => 4,
                    'updated_at'    => date('Y-m-d H:i:s'),
                );

                $this->Daftarpengajuan_model->updateDaftarPengajuan($id_pengajuan, $update);
            }

            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE)
            {
                $this->db->trans_rollback();

                $this->session->set_flashdata('error', 'Data gagal disimpan!');
            }
            else
            {
                $this->db->trans_commit();   
                
                $this->session->set_flashdata('success', 'Data berhasil disimpan!');             
            }

            redirect('jadwalsidangtesis');
        }
    }

    public function deleteJadwal($id_jadwal)
    {
        $id_jadwal = decode($id_jadwal);
        
        $this->db->trans_start();
        
        # AMBIL DATA JADWAL, UNTUK MENGAMBIL ID PENGAJUAN
        # ID PENGAJUAN, AKAN DIBALIKAN KE STATUS TELAH DI SETUJUI
        $edit = $this->Jadwalthesis_model->viewDetailJadwal($id_jadwal);

        if($edit)
        {
            $id_pengajuan   = $edit->id_pengajuan;
            $update         = array(
                                    'status'        => 3,
                                    'updated_at'    => date('Y-m-d H:i:s'),
                                );

            $this->Daftarpengajuan_model->updateDaftarPengajuan($id_pengajuan, $update);
        }

        $this->Jadwalthesis_model->deleteJadwal($id_jadwal);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();

            $this->session->set_flashdata('error', 'Data gagal dihapus!');
        }
        else
        {
            $this->db->trans_commit();

            $this->session->set_flashdata('success', 'Data berhasil dihapus!');     
        }

        redirect('jadwalsidangtesis');
    }

    public function viewDetailJadwal($id_jadwal)
    {
        $id_jadwal = decode($id_jadwal);
        $ubah = $this->Jadwalthesis_model->viewDetailJadwal($id_jadwal);

        if(!$ubah)
        {
            $this->session->set_flashdata('warning', 'Data tidak tersedia!');
            redirect('jadwalsidangtesis');
        }

        $data = array(
            'ubah'      => $ubah,
            'title'     => 'Detail Jadwal Sidang',
            'contents'  => $this->contents . 'viewDetailJadwal',
        );

        $this->load->view($this->layouts, $data);
    }

    public function viewDetailPengajuan()
    {
        $id_pengajuan   = $this->input->get('id_pengajuan');
        $response       = array();

        $edit = $this->Daftarpengajuan_model->viewDetailPengajuan($id_pengajuan);

        if($edit)
        {
            $response['id_pengajuan']       = $edit->id_pengajuan;
            $response['nama_mahasiswa']     = $edit->nama_mahasiswa;
            $response['nrp']                = $edit->nrp;
            $response['email']              = $edit->email;
            $response['judul_tesis']        = $edit->judul_tesis;
            $response['dosbing1']           = @$this->Daftarpengajuandosen_model->viewDetailPengajuanDosenPembimbing($edit->id_pengajuan, 'dosen_pembimbing_1')->nama_dosen;
            $response['dosbing2']           = @$this->Daftarpengajuandosen_model->viewDetailPengajuanDosenPembimbing($edit->id_pengajuan, 'dosen_pembimbing_2')->nama_dosen;
            $response['status']             = true;
        }
        else 
        {
            $response['status'] = false;
        }

        echo json_encode($response);
    }
}