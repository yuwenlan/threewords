<?php
/**
 * Tinge
 */
class Action extends Api
{
    function index()
    {
        if (empty($_SESSION['user']['token']) || empty($this->sina)) {
            $this->display('welcome.html');
        }

        $info = $this->sina->show_user_by_id($_SESSION['user']['token']['uid']);
        $this->display('default.html', array(
            'info'=>$info,
        ));

        //$ms = $this->sina->home_timeline();
        // echo '<pre>';
        // print_r($info);
    }

    public function welcome() {
        $this->sina_bind();
    }
}
?>