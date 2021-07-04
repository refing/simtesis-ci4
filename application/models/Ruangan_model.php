<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ruangan_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function getRuanganAll($search_ruangan, $total = false, $limit = 0, $offset = 0)
    {
        $where = '1=1';

        $this->db->select('t1.*');

        if($search_ruangan)
        {
            $where .= " AND (
                            t1.id_ruangan LIKE '%".$search_ruangan."%'
                            OR t1.nama_ruangan LIKE '%".$search_ruangan."%'
                        )
                        ";
        }

        $this->db->where($where);
        $this->db->from('ruangan as t1');
        

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

    function getAllRuangan()
    {
        $this->db->select('t1.*');
        $this->db->from('ruangan as t1');
        $this->db->order_by('t1.nama_ruangan', 'ASC');

        return $this->db->get()->result();
    }

    function viewDetailRuangan($id_ruangan)
    {
        return $this->db->get_where('ruangan', array('id_ruangan' => $id_ruangan))->row();
    }

    function updateRuangan($id_ruangan, $data)
    {
        return $this->db->update('ruangan', $data, array('id_ruangan' => $id_ruangan));
    }
    
    function createRuangan($data)
    {
        $this->db->insert('ruangan', $data);
        return $this->db->insert_id();
    }

    function deleteRuangan($id_ruangan)
    {
        return $this->db->delete('ruangan', array('id_ruangan' => $id_ruangan));
    }
}