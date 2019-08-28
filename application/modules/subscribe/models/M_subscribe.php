<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_subscribe extends CI_Model {

	protected $table_name = 'subscribe';

	private function query(){
        $query  =   "SELECT 
                        *
                    FROM $this->table_name";
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

    public function getTotalData($options){
        $where_like = empty($options['where_like']) ? '1 = 1' : '('.implode(' OR ', $options['where_like']).')'; 
        $sql = $this->query()."         
            WHERE 
                is_deleted = 0 AND ".$where_like;
        $query = $this->db->query($sql);
        return $query->num_rows();
    }


    public function getTotal(){
        $sql = $this->query();
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    public function getDataById($id){
        $sql = $this->query()." WHERE id_subscribe = '$id'";
        $query = $this->db->query($sql);
        return $query->row_array();  
    }

   public function delete($where, $permanent = FALSE){
        if ($permanent)
            $result= $this->db->where($where)->delete($this->table_name);
        else
            $result= $this->db->update($this->table_name, ['is_deleted' => 1], $where);
        return $result;
    }

    function update_status_subscribe(){
        $hsl=$this->db->query("UPDATE subscribe SET subscribe_status='0'");
        return $hsl;
    }


}
