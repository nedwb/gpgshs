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
    <!-- start plugins -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!--font-Awesome-->
    <link rel="stylesheet" href="fonts/css/font-awesome.min.css">
    <!--font-Awesome-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 
</head>

<body>
    <div class="header_bg1">
        <div class="container">
            <div class="row header">
                <div class="logo navbar-left">
                    <h1><a>Learner's Profile</a></h1>
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
                            <li class="active"><a href="profile_1">Profile</a></li>
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
        <!-- start main_btm -->
        <div class="container">
            <form method="POST" action="{{ route('profile_3.save') }}">
                {{ csrf_field() }}
                <hr>
                <hr>
                <div class="main row">
                    <div class="col-md-4 company_ad">
                        <h2>Health Profile</h2>
                        <p>Your <b><u>safety and well being</u></b> is important to the school.<br><br>All details entered in this section will be treated with high confidentiality and will only be used as when necessary.<br><br></p>
                        <br>

                        <!-- This is displaying errors and messages to the user. -->
                        @if (count($errors) > 0 && ($errors->has('height') || $errors->has('weight') || $errors->has('disabilities') || $errors->has('chronic_illness') || $errors->has('remarks')))
                        <div class="alert alert-danger">
                            <ul>
                                <li>{{ $errors->first('height') }}</li>
                                <li>{{ $errors->first('weight') }}</li>
                                <li>{{ $errors->first('disabilities') }}</li>
                                <li>{{ $errors->first('chronic_illness') }}</li>
                                <li>{{ $errors->first('remarks') }}</li>
                            </ul>
                        </div>
                        @endif
                        @if (session()->has('user_health_message'))
                        <br>
                        <br>
                        <div class="alert alert-success">
                            <ul>
                                <li>{{ session()->get('user_health_message') }}</li>
                            </ul>
                        </div>
                        @endif
                        @if (session()->has('user_health_error'))
                        <div class="alert alert-danger">
                            <ul>
                                <li>{{ session()->get('user_health_error') }}</li>
                            </ul>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <div class="contact-form">
                            <div>
                                <span>Height (cm)*</span>
                                <span><input type="text" name="height" class="form-control txt5" id="height" autocomplete="off"
                                    @if (count($user_health_details) > 0)
                                    value="{{ $user_health_details[0]->height }}"
                                    @endif
                                    />
                                </span>
                            </div>

                            <div>
                                <span>Disabilities</span>
                                <span><input type="text" name="disabilities" class="form-control txt5" id="disabilities" autocomplete="off"
                                    @if (count($user_health_details) > 0)
                                    value="{{ $user_health_details[0]->disabilities }}"
                                    @endif
                                    />
                                </span>
                            </div>

                            <div>
                                <span>Other Notable Health Concerns</span>
                                <span><input type="text" name="remarks" class="form-control txt5" id="remarks" autocomplete="off"
                                    @if (count($user_health_details) > 0)
                                    value="{{ $user_health_details[0]->remarks }}"
                                    @endif
                                    />
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-form">
                            <div>
                                <span>Weight (kg)*</span>
                                <span><input type="text" name="weight" class="form-control txt5" id="weight" autocomplete="off"
                                    @if (count($user_health_details) > 0)
                                    value="{{ $user_health_details[0]->weight }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>Chronic Illness</span>
                                <span><input type="text" name="chronic_illness" class="form-control txt5" id="chronic_illness" autocomplete="off"
                                    @if (count($user_health_details) > 0)
                                    value="{{ $user_health_details[0]->chronic_illness }}"
                                    @endif
                                    />
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <hr>
                <div class="main row">
                    <div class="contact-form">
                        <div style="text-align:center;">
                            <label class="fa-btn btn-1 btn-1e"><input type="submit" value="Submit and Finish >>"></label>
                        </div>
                    </div>
                </div>
                </div>
                <div class="main row">
                    <div class="contact-form">
                        <div style="text-align:center;">
                            <ul class="pagination">
                              <li><a>&laquo;</a></li>
                              <li><a>1</a></li>
                              <li><a>2</a></li>
                              <li><a class="active">3</a></li>
                              <li><a>&raquo;</a></li>
                            </ul>
                        </div>
                        <input type="text" id="qset" name="qset" hidden>
                        <input type="text" id="mbti_type" name="mbti_type" hidden>
                    </div>
                </div>
            </form>
            <div class="clearfix"></div>
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
</html>