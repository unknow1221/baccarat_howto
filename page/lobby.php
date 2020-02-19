<section id="headers">
        <div class="headers-container">
            <h1 class="animated fadeIn">Bacarrathack</h1>
            <h2 class="animated fadeIn">บริการสูตรบาคาร่าราคาถูกก
        </div>
    </section>

    <div class="container mt-4">
      <div class="row justify-content-md-center mb-4">
      </div>
      <hr class="style mb-3 mt-0">
    <div class="row">
<?php
for ($x = 0; $x <= 15;) {
  echo '  <div class="col-6 mb-2 z-depth-3">
  <div class="m-1">
    <a style="text-decoration:none;" href="?page=formula&room='.($x+1).'">
      <div class="row resroom frame-casino" style="background-image: url(img/frame.png);">
      <div class="col sagame">
          <span class="txtroom">ROOM : 00'.($x+1).'</span>
        </div>
        <div class="col-6 col-md-5 text-center tab">
          <div class="chancetxt">อัตราการชนะ</div>
          <span class="showtext" style="color: khaki;" id="per'.$x.'">รอผล</span>
        </div>
      </div>
    </a>
  </div>
</div>';
$x++;
}
?>
  </div>
  </div>
  </div>
  
  
  <script>
    ez();
window.setInterval(function(){
ez();
}, 1000);
  function ez(){
	$.get( "https://newsa.zean.app/")
  .done(function( data ) {
	  
	loop = data.length;
	console.log("--0-0-0-0-0-00--0-00-0-0-");
for (i = 0; i < loop; i++) {
  //text += items[i] + "<br>";

$("#per"+i).html(data[i]['percent']+"%");

console.log(data[i]['percent']+"%");

}
 


  });
  
  $.get("ajax/heartbeat.php")
  .done(function( data ) {
  });
  
}
  </script>