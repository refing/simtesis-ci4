<?php

class Pendaftaran_model extends CI_Model
{
    private $_table = "berkasyudisium";
    public $user_id;
    public $pasfoto;
    public $toefl;
    public $transkrip;
    public $bebasbimbing;
    public $ijazah;
    public $formwisuda;
    public $bebaslab;
    public $bebasperpus;
    public $bebasrbsi;
    public $revisitesis;
    public $accjurnal;
    public $sertifseminar;
    public $fcseminar;
    public $datawisuda;
    
    public function getAllMahasiswa()
    {
        return $this->db->get_where('user',['role'=>'mahasiswa'])->result();
    }

    public function save()
    {
        $user_id = $this->input->post('user_id');
        $data = array(
            'user_id' => $user_id,
        );
        // $post = $this->input->post();
        // $this->user_id = $post["user_id"];
        // $this->pasfoto = $this->_uploadImage();
        // $this->toefl = $this->_uploadImage();
        // $this->transkrip = $post["transkrip"];
        // $this->bebasbimbing = $post["bebasbimbing"];
        // $this->ijazah = $post["ijazah"];
        // $this->formwisuda = $post["formwisuda"];
        // $this->bebaslab = $post["bebaslab"];
        // $this->bebasperpus = $post["bebasperpus"];
        // $this->bebasrbsi = $post["bebasrbsi"];
        // $this->revisitesis = $post["revisitesis"];
        // $this->accjurnal = $post["accjurnal"];
        // $this->sertifseminar = $post["sertifseminar"];
        // $this->fcseminar = $post["fcseminar"];
        // $this->datawisuda = $post["datawisuda"];

        // $this->image = $this->_uploadImage();
        // if (!empty($_FILES["image"]["name"])) {
        //     $this->image = $this->_uploadImage();
        // } else {
        //     $this->image = $post["old_image"];
		// }
        $this->db->insert('berkasyudisium', $data);
    }

    private function _uploadImage()
	{
		$config['upload_path']          = './upload/yudisium/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']            = $this->user_id;
		$config['overwrite']			= true;
		$config['max_size']             = 1024; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('image')) {
			return $this->upload->data("file_name");
		}
		
		return "default.jpg";
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