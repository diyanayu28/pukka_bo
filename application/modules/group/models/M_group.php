<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_group extends CI_Model {

	
	public function getData(){
        $sql = "SELECT 
                    groupId,
        			groupName,
        			description
        		FROM 
        			default_group";
		$query = $this->db->query($sql);
		return $query->result();
	}

    public function addDataAction($data){
        $groupName = $data['groupName'];
        $description = $data['description'];
        $sql = "INSERT INTO 
                    default_group
                    (groupName, description)
                VALUES
                    ('$groupName','$description')";
        $result = $this->db->query($sql);
        return $result;
    }
    public function getDataById($id){
        $sql = "SELECT 
                    groupId,
                    groupName,
                    description
                FROM
                    default_group 
                WHERE groupId='$id'";
        $query = $this->db->query($sql);
        return $query->row();  
    }
    public function getDataByUsername($id){
        $sql = "SELECT 
                    u.userId,
                    u.realname,
                    u.username,
                    u.description,
                    u.active,
                    gu.groupId,
                    g.groupName
                FROM
                    default_user u
                INNER JOIN
                    default_group_user gu ON gu.userId = u.userId
                INNER JOIN
                    default_group g ON g.groupId = gu.groupId
                WHERE u.username='$id'";
        $query = $this->db->query($sql);
        return $query->row();  
    }
    public function update($data){
        $groupName = $data['groupName'];
        $description = $data['description'];
        $groupId = $data['groupId'];
        $group = "UPDATE
                    default_group
                SET groupName='$groupName', description = '$description'
                WHERE 
                    groupId='$groupId'";
        $result= $this->db->query($group);
        return $result;
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
    public function delete($id){
        $group = "DELETE FROM
                    default_group
                WHERE 
                    groupId='$id'";
        $result = $this->db->query($group);
        return $result;
    }


}
