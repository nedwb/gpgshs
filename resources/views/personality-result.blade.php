<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Enrollment System</title>
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!--[if lt IE 9]>
     <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
     <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- start plugins -->
<!--font-Awesome-->
   	<link rel="stylesheet" href="fonts/css/font-awesome.min.css">
<!--font-Awesome-->
<link rel="stylesheet" type="text/css" href="css/util.css">
<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>
	@if (! isset($user_details))
    <!-- Modal-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <p class="heading lead">Help Guide</p>
              </div>
                <div class="modal-body">
                    <div class="text-center">
                        <p>You do not have a profile on our records. Please complete the profile page before proceeding.</p>
                    </div>
                </div>
              <div class="modal-footer">
                <a href="profile_1" type="button" class="btn btn-primary">Setup Profile</a>
              </div>
            </div>
        </div>
    </div>
    <!-- Modal-->
    @endif

<div class="header_bg1">
<div class="container">
	<div class="row header">
		<div class="logo navbar-left">
			<h1><a>Learner's Personality</a></h1>
		</div>
		<div class="h_search navbar-right">
            <form action="https://www.google.com/search" class="searchform" method="get" name="searchform" target="_blank">
                <input name="q" autocomplete="on" type="text" class="text" value="Search the google.com" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search the google.com';}">
                <input type="submit" value="search">
            </form>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="row h_menu">
		<nav class="navbar navbar-default navbar-left" role="navigation">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		    </div>
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li><a href="home">Home</a></li>
                <li class="active"><a href="personality">Personality</a></li>
                <li><a href="contact">Contact</a></li>
                <li><a href="about">About</a></li>
              </ul>
		    </div><!-- /.navbar-collapse -->
		    <!-- start soc_icons -->
		</nav>
        <nav class="navbar navbar-default navbar-right" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                </li>
              </ul>
            </div><!-- /.navbar-collapse -->
            <!-- start soc_icons -->
        </nav>
	</div>
	<div class="clearfix"></div>
</div>
</div>
<div class="main_bg"><!-- start main -->
	<div class="container">
		<div class="technology_1 row">
			<hr>
			<hr>
			@if (isset($mbti_details) && count($mbti_details) > 0)
				<h2 align="center">Your personality type is {{ $mbti_details[0]->personality_type }}!</h2>
				<div class="col-md-10 tech_para">
					<br>
					<br>
					<p class="para">MBTI Type: {{ $mbti_details[0]->short_desc }}</p>
					<br>
					<p class="para">MBTI Type Explanation: Your Myers-Briggs Personality Type derived from the personality test you've taken is {{ $mbti_details[0]->personality_type }}. {{ $mbti_details[0]->long_desc }}</p>
				</div>
				<div class="clearfix"></div>
				<br>
				<br>
				<div align="center" class="read_more">
                    <a href="home" class="fa-btn btn-1 btn-1e">Back to Home</a>
                </div>
				<br>
			@else
				<h3 align="center">No personality type details found!</h3>
				<br>
				<form method="POST" name="pform" action="{{ route('personality-test') }}">
					{{ csrf_field() }}
					<div class="col-md-12 tech_para" align="center">
						<br>
						<input type="text" id="qset" name="qset" value="ei" hidden>
						<p class="txt6">Would you like to know your personality type? Click  <u><a href="personality-test" class="txt2" onclick="pform.submit(); return false;"">here to take the personality test</a> </u> and determine yours now.</p>
					</div>
				</form>
				<br>
			@endif
			<div class="clearfix"></div>
		</div>

	</div>
</div><!-- end main -->
<br>
<br>
<br>
<div class="footer_bg"><!-- start footer -->
	<div class="container">
		<div class="row  footer">
			<div class="copy text-center">
				<p class="link"><span>&#169; All rights reserved | Design by&nbsp;<a href="http://w3layouts.com/"> W3Layouts</a></span></p>
			</div>
		</div>
	</div>
</div>
</body>

<!--================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- jQuery first, then Bootstrap JS. -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</html>

<script>
    $(document).ready(function(){
        $('#myModal').modal('show');
        $("#myModal").on('hide.bs.modal', function () {  
            return false
        });
    });
</script>