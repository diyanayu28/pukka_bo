<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Validation_page extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('m_login');

        $page=$this->uri->segment('1');
        $sub=$this->uri->segment('2');    
        $access_validation = json_decode(json_encode($this->m_login->get_validasi_page($page,$sub)), True);
        $this->checking_access = $access_validation[0]['checking'];
       

        
    }

}
