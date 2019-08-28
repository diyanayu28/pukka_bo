<?php
class MY_Controller extends CI_Controller {

    public $createon    = '';
    public $updateon    = '';
    public $deleteon    = '';
    public $detilon     = '';
    public $realname;
    public $notif_data;
    public $Encryption;

    public function __construct() {
       	parent::__construct();
       	//session
        if ($this->session->userdata('isLogin') == FALSE) {
            redirect('login');
        }
        
        //load model
        $this->load->model('login/m_login');
        $this->load->model('menu/m_menu');
        
        $this->session_group = $this->session->userdata('group');

        //data header statis
        $this->user_id = $this->session->userId;
        $this->username = $this->user_active()->username;
        $this->realname = $this->user_active()->realname;
        $this->foto_profil = $this->user_active()->foto;

        //set leyout template
        $this->load->library(array('layout', 'Encryption')); 
        $this->Encryption = new Encryption();

        //load menu
        $this->menu = $this->menu();
        $this->menu_home = $this->menu_home();

        //time setting
        date_default_timezone_set('Asia/Jakarta');
        $this->now = date("Y-m-d");

        $url_page = $this->uri->segment('1');
        $url_sub = $this->uri->segment('2'); 
        if(empty($url_page) || empty($url_sub)){
            redirect('home/view');
        }
        $access_validation = json_decode(json_encode($this->m_login->get_validasi_page($url_page,$url_sub,$this->session_group)), True);
        if(sizeof($access_validation) != 0){
            $validate = 1;
            // if($access_validation[0]['tambah'] == 'on'){
            //     $this->createon = "";
            // }else{
            //     $this->createon = "hide";
            // }
            // if($access_validation[0]['ubah'] == 'on'){
            //     $this->updateon = "";
            // }else{
            //     $this->updateon = "hide";
            // }
            // if($access_validation[0]['hapus'] == 'on'){
            //     $this->deleteon = "";
            // }else{
            //     $this->deleteon = "hide";
            // }
            // if($access_validation[0]['detil'] == 'on'){
            //     $this->detilon = "";
            // }else{
            //     $this->detilon = "hide";
            // }

        }else{
            $validate = 0;
        }
        $this->checking_access = $validate;
    }

    public function format_tanggal($date){
        $BulanIndo = array("","Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");        

        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl   = substr($date, 8, 2);         
        $result = $tgl . " " . $BulanIndo[(int)$bulan] . " ". $tahun;     
        return($result);
    }
    public function format_bulan($date){
        $BulanIndo = array("","Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
             
                $tahun = substr($date, 0, 4);
                $bulan = substr($date, 5, 2);
                $tgl   = substr($date, 8, 2);
             
                $result = $BulanIndo[(int)$bulan] . " ". $tahun;     
                return($result);
    }
    public function format_angka($angka) {
        $frmt = "Rp ".number_format($angka, 0, ',', '.');
        return $frmt;
    }
    public function format_angka2($angka) {
        $frmt = number_format($angka, 0, ',', '.');
        return $frmt;
    }

    public function format_hari($data) {
        switch ($data) {
            case 'Mon':
                $bulan = "Senin";
                break;
            case 'Tue':
                $bulan = "Selasa";
                break;
            case 'Wed':
                $bulan = "Rabu";
                break;
            case 'Thu':
                $bulan = "Kamis";
                break;
            case 'Fri':
                $bulan = "Jumat";
                break;
            case 'Sat':
                $bulan = "Sabtu";
                break;
            case 'Sun':
                $bulan = "Minggu";
                break;
            default:
                $bulan = "Tidak Sesuai";
                break;
        }
        return $bulan;
    }

    private function user_active() {
        $this->load->model('user/m_user');
        $result = $this->m_user->getDataById($this->user_id);
        return $result;
    }


    public function menu() {
        $result = $this->m_menu->getData($this->session_group);
        return $result;
    }

    public function menu_home() {
        $this->load->model('login/m_login');
        $result = $this->m_login->get_menu_home($this->session_group);
        return $result;
    }

    public function subMenu($id) {
        $this->load->model('login/m_login');
        $result = $this->m_login->get_sub_menu($this->session_group, $id);
        return $result;
    }


    public function curl($url){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 864000, // 10 hari -_^
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
            CURLOPT_FRESH_CONNECT => TRUE,
            CURLOPT_HTTPHEADER => array(
                "Content-type: application/x-www-form-urlencoded; charset=utf-8"
            ),
        ));

        $result = curl_exec($curl);
        $err = curl_error($curl);
        if ($err){
            print_r($err);
            die();
        }
        return $result;
    }

    function random_string($length = 8) {
        $str = "";
        $characters = array_merge(range('A','Z'), range('0','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str  .= $characters[$rand];
        }
        return $str;
    }

    function random_number($length = 6) {
        $str = "";
        $characters = array_merge(range('0','9'), range('0','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str  .= $characters[$rand];
        }
        return $str;
    }

    function explode_tanggal($date){
        $tgl = explode('/', $date);
        $result = $tgl[2].'-'.$tgl[1].'-'.$tgl['0'];
        return $result;
    }

    function count_string($param){
        $result = str_replace(".", "", $param);
        return $result;
    }
}
?>