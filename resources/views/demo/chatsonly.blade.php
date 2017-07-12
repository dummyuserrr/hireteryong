@if(count($chats) > 0)
	@foreach($chats as $chat)
		<b class="chatsenders">
			@if($chat->user_id == 0)
				Stranger 
			@else
				{{ $chat->user->fullname }} 
			@endif
		</b><small class="chatTimes">({{ $chat->created_at->diffForHumans() }})</small>: <span>{{ $chat->body }}</span><br>
	@endforeach
@endif