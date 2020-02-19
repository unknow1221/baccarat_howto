<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/function/database.php";

if (empty($_POST['user'])) {
echo request("error","ผิดพลาด","ไม่สามารถสมัครสมาชิกได้","");
exit();
}

if (empty($_POST['pass'])) {
echo request("error","ผิดพลาด","ไม่สามารถสมัครสมาชิกได้","");
exit();
}

if($_POST['pass']!=$_POST['repass']){
echo request("error","ผิดพลาด","รหัสผ่านไม่ตรงกัน","");
exit();
}

if (empty($_POST['email'])) {
echo request("error","ผิดพลาด","ไม่สามารถสมัครสมาชิกได้","");
exit();
}

$Check = query("SELECT * FROM user WHERE user = ?",array($_POST['user']));
if($Check->fetch()){
echo request("error","ผิดพลาด","มีผู้ใช้นี้แล้วคับ","");
exit();
}

$Query = query("INSERT INTO user (user,pass,email,reg) VALUES (?,?,?,?)",array($_POST['user'],$_POST['pass'],$_POST['email'],time()));
echo request("success","สำเร็จ","สมัครสมาชิกแล้ว","./");
exit();