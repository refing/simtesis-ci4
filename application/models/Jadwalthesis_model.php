<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwalthesis_model extends CI_Model {

    function __construct()
    {
        parent::__construct();

        $this->user_id      = @$this->session->userdata('user_logged')->user_id;
        $this->user_role    = @$this->session->userdata('user_logged')->role;
    }

    function viewDetailJadwal($id_jadwal)
    {
        $sql = "SELECT t1.*
                    , t2.nama_mahasiswa
                    , t2.nrp
                    , t2.email
                    , t2.judul_tesis
                    , t2.status
                    , t3.kode_ruangan
                    , t3.nama_ruangan
                    , t4.nama_dosen as dosbing1
                    , t5.nama_dosen as dosbing2
                    , t6.nama_dosen as penguji1
                    , t7.nama_dosen as penguji2
                    , t8.nama_dosen as penguji3
                FROM jadwalthesis as t1
                JOIN daftarpengajuan as t2 ON t1.id_pengajuan = t2.id_pengajuan
                JOIN ruangan as t3 ON t1.id_ruangan = t3.id_ruangan
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
                WHERE t1.id_jadwal = '".$id_jadwal."'                
                ";
        return $this->db->query($sql)->row();
    }

    function updateJadwal($id_jadwal, $data)
    {
        return $this->db->update('jadwalthesis', $data, array('id_jadwal' => $id_jadwal));
    }
    
    function createJadwal($data)
    {
        $this->db->insert('jadwalthesis', $data);
        return $this->db->insert_id();
    }

    function deleteJadwal($id_jadwal)
    {
        return $this->db->delete('jadwalthesis', array('id_jadwal' => $id_jadwal));
    }

    /*
    |--------------------------------------------------------------------------
    | UNTUK HALAMAN JADWAL SIDANG TESIS
    |--------------------------------------------------------------------------
    */
    function getTotalJadwalSidangTesisAll($search_jadwal)
    {
        $where = '1=1';

        if($search_jadwal)
        {
            $where .= " AND (
                            t1.id_jadwal LIKE '%".$search_jadwal."%'
                            OR DATE_FORMAT(t1.jadwal_sidang,'%d %b %Y') LIKE '%".$search_jadwal."%'
                            OR DATE_FORMAT(t1.jam_sidang,'%H %i %s') LIKE '%".$search_jadwal."%'
                            OR t2.nama_mahasiswa LIKE '%".$search_jadwal."%'
                            OR t2.nrp LIKE '%".$search_jadwal."%'
                            OR t2.email LIKE '%".$search_jadwal."%'
                            OR t2.judul_tesis LIKE '%".$search_jadwal."%'
                            OR t3.kode_ruangan LIKE '%".$search_jadwal."%'
                            OR t3.nama_ruangan LIKE '%".$search_jadwal."%'
                        )
                        ";
        }

        # JIKA ROLE MAHASISWA, MAKA BERDASARKAN PENGAJUANNYA
        if ($this->user_role == 'mahasiswa'):
            $where .= ' AND t2.user_id = "'.$this->user_id.'" ';
        endif;

        $sql = "SELECT t1.id_jadwal
                FROM jadwalthesis as t1
                JOIN daftarpengajuan as t2 ON t1.id_pengajuan = t2.id_pengajuan
                JOIN ruangan as t3 ON t1.id_ruangan = t3.id_ruangan
                WHERE ".$where."
                ";

        return $this->db->query($sql)->num_rows();
    }

    function getJadwalAll($search_jadwal, $limit, $offset)
    {
        $where = '1=1';

        if($search_jadwal)
        {
            $where .= " AND (
                            t1.id_jadwal LIKE '%".$search_jadwal."%'
                            OR DATE_FORMAT(t1.jadwal_sidang,'%d %b %Y') LIKE '%".$search_jadwal."%'
                            OR DATE_FORMAT(t1.jam_sidang,'%H %i %s') LIKE '%".$search_jadwal."%'
                            OR t2.nama_mahasiswa LIKE '%".$search_jadwal."%'
                            OR t2.nrp LIKE '%".$search_jadwal."%'
                            OR t2.email LIKE '%".$search_jadwal."%'
                            OR t2.judul_tesis LIKE '%".$search_jadwal."%'
                            OR t3.kode_ruangan LIKE '%".$search_jadwal."%'
                            OR t3.nama_ruangan LIKE '%".$search_jadwal."%'
                        )
                        ";
        }

        # JIKA ROLE MAHASISWA, MAKA BERDASARKAN PENGAJUANNYA
        if ($this->user_role == 'mahasiswa'):
            $where .= ' AND t2.user_id = "'.$this->user_id.'" ';
        endif;

        $sql = "SELECT t1.id_jadwal
                    , t1.jadwal_sidang
                    , t1.jam_sidang
                    , t2.nama_mahasiswa
                    , t2.nrp
                    , t2.email
                    , t2.judul_tesis
                    , t2.status
                    , t3.kode_ruangan
                    , t3.nama_ruangan
                    , t4.nama_dosen as dosbing1
                    , t5.nama_dosen as dosbing2
                    , t6.nama_dosen as penguji1
                    , t7.nama_dosen as penguji2
                    , t8.nama_dosen as penguji3
                FROM jadwalthesis as t1
                JOIN daftarpengajuan as t2 ON t1.id_pengajuan = t2.id_pengajuan
                JOIN ruangan as t3 ON t1.id_ruangan = t3.id_ruangan
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