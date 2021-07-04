<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftarpengajuandosen_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function viewDetailPengajuanDosenPenguji($id_pengajuan, $kategori_dosen)
    {
        $this->db->select('t1.*, t2.nama_dosen');
        $this->db->join('dosen as t2', 't1.id_dosen = t2.id_dosen');
        $this->db->where('t1.id_pengajuan', $id_pengajuan);
        $this->db->where('t1.kategori_dosen', $kategori_dosen);
        $this->db->from('daftarpengajuandosen as t1');

        return $this->db->get()->row();
    }

    function viewDetailPengajuanDosenPembimbing($id_pengajuan, $kategori_dosen)
    {
        $this->db->select('t1.*, t2.nama_dosen');
        $this->db->join('dosen as t2', 't1.id_dosen = t2.id_dosen');
        $this->db->where('t1.id_pengajuan', $id_pengajuan);
        $this->db->where('t1.kategori_dosen', $kategori_dosen);
        $this->db->from('daftarpengajuandosen as t1');

        return $this->db->get()->row();
    }
    
    function createDaftarPengajuanDosen($data)
    {
        $this->db->insert('daftarpengajuandosen', $data);
        return $this->db->insert_id();
    }

    function deleteDaftarPengajuanDosen($id_pengajuan)
    {
        return $this->db->delete('daftarpengajuandosen', array('id_pengajuan' => $id_pengajuan));
    }
}