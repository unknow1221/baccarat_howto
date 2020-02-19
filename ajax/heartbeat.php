<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/function/database.php";

if(empty($_SESSION['user'])){
echo request("error","ผิดพลาด","ไม่สามารถเข้าสู่ระบบได้","");
exit();
}

$Query = query("UPDATE user SET lobby = 1 WHERE user = ?",array($_SESSION['user']));