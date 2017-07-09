// global vars
var loadingIcon = "<center><img src='loading.svg' style='width: 100px; height: 100px;'></center>";
var commentLoadingIcon = "<center><img src='loading.svg' style='width: 50px; height: 50px;'></center>";
var postToDelete = 0;

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
				$("#myaccount").attr('class', 'list-group-item');
			},
			success: function(){
				$("#demo-content").html(request.responseText);
			}
		});
	});

	$("#myaccount").click(function(){
		var request = $.ajax({
			url: "/demo/myaccount",
			type: "POST",
			data: {
				_token: $("#globalcsrf").val(),
			},
			dataType: "html",
			beforeSend: function(){
				$("#demo-content").html(loadingIcon);
				$("#viewposts").attr('class', 'list-group-item');
				$("#demohomepage").attr('class', 'list-group-item');
				$("#myaccount").attr('class', 'list-group-item active');
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
				$("#myaccount").attr('class', 'list-group-item');
			},
			success: function(){
				$("#demo-content").html(request.responseText);
			}
		});
	});
});

// native javascript functions because I'm still on the process of learning ReactJS
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
	var body = $("#textarea-post").val();
	if(body.length < 1 || jQuery.trim(body).length==0){
		alert('Really? Posting with nothing? Please say something! If you\'re trying to find bugs, you\'re doing a great job!');
	}else{
		var request = $.ajax({
			url: "/demo/posts/add",
			type: "POST",
			data: {
				body: $("#textarea-post").val(),
				_token: $("#globalcsrf").val(),
			},
			dataType: "html",
			beforeSend: function(){ 
				$("#submitpost").attr('disabled', 'true');
			},
			success: function(){
				$("#textarea-post").val('');
				$("#allposts").prepend(request.responseText);
				$("#submitpost").removeAttr('disabled');
			}
		});
	}
}

function submitComment(postId){
	var body = $("#txtComment"+postId).val();
	if(body.length < 1 || jQuery.trim(body).length==0){
		alert("Replying with nothing? It's very OFFENSIVE! You'll get a lot of bashers from Peenoise because of that!");
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
			beforeSend: function(){
				$("#btnSubmitComment"+postId).attr('disabled', 'true');
			},
			success: function(){
				$("#txtComment"+postId).val('');
				$("#commentsContent"+postId).prepend(request.responseText);
				$("#btnSubmitComment"+postId).removeAttr('disabled');
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
			$("#commentsContent"+postId).html(commentLoadingIcon);
		},
		success: function(){
			$("#commentsContent"+postId).html(request.responseText);
		}
	});
}

function setPostToDelete(postId){
	postToDelete = postId;
}

function deletePost(){
	var request = $.ajax({
		url: "/demo/posts/delete",
		type: "POST",
		data: {
			postId: postToDelete,
			_token: $("#globalcsrf").val(),
		},
		dataType: "html",
		beforeSend: function(){
			// just wait you fucker
		},
		success: function(){
			$("#postelement"+postToDelete).remove();
			$("#deleteModal").modal("hide");
		}
	});
}

function toggleLike(postId){
	var request = $.ajax({
		url: "/demo/posts/togglelike",
		type: "POST",
		data: {
			postId: postId,
			_token: $("#globalcsrf").val(),
		},
		dataType: "html",
		beforeSend: function(){
			// just wait you fucker
		},
		success: function(){
			$("#postStats"+postId).html(request.responseText);
		}
	});
}