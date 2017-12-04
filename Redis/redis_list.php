<?php
header("Content-type:text/html;charset=utf-8");
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/7
 * Time: 10:37
 * Redis->List  cmd php
 */

/**
 *      Redis           List命令操作
 *      blpop           (BLPOP key [key ...] timeout) 是lpop阻塞版本 timeout为阻塞等待时间 如果多个key就依次弹出元素 事物内使用timeout无效
 *      brpop          除了弹出的位置与blpop不同之外，其他相同特性
 *      rpoplpush      (RPOPLPUSH source destination)将列表 source 中的最后一个元素(尾元素)弹出，并返回给客户端。将 source 弹出的元素插入到列表 destination ，作为 destination 列表的的头元素。
 *      brpoplpush     (BRPOPLPUSH source destination timeout)  给定列表 source 不为空时， BRPOPLPUSH 的表现和 RPOPLPUSH 一样。当列表 source 为空时， BRPOPLPUSH 命令将阻塞连接，直到等待超时，或有另一个客户端对 source 执行 LPUSH 或 RPUSH 命令为止。超时参数 timeout 接受一个以秒为单位的数字作为值。超时参数设为 0 表示阻塞时间可以无限期延长(block indefinitely) 。
 *      lindex           返回列表 key 中，下标为 index 的元素。下标(index)参数 start 和 stop 都以 0 为底，0为第一个元素。-1代表列表最后一个元素，-2代表列表倒数第二个元素。
 *      linsert           (LINSERT key BEFORE|AFTER pivot value)将值 value 插入到列表 key 当中，位于值 pivot 之前或之后。当 pivot 不存在于列表 key 时，不执行任何操作。当 key 不存在时， key 被视为空列表，不执行任何操作。如果 key 不是列表类型，返回一个错误。
 *      llen              返回列表 key 的长度。如果 key 不存在，则 key 被解释为一个空列表，返回 0 .如果 key 不是列表类型，返回一个错误。
 *      lpop             移除并返回列表 key 的头元素。
 *      lpush            将一个或多个值 value 插入到列表 key 的表头。多值如：a b c 从左开始插入到列表key表头 为 c b a。如果 key 不存在，一个空列表会被创建并执行 LPUSH 操作。当 key 存在但不是列表类型时，返回一个错误。
 *      lpushx           将值 value 插入到列表 key 的表头，当且仅当 key 存在并且是一个列表。并且一次只可以插入一个值
 *      lrange          返回列表 key 中指定区间内的元素，区间以偏移量 start 和 stop 指定。0开始，第一个元素：0,0。负数-1代表倒数第一个。0,-1代表全部获取
 *      lrem            (LREM key count value) 根据参数 count 的值，移除列表中与参数 value 相等的元素。count：正数代表从表头搜索到表尾删除与value值相同的count数元素，负数与正数相反，0代表搜索到的与value相同的元素全部删除。return delnumber
 *      lset             (LSET key index value) 将列表 key 下标为 index 的元素的值设置为 value 。0下标开始，为第一个元素，-1为倒数第一个元素。当 index 参数超出范围，或对一个空列表( key 不存在)进行 LSET 时，返回一个错误。
 *      ltrim           (LTRIM key start stop)对一个列表进行修剪(trim)，就是说，让列表只保留指定区间内的元素，不在指定区间之内的元素都将被删除。下标(index)参数 start 和 stop 都以 0 为底，也就是说，以 0 表示列表的第一个元素，以 1 表示列表的第二个元素，以此类推。当 key 不是列表类型时，返回一个错误。
 *      rpop            移除并返回列表 key 的尾元素。当 key 不存在时，返回 nil 。
 *      rpush           将一个或多个值 value 插入到列表 key 的表尾(最右边)。
 *      rpushx          将一个值插入到列表 key 的表尾，并且仅当 key 存在并且是一个列表。
 */

//实例化redis
$redis = new Redis();
//连接服务器
$redis->connect("localhost");
//授权密码
$redis->auth("123456");
//切换数据库为3
$redis->select(3);

/*==================PHP操作redis->List类型=================================*/

//*******************************************************
/* blpop action */
/*var_dump($redis->lpush("tp1","111","222","333"));
var_dump($redis->lpush("tp2","aaa","bbb","ccc"));*/
/*var_dump($redis->lRange("tp1",0,-1));
var_dump($redis->lRange("tp2",0,-1));
var_dump($redis->blPop(array("tp1","tp2"),3));
var_dump($redis->lRange("tp1",0,-1));
var_dump($redis->lRange("tp2",0,-1));*/
/*var_dump($redis->lRange("tp1",0,-1));
var_dump($redis->lRange("tp2",0,-1));
var_dump($redis->multi());
var_dump($redis->blPop(array("tp1","tp2"),3));
var_dump($redis->exec());
var_dump($redis->lRange("tp1",0,-1));
var_dump($redis->lRange("tp2",0,-1));

//*******************************************************
/* brpop action */
/*var_dump($redis->rpush("tp1","111","222","333"));
var_dump($redis->rpush("tp2","aaa","bbb","ccc"));*/
/*var_dump($redis->lRange("tp1",0,-1));
var_dump($redis->lRange("tp2",0,-1));
var_dump($redis->brPop(array("tp1","tp2"),3));
var_dump($redis->lRange("tp1",0,-1));
var_dump($redis->lRange("tp2",0,-1));*/

//*******************************************************
/* rpoplpush action */
//var_dump($redis->lpush("tp1","111","222","333"));
//var_dump($redis->lpush("tp2","aaa","bbb","ccc"));
/*var_dump($redis->lRange("tp1",0,-1));
var_dump($redis->lRange("tp2",0,-1));
var_dump($redis->rpoplpush("tp1","tp2"));
var_dump($redis->rpoplpush("tp2","tp2"));
var_dump($redis->lRange("tp1",0,-1));
var_dump($redis->lRange("tp2",0,-1));*/

//*******************************************************
/* brpoplpush action */
//var_dump($redis->lpush("tp1","111","222","333"));
//var_dump($redis->lpush("tp2","aaa","bbb","ccc"));
/*var_dump($redis->lRange("tp1",0,-1));
var_dump($redis->lRange("tp2",0,-1));
var_dump($redis->brpoplpush("tp1","tp2",3));
var_dump($redis->lRange("tp1",0,-1));
var_dump($redis->lRange("tp2",0,-1));*/

//*******************************************************
/* lindex action */
/*var_dump($redis->lRange("tp2",0,-1));
var_dump($redis->lIndex("tp2",1));
var_dump($redis->lIndex("tp2",-2));*/

//*******************************************************
/* linsert action */
/*var_dump($redis->lRange("tp2",0,-1));
var_dump($redis->lInsert("tp2","before","111","before"));
var_dump($redis->lInsert("tp2","after","111","after"));
var_dump($redis->lRange("tp2",0,-1));
var_dump($redis->lInsert("tp2","after","error","after"));*/

//*******************************************************
/* llen action */
/*var_dump($redis->lRange("tp2",0,-1));
var_dump($redis->lLen("tp2"));
var_dump($redis->lLen("error"));*/

//*******************************************************
/* lpop action */
/*var_dump($redis->lRange("tp2",0,-1));
var_dump($redis->lPop("tp2"));              //移除列表头部第一个元素并返回
var_dump($redis->lRange("tp2",0,-1));*/

//*******************************************************
/* lpush action */
/*var_dump($redis->lRange("tp2",0,-1));
var_dump($redis->lPush("tp2","222","333"));
var_dump($redis->lRange("tp2",0,-1));*/

//*******************************************************
/* lpushx action */
/*var_dump($redis->lRange("tp2",0,-1));
var_dump($redis->lPushx("tp2","lpushx"));
var_dump($redis->lRange("tp2",0,-1));
var_dump($redis->lPushx("error","lpushx"));*/

//*******************************************************
/* lrange action */
/*var_dump($redis->lRange("tp2",0,-1));
var_dump($redis->lRange("tp2",0,1));
var_dump($redis->lRange("tp2",-2,-1));*/

//*******************************************************
/* lrem action */
/*var_dump($redis->lRange("lrem",0,-1));
var_dump($redis->lRem("lrem",22,2));
var_dump($redis->lRange("lrem",0,-1));
var_dump($redis->lRem("lrem",11,-2));
var_dump($redis->lRange("lrem",0,-1));
var_dump($redis->lRem("lrem",33,0));
var_dump($redis->lRange("lrem",0,-1));*/

//*******************************************************
/* lset action */
/*var_dump($redis->lRange("tp2",0,-1));
var_dump($redis->lSet("tp2",-1,"lset"));
var_dump($redis->lRange("tp2",0,-1));
var_dump($redis->lRange("tp2",0,-1));
var_dump($redis->lSet("tp2",1,"lset"));
var_dump($redis->lRange("tp2",0,-1));*/

//*******************************************************
/* ltrim action */
/*var_dump($redis->lRange("tp2",0,-1));
var_dump($redis->lTrim("tp2",0,7));
var_dump($redis->lRange("tp2",0,-1));*/

//*******************************************************
/* rpop action */
/*var_dump($redis->lRange("tp2",0,-1));
var_dump($redis->rPop("tp2"));
var_dump($redis->lRange("tp2",0,-1));*/

//*******************************************************
/* rpush action */
/*var_dump($redis->lRange("tp2",0,-1));
var_dump($redis->rPush("tp2","aaa","bbb"));
var_dump($redis->lRange("tp2",0,-1));*/

//*******************************************************
/* rpushx action */
/*var_dump($redis->lRange("tp2",0,-1));
var_dump($redis->rPushx("tp2","rpushx"));
var_dump($redis->lRange("tp2",0,-1));*/