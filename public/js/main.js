// global vars
var loadingIcon = "<center><img src='loading.svg' style='width: 100px; height: 100px;'></center>";
var commentLoadingIcon = "<center><img src='loading.svg' style='width: 50px; height: 50px;'></center>";

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

	$("#login-modal").on("shown.bs.modal", function(){
		$('#login_username').focus();
	});

	$("#viewposts").click(function(){
		var request = $.ajax({
			url: "/demo/posts",
			type: "POST",
			data: {
				_token: $("#globalcsrf").val(),
			},
			dataType: "html",
			beforeSend: function(){
				$("#demo-content").html(loadingIcon);
				// history.pushState(null, null, "/demo/posts");
				$("#viewposts").attr('class', 'list-group-item active');
				$("#demohomepage").attr('class', 'list-group-item');
			},
			success: function(){
				$("#demo-content").html(request.responseText);
			}
		});
	});

	$("#demohomepage").click(function(){
		var request = $.ajax({
			url: "/demo/home",
			type: "POST",
			data: {
				_token: $("#globalcsrf").val(),
			},
			dataType: "html",
			beforeSend: function(){
				$("#demo-content").html(loadingIcon);
				$("#viewposts").attr('class', 'list-group-item');
				$("#demohomepage").attr('class', 'list-group-item active');
			},
			success: function(){
				$("#demo-content").html(request.responseText);
			}
		});
	});

	$("#submitpost").click(function(){
		
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

function submitpost(){
	if($("#textarea-post").val().length < 1){
		alert('Really? Posting with nothing? Please say something!');
	}else{
		var request = $.ajax({
			url: "/demo/posts/add",
			type: "POST",
			data: {
				body: $("#textarea-post").val(),
				_token: $("#globalcsrf").val(),
			},
			dataType: "html",
			beforeSend: function(){ },
			success: function(){
				$("#textarea-post").val('');
				alert(request.responseText);
			}
		});
	}
}

function submitComment(postId){
	if($("#txtComment"+postId).val().length < 1){
		alert("Replying with nothing? It's very OFFENSIVE!");
	}else{
		var request = $.ajax({
			url: "/demo/posts/comment/add",
			type: "POST",
			data: {
				postId: postId,
				body: $("#txtComment"+postId).val(),
				_token: $("#globalcsrf").val(),
			},
			dataType: "html",
			beforeSend: function(){ },
			success: function(){
				$("#txtComment"+postId).val('');
				$("#commentsContent").prepend(request.responseText);
			}
		});
	}
}

function loadComments(postId){
	var request = $.ajax({
		url: "/demo/posts/comment/load",
		type: "POST",
		data: {
			postId: postId,
			_token: $("#globalcsrf").val(),
		},
		dataType: "html",
		beforeSend: function(){ 
			$("#commentsContent").html(commentLoadingIcon);
		},
		success: function(){
			$("#commentsContent").html(request.responseText);
		}
	});
}