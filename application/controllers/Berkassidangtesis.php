<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berkassidangtesis extends CI_Controller {

    public function __construct(){
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
        $this->user_role        = @$this->session->userdata('user_logged')->role;

        # UNTUK FILE UPLOAD
        $this->form_revisi              = null;
        $this->laporan_final            = null;
        $this->form_nilai_akhir         = null;
        $this->form_ket_ikut_sidang     = null;

        # JUMLAH HALAMAN PAGINATION
        $this->limit            = 10;

        # LAYOUT VIEWS
        $this->layouts  = 'template/backoffice';
        $this->contents = 'berkassidangtesis/';
    }

    public function index()
    {
        if($this->user_role != 'mahasiswa')
        {
            if($this->input->post('reset_search_berkas_sidang_tesis'))
            {
                $this->session->unset_userdata('search_berkas_sidang_tesis');
                $this->session->unset_userdata('status_berkas_sidang_tesis');
            }

            $search_berkas_sidang_tesis = null;
            $status_berkas_sidang_tesis = null;

            if($this->input->post('search_berkas_sidang_tesis'))
            {
                $search_berkas_sidang_tesis = $this->input->post('search_berkas_sidang_tesis');
                $this->session->set_userdata('search_berkas_sidang_tesis', $search_berkas_sidang_tesis);
            }
            else if($this->session->userdata('search_berkas_sidang_tesis'))
            {
                $search_berkas_sidang_tesis = $this->session->userdata('search_berkas_sidang_tesis');
            }

            if($this->input->post('status_berkas_sidang_tesis') != 'all')
            {
                $status_berkas_sidang_tesis = $this->input->post('status_berkas_sidang_tesis');
                $this->session->set_userdata('status_berkas_sidang_tesis', $status_berkas_sidang_tesis);
            }
            else if($this->input->post('status_berkas_sidang_tesis') == 'all')
            {
                $this->session->unset_userdata('status_berkas_sidang_tesis');
            }
            else if($this->session->userdata('status_berkas_sidang_tesis'))
            {
                $status_berkas_sidang_tesis = $this->session->userdata('status_berkas_sidang_tesis');
            }

            $config['base_url']         = base_url('berkassidangtesis/index');
            $config['total_rows']       = $this->Daftarpengajuan_model->getBerkasSidangTesisAll($search_berkas_sidang_tesis, $status_berkas_sidang_tesis, $total = true);
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
                        'pengajuan'     => $this->Daftarpengajuan_model->getBerkasSidangTesisAll($search_berkas_sidang_tesis, $status_berkas_sidang_tesis, $total = false, $config["per_page"], $page),
                        'pagination'    => $this->pagination->create_links(),
                        'title'         => 'Daftar Berkas Pendaftar Sidang Tesis',
                        'contents'      => $this->contents . 'index',
                    );

            $this->load->view($this->layouts, $data);
        }
        else
        {
            $this->createPengajuanBerkas();
        }
    }

     public function viewDetailBerkas($id_pengajuan)
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

        $data['title']      = 'Detail Berkas Pendaftar Sidang Tesis';
        $data['contents']   = $this->contents . 'viewDetailBerkas';

       $this->load->view($this->layouts, $data);
    }

    public function acceptBerkas($id_pengajuan)
    {
        $id_pengajuan = decode($id_pengajuan);
        
        $this->db->trans_start();
        
        $update = array(
                    'status'        => 8, # STATUS ACCEPT BERKAS
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

        redirect('berkassidangtesis');
    }

    public function rejectBerkas($id_pengajuan)
    {
        $id_pengajuan = decode($id_pengajuan);
        
        $this->db->trans_start();
        
        $update = array(
                    'status'        => 7, # STATUS REJECT BERKAS
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

        redirect('berkassidangtesis');
    }

    public function createPengajuanBerkas()
    {
        $edit = $this->Daftarpengajuan_model->viewDetailBerksaSidang($this->user_id);

        if($edit)
        {
            $id_pengajuan   = $edit->id_pengajuan;
            $status         = $edit->status;
            
            if($status >= 6 && $status != 7)
            {
                redirect('berkassidangtesis/simpan/' . encode($id_pengajuan));
            }

            $data['edit']               = $edit;
            $data['dosen_pembimbing_1'] = $this->Daftarpengajuandosen_model->viewDetailPengajuanDosenPembimbing($id_pengajuan, 'dosen_pembimbing_1');
            $data['dosen_pembimbing_2'] = $this->Daftarpengajuandosen_model->viewDetailPengajuanDosenPembimbing($id_pengajuan, 'dosen_pembimbing_2');
            $data['dosen_penguji_1']    = $this->Daftarpengajuandosen_model->viewDetailPengajuanDosenPenguji($id_pengajuan, 'dosen_penguji_1');
            $data['dosen_penguji_2']    = $this->Daftarpengajuandosen_model->viewDetailPengajuanDosenPenguji($id_pengajuan, 'dosen_penguji_2');
            $data['dosen_penguji_3']    = $this->Daftarpengajuandosen_model->viewDetailPengajuanDosenPenguji($id_pengajuan, 'dosen_penguji_3');
        }

        $data['dosen_penguji']          = $this->Dosen_model->getDosenPenguji();
        $data['dosen_pembimbing']       = $this->Dosen_model->getDosenPembimbing();
        $data['dosen_penguji']          = $this->Dosen_model->getDosenPenguji();
        $data['title']                  = 'Form Finalisasi Sidang Tesis';
        $data['contents']               = $this->contents . 'createPengajuanBerkas';

        $this->load->view($this->layouts, $data);
    }

    public function verifikasi()
    {
        $this->form_validation->set_rules('nama_mahasiswa', 'Nama mahasiswa', 'trim|required|xss_clean');
        $this->form_validation->set_rules('judul_tesis', 'Judul tesis', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nrp', 'NRP', 'trim|required|xss_clean');
        $this->form_validation->set_rules('dosen_pembimbing_1', 'Dosen pembimbing I', 'trim|required|xss_clean');
        $this->form_validation->set_rules('dosen_pembimbing_2', 'Dosen pembimbing II', 'trim|required|xss_clean');
        $this->form_validation->set_rules('dosen_penguji_1', 'Dosen penguji I', 'trim|required|xss_clean');
        $this->form_validation->set_rules('dosen_penguji_2', 'Dosen penguji II', 'trim|required|xss_clean');
        $this->form_validation->set_rules('dosen_penguji_3', 'Dosen penguji III', 'trim|required|xss_clean');

        if(empty($this->input->post('form_ket_ikut_sidang_lama')))
        {
            $this->form_validation->set_rules('form_ket_ikut_sidang', 'form ket. ikut sidang', 'callback__cek_upload[form_ket_ikut_sidang]');
        }

        if(empty($this->input->post('form_nilai_akhir_lama')))
        {
            $this->form_validation->set_rules('form_nilai_akhir', 'form penilaian akhir', 'callback__cek_upload[form_nilai_akhir]');
        }

        if(empty($this->input->post('laporan_final_lama')))
        {
            $this->form_validation->set_rules('laporan_final', 'laporan final tesis', 'callback__cek_upload[laporan_final]');
        }

        if(empty($this->input->post('form_revisi_lama')))
        {
            $this->form_validation->set_rules('form_revisi', 'form revisi', 'callback__cek_upload[form_revisi]');
        }

        $this->form_validation->set_message('required', '{field} wajib diisi!');
        $this->form_validation->set_message('is_unique', '{field} sudah tersedia!');
        $this->form_validation->set_message('_cek_upload', 'Periksa kembali file {field} anda!');

        if($this->form_validation->run() == FALSE)
        {
            $this->createPengajuanBerkas();
        }
        else
        {
            $this->db->trans_start();

            $id_pengajuan = $this->security->xss_clean(strip_tags($this->input->post('id_pengajuan')));

            if($this->form_revisi)
            {
                $form_revisi = $this->form_revisi['file']['file_name'];
            }
            else 
            {
                $form_revisi = $this->input->post('form_revisi_lama');
            }

            if($this->laporan_final)
            {
                $laporan_final = $this->laporan_final['file']['file_name'];
            }
            else 
            {
                $laporan_final = $this->input->post('laporan_final_lama');
            }

            if($this->form_nilai_akhir)
            {
                $form_nilai_akhir = $this->form_nilai_akhir['file']['file_name'];
            }
            else 
            {
                $form_nilai_akhir = $this->input->post('form_nilai_akhir_lama');
            }

            if($this->form_ket_ikut_sidang)
            {
                $form_ket_ikut_sidang = $this->form_ket_ikut_sidang['file']['file_name'];
            }
            else 
            {
                $form_ket_ikut_sidang = $this->input->post('form_ket_ikut_sidang_lama');
            }

            # PROSES KE TABEL pendaftaransidangtesis
            $update = array(
                        'user_id'               => $this->session->userdata('user_logged')->user_id,
                        'nama_mahasiswa'        => $this->security->xss_clean(strip_tags($this->input->post('nama_mahasiswa'))),
                        'judul_tesis'           => $this->security->xss_clean(strip_tags($this->input->post('judul_tesis'))),
                        'nrp'                   => $this->security->xss_clean(strip_tags($this->input->post('nrp'))),
                        'email'                 => $this->security->xss_clean(strip_tags($this->input->post('email'))),
                        'form_revisi'           => $form_revisi,
                        'laporan_final'         => $laporan_final,
                        'form_nilai_akhir'      => $form_nilai_akhir,
                        'form_ket_ikut_sidang'  => $form_ket_ikut_sidang,
                        'status'                => 5, #STATUS MENUJU VERIFIKASI
                        'updated_at'            => date('Y-m-d H:i:s'),
                    );

            $this->Daftarpengajuan_model->updateDaftarPengajuan($id_pengajuan, $update);

            # PROSES KE TABEL pendaftaransidangtesisdosen
            $this->Daftarpengajuandosen_model->deleteDaftarPengajuanDosen($id_pengajuan);

            $array_kategori_dosen = array(
                                            'dosen_pembimbing_1'
                                            , 'dosen_pembimbing_2'
                                            , 'dosen_penguji_1'
                                            , 'dosen_penguji_2'
                                            , 'dosen_penguji_3'
                                    );

            foreach($array_kategori_dosen as $key => $value)
            {
                $insert = array(
                            'id_pengajuan'      => $id_pengajuan,
                            'id_dosen'          => $this->security->xss_clean(strip_tags($this->input->post($value))),
                            'kategori_dosen'    => $this->security->xss_clean(strip_tags($value)),
                            'created_at'        => date('Y-m-d H:i:s'),
                        );

                $this->Daftarpengajuandosen_model->createDaftarPengajuanDosen($insert);
            }

            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE)
            {
                $this->db->trans_rollback();

                $this->session->set_flashdata('error', 'Data gagal diproses!');

                redirect('berkassidangtesis');
            }
            else
            {
                $this->db->trans_commit(); 
                redirect('berkassidangtesis/simpan/' . encode($id_pengajuan));
            }
        }
    }

    public function simpan($id_pengajuan)
    {
        $id_pengajuan   = decode($id_pengajuan);
        $edit           = $this->Daftarpengajuan_model->viewDetailPengajuan($id_pengajuan);

        # CEK APAKAH DATA-NYA MASIH ADA?
        if(!$edit)
        {
            $this->session->set_flashdata('warning', 'Data tidak tersedia!');

            redirect('berkassidangtesis');
        }

        $status = $edit->status;

        # JIKA DI POST SUBMIT
        if($this->input->post())
        {
            $status = 6; #STATUS DISUBMIT
            $update = array(
                            'status'        => $status,
                            'updated_at'    => date('Y-m-d H:i:s'),
                        );

            $this->Daftarpengajuan_model->updateDaftarPengajuan($id_pengajuan, $update);
        }

        $data = array(
                    'edit'                  => $edit,
                    'status'                => $status,
                    'dosen_pembimbing_1'    => $this->Daftarpengajuandosen_model->viewDetailPengajuanDosenPembimbing($id_pengajuan, 'dosen_pembimbing_1'),
                    'dosen_pembimbing_2'    => $this->Daftarpengajuandosen_model->viewDetailPengajuanDosenPembimbing($id_pengajuan, 'dosen_pembimbing_2'),
                    'dosen_penguji_1'       => $this->Daftarpengajuandosen_model->viewDetailPengajuanDosenPenguji($id_pengajuan, 'dosen_penguji_1'),
                    'dosen_penguji_2'       => $this->Daftarpengajuandosen_model->viewDetailPengajuanDosenPenguji($id_pengajuan, 'dosen_penguji_2'),
                    'dosen_penguji_3'       => $this->Daftarpengajuandosen_model->viewDetailPengajuanDosenPenguji($id_pengajuan, 'dosen_penguji_3'),
                    
                    'title'                 => 'Form Finalisasi Sidang Tesis',
                    'contents'              => $this->contents . 'simpan',
                );

        $this->load->view($this->layouts, $data);
    }

    function _cek_upload($param, $kolom)
    {
        if($_FILES[$kolom]['size'] != 0)
        {            
            $path_upload = './uploads/berkassidangtesis/';

            if (!is_dir($path_upload))
            {
                mkdir($path_upload);
            }

            $config['upload_path']   = $path_upload;
            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
            $config['overwrite']     = false;
     
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload($kolom))
            {
                print_r($this->form_validation->set_message());
                $this->form_validation->set_message('_cek_upload['.$kolom.']', $this->upload->display_errors());
                return false;
            }   
            else
            {
                if($kolom == 'form_revisi')
                {
                    $this->form_revisi['file'] =  $this->upload->data();
                }
                else if($kolom == 'laporan_final')
                {
                    $this->laporan_final['file'] =  $this->upload->data();
                }
                else if($kolom == 'form_nilai_akhir')
                {
                    $this->form_nilai_akhir['file'] =  $this->upload->data();
                }
                else if($kolom == 'form_ket_ikut_sidang')
                {
                    $this->form_ket_ikut_sidang['file'] =  $this->upload->data();
                }
                
                return true;
            }   
        }  
        else
        {
            $this->form_validation->set_message('cek_upload', "No file selected");
            return false;
        } 
    }
}
