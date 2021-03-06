<?php
/**
 * Created by xLong.
 * User: DOU
 * Date: 2018/1/4
 * Time: 20:51
 */

class Common extends CI_Controller
{
    public $data = null;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 返回视图
     * @param null $view 视图
     * @param bool $flag 是否启用复杂头
     */
    public function view($view = null, $flag = true)
    {
        if ($flag) {
            $this->load->view("public/data", $this->data); //用于返回数据
            $this->load->view("public/header");
            empty($view) ? '' : $this->load->view($view);
            $this->load->view("public/menu");
            $this->load->view("public/footer");
        } else {

        }
    }

    public function resJson($code = 0,$msg = 'success',$data = null)
    {
        header('Content-Type:application/json; charset=utf-8');
        $arr = [
            'code'=>$code,
            'msg'=>$msg,
            'data'=>$data
        ];
        echo json_encode($arr);
        exit();
    }
}