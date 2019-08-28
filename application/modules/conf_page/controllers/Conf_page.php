<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Conf_page extends MY_Controller {

    public function __construct() {
        parent::__construct();
        //load model
        $this->load->model('menu/m_setting');

        //message
        $this->pesanAddSuccess = "Data Berhasil Ditambahkan";
        $this->pesanAddError = "Data Tidak Berhasil Ditambahkan";
        $this->pesanEditSuccess = "Data Berhasil Diubah";
        $this->pesanEditError = "Data Tidak Berhasil Diubah";
        $this->pesanRegisterSuccess = "Page Berhasil Didaftarkan";
        $this->pesanRegisterError = "Page Tidak Berhasil Didaftarkan";
        $this->pesanDeleteSuccess = "Data Berhasil Dihapus";
        $this->pesanDeleteError = "Data Tidak Berhasil Dihapus";
        $this->pesanIconSuccess = "fa fa-check-circle";
        $this->pesanIconError = "fa fa-times-circle";
        
    }
    

    public function view() {
        
        $msg = $this->session->userdata('pesan');
        $list_page = $this->m_setting->viewPage();
        $group_default = $this->m_setting->listGroupDefault();
        $data = array(
                'msg' => $msg,
                'list_page' => $list_page,
                'group_default' => $group_default,
                'url_get_json' => site_url('conf_page/get_data_json')
            );
        $this->layout->render('view_configuration_page', $data);
        /*
        $msg = $this->session->flashdata('pesan');
        $data['msg'] = (!empty($msg)) ? $msg : ['', '', ''];
        $data['url_get_json'] = site_url('conf_page/get_data_json');
        $this->layout->render('configuration_page/view_configuration_page_json', $data);
        */
    }
    
    public function get_data_json(){
        ob_start();
        $this->load->model('m_setting');
        $group_default = $this->m_setting->listGroupDefault();

        $data = array();
        $requestData= $_REQUEST;
        $order = $this->input->post('order');
        $columns = $this->input->post('columns');
        $options['order'] = !empty($order) && !empty($columns) ? $columns[$order[0]['column']]['data'] : 'timestamp';
        $options['mode'] = !empty($order) ? $order[0]['dir']: 'desc';
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $options['offset'] = empty($start) ? 0 : $start;
        $options['limit'] = empty($length) ? 100 : $length;
        $where_like = array();
        if (!empty($requestData['search']['value'])){
            $options['where_like'] = array(
                "p.page LIKE '%".$requestData['search']['value']."%'",
                "p.labelPage LIKE '%".$requestData['search']['value']."%'",
                "p.subPage LIKE '%".$requestData['search']['value']."%'"
            );
        }else{
            $options['where_like'] = [];
        }
        $dataOutput = $this->m_setting->getListDataPage($options);
        $totalFiltered = $this->m_setting->getTotalDataPage($options);
        $totalData = $this->m_setting->getTotalPage();
        $no = $options['offset'] + 1;
        if (!empty($dataOutput)){
            foreach ($dataOutput as $key => $value) {
                $value->no = $no;
                if($value->groupId != '' ){
                    $akses_register = 'disabled';
                }else{
                    $akses_register = '';
                }

                $value->aksi = '<a href="'.site_url('conf_page/edit/'.$value->pageId).'" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="Ubah Data">
                                    <img src="'.base_url().'assets/images/icon-edit.png">
                                    </a>
                                    <a href="'.site_url('conf_page/delete/'.$value->pageId.'/'.$value->groupId).'" class="btn btn-default btn-xs btn-delete" data-toggle="tooltip" data-placement="top" title="Hapus Data" data-confirm="Anda yakin akan menghapus page '.$value->page.' - '.$value->subPage.'?">
                                        <img src="'.base_url().'assets/images/icon-delete.png">
                                </a>';
                $value->register = '
                <form id="defaultForm" method="post" action="'.site_url('conf_page/register').'" class="form-horizontal">
                    <select name="groupId" class="form-control select-register" '.$akses_register.'/>
                        <option value="'.$value->groupId.'">'.$value->groupName.'</option>';

                        foreach($group_default as $default_group){
                            $value->register .= '<option value="'.$default_group->groupId.'">'.$default_group->groupName.'</option>';
                        }

                $value->register .='
                    </select>
                    <input type="hidden" class="form-control" name="pageId" value="'.$value->pageId.'">
                    <input type="hidden" class="form-control" name="page" value="'.$value->page.'">
                    <input type="hidden" class="form-control" name="subPage" value="'.$value->subPage.'">
                    <button type="submit" name="register" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="Register Page" '.$akses_register.'>
                        <img src="'.base_url().'assets/images/icon-note.png">
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
    
    public function add() {  
        $this->layout->render('add_configuration_page', '');
    }

    public function addAction(){
        $data=array(
            'page' => $this->input->post('page'),
            'labelPage' => $this->input->post('labelPage'),  
            'subPage' => $this->input->post('subPage'),
            'action' => $this->input->post('action'),
            'status' => $this->input->post('status')
            );
        $result = $this->m_setting->addActionPage($data);
        if($result == TRUE){
            $params = array($result, $this->pesanIconSuccess, $this->pesanAddSuccess);
            $this->session->set_userdata('pesan',$params); 
            redirect('conf_page/view');
        }else{
            $params = array($result, $this->pesanIconError, $this->pesanAddError);
            $this->session->set_userdata('pesan',$params); 
            redirect('conf_page/view');
        }
    }
    public function register(){
        $data=array(
            'groupId' => $this->input->post('groupId'),
            'pageId' => $this->input->post('pageId'),
            'page' => $this->input->post('page'),
            'subPage' => $this->input->post('subPage')       
            );
        $result = $this->m_setting->registerPage($data);
        if($result == TRUE){
            $params = array($result, $this->pesanIconSuccess, $this->pesanRegisterSuccess);
            $this->session->set_userdata('pesan',$params); 
            redirect('conf_page/view');
        }else{
            $params = array($result, $this->pesanIconError, $this->pesanRegisterError);
            $this->session->set_userdata('pesan',$params); 
            redirect('conf_page/view');
        }
    }
    public function edit($id=0) {
         $get_page_by_id = $this->m_setting->pageById($id);
         $crud = $get_page_by_id;
         $data = array(
                 'get_page_by_id' => $get_page_by_id
         );
        $this->layout->render('edit_configuration_page', $data);
    }
    public function update($id=0){
        $data=array(
            'page' => $this->input->post('page'),
            'labelPage' => $this->input->post('labelPage'),  
            'subPage' => $this->input->post('subPage'),
            'action' => $this->input->post('action') ,
            'status' => $this->input->post('status'),
            'pageId' => $id
            );
        $result = $this->m_setting->updatePage($data);
        if($result == TRUE){
            $params = array($result, $this->pesanIconSuccess, $this->pesanEditSuccess);
            $this->session->set_userdata('pesan',$params); 
            redirect('conf_page/view',$data);
        }else{
            $params = array($result, $this->pesanIconError, $this->pesanEditError);
            $this->session->set_userdata('pesan',$params); 
            redirect('conf_page/view',$data);
        }
    }
    public function delete($id=0){
        $groupId = $this->uri->segment('4');
        $delete_page = $this->m_setting->deleteGroupPage($id, $groupId);
        $result = $this->m_setting->deletePage($id);
        if($result == TRUE){
            $params = array($result, $this->pesanIconSuccess, $this->pesanDeleteSuccess);
            $this->session->set_userdata('pesan',$params); 
            redirect('conf_page/view');
        }else{
            $params = array($result, $this->pesanIconError, $this->pesanDeleteError);
            $this->session->set_userdata('pesan',$params); 
            redirect('conf_page/view');
        }
    }

    
}
