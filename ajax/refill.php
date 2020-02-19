<?php
header('Content-Type: application/json');
session_start();
include $_SERVER['DOCUMENT_ROOT']."/function/database.php";

if(empty($_SESSION['user'])){
echo request("error","ผิดพลาด","ไม่สามารถเข้าสู่ระบบได้","");
exit();
}else{
$Query = query("SELECT * FROM user WHERE user = ?",array($_SESSION['user']));	
$User = $Query->fetch();
}


$Query = query("SELECT * FROM code WHERE code = ?",array($_GET['code']));
$Data = $Query->fetch();
if($Data){

 if($Data['code_use']==1){
echo request("error","ผิดพลาด","Code นี้ใช้ไปแล้วคับ","");
exit();
 }else{

     $Add = query("UPDATE user SET credit = credit+? WHERE user = ?",array($Data['credit'],$User['user']));
     $Up = query("UPDATE code SET code_use = 1, use_by = ? WHERE id = ?",array($User['user'],$Data['id']));


echo request("success","สำเร็จ","ใช้ Code สำเร็จแล้ว ได้รับ ".$Data['credit']." เครดิต","./");
exit();

 }


}else{
echo request("error","ผิดพลาด","ไม่พบ Code นี้ในระบบ","");
exit();
}