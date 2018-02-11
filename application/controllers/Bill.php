<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bill extends Common
{

    public function index()
    {
        $this->view('bill/index');

    }

    public function in()
    {
        $this->view('bill/in');
    }

    public function doout()
    {
        $money = $_REQUEST['money'];
        $tag = $_REQUEST['tag'];
        $note = $_REQUEST['note'];
        if($money<=0){
            $this->resJson(-1,'参数错误：money');
        }
        if(!is_numeric($tag)){
            $this->resJson(-1,'参数错误：tag');
        }

        $data['money'] = $money;
        $data['tag'] = $tag;
        $data['note'] = $note;
        $data['type'] = 1;

        $this->load->model('bill_model');
        $id = $this->bill_model->insert($data);
        $this->resJson();
    }

    public function doin()
    {
        $money = $_REQUEST['money'];
        $tag = $_REQUEST['tag'];
        $note = $_REQUEST['note'];
        if($money<=0){
            $this->resJson(-1,'参数错误：money');
        }
        if(!is_numeric($tag)){
            $this->resJson(-1,'参数错误：tag');
        }

        $data['money'] = $money;
        $data['tag'] = $tag;
        $data['note'] = $note;
        $data['type'] = 1;

        $this->load->model('bill_model');
        $id = $this->bill_model->insert($data);
        $this->resJson();
    }
}
