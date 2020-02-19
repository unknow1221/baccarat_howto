<?php
header('Content-Type: application/json');
session_start();
include $_SERVER['DOCUMENT_ROOT']."/function/database.php";

if(empty($_SESSION['user'])){
echo request("error","ผิดพลาด","ไม่สามารถเข้าสู่ระบบได้","");
exit();
}else{
$Query = query("SELECT * FROM user WHERE user = ?",array($_SESSION['user']));	
$Data = $Query->fetch();
}
$Lap = 0;

$GWin = 0;
$GLose = 0;

$Win = 0;
$Lose = 0;

$Global = 0;

$Arr = [];

$Query = query("SELECT * FROM statistic WHERE room = ? AND date = ? AND user = ?",array($_GET['room'],date("d-m-Y"),$_SESSION['user']));
while($Data = $Query->fetch()){
	
if($Data['result'] == "win"){
	if($Global == 0){
		array_push($Arr,["status"=>"win","lap"=>1]);	
		}else{
		array_push($Arr,["status"=>"win","lap"=>$Global]);	
		}
		$Win = 0;
		$GWin++;
		$Lap++;
   $Global = 0;
	
	$Win++;	

}elseif($Data['result'] == "lose"){
if($Lose == 2){
		array_push($Arr,["status"=>"lose","lap"=>3]);
		$Lose = 0;
	$GLose++;
	$Lap++;
	}else{
	$Lose++;
	$Global++;
	}
	
}
}
$m = [];
$s = [];
$ms = 0;
$sc = 0;
foreach($Arr as $Key => $Value) {
  array_push($m,$ms);
  array_push($s,$sc);
	$ms++;
	if($Value['status'] == 'win'){
	$sc++;	
	}else{
	if($sc != 0){
	$sc--;	
	}
	}
 
}

$Rt = ["top"=>$m,"bottom"=>$s];
echo json_encode($Rt);
