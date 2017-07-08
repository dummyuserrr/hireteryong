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
		 <div style="background-color: none"><small class="postactions"><a class="btn btn-xs"><span class="glyphicon glyphicon-thumbs-up"></span> Like</a> &bull; <a class="btn btn-xs" data-toggle="collapse" data-target="#demo{{ $post->id }}" onclick="loadComments('{{ $post->id }}')"><span class="glyphicon glyphicon-comment"></span> Reply</a>
		 @if($post->user_id == session('id') && $post->user_id != 0)
			&bull; <a class="btn btn-xs" data-toggle="modal" data-target="#deleteModal"><span class="glyphicon glyphicon-trash"></span> Delete</a>
		 @endif
		 </small></div>
		<div id="demo{{ $post->id }}" class="collapse commentsCollapse">
			<div class="form-group">
			  <textarea class="form-control" rows="2" id="txtComment{{ $post->id }}" placeholder="Comment (Please be friendly)" class="textarea-comment" style="resize: none;"></textarea><br>
			  <button class="btn btn-xs btn-primary commentsubmit" onclick="submitComment('{{ $post->id }}')" id="btnSubmitComment{{ $post->id }}">Submit</button>
			</div>
			<h6 style="margin-top: -15px"><small>Comments</small></h6>
			<div id="commentsContent{{ $post->id }}">
				
			</div>
		</div>

		</div>
	</div>
</div>