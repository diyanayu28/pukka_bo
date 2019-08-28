<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends CI_Model {

    protected $table_name = 'default_user';


    private function query(){
        $query  =   "SELECT 
                    u.userId,
                    u.realname,
                    u.username,
                    u.password,
                    u.foto,
                    u.active,
                    g.groupId,
                    g.groupName
                FROM 
                    default_user u
                INNER JOIN
                    default_group g ON g.groupId = u.groupId";
        return $query;
    }


    public function getListData($options = []){
        $username = $this->session->userdata('username');
        $where_like = empty($options['where_like']) ? '1 = 1' : '('.implode(' OR ', $options['where_like']).')'; 
        $sql = $this->query()."         
            WHERE 
                username != '".$username."' AND ".$where_like."
            ORDER BY ".$options['order']." ".$options['mode']."
            LIMIT ".$options['offset'].", ".$options['limit'];
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getTotalData($options){
        $where_like = empty($options['where_like']) ? '1 = 1' : '('.implode(' OR ', $options['where_like']).')'; 
        $sql = $this->query()."         
            WHERE 
                1 = 1 AND ".$where_like;
        $query = $this->db->query($sql);
        return $query->num_rows();
    }


    public function getTotal(){
        $sql = $this->query();
        $query = $this->db->query($sql);
        return $query->num_rows();
    }


    public function addDataAction($data){
        $realname = $data['realname'];
        $username = $data['username'];
        $password = md5($data['password']);

       // $description = $data['description'];
        $active = $data['active'];
        $foto = $data['foto'];
        $groupId = $data['groupId'];
       // $app = $data['appId'];
        $sql = "INSERT INTO 
                    default_user
                    (realname, username, password, foto, active, groupId)
                VALUES
                    ('$realname','$username','$password','$foto','$active',$groupId)";

        $result = $this->db->query($sql);
        
        return $result_group;
    }

    public function getDataMax(){
        $sql = "SELECT 
                    *
                FROM
                    default_user
                ORDER BY userId DESC limit 1";
        $query = $this->db->query($sql);
        return $query->row_array(); 

    }
    public function getDataById($id){
        $sql = "SELECT 
                    u.userId,
                    u.realname,
                    u.username,
                    u.password,
                    u.foto,
                    u.active,
                    g.groupId,
                    g.groupName
                FROM
                    default_user u
                INNER JOIN
                    default_group g ON g.groupId = u.groupId
                WHERE u.userId='$id'";
        $query = $this->db->query($sql);
        return $query->row();  
    }

    public function getDataByUsername($id){
        $sql = "SELECT 
                    u.userId,
                    u.realname,
                    u.username,
                    u.foto,
                    u.active,
                    g.groupId,
                    g.groupName
                FROM
                    default_user u
                INNER JOIN
                    default_group g ON g.groupId = u.groupId
                WHERE u.username='$id'";
        $query = $this->db->query($sql);
        return $query->row();  
    }
    public function update($data){
        $realname = $data['realname'];
        $username = $data['username'];
       // $description = $data['description'];
        $foto = $data['foto'];
        $active = $data['active'];
        $groupId = $data['groupId'];
        $userId = $data['userId'];
        $update_user = "UPDATE 
                        default_user
                        SET 
                        realname='$realname',
                        username='$username',
                        foto = '$foto',
                        active = '$active',
                        groupId = '$groupId'
                    WHERE 
                        userId='$userId'";
            $result_update_user = $this->db->query($update_user);
        
        return $result_update_user;
    }
    public function updatePassword($data){
        $pass_old = $data['pass_old'];
        $pass_new = $data['pass_new'];
        $pass_new_retype = md5($data['pass_new_retype']);
        $id = $data['id'];
        
        $update_user = "UPDATE 
                        default_user
                    SET 
                        password='$pass_new_retype'
                    WHERE 
                        userId='$id'";
        $result = $this->db->query($update_user);
        return $result;
    }
    public function delete($id=0){
            $user = "DELETE FROM
                    default_user
                WHERE 
                    userId='$id'";
            $result_delete_user = $this->db->query($user);
        
        return $result_delete_user;
    }
    public function resetPassword($data){
        $pass_new = md5($data['pass_new']);
        $pass_new_retype = md5($data['pass_new_retype']);
        $id = $data['id'];
        
        $update_user = "UPDATE 
                        default_user
                    SET 
                        password='$pass_new_retype'
                    WHERE 
                        userId='$id'";
        $result = $this->db->query($update_user);
        return $result;
    }

    // untuk mengecek username yg ada di database
    public function getUsername($username){
         $this->db->where('username',$username);
         $query = $this->db->get('default_user');
        //$query = "SELECT username FROM default_user WHERE username = '".$username."' ";

        if ($query->num_rows() > 0) {
            return true;
        }else{
            return false;
        }
    }
    
}
