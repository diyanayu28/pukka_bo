<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_statis extends CI_Model {

	protected $table_name = 'static_page';
    protected $tag_staticpage = 'tag_staticpage';

	public function query(){
        $query = "SELECT * FROM (
                    SELECT
                    s.*,category.*,
                    GROUP_CONCAT(tag_name) AS
                    tag_name
                    FROM static_page s
                    LEFT JOIN tag_staticpage ON
                    s.id_page = tag_staticpage.fk_id_page
                    LEFT JOIN tag ON 
                    tag_staticpage.fk_id_tag = tag.id_tag
                    LEFT JOIN category ON
                    s.fk_id_category = category.id_category
                    GROUP BY id_page)
                    AS temp_table";
        return $query;

    }

    private function data_deleted(){
        $query  =   "SELECT * FROM 
                        static_page 
                    ";
        return $query;
    }

    public function getListData($options = []){
        $where_like = empty($options['where_like']) ? '1 = 1' : '('.implode(' OR ', $options['where_like']).')'; 
        $sql = $this->query()."         
            WHERE 
                is_deleted = 0 AND ".$where_like."
            ORDER BY ".$options['order']." ".$options['mode']."
            LIMIT ".$options['offset'].", ".$options['limit'];

        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getListDataDeleted($options = []){
        $where_like = empty($options['where_like']) ? '1 = 1' : '('.implode(' OR ', $options['where_like']).')'; 
        $sql = $this->data_deleted()."         
                WHERE 
                is_deleted = 1 AND ".$where_like."
            ORDER BY ".$options['order']." ".$options['mode']."
            LIMIT ".$options['offset'].", ".$options['limit'];

        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getTotalData($options){
        $where_like = empty($options['where_like']) ? '1 = 1' : '('.implode(' OR ', $options['where_like']).')'; 
        $sql = $this->query()."         
            WHERE 
            is_deleted = 0 AND ".$where_like;
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    public function getTotalDataDeleted($options){
        $where_like = empty($options['where_like']) ? '1 = 1' : '('.implode(' OR ', $options['where_like']).')'; 
        $sql = $this->data_deleted()."         
            WHERE 
                 is_deleted = 1 AND ".$where_like;
        $query = $this->db->query($sql);
        return $query->num_rows();
    }


    public function getTotal(){
        $sql = $this->query();
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    public function getTotalDeleted(){
        $sql = $this->query();
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    public function getDataById($id){
        $sql = $this->query()." WHERE id_page = '$id'";
        $query = $this->db->query($sql);
        return $query->row_array();  
    }


    public function getTagById($pageId){
        $data = $this->db->query("SELECT `fk_id_tag`, `fk_id_page`, `tag_name`, `id_tag`, `page_title`, `id_page`
            FROM `tag_staticpage` AS a
            LEFT JOIN `static_page` AS b ON a.`fk_id_page` = b.`id_page`
            LEFT JOIN `tag` AS c ON a.`fk_id_tag` = c.`id_tag`
            WHERE
            a.`fk_id_page` = '{$pageId}'")->result();
        return $data;
    }

    public function getOptionKategori(){
        $sql = "SELECT
                   id_category AS id,
                   category_name AS name
                FROM category WHERE c_is_deleted = 0 AND category_group = 'static_page'";
        return $this->db->query($sql)->result();
    }

    public function getOptionTag(){
        $sql = "SELECT
                   id_tag AS id,
                   tag_name AS name
                FROM tag";
        return $this->db->query($sql)->result();
    }

    public function insert($data){
        $result = $this->db->insert($this->table_name, $data);
        return $result;
    }

    public function edit($data, $where){
        $result = $this->db->update($this->table_name, $data, $where);
        return $result;
    }


    public function delete_tag_staticpage($where){
            $result= $this->db->where($where)->delete($this->tag_staticpage);
        return $result;
    }

    public function delete($where, $permanent = FALSE){
        if ($permanent)
            $result= $this->db->where($where)->delete($this->table_name);
        else
            $result = $this->db->update($this->table_name, ['is_deleted' => 1], $where);
        return $result;
    }

    public function restore($where){
        $result= $this->db->update($this->table_name, ['is_deleted' => 0], $where);
        return $result;
    }


}




    
