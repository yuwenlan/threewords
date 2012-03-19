<?php

/*
 * This file is part of the Geek-Zoo Projects.
 *
 * @copyright (c) 2010 Geek-Zoo Projects More info http://www.geek-zoo.com
 * @license http://opensource.org/licenses/gpl-2.0.php The GNU General Public License
 * @author xuanyan <xuanyan@geek-zoo.com>
 *
 */

class caiji_sina
{
    function getOption()
    {
        return array(
            'newstype' => array(
                'type' => 'radio',
                'value' => array(
                    '新闻' => 'news',
                    '体育' => 'sports',
                    '娱乐' => 'ent'
                )
            ), 

            'option' => array(
                'type' => 'checkbox',
                'value' => array(
                    '新闻' => 'news',
                    '体育' => 'sports',
                    '娱乐' => 'ent'
                )
            ),

            'title' => array(
                'type' => 'input',
                'value' => '标题',
            )
        );
    }
    
    function getName()
    {
        return '新浪';
    }
    function getNames()
    {
        return 'sina';
    }

    function exec($option)
    {
        foreach($option as $v){
            $contents = file_get_contents('http://'.$v.'.sina.com.cn');
            preg_match_all('/<a href="(http:\/\/'.$v.'\.sina\.com\.cn\/\w{1,2}\/[^\"\']+\/\d+\.shtml)" target=\"_blank\">.+<\/a>/i',$contents,$arr1);
            foreach($arr1[1] as $val){
                $str = file_get_contents($val);
                preg_match('/<h1 id="artibodyTitle".+>(.+?)<\/h1>/',$str,$ar1);
                preg_match('/<div class="blkContainerSblkCon" id=\"artibody\">(.*?)<style>/ism',$str,$ar2);
                $time = time(); 
                $title  = mb_convert_encoding($ar1[1], "utf-8", 'gbk');
                $content  = mb_convert_encoding($ar2[1], "utf-8", 'gbk');
                $data = _model('information_list')->create(array('title' => $title,'content' => $content,'source' => 'sina','information_class' => $v,'type' => 0,'add_time' => $time));
            }
        } 
        
    }
}


?>