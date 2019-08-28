<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_news extends CI_Model {

    protected $table_name = 'news';
    protected $tag_news = 'tag_news';

    private function query(){
        $query  =   "SELECT * FROM(
                    SELECT
                        n.*, category.*, GROUP_CONCAT(tag_name)AS tag_name
                    FROM news n
                    LEFT JOIN tag_news ON n.id_news = tag_news.fk_id_news
                    LEFT JOIN tag ON tag_news.fk_id_tag = tag.id_tag
                    LEFT JOIN category ON n.fk_id_category = category.id_category
                    GROUP BY id_news)
                    AS temp_table";
        return $query;
    }

    private function data_deleted(){
        $query  =   "SELECT * FROM 
                        news";
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
        $sql = $this->query()." WHERE id_news = '$id'";
        $query = $this->db->query($sql);
        return $query->row_array();  
    }

    public function getTagById($newsId){
        $data = $this->db->query("SELECT `fk_id_tag`, `fk_id_news`, `tag_name`, `id_tag`, `news_title`, `id_news`
            FROM `tag_news` AS a
            LEFT JOIN `news` AS b ON a.`fk_id_news` = b.`id_news`
            LEFT JOIN `tag` AS c ON a.`fk_id_tag` = c.`id_tag`
            WHERE
            a.`fk_id_news` = '{$newsId}'")->result();
        return $data;
    }

    public function getOptionKategori(){
        $sql = "SELECT
                   id_category AS id,
                   category_name AS name
                FROM category WHERE c_is_deleted = 0 AND category_group = 'news'";
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

    public function delete_tag_news($where){
            $result= $this->db->where($where)->delete($this->tag_news);
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
