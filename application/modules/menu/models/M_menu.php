<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_menu extends CI_Model {

    public function getData($session_group){
        $sql = "SELECT 
                    m.menuId, menuName, iconMenu, menuStyle, menuColor, menuParentId, page, subPage, menuDescription,
                    (SELECT COUNT(menuId) FROM default_menu WHERE menuParentId=m.menuId) AS cek
                FROM 
                    default_menu m
                INNER JOIN default_group_menu gm ON gm.menuId = m.menuId
                INNER JOIN default_page p ON p.pageId = m.menuDefaultPage
                INNER JOIN default_group g ON g.groupId = gm.groupId
                WHERE g.groupId='$session_group' AND menuPosition = 'sidebar'
                ORDER BY menuOrder ASC";
        $query = $this->db->query($sql);
        return $query->result();           
    }

    public function getDataPublic($session_group){
        $sql = "SELECT 
                    m.menuId, menuName, iconMenu, menuStyle, menuColor, menuParentId, page, subPage, menuDescription,
                    (SELECT COUNT(menuId) FROM default_menu WHERE menuParentId=m.menuId) AS cek
                FROM 
                    default_menu m
                INNER JOIN default_group_menu gm ON gm.menuId = m.menuId
                INNER JOIN default_page p ON p.pageId = m.menuDefaultPage
                INNER JOIN default_group g ON g.groupId = gm.groupId
                WHERE g.groupId='$session_group' OR g.groupId='3'
                ORDER BY menuOrder ASC";
        $query = $this->db->query($sql);
        return $query->result();           
    }

}