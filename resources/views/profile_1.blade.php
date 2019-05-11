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
            <form method="POST" action="{{ route('profile_1.save') }}">
                {{ csrf_field() }}
                <hr>
                <hr>
                <div class="main row">
                    <div class="col-md-4 company_ad">
                        <h2>Personal Information</h2>
                        <p>Enter your personal information <b><u>accurately</u></b>.<br><br>These details will be used when you enroll to any of the offered career track/strand by the school.</p>
                        <br>
                        <!-- This is displaying errors and messages to the user. -->
                        @if (count($errors) > 0 && ($errors->has('first_name') || $errors->has('middle_name') || $errors->has('last_name') || $errors->has('extension_name') || $errors->has('birth_date') || $errors->has('age') || $errors->has('sex') || $errors->has('religion') || $errors->has('mother_tongue') || $errors->has('ip_group')))
                        <div class="alert alert-danger">
                            <ul>
                                <li>{{ $errors->first('first_name') }}</li>
                                <li>{{ $errors->first('middle_name') }}</li>
                                <li>{{ $errors->first('last_name') }}</li>
                                <li>{{ $errors->first('extension_name') }}</li>
                                <li>{{ $errors->first('birth_date') }}</li>
                                <li>{{ $errors->first('age') }}</li>
                                <li>{{ $errors->first('sex') }}</li>
                                <li>{{ $errors->first('religion') }}</li>
                                <li>{{ $errors->first('mother_tongue') }}</li>
                                <li>{{ $errors->first('ip_group') }}</li>
                            </ul>
                        </div>
                        @endif
                        @if (session()->has('user_detail_message'))
                        <br>
                        <br>
                        <div class="alert alert-success">
                            <ul>
                                <li>{{ session()->get('user_detail_message') }}</li>
                            </ul>
                        </div>
                        @endif
                        @if (session()->has('user_detail_error'))
                        <div class="alert alert-danger">
                            <ul>
                                <li>{{ session()->get('user_detail_error') }}</li>
                            </ul>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <div class="contact-form">
                            <div>
                                <span>First Name*</span>
                                <span><input type="text" name="first_name" class="form-control txt5" id="first_name" autocomplete="off"
                                    @if (count($user_details) > 0)
                                    value="{{ $user_details[0]->first_name }}"
                                    @endif
                                    />
                                </span>
                            </div>

                            <div>
                                <span>Last Name*</span>
                                <span><input type="text" name="last_name" class="form-control txt5" id="last_name" autocomplete="off"
                                    @if (count($user_details) > 0)
                                    value="{{ $user_details[0]->last_name }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>Date of Birth (YYYY-MM-DD*</span>
                                <span><input type="text" name="birth_date" class="form-control txt5" id="birth_date" autocomplete="off"
                                    @if (count($user_details) > 0)
                                    value="{{ $user_details[0]->birth_date }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>Gender*</span>
                                <span><select class="form-control txt5" name="sex" id="sex">
                                    <option value="N"></option>
                                    <option value="M" <?php if(count($user_details) > 0 && $user_details[0]->sex == "M") {?> selected<?php } ?>>Male</option>
                                    <option value="F" <?php if(count($user_details) > 0 && $user_details[0]->sex == "F") {?> selected<?php } ?>>Female</option>
                                </select>
                                </span>
                            </div>
                            <div>
                                <span>Mother Tongue*</span>
                                <span><input type="text" name="mother_tongue" class="form-control txt5" id="mother_tongue" autocomplete="off"
                                    @if (count($user_details) > 0)
                                    value="{{ $user_details[0]->mother_tongue }}"
                                    @endif
                                    />
                                </span>                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-form">
                            <div>
                                <span>Middle Name*</span>
                                <span><input type="text" name="middle_name" class="form-control txt5" id="middle_name" autocomplete="off"
                                    @if (count($user_details) > 0)
                                    value="{{ $user_details[0]->middle_name }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>Extension Name (e.g., Jr., III (if applicable)</span>
                                <span><input type="text" name="extension_name" class="form-control txt5" id="extension_name" autocomplete="off"
                                    @if (count($user_details) > 0)
                                    value="{{ $user_details[0]->extension_name }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>Age</span>
                                <span><input type="text" name="age" class="form-control txt5" id="age" readonly
                                    @if (count($user_details) > 0)
                                    value="{{ $user_details[0]->age }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>Religion*</span>
                                <span><input type="text" name="religion" class="form-control txt5" id="religion" autocomplete="off"
                                    @if (count($user_details) > 0)
                                    value="{{ $user_details[0]->religion }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>IP (Ethnic Group If Applicable)</span>
                                <span><input type="text" name="ip_group" class="form-control txt5" id="ip_group" autocomplete="off"
                                    @if (count($user_details) > 0)
                                    value="{{ $user_details[0]->ip_group }}"
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
                        <h2>Residence and Contact Information</h2>
                        <p>Enter your <b><u>current address</u></b> and <b><u>contact details</u></b>.<br><br>City/Municipality and Provincial fields will be automatically populated once you selected your Barangay.</p>
                        <br>

                        <!-- This is displaying errors and messages to the user. -->
                        @if (count($errors) > 0 && ($errors->has('address') || $errors->has('barangays_id') || $errors->has('tel_no') || $errors->has('mobile_no')))
                        <div class="alert alert-danger">
                            <ul>
                                <li>{{ $errors->first('address') }}</li>
                                <li>{{ $errors->first('barangays_id') }}</li>
                                <li>{{ $errors->first('tel_no') }}</li>
                                <li>{{ $errors->first('mobile_no') }}</li>                              
                            </ul>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <div class="contact-form">
                            <div>
                                <span>House No. / Street Address / Subdivision*</span>
                                <span><input type="text" name="address" class="form-control txt5" id="address" autocomplete="off" 
                                    @if (count($user_details) > 0)
                                    value="{{ $user_details[0]->address }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>City/Municipality</span>
                                <span><input readonly type="text" name="municipality" class="form-control txt5" id="municipality" autocomplete="off"
                                    @if (count($user_details) > 0)
                                    value="{{ $user_details[0]->municipality }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>Telephone No.*</span>
                                <span><input type="text" name="tel_no" class="form-control txt5" id="tel_no" autocomplete="off"
                                    @if (count($user_details) > 0)
                                    value="{{ $user_details[0]->tel_no }}"
                                    @endif
                                    />
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-form">
                            <div>
                                <span>Barangay*</span>
                                <span>
                                    <input type="text" id="barangays_id" name="barangays_id" hidden
                                    @if (count($user_details) > 0)
                                    value="{{ $user_details[0]->barangays_id }}"
                                    @endif
                                    />
                                    <input type="text" name="barangay" id="barangay" class="form-control txt5" autocomplete="off" 
                                    @if (count($user_details) > 0)
                                    value="{{ $user_details[0]->barangay }}"
                                    @endif
                                    />
                                    <div id="barangayList">
                                    </div>

                                </span>
                            </div>
                            <div>
                                <span>Province</span>
                                <span><input readonly type="text" name="province" class="form-control txt5" id="province"
                                    @if (count($user_details) > 0)
                                    value="{{ $user_details[0]->province }}"
                                    @endif
                                    />
                                </span>
                            </div>
                            <div>
                                <span>Mobile No.*</span>
                                <span><input type="text" name="mobile_no" class="form-control txt5" id="mobile_no" autocomplete="off"
                                    @if (count($user_details) > 0)
                                    value="{{ $user_details[0]->mobile_no }}"
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
                              <li><a class="active">1</a></li>
                              <li><a>2</a></li>
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
        $('#barangay').keyup(function()
        { 
            var query = $(this).val();
            if(query != '')
            {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('profile_1.fetch') }}",
                    method:"POST",
                    data:{query:query, _token:_token},
                    success:function(data){
                        $('#barangayList').fadeIn();
                        $('#barangayList').html(data);
                    }
                });
            }
        });

        $(document).on('click', 'li', function()
        {
            var address = $(this).text().split(", ");
            var barangay_d1 = address[0].split(" (");
            $('#barangay').val(barangay_d1[0]);

            var barangay_d2 = barangay_d1[1].split(")");
            $('#barangays_id').val(barangay_d2[0]);

            $('#municipality').val(address[1]);
            $('#province').val(address[2]);
            $('#barangayList').fadeOut();
        });

        //Jquery function to calculate age and display to the age text field.
        $("#birth_date").on("change", function() {
            dob = new Date($('#birth_date').val());
            var today = new Date();
            var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
            $('#age').val(age);
        });
    });

</script>