// jqueries

$(document).ready(function(){
	$("#btnLogin").click(function(){
		login();
	});

	$("#login_username").keypress(function(e) {
    	if(e.which == 13) {
        	login();
    	}
	});

	$("#login_password").keypress(function(e) {
    	if(e.which == 13) {
        	login();
    	}
	});
});

// native javascript functions

function logout(usernameMD5){
	var request = $.ajax({
		url: "/demo/logout",
		type: "POST",
		data: {
			username: usernameMD5,
			_token: $("#globalcsrf").val(),
		},
		dataType: "html",
		beforeSend: function(){ },
		success: function(){
			window.location.assign('/demo');
		}
	});
}

function login(){
	var username = $("#login_username").val();
	var password = $("#login_password").val();
	var request = $.ajax({
		url: "/demo/login",
		type: "POST",
		data: {
			username: username,
			password: password,
			_token: $("#globalcsrf").val(),
		},
		dataType: "html",
		beforeSend: function(){
			$("#btnLogin").attr('disabled', 'true');
		},
		success: function(){
			$("#btnLogin").removeAttr('disabled');
			if(request.responseText == 'failed'){
				$("#loginMessage").html("<br><div class='alert alert-danger'><center>Invalid Username or Password</center></div>");
			}else{
				window.location.assign(request.responseText);
			}
		}
	});
}