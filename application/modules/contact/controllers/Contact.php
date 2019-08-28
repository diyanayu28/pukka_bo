<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Contact extends My_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_contact');
        $this->title = "Manajemen Kontak";
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
        $options['order'] = !empty($order) && !empty($columns) ? $columns[$order[0]['column']]['data'] : 'id_contact';
        $options['mode'] = !empty($order) ? $order[0]['dir']: 'desc';
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $options['offset'] = empty($start) ? 0 : $start;
        $options['limit'] = empty($length) ? 10 : $length;
        $where_like = array();
        if (!empty($requestData['search']['value'])){
            $options['where_like'] = array(
                "name LIKE '%".$requestData['search']['value']."%'",
                "email LIKE '%".$requestData['search']['value']."%'"
            );
        }else{
            $options['where_like'] = [];
        }
        $dataInbox = $this->m_contact->update_status_kontak();
        $dataOutput = $this->m_contact->getListData($options);
        $totalFiltered = $this->m_contact->getTotalData($options);
        $totalData = $this->m_contact->getTotal();
        $no = $options['offset'] + 1;
        if (!empty($dataOutput)){
            foreach ($dataOutput as $key => $value) {
                $value->no = $no;
                $value->aksi = '<div class="btn-action">

                                    <a href="'.site_url('contact/detail/'.$value->id_contact).'" class="btn btn-default btn-xs '.$this->updateon.'" data-toggle="tooltip" data-placement="top" title="Detail Data">
                                        <img src="'.$this->config->item('path_btn').'icon-preview.png">
                                    </a>

                                    <a href="'.site_url('contact/delete/'.$value->id_contact).'" class="btn btn-default btn-delete btn-flat btn-xs '.$this->deleteon.'" data-toggle="tooltip" data-placement="top" title="Hapus Data" data-confirm="Anda yakin akan menghapus data ?"> <img src="'.$this->config->item('path_btn').'icon-delete.png">
                                    </a>


                                </div>';
                // $value->prodkat_timestamp = date('d/m/Y H:i', strtotime($value->prodkat_timestamp));
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
        $options['order'] = !empty($order) && !empty($columns) ? $columns[$order[0]['column']]['data'] : 'id_contact';
        $options['mode'] = !empty($order) ? $order[0]['dir']: 'desc'; // mode pengurutan data
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $options['offset'] = empty($start) ? 0 : $start;
        $options['limit'] = empty($length) ? 10 : $length; // untuk menentukan jumlah per page
        $where_like = array();
        if (!empty($requestData['search']['value'])){
            $options['where_like'] = array( // option untuk searching
                "name LIKE '%".$requestData['search']['value']."%'",
                "email LIKE '%".$requestData['search']['value']."%'"
            );
        }else{
            $options['where_like'] = [];
        }
        $dataOutput = $this->m_contact->getListDataDeleted($options); 
        $totalFiltered = $this->m_contact->getTotalDataDeleted($options);
        $totalData = $this->m_contact->getTotalDeleted();
        $no = $options['offset'] + 1;
        if (!empty($dataOutput)){
            foreach ($dataOutput as $key => $value) {
                $value->no = $no;
                $value->aksi = '<div class="btn-action">
                                    <a href="'.site_url('contact/restoreAction/'.$value->id_contact).'" class="btn btn-default btn-delete btn-flat btn-xs '.$this->deleteon.'" data-toggle="tooltip" data-placement="top" title="Restore Data" data-confirm="Anda yakin akan merestore data ?"> <img src="'.$this->config->item('path_btn').'icon-sync.png">
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
        $data['url_get_json'] = site_url('contact/get_data_json');
        $data['url_add'] = site_url('contact/add');
        $data['url_restore'] = site_url('contact/restore');
        $this->layout->render('contact/view_contact', $data);
    }


    public function detail() {
        $id = $this->uri->segment(3);
        $data = $this->m_contact->getDataById($id);
        $this->layout->render('contact/detail_contact', $data);
    }

    public function detailAction(){
        $data = [
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'subject' => $this->input->post('subject'),
            'message' => $this->input->post('message')
        ];        
    }

    public function delete(){
        $id = $this->uri->segment(3);  
        $delete = $this->m_contact->delete(['id_contact' => $id]);     
        if($delete){
            $params = array('success', $this->pesanIconSuccess, $this->pesanDeleteSuccess);
            $this->session->set_flashdata('pesan',$params); 
        }else{
            $params = array('danger', $this->pesanIconError, $this->pesanDeleteError);
            $this->session->set_userdata('pesan',$params);
        }
        redirect('contact/view');        
    }

    public function restore(){
        $msg = $this->session->flashdata('pesan');
        $data['msg'] = (!empty($msg)) ? $msg : ['', '', ''];
        $data['url_data_deleted'] = site_url('contact/get_data_deleted');
        $this->layout->render('contact/restore_contact', $data);
    }

    public function restoreAction(){    
        $id = $this->uri->segment(3);
        $restore_contact = $this->m_contact->restore(['id_contact' => $id]);
        if ($restore_contact) {
            $params = array('success', $this->pesanIconSuccess, $this->pesanRestoreSuccess);
            $this->session->set_flashdata('pesan',$params); 
        }else{
            $params = array('danger', $this->pesanIconError, $this->pesanRestoreError);
            $this->session->set_userdata('pesan',$params);
        }
        redirect('contact/view');  
    }  

    
}