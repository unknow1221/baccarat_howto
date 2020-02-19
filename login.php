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
  <link rel="stylesheet" href="http://ezbux.pro/assets/css/sweetalert.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/mdb.js"></script>
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
      
          .btn-side {
      color: #ebd876;
      background: #300e05;
      border: 1.5px solid #c09d3e;
      border-radius: 50px 50px;
    }

    .btn-side:hover {
      color: #fff;
      background: #c09d3e;
      border: 1.5px solid #c09d3e;
      border-radius: 50px 50px;
    }

    body {
      background: linear-gradient(rgba(57, 6, 9, 0.6), rgba(57, 6, 9, 0.6)),url(https://wallpapercave.com/wp/wp2483832.jpg) no-repeat center center fixed;
	  -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}

.laser {
    box-shadow: 0 0 30px #fff;
}

hr.style {
      border: 0;
      height: 1px;
      background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, 0), #fff, rgba(0, 0, 0, 0));
      background-image: -moz-linear-gradient(left, #fff, rgba(0, 0, 0, .75), rgba(0, 0, 0, 0));
      background-image: -ms-linear-gradient(left, #fff, #fff, rgba(0, 0, 0, 0));
      background-image: -o-linear-gradient(left, rgba(0, 0, 0, 0), rgba(0, 0, 0, .75), rgba(0, 0, 0, 0));
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
</style>
</head>

<body>
<div class="container" style="margin-top:15%;">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
        
    <div class="card text-white p-4 mb-2" style="background-color:#5c0a10ed; border-radius:10px; border:2px solid #a67a2e;">
        <form id="loginform" method="post">
        <h3 class="text-white text-center mb-4" style="font-size:20px;"><b>LOGIN / เข้าสู่ระบบ</b></h3>
        <hr class="style mb-3 mt-0">
          <div class="row mb-3 pr-1">
            <div class="col-sm-4 p-0 text-center" style="font-size: 16px;color:white;letter-spacing: 1px;text-shadow: 3px 5px 5px #000">USERNAME : &nbsp;</div>
            <div class="col-sm-8 p-0">
              <input type="text" id="user" class="form-control text-center" placeholder="ชื่อผู้ใช้">
            </div>
          </div>
          <div class="row mb-3 pr-1">
            <div class="col-sm-4 p-0 text-center" style="font-size: 16px;color:white;letter-spacing: 1px;text-shadow: 3px 5px 5px #000">PASSWORD : &nbsp;</div>
            <div class="col-sm-8 p-0">
              <input type="password" id="pass" class="form-control text-center" placeholder="รหัสผ่าน">
            </div>
          </div>
          <div class="row mt-3">
            <div class="col text-right pl-0">
              <a id="login"><img class="btnimg" src="../img/btnlogin.png" height="65"></a>
            </div>
			
            <div class="col text-left pr-0">
              <a data-toggle="modal" data-target="#registers"><img class="btnimg" src="../img/btnregister.png" height="65"></a>
            </div>
          </div>
		  
		  
		  
		  
        </form>
			  
</div>
<center>
<span class="text-white">ติดต่อเราได้ที่ไลน์</span><br>
<img src="../img/linem.png" width="30">&nbsp;<span style="color:khaki; font-size:20px;">Line : @Bacarrathack</span>
</center>
    </div>
    </div>
    <div class="col-md-4"></div>
    </div>
    <div class="modal fade" id="registers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true" >

  <div class="modal-dialog modal-md" role="document">


    <div class="modal-content" style="background-color:#5c0a10ed; border:1px solid #b68933; border-radius:10px;">
      <div class="modal-body">
          <form id="register_form" method="post">
        <h4 class="text-center text-white">สมัครสมาชิก</h4>
        <span class="text-white">ชื่อผู้ใช้</span>
        <input class="form-control mt-2 mb-2" placeholder="username" name="user"></input>
        <span class="text-white">กรอกรหัสผ่าน</span>
          <input type="password" class="form-control mt-2 mb-2" placeholder="password" name="pass"></input>
      <span class="text-white">ยืนยันรหัสผ่าน</span>
                <input type="password" class="form-control mt-2 mb-2" placeholder="confirm password" name="repass"></input>
        <span class="text-white">อีเมล</span>
        <input type="email" class="form-control mt-2 mb-2" placeholder="email" name="email"></input>
        <center>
        <a href="#">
        <button id="register" type="button" class="btn btn-side btn-block mt-4">สมัครสมาชิก</button>
            </form>
</button>
</center>
      </div>
    </div>
  </div>
</div>
	

	<script src="js/cshacker.js?v=1.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	
</div>
</body>
</html>