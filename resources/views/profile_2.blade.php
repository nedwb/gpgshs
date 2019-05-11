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
            <form method="POST" action="{{ route('profile_2.save') }}">
                {{ csrf_field() }}
                <hr>
                <hr>
                <div class="main row">
                    <div class="col-md-4 company_ad">
                        <h2>Parents/Guardian Information</h2>
                        <p>Enter your guardian information <b><u>accurately</u></b>.<br><br>In case of any emergencies or concerns, <b>they will be contacted by the school administration</b>.</p>
                        <br>

                        <!-- This is displaying errors and messages to the user. -->
                        @if (count($errors) > 0 && ($errors->has('father_name') || $errors->has('mother_name') || $errors->has('father_contact_no') || $errors->has('mother_contact_no') || $errors->has('guardian_name') || $errors->has('guardian_contact_no')))
                        <div class="alert alert-danger">
                            <ul>
                                <li>{{ $errors->first('father_name') }}</li>
                                <li>{{ $errors->first('mother_name') }}</li>
                                <li>{{ $errors->first('father_contact_no') }}</li>
                                <li>{{ $errors->first('mother_contact_no') }}</li>
                                <li>{{ $errors->first('guardian_name') }}</li>
                                <li>{{ $errors->first('guardian_contact_no') }}</li>
                            </ul>
                        </div>
                        @endif
                        @if (session()->has('user_guardian_message'))
                        <br>
                        <br>
                        <div class="alert alert-success">
                            <ul>
                                <li>{{ session()->get('user_guardian_message') }}</li>
                            </ul>
                        </div>
                        @endif
                        @if (session()->has('user_guardian_error'))
                        <div class="alert alert-danger">
                            <ul>
                                <li>{{ session()->get('user_guardian_error') }}</li>
                            </ul>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <div class="contact-form">
                            <div>
                                <span>Father's Name*</span>
                                <span><input type="text" name="father_name" class="form-control txt5" id="father_name" autocomplete="off"
                                    @if (count($user_guardian_details) > 0)
                                    value="{{ $user_guardian_details[0]->father_name }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>Mother's Name*</span>
                                <span><input type="text" name="mother_name" class="form-control txt5" id="mother_name" autocomplete="off"
                                    @if (count($user_guardian_details) > 0)
                                    value="{{ $user_guardian_details[0]->mother_name }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>Guardian's Name*</span>
                                <span><input type="text" name="guardian_name" class="form-control txt5" id="guardian_name" autocomplete="off"
                                    @if (count($user_guardian_details) > 0)
                                    value="{{ $user_guardian_details[0]->guardian_name }}"
                                    @endif
                                    />
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-form">
                            <div>
                                <span>Father's Contact No.*</span>
                                <span><input type="text" name="father_contact_no" class="form-control txt5" id="father_contact_no" autocomplete="off"
                                    @if (count($user_guardian_details) > 0)
                                    value="{{ $user_guardian_details[0]->father_contact_no }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>Mother's Contact No.*</span>
                                <span><input type="text" name="mother_contact_no" class="form-control txt5" id="mother_contact_no" autocomplete="off"
                                    @if (count($user_guardian_details) > 0)
                                    value="{{ $user_guardian_details[0]->mother_contact_no }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>Guardian's Contact No.*</span>
                                <span><input type="text" name="guardian_contact_no" class="form-control txt5" id="guardian_contact_no" autocomplete="off"
                                    @if (count($user_guardian_details) > 0)
                                    value="{{ $user_guardian_details[0]->guardian_contact_no }}"
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
                    <div class="col-md-4 company_ad">
                        <h2>Educational Background</h2>
                        <p>You previous educational records are <b><u>important requirements</u></b> for you to enter a new school. Enter these details accurately.<br><br> If some details are unknown,leave it blank.</p>
                        <br>

                        <!-- This is displaying errors and messages to the user. -->
                        @if (count($errors) > 0 && ($errors->has('lrn_no') || $errors->has('prev_junior_hs') || $errors->has('prev_junior_hs_level') || $errors->has('prev_senior_hs') || $errors->has('prev_senior_hs_level') || $errors->has('prev_school_year') || $errors->has('prev_strand')))
                        <div class="alert alert-danger">
                            <ul>
                                <li>{{ $errors->first('lrn_no') }}</li>
                                <li>{{ $errors->first('prev_junior_hs') }}</li>
                                <li>{{ $errors->first('prev_junior_hs_level') }}</li>
                                <li>{{ $errors->first('prev_senior_hs') }}</li>
                                <li>{{ $errors->first('prev_senior_hs_level') }}</li>
                                <li>{{ $errors->first('prev_school_year') }}</li>
                                <li>{{ $errors->first('prev_strand') }}</li>
                            </ul>
                        </div>
                        @endif
                        @if (session()->has('user_educ_message'))
                        <br>
                        <br>
                        <div class="alert alert-success">
                            <ul>
                                <li>{{ session()->get('user_educ_message') }}</li>
                            </ul>
                        </div>
                        @endif
                        @if (session()->has('user_educ_error'))
                        <div class="alert alert-danger">
                            <ul>
                                <li>{{ session()->get('user_educ_error') }}</li>
                            </ul>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <div class="contact-form">
                            <div>
                                <span>Learner's Reference No.*</span>
                                <span><input type="text" name="lrn_no" class="form-control txt5" id="lrn_no" autocomplete="off"
                                    @if (count($user_educational_details) > 0)
                                    value="{{ $user_educational_details[0]->lrn_no }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>Name of School Last Attended (Junior High School)*</span>
                                <span><input type="text" name="prev_junior_hs" class="form-control txt5" id="prev_junior_hs" autocomplete="off"
                                    @if (count($user_educational_details) > 0)
                                    value="{{ $user_educational_details[0]->prev_junior_hs }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>Name of School Last Attended (Senior High School)</span>
                                <span><input type="text" name="prev_senior_hs" class="form-control txt5" id="prev_senior_hs" autocomplete="off"
                                    @if (count($user_educational_details) > 0)
                                    value="{{ $user_educational_details[0]->prev_senior_hs }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>Previous Strand (Senior High School)</span>
                                <span><select class="form-control txt5" name="prev_strand" id="prev_strand">
                                    <option value="none"></option>
                                    @foreach ($career_details as $career)
                                        <option value="{{ $career->tracks_id }}.{{ $career->id }}"
                                        @if (count($user_educational_details) > 0 && isset($user_educational_details[0]->strand_id))
                                            @if ($user_educational_details[0]->strand_id == $career->id)    
                                            selected
                                            @endif
                                        @endif
                                            >{{ $career->strand }}</option>
                                    @endforeach
                                </select>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-form">
                            <div>
                                <span>Last School Year Completed*</span>
                                <span><input type="text" name="prev_school_year" class="form-control txt5" id="prev_school_year" autocomplete="off"
                                    @if (count($user_educational_details) > 0)
                                    value="{{ $user_educational_details[0]->prev_school_year }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>Level*</span>
                                <span><input type="text" name="prev_junior_hs_level" class="form-control txt5" id="prev_junior_hs_level" autocomplete="off"
                                    @if (count($user_educational_details) > 0)
                                    value="{{ $user_educational_details[0]->prev_junior_hs_level }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>Level/Semester Completed</span>
                                <span><input type="text" name="prev_senior_hs_level" class="form-control txt5" id="prev_senior_hs_level" autocomplete="off"
                                    @if (count($user_educational_details) > 0)
                                    value="{{ $user_educational_details[0]->prev_senior_hs_level }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>Previous Track (Senior High School)</span>
                                <span><select class="form-control txt5" name="prev_track" id="prev_track" disabled>
                                    <option value="none"></option> 
                                    @foreach ($career_details as $career)
                                        <option value="{{ $career->tracks_id }}"
                                        @if (count($user_educational_details) > 0 && isset($user_educational_details[0]->track_id))
                                            @if ($user_educational_details[0]->track_id == $career->tracks_id)    
                                            selected
                                            @endif
                                        @endif
                                            >{{ $career->track }}</option>
                                    @endforeach  
                                </select>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <hr>
                <hr>
                <div class="main row">
                    <div class="contact-form">
                        <div style="text-align:center;">
                            <label class="fa-btn btn-1 btn-1e"><input type="submit" value="Save and Go to Next Page >>"></label>
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
                              <li><a class="active">2</a></li>
                              <li><a>3</a></li>
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

<script>
    $(document).ready(function()
    {
        $('#prev_strand').change(function() {
            var track_id = $("select#prev_strand").val().split(".");
            $("#prev_track option[value='" + track_id[0] + "']").prop('selected', true);
        });
    });


</script>