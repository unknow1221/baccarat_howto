<div class="container mt-4">
    <div class="row">
        <div class="col-sm">
            <div class="card casino-card">
                <div class="card-body text-center">
                    <div class="table-wrapper-scroll-y my-custom-scrollbar text-center">
                        <table class="table table-striped text-white">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">โค๊ด</th>
                                    <th scope="col">ชื่อผู้ใช้</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $Query = query("SELECT * FROM code ORDER BY id DESC");
                                while($Data = $Query->fetch()){
echo '    <tr>
          <th scope="row">' . $Data['id'] . '</th>
          <td>'.$Data['code'].'</td>
          <td>';
if($Data['use_by']== ""){
    echo 'ยังไม่ถูกใช้';
}else{
    echo $Data['use_by'];
}
                                    echo '</td>
        </tr>';
}
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card casino-card mb-3">
                <div class="card-body text-center">
                    <span class="text-white">สร้าง RedeemCode</span>
                    <form method="post" action="">
                    <div class="input-group mb-3 mt-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="color:#6c7592;">จำนวนเครดิต</span>
                        </div>
                        <input type="text" name="credit" style="width: 40%" class="form-control" placeholder="เครดิต">
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="color:#6c7592;">จำนวนโค็ต</span>
                        </div>
                        <input type="number" name="number" style="width: 40%" class="form-control" placeholder="จำนวน">
                    </div>
                    <button name="gen" type="submit" class="btn btn-side btn-block mt-4">สร้างโค๊ด</button

                    </form>
                </div>
            </div>

            <div class="card casino-card">
                <div class="card-body text-center">

                    <div class="row pt-2 pb-2 ml-1 mr-1 mb-2" style="background-color:#ae8f37; color:#FFF;">
              <div class="col-6 ">จำนวนเครดิต
                  <span class="badge badge-warning win ml-2"><?= ($_POST['number']*$_POST['credit']) ?></span>
              </div>
              <div class="col-6">จำนวนโค็ต
                <span class="badge badge-warning  loss ml-2"><?php if($_POST['number'] != ''){echo $_POST['number'];}else{echo 0;} ?></span>
              </div>
          </div>

                   <?php 
                    function gen($length = 13) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
                    if(isset($_POST['gen'])){
                        if($_POST['number']>=2000){
                            ?>
            <script>Swal.fire(
      'ผิดพลาด!',
      'ไม่สามารถสร้างเกิน 2,000 โค็ตได้',
      'success'
    ).then(function() {
    window.location.href = "?page=m_redeemcode";

		});</script>
                             <?php
                            exit();
                        }
                        $Ca = [];
for($i = 0; $i < $_POST['number']; $i++){
    $code = gen();
    $q .= "INSERT INTO code (code,credit,create_by,create_date) VALUES ('".$code."','".$_POST['credit']."','".$_SESSION['user']."','".time()."');";
array_push($Ca,$code);
}
                       $Query = query($q);
                        ?>
            <script>Swal.fire(
      'สำเร็จ!',
      'สร้างโค็ตแล้ว',
      'success'
    );</script>
                             <?php
                    }

                    ?>
                    <textarea id="gener" class="form-control" placeholder="โค๊ต" style="height: 200px;"><?php 
                        foreach($Ca as $key => $val){
echo $val."\n";
                        }
                        ?></textarea>

                    <button type="button" class="btn btn-side btn-block mt-4" onclick="$('#gener').select();document.execCommand('copy');Swal.fire('สำเร็จ!','คัดลอกแล้วคับ','success');">คัดลอก</button>
                </div>
            </div>


        </div>
    </div>
</div>
<style>
    .my-custom-scrollbar {
        position: relative;
        height: 550px;
        overflow: auto;
    }
</style>