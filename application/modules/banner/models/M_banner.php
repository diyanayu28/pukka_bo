<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_banner extends CI_Model {

	protected $table_name = 'banner';

	private function query(){
        $query  =   "SELECT 
                        *
                    FROM $this->table_name";
        return $query;
    }

    private function data_deleted(){
        $query  =   "SELECT * FROM 
                        banner";
        return $query;
    }

    public function getListData($options = []){
        $where_like = empty($options['where_like']) ? '1 = 1' : '('.implode(' OR ', $options['where_like']).')'; 
        $sql = $this->query()."         
            WHERE 
                i_is_deleted = 0 AND ".$where_like."
            ORDER BY ".$options['order']." ".$options['mode']."
            LIMIT ".$options['offset'].", ".$options['limit'];

        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getListDataDeleted($options = []){
        $where_like = empty($options['where_like']) ? '1 = 1' : '('.implode(' OR ', $options['where_like']).')'; 
        $sql = $this->data_deleted()."         
                WHERE 
                i_is_deleted = 1 AND ".$where_like."
            ORDER BY ".$options['order']." ".$options['mode']."
            LIMIT ".$options['offset'].", ".$options['limit'];

        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getTotalData($options){
        $where_like = empty($options['where_like']) ? '1 = 1' : '('.implode(' OR ', $options['where_like']).')'; 
        $sql = $this->query()."         
            WHERE 
                i_is_deleted = 0 AND ".$where_like;
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    public function getTotalDataDeleted($options){
        $where_like = empty($options['where_like']) ? '1 = 1' : '('.implode(' OR ', $options['where_like']).')'; 
        $sql = $this->data_deleted()."         
            WHERE 
                i_is_deleted = 1 AND ".$where_like;
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

        $sql = $this->query()." WHERE id_banner = '$id'";
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

    public function delete($where, $permanent = FALSE){
        if ($permanent)
            $result= $this->db->where($where)->delete($this->table_name);
        else
            $result= $this->db->update($this->table_name, ['i_is_deleted' => 1], $where);
        return $result;
    }

    public function restore($where){
        $result= $this->db->update($this->table_name, ['i_is_deleted' => 0], $where);
        return $result;
    }

}
