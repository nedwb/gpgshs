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
                            <li><a href="personality">Personality</a></li>
                            <li class="active"><a href="enrollment">Enrollment</a></li>
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
        <div class="main_bg">
            <!-- start main -->
            <div class="container">
                <div class="technology_1 row">
                        <hr>
                        <hr>
                        <h3 align="left">Step 3: Upload Requirements</h3>
                        <br>
                        <p class="txt6" align="left">
                             Upload scanned copy of the following required documents by clicking on each "Browse" button and selecting the file from your computer and click "Submit and Finish". <br><br>NOTE: You may skip this part and personally submit these documents to the school by clicking "Submit and Finish".
                        </p>
                        <!-- This is displaying errors and messages to the user. -->
                        @if (count($errors) > 0 && ($errors->has('form_137') || $errors->has('form_138') || $errors->has('good_cert') || $errors->has('ncae_result') || $errors->has('nso_pas_cert') || $errors->has('g10_cert') || $errors->has('brgy_clear') || $errors->has('id_pic')))
                        <div class="alert alert-danger">
                            <ul>
                                <li>{{ $errors->first('form_137') }}</li>
                                <li>{{ $errors->first('form_138') }}</li>
                                <li>{{ $errors->first('good_cert') }}</li>
                                <li>{{ $errors->first('ncae_result') }}</li>
                                <li>{{ $errors->first('nso_pas_cert') }}</li>
                                <li>{{ $errors->first('g10_cert') }}</li>
                                <li>{{ $errors->first('brgy_clear') }}</li>
                                <li>{{ $errors->first('id_pic') }}</li>
                            </ul>
                        </div>
                        @endif
                        <br>
                            <div align="center">
                                <form name="file_upload_frm" id="file_upload_frm_id" method="POST" enctype='multipart/form-data'>
                                    {{ csrf_field() }}
                                <hr>
                                <hr>
                                    <div class="form-group">
                                        <span class="txt5">Form 137</span>
                                        <input type="file" class="filestyle" id="form_137" name="form_137" size="75">
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <span class="txt5">Form 138</span>
                                        <input type="file" class="filestyle" id="form_138" name="form_138" size="75">
                                    </div>
                                    <hr>
                                    <div class="form-group">                                
                                        <span class="txt5">Good Moral Certificate</span>
                                        <input type="file" class="filestyle" id="good_crt" name="good_crt" size="75">
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <span class="txt5">NCAE Result</span>
                                        <input type="file" class="filestyle" id="ncae_res" name="ncae_res" size="75">
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <span class="txt5">NSO/PSA Birth Certificate</span>
                                        <input type="file" class="filestyle" id="brth_crt" name="brth_crt" size="75">
                                    </div>
                                    <hr>
                                    <div class="form-group">                                
                                        <span class="txt5">G10 Certificate</span>
                                        <input type="file" class="filestyle" id="g10_cert" name="g10_cert" size="75">
                                    </div>
                                    <hr>
                                    <div class="form-group">                                
                                        <span class="txt5">Barangay Clearance</span>
                                        <input type="file" class="filestyle" id="brgy_clr" name="brgy_clr" size="75">
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <span class="txt5">2x2 ID Picture</span>
                                        <input type="file" class="filestyle" id="id_pctrs" name="id_pctrs" size="75">
                                    </div>
                                <hr>
                                <hr>
                                </form>
                            </div>
                        <div class="clearfix"></div>
                        <div class="main row">
                            <div class="contact-form">
                                <div style="text-align:center;">
                                    <label class="fa-btn btn-1 btn-1e">
                                    <a type="submit" id="reqs_btn">Submit and Finish</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                </div>
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

<script>
    $(document).ready(function() {
        // Script to submit the enrollment form.
        $("#reqs_btn").on("click", function() {
            $("#file_upload_frm_id").attr('action', '{{ route('enrollment_upload') }}');
            $("#file_upload_frm_id").submit();
        });
    });
</script>
