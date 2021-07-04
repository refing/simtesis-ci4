<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftarpengajuan_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function viewDetailPengajuanUser($user_id)
    {
        $where = ' 1=1 AND (t1.status > 0)';

        $this->db->select('t1.*');
        $this->db->where($where);
        $this->db->where('t1.user_id', $user_id);
        $this->db->from('daftarpengajuan as t1');
        
        return $this->db->get()->row();
    }

    function viewDetailBerksaSidang($user_id)
    {
        $where = ' 1=1 AND (t1.status >= 4)';

        $this->db->select('t1.*');
        $this->db->where($where);
        $this->db->where('t1.user_id', $user_id);
        $this->db->from('daftarpengajuan as t1');
        
        return $this->db->get()->row();
    }

    function viewDetailPengajuan($id_pengajuan)
    {
        return $this->db->get_where('daftarpengajuan', array('id_pengajuan' => $id_pengajuan))->row();
    }

    function updateDaftarPengajuan($id_pengajuan, $data)
    {
        return $this->db->update('daftarpengajuan', $data, array('id_pengajuan' => $id_pengajuan));
    }
    
    function createDaftarPengajuan($data)
    {
        $this->db->insert('daftarpengajuan', $data);
        return $this->db->insert_id();
    }

    function getPengajuanSiapSidang()
    {
        $this->db->select('t1.*');
        $this->db->where('t1.status', 3);
        $this->db->from('daftarpengajuan as t1');
        $this->db->order_by('t1.nama_mahasiswa' ,'ASC');
        
        return $this->db->get()->result();
    }

    function getPengajuanSiapNilai()
    {
        $this->db->select('t1.*');
        $this->db->where('t1.status', 8);
        $this->db->from('daftarpengajuan as t1');
        $this->db->order_by('t1.nama_mahasiswa' ,'ASC');
        
        return $this->db->get()->result();
    }

    /*
    |--------------------------------------------------------------------------
    | UNTUK HALAMAN PENDAFTAR SIDANG TESIS
    |--------------------------------------------------------------------------
    */
    function getPengajuanAll($search_pendaftar_sidang_tesis, $status_pendaftar_sidang_tesis, $total = false, $limit = 0, $offset = 0)
    {
        $where = '1=1';

        if($search_pendaftar_sidang_tesis)
        {
            $where .= " AND (
                            t1.id_pengajuan LIKE '%".$search_pendaftar_sidang_tesis."%'
                            OR t1.nama_mahasiswa LIKE '%".$search_pendaftar_sidang_tesis."%'
                            OR t1.nrp LIKE '%".$search_pendaftar_sidang_tesis."%'
                            OR t1.email LIKE '%".$search_pendaftar_sidang_tesis."%'
                            OR t1.judul_tesis LIKE '%".$search_pendaftar_sidang_tesis."%'
                            OR t2.nama_dosen LIKE '%".$search_pendaftar_sidang_tesis."%'
                            OR t3.nama_dosen LIKE '%".$search_pendaftar_sidang_tesis."%'
                        )
                        ";
        }

        if($status_pendaftar_sidang_tesis)
        {
            $where .= " AND t1.status = '".$status_pendaftar_sidang_tesis."' ";
        }

        $sql = "SELECT t1.*
                    , t2.nama_dosen as dosbing1
                    , t3.nama_dosen as dosbing2
                FROM daftarpengajuan as t1
                LEFT JOIN (
                    SELECT xa.id_pengajuan
                            , xb.nama_dosen
                    FROM daftarpengajuandosen as xa
                    JOIN dosen as xb ON xa.id_dosen = xb.id_dosen
                    WHERE xa.kategori_dosen = 'dosen_pembimbing_1'
                    GROUP BY xa.id_pengajuan
                ) as t2 ON t1.id_pengajuan = t2.id_pengajuan
                LEFT JOIN (
                    SELECT xa.id_pengajuan
                            , xb.nama_dosen
                    FROM daftarpengajuandosen as xa
                    JOIN dosen as xb ON xa.id_dosen = xb.id_dosen
                    WHERE xa.kategori_dosen = 'dosen_pembimbing_2'
                    GROUP BY xa.id_pengajuan
                ) as t3 ON t1.id_pengajuan = t3.id_pengajuan
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

    /*
    |--------------------------------------------------------------------------
    | UNTUK HALAMAN BERKAS SIDANG TESIS
    |--------------------------------------------------------------------------
    */

    function getBerkasSidangTesisAll($search_berkas_sidang_tesis, $status_berkas_sidang_tesis, $total = false, $limit = 0, $offset = 0)
    {
        $where = '1=1';

        if($search_berkas_sidang_tesis)
        {
            $where .= " AND (
                            t1.id_pengajuan LIKE '%".$search_berkas_sidang_tesis."%'
                            OR t1.nama_mahasiswa LIKE '%".$search_berkas_sidang_tesis."%'
                            OR t1.nrp LIKE '%".$search_berkas_sidang_tesis."%'
                            OR t1.email LIKE '%".$search_berkas_sidang_tesis."%'
                            OR t1.judul_tesis LIKE '%".$search_berkas_sidang_tesis."%'
                            OR t2.nama_dosen LIKE '%".$search_berkas_sidang_tesis."%'
                            OR t3.nama_dosen LIKE '%".$search_berkas_sidang_tesis."%'
                            OR t4.nama_dosen LIKE '%".$search_berkas_sidang_tesis."%'
                            OR t5.nama_dosen LIKE '%".$search_berkas_sidang_tesis."%'
                            OR t6.nama_dosen LIKE '%".$search_berkas_sidang_tesis."%'
                        )
                        ";
        }

        if($status_berkas_sidang_tesis)
        {
            $where .= " AND t1.status = '".$status_berkas_sidang_tesis."' ";
        }
        else 
        {
            $where .= " AND t1.status >= 6 ";
        }

        $sql = "SELECT t1.*
                    , t2.nama_dosen as dosbing1
                    , t3.nama_dosen as dosbing2
                    , t4.nama_dosen as penguji1
                    , t5.nama_dosen as penguji2
                    , t6.nama_dosen as penguji3
                FROM daftarpengajuan as t1
                LEFT JOIN (
                    SELECT xa.id_pengajuan
                            , xb.nama_dosen
                    FROM daftarpengajuandosen as xa
                    JOIN dosen as xb ON xa.id_dosen = xb.id_dosen
                    WHERE xa.kategori_dosen = 'dosen_pembimbing_1'
                    GROUP BY xa.id_pengajuan
                ) as t2 ON t1.id_pengajuan = t2.id_pengajuan
                LEFT JOIN (
                    SELECT xa.id_pengajuan
                            , xb.nama_dosen
                    FROM daftarpengajuandosen as xa
                    JOIN dosen as xb ON xa.id_dosen = xb.id_dosen
                    WHERE xa.kategori_dosen = 'dosen_pembimbing_2'
                    GROUP BY xa.id_pengajuan
                ) as t3 ON t1.id_pengajuan = t3.id_pengajuan
                LEFT JOIN (
                    SELECT xa.id_pengajuan
                            , xb.nama_dosen
                    FROM daftarpengajuandosen as xa
                    JOIN dosen as xb ON xa.id_dosen = xb.id_dosen
                    WHERE xa.kategori_dosen = 'dosen_penguji_1'
                    GROUP BY xa.id_pengajuan
                ) as t4 ON t1.id_pengajuan = t4.id_pengajuan
                LEFT JOIN (
                    SELECT xa.id_pengajuan
                            , xb.nama_dosen
                    FROM daftarpengajuandosen as xa
                    JOIN dosen as xb ON xa.id_dosen = xb.id_dosen
                    WHERE xa.kategori_dosen = 'dosen_penguji_2'
                    GROUP BY xa.id_pengajuan
                ) as t5 ON t1.id_pengajuan = t5.id_pengajuan
                LEFT JOIN (
                    SELECT xa.id_pengajuan
                            , xb.nama_dosen
                    FROM daftarpengajuandosen as xa
                    JOIN dosen as xb ON xa.id_dosen = xb.id_dosen
                    WHERE xa.kategori_dosen = 'dosen_penguji_3'
                    GROUP BY xa.id_pengajuan
                ) as t6 ON t1.id_pengajuan = t6.id_pengajuan
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

    /*
    |--------------------------------------------------------------------------
    | UNTUK HALAMAN NILAI SIDANG TESIS
    |--------------------------------------------------------------------------
    */
    function getNilaiSidangTesisAll($search_nilai_sidang_tesis, $status_nilai_sidang_tesis, $total = false, $limit = 0, $offset = 0)
    {
        $where = '1=1';

        if($search_nilai_sidang_tesis)
        {
            $where .= " AND (
                            t1.id_pengajuan LIKE '%".$search_nilai_sidang_tesis."%'
                            OR t1.nama_mahasiswa LIKE '%".$search_nilai_sidang_tesis."%'
                            OR t1.nrp LIKE '%".$search_nilai_sidang_tesis."%'
                            OR t1.email LIKE '%".$search_nilai_sidang_tesis."%'
                            OR t1.judul_tesis LIKE '%".$search_nilai_sidang_tesis."%'
                            OR t2.nama_dosen LIKE '%".$search_nilai_sidang_tesis."%'
                            OR t3.nama_dosen LIKE '%".$search_nilai_sidang_tesis."%'
                            OR t4.nama_dosen LIKE '%".$search_nilai_sidang_tesis."%'
                            OR t5.nama_dosen LIKE '%".$search_nilai_sidang_tesis."%'
                            OR t6.nama_dosen LIKE '%".$search_nilai_sidang_tesis."%'
                            OR DATE_FORMAT(t7.jadwal_sidang,'%d %b %Y') LIKE '%".$search_nilai_sidang_tesis."%'
                            OR DATE_FORMAT(t7.jam_sidang,'%H %i %s') LIKE '%".$search_nilai_sidang_tesis."%'
                            OR t8.kode_ruangan LIKE '%".$search_nilai_sidang_tesis."%'
                            OR t8.nama_ruangan LIKE '%".$search_nilai_sidang_tesis."%'
                        )
                        ";
        }

        if($status_nilai_sidang_tesis)
        {
            $where .= " AND t1.status = '".$status_nilai_sidang_tesis."' ";
        }        
        else 
        {
            $where .= " AND t1.status >= 8 ";
        }

        $sql = "SELECT t1.*
                    , t2.nama_dosen as dosbing1
                    , t3.nama_dosen as dosbing2
                    , t4.nama_dosen as penguji1
                    , t5.nama_dosen as penguji2
                    , t6.nama_dosen as penguji3
                    , t7.jadwal_sidang
                    , t7.jam_sidang
                    , t8.kode_ruangan
                    , t8.nama_ruangan
                FROM daftarpengajuan as t1
                LEFT JOIN (
                    SELECT xa.id_pengajuan
                            , xb.nama_dosen
                    FROM daftarpengajuandosen as xa
                    JOIN dosen as xb ON xa.id_dosen = xb.id_dosen
                    WHERE xa.kategori_dosen = 'dosen_pembimbing_1'
                    GROUP BY xa.id_pengajuan
                ) as t2 ON t1.id_pengajuan = t2.id_pengajuan
                LEFT JOIN (
                    SELECT xa.id_pengajuan
                            , xb.nama_dosen
                    FROM daftarpengajuandosen as xa
                    JOIN dosen as xb ON xa.id_dosen = xb.id_dosen
                    WHERE xa.kategori_dosen = 'dosen_pembimbing_2'
                    GROUP BY xa.id_pengajuan
                ) as t3 ON t1.id_pengajuan = t3.id_pengajuan
                LEFT JOIN (
                    SELECT xa.id_pengajuan
                            , xb.nama_dosen
                    FROM daftarpengajuandosen as xa
                    JOIN dosen as xb ON xa.id_dosen = xb.id_dosen
                    WHERE xa.kategori_dosen = 'dosen_penguji_1'
                    GROUP BY xa.id_pengajuan
                ) as t4 ON t1.id_pengajuan = t4.id_pengajuan
                LEFT JOIN (
                    SELECT xa.id_pengajuan
                            , xb.nama_dosen
                    FROM daftarpengajuandosen as xa
                    JOIN dosen as xb ON xa.id_dosen = xb.id_dosen
                    WHERE xa.kategori_dosen = 'dosen_penguji_2'
                    GROUP BY xa.id_pengajuan
                ) as t5 ON t1.id_pengajuan = t5.id_pengajuan
                LEFT JOIN (
                    SELECT xa.id_pengajuan
                            , xb.nama_dosen
                    FROM daftarpengajuandosen as xa
                    JOIN dosen as xb ON xa.id_dosen = xb.id_dosen
                    WHERE xa.kategori_dosen = 'dosen_penguji_3'
                    GROUP BY xa.id_pengajuan
                ) as t6 ON t1.id_pengajuan = t6.id_pengajuan
                JOIN jadwalthesis as t7 ON t1.id_pengajuan = t7.id_pengajuan
                LEFT JOIN ruangan as t8 ON t7.id_ruangan = t8.id_ruangan
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