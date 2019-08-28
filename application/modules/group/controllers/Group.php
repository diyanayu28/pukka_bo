<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Group extends My_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_group');
        $this->load->model('menu/m_setting');
        
        $this->pesanAddSuccess = "Data Berhasil Ditambahkan";
        $this->pesanAddError = "Data Tidak Berhasil Ditambahkan";
        $this->pesanEditSuccess = "Data Berhasil Diubah";
        $this->pesanEditError = "Data Tidak Berhasil Diubah";
        $this->pesanDeleteSuccess = "Data Berhasil Dihapus";
        $this->pesanDeleteError = "Data Tidak Berhasil Dihapus";
        $this->pesanIconSuccess = "fa fa-check-circle";
        $this->pesanIconError = "fa fa-times-circle";
    }

    public function view() {
        $msg = $this->session->userdata('pesan');
        $list_group = $this->m_group->getData();
        $data = array(
                'msg' => $msg,
                'list_group' => $list_group
            );
        $this->layout->render('view_group', $data);
    }
    public function add() {
        $page_view = "add_group";
        $this->layout->render($page_view, '');
    }
    public function addAction(){
        $data=array(
            'groupName' => $this->input->post('groupName'),
            'description' => $this->input->post('description')   
            );
        $result = $this->m_group->addDataAction($data);
        if($result == TRUE){    
            $params = array($result, $this->pesanIconSuccess, $this->pesanAddSuccess);
            $this->session->set_userdata('pesan',$params); 
            redirect('group/view');
        }else{
            $params = array($result, $this->pesanIconError, $this->pesanAddError);
            $this->session->set_userdata('pesan',$params); 
            redirect('group/view');
        }
    }
    public function edit($id=0) {
        $data['data_by_id'] = $this->m_group->getDataById($id);
        $this->layout->render('edit_group', $data);
    }
    public function update($id=0){
        $data=array(
            'groupName' => $this->input->post('groupName'),
            'description' => $this->input->post('description'),
            'groupId' => $id
            );
        $result = $this->m_group->update($data);
        if($result == TRUE){    
            //pesan
            $params = array($result, $this->pesanIconSuccess, $this->pesanEditSuccess);
            $this->session->set_userdata('pesan',$params); 
            redirect('group/view');
        }else{
            $params = array($result, $this->pesanIconError, $this->pesanEditError);
            $this->session->set_userdata('pesan',$params); 
            redirect('group/view');
        }
    }
    public function delete($id=0){
        $result = $this->m_group->delete($id);
        if($result == TRUE){    
            //pesan
            $params = array($result, $this->pesanIconSuccess, $this->pesanDeleteSuccess);
            $this->session->set_userdata('pesan',$params); 
            redirect('group/view');
        }else{
            $params = array($result, $this->pesanIconError, $this->pesanDeleteError);
            $this->session->set_userdata('pesan',$params); 
            redirect('group/view');
        }
    }
    
}
