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
<!-- start slider -->
<link href="css/slider.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/modernizr.custom.28468.js"></script>
<script type="text/javascript" src="js/jquery.cslider.js"></script>
    <script type="text/javascript">
            $(function() {

                $('#da-slider').cslider({
                    autoplay : true,
                    bgincrement : 450
                });
            });
        </script>
<!-- Owl Carousel Assets -->
<link href="css/owl.carousel.css" rel="stylesheet">
<script src="js/owl.carousel.js"></script>
        <script>
            $(document).ready(function() {

                $("#owl-demo").owlCarousel({
                    items : 4,
                    lazyLoad : true,
                    autoPlay : true,
                    navigation : true,
                    navigationText : ["", ""],
                    rewindNav : false,
                    scrollPerPage : false,
                    pagination : false,
                    paginationNumbers : false,
                });

            });
        </script>  
        <!-- //Owl Carousel Assets -->
<!--font-Awesome-->
    <link rel="stylesheet" href="fonts/css/font-awesome.min.css">
<!--font-Awesome-->
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
                @if ($user[0]->rolename == 'admin' || $user[0]->rolename == 'teacher')
                    <a href="profile_admin" type="button" class="btn btn-primary">Setup Profile</a>
                @else
                    <a href="profile_1" type="button" class="btn btn-primary">Setup Profile</a>
                @endif
              </div>
            </div>
        </div>
    </div>
    <!-- Modal-->
    @endif

<div class="header_bg">
<div class="container">
    <div class="row header">
        <div class="logo navbar-left">
            <h1><a>Gen. Pantaleon Garcia Senior High</a></h1>
        </div>
        <div class="h_search navbar-right">
            <form action="https://www.google.com/search" class="searchform" method="get" name="searchform" target="_blank">
                <input name="q" autocomplete="on" type="text" class="text" value="Search the google.com" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search the google.com';}">
                <input type="submit" value="search">
            </form>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
</div>
<div class="container">
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
                    <li class="active"><a href="home">Home</a></li>
                @else
                    <li class="active"><a href="index">Home</a></li>
                @endif
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
                @if ($user[0]->rolename == 'admin')
                    <li>
                        <div class="dropdown">
                          <button onclick="myFunction()" class="dropbtn">Administrator</button>
                          <div id="myDropdown" class="dropdown-content">
                                <a href="admin">Search Enrollments</a>
                                <a href="admin_2">Search Users</a>
                                <a href="admin_3">Content Management</a>
                          </div>
                        </div>
                    </li>
                @elseif ($user[0]->rolename == 'teacher')
                    <li>
                        <div class="dropdown">
                          <button onclick="myFunction()" class="dropbtn">Teacher</button>
                          <div id="myDropdown" class="dropdown-content">
                                <a href="admin">Search Enrollments</a>
                          </div>
                        </div>
                    </li>
                @endif
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
</div>
<div class="slider_bg"><!-- start slider -->
    <div class="container">
        <div id="da-slider" class="da-slider text-center">
            <div class="da-slide">
                <h2>enrollment portal</h2>
                <p><span class="hide_text"> This system aims to help learners decide which career track/strand to enroll, at the same time providing an online enrollment facility for the learners to enroll anytime and anywhere.</span></p>
                <h3 class="da-link"><a href="enrollment" class="fa-btn btn-1 btn-1e">Enroll Now!</a></h3>
            </div>
            <div class="da-slide">
                <h2>your personality</h2>
                <p>Know your personality type by taking this test today!<span class="hide_text"> Your personality type will be useful in determining the career track/strand that suits you.</span></p>                    
                <input type="text" id="qset" name="qset" value="ei" hidden>
                <h3 class="da-link">
                    <a href="personality" class="fa-btn btn-1 btn-1e">Check Personality</a>
                </h3>
            </div>
            <div class="da-slide">
                <h2>career & school lookup</h2>
                <p><br><br><span class="hide_text">Search a career track and see which school offers the track.</span></p>
                <h3 class="da-link"><a href="lookup" class="fa-btn btn-1 btn-1e">Search Now</a></h3>
            </div>
       </div>
    </div>
</div><!-- end slider -->
<div class="main_bg"><!-- start main -->
    <div class="container">
        <div class="main row">
            @if (isset($career_tracks) && count($career_tracks) > 0)
            @foreach($career_tracks as $track)
            <div class="col-md-3 images_1_of_4 text-center">
                <span class="bg">
                    <i 
                    @if ($track->id == '1') class="fa fa-book"
                    @elseif ($track->id == '2') class="fa fa-laptop"
                    @elseif ($track->id == '3') class="fa fa-dribbble"
                    @elseif ($track->id == '4') class="fa fa-pencil"
                    @endif
                    >
                    </i></span>
                <h4><a>{{ $track->name }}</a></h4>
                <p class="para">{{ $track->description }}</p>
                <a 
                    @if ($track->id == '1') href="academic"
                    @elseif ($track->id == '2') href="tvl"
                    @elseif ($track->id == '3') href="sports"
                    @elseif ($track->id == '4') href="arts"
                    @endif
                    class="fa-btn btn-1 btn-1e">read more</a>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div><!-- end main -->
<div class="main_btm"><!-- start main_btm -->
    <div class="container">
        <div class="main row">
            <div class="col-md-6 content_left">
                <img src="images/pic1.jpg" alt="" class="img-responsive">
            </div>
            <div class="col-md-6 content_right">
                <h4>The <span>General Pantaleon Garcia Senior High School </span> is a public senior high school in Imus City, Cavite.</h4>
                <p class="para">The school was named through City Ordinance No. 02-44-A dated June 8, 2015 and initially started operations at Imus National High School as its temporary location last June 2016. Now, the school operates at its permanent location in Malagasang 1-G and offering various tracks and strands pursuant to DepEd's K-12 senior high school education. The school hopes to open more tracks and strands to better serve the "Batang Imuseños" with quality education.</p>
                <a href="history" class="fa-btn btn-1 btn-1e">read more history</a>
            </div>
        </div>
    <!----start-img-cursual---->
        <div id="owl-demo" class="owl-carousel text-center">
            <div class="item">
                <div class="cau_left">
                    <img class="lazyOwl" data-src="images/c1.jpg" alt="Lazy Owl Image">
                </div>
                <div class="cau_left">
                    <h4><a>principal's corner</a></h4>
                    <p>
                        This is just a additional feature that will be available for the version 2.0 of this system.
                    </p>
                </div>
            </div>
            <div class="item">
                <div class="cau_left">
                    <img class="lazyOwl" data-src="images/c2.jpg" alt="Lazy Owl Image">
                </div>
                <div class="cau_left">
                    <h4><a>news</a></h4>
                    <p>
                        This is just a additional feature that will be available for the version 2.0 of this system.
                    </p>
                </div>
            </div>
            <div class="item">
                <div class="cau_left">
                    <img class="lazyOwl" data-src="images/c3.jpg" alt="Lazy Owl Image">
                </div>
                <div class="cau_left">
                    <h4><a>events</a></h4>
                    <p>
                        This is just a additional feature that will be available for the version 2.0 of this system.
                    </p>
                </div>
            </div>
            <div class="item">
                <div class="cau_left">
                    <img class="lazyOwl" data-src="images/c5.jpg" alt="Lazy Owl Image">
                </div>
                <div class="cau_left">
                    <h4><a>learner's corner</a></h4>
                    <p>
                        This is just a additional feature that will be available for the version 2.0 of this system.
                    </p>
                </div>
            </div>
            <div class="item">
                <div class="cau_left">
                    <img class="lazyOwl" data-src="images/c4.jpg" alt="Lazy Owl Image">
                </div>
                <div class="cau_left">
                    <h4><a>memos</a></h4>
                    <p>
                        This is just a additional feature that will be available for the version 2.0 of this system.
                    </p>
                </div>
            </div>
            <div class="item">
                <div class="cau_left">
                    <img class="lazyOwl" data-src="images/c1.jpg" alt="Lazy Owl Image">
                </div>
                <div class="cau_left">
                    <h4><a>principal's corner</a></h4>
                    <p>
                        This is just a additional feature that will be available for the version 2.0 of this system.
                    </p>
                </div>
            </div>
            <div class="item">
                <div class="cau_left">
                    <img class="lazyOwl" data-src="images/c2.jpg" alt="Lazy Owl Image">
                </div>
                <div class="cau_left">
                    <h4><a>news</a></h4>
                    <p>
                        This is just a additional feature that will be available for the version 2.0 of this system.
                    </p>
                </div>
            </div>
            <div class="item">
                <div class="cau_left">
                    <img class="lazyOwl" data-src="images/c3.jpg" alt="Lazy Owl Image">
                </div>
                <div class="cau_left">
                    <h4><a>events</a></h4>
                    <p>
                        This is just a additional feature that will be available for the version 2.0 of this system.
                    </p>
                </div>
            </div>
            <div class="item">
                <div class="cau_left">
                    <img class="lazyOwl" data-src="images/c5.jpg" alt="Lazy Owl Image">
                </div>
                <div class="cau_left">
                    <h4><a>learner's corner</a></h4>
                    <p>
                        This is just a additional feature that will be available for the version 2.0 of this system.
                    </p>
                </div>
            </div>
            <div class="item">
                <div class="cau_left">
                    <img class="lazyOwl" data-src="images/c4.jpg" alt="Lazy Owl Image">
                </div>
                <div class="cau_left">
                    <h4><a>memos</a></h4>
                    <p>
                        This is just a additional feature that will be available for the version 2.0 of this system.
                    </p>
                </div>
            </div>
            <div class="item">
                <div class="cau_left">
                    <img class="lazyOwl" data-src="images/c1.jpg" alt="Lazy Owl Image">
                </div>
                <div class="cau_left">
                    <h4><a>principal's corner</a></h4>
                    <p>
                        This is just a additional feature that will be available for the version 2.0 of this system.
                    </p>
                </div>
            </div>
            <div class="item">
                <div class="cau_left">
                    <img class="lazyOwl" data-src="images/c2.jpg" alt="Lazy Owl Image">
                </div>
                <div class="cau_left">
                    <h4><a>news</a></h4>
                    <p>
                        This is just a additional feature that will be available for the version 2.0 of this system.
                    </p>
                </div>
            </div>
            <div class="item">
                <div class="cau_left">
                    <img class="lazyOwl" data-src="images/c3.jpg" alt="Lazy Owl Image">
                </div>
                <div class="cau_left">
                    <h4><a>events</a></h4>
                    <p>
                        This is just a additional feature that will be available for the version 2.0 of this system.
                    </p>
                </div>
            </div>
            <div class="item">
                <div class="cau_left">
                    <img class="lazyOwl" data-src="images/c5.jpg" alt="Lazy Owl Image">
                </div>
                <div class="cau_left">
                    <h4><a>learner's corner</a></h4>
                    <p>
                        This is just a additional feature that will be available for the version 2.0 of this system.
                    </p>
                </div>
            </div>
            <div class="item">
                <div class="cau_left">
                    <img class="lazyOwl" data-src="images/c4.jpg" alt="Lazy Owl Image">
                </div>
                <div class="cau_left">
                    <h4><a>memos</a></h4>
                    <p>
                        This is just a additional feature that will be available for the version 2.0 of this system.
                    </p>
                </div>
            </div>
            <div class="item">
                <div class="cau_left">
                    <img class="lazyOwl" data-src="images/c1.jpg" alt="Lazy Owl Image">
                </div>
                <div class="cau_left">
                    <h4><a>principal's corner</a></h4>
                    <p>
                        This is just a additional feature that will be available for the version 2.0 of this system.
                    </p>
                </div>
            </div>
            <div class="item">
                <div class="cau_left">
                    <img class="lazyOwl" data-src="images/c2.jpg" alt="Lazy Owl Image">
                </div>
                <div class="cau_left">
                    <h4><a>news</a></h4>
                    <p>
                        This is just a additional feature that will be available for the version 2.0 of this system.
                    </p>
                </div>
            </div>
            <div class="item">
                <div class="cau_left">
                    <img class="lazyOwl" data-src="images/c3.jpg" alt="Lazy Owl Image">
                </div>
                <div class="cau_left">
                    <h4><a>events</a></h4>
                    <p>
                        This is just a additional feature that will be available for the version 2.0 of this system.
                    </p>
                </div>
            </div>
            <div class="item">
                <div class="cau_left">
                    <img class="lazyOwl" data-src="images/c5.jpg" alt="Lazy Owl Image">
                </div>
                <div class="cau_left">
                    <h4><a>learner's corner</a></h4>
                    <p>
                        This is just a additional feature that will be available for the version 2.0 of this system.
                    </p>
                </div>
            </div>
            <div class="item">
                <div class="cau_left">
                    <img class="lazyOwl" data-src="images/c4.jpg" alt="Lazy Owl Image">
                </div>
                <div class="cau_left">
                    <h4><a>memos</a></h4>
                    <p>
                        This is just a additional feature that will be available for the version 2.0 of this system.
                    </p>
                </div>
            </div>
            <div class="item">
                <div class="cau_left">
                    <img class="lazyOwl" data-src="images/c1.jpg" alt="Lazy Owl Image">
                </div>
                <div class="cau_left">
                    <h4><a>principal's corner</a></h4>
                    <p>
                        This is just a additional feature that will be available for the version 2.0 of this system.
                    </p>
                </div>
            </div>
            <div class="item">
                <div class="cau_left">
                    <img class="lazyOwl" data-src="images/c2.jpg" alt="Lazy Owl Image">
                </div>
                <div class="cau_left">
                    <h4><a>news</a></h4>
                    <p>
                        This is just a additional feature that will be available for the version 2.0 of this system.
                    </p>
                </div>
            </div>
            <div class="item">
                <div class="cau_left">
                    <img class="lazyOwl" data-src="images/c3.jpg" alt="Lazy Owl Image">
                </div>
                <div class="cau_left">
                    <h4><a>events</a></h4>
                    <p>
                        This is just a additional feature that will be available for the version 2.0 of this system.
                    </p>
                </div>
            </div>
            <div class="item">
                <div class="cau_left">
                    <img class="lazyOwl" data-src="images/c5.jpg" alt="Lazy Owl Image">
                </div>
                <div class="cau_left">
                    <h4><a>learner's corner</a></h4>
                    <p>
                        This is just a additional feature that will be available for the version 2.0 of this system.
                    </p>
                </div>
            </div>
            <div class="item">
                <div class="cau_left">
                    <img class="lazyOwl" data-src="images/c4.jpg" alt="Lazy Owl Image">
                </div>
                <div class="cau_left">
                    <h4><a>memos</a></h4>
                    <p>
                        This is just a additional feature that will be available for the version 2.0 of this system.
                    </p>
                </div>
            </div>
            <div class="item">
                <div class="cau_left">
                    <img class="lazyOwl" data-src="images/c1.jpg" alt="Lazy Owl Image">
                </div>
                <div class="cau_left">
                    <h4><a>principal's corner</a></h4>
                    <p>
                        This is just a additional feature that will be available for the version 2.0 of this system.
                    </p>
                </div>
            </div>
            <div class="item">
                <div class="cau_left">
                    <img class="lazyOwl" data-src="images/c2.jpg" alt="Lazy Owl Image">
                </div>
                <div class="cau_left">
                    <h4><a>news</a></h4>
                    <p>
                        This is just a additional feature that will be available for the version 2.0 of this system.
                    </p>
                </div>
            </div>
            <div class="item">
                <div class="cau_left">
                    <img class="lazyOwl" data-src="images/c3.jpg" alt="Lazy Owl Image">
                </div>
                <div class="cau_left">
                    <h4><a>events</a></h4>
                    <p>
                        This is just a additional feature that will be available for the version 2.0 of this system.
                    </p>
                </div>
            </div>
            <div class="item">
                <div class="cau_left">
                    <img class="lazyOwl" data-src="images/c5.jpg" alt="Lazy Owl Image">
                </div>
                <div class="cau_left">
                    <h4><a>learner's corner</a></h4>
                    <p>
                        This is just a additional feature that will be available for the version 2.0 of this system.
                    </p>
                </div>
            </div>
            <div class="item">
                <div class="cau_left">
                    <img class="lazyOwl" data-src="images/c4.jpg" alt="Lazy Owl Image">
                </div>
                <div class="cau_left">
                    <h4><a>memos</a></h4>
                    <p>
                        This is just a additional feature that will be available for the version 2.0 of this system.
                    </p>
                </div>
            </div>
        </div>
        <!----//End-img-cursual---->
    </div>
</div>
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

<script>
    $(document).ready(function(){
        $('#myModal').modal('show');
        $("#myModal").on('hide.bs.modal', function () {  
            return false
        });
    });
</script>