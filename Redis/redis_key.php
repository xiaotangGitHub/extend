<?php
header("Content-type:text/html;charset=utf-8");
/**
 * Created by PhpStorm.
 * User: TP
 * Date: 2016/11/6
 * Time: 18:37
 * Redis->Key cmd and php
 */

/**
 *  Redis        Key  命令操作
 *  del           删除 del(key) del(key,key,key)     return del number   删除给定的一个或多个 key 。
 *  dump       序列化给定 key ，并返回被序列化的值，使用 RESTORE 命令可以将这个值反序列化为 Redis 键。
 *  restore      反序列化给定的序列化值，并将它和给定的 key 关联。
 *  exists        检查给定 key 是否存在。      若 key 存在，返回 true ，否则返回 false 。
 *  expire       为给定 key 设置生存时间，当 key 过期时(生存时间为 0 )，它会被自动删除。  return true
 *  pexpire     这个命令和 EXPIRE 命令的作用类似，但是它以毫秒为单位设置 key 的生存时间，而不像 EXPIRE 命令那样，以秒为单位。
 *  expireat    expireat 的作用和 expire 类似，都用于为 key 设置生存时间。不同在于 EXPIREAT 命令接受的时间参数是 UNIX 时间戳(unix timestamp)。 return ture
 *  pexpireat   这个命令和 EXPIREAT 命令类似，但它以毫秒为单位设置 key 的过期 unix 时间戳，而不是像 EXPIREAT 那样，以秒为单位。
 *  persist      移除给定 key 的生存时间，将这个 key 从『易失的』(带生存时间 key )转换成『持久的』(一个不带生存时间、永不过期的 key )。
 *  keys         查找所有符合给定模式 pattern 的 key 。
 *  move        将当前数据库的 key 移动到给定的数据库 db 当中。如果当前数据库(源数据库)和给定数据库(目标数据库)有相同名字的给定 key ，或者 key 不存在于当前数据库，那么 MOVE 没有任何效果。
 *  object       它通常用在除错(debugging)或者了解为了节省空间而对 key 使用特殊编码的情况。
 *  type         返回 key 所储存的值的类型。
 *  ttl           以秒为单位，返回给定 key 的剩余生存时间(TTL, time to live)。
 *  pttl         这个命令类似于 TTL 命令，但它以毫秒为单位返回 key 的剩余生存时间，而不是像 TTL 命令那样，以秒为单位。
 *  randomkey 从当前数据库中随机返回(不删除)一个 key 。
 *  rename     将 key 改名为 newkey 。当 key 和 newkey 相同，或者 key 不存在时，返回一个错误。当 newkey 已经存在时， RENAME 命令将覆盖旧值。
 *  renamenx  当且仅当 newkey 不存在时，将 key 改名为 newkey 。当 key 不存在时，返回一个错误。
 *  sort         返回或保存给定列表、集合、有序集合 key 中经过排序的元素。排序默认以数字作为对象，值被解释为双精度浮点数，然后进行比较。
 */

//实例化redis
$redis = new Redis();
//连接服务器
$redis->connect("localhost");
//授权密码
$redis->auth("123456");

/*==================PHP操作redis->Key键=================================*/

//******************************************************
/* sort action */
//哈希双表左右连接查询 get获取字段值  get #代表获取key值  但是limit会多出一倍数据  否则num是几就获取几条数据    store缓存排序的数据为sort 如果有sort键则被替换
/*var_dump($redis->sort("uid",array("by"=>"user*->name","get"=>array("user*->name","#"),"store"=>"sort","sort"=>"desc","alpha"=>true,"limit"=>array(0,3))));
var_dump($redis->lRange("sort",0,-1));*/

//******************************************************
/*  del action   */
//var_dump($redis->del("aa","bb"));

//*******************************************************
/* exists action */
//var_dump($redis->exists("aa"));

//*******************************************************
/* expire persist action */
/*var_dump($redis->get("bb"));
var_dump($redis->expire("bb",3));   //3S后过期
var_dump($redis->get("bb"));
var_dump($redis->persist("bb"));*/  //将key重新设置为永久存在

//*******************************************************
/* expireat action */
/*$time = (time() + 10);          //当前时间增加10S
var_dump($redis->get("bb"));
var_dump($redis->expireAt("bb",$time));
var_dump($redis->get("bb"));
var_dump($redis->ttl("bb"));   //获取key剩余存在时间*/

//*******************************************************
/* keys action */
/*var_dump($redis->keys("*"));            //匹配数据库中所有 key 。
var_dump($redis->keys("h*c*"));        //匹配 hcllo ， hlclo  等。 key值有 *c*
var_dump($redis->keys("h?llow"));      //匹配 hellow 和 hcllow 等。[贪婪]
var_dump($redis->keys("h[ae]llow"));   //匹配 hellow 和 hallow ，但不匹配 hcllow 。[正则]*/

//*******************************************************
/* move action */
/*var_dump($redis->select(1));
var_dump($redis->keys("*"));
var_dump($redis->move("aa",0));
var_dump($redis->keys("*"));
var_dump($redis->select(0));
var_dump($redis->keys("*"));*/

//*******************************************************
/* randomkey action */
/*var_dump($redis->select(0));
$randomkey = $redis->randomKey();
echo $randomkey;
var_dump($redis->get($randomkey));
var_dump($redis->keys("*"));*/

//*******************************************************
/* rename renamenx action */
/*var_dump($redis->get("aa"));  //原key值覆盖重新命名的key值  原key删除
var_dump($redis->get("bb"));
var_dump($redis->rename("aa","bb"));
var_dump($redis->get("aa"));
var_dump($redis->get("bb"));*/
/*var_dump($redis->rename("bb","cc"));      //原key重命名 新增key 原key删除
var_dump($redis->get("cc"));*/
//var_dump($redis->rename("qq","cc"));        //要重命名的key不存在 返回 boolean false
/* // renamenx
var_dump($redis->renameNx("dd","ff"));         //原key重命名的新key如果存在 返回 boolean false
var_dump($redis->renameNx("ee","ff"));          //原key重命名的新key如果不存在 返回 boolean true
var_dump($redis->renameNx("无key","newkey")) //要重命名的key不存在 返回 boolean false
*/

//*******************************************************
/* dump restore action */
/*$dump = $redis->dump("aa");
echo $dump;
echo $redis->get("aa");
$restore = $redis->restore("bb",0,$dump);
echo $restore;*/

//*******************************************************
/* migrate action */
/*
   第一步连接两个端口
    $ ./redis-server &
    [1] 3557

    ...

    $ ./redis-server --port 7777 &
    [2] 3560

    ...

    //第二步迁移
    $ ./redis-cli

    redis 127.0.0.1:6379> flushdb
    OK

    redis 127.0.0.1:6379> SET greeting "Hello from 6379 instance"
    OK

    redis 127.0.0.1:6379> MIGRATE 127.0.0.1 7777 greeting 0 1000
    OK

    redis 127.0.0.1:6379> EXISTS greeting                           # 迁移成功后 key 被删除
    (integer) 0

    //第三步查看
    $ ./redis-cli -p 7777

    redis 127.0.0.1:7777> GET greeting
    "Hello from 6379 instance"

*/

