<?php
date_default_timezone_set("Asia/Bangkok");

try {
$engine = new PDO("mysql:host=127.0.0.1;dbname=ifairycraf_ba01;charset=utf8", "ifairycraf_ba01","iKeOuLQO");
$engine->exec("set names utf8");
}
catch (PDOException $e) {
	 echo '<b>เชื่อมต่อผิดพลาด -> </b>'.$e->getMessage();
	 exit;
}
function query($sql,$array=array()){
    global $engine;
    $q = $engine->prepare($sql);
    $q->execute($array);
    return $q;
}

function request($status,$title,$info,$href){
header('Content-Type: application/json');
$json = array(
"status"=>$status,
"title"=>$title,
"info"=>$info,
"href"=>$href,
"time"=>time()
);
return @json_encode($json, JSON_UNESCAPED_UNICODE );
}