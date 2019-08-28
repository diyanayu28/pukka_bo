<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends MY_Controller {

    public function __construct() {
        parent::__construct();
        
        
        $this->load->model('m_user');
        $this->load->model('menu/m_setting');
        //message
        $this->pesanColorSuccess = "success";
        $this->pesanColorWarning = "warning";
        $this->pesanColorError = "danger";
        $this->pesanAddSuccess = "Data Berhasil Ditambahkan";
        $this->pesanAddError = "Data Tidak Berhasil Ditambahkan";
        $this->pesanEditSuccess = "Data Berhasil Diubah";
        $this->pesanEditError = "Data Tidak Berhasil Diubah";
        $this->pesanDeleteSuccess = "Data Berhasil Dihapus";
        $this->pesanDeleteError = "Data Tidak Berhasil Dihapus";
        $this->pesanIconSuccess = "fa fa-check-circle";
        $this->pesanIconError = "fa fa-times-circle";
        $this->title = "Manajemen Pengguna";
    }


    public function add() {
        $msg = $this->session->flashdata('pesan');
        $post = $this->session->flashdata('post');
        $data['msg'] = (!empty($msg)) ? $msg : ['', '', '', ''];
        $data['list_group'] = $this->m_setting->listGroupDefault();
        $data['get_id'] = $this->uri->segment('3');
        $this->layout->render('add_user', $data);
    }

    public function get_data_json(){
        ob_start();
        $data = array();
        $requestData= $_REQUEST;
        $order = $this->input->post('order');
        $columns = $this->input->post('columns');
        $options['order'] = !empty($order) && !empty($columns) ? $columns[$order[0]['column']]['data'] : 'userId';
        $options['mode'] = !empty($order) ? $order[0]['dir']: 'desc';
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $options['offset'] = empty($start) ? 0 : $start;
        $options['limit'] = empty($length) ? 10 : $length;
        $where_like = array();
        if (!empty($requestData['search']['value'])){
            $options['where_like'] = array(
                "realname LIKE '%".$requestData['search']['value']."%'",
                "username LIKE '%".$requestData['search']['value']."%'",
                "groupname LIKE '%".$requestData['search']['value']."%'",
                "active LIKE '%".$requestData['search']['value']."%'",
            );
        }else{
            $options['where_like'] = [];
        }
        $dataOutput = $this->m_user->getListData($options);
        $totalFiltered = $this->m_user->getTotalData($options);
        $totalData = $this->m_user->getTotal();
        $no = $options['offset'] + 1;
        if (!empty($dataOutput)){
            foreach ($dataOutput as $key => $value) {
                $value->no = $no;
                $value->aksi = '<div class="btn-action">
                                    <a href="'.site_url('user/resetpassword/'.$value->userId).'" class="btn btn-default btn-flat btn-xs <?php echo $this->deleteon; ?>" data-toggle="tooltip" data-placement="top" title="Reset Password" data-confirm="Anda yakin akan reset password?">
                                        <img src="'.base_url('assets/images/reset.png').'">
                                    </a>

                                    <a href="'.site_url('user/edit/'.$value->userId.'/'.$value->groupId).'" class="btn btn-default btn-xs load <?php echo $this->updateon; ?>" title="Ubah Data" >
                                        <img src="'.base_url('assets/images/icon-edit.png').'">
                                    </a>
                                </div>';
                    $value->active = ($value->active == 'Yes') ? '<span class="badge bg-success">Aktif</span>' : '<span class="badge bg-danger">Tidak Aktif</span>';
                $no++;
            }
        }
        $response = array(
            "draw"            => isset($requestData['draw']) ? intval( $requestData['draw'] ) : 0,
            "recordsTotal"    => intval( $totalData ),
            "recordsFiltered" => intval( $totalFiltered ),
            "data"            => $dataOutput
            );
        echo json_encode($response);
    }

    public function view(){
        $msg = $this->session->flashdata('pesan');
        $data['msg'] = (!empty($msg)) ? $msg : ['', '', ''];
        $data['url_get_json'] = site_url('user/get_data_json');
        $data['url_add'] = site_url('user/add');
        $this->layout->render('user/view_user', $data);
    }

    public function addAction(){
        
        if (!empty($_FILES['foto']['name'])){
            $file=$_FILES['foto']['name'];
            $tmp_file=$_FILES['foto']['tmp_name'];
            $path = FCPATH.'files/akun/';
            $random_name= date('dmysi');
            $explode = explode('.',$file);
            $extensi = $explode[count($explode)-1];
            $file_name = $random_name.".".$extensi;
            $upload = move_uploaded_file ($tmp_file, $path.$file_name);
        }else{
            $file_name = "";
            $upload = "";
        }
        $data=array(
            'realname' => $this->input->post('realname'),
            'username' => $this->input->post('username'),  
            'password' => $this->input->post('password'),
            'password_retype' => $this->input->post('password_retype'),
            'foto' => $file_name, 
            'active' => $this->input->post('active'),
            'groupId' => $this->input->post('groupId'),
            );
        if($data['password'] != $data['password_retype']){
            $params = array('1', $this->pesanIconError, 'Data gagal ditambahkan, Kata Sandi Tidak Sesuai', $this->pesanColorError);
            $this->session->set_flashdata('pesan',$params); 
            redirect('user/add/'.$data_by_id->userId,$data);
        }else{
            $result = $this->m_user->addDataAction($data);
            
        if($result == TRUE){    
            $params = array('success', $this->pesanIconSuccess, $this->pesanAddSuccess);
            $this->session->set_flashdata('pesan',$params); 
            redirect('user/view');
        }else{
            $params = array('danger', $this->pesanIconError, $this->pesanAddError);
            $this->session->set_userdata('pesan',$params);
            redirect('user/view', $data);
        }
    }
}

    public function edit($id=0) {
        $data['msg'] = (!empty($msg)) ? $msg : ['', '', '', ''];
        $data['list_group'] = $this->m_setting->listGroupDefault();
        $data['data_by_id'] = $this->m_user->getDataById($id);
        $this->layout->render('edit_user',$data);
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
            'foto' => $file_name,    
            'active' => $this->input->post('active'),
            'groupId' => $this->input->post('groupId'),
            'userId' => $id
            );
        $result = $this->m_user->update($data);
        if($result == TRUE){    
            //pesan
            $params = array('success', $this->pesanIconSuccess, $this->pesanEditSuccess);
            $this->session->set_flashdata('pesan', $params);
            redirect('user/view');
        }else{
            $params = array($result, $this->pesanIconError, $this->pesanEditError);
            $this->session->set_userdata('pesan',$params); 
            redirect('user/view');
        }
    }

    public function delete($id=0){
        $dt = $this->m_user->getDataById($id);
        $result = $this->m_user->delete($id);
        if($result == TRUE){    
            //pesan
            $params = array('success', $this->pesanIconSuccess, $this->pesanDeleteSuccess);
            $this->session->set_flashdata('pesan',$params); 
            redirect('user/view');
        }else{
            $params = array('danger', $this->pesanIconError, $this->pesanDeleteError);
            $this->session->set_flashdata('pesan',$params); 
            redirect('user/view');
        }
    }

    public function resetPassword($id=0) {
        $msg = $this->session->flashdata('pesan');
        $data['msg'] = (!empty($msg)) ? $msg : ['', '', '', ''];
        $data['list_group'] = $this->m_setting->listGroupDefault();
        $data['data_by_id'] = $this->m_user->getDataById($id);
        $this->layout->render('resetpassword_user',$data);
    }

    public function resetPasswordAction($id=0){
        $id = $this->uri->segment('3');
        $data_by_id = $this->m_user->getDataById($id);
        $data=array(
            //'pass_old' => $this->input->post('pass_old'),
            'pass_new' => $this->input->post('pass_new'),  
            'pass_new_retype' => $this->input->post('pass_new_retype'),
            'id' => $id
            );
        if($data['pass_new'] != $data['pass_new_retype']){
            $params = array('1', $this->pesanIconError, 'Data gagal diubah, Kata Sandi Baru tidak sesuai', $this->pesanColorError);
            $this->session->set_flashdata('pesan',$params); 
            redirect('user/resetpassword/'.$data_by_id->userId,$data);
        }else{
            $result = $this->m_user->resetPassword($data);
            if($result == TRUE){    
                //pesan
                $params = array($result, $this->pesanIconSuccess, $this->pesanEditSuccess, $this->pesanColorSuccess);
                $this->session->set_flashdata('pesan',$params); 
                redirect('user/view',$data);
            }else{
                $params = array($result, $this->pesanIconError, $this->pesanEditError, $this->pesanColorError);
                $this->session->set_flashdata('pesan',$params); 
                redirect('user/resetpassword/'.$data_by_id->userId,$data);
            }
        }
    }

    // untuk cek ketersediaan username yang diinputkan
    public function checkUsername(){
        if ($this->m_user->getUsername($_POST['username'])) {
            echo '<label class="text-danger"><span><i class="fa fa-times" aria-hidden="true">
                    </i> This user is already registered</span></label>';
        }else{
            echo '<label class="text-success"><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Username is available</span></label>';
        }
    }
}
