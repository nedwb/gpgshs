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
    <!-- Modal-->
    <div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="heading lead">Learner Validation</p>
                    <p>After validating the enrollee, click "Save Changes" to update the enrollment status and save your remarks or "Cancel" to go back admin page.</p>
                </div>
                <div class="modal-body">
                    <form method="POST" id="update_enroll_form">
                        {{ csrf_field() }}
                        <span class="txt5">Select new enrollment status:</span>
                        <span>
                            <select class="form-control txt6" name="enroll_status" id="enroll_status">
                            	<option value="none"></option>
                                <option value="PENDING">Pending Validation</option>
                                <option value="INCOMPLETE">Incomplete Requirements</option>
                                <option value="ENROLLED">Officially Enrolled</option>
                                <option value="DEFERRED">Deferred</option>
                                <option value="COMPLETE">School Completed</option>
                                <option value="OTHERS">Others</option>
                            </select>
                        </span>
                        <br>
                        <span class="txt5">Enter any remarks in the text box below:</span>
                        <span>
                            <textarea class="form-control txt4" name="remarks" id="remarks"></textarea>
                        </span>
                        <input type="text" name="learnerid" id="learnerid" hidden>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="update_status_btn" type="button" class="btn btn-primary">Save Changes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal-->

<div class="header_bg1">
<div class="container">
	<div class="row header">
		<div class="logo navbar-left">
			<h1><a>Administrator Page</a></h1>
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
                <li>
                    <div class="dropdown">
                      <button onclick="myFunction()" class="dropbtn">My Account</button>
                      <div id="myDropdown" class="dropdown-content">
                      	<a href="profile_admin">View Profile</a>
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
			<h4 align="center">Search Enrollment Database</h4>
			<br>
			<p align="center">To query the students database by <u>personal details</u>, select the query criteria, type any keyword to the input field below and click "Search".</p>
			<div align="center">
				<div class="h_search_lookup">
					<form method="POST" id="search_form_personal">
						{{ csrf_field() }}
						<table>
							<tr>
								<td style="width:250px;">
									<select class="form-control txt6" name="query_per" id="query_per">
										<option value="none">Select Query Type</option>
										<option value="fname">Query by First Name</option>
										<option value="lname">Query by Last Name</option>
	                        		</select>
								</td>
								<td style="width:300px;">
									<input name="keyword" id="keyword" style="width:100%;" class="form-control txt6" type="text txt6" placeholder="Enter word to search">
								</td>
								<td style="width:10px;"></td>
								<td>
									<button type="button" id="personal_btn" class="button form-control">Search</button>
								</td>
							</tr>
						</table>
						<input name="query_type" id="query_type" hidden readonly">	
	            	</form>
				</div>
			</div>
			<hr>
			<p align="center">To query the students database by <u>enrollment details</u>, select the query type, value and click "Search".</p>
			<div align="center">
				<div class="h_search_lookup">
					<form method="POST" id="search_form_enrollment">
						{{ csrf_field() }}
						<table>
							<tr>
								<td style="width:250px;">
									<select class="form-control txt6" name="query_enr" id="query_enr">
										<option value="none">Select Query Type</option>
										<option value="status">Query by Enrollment Status</option>
										<option value="grade">Query by Grade</option>
										<option value="strand">Query by Career Strand</option>
										<option value="track">Query by Career Track</option>
	                        		</select>
								</td>
								<td style="width:250px;">
									<select class="form-control txt6" name="query_enr_sub" id="query_enr_sub">
	                        		</select>
								</td>
								<td style="width:10px;"></td>
								<td>
									<button type="button" id="enroll_btn" class="button form-control">Search</button>
								</td>
							</tr>
						</table>
	            	</form>
				</div>
			</div>
		</div>

		<br>
		<br>
		<div class="technology_1 row">
			@if (isset($learner_details) && count ($learner_details) > 0)
				<br>
				<p><b>NOTES:</b> <br>1. To print the learner's enrollment form, click on the corresponding name.<br>2. To validate and edit enrollment status, click on the corresponding status.</p>
				<form method="POST" id="print_form">
					{{ csrf_field() }}
					<table id="search_results" class="txt5">
						<tr>
							<th style="text-align:center">LRN</th>
							<th style="text-align:center">Name</th>
							<th style="text-align:center">Grade/Level</th>
							<th style="text-align:center">Career Strand</th>
							<th style="text-align:center">Enrollment Status</th>
							<th style="text-align:center">Enrollment Remarks</th>
						</tr>
						@foreach ($learner_details as $detail)
						<tr>
							<td>{{ $detail->lrn_no }}</td>
							<td id="data_name-{{ $detail->id }}"" data-id="{{ $detail->id }}" class="txt4"><u>{{ $detail->first_name }} {{ $detail->middle_name }} {{ $detail->last_name }} {{ $detail->extension_name }}</u></td>
							<td>{{ $detail->grade }}</td>
							<td>{{ $detail->strand }}</td>
							<td id="data_status-{{ $detail->id }}" data-id="{{ $detail->id }}" class="txt4"><u>{{ $detail->status }}</u></td>
							<td>{{ $detail->comments }}</td>
						</tr>
						@endforeach
					</table>
					<input name="learner_id" id="learner_id" type="text" hidden>
				</form>
			@else
				<p align="center" class="txt7">No data found. Try refining your search.</p>
			@endif
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
    $(document).ready(function() {
        // Script to submit the query form.
        $("#personal_btn").on("click", function() {
            var query = $('#query_per :selected').val();
            var keyword = $("#keyword").val();

            // Make sure user selected values.
            if (query != 'none' || keyword != '') {
                $("#search_form_personal").attr('action', '{{ route('admin') }}');
                $("#search_form_personal").submit();
            }
        });

        // Script to submit the query form.
        $("#enroll_btn").on("click", function() {
            var query = $('#query_enr :selected').val();
            var keyword = $('#query_enr_sub :selected').val();

            // Make sure user selected values.
            if (query != '' || keyword != '') {
                $("#search_form_enrollment").attr('action', '{{ route('admin') }}');
                $("#search_form_enrollment").submit();
            }
        });

       	// Script to submit the id for printing.
        $("[id^=data_name-]").on("click", function() {
            var id = $(this).data("id");

            // Make sure user selected values.
            if (id != '' || id != null) {
            	$('#learner_id').val(id);
                $("#print_form").attr('action', '{{ route('enrollment_dtls') }}');
                $("#print_form").submit();
            }
        });

       	// Script to submit the id for editing.
        $("[id^=data_status-]").on("click", function() {
            var id = $(this).data("id");

            $('#learnerid').val(id);
            $('#myModalEdit').modal('show');
        });

        // Script to fill up the subquery.
        $('#query_enr').change(function() {
            var query = $(this).val();
            var school_id = <?php echo $user_details[0]->school_id; ?>

			if (query == "status") {
				$('#query_enr_sub').empty();
				var arrayList = [
					{"id": "PENDING", "name": "Pending Validation"},
					{"id": "INCOMPLETE", "name": "Incomplete Requirements"},
					{"id": "ENROLLED", "name": "Officially Enrolled"}, 
					{"id": "DEFERRED", "name": "Deferred"},
					{"id": "ALL", "name": "All Enrollees"}
				];

				for (var i = 0; i <= arrayList.length; i++) {
					$('#query_enr_sub').append('<option value="' + arrayList[i].id + '">' + arrayList[i].name + '</option>');
				}
			}
			else if (query == "grade") {
				$('#query_enr_sub').empty();
				$('#query_enr_sub').append('<option value="10">10</option>');
				$('#query_enr_sub').append('<option value="11">11</option>');
			}
			else if (query == "track") {
				$('#query_enr_sub').empty();
				var arrayList = [
					{"id": "1", "name": "Academic Track"},
					{"id": "2", "name": "TVL Track"},
					{"id": "3", "name": "Sports Track"}, 
					{"id": "4", "name": "Arts and Design Track"},
				];

				for (var i = 0; i <= arrayList.length; i++) {
					$('#query_enr_sub').append('<option value="' + arrayList[i].id + '">' + arrayList[i].name + '</option>');
				}
			}
			else if (query == "strand") {
				var _token = $('input[name="_token"]').val();
				$.ajax({
                    url:"{{ route('admin.fetch_strand') }}",
                    method:"POST",
                    data:{query:query, school_id:school_id, _token:_token},
                    success:function(data){
                        $('#query_enr_sub').fadeIn();
                        $('#query_enr_sub').html(data);
                    }
                });
			}
        });

        // Script to update enrollment status.
        $("#update_status_btn").on("click", function() {
            var status = $('#enroll_status').val();
            var remarks = $('#remarks').val();

            // Make sure user selected values.
            if (status != 'none') {
                $("#update_enroll_form").attr('action', '{{ route('admin.update') }}');
                $("#update_enroll_form").submit();
            }
        });
    });
</script>