<?php

/*
 * This file is part of the Geek-Zoo Projects.
 *
 * @copyright (c) 2010 Geek-Zoo Projects More info http://www.geek-zoo.com
 * @license http://opensource.org/licenses/gpl-2.0.php The GNU General Public License
 * @author xuanyan <xuanyan@geek-zoo.com>
 *
 */
class caiji_tencent
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
        return '腾讯';
    }
    function getNames()
    {
        return 'tencent';
    }

    function exec($option)
    {
        foreach($option as $v){
            $content = file_get_contents('http://'.$v.'.qq.com');
            preg_match_all('/<a href="http:\/\/'.$v.'.qq.com\/(.*?)" target=\"_blank\"(.*?)>.*?<\/a>/',$content,$arr1);
            foreach($arr1[1] as $val){
                $content = 'http://'.$v.'.qq.com/'.$val;
                $str=file_get_contents($content);
                preg_match('/<h1>(.*?)<\/h1>/',$str,$ar1);
                preg_match('/<p (.*?)>(.*?)<\/p>/ism',$str,$ar2);
                //$ar2[0]=strip_tags($ar2[0]); 
                //$basename=basename($content);
                $information[$key][$v][$ar1[0]] = $ar2[0];
                //file_put_contents($basename,$ar1[0].$ar2[0]);
            }
        }    
    }
}


?>