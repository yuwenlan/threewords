<?php

/*
 * This file is part of the Geek-Zoo Projects.
 *
 * @copyright (c) 2010 Geek-Zoo Projects More info http://www.geek-zoo.com
 * @license http://opensource.org/licenses/gpl-2.0.php The GNU General Public License
 * @author xuanyan <xuanyan@geek-zoo.com>
 *
 */

require dirname(__FILE__).'/baseAction.php';

abstract class adminAction extends baseAction
{
    public function __construct($controller)
    {
        parent::__construct($controller);
        if (!isset($_SESSION['admin_user'])) {
            $this->redirect('admin/user/login');
        }
        
        $this->role = array(
            '内容提供者' => 1,
            '基础编辑'  => 2,
            '责任编辑'  => 3,
            '总编'    => 4
        );

        $this->permission = array(
            '分类限制' => 'cate_limit',
            '杂志限制'  => 'magazine_limit'
        );

        $this->menu = array(

            '资讯管理' => array(
                '资讯分类' => 'admin/cate',
                '初始资讯' => 'admin/information/raw_list',
                '资讯素材' => 'admin/information',
                '回收站' => 'admin/information/trash_list'
            ),
            '杂志管理' => array(
                '刊物列表' => 'admin/magazine_class'
            ),
            '帐号管理' => array(
                '用户组管理' => 'admin/group',
                '管理员管理' => 'admin/administrator'
            ),
            '会员管理' => array(
                '会员列表' => 'admin/member',
                '会员导入' => 'admin/member/input_member'
            ),

            '信息采集' => array(
                '采集列表' => 'admin/collection'
            ),
            '运营管理' => array(
                '城市数据' => 'admin/',
                '黑名单' => 'admin/phone_wblist?type=0',
                '白名单' => 'admin/phone_wblist?type=1'
            ),
            '系统维护' => array(
                '数据备份' => 'admin/data_back',
                '参数配置' => 'admin/config_setting',
                '操作日志' => 'admin/log'
            )

        );
        $this->state = array(
            '未采用',
            '待审核',
            '已审核',
            '打回',
            '删除'
        );

        $this->smarty->assign('admin_url', $this->controller->url);
        $this->smarty->assign('menu', $this->menu);
    }
}



?>