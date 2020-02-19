<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/function/database.php";

if(empty($_POST['user'])){
echo request("error","ผิดพลาด","ไม่สามารถเข้าสู่ระบบได้","");
exit();
}

if(empty($_POST['pass'])){
echo request("error","ผิดพลาด","ไม่สามารถเข้าสู่ระบบได้","");
exit();
}

$Query = query("SELECT * FROM user WHERE user = ? AND pass = ?",array($_POST['user'],$_POST['pass']));
$Data = $Query->fetch();

if(!$Data){
echo request("error","ผิดพลาด","ไม่พบผู้ใช้งานนี้","");
}else{

	if((time()-$Data['online'])>60){
		
$_SESSION['user'] = $Data['user'];
		echo request("success","สำเร็จ","ยินดีต้อนรับคับ ".$_SESSION['user'],"./");
exit();
	}else{
echo request("error","ผิดพลาด","มีการเข้าสู่ระบบบัญชีนี้อยู่","");
exit();
	}
	

}