<?php
header("Content-type:text/html;charset=utf-8");
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/8
 * Time: 12:07
 */
//实例化redis
$redis = new Redis();
//连接服务器
$redis->connect("localhost");
//授权密码
$redis->auth("123456");
//切换数据库为6
$redis->select(6);


$res = $redis->publish("testtp","tpaaaaaaa");