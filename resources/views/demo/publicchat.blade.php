<div id="publicChatContent">
	@foreach($chats as $chat)
		<b class="chatsenders">
			@if($chat->user_id == 0)
				Stranger 
			@else
				{{ $chat->user->fullname }} 
			@endif
		</b><small class="chatTimes">({{ $chat->created_at->diffForHumans() }})</small>: <span>{{ $chat->body }}</span><br>
	@endforeach
</div>
<div id="publicChatFooter">
	<form method="post" id="frmPublicChat">
		{{ csrf_field() }}
	  <div class="input-group">
	    <input type="text" class="form-control" placeholder="Type your message here" name="message" id="chatBody">
	    <div class="input-group-btn">
	      <button class="btn btn-primary" type="submit" id="btnSubmitChat">
	        <i class="glyphicon glyphicon-share-alt"></i> Send
	      </button>
	    </div>
	  </div>
	</form>
</div>
<script type="text/javascript" src="js/publicchat.js"></script>