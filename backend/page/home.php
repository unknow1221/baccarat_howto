
<div class="container mt-4">
<div class="col-md-12" style="padding-top:10px">
            <div class="row">
                <div class="col-md-3">
                    <div class="card casino-card p-3 z-depth-1 mb-3">
                        <div class="d-flex align-items-center"><img src="../img/bitcoin.png">
                            <h6 class="pl-1" style="color:#FFF; margin:0 auto;">ยอดวันนี้<br><small>
                                        <p style="font-size:12px" class="card-text text-center">0 ฿</p>
                                </small></h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card casino-card p-3 z-depth-1 mb-3">
                    <div class="d-flex align-items-center"><img src="../img/bitcoin.png">
                            <h6 class="pl-1" style="color:#FFF; margin:0 auto;">ยอดสัปดาห์นี้<br><small>
                                        <p style="font-size:12px" class="card-text text-center">0 ฿</p>
                                </small></h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card casino-card p-3 z-depth-1 mb-3">
                    <div class="d-flex align-items-center"><img src="../img/bitcoin.png">
                            <h6 class="pl-1" style="color:#FFF; margin:0 auto;">ยอดเดือนนี้<br><small>
                                        <p style="font-size:12px" class="card-text text-center">0 ฿</p>
                                </small></h6>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card casino-card p-3 z-depth-1 mb-3">
                    <div class="d-flex align-items-center"><img src="../img/bitcoin.png">
                            <h6 class="pl-1" style="color:#FFF; margin:0 auto;">ยอดทั้งหมด<br><small>
                                        <p style="font-size:12px" class="card-text text-center">0 ฿</p>
                                </small></h6>
                        </div>
                    </div>
                </div>
            </div>
    <?php 
    $O = 0;
    $Query = query("SELECT * FROM user");
    while($User = $Query->fetch()){
       if((time()-$User['online']<60)){
           $O++;

       }
    }
    ?>
            <div class="row mt-4">
                <div class="col-sm">
                    <div class="card casino-card">
                        <div class="card-body text-center">
                        <span class="text-white">ผู้ใช้ออนไลน์</span><br>
                        <span class="text-white"><b style="font-size:20px;"><?= $O ?></b> คน</span>
                    </div>
                    </div>
                </div>
                <?php 
    $Query = query("SELECT * FROM statistic WHERE result = 'win'");
$Win = $Query->rowCount();
    ?>
                <div class="col-sm">
                    <div class="card casino-card">
                        <div class="card-body text-center">
                        <span class="text-white">จำนวนสูตรที่เข้า</span><br>
                        <span class="text-white"><b style="font-size:20px;"><?= $Win ?></b> ครั้ง</span>
                    </div>
                    </div>
            </div>

            </div>
            <div class="card casino-card mt-4">
                <div class="card-body">
                <table class="table table-striped text-white">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ผุ้ใช้</th>
      <th scope="col">ชนะ</th>
      <th scope="col">เเพ้</th>
    </tr>
  </thead>
  <tbody>
      <?php 
       $O = 0;
    $Query = query("SELECT * FROM user");
    while($User = $Query->fetch()){
       if((time()-$User['online']<60)){

           echo '    <tr>
          <th scope="row">'.$User['id'].'</th>
          <td>'.$User['user'].'</td>
          <td>'.getwin($User['user']).'</td>
          <td>'.getlose($User['user']).'</td>
        </tr>';

       }
    }
      ?>

  </tbody>
</table>
            </div>
            </div>
