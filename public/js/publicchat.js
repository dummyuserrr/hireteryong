$(document).ready(function (e) {
	$("#frmPublicChat").on('submit',(function(e) {
		e.preventDefault();
		// var request = $.ajax({
		// 	url: "/demo/myaccount/edit/save",
		// 	type: "POST",
		// 	data: new FormData(this),
		// 	contentType: false,
		// 	cache: false,
		// 	processData:false,
		// 	beforeSend: function(data){
		// 		$("#btnUpdateProfileSave").attr('disabled', true);
		// 	},
		// 	success: function(data){
		// 		$("#demo-content").html(request.responseText);
		// 		$("#btnUpdateProfileSave").removeAttr('disabled');
		// 	},
		// 	error: function(data){
		// 		var errors = "";
		// 		for(datos in data.responseJSON){
		// 			errors += data.responseJSON[datos]+'<br>';
		// 		}
		// 		$("#editAccountErrors").html('<font style="color:red">'+errors+'<br></font>');
		// 		$("#btnUpdateProfileSave").removeAttr('disabled');
		// 	}
		// });
		alert('This feature is under construction and will be available soon');
	}));
});