@extends('layouts.demolayout')

@section('title')
	Demo Homepage
@stop

@section('content')
	<div class="container" style="margin-top: 120px">
		<div class="row">
			<div class="col-sm-12">
				@include('layouts.errors')				
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3">
				<div class="panel panel-default">
					<div class="panel-heading">
						Where do you want to go?
					</div>
					<div class="panel-body">
						<div class="list-group">
							<a href="#home" class="list-group-item active" id="demohomepage">Demo Homepage</a>
							<a href="#posts" class="list-group-item" id="viewposts">View Posts</a>
							<a href="#my_account" class="list-group-item" id="myaccount">My Account</a>
							<a href="#public_chat" class="list-group-item" id="publicchat">Public Chat (finished but not optimized)</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-9">
				<div class="panel panel-default" id="demopanel">
					<div class="panel-heading">
						@if(session()->has('status'))
							<font class="pull-right">
								<small>Account Status:</small>
								@if(session('verificationstatus') == 'unverified')
									<span style="color: red; text-transform: uppercase;">{{ session('verificationstatus') }}</span>
								@else
									<span style="color: green; text-transform: uppercase;">{{ session('verificationstatus') }}</span>
								@endif
							</font>
						@endif
						@if(session()->has('status'))
							<strong>Hi <font style="color:#ff0000; text-transform: uppercase;">{{ session('fullname')}}</font>, welcome to this demo.</strong>
						@else
							<strong>Hi <font style="color:#ff0000">Stranger</font>, welcome to this demo. <a href="#" data-toggle="modal" data-target="#login-modal">CLICK HERE TO LOGIN OR REGISTER</a> if you want.</strong>
						@endif
					</div>
					<div class="panel-body" id="demo-content">
						@include('demo.demohomepage')
					</div>
				</div>
			</div>
		</div>
	</div>
	@if(!session()->has('status'))
		@include('demo.authenticationmodal')
	@endif
@stop