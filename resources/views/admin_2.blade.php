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
                    <p class="heading lead">User Status Update</p>
                    <p>Select the new status and click "Save Changes" to update the user status or "Cancel" to go back admin page.</p>
                </div>
                <div class="modal-body">
                    <form method="POST" id="update_status_form">
                        {{ csrf_field() }}
                        <span class="txt5">Select new user status:</span>
                        <span>
                            <select class="form-control txt6" name="user_status" id="user_status">
                            	<option value="none"></option>
                                <option value="0">Inactive</option>
                                <option value="1">Active</option>
                            </select>
                        </span>
                        <br>
                        <input type="text" name="user_id" id="user_id" hidden>
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

    <!-- Modal-->
    <div class="modal fade" id="myModalEditRole" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="heading lead">User Role Update</p>
                    <p>Select the new role and click "Save Changes" to update the user role or "Cancel" to go back admin page.</p>
                </div>
                <div class="modal-body">
                    <form method="POST" id="update_role_form">
                        {{ csrf_field() }}
                        <span class="txt5">Select new user role:</span>
                        <span>
                            <select class="form-control txt6" name="user_role" id="user_role">
                            	<option value="none"></option>
                                <option value="1">Admin Role</option>
                                <option value="2">Teacher Role</option>
                                <option value="3">Student Role</option>
                            </select>
                        </span>
                        <br>
                        <input type="text" name="user_id_role" id="user_id_role" hidden>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="update_role_btn" type="button" class="btn btn-primary">Save Changes</button>
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
			<h4 align="center">Search Users Database</h4>
			<br>
			<p align="center">To query the users database by <u>personal details</u>, select the query by criteria, type any keyword to the input field below and click "Search".</p>
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
			<p align="center">To query the users database by <u>user status and roles</u>, select the query type, value and click "Search".</p>
			<div align="center">
				<div class="h_search_lookup">
					<form method="POST" id="search_form_enrollment">
						{{ csrf_field() }}
						<table>
							<tr>
								<td style="width:250px;">
									<select class="form-control txt6" name="query_enr" id="query_enr">
										<option value="none">Select Query Type</option>
										<option value="status">Query by User Status</option>
										<option value="roles">Query by Roles</option>
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
				<p><b>NOTES:</b> <br>1. To active or inactive a user, click on the corresponding 'User Status' value.<br>2. To edit a user role, click on the corresponding 'User Role' vaoue.</p>
				<form method="POST" id="print_form">
					{{ csrf_field() }}
					<table id="search_results" class="txt5">
						<tr>
							<th style="text-align:center">Name</th>
							<th style="text-align:center">Email</th>
							<th style="text-align:center">User Status</th>
							<th style="text-align:center">User Role</th>
						</tr>
						@foreach ($learner_details as $detail)
						<tr>
							<td>
								@if (isset($detail->first_name))
								{{ $detail->first_name }} {{ $detail->middle_name }} {{ $detail->last_name }} {{ $detail->extension_name }}
								@endif
							</td>
							<td>{{ $detail->email }}</td>
							<td id="data_status-{{ $detail->id }}" data-id="{{ $detail->id }}" class="txt4">
								@if ($detail->active == '1')
									<u>Active</u>
								@else
									<u>Inactive</u>
								@endif
							</td>
							<td id="data_role-{{ $detail->id }}" data-id="{{ $detail->id }}" class="txt4">
								@if ($detail->roles_id == '1')
									<u>Admin Role</u>
								@elseif ($detail->roles_id == '2')
									<u>Teacher Role</u>
								@elseif ($detail->roles_id == '3')
									<u>Student Role</u>
								@endif
							</td>
						</tr>
						@endforeach
					</table>
					<input name="user_id" id="user_id" type="text" hidden>
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
                $("#search_form_personal").attr('action', '{{ route('admin_2') }}');
                $("#search_form_personal").submit();
            }
        });

        // Script to submit the query form.
        $("#enroll_btn").on("click", function() {
            var query = $('#query_enr :selected').val();
            var keyword = $('#query_enr_sub :selected').val();

            // Make sure user selected values.
            if (query != '' || keyword != '') {
                $("#search_form_enrollment").attr('action', '{{ route('admin_2') }}');
                $("#search_form_enrollment").submit();
            }
        });

       	// Script to submit the id for editing.
        $("[id^=data_status-]").on("click", function() {
            var id = $(this).data("id");

            $('#user_id').val(id);
            $('#myModalEdit').modal('show');
        });

       	// Script to submit the id for editing.
        $("[id^=data_role-]").on("click", function() {
            var id = $(this).data("id");

            $('#user_id_role').val(id);
            $('#myModalEditRole').modal('show');
        });

        // Script to fill up the subquery.
        $('#query_enr').change(function() {
            var query = $(this).val();
            var school_id = <?php echo $user_details[0]->school_id; ?>

			if (query == "status") {
				$('#query_enr_sub').empty();
				var arrayList = [
					{"id": "1", "name": "Active"},
					{"id": "0", "name": "Inactive"}
				];

				for (var i = 0; i <= arrayList.length; i++) {
					$('#query_enr_sub').append('<option value="' + arrayList[i].id + '">' + arrayList[i].name + '</option>');
				}
			}
			else if (query == "roles") {
				$('#query_enr_sub').empty();
				var arrayList = [
					{"id": "1", "name": "Admin Role"},
					{"id": "2", "name": "Teacher Role"},
					{"id": "3", "name": "Student Role"}
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

        // Script to update student status.
        $("#update_status_btn").on("click", function() {
            var status = $('#user_status').val();

            // Make sure user selected values.
            if (status != 'none') {
                $("#update_status_form").attr('action', '{{ route('admin_2.update') }}');
                $("#update_status_form").submit();
            }
        });

        // Script to update student role status.
        $("#update_role_btn").on("click", function() {
            var status = $('#user_role').val();

            // Make sure user selected values.
            if (status != 'none') {
                $("#update_role_form").attr('action', '{{ route('admin_2.update') }}');
                $("#update_role_form").submit();
            }
        });
    });
</script>