<?php
/**
 * Created by xLong.
 * User: CYT
 * Date: 2018/2/11
 * Time: 15:39
 */

class Bill_model extends CI_Model
{
    private $table = 'bill';
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        $id = $this->db->insert_id();
        return $id;
    }

    public function billList()
    {
        $this->db->select("bill.*,bill_tag.tag_name");
        $this->db->from($this->table);
        $this->db->join('bill_tag','bill.tag_id=bill_tag.tag_id');
        $this->db->order_by('bill.bill_id desc');
        $query = $this->db->get();
        $arr = $query->result_array();
        return $arr;
    }

    public function sum($type,$start,$end){
        $this->db->select_sum('money');
        $this->db->from($this->table);
        $this->db->where(['type'=>$type]);
        $this->db->where(['add_time >='=>$start,'add_time <='=>$end]);
        $query = $this->db->get();
        $row = $query->row_array();
        $sum = $row['money'];
        if(empty($sum)){
            $sum = 0;
        }
        return $sum;
    }

}