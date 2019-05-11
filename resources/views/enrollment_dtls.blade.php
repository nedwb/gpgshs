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
                    <h3 align="center">Enrollment Details</h3>
                    <br>
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <div class="contact-form">
                            <div>
                                <span>School Year</span>
                                <span><input type="text" name="school_year" class="form-control txt5" id="school_year" readonly @if (isset($enroll_year))
                                    value="{{ enroll_year }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>School Name</span>
                                <span><input type="text" name="school_name" class="form-control txt5" id="school_name" readonly @if (count($enroll_details)> 0)
                                    value="{{ $enroll_details[0]->school }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>Grade</span>
                                <span><input type="text" name="grade" class="form-control txt5" id="grade" readonly @if (isset($enroll_grade))
                                    value="{{ $enroll_grade }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>Course</span>
                                <span><input type="text" name="course" class="form-control txt5" id="course" readonly @if (count($enroll_details)> 0)
                                    value="{{ $enroll_details[0]->course }}"
                                    @endif
                                    />
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <hr>
                    <h3 align="left">Personal Information</h3>
                    <br>
                    <div class="col-md-6">
                        <div class="contact-form">
                            <div>
                                <span>First Name</span>
                                <span><input type="text" name="first_name" class="form-control txt5" id="first_name" readonly @if (count($user_details)> 0)
                                    value="{{ $user_details[0]->first_name }}"
                                    @endif
                                    />
                                </span>
                            </div>

                            <div>
                                <span>Last Name</span>
                                <span><input type="text" name="last_name" class="form-control txt5" id="last_name" readonly @if (count($user_details)> 0)
                                    value="{{ $user_details[0]->last_name }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>Date of Birth (YYYY-MM-DD)</span>
                                <span><input type="text" name="birth_date" class="form-control txt5" id="birth_date" readonly @if (count($user_details)> 0)
                                    value="{{ $user_details[0]->birth_date }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>Gender</span>
                                <span><input type="text" name="sex" class="form-control txt5" id="sex" readonly @if (count($user_details)> 0)
                                    @if ($user_details[0]->sex == "M")
                                        value="Male"
                                    @else ($user_details[0]->sex == "F")
                                        value="Female"
                                    @endif
                                @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>Mother Tongue</span>
                                <span><input type="text" name="mother_tongue" class="form-control txt5" id="mother_tongue" readonly @if (count($user_details)> 0)
                                    value="{{ $user_details[0]->mother_tongue }}"
                                    @endif
                                    />
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-form">
                            <div>
                                <span>Middle Name</span>
                                <span><input type="text" name="middle_name" class="form-control txt5" id="middle_name" readonly @if (count($user_details)> 0)
                                    value="{{ $user_details[0]->middle_name }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>Extension Name (e.g., Jr., III (if applicable)</span>
                                <span><input type="text" name="extension_name" class="form-control txt5" id="extension_name" readonly @if (count($user_details)> 0)
                                    value="{{ $user_details[0]->extension_name }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>Age</span>
                                <span><input type="text" name="age" class="form-control txt5" id="age" readonly @if (count($user_details)> 0)
                                    value="{{ $user_details[0]->age }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>Religion</span>
                                <span><input type="text" name="religion" class="form-control txt5" id="religion" readonly @if (count($user_details)> 0)
                                    value="{{ $user_details[0]->religion }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>IP (Ethnic Group If Applicable)</span>
                                <span><input type="text" name="ip_group" class="form-control txt5" id="ip_group" readonly @if (count($user_details)> 0)
                                    value="{{ $user_details[0]->ip_group }}"
                                    @endif
                                    />
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <hr>
                    <h3 align="left">Residence and Contact Information</h3>
                    <br>
                    <div class="col-md-6">
                        <div class="contact-form">
                            <div>
                                <span>House No. / Street Address / Subdivision</span>
                                <span><input type="text" name="address" class="form-control txt5" id="address" readonly @if (count($user_details)> 0)
                                    value="{{ $user_details[0]->address }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>City/Municipality</span>
                                <span><input readonly type="text" name="municipality" class="form-control txt5" id="municipality" readonly @if (count($user_details)> 0)
                                    value="{{ $user_details[0]->municipality }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>Telephone No.</span>
                                <span><input type="text" name="tel_no" class="form-control txt5" id="tel_no" readonly @if (count($user_details)> 0)
                                    value="{{ $user_details[0]->tel_no }}"
                                    @endif
                                    />
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-form">
                            <div>
                                <span>Barangay</span>
                                <span>
                                    <input type="text" name="barangay" id="barangay" class="form-control txt5" readonly @if (count($user_details)> 0)
                                    value="{{ $user_details[0]->barangay }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>Province</span>
                                <span><input readonly type="text" name="province" class="form-control txt5" id="province" @if (count($user_details)> 0)
                                    value="{{ $user_details[0]->province }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>Mobile No.</span>
                                <span><input type="text" name="mobile_no" class="form-control txt5" id="mobile_no" readonly @if (count($user_details)> 0)
                                    value="{{ $user_details[0]->mobile_no }}"
                                    @endif
                                    />
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <hr>
                    <h3 align="left">Parents/Guardian's Information</h3>
                    <br>
                    <div class="col-md-6">
                        <div class="contact-form">
                            <div>
                                <span>Father's Name</span>
                                <span><input type="text" name="father_name" class="form-control txt5" id="father_name" readonly @if (count($user_guardian_details)> 0)
                                    value="{{ $user_guardian_details[0]->father_name }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>Mother's Name</span>
                                <span><input type="text" name="mother_name" class="form-control txt5" id="mother_name" readonly @if (count($user_guardian_details)> 0)
                                    value="{{ $user_guardian_details[0]->mother_name }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>Guardian's Name</span>
                                <span><input type="text" name="guardian_name" class="form-control txt5" id="guardian_name" readonly @if (count($user_guardian_details)> 0)
                                    value="{{ $user_guardian_details[0]->guardian_name }}"
                                    @endif
                                    />
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-form">
                            <div>
                                <span>Father's Contact No.</span>
                                <span><input type="text" name="father_contact_no" class="form-control txt5" id="father_contact_no" readonly @if (count($user_guardian_details)> 0)
                                    value="{{ $user_guardian_details[0]->father_contact_no }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>Mother's Contact No.</span>
                                <span><input type="text" name="mother_contact_no" class="form-control txt5" id="mother_contact_no" readonly @if (count($user_guardian_details)> 0)
                                    value="{{ $user_guardian_details[0]->mother_contact_no }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>Guardian's Contact No.</span>
                                <span><input type="text" name="guardian_contact_no" class="form-control txt5" id="guardian_contact_no" readonly @if (count($user_guardian_details)> 0)
                                    value="{{ $user_guardian_details[0]->guardian_contact_no }}"
                                    @endif
                                    />
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <hr>
                    <hr>
                    <h3 align="left">Educational Background</h3>
                    <br>
                    <div class="col-md-6">
                        <div class="contact-form">
                            <div>
                                <span>Learner's Reference No.</span>
                                <span><input type="text" name="lrn_no" class="form-control txt5" id="lrn_no" readonly @if (count($user_educational_details)> 0)
                                    value="{{ $user_educational_details[0]->lrn_no }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>Name of School Last Attended (Junior High School)</span>
                                <span><input type="text" name="prev_junior_hs" class="form-control txt5" id="prev_junior_hs" readonly @if (count($user_educational_details)> 0)
                                    value="{{ $user_educational_details[0]->prev_junior_hs }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>Name of School Last Attended (Senior High School)</span>
                                <span><input type="text" name="prev_senior_hs" class="form-control txt5" id="prev_senior_hs" readonly @if (count($user_educational_details)> 0)
                                    value="{{ $user_educational_details[0]->prev_senior_hs }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>Previous Strand (Senior High School)</span>
                                <span><select class="form-control txt5" name="prev_strand" id="prev_strand" disabled>
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
                    <div class="col-md-6">
                        <div class="contact-form">
                            <div>
                                <span>Last School Year Completed</span>
                                <span><input type="text" name="prev_school_year" class="form-control txt5" id="prev_school_year" readonly @if (count($user_educational_details)> 0)
                                    value="{{ $user_educational_details[0]->prev_school_year }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>Level</span>
                                <span><input type="text" name="prev_junior_hs_level" class="form-control txt5" id="prev_junior_hs_level" readonly @if (count($user_educational_details)> 0)
                                    value="{{ $user_educational_details[0]->prev_junior_hs_level }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>Level/Semester Completed</span>
                                <span><input type="text" name="prev_senior_hs_level" class="form-control txt5" id="prev_senior_hs_level" readonly @if (count($user_educational_details)> 0)
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
                    <hr>
                    <hr>
                    <h3 align="left">Health Profile</h3>
                    <br>
                    <div class="col-md-6">
                        <div class="contact-form">
                            <div>
                                <span>Height (cm)</span>
                                <span><input type="text" name="height" class="form-control txt5" id="height" readonly @if (count($user_health_details)> 0)
                                    value="{{ $user_health_details[0]->height }}"
                                    @endif
                                    />
                                </span>
                            </div>

                            <div>
                                <span>Disabilities</span>
                                <span><input type="text" name="disabilities" class="form-control txt5" id="disabilities" readonly @if (count($user_health_details)> 0)
                                    value="{{ $user_health_details[0]->disabilities }}"
                                    @endif
                                    />
                                </span>
                            </div>

                            <div>
                                <span>Other Notable Health Concerns</span>
                                <span><input type="text" name="remarks" class="form-control txt5" id="remarks" readonly @if (count($user_health_details)> 0)
                                    value="{{ $user_health_details[0]->remarks }}"
                                    @endif
                                    />
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-form">
                            <div>
                                <span>Weight (cm)</span>
                                <span><input type="text" name="weight" class="form-control txt5" id="weight" readonly @if (count($user_health_details)> 0)
                                    value="{{ $user_health_details[0]->weight }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>Chronic Illness</span>
                                <span><input type="text" name="chronic_illness" class="form-control txt5" id="chronic_illness" readonly @if (count($user_health_details)> 0)
                                    value="{{ $user_health_details[0]->chronic_illness }}"
                                    @endif
                                    />
                                </span>
                            </div>
                        </div>
                    </div>
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
