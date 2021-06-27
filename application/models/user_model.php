<?php

class User_model extends CI_Model
{
    private $_table = "user";
    public $user_id;
    public $nama;
    public $password;
    public $email;
    public $nrp;
    public $judul;
    public $dosbing1;
    public $dosbing2;
    public $role;
    
    public function save()
    {
        $post = $this->input->post();
        $this->nama = $post["nama"];
        $this->email = $post["email"];
        $this->password = password_hash($post["password"], PASSWORD_DEFAULT);
        $this->role = $post["role"] ?? "mahasiswa";
        $this->nrp = $post["nrp"];
        $this->judul = $post["judul"];
        $this->dosbing1 = $post["dosbing1"];
        $this->dosbing2 = $post["dosbing2"];
        $this->db->insert($this->_table, $this);
    }

    public function doLogin(){
		$post = $this->input->post();

        // cari user berdasarkan email dan username
        $this->db->where('email', $post["email"]);
                // ->or_where('username', $post["email"]);
        $user = $this->db->get($this->_table)->row();

        // jika user terdaftar
        if($user){
            // periksa password-nya
            $isPasswordTrue = password_verify($post["password"], $user->password);
            // periksa role-nya
            // $isAdmin = $user->role == "admin";

            // jika password benar dan dia admin
            // if($isPasswordTrue && $isAdmin){ 
            if($isPasswordTrue){ 
                // login sukses yay!
                $this->session->set_userdata(['user_logged' => $user]);
                $this->session->set_userdata(['role' => $user->role]);
                $this->_updateLastLogin($user->user_id);
                return true;
            }
        }
        
        // login gagal
		return false;
    }

    public function isNotLogin(){
        return $this->session->userdata('user_logged') === null;
    }

    private function _updateLastLogin($user_id){
        $sql = "UPDATE {$this->_table} SET last_login=now() WHERE user_id={$user_id}";
        $this->db->query($sql);
    }

    
    

}