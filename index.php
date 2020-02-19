<?php 
session_start();
include $_SERVER['DOCUMENT_ROOT']."/function/database.php";
if(empty($_SESSION['user'])){
	include 'login.php';
	exit();
}else{
	$Query = query("SELECT * FROM user WHERE user = ?",array($_SESSION['user']));
	$Acc = $Query->fetch();
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/mdb.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/sidebar.css">
  <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://ezbux.pro/assets/css/sweetalert.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script src="js/mdb.js"></script>
	
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>   
  <title>Bacarrathack</title>

  <style>
    h2,
    h1,
    h3,
    body,
    span,
    div {
      font-family: 'Kanit', sans-serif !important;
    }

    body {
      background-size:cover!important;
      background: linear-gradient(rgba(57, 6, 9, 0.96), rgba(57, 6, 9, 0.99)),url(https://previews.123rf.com/images/hobbitfoot/hobbitfoot1709/hobbitfoot170900696/85929960-big-win-slots-777-banner-casino-on-the-red-background-vector-illustration.jpg);
}

    .baccarat-color {
      background: linear-gradient(to bottom, #5d5b5b 0%, #181818 100%);
    }

    .baccarat-color-light {
      background-color: #ff98007a !important;
    }

    .font14 {
      font-size: 14px !important;
    }

    .navbar {
      padding: 0 0 10px 20px;
      min-height: 40px;
      background-color: rgba(0, 0, 0, 0);
      background-image: url(img/frame_logo.png), url(img/frame2.png);
      background-repeat: no-repeat, no-repeat;
      background-size: 170px 47px, 100% 100%;
    }

    a {
      color: #FFF !important;
    }

    .a2 {
      color: #FFF !important;
    }

    .a2:hover {
      color: #FFF !important;
    }

    .sagame {
      height: 100%;
      background-image: url('img/sagame.png');
      background-repeat: no-repeat;
      background-size: 85% 75%;
      background-position: center center;
      padding-right: 4%
    }

    .tab {
      background-image: url('img/line_.png');
      background-repeat: no-repeat;
      background-size: 2px 100%;
      background-position: center left;
      height: 100%;
      position: relative;
    }

    .frame-casino {
      padding: 2%;
      background-size: 100% 100%;
      border-radius: 10px;
      background-color: rgba(0, 0, 0, 0.3);
    }

    .nav-casino {
      display: inline-block;
      vertical-align: middle;
      font-size: 120%;
      letter-spacing: 2px;
      margin-right: 1em;
      height: 32px;
      background-color: black;
      border-radius: 5px;
      padding: 1px;
      margin-top: 5px
    }

    .casino-side {
      position: fixed;
      bottom: 20px;
      left: 20px;
    }

    .btn-side {
      color: #fff;
      background: linear-gradient(to bottom, #57090e 0%, #181818 100%);
      border: 1.5px solid #b68933;
      border-radius: 50px 50px;
    }

    .btn-side:hover {
      color: #ffffffc4;
      background: linear-gradient(to bottom, #57090e 0%, #181818 100%);
      border: 1.5px solid #b68933;
      border-radius: 50px 50px;
    }

    hr.style {
      border: 0;
      height: 1px;
      background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, 0), #fff, rgba(0, 0, 0, 0));
      background-image: -moz-linear-gradient(left, #fff, rgba(0, 0, 0, .75), rgba(0, 0, 0, 0));
      background-image: -ms-linear-gradient(left, #fff, #fff, rgba(0, 0, 0, 0));
      background-image: -o-linear-gradient(left, rgba(0, 0, 0, 0), rgba(0, 0, 0, .75), rgba(0, 0, 0, 0));
    }

    .casino-card {
      background: linear-gradient(to right, #38060a 0%, #5c0a10 100%);
    }

    .casino-card::after {
    position: absolute;
    top: -3.5px; bottom: -3.5px;
    left: -3.5px; right: -3.5px;
    background: linear-gradient( #b68933 , #d1c051);
    content: '';
    z-index: -1;
    border-radius: 10px;
}

    .table thead th {
    vertical-align: bottom;
    border-bottom: 1px solid rgba(255, 255, 255, 0.3);
}

.table td, .table th {
    padding: .75rem;
    vertical-align: top;
    border-top: 1px solid rgba(255, 255, 255, 0.3);
}
.swal2-popup {
background: rgba(10, 10, 10,0.8) !important;
border: solid 1px #a67a2e;
}
.swal2-title {
color: #fffb80 !important;
}
.swal2-content {
color: #fffb80 !important;
}
.swal2-confirm {
background: #E4BA42 !important;
color: black !important;
background-image: linear-gradient(to bottom, #ae8e3f, #fdf0bc, #ae8e3f) !important;
}
.swal2-icon.swal2-error [class^=swal2-x-mark-line] {
    display: block;
    position: absolute;
    top: 2.3125em;
    width: 2.9375em;
    height: .3125em;
    border-radius: .125em;
    background-color: #fffb80  !important;
}
.swal2-icon.swal2-error {
    border-color: #fffb80  !important;
}
      
      ::-webkit-scrollbar {
  width: 5px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #350609;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: linear-gradient(40deg, #bd7f21 , #e6d177) !important;
}
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark p-2 font14 sticky-top">
    <a class="navbar-brand" href="#"><img src="img/sagame.png" height="40"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333" aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
      <ul class="navbar-nav ml-auto nav-flex-icons">
        <li class="nav-item">
          <a>
            <span class="nav-casino"><img src="img/user.png" style="height:25px;">&nbsp; <?= $Acc['user'] ?> &nbsp; </span>
          </a>
        </li>
        <a data-toggle="modal" data-target="#redeemcode"><span class="nav-casino"><img src="img/bitcoin.png" style="height:25px;">&nbsp; <span class="text-white" id="credit"><?= $Acc['credit'] ?> &nbsp; </span></span></a>
        <li class="nav-item">
          <a data-toggle="modal" data-target="#redeemcode" style="margin-right: 1em;">
            <img src="img/refill.png" style="height:32px;margin-top: 5px">
          </a>
        </li>
        <li class="nav-item">
          <a href="javascript: logout();" style="margin-right: 1em;">
            <img src="img/logout.png" style="height:32px;margin-top: 5px">
          </a>
        </li>
      </ul>
    </div>
  </nav>

  <?php
  error_reporting(0);

  switch ($_GET["page"]) {
    case 'lobby':
      require("page/lobby.php");
      break;
    case 'formula':
      require("page/formula.php");
      break;

    default:
      require("page/lobby.php");
      break;
  }
  ?>

<div class="modal fade" id="redeemcode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true" >

  <div class="modal-dialog modal-md" role="document">


    <div class="modal-content" style="background-color:#5c0a10ed; border:1px solid #b68933; border-radius:10px;">
      <div class="modal-body">
        <h4 class="text-center text-white">Reedeem Code</h4>
        <span class="text-white">Code</span>
        <input class="form-control mt-2 mb-2" placeholder="RedeemCode" id="refill_code"></input>
        <span class="text-white" style="font-size:16px;">*นำโค๊ตจาก @Line เพื่อนำมาเติมเครดิต</span>
        <center>
        <a href="javascript: refill();">
        <img src="img/refill.png" class="mt-3" height="50">
</a>
</center>
      </div>
    </div>
  </div>
</div>
 <script src="js/cshacker.js?v=0.6"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
</body>

</html>