<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class nilaithesis_model extends CI_Model {

    function __construct()
    {
        parent::__construct();

        $this->user_id      = @$this->session->userdata('user_logged')->user_id;
        $this->user_role    = @$this->session->userdata('user_logged')->role;
    }

    function viewDetailNilai($id_nilai)
    {
        $sql = "SELECT t1.*
                    , t2.nama_mahasiswa
                    , t2.nrp
                    , t2.email
                    , t2.judul_tesis
                    , t4.nama_dosen as dosbing1
                    , t5.nama_dosen as dosbing2
                    , t6.nama_dosen as penguji1
                    , t7.nama_dosen as penguji2
                    , t8.nama_dosen as penguji3
                FROM nilaithesis as t1
                JOIN daftarpengajuan as t2 ON t1.id_pengajuan = t2.id_pengajuan
                LEFT JOIN (
                    SELECT xa.id_pengajuan
                            , xb.nama_dosen
                    FROM daftarpengajuandosen as xa
                    JOIN dosen as xb ON xa.id_dosen = xb.id_dosen
                    WHERE xa.kategori_dosen = 'dosen_pembimbing_1'
                    GROUP BY xa.id_pengajuan
                ) as t4 ON t2.id_pengajuan = t4.id_pengajuan
                LEFT JOIN (
                    SELECT xa.id_pengajuan
                            , xb.nama_dosen
                    FROM daftarpengajuandosen as xa
                    JOIN dosen as xb ON xa.id_dosen = xb.id_dosen
                    WHERE xa.kategori_dosen = 'dosen_pembimbing_2'
                    GROUP BY xa.id_pengajuan
                ) as t5 ON t2.id_pengajuan = t5.id_pengajuan
                LEFT JOIN (
                    SELECT xa.id_pengajuan
                            , xb.nama_dosen
                    FROM daftarpengajuandosen as xa
                    JOIN dosen as xb ON xa.id_dosen = xb.id_dosen
                    WHERE xa.kategori_dosen = 'dosen_penguji_1'
                    GROUP BY xa.id_pengajuan
                ) as t6 ON t2.id_pengajuan = t6.id_pengajuan
                LEFT JOIN (
                    SELECT xa.id_pengajuan
                            , xb.nama_dosen
                    FROM daftarpengajuandosen as xa
                    JOIN dosen as xb ON xa.id_dosen = xb.id_dosen
                    WHERE xa.kategori_dosen = 'dosen_penguji_2'
                    GROUP BY xa.id_pengajuan
                ) as t7 ON t2.id_pengajuan = t7.id_pengajuan
                LEFT JOIN (
                    SELECT xa.id_pengajuan
                            , xb.nama_dosen
                    FROM daftarpengajuandosen as xa
                    JOIN dosen as xb ON xa.id_dosen = xb.id_dosen
                    WHERE xa.kategori_dosen = 'dosen_penguji_3'
                    GROUP BY xa.id_pengajuan
                ) as t8 ON t2.id_pengajuan = t8.id_pengajuan
                WHERE t1.id_nilai = '".$id_nilai."'                
                ";
        return $this->db->query($sql)->row();
    }

    function updateNilai($id_nilai, $data)
    {
        return $this->db->update('nilaithesis', $data, array('id_nilai' => $id_nilai));
    }
    
    function createNilai($data)
    {
        $this->db->insert('nilaithesis', $data);
        return $this->db->insert_id();
    }

    function deleteNilai($id_nilai)
    {
        return $this->db->delete('nilaithesis', array('id_nilai' => $id_nilai));
    }

    /*
    |--------------------------------------------------------------------------
    | UNTUK HALAMAN NILAI SIDANG TESIS
    |--------------------------------------------------------------------------
    */
    function getNilaiAll($search_nilai, $total = false, $limit = 0, $offset = 0)
    {
        $where = '1=1';

        if($search_nilai)
        {
            $where .= " AND (
                            t1.id_nilai LIKE '%".$search_nilai."%'
                            OR t2.nama_mahasiswa LIKE '%".$search_nilai."%'
                            OR t2.nrp LIKE '%".$search_nilai."%'
                            OR t2.email LIKE '%".$search_nilai."%'
                            OR t2.judul_tesis LIKE '%".$search_nilai."%'
                            OR t4.nama_dosen LIKE '%".$search_nilai."%'
                            OR t5.nama_dosen LIKE '%".$search_nilai."%'
                            OR t6.nama_dosen LIKE '%".$search_nilai."%'
                            OR t7.nama_dosen LIKE '%".$search_nilai."%'
                            OR t8.nama_dosen LIKE '%".$search_nilai."%'
                        )
                        ";
        }

        # JIKA ROLE MAHASISWA, MAKA BERDASARKAN PENGAJUANNYA
        if ($this->user_role == 'mahasiswa'):
            $where .= ' AND t2.user_id = "'.$this->user_id.'" ';
        endif;

        $sql = "SELECT t1.id_nilai
                    , t1.nilai
                    , t1.status_finalthesis
                    , t2.nama_mahasiswa
                    , t2.nrp
                    , t2.email
                    , t2.judul_tesis
                    , t4.nama_dosen as dosbing1
                    , t5.nama_dosen as dosbing2
                    , t6.nama_dosen as penguji1
                    , t7.nama_dosen as penguji2
                    , t8.nama_dosen as penguji3
                FROM nilaithesis as t1
                JOIN daftarpengajuan as t2 ON t1.id_pengajuan = t2.id_pengajuan
                LEFT JOIN (
                    SELECT xa.id_pengajuan
                            , xb.nama_dosen
                    FROM daftarpengajuandosen as xa
                    JOIN dosen as xb ON xa.id_dosen = xb.id_dosen
                    WHERE xa.kategori_dosen = 'dosen_pembimbing_1'
                    GROUP BY xa.id_pengajuan
                ) as t4 ON t2.id_pengajuan = t4.id_pengajuan
                LEFT JOIN (
                    SELECT xa.id_pengajuan
                            , xb.nama_dosen
                    FROM daftarpengajuandosen as xa
                    JOIN dosen as xb ON xa.id_dosen = xb.id_dosen
                    WHERE xa.kategori_dosen = 'dosen_pembimbing_2'
                    GROUP BY xa.id_pengajuan
                ) as t5 ON t2.id_pengajuan = t5.id_pengajuan
                LEFT JOIN (
                    SELECT xa.id_pengajuan
                            , xb.nama_dosen
                    FROM daftarpengajuandosen as xa
                    JOIN dosen as xb ON xa.id_dosen = xb.id_dosen
                    WHERE xa.kategori_dosen = 'dosen_penguji_1'
                    GROUP BY xa.id_pengajuan
                ) as t6 ON t2.id_pengajuan = t6.id_pengajuan
                LEFT JOIN (
                    SELECT xa.id_pengajuan
                            , xb.nama_dosen
                    FROM daftarpengajuandosen as xa
                    JOIN dosen as xb ON xa.id_dosen = xb.id_dosen
                    WHERE xa.kategori_dosen = 'dosen_penguji_2'
                    GROUP BY xa.id_pengajuan
                ) as t7 ON t2.id_pengajuan = t7.id_pengajuan
                LEFT JOIN (
                    SELECT xa.id_pengajuan
                            , xb.nama_dosen
                    FROM daftarpengajuandosen as xa
                    JOIN dosen as xb ON xa.id_dosen = xb.id_dosen
                    WHERE xa.kategori_dosen = 'dosen_penguji_3'
                    GROUP BY xa.id_pengajuan
                ) as t8 ON t2.id_pengajuan = t8.id_pengajuan
                WHERE ".$where."
                ORDER BY t1.created_at DESC
                ";

        if($total)
        {
            return $this->db->query($sql)->num_rows();
        }
        else 
        {
            if($limit && $offset)
            {
                $sql .= " LIMIT " . $offset . ', ' . $limit;
            }
            else 
            {
                $sql .= " LIMIT " . $limit;
            }

            return $this->db->query($sql)->result();
        }
    }
}