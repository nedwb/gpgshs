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
<!--font-Awesome-->
   	<link rel="stylesheet" href="fonts/css/font-awesome.min.css">
<!--font-Awesome-->
<link rel="stylesheet" type="text/css" href="css/util.css">
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
			<h1><a>Learner's Personality</a></h1>
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
                <li class="active"><a href="personality">Personality</a></li>
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
<div class="main_bg"><!-- start main -->
	<div class="container">
		<div class="technology_1 row">
			<form method="POST" id='data_form' action="{{ route('personality-test') }}">
	            {{ csrf_field() }}
	            <!--<input type="text" id="qset" name="qset">-->
				<br>
				<br>
				<h2>Keirsey Temperament Sorter II Questions</h2>
				<div class="col-md-10 tech_para">
					<p class="para">These are the Keirsey Temperament Sorter II questions to determine you personality type. <br>Choose the answer that closely defines you or how you feel. Remember, there is NO right or wrong answer!</p>
				</div>
				<div class="clearfix"></div>
				<br>
				<hr>
				<hr>
				<?php
				if (count($questions) > 0) {
					if ($questions[0]->mbti == 'ei')
						$ctr = 1;
					else if ($questions[0]->mbti == 'sn')
						$ctr = 12;
					else if ($questions[0]->mbti == 'tf')
						$ctr = 23;
					else if ($questions[0]->mbti == 'jp')
						$ctr = 34;

					$ans_ctr = 1;
					foreach ($questions as $row) {
					?>
					<div class="technology_list1">
						<h4>{{ $ctr }}. {{ $row->question }}</h4>
						<div class="col-md-12 txt5">
							<input type="radio" name="answer.{{ $ans_ctr }}" value="a"> {{ $row->a }}
							&nbsp &nbsp &nbsp
							<input type="radio" name="answer.{{ $ans_ctr }}" value="b"> {{ $row->b }}
						</div>
						<div class="clearfix"></div>
					</div>
				<?php
						$ctr++;
						$ans_ctr++;
					}
				}
				?>
				<br>
				<hr>
				<hr>
	            <div class="main row">
	                <div class="contact-form">
	                    <div style="text-align:center;">	              	
	                        <label class="fa-btn btn-1 btn-1e">
	                        	<input id="submit_btn" type="submit"
	                        	@if ($questions[0]->mbti != 'jp')
	                        		value="Proceed To Next Page>>"
	                        	@else
	                        		value="Submit and Finish>>"
	                        	@endif
	                        	>
	                        </label>                        
	                    </div>
	                </div>
	            </div>
	            <div class="main row">
	            	<div class="contact-form">
	                    <div style="text-align:center;">
							<ul class="pagination">
							  <li><a>&laquo;</a></li>
							  <li><a @if ($questions[0]->mbti == 'ei')  class="active" @endif>1</a></li>
							  <li><a @if ($questions[0]->mbti == 'sn')  class="active" @endif>2</a></li>
							  <li><a @if ($questions[0]->mbti == 'tf')  class="active" @endif>3</a></li>
							  <li><a @if ($questions[0]->mbti == 'jp')  class="active" @endif>4</a></li>
							  <li><a>&raquo;</a></li>
							</ul>
						</div>
						<input type="text" id="qset" name="qset" hidden>
						<input type="text" id="mbti_type" name="mbti_type" hidden>
					</div>
				</div>
			</form>
		</div>

	</div>
</div><!-- end main -->
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
    $(document).ready(function()
    {
    	$('#myModal').modal('show');
        $("#myModal").on('hide.bs.modal', function () {  
            return false
        });

		var questions = {!! json_encode($questions) !!};
		var type;
		var mbti;

    	$("#submit_btn").on("click", function() {	
    		var count;
    		var totalVal=0;
    		for (count=1; count<12; count++) {
    			if (!$("input[name='answer." + count +"']:checked").val()) {
    				alert('You must answer all questions before proceeding to next page.');
        			return false;
    			}
    			var value = $("input[name='answer." + count +"']:checked").val();
    			if (value == 'a')
    				totalVal++;
    		}

    		if (questions[0]['mbti'] == 'ei') {
    			if (totalVal < 6)
    				type = 'i';
    			else
    				type = 'e';
    			sessionStorage.type1 = type;
    			$("#qset").val('sn');
    			$( "#data_form" ).submit();
    		}
    		else if (questions[0]['mbti'] == 'sn') {
    			if (totalVal < 6)
    				type = 's';
    			else
    				type = 'n';
    			sessionStorage.type2 = type;
    			$("#qset").val('tf');
    			$( "#data_form" ).submit();
    		}
    		else if (questions[0]['mbti'] == 'tf') {
    			if (totalVal < 6)
    				type = 't';
    			else
    				type = 'f';
    			sessionStorage.type3 = type;
    			$("#qset").val('jp');
    			$( "#data_form" ).submit();
    		}
    		else if (questions[0]['mbti'] == 'jp') {
    			if (totalVal < 6)
    				type = 'j';
    			else
    				type = 'p';
    			sessionStorage.type4 = type;
    			if (sessionStorage.getItem('type1').length != 0 && sessionStorage.getItem('type2').length != 0 && sessionStorage.getItem('type3').length != 0 && sessionStorage.getItem('type4').length != 0)
    				mbti = sessionStorage.type1.concat(sessionStorage.type2, sessionStorage.type3, sessionStorage.type4);
    			else
    				mbti = null;

    			$("#mbti_type").val(mbti);
    			$("#data_form").attr('action', '{{ route('personality-result') }}');
    			$("#data_form" ).submit();
    		}
		});
    });
</script>