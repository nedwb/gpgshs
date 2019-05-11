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

<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- start plugins -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!--font-Awesome-->
   	<link rel="stylesheet" href="fonts/css/font-awesome.min.css">
<!--font-Awesome-->
<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>
<div class="header_bg1">
<div class="container">
	<div class="row header">
		<div class="logo navbar-left">
			<h1><a>Gen. Pantaleon Garcia Senior High</a></h1>
		</div>
		<div class="h_search navbar-right">
			<form>
				<input type="text" class="text" value="Enter text here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter text here';}">
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
                @if ($user[0]->rolename != 'guest')
                    <li><a href="home">Home</a></li>
                @else
                    <li><a href="index">Home</a></li>
                @endif
                <li class="active"><a href="history">History</a></li>
                <li><a href="contact">Contact</a></li>
                <li><a href="about">About</a></li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		    <!-- start soc_icons -->
		</nav>
        <nav class="navbar navbar-default navbar-right" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
              <ul class="nav navbar-nav">
                @if ($user[0]->rolename != 'guest')
                    <li>
                        <div class="dropdown">
                          <button onclick="myFunction()" class="dropbtn">My Account</button>
                          <div id="myDropdown" class="dropdown-content">
                            @if ($user[0]->rolename == 'admin' || $user[0]->rolename == 'teacher')
                                <a href="profile_admin">View Profile</a>
                            @else
                                <a href="profile_1">View Profile</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Logout
                            </a>
                          </div>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        </form>
                    </li>
                @else
                    <li><a href="login">Login</a></li>
                @endif
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
		<div class="about details row">
			<h2 align="center">History</h2>
			<img src="images/det_pic.jpg" alt="" class="img-responsive" align="center"/>
			<p align="center" class="para">Gen. Pantaleon Garcia Senior High School (GPGSHS) was named through City Ordinance No. 02-44-A dated June 8, 2015 authored by Hon. Eunice C. Ferriol.</p>

			<p align="center" class="para">Through the effort of Hon. Alex “AA” L. Advincula, Hon. Emmanuel L. Maliksi and Dr. Lualhati O. Cadavedo, a parcel of 30,000 square meter land located at Malagasang I-G was donated for permanent location of the school with ongoing construction of fifty-two (52) classrooms.</p>

			<p align="center" class="para">The school started to operate at Imus National High School-Main as its temporary location on June 2016, with 296 students in different tracks/strands offered such as General Academic Strand (GAS), Humanities and Social Sciences (HUMSS), Computer System Servicing (CSS) NC II and Electrical Installation and Maintenance (EIM) NC II.</p>

			<p align="center" class="para">GPGSHS opened another tracks such as Electronics Product Assembly Servicing (EPAS), Sports, Technical Drafting and Accountancy and Business Management during the opening of school year 2017-2018.</p>

			<p align="center" class="para">In its first year, GPGSHS was headed by Dr. Glenda DS. Catadman as OIC-Principal with twenty-nine (29) teachers, one (1) Local School Board (LSB) clerk and ten (10) Civil Secirity Units (CSUs).</p>

			<p align="center" class="para">At present, GPGSHS is headed by Dr. Roland J. Catapat, Principal II.</p>
		</div>
	</div>
</div><!-- end main -->
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
</html>