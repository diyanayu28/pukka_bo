<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Identity extends My_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_identity');
        $this->title = "Manajemen Identity";
        $this->pesanAddSuccess = "Data Berhasil Ditambahkan";
        $this->pesanAddError = "Data Tidak Berhasil Ditambahkan";
        $this->pesanEditSuccess = "Data Berhasil Diubah";
        $this->pesanEditError = "Data Tidak Berhasil Diubah";
        $this->pesanDeleteSuccess = "Data Berhasil Dihapus";
        $this->pesanDeleteError = "Data Tidak Berhasil Dihapus";
        $this->pesanIconSuccess = "fa fa-check-circle";
        $this->pesanIconError = "fa fa-times-circle";

    }

    public function get_data_json(){
        ob_start();
        $data = array();
        $requestData= $_REQUEST;
        $order = $this->input->post('order');
        $columns = $this->input->post('columns');
        $options['order'] = !empty($order) && !empty($columns) ? $columns[$order[0]['column']]['data'] : 'id_identity';
        $options['mode'] = !empty($order) ? $order[0]['dir']: 'desc';
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $options['offset'] = empty($start) ? 0 : $start;
        $options['limit'] = empty($length) ? 10 : $length;
        $where_like = array();
        if (!empty($requestData['search']['value'])){
            $options['where_like'] = array(
                "website_name LIKE '%".$requestData['search']['value']."%'",
            );
        }else{
            $options['where_like'] = [];
        }
        $dataOutput = $this->m_identity->getListData($options);
        $totalFiltered = $this->m_identity->getTotalData($options);
        $totalData = $this->m_identity->getTotal();
        $no = $options['offset'] + 1;
        if (!empty($dataOutput)){
            foreach ($dataOutput as $key => $value) {
                $value->no = $no;
                $value->aksi = '<div class="btn-action">

                                    <a href="'.site_url('identity/edit/'.$value->id_identity).'" class="btn btn-default btn-xs '.$this->updateon.'" data-toggle="tooltip" data-placement="top" title="Ubah Data">
                                        <img src="'.$this->config->item('path_btn').'icon-edit.png">
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
        $id = $this->uri->segment(3);
        $data = $this->m_identity->getDataById();
        $this->layout->render('identity/view_identity', $data);
    }

    public function edit($id=0) {
        $id = $this->uri->segment(3);
        $data = $this->m_identity->getDataById($id);
        $msg = $this->session->flashdata('pesan');
        $data['msg'] = (!empty($msg)) ? $msg : ['', '', ''];
        $this->layout->render('identity/edit_identity', $data);
    }

    public function editAction($id=0){
        if (!empty($_FILES['favicon']['name'])){
            $file=$_FILES['favicon']['name'];
            $tmp_file=$_FILES['favicon']['tmp_name'];
            $path = FCPATH.'files/identity/';
            $random_name= $this->input->post('website_name').'_'.date('dmysi');
            $explode = explode('.',$file);
            $extensi = $explode[count($explode)-1];
            $file_name = $random_name.".".$extensi;
            unlink($path.$this->input->post('favicon'));
            $upload = move_uploaded_file ($tmp_file, $path.$file_name);
        }else{
            $file_name = $this->input->post('favicon');
            $upload = "";
        }
        
        $data = array(
            'website_name' => $this->input->post('website_name'),
            'website_address' => $this->input->post('website_address'),
            'description' => $this->input->post('description'),
            'address' => $this->input->post('address'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'google_plus' => $this->input->post('google_plus'),
            'twitter' => $this->input->post('twitter'),
            'facebook' => $this->input->post('facebook'),
            'linkedin' => $this->input->post('linkedin'),
            'instagram' => $this->input->post('instagram'),
            'meta_description' => $this->input->post('meta_description'),
            'meta_keyword' => $this->input->post('meta_keyword'),
            'favicon' => $file_name
        );
        $updateData = $this->m_identity->editDataAction($data, ['id_identity' => $this->input->post('id_identity')]);
        if($updateData){    
            $params = array('success', $this->pesanIconSuccess, $this->pesanEditSuccess);
            $this->session->set_flashdata('pesan', $params);
            redirect('identity/view', $data);
        }else{
            $params = array('danger', $this->pesanIconError, $this->pesanAddError);
            $this->session->set_flashdata('pesan',$params); 
            $this->session->set_flashdata('post', $data);
            redirect('identity/edit', $data);
        }        
    }
       
    public function detail() {
        $id = $this->uri->segment(3);
        $data = $this->m_identity->getDataById($id);
        $this->layout->render('identity/view_identity', $data);
    }

    public function deleteImage($id=0) {
    $id = $this->uri->segment(3);
    $data = $this->m_identity->getDataById($id);
    if ($data['favicon'] != "default.jpg") {
        $filename = explode(".", $data['favicon'])[0];
        return array_map('unlink', glob(FCPATH."files/identity/*"));
    }
        $deleteImage = $this->m_identity->HapusDataImage(['id_identity' => $favicon]);
    }
   
}