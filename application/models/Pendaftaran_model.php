<?php

class Pendaftaran_model extends CI_Model
{
    private $_table = "user";
    public $user_id;
    public $nama;
    public $nrp;
    public $judul;
    public $dosbing1;
    public $dosbing2;
    
    public function getAllMahasiswa()
    {
        return $this->db->get_where('user',['role'=>'mahasiswa'])->result();
    }

    // public function getMahasiswa()
    // {
    //     $result = $this->db->get_where('user',["user_id" => $this->session->userdata('user_logged')->user_id]);
    //     return $result;
    // }
    
    // public function read()
    // {
    //     $this->nama = $post["nama"];
    //     $this->email = $post["email"];
    //     $this->password = password_hash($post["password"], PASSWORD_DEFAULT);
    //     $this->role = $post["role"] ?? "mahasiswa";
    //     $this->nrp = $post["nrp"];
    //     $this->judul = $post["judul"];
    //     $this->dosbing1 = $post["dosbing1"];
    //     $this->dosbing2 = $post["dosbing2"];
    //     $this->db->insert($this->_table, $this);
    // }

    


    
    

}