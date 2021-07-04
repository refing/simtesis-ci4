<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaransidangtesis extends CI_Controller {

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

        # UNTUK FILE UPLOAD
        $this->form_bimbingan1  = null;
        $this->form_bimbingan2  = null;
        $this->form_persetujuan = null;
        $this->laporan_tesis    = null;
        $this->berita_acara     = null;

        # LAYOUT VIEWS
        $this->layouts          = 'template/backoffice';
        $this->contents         = 'pendaftaransidangtesis/';
    }

    public function index()
    {
        $pengajuan = $this->Daftarpengajuan_model->viewDetailPengajuanUser($this->user_id);
        if($pengajuan)
        {
            $id_pengajuan               = $pengajuan->id_pengajuan;
            $edit                       = $this->Daftarpengajuan_model->viewDetailPengajuan($id_pengajuan);

            if($edit->status >= 1 && $edit->status != 2)
            {
                redirect('pendaftaransidangtesis/simpan/' . encode($id_pengajuan));
            }

            $data['edit']               = $edit;
            $data['dosen_pembimbing_1'] = $this->Daftarpengajuandosen_model->viewDetailPengajuanDosenPembimbing($id_pengajuan, 'dosen_pembimbing_1');
            $data['dosen_pembimbing_2'] = $this->Daftarpengajuandosen_model->viewDetailPengajuanDosenPembimbing($id_pengajuan, 'dosen_pembimbing_2');
            $data['dosen_penguji_1']    = $this->Daftarpengajuandosen_model->viewDetailPengajuanDosenPenguji($id_pengajuan, 'dosen_penguji_1');
            $data['dosen_penguji_2']    = $this->Daftarpengajuandosen_model->viewDetailPengajuanDosenPenguji($id_pengajuan, 'dosen_penguji_2');
            $data['dosen_penguji_3']    = $this->Daftarpengajuandosen_model->viewDetailPengajuanDosenPenguji($id_pengajuan, 'dosen_penguji_3');
        }

        $data['dosen_penguji']      = $this->Dosen_model->getDosenPenguji();
        $data['dosen_pembimbing']   = $this->Dosen_model->getDosenPembimbing();
        $data['user_nama']          = $this->user_nama;
        $data['user_email']         = $this->user_email;
        $data['title']              = 'Form Pendaftaran Sidang Tesis';
        $data['contents']           = $this->contents . 'index';

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

        if(empty($this->input->post('form_bimbingan1_lama')))
        {
            $this->form_validation->set_rules('form_bimbingan1', 'form bimbingan 1', 'callback__cek_upload[form_bimbingan1]');
        }

        if(empty($this->input->post('form_bimbingan2_lama')))
        {
            $this->form_validation->set_rules('form_bimbingan2', 'form bimbingan 2', 'callback__cek_upload[form_bimbingan2]');
        }

        if(empty($this->input->post('form_persetujuan_lama')))
        {
            $this->form_validation->set_rules('form_persetujuan', 'form persetujuan', 'callback__cek_upload[form_persetujuan]');
        }

        if(empty($this->input->post('laporan_tesis_lama')))
        {
            $this->form_validation->set_rules('laporan_tesis', 'laporan tesis', 'callback__cek_upload[laporan_tesis]');
        }

        if(empty($this->input->post('berita_acara_lama')))
        {
            $this->form_validation->set_rules('berita_acara', 'berita acara', 'callback__cek_upload[berita_acara]');
        }

        $this->form_validation->set_message('required', '{field} wajib diisi!');
        $this->form_validation->set_message('is_unique', '{field} sudah tersedia!');
        $this->form_validation->set_message('_cek_upload', 'Periksa kembali file {field} anda!');

        if($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        else
        {
            $this->db->trans_start();

            $id_pengajuan = $this->security->xss_clean(strip_tags($this->input->post('id_pengajuan')));

            if($this->form_bimbingan1)
            {
                $form_bimbingan1 = $this->form_bimbingan1['file']['file_name'];
            }
            else 
            {
                $form_bimbingan1 = $this->input->post('form_bimbingan1_lama');
            }

            if($this->form_bimbingan2)
            {
                $form_bimbingan2 = $this->form_bimbingan2['file']['file_name'];
            }
            else 
            {
                $form_bimbingan2 = $this->input->post('form_bimbingan2_lama');
            }

            if($this->form_persetujuan)
            {
                $form_persetujuan = $this->form_persetujuan['file']['file_name'];
            }
            else 
            {
                $form_persetujuan = $this->input->post('form_persetujuan_lama');
            }

            if($this->laporan_tesis)
            {
                $laporan_tesis = $this->laporan_tesis['file']['file_name'];
            }
            else 
            {
                $laporan_tesis = $this->input->post('laporan_tesis_lama');
            }

            if($this->berita_acara)
            {
                $berita_acara = $this->berita_acara['file']['file_name'];
            }
            else 
            {
                $berita_acara = $this->input->post('berita_acara_lama');
            }

            if($id_pengajuan)
            {
                # PROSES KE TABEL pendaftaransidangtesis
                $update = array(
                            'user_id'           => $this->session->userdata('user_logged')->user_id,
                            'nama_mahasiswa'    => $this->security->xss_clean(strip_tags($this->input->post('nama_mahasiswa'))),
                            'judul_tesis'       => $this->security->xss_clean(strip_tags($this->input->post('judul_tesis'))),
                            'nrp'               => $this->security->xss_clean(strip_tags($this->input->post('nrp'))),
                            'email'             => $this->security->xss_clean(strip_tags($this->input->post('email'))),
                            'form_bimbingan1'   => $form_bimbingan1,
                            'form_bimbingan2'   => $form_bimbingan2,
                            'form_persetujuan'  => $form_persetujuan,
                            'laporan_tesis'     => $laporan_tesis,
                            'berita_acara'      => $berita_acara,
                            'status'            => 0, #STATUS MENUJU VERIFIKASI
                            'updated_at'        => date('Y-m-d H:i:s'),
                        );

                $this->Daftarpengajuan_model->updateDaftarPengajuan($id_pengajuan, $update);
            }
            else 
            {
                # PROSES KE TABEL pendaftaransidangtesis
                $insert = array(
                            'user_id'           => $this->session->userdata('user_logged')->user_id,
                            'nama_mahasiswa'    => $this->security->xss_clean(strip_tags($this->input->post('nama_mahasiswa'))),
                            'judul_tesis'       => $this->security->xss_clean(strip_tags($this->input->post('judul_tesis'))),
                            'nrp'               => $this->security->xss_clean(strip_tags($this->input->post('nrp'))),
                            'email'             => $this->security->xss_clean(strip_tags($this->input->post('email'))),
                            'form_bimbingan1'   => $form_bimbingan1,
                            'form_bimbingan2'   => $form_bimbingan2,
                            'form_persetujuan'  => $form_persetujuan,
                            'laporan_tesis'     => $laporan_tesis,
                            'berita_acara'      => $berita_acara,
                            'status'            => 0, #STATUS MENUJU VERIFIKASI
                            'created_at'        => date('Y-m-d H:i:s'),
                        );

                $id_pengajuan = $this->Daftarpengajuan_model->createDaftarPengajuan($insert);
            }

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

                redirect('pendaftaransidangtesis');
            }
            else
            {
                $this->db->trans_commit();           

                redirect('pendaftaransidangtesis/simpan/' . encode($id_pengajuan));
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

            redirect('dashboard');
        }

        $status = $edit->status;

        # JIKA DI POST SUBMIT
        if($this->input->post())
        {
            $status = 1; #STATUS DISUBMIT
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
                    
                    'title'                 => 'Form Pendaftaran Sidang Tesis',
                    'contents'              => $this->contents . 'simpan',
                );

        $this->load->view($this->layouts, $data);
    }

    function _cek_upload($param, $kolom)
    {
        if($_FILES[$kolom]['size'] != 0)
        {            
            $path_upload = './uploads/pendaftaransidangtesis/';

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
                if($kolom == 'form_bimbingan1')
                {
                    $this->form_bimbingan1['file'] =  $this->upload->data();
                }
                else if($kolom == 'form_bimbingan2')
                {
                    $this->form_bimbingan2['file'] =  $this->upload->data();
                }
                else if($kolom == 'form_persetujuan')
                {
                    $this->form_persetujuan['file'] =  $this->upload->data();
                }
                else if($kolom == 'laporan_tesis')
                {
                    $this->laporan_tesis['file'] =  $this->upload->data();
                }
                else if($kolom == 'berita_acara')
                {
                    $this->berita_acara['file'] =  $this->upload->data();
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
