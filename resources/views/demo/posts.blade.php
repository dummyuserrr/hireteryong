<div class="form-group">
	<b>Post Something</b>
	<textarea class="form-control" placeholder="Go on! Spit it out! Come on! Say it!" rows="2" id="textarea-post"></textarea><br>
	<button type="button" class="btn btn-primary btn-sm" id="submitpost" onclick="submitpost()">Submit</button>
</div>
<hr>
@if(count($posts) > 0)
	@foreach($posts as $post)
		<div class="panel">
			<div class="panel-body">
				<div class="media">
				  <div class="media-left">
				    <img src="img/profile.png" class="media-object" style="width:60px">
				  </div>
				  <div class="media-body">
				    <h5 class="media-heading">
				    @if($post->user_id == 0)
				    	Stranger
				    @else
				    	{{ $post->user->fullname }}
				    @endif
				    <small class="pull-right">{{ $post->created_at->diffForHumans() }}</small></h5>
				    <p class="posts">{{ $post->body }}</p>
				  </div>
				</div>
			</div>
		</div>
	@endforeach
@else
	<div class="panel">
		<div class="panel-body">
			No posts yet. This is sad.		
		</div>
	</div>
@endif
