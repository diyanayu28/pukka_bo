<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('m_login');
        //message
        $this->pesanLoginSuccess = "Upaya masuk berhasil. Tunggu beberapa saat";
        $this->pesanIconSuccess = "fa fa-check-circle";
        $this->pesanColorSuccess = "success";
        $this->pesanLoginWarning = "Silakan isikan Nama Pengguna dan Kata Sandi";
        $this->pesanIconWarning = "fa fa-warning";
        $this->pesanColorWarning = "warning";
        $this->pesanLoginError = "Upaya masuk gagal. Nama Pengguna atau Kata Sandi tidak sesuai";
        $this->pesanIconError = "fa fa-times-circle";
        $this->pesanColorError = "danger";
        }
	public function index()
	{
		$data['msg'] = $this->session->userdata('pesan');
        $data['msg_kembali'] = $this->session->userdata('pesan_kembali');
		$this->load->view('login/view_login',$data);
	}
	public function validate_login(){
        //memberi validasi pa da username dan password
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|md5');
		$this->form_validation->set_error_delimiters('<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>', '</div>');
		//jika form yang di isi salah , akan kembali lagi ke form_login

		if($this->form_validation->run()==FALSE){
			$result = 1;
			$params = array($result, $this->pesanIconWarning, $this->pesanLoginWarning, $this->pesanColorWarning,'');
            $this->session->set_userdata('pesan',$params); 
            redirect('login');
		}else{
			//jika form yang di isi benar 
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			  
			$cek = $this->m_login->validate($username, $password);
			if(!empty($cek)){
				$this->session->set_userdata('isLogin', TRUE);
				$this->session->set_userdata('userId',$cek->userId);  
				$this->session->set_userdata('username',$username);  
				$this->session->set_userdata('password',$password);
				$this->session->set_userdata('level', $cek->groupName);
				$this->session->set_userdata('group', $cek->groupId);
				
				$result = 1;
		        redirect('home/view');
			}else{
				$result = 1;
				$params = array($result, $this->pesanIconError, $this->pesanLoginError, $this->pesanColorError, '');
	            $this->session->set_userdata('pesan',$params); 
	            redirect('login');
			}
		}
    }

	function logout(){
            $this->session->sess_destroy();
            redirect('login');
    }

    /*
		Forgotpassword email sender:
		No view
	*/
    public function ForgotPassword()
   	{
    	$email = $this->input->post('email');      
    	$findemail = $this->m_login->ForgotPassword($email);  
    	if($findemail){
    		$this->m_login->sendpassword($findemail);
    	}else{
    		$this->session->set_flashdata('msg',' Email not found!');
    		redirect(base_url().'login/index','refresh');
     	}
    }


}
