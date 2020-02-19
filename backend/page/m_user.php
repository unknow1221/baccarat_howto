<div class="container mt-4">
    <div class="card casino-card">
        <div class="card-body text-center">
            <span class="text-white">
                จัดการผู้ใช้งาน
            </span>

                <?php 
                if(isset($_GET['m'])){
                    $Query = query("SELECT * FROM user WHERE id = ?",array($_GET['m']));
                    $Data = $Query->fetch();
                    
                    if(isset($_POST['save'])){
                        $Query = query("UPDATE user SET user = ? , pass = ?, credit = ? WHERE id = ?",array($_POST['user'],$_POST['pass'],$_POST['credit'],$_POST['id']));
                    if($Query){
                        ?>
            <script>Swal.fire(
      'สำเร็จ!',
      'แก้ไขข้อมูลแล้ว',
      'success'
    ).then(function() {
    window.location.href = "?page=m_user";

		});</script>
                             <?php
                    }
                    }
                    ?>
                 <div class="row mt-4">
                <div class="col-2"></div>
                <div class="col-md-8">
                    <form method="post" action="">
                        <input type="hidden" name="id" value="<?= $Data['id'] ?>">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="color:#6c7592;">ชื่อผู้ใช้</span>
                        </div>
                        <input type="text" name="user" style="width: 40%" class="form-control" placeholder="กรุณากรอกชื่อผู้ใช้" id="addplususername" value="<?= $Data['user'] ?>">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="color:#6c7592;">รหัสผ่าน</span>
                        </div>
                        <input type="text" name="pass" style="width: 40%" class="form-control" placeholder="กรุณากรอกรหัสผ่าน" id="addpluspassword" value="<?= $Data['pass'] ?>">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="color:#6c7592;">เครดิต</span>
                        </div>
                        <input type="number" name="credit" style="width: 40%" class="form-control" placeholder="กรอกจำนวนเครดิต" id="addpluspassword" value="<?= $Data['credit'] ?>">
                    </div>
                    <button type="submit" name="save" class="btn btn-side btn-block">คลิ๊กเพื่อตั้งค่า</button>
                     </form>
                <div class="col-2"></div>

            </div> </div>
                         <?php
                }
                ?>


        <table class="table table-striped text-white mt-4">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ผุ้ใช้</th>
      <th scope="col">ชนะ</th>
      <th scope="col">เเพ้</th>
      <th scope="col">แก้ไข</th>
    </tr>
  </thead>
           <tbody>
            <?php 
            $Query = query("SELECT * FROM user");
            while($Data = $Query->fetch()){
echo '    <tr>
          <th scope="row">'.$Data['id'].'</th>
          <td>'.$Data['user'].'</td>
          <td>'.getwin($Data['user']).'</td>
          <td>'.getlose($Data['user']).'</td>
          <td width="10%"><a class="btn btn-side btn-block" href="?page=m_user&m='.$Data['id'].'">แก้ไข</a></td>
        </tr>';
            }
            ?>

  </tbody>
</table>
    </div>
</div>
