<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_tag extends CI_Model {

	protected $table_name = 'tag';

	private function query(){
        $query  =   "SELECT 
                        *
                    FROM $this->table_name";
        return $query;
    }

    public function getAutoComplete($query = ""){
        $sql = "SELECT id_tag AS id, tag_name AS `label`, tag_name AS `value`
                    FROM tag  WHERE tag_name LIKE '%{$query}%' ORDER BY tag_name LIMIT 10";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    public function getListData($options = []){
        $where_like = empty($options['where_like']) ? '1 = 1' : '('.implode(' OR ', $options['where_like']).')'; 
        $sql = $this->query()."         
            WHERE 
                1 = 1 AND ".$where_like."
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

    public function getDataById($id){
        $sql = $this->query()." WHERE id_tag = '$id'";
        $query = $this->db->query($sql);
        return $query->row_array();  
    }


    public function addDataAction($data){
        $result = $this->db->insert($this->table_name, $data);
        return $result;
    }

    public function editDataAction($data, $where){
        $result = $this->db->update($this->table_name, $data, $where);
        return $result;
    }

    public function delete($where){
            $result= $this->db->where($where)->delete($this->table_name);
        return $result;
    }

}
