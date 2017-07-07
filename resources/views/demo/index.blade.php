@extends('layouts.mainlayout')

@section('title')
	Demo
@stop

@section('content')
	<div class="container" style="margin-top: 120px">
		<div class="row">
			<div class="col-sm-3">
				<div class="panel panel-primary">
					<div class="panel-heading">
						What do you want to do?
					</div>
					<div class="panel-body">
						<div class="list-group">
							<a href="#" class="list-group-item active">Demo Homepage</a>
							<a href="#" class="list-group-item">Second item</a>
							<a href="#" class="list-group-item">Third item</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-9">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong>Hi <font style="color:#ff0000">Stranger</font>, welcome to Demo. <a href="#">CLICK HERE TO LOGIN</a> if you want.</strong>
					</div>
					<div class="panel-body demo-content">
						<h4>NOTES</h4>
						<ul>
							<li>I just built some simple social media functions. This site is boring because its purpose is JUST TO DEMONSTRATE my web development skills.</li>
							<li>This website is open-source. You can view its entire source code from my GitHub Repository (<a href="https://github.com/dummyuserrr/hireteryong">https://github.com/dummyuserrr/hireteryong</a>). Yeah, you can copy my codes. I made them as readable as I can.</li>
							<li>To other developers who are much better, feel free to fork it and make a pull request.</li>
							<li>For feedbacks and violent reactions, email me at <b>dthrcrpz@gmail.com</b></li>
						</ul>
						<h4>Here are the ordinary functions of this demo</h4>
						<ul>
							<li>
								<b>USER AUTHENTICATION</b> - If you're logged in, the word <strong>STRANGER</strong> on this panel heading will be replaced by your name. The <b>LOGIN</b> buttons will also be replaced by <b>LOGOUT</b>.</li>
							<li>
								<b>REGISTRATION</b> - Well, it's obvious. You should also activate your account by clicking the link attached on the email</li>
							</li>
							<li>
								<b>EMAIL/EMAIL VERIFICATION</b> - After registration, an email will be sent to the email you provided. Just make sure that it's correct.
							</li>
							<li>
								<b>ADD A POST</b> - You can post anything. If you posted while logged in, your name will be shown. Otherwise, your name will be labeled as <b>STRANGER</b>.
							</li>
							<li>
								<b>FILE UPLOAD</b> - You can upload your profile picture. 
							</li>
							<li>
								<b>EDIT PROFILE/POST</b> - This is very self-explanatory.
							</li>
							<li>
								<b>DELETE POST</b> - You can delete your post or your comment if you're logged in. And it's NOT actually deleted. It will just be archived.
							</li>
							<li>
								<b>SEARCH/VIEW</b> - Fetching data.
							</li>
						</ul>
						<h4>Here are the features (advanced functions) of this demo</h4>
						<ul>
							<li>
								<b>AJAX</b> - I believe that this function is what makes websites cool. The page will not reload when making an <b>SOME</b> action (e.g. post, delete, etc)
							</li>
							<li>
								<b>CHAT</b> - Yeah, I added a public chat on this website. Please behave. 
							</li>
							<li>
								<b>COMMENT</b> - Users can comment on posts.
							</li>
							<li>
								<b>REACTIONS</b> - Users can react (like, sad, love, haha, angry) to posts.
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop