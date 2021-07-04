<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function getDosenAll($search_dosen, $total = false, $limit = 0, $offset = 0)
    {
        $where = '1=1';

        $this->db->select('t1.*');

        if($search_dosen)
        {
            $where .= " AND (
                            t1.id_dosen LIKE '%".$search_dosen."%'
                            OR t1.nama_dosen LIKE '%".$search_dosen."%'
                        )
                        ";
        }

        $this->db->where($where);
        $this->db->from('dosen as t1');
        

        if($total)
        {
            return $this->db->get()->num_rows();
        }
        else 
        {
            $this->db->limit($limit, $offset);
            return $this->db->get()->result();
        }
    }

    function getDosenPembimbing()
    {
        $this->db->select('t1.*');
        $this->db->from('dosen as t1');
        $this->db->order_by('t1.nama_dosen', 'ASC');

        return $this->db->get()->result();
    }

    function getDosenPenguji()
    {
        $this->db->select('t1.*');
        $this->db->from('dosen as t1');
        $this->db->order_by('t1.nama_dosen', 'ASC');

        return $this->db->get()->result();
    }

    function viewDetailDosen($id_dosen)
    {
        return $this->db->get_where('dosen', array('id_dosen' => $id_dosen))->row();
    }

    function updateDosen($id_dosen, $data)
    {
        return $this->db->update('dosen', $data, array('id_dosen' => $id_dosen));
    }
    
    function createDosen($data)
    {
        $this->db->insert('dosen', $data);
        return $this->db->insert_id();
    }

    function deleteDosen($id_dosen)
    {
        return $this->db->delete('dosen', array('id_dosen' => $id_dosen));
    }
}