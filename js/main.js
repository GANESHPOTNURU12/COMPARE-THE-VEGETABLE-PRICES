
function login() {
 var email=$("#email").val();
 var pwd=$("#pwd").val();
	if(email!="" && pwd!="") {
		$(".error")[0].innerHTML = '<span style="color:green">Please wait...</span>';
		$.ajax({
			type:'post',
			url:'./actions/server.php', 
			data:{
				login:'login',
				email:email,
				pwd:pwd
			}, 
			success:function(response) {
				if(response=="success") {
					window.location.href="index.php";
				} else {
					$(".error")[0].innerHTML = '<span>Please enter valid details!</span>';
				}
			}
		});
	} else { 
		$(".error")[0].innerHTML = '<span>Please fill all the details!</span>';
	}
	return false;
}

function register() {
	var fullname=$("#fullname").val();
	var email=$("#email").val();
	var pwd=$("#pwd").val();
	var repwd=$("#repwd").val();
	   if(fullname!="" && email!="" && pwd!="" && repwd!="") {
		   var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
		   if (!email.match(validRegex)) {
			   $(".error")[0].innerHTML = '<span>Please enter valid email id!</span>';
			   return false;
		   }
			if(pwd != repwd) {
				$(".error")[0].innerHTML = '<span>Please match password!</span>';
				return false;
			}

		   $(".error")[0].innerHTML = '<span style="color:green">Please wait...</span>';
		   $.ajax({
			   type:'post',
			   url:'./actions/server.php', 
			   data:{
				   register:'register',
				   fullname:fullname,
				   email:email,
				   pwd:pwd
			   }, 
			   success:function(response) {
				   if(response=="success") {
					   window.location.href="index.php";
				   } else if (response=="duplicate") {
						$(".error")[0].innerHTML = '<span>User exists! Please try with another Email Id</span>';
				   }else {
					   $(".error")[0].innerHTML = '<span>Please enter valid details!</span>';
				   }
			   }
		   });
	   } else { 
		   $(".error")[0].innerHTML = '<span>Please fill all the details!</span>';
	   }
	   return false;
   }

function logout() {
	$.ajax({
		type:'post',
		url:'./actions/server.php', 
		data:{
			logout:'logout'
		},
		success:function(response) {
			window.location.href="index.php";
	   }
	});
	return false;
}