<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruangan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->library(array('form_validation','pagination'));
        $this->load->helper(array('form', 'file', 'security', 'app_content'));
        $this->load->model(array('Ruangan_model', 'User_model'));

        # CEK LOGIN
        if($this->User_model->isNotLogin()) redirect(site_url('login'));

        # JUMLAH HALAMAN PAGINATION
        $this->limit    = 10;

        # LAYOUT VIEWS
        $this->layouts  = 'template/backoffice';
        $this->contents = 'ruangan/';
    }

    public function index()
    {
        if($this->input->post('reset_search_ruangan'))
        {
            $this->session->unset_userdata('search_ruangan');
        }

        if($this->input->post('search_ruangan'))
        {
            $search_ruangan = $this->input->post('search_ruangan');
            $this->session->set_userdata('search_ruangan', $search_ruangan);
        }
        else if($this->session->userdata('search_ruangan'))
        {
            $search_ruangan = $this->session->userdata('search_ruangan');
        }
        else 
        {
            $search_ruangan = null;
        }

        $config['base_url']         = base_url('ruangan/index');
        $config['total_rows']       = $this->Ruangan_model->getRuanganAll($search_ruangan, $total = true);
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
                    'ruangan'         => $this->Ruangan_model->getRuanganAll($search_ruangan, $total = false, $config["per_page"], $page),
                    'pagination'    => $this->pagination->create_links(),
                    'title'         => 'Daftar Ruangan',
                    'contents'       => $this->contents . 'index',
                );

        $this->load->view($this->layouts, $data);
    }

    public function createRuangan()
    {        
        if($this->input->post('kode_ruangan'))
        {
            $this->form_validation->set_rules('kode_ruangan', 'Kode ruangan', 'trim|required|xss_clean|is_unique[ruangan.kode_ruangan]');
        } 
        else
        {
            $this->form_validation->set_rules('kode_ruangan', 'Kode ruangan', 'trim|required|xss_clean');
        }

        $this->form_validation->set_rules('nama_ruangan', 'Nama ruangan', 'trim|required|xss_clean');

        $this->form_validation->set_message('required', '{field} wajib diisi!');
        $this->form_validation->set_message('is_unique', '{field} sudah tersedia!');

        if($this->form_validation->run() == FALSE)
        {            
            $data = array(
                'title'     => 'Form Tambah Ruangan',
                'contents'  => $this->contents . 'createRuangan',
            );

            $this->load->view($this->layouts, $data);
        }
        else
        {
            $insert = array(
                'nama_ruangan'  => $this->security->xss_clean(strip_tags($this->input->post('nama_ruangan'))),
                'kode_ruangan'  => $this->security->xss_clean(strip_tags($this->input->post('kode_ruangan'))),
                'created_at'    => date('Y-m-d H:i:s'),
            );

            $this->db->trans_start();

            $this->Ruangan_model->createRuangan($insert);

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

            redirect('ruangan');
        }
    }

    function updateRuangan($id_ruangan = null)
    {
        if(!$id_ruangan)
        {
            $this->session->set_flashdata('warning', 'Data tidak tersedia!');
            redirect('ruangan');
        }

        $id_ruangan = decode($id_ruangan);
        
        $this->form_validation->set_rules('nama_ruangan', 'Nama ruangan', 'trim|required|xss_clean');
        $this->form_validation->set_rules('kode_ruangan', 'Kode ruangan', 'trim|required|xss_clean');
            
        $this->form_validation->set_message('required', '{field} wajib diisi!');

        if($this->form_validation->run() == FALSE)
        {            
            $ubah = $this->Ruangan_model->viewDetailRuangan($id_ruangan);

            if(!$ubah)
            {
                $this->session->set_flashdata('warning', 'Data tidak tersedia!');
                redirect('ruangan');
            }

            $data = array(
                'ubah'      => $ubah,
                'title'     => 'Form Ubah Ruangan',
                'contents'  => $this->contents . 'updateRuangan',
            );

            $this->load->view($this->layouts, $data);
        } 
        else
        {
            $update = array(
                'nama_ruangan'  => $this->security->xss_clean(strip_tags($this->input->post('nama_ruangan'))),
                'kode_ruangan'  => $this->security->xss_clean(strip_tags($this->input->post('kode_ruangan'))),
                'updated_at'    => date('Y-m-d H:i:s'),
            );

            $this->db->trans_start();

            $this->Ruangan_model->updateRuangan($id_ruangan, $update);

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

            redirect('ruangan');
        }
    }

    public function deleteRuangan($id)
    {
        $id = decode($id);
        
        $this->db->trans_start();
        
        $this->Ruangan_model->deleteRuangan($id);

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

        redirect('ruangan');
    }
}