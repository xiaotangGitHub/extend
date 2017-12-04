<?php
header("Content-type:text/html;charset=utf-8");
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/7
 * Time: 15:39
 * Radis->SortedSet    cmd  php
 */

/**
 *  Redis                   SortedSet命令操作
 *  zadd                    (zadd key csore member ...) 将一个或多个member元素及其score值加入到序集key当中
 *  zcard                   返回有序集key的基数
 *  zcount                  返回有序集key中，score值在min和max之间(默认包括score值等于min和max)的成员数量
 *  zincrby                 为有序集key的成员member的score值加上增量increment。可以是负数
 *  zrange                  (zrangekey start stop [withscores])    返回有序集key中，指定区间内的成员。
 *  zrangebyscore         返回有续集key中通过区间查询的值。可用limit。可用闭区间(小于等于或大于等于)，表达式 ： (1 (5  = 1 < score < 5 。可用-inf和+inf 替代min和max   表达式：-inf 500 = <=500
 *  zrank                   返回有续集key中成员member的排名。按score递增排列
 *  zrem                    移除有序集key中的一个或多个成员，不存在的成员将被忽略。当key存在但不是有序集类型时，返回boolean false
 *  zremrangebyrank     (zremrangebyrank key start stop)    移除有序集key中，指定排名(rank)区间内的所有成员    start：0开始 可负数。区间包含start和stop
 *  zremrangebyscore    (zremrangebyscore key min max)  移除有序集key中，所有score值介于min和max之间(包括min和max)的成员。
 *  zrevrange               返回有序集key中，指定区间的成员，其中成员的位置按score值递减(从大到小)来排列。
 *  zrevrangebyscore     与zrangebyscore相似，但是是递减(从大到小)。
 *  zrevrank                返回有序集key中成员member的排名。其中有序集成员按score值递减(从大到小)排序。
 *  zscore                   返回有序集key中，成员member的score值。
 *  zunionstore            有序集合并(zunionstore destination array_key array_weights aggregate) 合并后相同元素score由aggregate处理。例子：var_dump($redis->zunionstore("zunionstore",array("tp1","tp2"),array(1,2),"min"));
 *  zinterstore             从N个有序集中取出相同的元素 score由array_weights与aggregate处理，与zunionstore类似
 */

//实例化redis
$redis = new Redis();
//连接服务器
$redis->connect("localhost");
//授权密码
$redis->auth("123456");
//切换数据库为5
$redis->select(5);

/*==================PHP操作redis->SortedSet类型=================================*/

//*******************************************************
/* zadd action */
/*var_dump($redis->zRange("tp",0,-1,"withscores"));
var_dump($redis->zAdd("tp",2,"zadd1",3,"zadd2"));
var_dump($redis->zRange("tp",0,-1,"withscores"));*/

//*******************************************************
/* zcard action */
/*var_dump($redis->zRange("tp",0,-1,"withscores"));
var_dump($redis->zCard("tp"));*/

//*******************************************************
/* zcount action */
/*var_dump($redis->zRange("tp",0,-1,"withscores"));
var_dump($redis->zCount("tp",8,9));*/

//*******************************************************
/* zincrby action */
/*var_dump($redis->zRange("tp",0,-1,"withscores"));
var_dump($redis->zIncrBy("tp",5,"zadd1"));
var_dump($redis->zRange("tp",0,-1,"withscores"));*/

//*******************************************************
/* zrange action */
/*var_dump($redis->zRange("tp",0,-1));
var_dump($redis->zRange("tp",0,-1,"withscores"));
var_dump($redis->zRevRange("tp",0,-1,"withscores"));*/

//*******************************************************
/* zrangebyscore action */
/*var_dump($redis->zRange("tp",0,-1,"withscores"));
var_dump($redis->zRangeByScore("tp","(1",6));                                               //score大于1小于等于6
var_dump($redis->zRangeByScore("tp","(3","(10",array("withscores"=>"withscores")));//score大于3小于10
var_dump($redis->zRangeByScore("tp","-inf",10));                                            //score小于等于10
var_dump($redis->zRangeByScore("tp",1,10));                                                 //score大于等于1 小于等于10
*/

//*******************************************************
/* zrank action */
/*var_dump($redis->zRange("tp",0,-1,"withscores"));
var_dump($redis->zRank("tp","baidu.com"));          //返回值排序以0开始
*/

//*******************************************************
/* zrem action */
/*var_dump($redis->zRange("tp",0,-1,"withscores"));
var_dump($redis->zRem("tp","goole.com","zadd1","notmember"));
var_dump($redis->zRange("tp",0,-1,"withscores"));*/

//*******************************************************
/* zremrangebybank action */
/*var_dump($redis->zRange("tp",0,-1,"withscores"));
var_dump($redis->zRemRangeByRank("tp",0,1));
var_dump($redis->zRange("tp",0,-1,"withscores"));*/

//*******************************************************
/* zremrangebyscore action */
/*var_dump($redis->zRange("tp",0,-1,"withscores"));
var_dump($redis->zRemRangeByScore("tp","(4","(19"));
var_dump($redis->zRange("tp",0,-1,"withscores"));*/

//*******************************************************
/* zrevrange action */
/*var_dump($redis->zRange("tp",0,-1,"withscores"));
var_dump($redis->zRevRange("tp",0,-1));*/

//*******************************************************
/* zrevrangebyscore action */
/*var_dump($redis->zRange("tp",0,-1,"withscores"));
var_dump($redis->zRevRangeByScore("tp","+inf","-inf",array("withscores"=>"withscores")));
var_dump($redis->zRevRangeByScore("tp",19,11,array("withscores"=>"withscores")));*/

//*******************************************************
/* zrevrank action */
/*var_dump($redis->zRange("tp",0,-1,"withscores"));
var_dump($redis->zRevRank("tp","tp2"));
var_dump($redis->zRevRank("tp","tp1"));*/

//*******************************************************
/* zscore action */
/*var_dump($redis->zRange("tp",0,-1,"widthscores"));
var_dump($redis->zScore("tp","tp2"));*/

//*******************************************************
/* zunionstore action */
/*var_dump($redis->zRange("tp1",0,-1,"widthscores"));
var_dump($redis->zRange("tp2",0,-1,"widthscores"));
//  zunionstore("存储有序集key",array("合并有序集"),array("weights选项"),"aggregate选项")
//  weights选项数组第一个数值：代表（合并有序集数组）里第一个有序集（集体先乘）。依次类推。
//  aggregate选项(3个值)。 1 sum(默认)：代表合并有序集数组内合并后相同的元素score相加。2.min：合并后相同元素取最小值。3.取最大值。
var_dump($redis->zunionstore("zunionstore",array("tp1","tp2"),array(1,2),"min"));
var_dump($redis->zRange("zunionstore",0,-1,"widthscores"));*/

//*******************************************************
/* zinterstore action */
/*var_dump($redis->zRange("tp1",0,-1,"widthscores"));
var_dump($redis->zRange("tp2",0,-1,"widthscores"));
var_dump($redis->zinterstore("zinterstore",array("tp1","tp2"),array(2,3),"max"));
var_dump($redis->zRange("zinterstore",0,-1,"widthscores"));*/

var_dump($redis->keys("*"));
var_dump($redis->scan(2));