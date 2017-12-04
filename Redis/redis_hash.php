<?php
header("Content-type:text/html;charset=utf-8");
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/7
 * Time: 9:40
 * Redis->Hash cmd php
 */

/**
 *  Redis           Hash命令操作
 *  hdel            删除哈希表 key 中的一个或多个指定域，不存在的域将被忽略。
 *  hexists         查看哈希表指定域是否存在
 *  hget            返回哈希表key中给定域的值
 *  hgetall         返回哈希表 key 中，所有的域和值。在返回值里，紧跟每个域名(field name)之后是域的值(value)，所以返回值的长度是哈希表大小的两倍。
 *  hincrby        (HINCRBY key field increment) 给指定key的field值加上increment数值 key的field不存在或者key不存在则创建，key的field值为字符串则报错，increment可以为负数
 *  hincrbyfloat   为哈希表 key 中的域 field 加上浮点数增量 increment 。key不存在则新创建hash表，field不存在则创建值设为0再执行
 *  hkeys           返回哈希表 key 中的所有域。
 *  hlen            返回哈希表 key 中域的数量。当 key 不存在时，返回 0 。
 *  hmget         返回哈希表 key 中，一个或多个给定域的值。如果给定的域不存在于哈希表，那么返回一个 nil 值。因为不存在的 key 被当作一个空哈希表来处理，所以对一个不存在的 key 进行 HMGET 操作将返回一个只带有 nil 值的表。
 *  hmset          (HMSET key field value [field value ...]) 同时将多个 field-value (域-值)对设置到哈希表 key 中。此命令会覆盖哈希表中已存在的域。如果 key 不存在，一个空哈希表被创建并执行 HMSET 操作。当 key 不是哈希表(hash)类型时，返回一个错误。
 *  hset            将哈希表 key 中的域 field 的值设为 value 。如果 key 不存在，一个新的哈希表被创建并进行 HSET 操作。如果域 field 已经存在于哈希表中，旧值将被覆盖。
 *  hsetnx         将哈希表 key 中的域 field 的值设置为 value ，并且仅当域 field 不存在。与hset类似
 *  hvals           返回哈希表 key 中所有域的值。当 key 不存在时，返回一个空表。
 */

//实例化redis
$redis = new Redis();
//连接服务器
$redis->connect("localhost");
//授权密码
$redis->auth("123456");
//切换数据库为2
$redis->select(2);

/*==================PHP操作redis->Hash类型=================================*/

//*******************************************************
/* hdel action */
/*var_dump($redis->hGetAll("hash"));
var_dump($redis->hDel("hash","age","sex"));
var_dump($redis->hGetAll("hash"));*/

//*******************************************************
/* hexists action */
/*var_dump($redis->hExists("hash","name"));
var_dump($redis->hExists("hash","names"));*/

//*******************************************************
/* hget action */
//var_dump($redis->hGet("hash","name"));

//*******************************************************
/* hgetall action */
//var_dump($redis->hGetAll("hash"));

//*******************************************************
/* hincrby action */
/*var_dump($redis->hGet("hash","hincrby"));
var_dump($redis->hIncrBy("hash","hincrby",20));
var_dump($redis->hGet("hash","hincrby"));*/

//*******************************************************
/* hincrbyfloat action */
/*var_dump($redis->hGetAll("hash"));
var_dump($redis->hIncrByFloat("hash","hincrby",2.5));
var_dump($redis->hGet("hash","hincrby"));
var_dump($redis->hIncrByFloat("hash","hincrbys",10.2));
var_dump($redis->hGetAll("hash"));*/

//*******************************************************
/* hkeys action */
/*var_dump($redis->hKeys("hash"));
var_dump($redis->hKeys("hashs"));*/

//*******************************************************
/* hlen action */
/*var_dump($redis->hLen("hash"));
var_dump($redis->hLen("hashs"));*/

//*******************************************************
/* hmget action */
/*var_dump($redis->hKeys("hash"));
var_dump($redis->hMGet("hash",array("name","age","names")));*/

//*******************************************************
/* hmset action */
/*var_dump($redis->hGetAll("hash"));
var_dump($redis->hMset("hash",array("name"=>"tp","hmset"=>"hmsets")));
var_dump($redis->hGetAll("hash"));
var_dump($redis->exists("hashs"));
var_dump($redis->hMset("hashs",array("hmset"=>"hmsets","name"=>"tptests")));
var_dump($redis->hGetAll("hashs"));*/

//*******************************************************
/* hset action */
/*var_dump($redis->hGetAll("hash"));
var_dump($redis->hSet("hash","name","tp_hset"));
var_dump($redis->hGetAll("hash"));*/

//*******************************************************
/* hsetnx action */
/*var_dump($redis->hGetAll("hash"));
var_dump($redis->hSetNx("hash","name","tps"));
var_dump($redis->hGetAll("hash"));
var_dump($redis->hSetNx("hash","names","tps"));
var_dump($redis->hGetAll("hash"));*/

//*******************************************************
/* hvals action */
/*var_dump($redis->hGetAll("hash"));
var_dump($redis->hVals("hash"));
var_dump($redis->exists("hash_error"));
var_dump($redis->hVals("hash_error"));*/