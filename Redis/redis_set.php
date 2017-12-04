<?php
header("Content-type:text/html;charset=utf-8");
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/7
 * Time: 14:02
 * Redis->Set   cmd php
 */

/**
 *      Redis           Set命令操作
 *      sadd            将一个或多个 member 元素加入到集合 key 当中，已经存在于集合的 member 元素将被忽略。假如 key 不存在，则创建一个只包含 member 元素作成员的集合。当 key 不是集合类型时，返回一个错误。
 *      scard           返回集合 key 的基数(集合中元素的数量)。当 key 不存在时，返回 0 。
 *      sdiff            返回一个集合的全部成员，该集合是所有给定集合之间的差集。return：first key 的差集
 *      sdiffstore      (SDIFFSTORE destination key [key ...]) 与sdiff相似,将结果集保存到destination ，如果 destination 集合已经存在，则将其覆盖。destination 可以是 key 本身。
 *      sinter          返回一个集合的全部成员，该集合是所有给定集合的交集。不存在的 key 被视为空集。当给定集合当中有一个空集时，结果也为空集(根据集合运算定律)。
 *      sinterstore    (SINTERSTORE destination key [key ...])  这个命令类似于 SINTER 命令，但它将结果保存到 destination 集合，而不是简单地返回结果集。
 *      sismember     (SISMEMBER key member)判断 member 元素是否集合 key 的成员。
 *      smembers    返回集合 key 中的所有成员。不存在的 key 被视为空集合。
 *      smove          (SMOVE source destination member)将 member 元素从 source 集合移动到 destination 集合并删除source集合内的member元素。如果source集合不存在或者source集合内不存在member元素，命令无效。当 destination 集合已经包含 member 元素时， SMOVE 命令只是简单地将 source 集合中的 member 元素删除。
 *      spop            移除并返回集合中的一个随机元素。
 *      srandmember (srandmember key [count]) 返回key集合中的一个随机元素。 count：小于集合基数，返回count个元素数组，count大于集合参数，返回整个集合。count为负数，返回一个数组，数组中元素可能会重复
 *      srem            移除集合key中的一个或多个member元素，不存在的member元素会被忽略。当key不是集合类型，返回一个错误。
 *      sunion          返回key集合的全部成员，该集合是所有给定集合的并集
 *      sunionstore    (sunionstore destination key [key ..]) 类似sunion 但是结果集会保存到destination集合，而不是简单的返回 如果destination已存在则覆盖，也可以是key本身
  */

//实例化redis
$redis = new Redis();
//连接服务器
$redis->connect("localhost");
//授权密码
$redis->auth("123456");
//切换数据库为4
$redis->select(4);

/*==================PHP操作redis->List类型=================================*/

//*******************************************************
/* sadd action */
/*var_dump($redis->sAdd("tpset","tp1","tp2"));
var_dump($redis->sMembers("tpset"));
var_dump($redis->sAdd("tpset","tp3","tp4"));
var_dump($redis->sMembers("tpset"));*/

//*******************************************************
/* scard action */
/*var_dump($redis->sMembers("tpset"));
var_dump($redis->sCard("tpset"));*/

//*******************************************************
/* sdiff action */
/*var_dump($redis->sMembers("tpset1"));
var_dump($redis->sMembers("tpset2"));
var_dump($redis->sDiff("tpset1","tpset2"));     //统计第一个key中的集合值在第二个key集合中值中是否存在 不存在则集合起来并返回
*/

//*******************************************************
/* sdiffstore action */
/*var_dump($redis->sMembers("tpset1"));
var_dump($redis->sMembers("tpset2"));
var_dump($redis->sDiffStore("tpsets","tpset1","tpset2"));
var_dump($redis->sMembers("tpsets"));*/

//*******************************************************
/* sinter action */
/*var_dump($redis->sMembers("tpset1"));
var_dump($redis->sMembers("tpset2"));
var_dump($redis->sInter("tpset1","tpset2"));    //将两个集合中相同的value合为一个集并返回
*/

//*******************************************************
/* sinterstore action */
/*var_dump($redis->sMembers("tpset1"));
var_dump($redis->sMembers("tpset2"));
var_dump($redis->sInterStore("sinterstore","tpset1","tpset2"));
var_dump($redis->sMembers("sinterstore"));*/

//*******************************************************
/* sismember action */
/*var_dump($redis->sMembers("tpset1"));
var_dump($redis->sIsMember("tpset1","33"));
var_dump($redis->sIsMember("tpset1","cc"));*/

//*******************************************************
/* smembers action */
//var_dump($redis->sMembers("tpset1"));

//*******************************************************
/* smove action */
/*var_dump($redis->sMembers("tpset1"));
var_dump($redis->sMembers("tpset2"));
var_dump($redis->sMove("tpset1","tpset2","11"));
var_dump($redis->sMembers("tpset1"));
var_dump($redis->sMembers("tpset2"));*/

//*******************************************************
/*var_dump($redis->sMembers("tpset2"));
var_dump($redis->sPop("tpset2"));
var_dump($redis->sMembers("tpset2"));*/

//*******************************************************
/*var_dump($redis->sMembers("tpset2"));
var_dump($redis->sRandMember("tpset2",-1));
var_dump($redis->sRandMember("tpset2",3));
var_dump($redis->sMembers("tpset2"));*/

//*******************************************************
/* srem action */
/*var_dump($redis->sMembers("tpset1"));
var_dump($redis->sRem("tpset1","aa","bb","11"));
var_dump($redis->sMembers("tpset1"));*/

//*******************************************************
/* sunion acrion */
/*var_dump($redis->sMembers("tpset1"));
var_dump($redis->sMembers("tpset2"));
var_dump($redis->sUnion("tpset1","tpset2"));*/

//*******************************************************
/* sunionstore acrion */
/*var_dump($redis->sMembers("tpset1"));
var_dump($redis->sMembers("tpset2"));
var_dump($redis->sUnionStore("sunionstore","tpset1","tpset2"));
var_dump($redis->sMembers("sunionstore"));*/