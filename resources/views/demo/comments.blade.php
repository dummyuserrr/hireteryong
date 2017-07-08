@if(count($comments) < 1)
	<center><h6>No comments</h6></center>
@else
	@foreach($comments as $comment)
		<div class="media">
			<div class="media-left">
			    <img src="img/profile.png" class="media-object" style="width:20px">
			</div>
			<div class="media-body">
				<div class="media-heading">
					<small class="pull-right commentDates">{{ $comment->created_at->diffForHumans() }}</small>
					<h6 class="media-heading">
						@if($comment->user_id == 0)
							Stranger
						@else
							{{ $comment->user->fullname }}
						@endif
					</h6>
					<p class="comments">{{ $comment->body }}</p>
				</div>
			</div>
		</div>
	@endforeach
@endif
