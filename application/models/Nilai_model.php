<?php

class Nilai_model extends CI_Model
{
    private $_table = "user";
    public $user_id;
    public $nama;
    public $nrp;
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

    public function update()
    {
        $post = $this->input->post();
        $this->product_id = $post["id"];
        $this->name = $post["name"];
		$this->price = $post["price"];
		
		
		if (!empty($_FILES["image"]["name"])) {
            $this->image = $this->_uploadImage();
        } else {
            $this->image = $post["old_image"];
		}

        $this->description = $post["description"];
        $this->db->update($this->_table, $this, array('product_id' => $post['id']));
    }
    
    

}