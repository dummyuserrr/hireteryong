$(document).ready(function (e) {
	$("#frmPublicChat").on('submit',(function(e) {
		e.preventDefault();
		var request = $.ajax({
			url: "/demo/publicchat/send",
			type: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			beforeSend: function(data){
				$("#btnSubmitChat").attr('disabled', true);
			},
			success: function(data){
				$("#publicChatContent").append(request.responseText);
				$("#btnSubmitChat").removeAttr('disabled');
				$('#publicChatContent').scrollTop($('#publicChatContent')[0].scrollHeight);
				$("#chatBody").val('');
			},
			error: function(data){
				var errors = "";
				for(datos in data.responseJSON){
					errors += data.responseJSON[datos]+' ';
				}
				alert(errors);
				$("#btnSubmitChat").removeAttr('disabled');
			}
		});
	}));

	$("#publicChatContent").animate({ scrollTop: $(document).height() }, "slow");
});