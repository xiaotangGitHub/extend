<?php
header("Content-type:text/html;charset=utf-8");
/**
 * Created by PhpStorm.
 * User: TP
 * Date: 2016/11/6
 * Time: 18:38
 * Redis->String   cmd php
 */

/**
 * Redis        String 命令操作
 * append      如果 key 已经存在并且是一个字符串， APPEND 命令将 value 追加到 key 原来的值的末尾。如果 key 不存在， APPEND 就简单地将给定 key 设为 value ，就像执行 SET key value 一样。
 * setbit        对 key 所储存的字符串值，设置或清除指定偏移量上的位(bit)。位的设置或清除取决于 value 参数，1：存，0：删 。当 key 不存在时，自动生成一个新的字符串值。offset 参数必须大于或等于 0
 * bitcount     统计setbit所记录的签到(浏览)量
 * bitop         对一个或多个保存二进制位的字符串 key 进行位元操作，并将结果保存到 destkey 上。 (bitop operation destkey key [key ...]) operation：1.and   2.or   3.xor   4.not  destkey：存在则无效
 * decr          将 key 中储存的数字值减一。不存在则初始化0再执行(-1),string类型value返回boolean false   与incr相反
 * decrby       (decrby key decrement)  key的value值减去decrement   类似decr  与incrby相反
 * get           返回 key 所关联的字符串值。key不存在 或 value!=(string) 返回boolean false
 * getbit        对 key 所储存的字符串值，获取指定偏移量上的位(bit)。当 offset 比字符串值的长度大，或者 key 不存在时，返回 0 。
 * getrange    返回 key 中字符串值的子字符串，字符串的截取范围由 start 和 end 两个偏移量决定(包括 start 和 end 在内)。负数偏移量表示从字符串最后开始计数， -1 表示最后一个字符， -2 表示倒数第二个，以此类推。
 * getset        将给定 key 的值设为 value ，并返回 key 的旧值(old value)。当 key 存在但不是字符串类型时，返回一个错误。
 * incr          将 key 中储存的数字值增一。key不存在则初始化后执行。如果值包含错误的类型，或字符串类型的值不能表示为数字，那么返回一个错误。
 * incrby       (incrby key increment)    key的value值加上increment 类似incr 与decrby相反  与decr相反
 * incrbyfloat  (incrbyfloat key increment)    key的value值加上increment   可以是float小数类型
 * mget         返回所有(一个或多个)给定 key 的值。如果给定的 key 里面，有某个 key 不存在，那么这个 key 返回特殊值 nil 。因此，该命令永不失败。
 * mset         (MSET key value [key value ...])  同时设置一个或多个 key-value 对。如果某个给定 key 已经存在，那么 MSET 会用新值覆盖原来的旧值
 * msetnx      (MSETNX key value [key value ...]) 同时设置一个或多个 key-value 对，并且仅当所有给定 key 都不存在。
 * psetex       这个命令和 setex与expireat 命令相似，但它以毫秒为单位设置 key 的生存时间，而不是像 setex与expireat 命令那样，以秒为单位。
 * set           将字符串值 value 关联到 key 。如果 key 已经持有其他值， SET 就覆写旧值，无视类型。对于某个原本带有生存时间（TTL）的键来说， 当 SET 命令成功在这个键上执行时， 这个键原有的 TTL 将被清除。
 * setex        这个命令和 psetex与expire 命令相似, 将值 value 关联到 key ，并将 key 的生存时间设为 seconds (以秒为单位)。如果 key 已经存在， SETEX 命令将覆写旧值。
 * setnx        将 key 的值设为 value ，当且仅当 key 不存在。若给定的 key 已经存在，则 SETNX 不做任何动作。
 * setrange    (setrange key offset value)    value覆盖指定key的offset偏移量处的value   如果key为空 offset偏移量前的值将使用零字节(zerobytes, "\x00" )来填充
 * strlen       返回 key 所储存的字符串值的长度。当 key 储存的不是字符串值时，返回一个错误。
 */



//实例化redis
$redis = new Redis();
//连接服务器
$redis->connect("localhost");
//授权密码
$redis->auth("123456");
//切换数据库为1
$redis->select(1);

/*==================PHP操作redis->String类型=================================*/

//*******************************************************
/* append action */
/*var_dump($redis->append("names","tpss"));
var_dump($redis->get("names"));*/

//*******************************************************
/* bitcount setbit action */
/*
 //0 1 2 3 4 5 6 7 为一个区间 8 9 10 11 12 13 14 15 为一个区间  用于bitcount区间统计
var_dump($redis->setBit('bit', 16, 0));
//统计所有签到(浏览)天数
var_dump($redis->bitCount("bit"));
//第一个参数：0从第一个区间开始统计 ，第二个参数：-1代表第一个参数区间后统计所有区间的签到(浏览天数)
var_dump($redis->bitCount("bit",1,-1));
//第二个参数：非-1 则代表统计第一个参数区间 ~ 第二个参数区间的所有签到(浏览)天数
var_dump($redis->bitCount('bit',1, 1));
*/

//*******************************************************
/* bitop setbit action */
/* 逻辑并 and  getbit("key",$num)  $num指向的bit必须同时存在才会返回1 否则0
$redis->setBit("tp1",0,1);
$redis->setBit("tp1",1,1);
$redis->setBit("tp2",1,1);
$redis->setBit("tp2",2,1);
$redis->bitOp("and","tps","tp1","tp2");
var_dump($redis->getBit("tps",0));
var_dump($redis->getBit("tps",1));
var_dump($redis->getBit("tps",2));
*/
/*逻辑或 or   getbit("key",$num)  $num指向的bit存在一个就会返回1 否则0
$redis->setBit("tp1",0,1);
$redis->setBit("tp1",1,1);
$redis->setBit("tp2",1,1);
$redis->setBit("tp2",0,1);
$redis->bitOp("or","tps","tp1","tp2");
var_dump($redis->getBit("tps",0));
var_dump($redis->getBit("tps",1));
var_dump($redis->getBit("tps",2));
*/

//*******************************************************
/* decr action */
/*var_dump($redis->set("tp","10"));
var_dump($redis->decr("tp"));
var_dump($redis->get("tp"));
var_dump($redis->decr("exists"));
var_dump($redis->get("exists"));
var_dump($redis->set("error","error"));
var_dump($redis->decr("error"));*/

//*******************************************************
/* decrby action */
/*var_dump($redis->set("tp","10"));
var_dump($redis->decrby("tp","5"));
var_dump($redis->get("tp"));
var_dump($redis->decrby("exists",10));
var_dump($redis->get("exists"));
var_dump($redis->set("error","error"));
var_dump($redis->decrby("error",10));*/

//*******************************************************
/* getrange action */
/*var_dump($redis->set("tp","hellow"));
var_dump($redis->get("tp"));
var_dump($redis->getRange("tp",0,0));
var_dump($redis->getRange("tp",0,1));
var_dump($redis->getRange("tp",2,-1));
var_dump($redis->getRange("tp",-1,-1));
var_dump($redis->getRange("tp",-1,-2));
var_dump($redis->getRange("tp",-3,-2));*/

//*******************************************************
/* getset action */
/*var_dump($redis->set("tp","hellow"));
var_dump($redis->get("tp"));
var_dump($redis->getSet("tp","world"));
var_dump($redis->get("tp"));
var_dump($redis->exists("error"));    //检测key值是否存在
var_dump($redis->getSet("error"));  //不存在就报错*/

//*******************************************************
/* incr action */
/*var_dump($redis->set("tp","10"));
var_dump($redis->get("tp"));
var_dump($redis->incr("tp"));
var_dump($redis->get("tp"));
var_dump($redis->exists("error"));    //检测key值是否存在
var_dump($redis->incr("error"));    //不存在就报错*/

//*******************************************************
/* incrby action */
/*var_dump($redis->set("tp","10"));
var_dump($redis->incrby("tp","5"));
var_dump($redis->get("tp"));
var_dump($redis->incrby("exists",10));
var_dump($redis->get("exists"));
var_dump($redis->set("error","error"));
var_dump($redis->incrby("error",10));*/

//*******************************************************
/* incrbyfloat action */
/*var_dump($redis->set("tp","10.2"));
var_dump($redis->incrByFloat("tp","5.3"));
var_dump($redis->get("tp"));
var_dump($redis->incrByFloat("exists",10.5));
var_dump($redis->get("exists"));
var_dump($redis->set("error","error"));
var_dump($redis->incrByFloat("error",10.2));*/

//*******************************************************
/* mget action */
/*var_dump($redis->set("tp1","1"));
var_dump($redis->set("tp2","2"));
var_dump($redis->set("tp4","4"));
var_dump($redis->mget(array("tp1","tp2","tp3","tp4")));*/

//*******************************************************
/* mset action */
/*var_dump($redis->set("tp","tp"));
var_dump($redis->get("tp"));
var_dump($redis->mset(array("tp"=>"tp1","tp2"=>"tp2")));
var_dump($redis->mget(array("tp","tp1","tp2")));
var_dump($redis->get("tp"));*/

//*******************************************************
/* msetnx action */
/*var_dump($redis->set("tp","tp"));
var_dump($redis->get("tp"));
var_dump($redis->msetnx(array("tp"=>"tp1","tp2"=>"tp2")));
var_dump($redis->mget(array("tp","tp1","tp2")));
var_dump($redis->get("tp"));*/

//*******************************************************
/* psetex action */
/*var_dump($redis->set("tp","tp"));
var_dump($redis->get("tp"));
var_dump($redis->psetex("tp",5000,"hello"));    //毫秒单位
var_dump($redis->get("tp"));
var_dump($redis->pttl("tp"));*/                     //pttl获取key剩余毫秒时间

//*******************************************************
/* set action */
/*var_dump($redis->set("tp","tps"));
var_dump($redis->get("tp"));
var_dump($redis->set("tp","tpsss"));        //key相同重写key值
var_dump($redis->get("tp"));
var_dump($redis->expire("tp",10));         //设置key生存时间  单位：秒
var_dump($redis->ttl("tp"));                  //获取key生存时间  单位：秒
var_dump($redis->set("tp","tp"));           //key相同重写key值 且 key原有的生存剩余时间清除
var_dump($redis->ttl("tp"));*/

//*******************************************************
/* setex action */
/*var_dump($redis->set("tp","tp"));
var_dump($redis->get("tp"));
var_dump($redis->setex("tp",5,"hello"));    //秒单位
var_dump($redis->get("tp"));
var_dump($redis->ttl("tp"));*/                     //ttl获取key剩余秒时间

//*******************************************************
/* set action */
/*var_dump($redis->exists("tp"));                 //判断key是否存在 存在返回true否则false
var_dump($redis->setnx("tp","tps"));
var_dump($redis->get("tp"));
var_dump($redis->exists("tp"));
var_dump($redis->setnx("tp","tpsss"));
var_dump($redis->get("tp"));*/

//*******************************************************
/* setrange action */
/*var_dump($redis->set("tp","tp tp tp tp tp"));
var_dump($redis->get("tp"));
var_dump($redis->exists("tp"));
var_dump($redis->setRange("tp",3,"cccc"));      //空格也算占位 0开始
var_dump($redis->get("tp"));
var_dump($redis->exists("error"));
var_dump($redis->setRange("error",5,"error"));
var_dump($redis->get("error"));*/

//*******************************************************
/* strlen action */
/*var_dump($redis->setnx("tp","tp tptptp"));  //空格也算一个长度
var_dump($redis->get("tp"));
var_dump($redis->strlen("tp"));*/


