<div class="media">
	<div class="media-left">
	    <img src="img/profile.png" class="media-object" style="width:20px">
	</div>
	<div class="media-body">
		<div class="media-heading">
			<small class="pull-right commentDates">{{ $c->created_at }}</small>
			<h6 class="media-heading">
				@if($c->user_id == 0)
					Stranger
				@else
					{{ $c->user->fullname }}
				@endif
			</h6>
			<p class="comments">{{ $c->body }}</p>
		</div>
	</div>
</div>