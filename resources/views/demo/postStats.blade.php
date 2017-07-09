@if($post->likes->count() > 0 || $post->comments->count() > 0)
	@if($post->likes->count() == 1)
		<small>{{ $post->likes->count() }} like &bull; {{ $post->comments->count() }} replies</small>
	@else
		<small>{{ $post->likes->count() }} likes &bull; {{ $post->comments->count() }} replies</small>
	@endif
@endif