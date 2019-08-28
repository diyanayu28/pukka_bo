<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Conf_menu extends MY_Controller {

    public function __construct() {
        parent::__construct();
        //load model
        $this->load->model(['menu/m_setting','menu/m_menu']);  

        //message
        $this->pesanAddSuccess = "Data Berhasil Ditambahkan";
        $this->pesanAddError = "Data Tidak Berhasil Ditambahkan";
        $this->pesanEditSuccess = "Data Berhasil Diubah";
        $this->pesanEditError = "Data Tidak Berhasil Diubah";
        $this->pesanRegisterSuccess = "Menu Berhasil Didaftarkan";
        $this->pesanRegisterError = "Menu Tidak Berhasil Didaftarkan";
        $this->pesanDeleteSuccess = "Data Berhasil Dihapus";
        $this->pesanDeleteError = "Data Tidak Berhasil Dihapus";
        $this->pesanIconSuccess = "fa fa-check-circle";
        $this->pesanIconError = "fa fa-times-circle";
    }
    public function view() {
        $msg = $this->session->userdata('pesan');
        $data = array(
                'msg' => $msg
            );
        $this->layout->render('view_configuration_menu', $data);
        
    }

    public function get_data_json(){
        ob_start();
        $group_default = $this->m_setting->listGroupDefault();

        $data = array();
        $requestData= $_REQUEST;
        $order = $this->input->post('order');
        $columns = $this->input->post('columns');
        $options['order'] = !empty($order) && !empty($columns) ? $columns[$order[0]['column']]['data'] : 'menuTimestamp';
        $options['mode'] = !empty($order) ? $order[0]['dir']: 'desc';
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $options['offset'] = empty($start) ? 0 : $start;
        $options['limit'] = empty($length) ? 100 : $length;
        $where_like = array();
        if (!empty($requestData['search']['value'])){
            $options['where_like'] = array(
                "menuName LIKE '%".$requestData['search']['value']."%'",
                "page LIKE '%".$requestData['search']['value']."%'",
                "groupName LIKE '%".$requestData['search']['value']."%'"
            );
        }else{
            $options['where_like'] = [];
        }
        $dataOutput = $this->m_setting->getListDataMenu($options);
        $totalFiltered = $this->m_setting->getTotalDataMenu($options);
        $totalData = $this->m_setting->getTotalMenu();
        $no = $options['offset'] + 1;
        if (!empty($dataOutput)){
            foreach($dataOutput as $key => $value){
                $value->no = $no;
                $value->action = '
                        <a href="'.site_url('conf_menu/edit/'.$value->menuId).'" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="Ubah Data">
                            <img src="'.base_url().'assets/images/icon-edit.png">
                        </a>
                        <a href="'.site_url('conf_menu/delete/'.$value->menuId).'" class="btn btn-default btn-xs btn-delete" data-toggle="tooltip" data-placement="top" title="Hapus Data" data-confirm="Anda yakin akan menghapus menu '.$value->menuName.'?">
                            <img src="'.base_url().'assets/images/icon-delete.png">
                        </a>';
                $value->formData = '
                        <form id="defaultForm" method="post" action="'.site_url('conf_menu/register').'" class="form-horizontal">
                            <select name="groupId" class="form-control select-register">
                                <option value="">- Akses -</option>';
                                if (!empty($group_default)){
                                    foreach($group_default as $default_group){
                                        $value->formData .= '<option value="'.$default_group->groupId.'">'.$default_group->groupName.'</option>';
                                    }
                                }
                $value->formData .= '
                            </select>
                            <input type="hidden" class="form-control" name="menuId" value="'.$value->menuId.'">
                            <input type="hidden" class="form-control" name="menuName" value="'.$value->menuName.'">
                            <button type="submit" name="register" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="Register Menu" value="register">
                                <img src="'.base_url().'assets/images/icon-note.png">
                            </button>
                            <button type="submit" name="register" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="Unregister Menu" value="unregister">
                                <img src="'.base_url().'assets/images/icon-note-false.png">
                            </button>
                        </form>';
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

    public function add($id=0) {
        $list_page = $this->m_setting->viewPage();
        $list_menu = $this->m_menu->getDataPublic($this->session_group);
        $page_by_id = $this->m_setting->pageById($id);
        $data=array(
            'list_page' => $list_page,
            'pageId' => $id,  
            'page_by_id' => $page_by_id,
            'list_menu' => $list_menu
            );
        $this->layout->render('conf_menu/add_configuration_menu', $data);
    }

    public function addAction(){
        $data=array(
            'menuName' => $this->input->post('menuName'),
            'pageId' => $this->input->post('pageId'),  
            'iconMenu' => $this->input->post('iconMenu'),
            'menuOrder' => $this->input->post('menuOrder'),
            'menuStyle' => $this->input->post('menuStyle'),
            'menuParentId' => $this->input->post('menuParentId'),
            'menuPosition' => $this->input->post('menuPosition'),
            'description' => $this->input->post('description')
            );
        //print_r($data);die;
        $result = $this->m_setting->addAction($data);
        if($result == TRUE){
            $params = array($result, $this->pesanIconSuccess, $this->pesanAddSuccess);
            $this->session->set_userdata('pesan',$params); 
            redirect('conf_menu/view');
        }else{
            $params = array($result, $this->pesanIconError, $this->pesanAddError);
            $this->session->set_userdata('pesan',$params); 
            redirect('conf_menu/view');
        }
    }
    public function edit($id=0) {
        $menu_by_id = $this->m_setting->menuById($id);
        $menu_parent_id = $this->m_setting->menuParentId($menu_by_id->menuParentId);
        $list_menu = $this->m_menu->getDataPublic($this->session_group);
        $list_page = $this->m_setting->viewPage();
        $pageId = $this->uri->segment('4');
        $page_by_id = $this->m_setting->pageById($pageId);
        $data = array(
                'menu_by_id' => $menu_by_id,
                'menu_parent_id' => $menu_parent_id,
                'list_page' => $list_page,
                'pageId' => $pageId,
                'page_by_id' => $page_by_id,
                'list_menu' => $list_menu
            );
        $this->layout->render('edit_configuration_menu', $data);
    }
    public function update($id=0){
        $data=array(
            'menuName' => $this->input->post('menuName'),
            'pageId' => $this->input->post('pageId'),  
            'iconMenu' => $this->input->post('iconMenu'),
            'menuOrder' => $this->input->post('menuOrder'),
            'menuStyle' => $this->input->post('menuStyle'),
            'menuParentId' => $this->input->post('menuParentId'),
            'menuPosition' => $this->input->post('menuPosition'),
            'description' => $this->input->post('description'),
            'menuId' => $id
            );
        $result = $this->m_setting->updateMenu($data);
        if($result == TRUE){
            $params = array($result, $this->pesanIconSuccess, $this->pesanEditSuccess);
            $this->session->set_userdata('pesan',$params); 
            redirect('conf_menu/view');
        }else{
            $params = array($result, $this->pesanIconError, $this->pesanEditError);
            $this->session->set_userdata('pesan',$params); 
            redirect('conf_menu/view');
        }
    }
    public function register(){
        $data=array(
            'groupId' => $this->input->post('groupId'),
            'menuId' => $this->input->post('menuId'),
            'menuName' => $this->input->post('menuName')        
            );
        if($this->input->post('register') == 'register'){
            $result = $this->m_setting->registerMenu($data);
        }elseif($this->input->post('register') == 'unregister'){
            $result = $this->m_setting->unregisterMenu($data);
        }else{
            $result = 0;
        }
        if($result == TRUE){
            $params = array($result, $this->pesanIconSuccess, $this->pesanRegisterSuccess);
            $this->session->set_userdata('pesan',$params); 
            redirect('conf_menu/view');
        }else{
            $params = array($result, $this->pesanIconError, $this->pesanRegisterError);
            $this->session->set_userdata('pesan',$params); 
            redirect('conf_menu/view');
        }
    }
    public function delete($id=0){
        $this->m_setting->deleteGroupMenu($id);
        $result = $this->m_setting->deleteMenu($id);
        if($result == TRUE){
            $params = array($result, $this->pesanIconSuccess, $this->pesanDeleteSuccess);
            $this->session->set_userdata('pesan',$params); 
            redirect('conf_menu/view');
        }else{
            $params = array($result, $this->pesanIconError, $this->pesanDeleteError);
            $this->session->set_userdata('pesan',$params); 
            redirect('conf_menu/view');
        }
    }
    
}
