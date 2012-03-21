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
        } else {
            $sina_uid = $_SESSION['user']['token']['uid'];
            $sns_uid = _model('snsuid')->read(array('sns_uid'=>$sina_uid));
           if (!$sns_uid) {
                $uid = _model('user')->create(array('addtime'=>time()));

                $user_id = _model('snsuid')->create(array('sns_uid'=>$sina_uid,'uid'=>$uid,'type'=>1));
           };
            $info = $this->sina->show_user_by_id($_SESSION['user']['token']['uid']);
            $this->display('default.html', array(
                'info'=>$info,
            ));
        }
        //$ms = $this->sina->home_timeline();
    }

    public function welcome() {
        $this->sina_bind();
    }
}
?>