<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Ref_kategori extends My_Controller {

    protected $option_category = [
        'service' => 'service', 
        'news' => 'news', 
        'static_page' => 'static_page', 
        ];

    public function __construct() {
        parent::__construct();
        $this->load->model('m_ref_kategori');
        $this->title = "Manajemen Kategori";
        $this->titleRestore = "Data Kategori yang Dihapus";
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

        $options['order'] = !empty($order) && !empty($columns) ? $columns[$order[0]['column']]['data'] : 'id_category';
        $options['mode'] = !empty($order) ? $order[0]['dir']: 'desc';
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $options['offset'] = empty($start) ? 0 : $start;
        $options['limit'] = empty($length) ? 10 : $length;
        $where_like = array();
        if (!empty($requestData['search']['value'])){
            $options['where_like'] = array(
                "category_name LIKE '%".$requestData['search']['value']."%'",
                "category_group LIKE '%".$requestData['search']['value']."%'",
            );
        }else{
            $options['where_like'] = [];
        }
        $dataOutput = $this->m_ref_kategori->getListData($options);
        $totalFiltered = $this->m_ref_kategori->getTotalData($options);
        $totalData = $this->m_ref_kategori->getTotal();
        $no = $options['offset'] + 1;
        if (!empty($dataOutput)){
            foreach ($dataOutput as $key => $value) {
                $value->no = $no;
                $value->aksi = '<div class="btn-action">

                                    <a href="'.site_url('ref_kategori/edit/'.$value->id_category).'" class="btn btn-default btn-xs '.$this->updateon.'" data-toggle="tooltip" data-placement="top" title="Ubah Data">
                                        <img src="'.$this->config->item('path_btn').'icon-edit.png">
                                    </a>
                                    <a href="'.site_url('ref_kategori/delete/'.$value->id_category).'" class="btn btn-default btn-delete btn-flat btn-xs '.$this->deleteon.'" data-toggle="tooltip" data-placement="top" title="Hapus Data" data-confirm="Anda yakin akan menghapus data '.$value->category_name.'?"> <img src="'.$this->config->item('path_btn').'icon-delete.png">
                                    </a>
                                </div>';
                                $value->c_status = ($value->c_status == 'Y') ? '<span class="badge bg-success">Aktif</span>' : '<span class="badge bg-danger">Tidak Aktif</span>';

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
        $options['order'] = !empty($order) && !empty($columns) ? $columns[$order[0]['column']]['data'] : 'id_category';
        $options['mode'] = !empty($order) ? $order[0]['dir']: 'desc'; // mode pengurutan data
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $options['offset'] = empty($start) ? 0 : $start;
        $options['limit'] = empty($length) ? 10 : $length; // untuk menentukan jumlah per page
        $where_like = array();
        if (!empty($requestData['search']['value'])){
            $options['where_like'] = array( // option untuk searching
                "category_name LIKE '%".$requestData['search']['value']."%'",
                "category_group LIKE '%".$requestData['search']['value']."%'"
            );
        }else{
            $options['where_like'] = [];
        }
        $dataOutput = $this->m_ref_kategori->getListDataDeleted($options); 
        $totalFiltered = $this->m_ref_kategori->getTotalDataDeleted($options);
        $totalData = $this->m_ref_kategori->getTotalDeleted();
        $no = $options['offset'] + 1;
        if (!empty($dataOutput)){
            foreach ($dataOutput as $key => $value) {
                $value->no = $no;
                $value->aksi = '<div class="btn-action">
                                    <a href="'.site_url('ref_kategori/restoreAction/'.$value->id_category).'" class="btn btn-default btn-delete btn-flat btn-xs '.$this->deleteon.'" data-toggle="tooltip" data-placement="top" title="Restore Data" data-confirm="Anda yakin akan merestore data '.$value->category_name.'?"> <img src="'.$this->config->item('path_btn').'icon-sync.png">
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
        $data['url_get_json'] = site_url('ref_kategori/get_data_json');
        $data['url_add'] = site_url('ref_kategori/add');
        $data['url_restore'] = site_url('ref_kategori/restore');
        $this->layout->render('ref_kategori/view_ref_kategori', $data);
    }

    public function add() {
        $msg = $this->session->flashdata('pesan');
        $post = $this->session->flashdata('post');
        $data = $this->data_construct();
        $this->layout->render('ref_kategori/add_ref_kategori', $data);
    }
    
    public function addAction(){
        $data = [
            'category_name' => $this->input->post('category_name'),
            'category_group' => $this->input->post('category_group'),
            'c_status' => $this->input->post('c_status')
        ];
        $result = $this->m_ref_kategori->addDataAction($data);

        if($result){    
            $params = array('success', $this->pesanIconSuccess, $this->pesanAddSuccess);
            $this->session->set_flashdata('pesan', $params);
            redirect('ref_kategori/view', $data);
        }else{
            $params = array('danger', $this->pesanIconError, $this->pesanAddError);
            $this->session->set_flashdata('pesan',$params); 
            $this->session->set_flashdata('post', $data);
            redirect('ref_kategori/add', $data);
        }        
    }

    public function edit() {
        $id = $this->uri->segment(3);
        $data = $this->m_ref_kategori->getDataById($id);
        $data = array_merge($data, $this->data_construct());
        $msg = $this->session->flashdata('pesan');
        $data['msg'] = (!empty($msg)) ? $msg : ['', '', ''];
        $this->layout->render('ref_kategori/edit_ref_kategori', $data);
    }

    public function editAction(){
        $data = [

            'category_name' => $this->input->post('category_name'),
            'category_group' => $this->input->post('category_group'),
            'c_status' => $this->input->post('c_status')
        ];
        $updateData = $this->m_ref_kategori->editDataAction($data, ['id_category' => $this->input->post('id_category')]);

        if($updateData){    
            $params = array('success', $this->pesanIconSuccess, $this->pesanEditSuccess);
            $this->session->set_flashdata('pesan', $params);
            redirect('ref_kategori/view', $data);
        }else{
            $params = array('danger', $this->pesanIconError, $this->pesanAddError);
            $this->session->set_flashdata('pesan',$params); 
            $this->session->set_flashdata('post', $data);
            redirect('ref_kategori/edit', $data);
        }        
    }

    public function delete(){
        $id = $this->uri->segment(3);  
        $delete = $this->m_ref_kategori->delete(['id_category' => $id]);     
        if($delete){
            $params = array('success', $this->pesanIconSuccess, $this->pesanDeleteSuccess);
            $this->session->set_flashdata('pesan',$params); 
        }else{
            $params = array('danger', $this->pesanIconError, $this->pesanDeleteError);
            $this->session->set_userdata('pesan',$params);
        }
        redirect('ref_kategori/view');        
    }

    public function restore(){
        $msg = $this->session->flashdata('pesan');
        $data['msg'] = (!empty($msg)) ? $msg : ['', '', ''];
        $data['url_data_deleted'] = site_url('ref_kategori/get_data_deleted');
        $this->layout->render('ref_kategori/restore_ref_kategori', $data);
    }

    public function restoreAction(){    
        $id = $this->uri->segment(3);
        $restore_category = $this->m_ref_kategori->restore(['id_category' => $id]);
        if ($restore_category) {
            $params = array('success', $this->pesanIconSuccess, $this->pesanRestoreSuccess);
            $this->session->set_flashdata('pesan',$params); 
        }else{
            $params = array('danger', $this->pesanIconError, $this->pesanRestoreError);
            $this->session->set_userdata('pesan',$params);
        }
        redirect('ref_kategori/view');  
    }  
    
}