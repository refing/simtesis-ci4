<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->library(array('form_validation','pagination'));
        $this->load->helper(array('form', 'file', 'security', 'app_content'));
        $this->load->model(array('Dosen_model', 'User_model'));

        # CEK LOGIN
        if($this->User_model->isNotLogin()) redirect(site_url('login'));

        # JUMLAH HALAMAN PAGINATION
        $this->limit    = 10;

        # LAYOUT VIEWS
        $this->layouts  = 'template/backoffice';
        $this->contents = 'dosen/';
    }

    public function index()
    {
        if($this->input->post('reset_search_dosen'))
        {
            $this->session->unset_userdata('search_dosen');
        }

        if($this->input->post('search_dosen'))
        {
            $search_dosen = $this->input->post('search_dosen');
            $this->session->set_userdata('search_dosen', $search_dosen);
        }
        else if($this->session->userdata('search_dosen'))
        {
            $search_dosen = $this->session->userdata('search_dosen');
        }
        else 
        {
            $search_dosen = null;
        }

        $config['base_url']         = base_url('dosen/index');
        $config['total_rows']       = $this->Dosen_model->getDosenAll($search_dosen, $total = true);
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
                    'dosen'         => $this->Dosen_model->getDosenAll($search_dosen, $total = false, $config["per_page"], $page),
                    'pagination'    => $this->pagination->create_links(),
                    'title'         => 'Daftar Dosen',
                    'contents'       => $this->contents . 'index',
                );

        $this->load->view($this->layouts, $data);
    }

    public function createDosen()
    {        
        if($this->input->post('nama_dosen'))
        {
            $this->form_validation->set_rules('nama_dosen', 'Nama dosen', 'trim|required|xss_clean|is_unique[dosen.nama_dosen]');
        } 
        else
        {
            $this->form_validation->set_rules('nama_dosen', 'Nama dosen', 'trim|required|xss_clean');
        }
        $this->form_validation->set_rules('nip_dosen', 'NIP', 'trim|required|xss_clean');

        $this->form_validation->set_message('required', '{field} wajib diisi!');
        $this->form_validation->set_message('is_unique', '{field} sudah tersedia!');

        if($this->form_validation->run() == FALSE)
        {            
            $data = array(
                'title'     => 'Form Tambah Dosen',
                'contents'  => $this->contents . 'createDosen',
            );

            $this->load->view($this->layouts, $data);
        }
        else
        {
            $insert = array(
                'nama_dosen'    => $this->security->xss_clean(strip_tags($this->input->post('nama_dosen'))),
                'nip_dosen'     => $this->security->xss_clean(strip_tags($this->input->post('nip_dosen'))),
                'created_at'    => date('Y-m-d H:i:s'),
            );

            $this->db->trans_start();

            $this->Dosen_model->createDosen($insert);

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

            redirect('dosen');
        }
    }

    function updateDosen($id_dosen = null)
    {
        if(!$id_dosen)
        {
            $this->session->set_flashdata('warning', 'Data tidak tersedia!');
            redirect('dosen');
        }

        $id_dosen = decode($id_dosen);
        
        $this->form_validation->set_rules('nama_dosen', 'Nama dosen', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nip_dosen', 'NIP', 'trim|required|xss_clean');
            
        $this->form_validation->set_message('required', '{field} wajib diisi!');

        if($this->form_validation->run() == FALSE)
        {            
            $ubah = $this->Dosen_model->viewDetailDosen($id_dosen);

            if(!$ubah)
            {
                $this->session->set_flashdata('warning', 'Data tidak tersedia!');
                redirect('dosen');
            }

            $data = array(
                'ubah'      => $ubah,
                'title'     => 'Ubah Dosen',
                'contents'  => $this->contents . 'updateDosen',
            );

            $this->load->view($this->layouts, $data);
        } 
        else
        {
            $update = array(
                'nama_dosen'    => $this->security->xss_clean(strip_tags($this->input->post('nama_dosen'))),
                'nip_dosen'     => $this->security->xss_clean(strip_tags($this->input->post('nip_dosen'))),
                'updated_at'    => date('Y-m-d H:i:s'),
            );

            $this->db->trans_start();

            $this->Dosen_model->updateDosen($id_dosen, $update);

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

            redirect('dosen');
        }
    }

    public function deleteDosen($id)
    {
        $id = decode($id);
        
        $this->db->trans_start();
        
        $this->Dosen_model->deleteDosen($id);

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

        redirect('dosen');
    }
}