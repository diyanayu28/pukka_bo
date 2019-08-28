<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Layout {

        protected $CI;
        public function __construct(){
            $this->CI =& get_instance();
        }

        public function render($x, $y){
            $arr['set']['html'] = $x;
            $arr['set']['data'] = $y;
        	$this->CI->load->view('main/layout-document', $arr);
        }

        public function set_content($html, $data){
            if ($this->CI->checking_access == 0){
                $this->CI->load->view('errors/page_not_registered', array());
            }else{
                $this->CI->load->view($html, $data);
            }

            //$this->CI->load->view($html, $data);
        }



}
?>