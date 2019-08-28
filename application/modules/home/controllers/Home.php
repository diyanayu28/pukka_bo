<?php
error_reporting('1');
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends MY_Controller {

    public function __construct() {
        parent::__construct();
        
    }

    public function view() {
        $data['sample'] = "Selamat Datang";        
    	$data['menu'] = $this->menu_home(); // function menu_home di MY_CONTROLLER
        $this->layout->render('home/view_home', $data);  
    }
}
