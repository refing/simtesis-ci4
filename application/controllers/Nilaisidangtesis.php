<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilaisidangtesis extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->library(array('form_validation','pagination'));
        $this->load->helper(array('form', 'file', 'security', 'app_content'));
        $this->load->model(array('Nilaithesis_model', 'User_model', 'Daftarpengajuan_model', 'Daftarpengajuandosen_model', 'Ruangan_model'));

        # CEK LOGIN
        if($this->User_model->isNotLogin()) redirect(site_url('login'));

        # JUMLAH HALAMAN PAGINATION
        $this->limit    = 10;

        # LAYOUT VIEWS
        $this->layouts  = 'template/backoffice';
        $this->contents = 'nilaisidangtesis/';
    }

    public function index()
    {
        if($this->input->post('reset_search_nilai'))
        {
            $this->session->unset_userdata('search_nilai');
        }

        if($this->input->post('search_nilai'))
        {
            $search_nilai = $this->input->post('search_nilai');
            $this->session->set_userdata('search_nilai', $search_nilai);
        }
        else if($this->session->userdata('search_nilai'))
        {
            $search_nilai = $this->session->userdata('search_nilai');
        }
        else 
        {
            $search_nilai = null;
        }

        $config['base_url']         = base_url('nilaisidangtesis/index');
        $config['total_rows']       = $this->Nilaithesis_model->getNilaiAll($search_nilai, $total = true);
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
                    'nilai'         => $this->Nilaithesis_model->getNilaiAll($search_nilai, $total = false, $config["per_page"], $page),
                    'pagination'    => $this->pagination->create_links(),
                    'title'         => 'Daftar Jadwal Sidang',
                    'contents'      => $this->contents . 'index',
                );

        $this->load->view($this->layouts, $data);
    }

    public function CreateNilai()
    {        
        if($this->input->post('id_pengajuan'))
        {
            $this->form_validation->set_rules('id_pengajuan', 'Nama mahasiswa', 'trim|required|xss_clean|is_unique[nilaithesis.id_pengajuan]');
        } 
        else
        {
            $this->form_validation->set_rules('id_pengajuan', 'Nama mahasiswa', 'trim|required|xss_clean');
        }
        
        $this->form_validation->set_rules('nilai', 'Nilai', 'trim|required|xss_clean');
        $this->form_validation->set_rules('status_finalthesis', 'Status', 'trim|required|xss_clean');

        $this->form_validation->set_message('required', '{field} wajib diisi!');
        $this->form_validation->set_message('is_unique', '{field} sudah tersedia!');

        if($this->form_validation->run() == FALSE)
        {            
            $data = array(
                'pengajuan' => $this->Daftarpengajuan_model->getPengajuanSiapNilai(),
                'title'     => 'Form Pengisian Nilai Tesis & Status Sidang',
                'contents'  => $this->contents . 'CreateNilai',
            );

            $this->load->view($this->layouts, $data);
        }
        else
        {
            $this->db->trans_start();

            # INSERT KE NILAI TESIS

            $id_pengajuan   = $this->security->xss_clean(strip_tags($this->input->post('id_pengajuan')));

            $insert = array(
                'id_pengajuan'      => $id_pengajuan,
                'nilai'             => $this->security->xss_clean(strip_tags($this->input->post('nilai'))),
                'status_finalthesis'=> $this->security->xss_clean(strip_tags($this->input->post('status_finalthesis'))),
                'created_at'        => date('Y-m-d H:i:s'),
            );

            $this->Nilaithesis_model->CreateNilai($insert);

            # UPDATE PENGAJUAN JADI STATUS = 9
            $update = array(
                'status'        => 9,
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

            redirect('nilaisidangtesis');
        }
    }

    function updateNilai($id_nilai = null)
    {
        if(!$id_nilai)
        {
            $this->session->set_flashdata('warning', 'Data tidak tersedia!');
            redirect('nilaisidangtesis');
        }

        $id_nilai = decode($id_nilai);
        
        $this->form_validation->set_rules('id_pengajuan', 'Nama Mahasiswa', 'trim|required|xss_clean');
        $this->form_validation->set_rules('status_finalthesis', 'Status', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nilai', 'Nilai', 'trim|required|xss_clean');
            
        $this->form_validation->set_message('required', '{field} wajib diisi!');

        if($this->form_validation->run() == FALSE)
        {            
            $ubah = $this->Nilaithesis_model->viewDetailNilai($id_nilai);

            if(!$ubah)
            {
                $this->session->set_flashdata('warning', 'Data tidak tersedia!');
                redirect('nilaisidangtesis');
            }

            $data = array(
                'ubah'      => $ubah,
                'pengajuan' => $this->Daftarpengajuan_model->getPengajuanSiapNilai(),
                'title'     => 'Form Ubah Pengisian Nilai Tesis & Status Sidang',
                'contents'  => $this->contents . 'updateNilai',
            );

            $this->load->view($this->layouts, $data);
        } 
        else
        {
            $this->db->trans_start();

            $id_pengajuan       = $this->security->xss_clean(strip_tags($this->input->post('id_pengajuan')));
            $id_pengajuan_lama  = $this->security->xss_clean(strip_tags($this->input->post('id_pengajuan_lama')));

            $update = array(
                'id_pengajuan'      => $id_pengajuan,
                'nilai'             => $this->security->xss_clean(strip_tags($this->input->post('nilai'))),
                'status_finalthesis'=> $this->security->xss_clean(strip_tags($this->input->post('status_finalthesis'))),
                'updated_at'        => date('Y-m-d H:i:s'),
            );

            $this->Nilaithesis_model->updateNilai($id_nilai, $update);

            if($id_pengajuan != $id_pengajuan_lama)
            {
                $update = array(
                    'status'        => 8,
                    'updated_at'    => date('Y-m-d H:i:s'),
                );

                $this->Daftarpengajuan_model->updateDaftarPengajuan($id_pengajuan_lama, $update);

                $update = array(
                    'status'        => 9,
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

            redirect('nilaisidangtesis');
        }
    }

    public function deleteNilai($id_nilai)
    {
        $id_nilai = decode($id_nilai);
        
        $this->db->trans_start();
        
        # AMBIL DATA JADWAL, UNTUK MENGAMBIL ID PENGAJUAN
        # ID PENGAJUAN, AKAN DIBALIKAN KE STATUS BERKAS TELAH DI SETUJUI
        $edit = $this->Nilaithesis_model->viewDetailNilai($id_nilai);

        if($edit)
        {
            $id_pengajuan   = $edit->id_pengajuan;
            $update         = array(
                                    'status'        => 8,
                                    'updated_at'    => date('Y-m-d H:i:s'),
                                );

            $this->Daftarpengajuan_model->updateDaftarPengajuan($id_pengajuan, $update);
        }

        $this->Nilaithesis_model->deleteNilai($id_nilai);

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

        redirect('nilaisidangtesis');
    }

    public function viewDetailNilai($id_nilai)
    {
        $id_nilai = decode($id_nilai);
        $ubah = $this->Nilaithesis_model->viewDetailNilai($id_nilai);

        if(!$ubah)
        {
            $this->session->set_flashdata('warning', 'Data tidak tersedia!');
            redirect('nilaisidangtesis');
        }

        $data = array(
            'ubah'      => $ubah,
            'title'     => 'Detail Pengisian Nilai & Status Sidang',
            'contents'  => $this->contents . 'viewDetailNilai',
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