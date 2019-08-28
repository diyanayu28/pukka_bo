<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_akun extends CI_Model {
	public function tampil(){
        $lihat = $this->db->get('tuser');
		return $lihat->result();
	}
	public	function aksi_tambah($data){
		$this->db->insert('tuser',$data);
	}
}
