<?php 
if($_GET['room']==''){
echo "<script>window.location = './'</script>";
exit();	
}
switch($_GET['room']){
  case 1: $r = 0; break;
  case 2: $r = 1; break;
  case 3: $r = 2; break;
  case 4: $r = 3; break;
  case 5: $r = 4; break;
  case 6: $r = 5; break;
  case 7: $r = 6; break;
  case 8: $r = 7; break;
  case 9: $r = 8; break;
  case 10: $r = 9; break;
  case 11: $r = 10; break;
  case 12: $r = 11; break;
  case 13: $r = 12; break;
  case 14: $r = 13; break;
  case 15: $r = 14; break;
  case 16: $r = 15; break;
  default: $r = 0; break;
}
?>
<div class="container mt-4">
  <div class="row">
    <div class="col-sm">
      <div class="card casino-card p-5">
        <div class="row">
        <div class="col-sm text-center text-white">
            <span class="mb-2">อัตราการชนะ</span>
            <div class="card p-3 mt-3 mb-2" style="background:rgba(0, 0, 0, 0.3);">
              <h1 style="color:khaki;" id="per">0%</h1>
            </div>
          </div>
          <div class="col-sm text-center text-white">
            <span class="mb-4">ตาถัดไปแทง</span>
            <div class="card p-3 mt-3" style="background:rgba(0, 0, 0, 0.3);">
              <center>
                <img id="tang" class="animated pulse infinite" style="width:55px; height: 55px;display: none;"></img>
                <h1 id="w" style="display: none;" class="">รอสูตร</h1>
              </center>
            </div>
          </div>
        </div>
        <hr class="style mb-3 mt-4">
        <div style="overflow-x:auto;">
        <table class="table table-bordered" style="background: #f5f5f5;width: 410px; margin:0 auto;">
    <tbody>
        <?php
        
        $intRows = 0;
		$i = 0;
		$arr = [0,6,12,18,24,30,36,42,48,54,60,66
		,1,7,13,19,25,31,37,43,49,55,61,67
		,2,8,14,20,26,32,38,44,50,56,62,68
		,3,9,15,21,27,33,39,45,51,57,63,69
		,4,10,16,22,28,34,40,46,52,58,64,70
		,5,11,17,23,29,35,41,47,53,59,65,71];
        while ($i < 72) {
			if($a == 0){
				$a = 1;
			}else{
				$a = 0;
			}

		 echo '<td human-heart width="24px;" height="24px;" class="text-center" id="'.$arr[$i].'" style="background-size:contain;">';
			
            $intRows++;
            $befor = $i;
            if ($i <= 10) {
                $number = str_pad($befor, 2, '0', STR_PAD_LEFT);
            } else {
                $number = $befor;
            }
            ?>
            
            <?php
            echo "</td>";
            if (($intRows) % 12 == 0) {
                echo"</tr>";
            }
			$i++;
        }
        ?>

    </tbody>
</table>

<div class="card mt-4" style="background:rgba(0, 0, 0, 0.3); border-radius:10px;">
<div class="table-wrapper-scroll-y my-custom-scrollbar text-center" id="table_score" style="overflow-x: hidden;">
</div>
</div>
</div>
</div>
      

    </div>
    <div class="col-sm">
    <div class="card casino-card p-4 text-center">
		
		<h3 style="color: khaki"><i class="fa fa-line-chart" aria-hidden="true"></i>&nbsp;กราฟแสดงผลสถิติ</h3>
		<hr class="style mb-4 mt-2">
		
		
    <canvas id="myChart"></canvas>
    </div>
    </div>

  </div>
</div>
<script>
	
  ez();
  var bac = window.setInterval(ez, 1000);

function ez(){
	$.get( "https://newsa.zean.app/")
  .done(function( data ) {
	  
	room1_name = data[<?= $r ?>]['name'];
	room1_status = data[<?= $r ?>]['Status'];
	room1 = data[<?= $r ?>]['data'];
	
	$("#room_name").html(room1_name);
	$("#per").html(data[<?= $r ?>]['percent']+"%");
	
	
	if(room1_status == "Dealing"){
	$("#room_status").html("เปิดไพ่");
	}else if(room1_status == "Waiting"){
	$("#room_status").html("กำลังรอ");
	}else if(room1_status == "Player"){
	$("#room_status").html("ผู้เล่นชนะ");
	}else if(room1_status == "Banker"){
	$("#room_status").html("เจ้ามือชนะ");
	}else if(room1_status == "Tie"){
	$("#room_status").html("เกมเสมอ");
	}else{
	$("#room_status").html("สับไพ่");
	}
	
	
	items = room1.split(',');
	
	
	
  $.get( "fml.php?fm="+room1+"&idea=1&room="+<?= $_GET['room'] ?>)
  .done(function( data ) {
    if(data.fm === "W"){
      $("#w").show();
      $('#tang').hide();
    }else{
      $("#w").hide();
	  $("#tang").attr("src","img/"+data.fm+".png?v=5");
    $('#tang').css("display","block");
    }
	
	$("#credit").html(data.credit+" &nbsp;");
	
	if(data.refill == 1){
		Swal.fire({
  type: "error",
  title: "เครดิตหมด",
  text: "กรุณาเติมเครดิตก่อนคับ",
  confirmButtonText: "ตกลง",
  cancelButtonText: "ยกเลิก",
}).then(function() {
		window.location.href = "./";
	
	});
	
	clearInterval(bac);
	
	
  }
  
  });
	
	
	loop = items.length;
	text = "";
	var i;
	
	
for (i = 0; i < loop; i++) {
  //text += items[i] + "<br>";


  if(items[i] == "b"){
   $("#"+i).css({"background":"url(img/b.png?v=5)","background-size":"contain"});
  }else if(items[i] == "p"){
   $("#"+i).css({"background":"url(img/p.png?v=5)","background-size":"contain"});
  }else if(items[i] == "t"){
   $("#"+i).css({"background":"url(img/t.png?v=5)","background-size":"contain"});
  }else{
   
  }
//console.log(arr[x][i] +"="+items[x][i]);

    
}
	
//alert(text);

  });
	
	$.get( "ajax/getscore.php?room="+<?= $_GET['room'] ?>)
  .done(function( data ) {
	$("#table_score").html(data);
					});
	
	$.get( "ajax/chart.php?room="+<?= $_GET['room'] ?>)
  .done(function( data ) {
	
		var ctx = document.getElementById('myChart');
 var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: data.top,
        datasets: [{
            label: '',
            data: data.bottom,
            backgroundColor: 'rgba(255, 206, 86, 0.5)',
            borderColor: 'rgba(255, 206, 86, 1)',
            borderWidth: 2
        }]
    },
    options: { legend: {
        display: false
    },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        },
	animation: {
        duration: 0
    }
    }
});
		console.log(data);
 myChart.update();
		
					});
	
	
}



  
  </script>
<script>

	

	


</script>

  <style>
    .my-custom-scrollbar {
position: relative;
height: 160px;
overflow: auto;
}
.table-wrapper-scroll-y {
display: block;
}
    </style>