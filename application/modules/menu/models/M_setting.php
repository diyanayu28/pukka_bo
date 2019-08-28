<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_setting extends CI_Model {
    private function query_page(){
        $query = "SELECT 
                    p.pageId,
                    p.page,
                    p.labelPage,
                    p.subPage,
                    p.action,
                    g.groupId,
                    g.groupName

                FROM 
                    default_page p
                LEFT JOIN default_group_page gp ON gp.pageId = p.pageId
                LEFT JOIN default_group g ON g.groupId = gp.groupId";
        return $query;
    }
	
	public function viewMenu()
	{
        $sql = "SELECT 
                    m.menuId,
                    m.menuName,
                    p.page,
                    m.iconMenu,
                    m.menuOrder,
                    GROUP_CONCAT(g.`groupName`) as groupName
                FROM 
                    default_menu m
                LEFT JOIN default_page p ON p.pageId = m.menuDefaultPage
                LEFT JOIN default_group_menu gm ON gm.menuId = m.menuId 
                LEFT JOIN default_group g ON g.groupId = gm.groupId
                GROUP BY gm.menuId
                ORDER BY m.menuId DESC";
                
		$query = $this->db->query($sql);
		return $query->result();
	}
    public function viewPage()
    {
        $sql = "SELECT 
                    p.pageId,
                    p.page,
                    p.labelPage,
                    p.subPage,
                    p.action,
                    g.groupId,
                    g.groupName

                FROM 
                    default_page p
                LEFT JOIN default_group_page gp ON gp.pageId = p.pageId
                LEFT JOIN default_group g ON g.groupId = gp.groupId
                ORDER BY pageId DESC";
                
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function pageById($id)
    {
        $sql = "SELECT 
                    pageId,
                    page,
                    labelPage,
                    subPage,
                    action,
                    -- tambah,
                    -- ubah,
                    -- detil,
                    -- hapus,
                    status
                FROM 
                    default_page
                WHERE 
                    pageId='$id'";
        $query = $this->db->query($sql);
        return $query->row();
    }
    public function menuById($id)
    {
        $sql = "SELECT 
                    menuId,
                    menuName,
                    menuDefaultPage,
                    iconMenu,
                    menuOrder,
                    menuStyle,
                    menuParentId,
                    menuDescription,
                    menuPosition,
                    labelPage
                FROM 
                    default_menu m
                LEFT JOIN
                    default_page p ON p.pageId = m.menuDefaultPage
                WHERE 
                    menuId='$id'";
        $query = $this->db->query($sql);
        return $query->row();
    }
    public function menuParentId($id){
        $sql = "SELECT 
                    menuId,
                    menuName,
                    menuDefaultPage,
                    iconMenu,
                    menuOrder,
                    menuStyle,
                    menuParentId,
                    menuDescription,
                    menuPosition,
                    labelPage
                FROM 
                    default_menu m
                INNER JOIN
                    default_page p ON p.pageId = m.menuDefaultPage
                WHERE 
                    menuId='$id'";
        $query = $this->db->query($sql);
        return $query->row();
    }
    public function addAction($data){
        $menuName = $data['menuName'];
        $pageId = $data['pageId'];
        $iconMenu = $data['iconMenu'];
        $menuOrder = $data['menuOrder'];
        $menuPosition = $data['menuPosition'];
        $menuStyle = $data['menuStyle'];
        $menuParentId = $data['menuParentId'];
        $description = $data['description'];
        $sql = "INSERT INTO 
                    default_menu
                    (menuName, menuDefaultPage, iconMenu, menuOrder, menuPosition, menuStyle, menuParentId, menuDescription)
                VALUES
                    ('$menuName','$pageId','$iconMenu','$menuOrder', '$menuPosition', '$menuStyle', '$menuParentId', '$description')";
        $query = $this->db->query($sql);
        return $query;
    }
    public function updateMenu($data){
        $menuName = $data['menuName'];
        $pageId = $data['pageId'];
        $iconMenu = $data['iconMenu'];
        $menuOrder = $data['menuOrder'];
        $menuPosition = $data['menuPosition'];
        $menuStyle = $data['menuStyle'];
        $menuParentId = $data['menuParentId'];
        $description = $data['description'];
        $menuId = $data['menuId'];
        $sql = "UPDATE
                    default_menu
                SET
                    menuName = '$menuName', 
                    menuDefaultPage = '$pageId', 
                    iconMenu = '$iconMenu', 
                    menuOrder = '$menuOrder',
                    menuPosition = '$menuPosition', 
                    menuStyle = '$menuStyle', 
                    menuParentId = '$menuParentId', 
                    menuDescription = '$description'
                WHERE
                    menuId = '$menuId'";

        $query = $this->db->query($sql);
        return $query;
    }

    public function registerMenu($data){
        $groupId = $data['groupId'];
        $menuId = $data['menuId'];
        $menuName = $data['menuName'];
        $sql = "INSERT INTO default_group_menu 
                SELECT 
                '$groupId' AS id_admin,
                menuId 
                FROM default_menu 
                WHERE 
                menuName='$menuName' 
                AND menuId NOT IN(
                    SELECT menuId 
                    FROM default_group_menu 
                    WHERE menuId IN(
                        SELECT menuId 
                        FROM default_menu 
                        WHERE menuName='$menuName' and groupId='$groupId'
                    )
                )";
        $query = $this->db->query($sql);
        return $query;
    }
    public function unregisterMenu($data){
        $groupId = $data['groupId'];
        $menuId = $data['menuId'];
        $menuName = $data['menuName'];
        $sql = "DELETE FROM default_group_menu 
                WHERE groupId='$groupId' and menuId='$menuId'
                ";
        $query = $this->db->query($sql);
        return $query;
    }
    
    public function deleteGroupMenu($id){
        $sql = "DELETE FROM
                    default_group_menu
                WHERE 
                    menuId='$id'";
        $query = $this->db->query($sql);
        return $query;
    }
     public function deleteMenu($id){
        $sql = "DELETE FROM
                    default_menu
                WHERE 
                    menuId='$id'";
        $query = $this->db->query($sql);
        return $query;
    }

    public function listGroupDefault(){
        $sql = "SELECT 
                    groupId,
                    groupName
                FROM 
                    default_group";
                
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function addActionPage($data){
        $page = $data['page'];
        $labelPage = $data['labelPage'];
        $subPage = $data['subPage'];
        $action = $data['action'];
        // $create = $data['create'];
        // $update = $data['update'];
        // $detil = $data['detil'];
        // $delete = $data['delete'];
        $status = $data['status'];
        $sql = "INSERT INTO 
                    default_page
                    (page, labelPage, subPage, action, status)
                VALUES
                    ('$page','$labelPage','$subPage','$action', '$status')";
        $query = $this->db->query($sql);
        return $query;
    }
    public function updatePage($data){
        $page = $data['page'];
        $labelPage = $data['labelPage'];
        $subPage = $data['subPage'];
        $action = $data['action'];
        // $create = $data['create'];
        // $update = $data['update'];
        // $detil = $data['detil'];
        // $delete = $data['delete'];
        $status = $data['status'];
        $pageId = $data['pageId'];
        $sql = "UPDATE 
                    default_page
                SET
                    page = '$page',
                    labelPage = '$labelPage',
                    subPage = '$subPage',
                    action = '$action',
                    -- tambah = '$create',
                    -- ubah = '$update',
                    -- detil = '$detil',
                    -- hapus = '$delete',
                    status = '$status'
                WHERE
                    pageId = '$pageId'";
        $query = $this->db->query($sql);
        return $query;
    }
    /*public function registerPage($data){
        $groupId = $data['groupId'];
        $pageId = $data['pageId'];
        $page = $data['page'];
        $subPage = $data['subPage'];
        $sql = "INSERT INTO default_group_page 
                SELECT 
                '$groupId' AS id_admin,
                pageId 
                FROM default_page 
                WHERE 
                page='$page' AND subPage='$subPage' 
                AND pageId NOT IN(
                    SELECT pageId 
                    FROM default_group_page 
                    WHERE pageId IN(
                        SELECT pageId 
                        FROM default_page 
                        WHERE page='$page' and groupId='$groupId'
                    )
                )";
        $query = $this->db->query($sql);
        return $query;
    }
    */
    public function registerPage($data){
        $groupId = $data['groupId'];
        $pageId = $data['pageId'];
        $page = $data['page'];
        $subPage = $data['subPage'];
        $sql = "INSERT INTO default_group_page 
                (groupId, pageId) VALUES ('$groupId','$pageId')";
        $query = $this->db->query($sql);
        return $query;
    }
    public function deleteGroupPage($id, $groupId){
        $sql = "DELETE FROM
                    default_group_page
                WHERE 
                    groupId='$groupId' AND pageId='$id'";
        $query = $this->db->query($sql);
        return $query;
    }
     public function deletePage($id){
        $sql = "DELETE FROM
                    default_page
                WHERE 
                    pageId='$id'";
        $query = $this->db->query($sql);
        return $query;
    }
    public function getListDataPage($options = []){
        $where_like = empty($options['where_like']) ? '1 = 1' : '('.implode(' OR ', $options['where_like']).')'; 
        $sql = $this->query_page()."         
            WHERE 
                1 = 1 AND ".$where_like."
            ORDER BY ".$options['order']." ".$options['mode']."
            LIMIT ".$options['offset'].", ".$options['limit'];

        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getTotalDataPage($options){
        $where_like = empty($options['where_like']) ? '1 = 1' : '('.implode(' OR ', $options['where_like']).')'; 
        $sql = $this->query_page()."         
            WHERE 
                1 = 1 AND ".$where_like;
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    public function getTotalPage(){
        $sql = $this->query_page();
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    // datatable menu need this, don't remove ~_^
    private function query_menu(){
        $query = "SELECT * FROM (
                SELECT 
                    m.menuId,
                    m.menuName,
                    p.page,
                    m.iconMenu,
                    m.menuOrder,
                    m.menuTimestamp,
                    (SELECT GROUP_CONCAT(g.`groupName`) as groupName FROM default_group g
                    LEFT JOIN default_group_menu gm ON gm.groupId = g.groupId where gm.menuId = m.menuId) as groupName
                FROM 
                    default_menu m
                LEFT JOIN default_page p ON p.pageId = m.menuDefaultPage
            ) AS temp1 ";
        return $query;
    }
    
    public function getListDataMenu($options = []){
        $where_like = empty($options['where_like']) ? '1 = 1' : '('.implode(' OR ', $options['where_like']).')'; 
        $sql = $this->query_menu()."         
            WHERE 
                1 = 1 AND ".$where_like."
            ORDER BY ".$options['order']." ".$options['mode']."
            LIMIT ".$options['offset'].", ".$options['limit'];

        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getTotalDataMenu($options){
        $where_like = empty($options['where_like']) ? '1 = 1' : '('.implode(' OR ', $options['where_like']).')'; 
        $sql = $this->query_menu()."         
            WHERE 
                1 = 1 AND ".$where_like;
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    public function getTotalMenu(){
        $sql = $this->query_menu();
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
}