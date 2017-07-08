@if($post->likes->count() > 0 || $post->comments->count() > 0)
	<small>{{ $post->likes->count() }} likes &bull; {{ $post->comments->count() }} replies</small>
@endif