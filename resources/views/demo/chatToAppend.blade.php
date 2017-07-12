<b class="chatsenders">
	@if(session()->has('status'))
		{{ session('fullname') }}
	@else
		Stranger
	@endif
</b><small class="chatTimes">({{ $c->created_at->diffForHumans() }})</small>: <span>{{ $c->body }}</span><br>