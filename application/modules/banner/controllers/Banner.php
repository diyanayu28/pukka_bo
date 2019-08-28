<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Banner extends My_Controller {

    protected $option_category = [
        'Home' => 'Home', 
        'Greeting' => 'Greeting', 
        'Company Profile' => 'Company Profile', 
        'Manajemen' => 'Manajemen', 
        'Holding Company' => 'Holding Company', 
        'Features' => 'Features', ];

    public function __construct() {
        parent::__construct();
        $this->load->model('m_banner');
        $this->title = "Manajemen Banner";
        $this->titleRestore = "Data Banner yang Dihapus";
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
        $data['option_category'] = $this->option_category;
        return $data;
    }

    public function get_data_json(){
        ob_start();
        $data = array();
        $requestData= $_REQUEST;
        $order = $this->input->post('order');
        $columns = $this->input->post('columns');

        $options['order'] = !empty($order) && !empty($columns) ? $columns[$order[0]['column']]['data'] : 'id_banner';
        $options['mode'] = !empty($order) ? $order[0]['dir']: 'desc';
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $options['offset'] = empty($start) ? 0 : $start;
        $options['limit'] = empty($length) ? 10 : $length;
        $where_like = array();
        if (!empty($requestData['search']['value'])){
            $options['where_like'] = array(
                "label_banner LIKE '%".$requestData['search']['value']."%'",
                "banner_desc LIKE '%".$requestData['search']['value']."%'",
            );
        }else{
            $options['where_like'] = [];
        }
        $dataOutput = $this->m_banner->getListData($options);
        $totalFiltered = $this->m_banner->getTotalData($options);
        $totalData = $this->m_banner->getTotal();
        $no = $options['offset'] + 1;
        if (!empty($dataOutput)){
            foreach ($dataOutput as $key => $value) {
                $value->no = $no;
                $value->aksi = '<div class="btn-action">

                                    <a href="'.site_url('banner/detail/'.$value->id_banner).'" class="btn btn-default btn-xs '.$this->updateon.'" data-toggle="tooltip" data-placement="top" title="Detail Data">
                                        <img src="'.$this->config->item('path_btn').'icon-preview.png">
                                    </a>

                                    <a href="'.site_url('banner/edit/'.$value->id_banner).'" class="btn btn-default btn-xs '.$this->updateon.'" data-toggle="tooltip" data-placement="top" title="Ubah Data">
                                        <img src="'.$this->config->item('path_btn').'icon-edit.png">
                                    </a>
                                    <a href="'.site_url('banner/delete/'.$value->id_banner).'" class="btn btn-default btn-delete btn-flat btn-xs '.$this->deleteon.'" data-toggle="tooltip" data-placement="top" title="Hapus Data" data-confirm="Anda yakin akan menghapus data '.$value->label_banner.'?"> <img src="'.$this->config->item('path_btn').'icon-delete.png">
                                    </a>
                                </div>';
                                $value->i_status = ($value->i_status == 'Y') ? '<span class="badge bg-success">Aktif</span>' : '<span class="badge bg-danger">Tidak Aktif</span>';
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
        $options['order'] = !empty($order) && !empty($columns) ? $columns[$order[0]['column']]['data'] : 'id_banner';
        $options['mode'] = !empty($order) ? $order[0]['dir']: 'desc'; // mode pengurutan data
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $options['offset'] = empty($start) ? 0 : $start;
        $options['limit'] = empty($length) ? 10 : $length; // untuk menentukan jumlah per page
        $where_like = array();
        if (!empty($requestData['search']['value'])){
            $options['where_like'] = array( // option untuk searching
                "label_banner LIKE '%".$requestData['search']['value']."%'",
                "banner_desc LIKE '%".$requestData['search']['value']."%'",
            );
        }else{
            $options['where_like'] = [];
        }
        $dataOutput = $this->m_banner->getListDataDeleted($options); 
        $totalFiltered = $this->m_banner->getTotalDataDeleted($options);
        $totalData = $this->m_banner->getTotalDeleted();
        $no = $options['offset'] + 1;
        if (!empty($dataOutput)){
            foreach ($dataOutput as $key => $value) {
                $value->no = $no;
                $value->aksi = '<div class="btn-action">
                                    <a href="'.site_url('banner/restoreAction/'.$value->id_banner).'" class="btn btn-default btn-delete btn-flat btn-xs '.$this->deleteon.'" data-toggle="tooltip" data-placement="top" title="Restore Data" data-confirm="Anda yakin akan merestore data '.$value->label_banner.'?"> <img src="'.$this->config->item('path_btn').'icon-sync.png">
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
        $data['url_get_json'] = site_url('banner/get_data_json');
        $data['url_add'] = site_url('banner/add');
        $data['url_restore'] = site_url('banner/restore');
        $this->layout->render('banner/view_banner', $data);
    }

    public function add() {
        //load form validation library
        $this->load->library('form_validation');
        //load file helper
        $this->load->helper('file');  
        $msg = $this->session->flashdata('pesan');
        $post = $this->session->flashdata('post');
        $data = $this->data_construct();
        $this->layout->render('banner/add_banner', $data);
    }
    
    public function addAction(){      

        if (!empty($_FILES['banner']['name'])){
            $file=$_FILES['banner']['name'];
            $tmp_file=$_FILES['banner']['tmp_name'];
            $allowed_types='gif|jpg|jpeg|png';
            $path = FCPATH.'files/gambar/';
            $random_name= $this->input->post('label_banner').'_'.date('dmysi');
            $explode = explode('.',$file);
            $extensi = $explode[count($explode)-1];
            $file_name = $random_name.".".$extensi;
        }else{
            $file_name = "";
        }
        $data = [
            'banner_category' => $this->input->post('banner_category'),
            'label_banner' => $this->input->post('label_banner'),
            'banner' => $file_name,
            'banner_desc' => $this->input->post('banner_desc'),
            'alt_text' => $this->input->post('alt_text'),
            'i_status' => $this->input->post('i_status') 
        ];
        $result = $this->m_banner->addDataAction($data);  

        if($result){
            $upload = move_uploaded_file ($tmp_file, $path.$file_name);
        }
        if($upload){    
            $params = array('success', $this->pesanIconSuccess, $this->pesanAddSuccess);
            $this->session->set_flashdata('pesan', $params);
            redirect('banner/view', $data);
        }else{
            $params = array('danger', $this->pesanIconError, $this->pesanAddError);
            $this->session->set_flashdata('pesan',$params); 
            $this->session->set_flashdata('post', $data);
            redirect('banner/add', $data);
        }              
    }

    public function edit($id=0) {
        $id = $this->uri->segment(3);
        $data = $this->m_banner->getDataById($id);
        $data = array_merge($data, $this->data_construct());
        $msg = $this->session->flashdata('pesan');
        $data['msg'] = (!empty($msg)) ? $msg : ['', '', ''];
        $this->layout->render('banner/edit_banner', $data);
    }

    public function editAction($id=0){
        if (!empty($_FILES['banner']['name'])){
            $file=$_FILES['banner']['name'];
            $tmp_file=$_FILES['banner']['tmp_name'];
            $path = FCPATH.'files/gambar/';
            $random_name= $this->input->post('label_banner').'_'.date('dmysi');
            $explode = explode('.',$file);
            $extensi = $explode[count($explode)-1];
            $file_name = $random_name.".".$extensi;
            unlink($path.$this->input->post('banner'));
            $upload = move_uploaded_file ($tmp_file, $path.$file_name);
        }else{
            $file_name = $this->input->post('banner');
            $upload = "";
        }
        
        $data = array(
            'banner_category' => $this->input->post('banner_category'),
            'label_banner' => $this->input->post('label_banner'),
            'banner' => $file_name,
            'banner_desc' => $this->input->post('banner_desc'),
            'alt_text' => $this->input->post('alt_text'),
            'i_status' => $this->input->post('i_status')
        );
        $updateData = $this->m_banner->editDataAction($data, ['id_banner' => $this->input->post('id_banner')]);
        if($updateData){    
            $params = array('success', $this->pesanIconSuccess, $this->pesanEditSuccess);
            $this->session->set_flashdata('pesan', $params);
            redirect('banner/view', $data);
        }else{
            $params = array('danger', $this->pesanIconError, $this->pesanAddError);
            $this->session->set_flashdata('pesan',$params); 
            $this->session->set_flashdata('post', $data);
            redirect('banner/edit', $data);
        }        
    }

    public function detail() {
        $id = $this->uri->segment(3);
        $data = $this->m_banner->getDataById($id);
        $this->layout->render('banner/detail_banner', $data);
    }

    public function detailAction(){
        $data = [
            'banner_category' => $this->input->post('banner_category'),
            'label_banner' => $this->input->post('label_banner'),
            'banner' => $file_name,
            'banner_desc' => $this->input->post('banner_desc'),
            'alt_text' => $this->input->post('alt_text'),
            'i_status' => $this->input->post('i_status')
        ];        
    }

    public function delete(){
        $id = $this->uri->segment(3);  
        $delete = $this->m_banner->delete(['id_banner' => $id]);     
        if($delete){
            $params = array('success', $this->pesanIconSuccess, $this->pesanDeleteSuccess);
            $this->session->set_flashdata('pesan',$params); 
        }else{
            $params = array('danger', $this->pesanIconError, $this->pesanDeleteError);
            $this->session->set_userdata('pesan',$params);
        }
        redirect('banner/view');        
    }

    public function restore(){
        $msg = $this->session->flashdata('pesan');
        $data['msg'] = (!empty($msg)) ? $msg : ['', '', ''];
        $data['url_data_deleted'] = site_url('banner/get_data_deleted');
        $this->layout->render('banner/restore_banner', $data);
    }

    public function restoreAction(){    
        $id = $this->uri->segment(3);
        $restore_banner = $this->m_banner->restore(['id_banner' => $id]);
        if ($restore_banner) {
            $params = array('success', $this->pesanIconSuccess, $this->pesanRestoreSuccess);
            $this->session->set_flashdata('pesan',$params); 
        }else{
            $params = array('danger', $this->pesanIconError, $this->pesanRestoreError);
            $this->session->set_userdata('pesan',$params);
        }
        redirect('banner/view');  
    }  
    
}