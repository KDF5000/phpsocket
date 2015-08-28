<?php
/**
 * Created by PhpStorm.
 * User: Boss
 * Date: 2015/8/28
 * Time: 19:52
 */
require dirname(__DIR__).'/../../autoload.php';
use PhpSocket\SocketClient;

$client = new SocketClient('192.168.0.107');
$res = $client->connect();
if($res){
    for($i=10;$i<50;$i++){
        $msg = "Test.key ".$i." ".time()."\n\n";
        echo $msg;
        $client->send($msg);
        echo "发送成功".PHP_EOL;
        sleep(2);
    }

}else{
    echo "连接错误";
}
