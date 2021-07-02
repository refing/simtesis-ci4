<?php

class Nilai_model extends CI_Model
{
    private $_table = "user";
    public $user_id;
    public $nama;
    public $nrp;
    public $judul;
    public $dosbing1;
    public $dosbing2;
    public $statusyudisium;
    
    public function getAllMahasiswa()
    {
        return $this->db->get_where('user',['role'=>'mahasiswa'])->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["user_id" => $id])->row();
    }
    
    public function ubah()
    {
        $post = $this->input->post();
        $this->statusyudisium = $post["statusyudisium"];
        $this->db->update($this->_table, $this, array('user_id' => $post['user_id']));
    }

    public function updates()
    {
        $post = $this->input->post();
        // $this->user_id = $post["user_id"];
        $this->nama = $post["nama"];
        // $this->nrp = $post["nrp"];
        // $this->judul = $post["judul"];
        // $this->dosbing1 = $post["dosbing1"];
        // $this->dosbing2 = $post["dosbing2"];
		// $this->statusyudisium = $post["statusyudisium"];
		
        $this->db->update($this->_table, $this, array('user_id' => $post['user_id']));
    }

    public function update()
    {
        $user_id = $this->input->post('user_id');
        $status = $this->input->post('status');
        $data = array(
            'statusyudisium' => $status,
        );
        $this->db->where('user_id',$user_id);
        $this->db->update('user',$data);
        
    }
    
    

}