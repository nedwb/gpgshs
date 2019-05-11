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
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

    </script>

    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

    <!--font-Awesome-->
    <link rel="stylesheet" href="fonts/css/font-awesome.min.css">
    <!--font-Awesome-->
</head>

<body>
    <div class="header_bg1">
        <div class="container">
            <div class="row header">
                <div class="logo navbar-left">
                    <h1><a>Career Advisor</a></h1>
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
                            <li class="active"><a href="advisor">Career Advisor</a></li>
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
                            <li><a href="profile_1">Profile</a></li>
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
    <div class="main_btm">
        <div class="main_bg"><!-- start main -->
    <div class="container">
        <div class="technology_1 row">
            <hr>
            <hr>
            @if (isset($suggested_career))
                @if (count($suggested_career) <= 1)
                    <h2 align="center">Here is the career strand that suits your personality and/or choices..</h2>
                @else
                    <h2 align="center">Here are the career strands that suit your personality and/or choices..</h2>
                @endif
                <br>
                <br>
                <div align="center">
                    <div class="tech_para">
                        @foreach ($suggested_career as $suggestion)
                            <p class="para">{{ $suggestion->track }} - {{ $suggestion->strand }}</p>
                        @endforeach
                    </div>
                </div>
                <div class="clearfix"></div>
                <br>
                <hr>
                <div align="center" class="read_more">
                    <a href="enrollment" class="fa-btn btn-1 btn-1e">Back to Enrollment</a>
                </div>
                <hr>
                <div class="col-md-10 tech_para">
                    <p class="para">
                        References:
                            http://www.humanmetrics.com | https://www.indeed.com/career-advice/finding-a-job/16-personality-types
                    </p>
                </div>
                <div class="clearfix"></div>
                <hr>
            @else
                <h3 align="center">There is no career suggestion as of this moment.</h3>
                <br>
            @endif
            <div class="clearfix"></div>
        </div>
    </div>
    </div>
    <div class="footer_bg">
        <!-- start footer -->
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