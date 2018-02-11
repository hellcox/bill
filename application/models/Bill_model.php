<?php
/**
 * Created by xLong.
 * User: CYT
 * Date: 2018/2/11
 * Time: 15:39
 */

class Bill_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        $this->db->insert('bill', $data);
        $id = $this->db->insert_id();
        return $id;
    }

}