    <!-- BEGIN # MODAL LOGIN -->
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" align="center">
                <h4>Authentication</h4>
				</div>
                
                <!-- Begin # DIV Form -->
                <div id="div-forms">
                    <!-- Begin # Login Form -->
                    <form id="login-form">
		                <div class="modal-body">
				    		<input id="login_username" class="form-control" type="text" placeholder="Username or Email" name="username" required><br>
				    		<input id="login_password" class="form-control" type="password" placeholder="Password" name="password" required>
                            <span id="loginMessage"></span>
        		    	</div>
				        <div class="modal-footer">
                            <div>
                                <button type="button" class="btn btn-primary btn-lg btn-block" id="btnLogin">Login</button>
                            </div>
				    	    <center>
                                <a id="login_lost_btn" type="button" class="btn btn-link">Forgot Password</a>|
                                <a id="login_register_btn" type="button" class="btn btn-link">Register</a>
                            </center>
				        </div>
                    </form>
                    <!-- End # Login Form -->
                    
                    <!-- Begin | Lost Password Form -->
                    <form id="lost-form" style="display:none;" method="post">
                        {{ csrf_field() }}
    	    		    <div class="modal-body">
		    				<h5>Type your email</h5>
		    				<input id="lost_email" class="form-control" type="text" placeholder="johndoe@email.com)" name="email">
                            <span id="lost-password-message"></span>
            			</div>
		    		    <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block" id="btnSendPasswordResetLink">Send</button>
                            </div>
                            <center>
                                <a id="lost_login_btn" type="button" class="btn btn-link">Log In</a>|
                                <a id="lost_register_btn" type="button" class="btn btn-link">Register</a>
                            </center><br>
		    		    </div>
                    </form>
                    <!-- End | Lost Password Form -->
                    
                    <!-- Begin | Register Form -->
                    <form id="register-form" style="display:none;" method="post" action="/demo/register">
                        {{ csrf_field() }}
            		    <div class="modal-body">
		    				<center><h5>CREATE AN ACCOUNT</h5></center>
                            <div class="form-group">
                                <input id="register_fullname" class="form-control" type="text" placeholder="Fullname" name="fullname" required><br>
                                <input id="register_email" class="form-control" type="email" placeholder="Email" name="email" required><br>
                                <input id="register_username" class="form-control" type="text" placeholder="Username" name="username" required><br>
                                <input id="register_password" class="form-control" type="password" placeholder="Password (UpperCase, LowerCase, Number/SpecialChar and min 8 Chars)" name="password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required><br>
                                <input id="register_password2" class="form-control" type="password" placeholder="Re-enter Password" name="password2" required>
                            </div>
            			</div>
		    		    <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
                            </div>
                            <center>
                                <a id="register_login_btn" type="button" class="btn btn-link">Log In</a>|
                                <a id="register_lost_btn" type="button" class="btn btn-link">Forgot Password?</a>
                            </center>
		    		    </div>
                    </form>
                    <!-- End | Register Form -->
                    
                </div>
                <!-- End # DIV Form -->
                
			</div>
		</div>
	</div>
    <!-- END # MODAL LOGIN -->
