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
        $type = $_REQUEST['type'];
        $note = $_REQUEST['note'];

        var_dump($money);
        var_dump($type);
        var_dump($note);
    }
}
