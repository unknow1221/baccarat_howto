<div class="container mt-4">
    <div class="row">
        <div class="col-sm">
            <?php 
            if(empty($_GET['m'])){
          $m = 1;
      }else{
          $m = $_GET['m'];
      }
            ?>
            <div class="card casino-card">
                <div class="card-body text-center">
                  <h3 style="color: khaki"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp;สูตรที่ <?= $m ?></h3>
                    <hr class="style mb-4 mt-3">

                <div class="table-wrapper-scroll-y my-custom-scrollbar text-center">
                <table class="table table-responsive">
  <tbody>
      <?php 
if(isset($_GET['rm'])){
    $Query = query("DELETE FROM fml WHERE id = ?",array($_GET['rm']));
?>
            <script>Swal.fire(
      'สำเร็จ!',
      'ลบข้อมูลแล้ว',
      'success'
    ).then(function() {
    window.location.href = "?page=m_formula&m=<?= $m ?>";

		});</script>
                             <?php
}
      $Query = query("SELECT * FROM fml WHERE idea = ?",array($m));
      while($Data = $Query->fetch()){
          $fml = str_split($Data['fm']);
          echo '<tr>';
          foreach($fml as $k => $v){
              echo '<td>
              <img src="../img/'.$v.'.png" width="30">
          </td>';
          }
          echo '<td>
            <h1 style="font-size:30px; color:#FFF;">=</h1>
          </td>
          <td>
              <img src="../img/'.$Data['an'].'.png" width="30">
          </td>  
          <td>
            <a class="btn btn-side" href="?page=m_formula&m='.$m.'&rm='.$Data['id'].'"><i class="fa fa-times"></i> ลบ</a>
          </td>  
          ';
          echo '</tr>';
      }
      ?>

    
  </tbody>
</table>
                </div>
                </div>
            </div>
        </div>
        <?php 
        if(isset($_POST['add'])){
            if(empty($_GET['m'])){
          $m = 1;
      }else{
          $m = $_GET['m'];
      }

            $fm .= $_POST['fm1'];
            $fm .= $_POST['fm2'];
            $fm .= $_POST['fm3'];
            $fm .= $_POST['fm4'];
            $fm .= $_POST['fm5'];
           $Query = query("INSERT INTO fml (fm,an,idea) VALUES (?,?,?)",array($fm,$_POST['an'],$m));
            ?>
            <script>Swal.fire(
      'สำเร็จ!',
      'เพิ่มข้อมูลแล้ว',
      'success'
    ).then(function() {
    window.location.href = "?page=m_formula&m=<?= $m ?>";

		});</script>
                             <?php
        }
        ?>
        <div class="col-sm">
            <div class="card casino-card">
                <div class="card-body">
                    <form method="post" action="">
                <select class="browser-default custom-select mb-3" name="fm1">
  <option selected value="">สูตร 1</option>
  <option value="B">Banker</option>
  <option value="P">Player</option>
  <option value="T">Tie</option>
</select>
<select class="browser-default custom-select mb-3" name="fm2">
  <option selected>สูตร 2</option>
  <option value="B">Banker</option>
  <option value="P">Player</option>
  <option value="T">Tie</option>
</select>
<select class="browser-default custom-select mb-3" name="fm3">
  <option selected>สูตร 3</option>
  <option value="B">Banker</option>
  <option value="P">Player</option>
  <option value="T">Tie</option>
</select>
<select class="browser-default custom-select mb-3" name="fm4">
  <option selected>สูตร 4</option>
  <option value="B">Banker</option>
  <option value="P">Player</option>
  <option value="T">Tie</option>
</select>
<select class="browser-default custom-select mb-3" name="fm5">
  <option selected>สูตร 5</option>
  <option value="B">Banker</option>
  <option value="P">Player</option>
  <option value="T">Tie</option>
</select>
<select class="browser-default custom-select mb-3" name="an">
  <option selected>ผลลัพท์</option>
  <option value="B">Banker</option>
  <option value="P">Player</option>
  <option value="T">Tie</option>
</select>
<button type="submit" name="add" class="btn btn-side btn-block">
    จดสูตร
</button>
                </form>
                </div>
            </div>
            <div class="card casino-card mt-4">
                <div class="card-body text-center">
                <select class="browser-default custom-select mb-3" onchange="window.location.href = '?page=m_formula&m='+this.options[this.selectedIndex].value; ">
  <option selected>เลือกสูตร</option>
                    <?php 
                    $Query = query("SELECT * FROM fml_list");
                    while($Data = $Query->fetch()){
echo '<option  value="'.$Data['id'].'">สูตร '.$Data['id'].'</option>';
                    }
                    ?>
</select>
<a href="?page=m_formula&add" class="btn btn-side btn-block">
    เพิ่มสูตร
</a>
                    
                    <?php 
                    if(isset($_GET['add'])){
                        $Query = query("INSERT INTO fml_list (time) VALUES (?)",array(time()));

                        ?>
            <script>Swal.fire(
      'สำเร็จ!',
      'เพิ่มสูตรแล้ว',
      'success'
    ).then(function() {
    window.location.href = "?page=m_formula";

		});</script>
                             <?php
                    }
                    ?>
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