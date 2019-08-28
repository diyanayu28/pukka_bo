<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model {

	
	public function validate($username,$password)
	{
        $sql = "SELECT 
                    u.userId,
        			realName,
        			username,
        			password,
        			groupName,
                    g.groupId
        		FROM 
        			default_user u
        		INNER JOIN default_group g ON g.groupId = u.groupId 
        		WHERE 
        			username='$username' AND password='$password' AND active = 'Yes'";
		$query = $this->db->query($sql);
		return $query->row();
	}
        
    public function get_user($username){
    	$sql = "SELECT 
        			realName
        		FROM 
        			default_user u
        		INNER JOIN default_group g ON g.groupId = u.groupId 
        		WHERE 
        			username='$username'";
		$query = $this->db->query($sql);
		return $query->row();           
    }
    

    public function get_menu_home($session_group){
        $sql = "SELECT 
                    m.menuId, menuName, iconMenu, menuStyle, menuColor, menuParentId, page, subPage, menuDescription,
                    (SELECT COUNT(menuId) FROM default_menu WHERE menuParentId=m.menuId) AS cek
                FROM 
                    default_menu m
                INNER JOIN default_group_menu gm ON gm.menuId = m.menuId
                INNER JOIN default_page p ON p.pageId = m.menuDefaultPage
                INNER JOIN default_group g ON g.groupId = gm.groupId
                WHERE g.groupId='$session_group' AND menuName !='Beranda' AND menuPosition = 'content'
                ORDER BY menuOrder ASC";
        $query = $this->db->query($sql);
        return $query->result();           
    }

    public function get_sub_menu($session_group, $id){
        $sql = "SELECT 
                    m.menuId, menuName, iconMenu, menuStyle, menuParentId, page, subPage, menuDescription
                FROM 
                    default_menu m
                INNER JOIN default_group_menu gm ON gm.menuId = m.menuId
                INNER JOIN default_page p ON p.pageId = m.menuDefaultPage
                INNER JOIN default_group g ON g.groupId = gm.groupId
                WHERE g.groupId='$session_group' AND m.menuParentId = '$id'
                ORDER BY menuOrder ASC ";
        $query = $this->db->query($sql);
        return $query->result();           
    }

    public function get_validasi_page($page,$subPage,$session_group){
        $sql = "SELECT 
                    *
                FROM 
                    default_group_page gp
                INNER JOIN default_page p ON p.pageId = gp.pageId
                WHERE p.page='$page' AND p.subPage='$subPage' and gp.groupId='$session_group' and p.status = 'Yes'";
        $query = $this->db->query($sql);
        return $query->result();           
    }

    public function getNotif($userTo){
        $sql = "SELECT 
                    *,
                    CASE a.notifFromGroup
                    WHEN '4' THEN d.dsnNama
                    WHEN '3' THEN c.mhsNama
                    WHEN '2' THEN 'Administrator'
                    WHEN '1' THEN 'Root'
                    ELSE NULL
                    END AS notifFrom,
                    CASE a.notifFromGroup
                    WHEN '4' THEN 'foto_dosen'
                    WHEN '3' THEN 'foto_mahasiswa'
                    WHEN '2' THEN 'akun'
                    WHEN '1' THEN 'akun'
                    ELSE NULL
                    END AS notifLinkFoto,
                    CASE a.notifFromGroup
                    WHEN '4' THEN d.dsnFoto
                    WHEN '3' THEN c.mhsFoto
                    WHEN '2' THEN f.foto
                    WHEN '1' THEN f.foto
                    ELSE 'default.jpg'
                    END AS notifFoto,
                    a.timestamp AS waktu
                FROM 
                    default_notification a
                LEFT JOIN simak_bimbingan b ON b.bimId = a.notifJenisId
                LEFT JOIN simak_proposal e ON e.propId = a.notifJenisId
                LEFT JOIN simak_mhs c ON c.mhsUserId = a.notifUserFrom
                LEFT JOIN simak_dosen d ON d.dsnUserId = a.notifUserFrom
                LEFT JOIN default_user f ON f.userId = a.notifUserFrom 
                WHERE a.notifUserTo = '$userTo' 
                ORDER BY a.timestamp DESC
                limit 10";
        $query = $this->db->query($sql);
        return $query->result();           
    }
    public function getCountNotif($userTo){
        $sql = "SELECT 
                    count(*) AS jml
                FROM 
                    default_notification a
                LEFT JOIN simak_bimbingan b ON b.bimId = a.notifJenisId
                LEFT JOIN simak_mhs c ON c.mhsUserId = a.notifUserFrom
                LEFT JOIN simak_dosen d ON d.dsnUserId = a.notifUserFrom
                WHERE a.notifUserTo = '$userTo' AND a.notifStatus='1'";
        $query = $this->db->query($sql);
        return $query->row_array();           
    }

}
