$(document).ready(function() {
	
	window.setInterval(function(){
		
  $.get("ajax/online.php")
  .done(function( data ) {
  });

	}, 1000);
	
			$("#login").click(function() {
					var user = $("#user").val();
					var pass = $("#pass").val();
					
					var send = {"user":user, "pass":pass}

					$.ajax({
					   type: "POST",
					   url: "ajax/login.php",
					   data: send,
					   success: function(data) {
						alert(data.status,data.title,data.info,data.href);
					   }
					 });

			});
    
    $("#register").click(function() {

					$.ajax({
					   type: "POST",
					   url: "ajax/register.php",
					   data: $('#register_form').serialize(),
					   success: function(data) {
						alert(data.status,data.title,data.info,data.href);
					   }
					 });


			});





	
		});
		
	
		function alert(status,title,text,href){
			Swal.fire({
  type: status,
  title: title,
  text: text,
  confirmButtonText: "ตกลง",
  cancelButtonText: "ยกเลิก",
}).then(function() {
    // Redirect the user
	if(href === ""){

	}else{
		window.location.href = href;
	}

		});
		}


function refill(){

 $.get("ajax/refill.php?code="+$("#refill_code").val())
  .done(function( data ) {
alert(data.status,data.title,data.info,data.href);
  });

}

		
function logout(){
	Swal.fire({
  title: 'คุณแน่ใจมั้ย?',
  text: "ที่จะออกจากระบบ!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: "ตกลง",
  cancelButtonText: "ยกเลิก",
}).then((result) => {
  if (result.value) {
       $.get("ajax/logout.php")
  .done(function( data ) {
Swal.fire(
      'สำเร็จ!',
      'ออกจากระบบแล้ว',
      'success'
    ).then(function() {
    window.location.href = "./";

		});
  });

  }
})
}