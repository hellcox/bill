<?php
/**
 * Created by xLong.
 * User: CYT
 * Date: 2018/2/11
 * Time: 15:39
 */

class Bill_tag_model extends CI_Model
{
    private $table;

    public function __construct()
    {
        parent::__construct();
        $this->table = 'bill_tag';
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        $id = $this->db->insert_id();
        return $id;
    }

    public function outType()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where(['tag_type'=>1]);
        $this->db->order_by('tag_id asc');
        $query = $this->db->get();
        $arr = $query->result_array();
        return $arr;
    }

    public function inType()
    {
        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->where(['tag_type'=>2]);
        $this->db->order_by('tag_id asc');
        $query = $this->db->get();
        $arr = $query->result_array();
        return $arr;
    }

}