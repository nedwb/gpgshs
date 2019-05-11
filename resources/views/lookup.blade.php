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
    <div class="modal fade" id="enroll_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="heading lead">Enrollment Form</p>
                    <p>Select your grade level you are enrolling and click "Enroll" or "Cancel" to go back admin page.</p>
                </div>
                <form method="POST" id="enroll_form_2" action="{{ route('enrollment') }}">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <span class="txt5">Grade Level:</span>
                        <span>
                        <select class="form-control txt6" name="grade_level" id="grade_level">
                            <option value="11">Grade 11</option>
                            <option value="12">Grade 12</option>
                        </select>
                        </span>
                    </div>
                    <div class="modal-footer">
                        <button id="enroll_new_btn" type="submit" class="btn btn-primary">Enroll Now</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
					<input type="text" name="year" id="year_id" hidden value="<?php echo date(" Y"); ?>">
					<input type="text" name="school" id="schoolId" hidden>
					<input type="text" name="course" id="courseId" hidden>
					<input type="text" name="grade" id="grade_id" hidden>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal-->
    <div class="modal fade" id="myModalPreCheck" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="heading lead">ENROLLMENT NOTICE</p>
                    <p class="txt7">As per system records, you already have enrolled to the following school and course below. If you need to change your enrollment details, please contact the school administrator directly.</p>
                </div>
                <div class="modal-body">
                    <form method="POST" id="enroll_form">
                        {{ csrf_field() }}
                        <span class="txt5">School Year: </span>
                        <span><input type="text" name="year" class="form-control txt6" id="yearId" autocomplete="off" readonly value="<?php echo date(" Y"); ?>"
                            />
                        </span>
                        <br>
                        <span class="txt5">School Enrolled:</span>
                        <span>
                            <input type="text" name="school_enrolled" class="form-control txt5" id="school_enrolledId" readonly
                            @if (isset($learner_details) && count($learner_details)> 0)
                            value="{{ $learner_details[0]->school }}"
                            @endif
                            />
                        </span>
                        <br>
                        <span class="txt5">Course Enrolled:</span>
                        <span>
                            <input type="text" name="course_enrolled" class="form-control txt5" id="course_enrolledId" readonly
                            @if (isset($learner_details) && count($learner_details)> 0)
                            value="{{ $learner_details[0]->course }}"
                            @endif
                            />
                        </span>
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="enrollment_dtls" id="view_enroll_btn" type="button" class="btn btn-primary">View Enrollment Details</a>
                    <a href="home" id="cancel_btn" type="button" class="btn btn-default">Cancel</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal-->
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
			<h1><a>Career & School Lookup</a></h1>
		</div>
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
                <li class="active"><a href="lookup">Career & School Lookup</a></li>
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
		@if ($_SERVER['REQUEST_METHOD'] === 'GET')
		<div class="technology_1 row">
			<hr>
			<hr>
			<p align="center">To see which schools offers a career track, type any career track keyword to the input field below and click "Search".</p>
			<div align="center">
				<div class="h_search_lookup">
					<form method="POST" id="search_form" action="{{ route('lookup') }}">
						{{ csrf_field() }}
	                	<input type="text" class="text" placeholder="Enter career track to search" name="search_key" required autocomplete="off">
	                	<input type="submit" value="Search" id="search_btn">
	            	</form>
				</div>
			</div>
			<hr>
			<hr>
		</div>
		@elseif ($_SERVER['REQUEST_METHOD'] === 'POST')
		<div class="technology_1 row">
			<hr>
			<hr>
			<p align="center">To see which schools offers a career track, type any career track keyword to the input field below and click "Search".</p>
			<div align="center">
				<div class="h_search_lookup">
					<form method="POST" id="search_form" action="{{ route('lookup') }}">
						{{ csrf_field() }}
	                	<input type="text" class="text" placeholder="Enter career track to search" name="search_key" required autocomplete="off">
	                	<input type="submit" value="Search">
	            	</form>
				</div>
			</div>
			<br>
			<br>
			@if (isset($results) && count ($results) > 0)
				<h3 align="center">Your search results..</h3>
				<br>
				<p align="center">Click on corresponding "Enroll This Course" link for the desired school and course to enroll to.</p>
				<br>
				<table id="search_results" class="txt5">
					<tr>
						<th colspan="2" style="text-align:center">School</th>
						<th colspan="2" style="text-align:center">Career Strand</th>
					</tr>
		
					<?php
					$index = 0;
					foreach ($results as $result) { ?>
						<tr>
							<td>
								{{ $result->school }}
							</td>
							<td class="mySchool txt4" school-data-id="{{ $index }}"><u>View Location Map</u></td>
							<td>
								{{ $result->strand }}
							</td>
							<!--<td align="center"><a href="" class="txt4" data-id="{{ $result->school_id.$result->career_strands_id }}"><u>Enroll This Course</u></a></td>-->
                            @if ($result->school_id == '1')
							<td class="myCourse" align="center" class="txt4" course-data-id="{{ $result->school_id }}.{{ $result->career_strands_id }}"><u>Enroll This Course</u></td>
                            @endif
						</tr>
					<?php
						$index++;
					}
					?>
				</table>
				<!--
				<form method="POST" id="enroll_form_2">
					{{ csrf_field() }}
					<input type="text" name="year" id="year_id" hidden value="<?php echo date(" Y"); ?>">
					<input type="text" name="school" id="schoolId" hidden>
					<input type="text" name="course" id="courseId" hidden>
				</form>
				-->
			@else
				<p align="center" class="txt4">No data found. Search using <u>career track</u> keywords, example: "sports", "computer", "gas".</p>
			@endif
			<br>
		</div>
		<br>
		<br>

		<!-- Section for the Map -->
		@if (isset($results) && count ($results) > 0)
		<h3 align="center">Location of the School</h3>
		<div class="container" id="map"></div>

		@endif
		@endif
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
    	// Show the modals.
    	$("#myModal").modal('show');
        $("#myModal").on('hide.bs.modal', function () {  
            return false
        });

        var course = '<?php if (isset($learner_details) && count($learner_details) > 0) echo $learner_details[0]->career_strands_id; ?>';
        var school = '<?php if (isset($learner_details) && count($learner_details) > 0) echo $learner_details[0]->senior_high_schools_id ?>';
        if (course != '' && school != '')
                $('#myModalPreCheck').modal('show');
 
        $(".mySchool").click(function () {
    		var idx = $(this).attr("school-data-id");

    		var results = <?php if (isset($results)) echo json_encode($results); ?>;

    		var latLong = results[idx]['map'];
    		var str = results[idx]['school'];
    		var schoolName = str.replace(/ /g, '+');

    		var mapCodeBlock = '<div class="main row">' +
					'<iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0"' +
					'marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;' +
					'geocode=&amp;q=' + schoolName + '&amp;aq=4&amp;oq=light&amp;' +
					'sll=' + latLong + '&amp;ie=UTF8&amp;hq=&amp;' +
					'hnear=' + schoolName + '&amp;t=m&amp;z=14&amp;' +
					'll=' + latLong + '&amp;output=embed"></iframe><br><small>' +
					'<a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;' +
					'q=' + schoolName + '&amp;aq=4&amp;oq=light&amp;' +
					'sll=' + latLong + '&amp;ie=UTF8&amp;hq=&amp;' +
					'hnear=' + schoolName + '&amp;t=m&amp;z=14&amp;' +
					'll=' + latLong + '" style="font-family: "Open Sans",' +
					'sans-serif;color:#555555;text-shadow:0 1px 0 #ffffff;' +
					'text-align:left;font-size:12px;padding: 5px;">View Larger Map</a></small></div></div>';

    		// Inserting the code block to wrapper element
    		document.getElementById("map").innerHTML = mapCodeBlock;
		});

		// Script to submit the enrollment form.
        $(".myCourse").on("click", function() {
        	var idx = $(this).attr("course-data-id");
        	var idxArray = idx.split(".");
        	$("#schoolId").val(idxArray[0]);
        	$("#courseId").val(idxArray[1]);

			$("#enroll_modal").modal('show');
        });

        $("#enroll_new_btn").click(function() {
            var grade = $('#grade_level :selected').val();
            $("#grade_id").val(grade);
        });
    });
</script>