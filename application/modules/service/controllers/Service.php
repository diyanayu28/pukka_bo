<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Service extends My_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_service');
        $this->title = "Manajemen Service";
        $this->titleRestore = "Data Service yang Dihapus";
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

    private function data_construct(){
        $data['option_kategori'] = $this->m_service->getOptionKategori();
        return $data;
    }

    public function get_data_json(){
        ob_start();
        $data = array();
        $requestData= $_REQUEST;
        $order = $this->input->post('order');
        $columns = $this->input->post('columns');
        $options['order'] = !empty($order) && !empty($columns) ? $columns[$order[0]['column']]['data'] : 'id_service';
        $options['mode'] = !empty($order) ? $order[0]['dir']: 'desc';
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $options['offset'] = empty($start) ? 0 : $start;
        $options['limit'] = empty($length) ? 10 : $length;
        $where_like = array();
        if (!empty($requestData['search']['value'])){
            $options['where_like'] = array(
                "service_name LIKE '%".$requestData['search']['value']."%'"
            );
        }else{
            $options['where_like'] = [];
        }
        $dataOutput = $this->m_service->getListData($options);
        $totalFiltered = $this->m_service->getTotalData($options);
        $totalData = $this->m_service->getTotal();
        $no = $options['offset'] + 1;
        if (!empty($dataOutput)){
            foreach ($dataOutput as $key => $value) {
                $value->no = $no;
                $value->aksi = '<div class="btn-action">
                                    <a href="'.site_url('service/detail/'.$value->id_service).'" class="btn btn-default btn-xs '.$this->updateon.'" data-toggle="tooltip" data-placement="top" title="Detail Data">
                                        <img src="'.$this->config->item('path_btn').'icon-preview.png">
                                    </a>
                                    <a href="'.site_url('service/edit/'.$value->id_service).'" class="btn btn-default btn-xs '.$this->updateon.'" data-toggle="tooltip" data-placement="top" title="Ubah Data">
                                        <img src="'.$this->config->item('path_btn').'icon-edit.png">
                                    </a>
                                    <a href="'.site_url('service/delete/'.$value->id_service).'" class="btn btn-default btn-delete btn-flat btn-xs '.$this->deleteon.'" data-toggle="tooltip" data-placement="top" title="Hapus Data" data-confirm="Anda yakin akan menghapus data '.$value->service_name.'?"> <img src="'.$this->config->item('path_btn').'icon-delete.png">
                                    </a>
                                </div>';
                                    $value->status = ($value->status == 'Y') ? '<span class="badge bg-success">Aktif</span>' : '<span class="badge bg-danger">Tidak Aktif</span>';
                                    $value->posted_at = date('d/m/Y H:i', strtotime($value->posted_at));
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
        $options['order'] = !empty($order) && !empty($columns) ? $columns[$order[0]['column']]['data'] : 'id_service';
        $options['mode'] = !empty($order) ? $order[0]['dir']: 'desc'; // mode pengurutan data
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $options['offset'] = empty($start) ? 0 : $start;
        $options['limit'] = empty($length) ? 10 : $length; // untuk menentukan jumlah per page
        $where_like = array();
        if (!empty($requestData['search']['value'])){
            $options['where_like'] = array( // option untuk searching
                "service_name LIKE '%".$requestData['search']['value']."%'"
            );
        }else{
            $options['where_like'] = [];
        }
        $dataOutput = $this->m_service->getListDataDeleted($options); 
        $totalFiltered = $this->m_service->getTotalDataDeleted($options);
        $totalData = $this->m_service->getTotalDeleted();
        $no = $options['offset'] + 1;
        if (!empty($dataOutput)){
            foreach ($dataOutput as $key => $value) {
                $value->no = $no;
                $value->aksi = '<div class="btn-action">
                                    <a href="'.site_url('service/restoreAction/'.$value->id_service).'" class="btn btn-default btn-delete btn-flat btn-xs '.$this->deleteon.'" data-toggle="tooltip" data-placement="top" title="Restore Data" data-confirm="Anda yakin akan merestore data '.$value->service_name.'?"> <img src="'.$this->config->item('path_btn').'icon-sync.png">
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
        $data['url_get_json'] = site_url('service/get_data_json');
        $data['url_add'] = site_url('service/add');
        $data['url_restore'] = site_url('service/restore');
        $this->layout->render('service/view_service', $data);
    }

    public function detail() {
        $id = $this->uri->segment(3);
        $data = $this->m_service->getDataById($id);
        $this->layout->render('service/detail_service', $data);
    }

    public function add() {
        $msg = $this->session->flashdata('pesan');
        $post = $this->session->flashdata('post');
        $data = $this->data_construct();
        $this->layout->render('service/add_service', $data);
    }
    
    public function addAction(){
        $tag_name = explode(',', $this->input->post('tag_name'));
        if (!empty($_FILES['image']['name'])){
            $file=$_FILES['image']['name'];
            $tmp_file=$_FILES['image']['tmp_name'];
            $path = FCPATH.'files/service/';
            $random_name= $this->input->post('service_name').'_'.date('dmysi');
            $explode = explode('.',$file);
            $extensi = $explode[count($explode)-1];
            $file_name = $random_name.".".$extensi;
        }else{
            $file_name = "";
        }
        $data = [
            'fk_id_category' => $this->input->post('id_category'),
            'service_name' => $this->input->post('service_name'),
            'service_seo' => seo_title($this->input->post('service_name')),
            'description' => $this->input->post('description'),
            'meta_keyword' => $this->input->post('meta_keyword'),
            'meta_desc' => $this->input->post('meta_desc'),
            'image' => $file_name,
            'posted_at' => date('Y-m-d H:i:s'),
            'status' => $this->input->post('status'),
            'fk_userId' => $this->session->userdata('userId')
        ];
        $result = $this->m_service->insert($data);
        $serviceId = $this->db->insert_id();

        if (!empty($tag_name)){
            foreach ($tag_name as $key => $value) {
                $dataMetaKeyword = $this->db->get_where('tag', array('tag_name' => $value))->row();
                if (!empty($dataMetaKeyword)){
                    $result = $result && $this->db->insert('tag_service', array(
                        'fk_id_service' => $serviceId,
                        'fk_id_tag' => $dataMetaKeyword->id_tag
                    ));
                }else{
                    $addMeta = $this->db->insert('tag', array('tag_name' => $value, 'tag_seo' => seo_title($value)));
                    if ($addMeta){
                        $id_tag = $this->db->insert_id();
                        $result = $result && $this->db->insert('tag_service', array(
                            'fk_id_service' => $serviceId,
                            'fk_id_tag' => $id_tag
                        ));
                    }
                }
            }
        }

        if($result){
            $upload = move_uploaded_file($tmp_file, $path.$file_name);
        }
        if($result){    
            $params = array('success', $this->pesanIconSuccess, $this->pesanAddSuccess);
            $this->session->set_flashdata('pesan', $params);
            redirect('service/view', $data);
        }else{
            $params = array('danger', $this->pesanIconError, $this->pesanAddError);
            $this->session->set_flashdata('pesan',$params); 
            $this->session->set_flashdata('post', $data);
            redirect('service/add', $data);
        }        
    }

    public function edit($id=0) {
        $id = $this->uri->segment(3);
        $data = $this->m_service->getDataById($id);
        $data['data_by_id'] = $this->m_service->getDataById($id);
        $data = array_merge($data, $this->data_construct());
        $msg = $this->session->flashdata('pesan');
        $data['msg'] = (!empty($msg)) ? $msg : ['', '', ''];
        $tagSelected = $this->m_service->getTagById($id);
        $tagName = array();
        if (!empty($tagSelected)){
            foreach ($tagSelected as $key => $value) {
                $tagName[] = $value->tag_name;
            }
        }
        $data['tagSelected'] = implode(',', $tagName);
        $this->layout->render('service/edit_service', $data);
    }

    public function editAction($id=0){
        $tag_name = explode(',', $this->input->post('tag_name'));
        $serviceId =$this->input->post('id_service');
        if (!empty($_FILES['image']['name'])){
            $file=$_FILES['image']['name'];
            $tmp_file=$_FILES['image']['tmp_name'];
            $path = FCPATH.'files/service/';
            $random_name= $this->input->post('service_name').'_'.date('dmysi');
            $explode = explode('.',$file);
            $extensi = $explode[count($explode)-1];
            $file_name = $random_name.".".$extensi;
            unlink($path.$this->input->post('image'));
            $upload = move_uploaded_file ($tmp_file, $path.$file_name);
        }else{
            $file_name = $this->input->post('image');
            $upload = "";
        }
        $data = [
            'fk_id_category' => $this->input->post('id_category'),
            'service_name' => $this->input->post('service_name'),
            'service_seo' => seo_title($this->input->post('service_name')),
            'description' => $this->input->post('description'),
            'meta_keyword' => $this->input->post('meta_keyword'),
            'meta_desc' => $this->input->post('meta_desc'),
            'image' => $file_name,
            'posted_at' => date('Y-m-d H:i:s'),
            'status' => $this->input->post('status'),
            'fk_userId' => $this->session->userdata('userId')
        ];
        $update = $this->m_service->edit($data, ['id_service' => $this->input->post('id_service')]);
        $update = $update && $this->db->delete('tag_service', array(
            'fk_id_service' => $serviceId
        ));
       
        if (!empty($tag_name)){
            foreach ($tag_name as $key => $value) {
                $dataMetaKeyword = $this->db->get_where('tag', array('tag_name' => $value))->row();
                if (!empty($dataMetaKeyword)){
                    $update = $update && $this->db->insert('tag_service', array(
                        'fk_id_service' => $serviceId,
                        'fk_id_tag' => $dataMetaKeyword->id_tag
                    ));
                }else{
                    $addMeta = $this->db->insert('tag', array('tag_name' => $value, 'tag_seo' => seo_title($value)));
                    if ($addMeta){
                        $id_tag = $this->db->insert_id();
                        $update = $update && $this->db->insert('tag_service', array(
                            'fk_id_service' => $serviceId,
                            'fk_id_tag' => $id_tag
                        ));
                    }
                }
            }
        }

        if($update){    
            $params = array('success', $this->pesanIconSuccess, $this->pesanEditSuccess);
            $this->session->set_flashdata('pesan', $params);
            redirect('service/view', $data);
        }else{
            $params = array('danger', $this->pesanIconError, $this->pesanAddError);
            $this->session->set_flashdata('pesan',$params); 
            $this->session->set_flashdata('post', $data);
            redirect('service/edit', $data);
        }        
    }

    public function delete(){
        $id = $this->uri->segment(3);
        $delete_tag_service = $this->m_service->delete_tag_service(['fk_id_service' => $id]);
        $delete = $this->m_service->delete(['id_service' => $id]);  
        if ($delete_tag_service && $delete) {
            $params = array('success', $this->pesanIconSuccess, $this->pesanDeleteSuccess);
            $this->session->set_flashdata('pesan',$params); 
        }else{
            $params = array('danger', $this->pesanIconError, $this->pesanDeleteError);
            $this->session->set_userdata('pesan',$params);
        }
        redirect('service/view');
    }

    public function restore(){
        $msg = $this->session->flashdata('pesan');
        $data['msg'] = (!empty($msg)) ? $msg : ['', '', ''];
        $data['url_data_deleted'] = site_url('service/get_data_deleted');
        $this->layout->render('service/restore_service', $data);
    }

    public function restoreAction(){    
        $id = $this->uri->segment(3);
        $restore_service = $this->m_service->restore(['id_service' => $id]);
        if ($restore_service) {
            $params = array('success', $this->pesanIconSuccess, $this->pesanRestoreSuccess);
            $this->session->set_flashdata('pesan',$params); 
        }else{
            $params = array('danger', $this->pesanIconError, $this->pesanRestoreError);
            $this->session->set_userdata('pesan',$params);
        }
        redirect('service/view');  
    }  
    
}