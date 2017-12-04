<?php
header("Content-type:text/html;charset=utf-8");
ini_set("default_socket_timeout",-1);
set_time_limit(0);
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/8
 * Time: 11:22
 * Redis->Pub/Sub   cmd php
 */

/**
 *  Redis                   Pub/Sub命令操作
 *  psubscribe             (psubscribe pattern [pattern...]) 订阅一个或多个符合给定模式的频道 每个模式以*作为匹配符，如tp*匹配所有tp开头的频道(tp.tp1 、 tp.tp2等)
 *  publish                 (publish channel messahe) 将信息 message 发送到指定的频道 channel
 *  pubsub                 (pubsub <subcommand> [argument [argument...] ] ) pubsub是一个查看订阅与发布系统状态的内省命令，它由数个不同格式的子命令组成。
 *  punsubscribe          (punsubscribe [pattern [pattern...]] ) 指示客户端退订所有给定模式
 *  subscribe               (subscribe channel [channe]) 订阅给定的一个或多个频道的信息
 *  unsubscribe            (unsubscribe [channel [channel ... ]]) 指示客户端退订给定的频道
 */

//实例化redis
$redis = new Redis();
//连接服务器
$redis->connect("localhost");
//授权密码
$redis->auth("123456");
//切换数据库为6
$redis->select(6);

$redis->subscribe(array("testtp"),"callback");
function callback($instance,$channelName,$message){
    var_dump($instance);
    var_dump($channelName);
    var_dump($message);
   // exit;
}