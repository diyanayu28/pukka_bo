<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Statis extends My_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_statis');
        $this->title = "Manajemen Halaman Statis";
        $this->titleRestore = "Data Halaman Statis yang Dihapus";
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
        $data['option_kategori'] = $this->m_statis->getOptionKategori();
        return $data;
    }

    public function get_data_json(){
        ob_start();
        $data = array();
        $requestData= $_REQUEST;
        $order = $this->input->post('order');
        $columns = $this->input->post('columns');
        $options['order'] = !empty($order) && !empty($columns) ? $columns[$order[0]['column']]['data'] : 'id_page';
        $options['mode'] = !empty($order) ? $order[0]['dir']: 'desc';
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $options['offset'] = empty($start) ? 0 : $start;
        $options['limit'] = empty($length) ? 10 : $length;
        $where_like = array();
        if (!empty($requestData['search']['value'])){
            $options['where_like'] = array(
                "page_title LIKE '%".$requestData['search']['value']."%'"
            );
        }else{
            $options['where_like'] = [];
        }
        $dataOutput = $this->m_statis->getListData($options);
        $totalFiltered = $this->m_statis->getTotalData($options);
        $totalData = $this->m_statis->getTotal();
        $no = $options['offset'] + 1;
        if (!empty($dataOutput)){
            foreach ($dataOutput as $key => $value) {
                $value->no = $no;
                $value->aksi = '<div class="btn-action">
                                    <a href="'.site_url('statis/detail/'.$value->id_page).'" class="btn btn-default btn-xs '.$this->updateon.'" data-toggle="tooltip" data-placement="top" title="Detail Data">
                                        <img src="'.$this->config->item('path_btn').'icon-preview.png">
                                    </a>
                                    <a href="'.site_url('statis/edit/'.$value->id_page).'" class="btn btn-default btn-xs '.$this->updateon.'" data-toggle="tooltip" data-placement="top" title="Ubah Data">
                                        <img src="'.$this->config->item('path_btn').'icon-edit.png">
                                    </a>
                                    <a href="'.site_url('statis/delete/'.$value->id_page).'" class="btn btn-default btn-delete btn-flat btn-xs '.$this->deleteon.'" data-toggle="tooltip" data-placement="top" title="Hapus Data" data-confirm="Anda yakin akan menghapus data '.$value->page_title.'?"> <img src="'.$this->config->item('path_btn').'icon-delete.png">
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
        $options['order'] = !empty($order) && !empty($columns) ? $columns[$order[0]['column']]['data'] : 'id_page';
        $options['mode'] = !empty($order) ? $order[0]['dir']: 'desc'; // mode pengurutan data
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $options['offset'] = empty($start) ? 0 : $start;
        $options['limit'] = empty($length) ? 10 : $length; // untuk menentukan jumlah per page
        $where_like = array();
        if (!empty($requestData['search']['value'])){
            $options['where_like'] = array( // option untuk searching
                "page_title LIKE '%".$requestData['search']['value']."%'"
            );
        }else{
            $options['where_like'] = [];
        }
        $dataOutput = $this->m_statis->getListDataDeleted($options); 
        $totalFiltered = $this->m_statis->getTotalDataDeleted($options);
        $totalData = $this->m_statis->getTotalDeleted();
        $no = $options['offset'] + 1;
        if (!empty($dataOutput)){
            foreach ($dataOutput as $key => $value) {
                $value->no = $no;
                $value->aksi = '<div class="btn-action">
                                    <a href="'.site_url('statis/restoreAction/'.$value->id_page).'" class="btn btn-default btn-delete btn-flat btn-xs '.$this->deleteon.'" data-toggle="tooltip" data-placement="top" title="Restore Data" data-confirm="Anda yakin akan merestore data '.$value->page_title.'?"> <img src="'.$this->config->item('path_btn').'icon-sync.png">
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
        $data['url_get_json'] = site_url('statis/get_data_json');
        $data['url_add'] = site_url('statis/add');
        $data['url_restore'] = site_url('statis/restore');
        $this->layout->render('statis/view_statis', $data);
    }

    public function detail() {
        $id = $this->uri->segment(3);
        $data = $this->m_statis->getDataById($id);
        $this->layout->render('statis/detail_statis', $data);
    }

    public function add() {
        $msg = $this->session->flashdata('pesan');
        $post = $this->session->flashdata('post');
        $data = $this->data_construct();
        $this->layout->render('statis/add_statis', $data);
    }
    
    public function addAction(){
        $tag_name = explode(',', $this->input->post('tag_name'));

        if (!empty($_FILES['image_static']['name'])){
            $file=$_FILES['image_static']['name'];
            $tmp_file=$_FILES['image_static']['tmp_name'];
            $path = FCPATH.'files/staticpage/';
            $random_name= $this->input->post('page_title').'_'.date('dmysi');
            $explode = explode('.',$file);
            $extensi = $explode[count($explode)-1];
            $file_name = $random_name.".".$extensi;
        }else{
            $file_name = "";
        }
        $data = [
            'fk_id_category' => $this->input->post('id_category'),
            'page_title' => $this->input->post('page_title'),
            'page_content' => $this->input->post('page_content'),
            'meta_desc' => $this->input->post('meta_desc'),
            'meta_keyword' => $this->input->post('meta_keyword'),
            'image' => $file_name,
            'posted_at' => date('Y-m-d H:i:s'),
            'status' => $this->input->post('status')
        ];
        $result = $this->m_statis->insert($data);
        $pageId = $this->db->insert_id();

        if (!empty($tag_name)){
            foreach ($tag_name as $key => $value) {
                $dataMetaKeyword = $this->db->get_where('tag', array('tag_name' => $value))->row();
                if (!empty($dataMetaKeyword)){
                    $result = $result && $this->db->insert('tag_staticpage', array(
                        'fk_id_page' => $pageId,
                        'fk_id_tag' => $dataMetaKeyword->id_tag
                    ));
                }else{
                    $addMeta = $this->db->insert('tag', array('tag_name' => $value, 'tag_seo' => seo_title($value)));
                    if ($addMeta){
                        $id_tag = $this->db->insert_id();
                        $result = $result && $this->db->insert('tag_staticpage', array(
                            'fk_id_page' => $pageId,
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
            redirect('statis/view', $data);
        }else{
            $params = array('danger', $this->pesanIconError, $this->pesanAddError);
            $this->session->set_flashdata('pesan',$params); 
            $this->session->set_flashdata('post', $data);
            redirect('statis/add', $data);
        }              
    }

    public function edit($id=0) {
        $id = $this->uri->segment(3);
        $data = $this->m_statis->getDataById($id);
        $data['data_by_id'] = $this->m_statis->getDataById($id);
        $data = array_merge($data, $this->data_construct());
        $msg = $this->session->flashdata('pesan');
        $data['msg'] = (!empty($msg)) ? $msg : ['', '', ''];
        $tagSelected = $this->m_statis->getTagById($id);
        $tagName = array();
        if (!empty($tagSelected)){
            foreach ($tagSelected as $key => $value) {
                $tagName[] = $value->tag_name;
            }
        }
        $data['tagSelected'] = implode(',', $tagName);
        $this->layout->render('statis/edit_statis', $data);
    }

    public function editAction($id=0){
        $tag_name = explode(',', $this->input->post('tag_name'));
        $pageId =$this->input->post('id_page');
        if (!empty($_FILES['image_static']['name'])){
            $file=$_FILES['image_static']['name'];
            $tmp_file=$_FILES['image_static']['tmp_name'];
            $path = FCPATH.'files/staticpage/';
            $random_name= $this->input->post('page_title').'_'.date('dmysi');
            $explode = explode('.',$file);
            $extensi = $explode[count($explode)-1];
            $file_name = $random_name.".".$extensi;
            unlink($path.$this->input->post('image_static'));
            $upload = move_uploaded_file ($tmp_file, $path.$file_name);
        }else{
            $file_name = $this->input->post('image_static');
            $upload = "";
        }
        $data=array(
            'fk_id_category' => $this->input->post('id_category'),
            'page_title' => $this->input->post('page_title'),
            'page_content' => $this->input->post('page_content'),
            'meta_desc' => $this->input->post('meta_desc'),
            'meta_keyword' => $this->input->post('meta_keyword'),
            'posted_at' => date('Y-m-d H:i:s'),
            'image' => $file_name,
            'status' => $this->input->post('status')
        );

        $update = $this->m_statis->edit($data, ['id_page' => $this->input->post('id_page')]);
        $update = $update && $this->db->delete('tag_staticpage', array(
            'fk_id_page' => $pageId
        ));

        if (!empty($tag_name)){
            foreach ($tag_name as $key => $value) {
                $dataMetaKeyword = $this->db->get_where('tag', array('tag_name' => $value))->row();
                if (!empty($dataMetaKeyword)){
                    $update = $update && $this->db->insert('tag_staticpage', array(
                        'fk_id_page' => $pageId,
                        'fk_id_tag' => $dataMetaKeyword->id_tag
                    ));
                }else{
                    $addMeta = $this->db->insert('tag', array('tag_name' => $value, 'tag_seo' => seo_title($value)));
                    if ($addMeta){
                        $id_tag = $this->db->insert_id();
                        $update = $update && $this->db->insert('tag_staticpage', array(
                            'fk_id_page' => $pageId,
                            'fk_id_tag' => $id_tag
                        ));
                    }
                }
            }
        }
        if($update){    
            $params = array('success', $this->pesanIconSuccess, $this->pesanEditSuccess);
            $this->session->set_flashdata('pesan', $params);
            redirect('statis/view', $data);
        }else{
            $params = array('danger', $this->pesanIconError, $this->pesanAddError);
            $this->session->set_flashdata('pesan',$params); 
            $this->session->set_flashdata('post', $data);
            redirect('statis/edit', $data);
        }        
    }

    public function delete(){
        $id = $this->uri->segment(3);
        $delete_tag_staticpage = $this->m_statis->delete_tag_staticpage(['fk_id_page' => $id]);
        $delete = $this->m_statis->delete(['id_page' => $id]);  
        if ($delete_tag_staticpage && $delete) {
            $params = array('success', $this->pesanIconSuccess, $this->pesanDeleteSuccess);
            $this->session->set_flashdata('pesan',$params); 
        }else{
            $params = array('danger', $this->pesanIconError, $this->pesanDeleteError);
            $this->session->set_userdata('pesan',$params);
        }
        redirect('statis/view');
    }

    public function restore(){
        $msg = $this->session->flashdata('pesan');
        $data['msg'] = (!empty($msg)) ? $msg : ['', '', ''];
        $data['url_data_deleted'] = site_url('statis/get_data_deleted');
        $this->layout->render('statis/restore_statis', $data);


    }

    public function restoreAction(){    
        $id = $this->uri->segment(3);
        $restore_page = $this->m_statis->restore(['id_page' => $id]);
        if ($restore_page) {
            $params = array('success', $this->pesanIconSuccess, $this->pesanRestoreSuccess);
            $this->session->set_flashdata('pesan',$params); 
        }else{
            $params = array('danger', $this->pesanIconError, $this->pesanRestoreError);
            $this->session->set_userdata('pesan',$params);
        }
        redirect('statis/view');  
    }  

}

    