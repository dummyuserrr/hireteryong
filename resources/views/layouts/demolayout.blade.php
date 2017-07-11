<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="favicon.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Hire Teryong</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Theme CSS -->
    <link href="css/freelancer.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/googlefonts2.css" rel="stylesheet" type="text/css">
    <link href="css/googlefonts" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/sticky-footer.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body id="page-top" class="index">
<div id="skipnav"><a href="#maincontent">Skip to main content</a></div>
    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="/">HIRE TERYONG</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                @if(session()->has('status'))
                    <li class="dropdown navbar-dropdown" id="profileDropdownLink">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{ session('fullname') }}
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu" id="profileDropdown">
                          <li><a id="linkLogout" href="#" onclick="logout('{{ md5(session('username')) }}')">Logout</a></li>
                        </ul>
                    </li>
                @else
                    <li>
                        <a href="#" data-toggle="modal" data-target="#login-modal"><span class="glyphicon glyphicon-user"></span> Login or Register</a>
                    </li>
                @endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    @yield('content')

    <!-- jQuery -->
    <script src="js/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="css/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/freelancer.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="loginmodal/loginmodal.js"></script>
    <script type="text/javascript" src="js/validator.min.js"></script>
    <input type="hidden" id="globalcsrf" value="{{ csrf_token() }}">
</body>
<footer class="text-center footer">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Location</h3>
                        <p>Secret (to be provided
                        upon <br>request to avoid assassins)</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>SOCIAL MEDIA ACCOUNTS</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="https://www.facebook.com/dthrcrpz" class="btn-social btn-outline"><span class="sr-only">Facebook</span><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="https://twitter.com/dummyuserrr" class="btn-social btn-outline"><span class="sr-only">Twitter</span><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="https://linkedin.com/in/dthrcrpz" class="btn-social btn-outline"><span class="sr-only">Linked In</span><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>About Me (Again)</h3>
                        <p>*Insert cool stuffs here
                        <br>
                        (don't know what to put)
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; Hire Teryong 2017
                    </div>
                </div>
            </div>
        </div>
</footer>
</html>
