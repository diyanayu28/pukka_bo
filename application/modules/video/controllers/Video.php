<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Video extends My_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_video');
        $this->title = "Manajemen Video";
        $this->titleRestore = "Data Video yang Dihapus";
        $this->pesanAddSuccess = "Data Berhasil Ditambahkan";
        $this->pesanAddError = "Data Tidak Berhasil Ditambahkan";
        $this->pesanEditSuccess = "Data Berhasil Diubah";
        $this->pesanEditError = "Data Tidak Berhasil Diubah";
        $this->pesanDeleteSuccess = "Data Berhasil Dihapus";
        $this->pesanDeleteError = "Data Tidak Berhasil Dihapus";
        $this->pesanRestoreSuccess = "Data Berhasil Direstore";
        $this->pesanRestoreError = "Data Tidak Berhasil Direstore";
        $this->pesanIconSuccess = "fa fa-check-circle";
        $this->pesanIconError = "fa fa-times-circle";


    }

    public function get_data_json(){
        ob_start();
        $data = array();
        $requestData= $_REQUEST;
        $order = $this->input->post('order');
        $columns = $this->input->post('columns');
        $options['order'] = !empty($order) && !empty($columns) ? $columns[$order[0]['column']]['data'] : 'id_video';
        $options['mode'] = !empty($order) ? $order[0]['dir']: 'desc';
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $options['offset'] = empty($start) ? 0 : $start;
        $options['limit'] = empty($length) ? 10 : $length;
        $where_like = array();
        if (!empty($requestData['search']['value'])){
            $options['where_like'] = array(
                "video_title LIKE '%".$requestData['search']['value']."%'",
                "status LIKE '%".$requestData['search']['value']."%'",
            );
        }else{
            $options['where_like'] = [];
        }
        $dataOutput = $this->m_video->getListData($options);
        $totalFiltered = $this->m_video->getTotalData($options);
        $totalData = $this->m_video->getTotal();
        $no = $options['offset'] + 1;
        if (!empty($dataOutput)){
            foreach ($dataOutput as $key => $value) {
                $value->no = $no;
                $value->aksi = '<div class="btn-action">
                                    <a href="'.site_url('video/edit/'.$value->id_video).'" class="btn btn-default btn-xs '.$this->updateon.'" data-toggle="tooltip" data-placement="top" title="Ubah Data">
                                        <img src="'.$this->config->item('path_btn').'icon-edit.png">
                                    </a>
                                    
                                    <a href="'.site_url('video/delete/'.$value->id_video).'" class="btn btn-default btn-delete btn-flat btn-xs '.$this->deleteon.'" data-toggle="tooltip" data-placement="top" title="Hapus Data" data-confirm="Anda yakin akan menghapus data '.$value->video_title.'?"> <img src="'.$this->config->item('path_btn').'icon-delete.png">
                                    </a>
                                </div>';
                                
                                $value->status = ($value->status == 'Y') ? '<span class="badge bg-success">Aktif</span>' : '<span class="badge bg-danger">Tidak Aktif</span>';
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

    public function get_data_deleted(){
        ob_start();
        $data = array();
        $requestData= $_REQUEST; 
        $order = $this->input->post('order');
        $columns = $this->input->post('columns');
        $options['order'] = !empty($order) && !empty($columns) ? $columns[$order[0]['column']]['data'] : 'id_video';
        $options['mode'] = !empty($order) ? $order[0]['dir']: 'desc'; // mode pengurutan data
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $options['offset'] = empty($start) ? 0 : $start;
        $options['limit'] = empty($length) ? 10 : $length; // untuk menentukan jumlah per page
        $where_like = array();
        if (!empty($requestData['search']['value'])){
            $options['where_like'] = array( // option untuk searching
                "video_title LIKE '%".$requestData['search']['value']."%'",
                "status LIKE '%".$requestData['search']['value']."%'"
            );
        }else{
            $options['where_like'] = [];
        }
        $dataOutput = $this->m_video->getListDataDeleted($options); 
        $totalFiltered = $this->m_video->getTotalDataDeleted($options);
        $totalData = $this->m_video->getTotalDeleted();
        $no = $options['offset'] + 1;
        if (!empty($dataOutput)){
            foreach ($dataOutput as $key => $value) {
                $value->no = $no;
                $value->aksi = '<div class="btn-action">
                                    <a href="'.site_url('video/restoreAction/'.$value->id_video).'" class="btn btn-default btn-delete btn-flat btn-xs '.$this->deleteon.'" data-toggle="tooltip" data-placement="top" title="Restore Data" data-confirm="Anda yakin akan merestore data ?"> <img src="'.$this->config->item('path_btn').'icon-sync.png">
                                    </a>
                                </div>';
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
        $data['url_get_json'] = site_url('video/get_data_json');
        $data['url_add'] = site_url('video/add');
        $data['url_restore'] = site_url('video/restore');
        $this->layout->render('video/view_video', $data);
        
    }

    public function add() {
        $msg = $this->session->flashdata('pesan');
        $post = $this->session->flashdata('post');
        $data ="";
        $this->layout->render('video/add_video', $data);
    }
    
    public function addAction(){
        $data = [
            'video_title' => $this->input->post('video_title'),
            'link_embed' => $this->input->post('link_embed'),
            'status' => $this->input->post('status')
        ];
        $result = $this->m_video->addDataAction($data);

        if($result){    
            $params = array('success', $this->pesanIconSuccess, $this->pesanAddSuccess);
            $this->session->set_flashdata('pesan', $params);
            redirect('video/view', $data);
        }else{
            $params = array('danger', $this->pesanIconError, $this->pesanAddError);
            $this->session->set_flashdata('pesan',$params); 
            $this->session->set_flashdata('post', $data);
            redirect('video/add', $data);
        }        
    }

    public function edit() {
        $id = $this->uri->segment(3);
        $data = $this->m_video->getDataById($id);
        $msg = $this->session->flashdata('pesan');
        $data['msg'] = (!empty($msg)) ? $msg : ['', '', ''];
        $this->layout->render('video/edit_video', $data);
    }

    public function editAction(){
        $data = [
            'video_title' => $this->input->post('video_title'),
            'link_embed' => $this->input->post('link_embed'),
            'status' => $this->input->post('status')
        ];
        $updateData = $this->m_video->editDataAction($data, ['id_video' => $this->input->post('id_video')]);
        if($updateData){    
            $params = array('success', $this->pesanIconSuccess, $this->pesanEditSuccess);
            $this->session->set_flashdata('pesan', $params);
            redirect('video/view', $data);
        }else{
            $params = array('danger', $this->pesanIconError, $this->pesanAddError);
            $this->session->set_flashdata('pesan',$params); 
            $this->session->set_flashdata('post', $data);
            redirect('video/edit', $data);
        }        
    }

    public function delete(){
        $id = $this->uri->segment(3);  
        $delete = $this->m_video->delete(['id_video' => $id]);     
        if($delete){
            $params = array('success', $this->pesanIconSuccess, $this->pesanDeleteSuccess);
            $this->session->set_flashdata('pesan',$params); 
        }else{
            $params = array('danger', $this->pesanIconError, $this->pesanDeleteError);
            $this->session->set_userdata('pesan',$params);
        }
        redirect('video/view');        
    }

    public function restore(){
        $msg = $this->session->flashdata('pesan');
        $data['msg'] = (!empty($msg)) ? $msg : ['', '', ''];
        $data['url_data_deleted'] = site_url('video/get_data_deleted');
        $this->layout->render('video/restore_video', $data);
    }

    public function restoreAction(){    
        $id = $this->uri->segment(3);
        $restore_video = $this->m_video->restore(['id_video' => $id]);
        if ($restore_video) {
            $params = array('success', $this->pesanIconSuccess, $this->pesanRestoreSuccess);
            $this->session->set_flashdata('pesan',$params); 
        }else{
            $params = array('danger', $this->pesanIconError, $this->pesanRestoreError);
            $this->session->set_userdata('pesan',$params);
        }
        redirect('video/view');  
    }  
       
}