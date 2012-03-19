<?php

/*
 * This file is part of the Geek-Zoo Projects.
 *
 * @copyright (c) 2010 Geek-Zoo Projects More info http://www.geek-zoo.com
 * @license http://opensource.org/licenses/gpl-2.0.php The GNU General Public License
 * @author xuanyan <xuanyan@geek-zoo.com>
 *
 */

abstract class SiteAction
{
    protected $controller = null;

    public function __construct($controller)
    {
        $this->controller = $controller;
    }

    public function redirect($url = '') {
        $site = SITE_URL;
        if (!$url) {
            $url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $site;
        }

        if (substr($url, 0, 4) != 'http') {
            if ($url{0} != '/') {
                $url = '/'.$url;
            }
            $url = $site.$url;
        }
        header('Location: ' . $url);
        exit;
    }

    public function __get($name)
    {
        return Site::getInstance()->$name;
    }

    protected function display($file, $param = array())
    {
        $this->smarty->assign('this', $this);
        foreach ($param as $key => $val) {
            $this->smarty->assign($key, $val);
        }
        $this->smarty->display($file);
    }
}

?>