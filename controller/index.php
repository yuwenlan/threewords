<?php
class Action extends Api
{
    function index()
    {
        if (empty($_SESSION['user']['token']) || empty($this->sina)) {
            $this->sina_bind();
        }

        $this->display('default.html');

        // $ms = $this->sina->home_timeline();
        // echo '<pre>';
        // print_r($ms);
    }
}
?>