<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Akun extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->userId = $this->session->userdata('userId');
        
        //load model
        $this->load->model('user/m_user');
        $this->load->model('menu/m_setting');

        //message
        $this->pesanColorSuccess = "success";
        $this->pesanColorWarning = "warning";
        $this->pesanColorError = "danger";
        $this->pesanAddSuccess = "Data berhasil ditambahkan";
        $this->pesanAddError = "Data tidak berhasil ditambahkan";
        $this->pesanEditSuccess = "Data berhasil diubah";
        $this->pesanEditError = "Data tidak berhasil diubah";
        $this->pesanDeleteSuccess = "Data berhasil dihapus";
        $this->pesanDeleteError = "Data tidak berhasil dihapus";
        $this->pesanIconSuccess = "fa fa-check-circle";
        $this->pesanIconError = "fa fa-times-circle";
    }
    public function view() {        
        $msg = $this->session->userdata('pesan');
        $data_by_id = $this->m_user->getDataById($this->userId);
        $data = array(
                'msg' => $msg,
                'data_by_id' => $data_by_id
            );
        $this->layout->render('akun/view_akun', $data);
    }

    public function editPassword() {
        $msg = $this->session->userdata('pesan');
        $data_by_id = $this->m_user->getDataById($this->userId);
        $data = array(
                'msg' => $msg,
                'data_by_id' => $data_by_id
            );
        $this->layout->render('akun/ubah_password_akun', $data);
    }

    public function checkUsername(){
        if ($this->m_user->getUsername($_POST['username'])) {
            echo '<label class="text-danger"><span><i class="fa fa-times" aria-hidden="true">
                    </i> This user is already registered</span></label>';
        }else{
            echo '<label class="text-success"><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Username is available</span></label>';
        }
    }
    
    public function update($id=0){
        if (!empty($_FILES['foto']['name'])){
            $file=$_FILES['foto']['name'];
            $tmp_file=$_FILES['foto']['tmp_name'];
            $path = FCPATH.'files/akun/';
            unlink($path.$this->input->post('foto'));
            $random_name= date('dmysi');
            $explode = explode('.',$file);
            $extensi = $explode[count($explode)-1];
            $file_name = $random_name.".".$extensi;
            $upload = move_uploaded_file ($tmp_file, $path.$file_name);
        }else{
            $file_name = $this->input->post('foto');
            $upload = "";
        }
        $data=array(
            'realname' => $this->input->post('realname'),
            'username' => $this->input->post('username'),  
           // 'description' => $this->input->post('description'),    
            'active' => $this->input->post('active'),
            'groupId' => $this->input->post('groupId'),
            'foto' => $file_name,
            'userId' => $id
            );
        $result = $this->m_user->update($data);
        if($result == TRUE){    
            //pesan
            $params = array($result, $this->pesanIconSuccess, $this->pesanEditSuccess, $this->pesanColorSuccess);
            $this->session->set_userdata('pesan',$params); 
            redirect('akun/view',$data);
        }else{
            $params = array($result, $this->pesanIconError, $this->pesanEditError, $this->pesanColorError);
            $this->session->set_userdata('pesan',$params); 
            redirect('akun/view',$data);
        }
    }
    public function updatePassword($id=0){
        $data=array(
            'pass_old' => $this->input->post('pass_old'),
            'pass_new' => $this->input->post('pass_new'),  
            'pass_new_retype' => $this->input->post('pass_new_retype'),
            'id' => $id
            );
        $data_by_id = $this->m_user->getDataById($id);
        if($data_by_id->password != md5($data['pass_old'])){
            $params = array('1', $this->pesanIconError, 'Data gagal diubah, Kata Sandi Lama tidak sesuai', $this->pesanColorError);
            $this->session->set_userdata('pesan',$params); 
            redirect('akun/editPassword',$data);
        }elseif($data['pass_new'] != $data['pass_new_retype']){
            $params = array('1', $this->pesanIconError, 'Data gagal diubah, Kata Sandi Baru tidak sesuai', $this->pesanColorError);
            $this->session->set_userdata('pesan',$params); 
            redirect('akun/editPassword',$data);
        }else{
            $result = $this->m_user->updatePassword($data);
            if($result == TRUE){    
                //pesan
                $params = array($result, $this->pesanIconSuccess, $this->pesanEditSuccess, $this->pesanColorSuccess);
                $this->session->set_userdata('pesan',$params); 
                redirect('akun/editPassword',$data);
            }else{
                $params = array($result, $this->pesanIconError, $this->pesanEditError, $this->pesanColorError);
                $this->session->set_userdata('pesan',$params); 
                redirect('akun/editPassword',$data);
            }
        }
    }
    
}
