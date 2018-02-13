<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bill extends Common
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('bill_tag_model');
        $this->load->model('bill_model');
    }

    public function index()
    {
        $outType = $this->bill_tag_model->outType();

        $this->data['outType'] = $outType;
        $this->view('bill/index');

    }

    public function in()
    {
        $outType = $this->bill_tag_model->inType();

        $this->data['outType'] = $outType;
        $this->view('bill/in');
    }

    public function tag()
    {
        $this->view('bill/tag');
    }

    public function doout()
    {
        $money = $_REQUEST['money'];
        $tag = $_REQUEST['tag'];
        $note = $_REQUEST['note'];
        if ($money <= 0) {
            $this->resJson(-1, '参数错误：money');
        }
        if (!is_numeric($tag)) {
            $this->resJson(-1, '参数错误：tag');
        }

        $data['money'] = $money;
        $data['tag_id'] = $tag;
        $data['note'] = $note;
        $data['type'] = 1;
        $data['add_time'] = time();

        $id = $this->bill_model->insert($data);
        $this->resJson();
    }

    public function doin()
    {
        $money = $_REQUEST['money'];
        $tag = $_REQUEST['tag'];
        $note = $_REQUEST['note'];
        if ($money <= 0) {
            $this->resJson(-1, '参数错误：money');
        }
        if (!is_numeric($tag)) {
            $this->resJson(-1, '参数错误：tag');
        }

        $data['money'] = $money;
        $data['tag_id'] = $tag;
        $data['note'] = $note;
        $data['type'] = 2;
        $data['add_time'] = time();

        $id = $this->bill_model->insert($data);
        $this->resJson();
    }

    public function addTag()
    {
        $name = $_REQUEST['name'];
        $type = $_REQUEST['type'];
        if (empty($name)) {
            $this->resJson(-1, '参数错误：name');
        }

        $data['tag_name'] = $name;
        $data['tag_type'] = $type;

        $id = $this->bill_tag_model->insert($data);
        $this->resJson();
    }

    public function analyse()
    {
        $day = date('d');
        $month = date('m');
        $year = date('Y');

        // 获取今天
        $todayStart = mktime(0, 0, 0, $month, $day, $year);
        $todayEnd = mktime(23, 59, 59, $month, $day, $year);
        // echo $todayStart.'-'.$todayEnd.'<hr>';
        // 获取本周
        $thisWeekStart = mktime(0, 0, 0, $month, $day - date('w') + 1, $year);
        $thisWeekEnd = mktime(23, 59, 59, $month, $day - date('w') + 7, $year);
        // echo $thisWeekStart.'-'.$thisWeekEnd.'<hr>';
        // 获取上周
        $lastWeekStart = mktime(0, 0, 0, $month, $day - date('w') + 1 - 7, $year);
        $lastWeekEnd = mktime(23, 59, 59, $month, $day - date('w') + 7 - 7, $year);
        // echo $lastWeekStart . '-' . $lastWeekEnd . '<hr>';
        // 获取本月
        $thisMonthStart = mktime(0, 0, 0, $month, 1, $year);
        $thisMonthEnd = mktime(23, 59, 59, $month, date("t"), $year);
        // echo $thisMonthStart.'-'.$thisMonthEnd.'<hr>';
        // 获取上月
        $lastMonthStart = mktime(0, 0, 0, $month - 1, 1, $year);
        $lastMonthEnd = mktime(23, 59, 59, $month, 0, $year);
        // echo $lastMonthStart.'-'.$lastMonthEnd.'<hr>';

        $todayOut = $this->bill_model->sum(1, $todayStart, $todayEnd);
        $thisWeekOut = $this->bill_model->sum(1, $thisWeekStart, $thisWeekEnd);
        $lastWeekOut = $this->bill_model->sum(1, $lastWeekStart, $lastWeekEnd);
        $thisMonthOut = $this->bill_model->sum(1, $thisMonthStart, $thisMonthEnd);
        $lastMonthOut = $this->bill_model->sum(1, $lastMonthStart, $lastMonthEnd);

        $out['today'] = $todayOut;
        $out['this_week'] = $thisWeekOut;
        $out['last_week'] = $lastWeekOut;
        $out['this_month'] = $thisMonthOut;
        $out['last_month'] = $lastMonthOut;

        $todayIn = $this->bill_model->sum(2, $todayStart, $todayEnd);
        $thisWeekIn = $this->bill_model->sum(2, $thisWeekStart, $thisWeekEnd);
        $lastWeekIn = $this->bill_model->sum(2, $lastWeekStart, $lastWeekEnd);
        $thisMonthIn = $this->bill_model->sum(2, $thisMonthStart, $thisMonthEnd);
        $lastMonthIn = $this->bill_model->sum(2, $lastMonthStart, $lastMonthEnd);

        $in['today'] = $todayIn;
        $in['this_week'] = $thisWeekIn;
        $in['last_week'] = $lastWeekIn;
        $in['this_month'] = $thisMonthIn;
        $in['last_month'] = $lastMonthIn;

        $list = $this->bill_model->billList();
        $this->data['list'] = $list;
        $this->data['out'] = $out;
        $this->data['in'] = $in;
        $this->view('bill/analyse');
    }

    public function test(){
        $this->view();
    }

}
