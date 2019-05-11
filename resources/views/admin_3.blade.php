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
    <!-- Role Modal-->
    <div class="modal fade" id="add_role_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="heading lead">Add a New Role</p>
                    <p>Fill in the details and click "Save Changes" to add the new role or "Cancel" to go back admin page.</p>
                </div>
                <form method="POST" id="add_role_form" action="{{ route('roleupdate') }}">
                    <div class="modal-body">
                            {{ csrf_field() }}
                            <span class="txt5">New Role Name:</span>
                            <span><input type="text" name="rolename" class="form-control txt6" required></span>
                            <br>
                            <span class="txt5">New Role Description:</span>
                            <span><input type="text" name="description" class="form-control txt6" required></span>
                    </div>
                    <div class="modal-footer">
                        <button id="add_role_btn" type="submit" class="btn btn-primary">Save Changes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                    <input type="text" name="add_role_id" id="add_role_id" value="-1" hidden>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit_role_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="heading lead">Edit Role</p>
                    <p>Fill in the editable fields and click "Save Changes" or "Cancel" to go back admin page.</p>
                </div>
                <form method="POST" id="edit_role_form" action="{{ route('roleupdate') }}">
                    <div class="modal-body">
                            {{ csrf_field() }}
                            <span class="txt5">Role ID:</span>
                            <span><input type="text" name="edit_role_id" id="edit_role_id" class="form-control txt6" readonly></span>
                            <span class="txt5">Role Name:</span>
                            <span><input type="text" name="rolename" id="rolename" class="form-control txt6" readonly></span>
                            <br>
                            <span class="txt5">New Role Description:</span>
                            <span><input type="text" name="description" id="description" class="form-control txt6"></span>
                    </div>
                    <div class="modal-footer">
                        <button id="edit_role_btn" type="submit" class="btn btn-primary">Save Changes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delete_role_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="heading lead">Delete Role</p>
                    <p>Are you sure you want to delete this role?</p>
                </div>
                <form method="POST" id="edit_role_form" action="{{ route('roleupdate') }}">
                    <div class="modal-body">
                            {{ csrf_field() }}
                            <span class="txt5">Role ID:</span>
                            <span><input type="text" name="delete_role_id" id="delete_role_id" class="form-control txt6" readonly></span>
                            <span class="txt5">Role Name:</span>
                            <span><input type="text" name="delete_rolename" id="delete_rolename" class="form-control txt6" readonly></span>
                    </div>
                    <div class="modal-footer">
                        <button id="delete_role_btn" type="submit" class="btn btn-primary">Confirm Delete</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Personality Modal-->
    <div class="modal fade" id="edit_per_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="heading lead">Edit Personality</p>
                    <p>Fill in the editable fields and click "Save Changes" or "Cancel" to go back admin page.</p>
                </div>
                <form method="POST" id="edit_per_form" action="{{ route('perupdate') }}">
                    <div class="modal-body">
                            {{ csrf_field() }}
                            <span class="txt5">Personality ID:</span>
                            <span><input type="text" name="edit_per_id" id="edit_per_id" class="form-control txt6" readonly></span>
                            <span class="txt5">Personality Type:</span>
                            <span><input type="text" name="per_name" id="per_name" class="form-control txt6" readonly></span>
                            <br>
                            <span class="txt5">New Personality Description:</span>
                            <span><input type="text" name="per_desc" id="per_desc" class="form-control txt6"></span>
                            <span class="txt5">New Personality Long Description:</span>
                            <span>
                            <textarea class="form-control txt6" name="per_long_desc" id="per_long_desc"></textarea>
                            </span>
                    </div>
                    <div class="modal-footer">
                        <button id="edit_per_btn" type="submit" class="btn btn-primary">Save Changes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- School Modal-->
    <div class="modal fade" id="add_sch_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="heading lead">Add a New School</p>
                    <p>Fill in the details and click "Save Changes" to add the new school or "Cancel" to go back admin page.</p>
                </div>
                <form method="POST" id="add_sch_form" action="{{ route('schupdate') }}">
                    <div class="modal-body">
                            {{ csrf_field() }}
                            <span class="txt5">School Name:</span>
                            <span><input type="text" name="sch_name" class="form-control txt6" required></span>
                            <br>
                            <span class="txt5">School Address:</span>
                            <span><input type="text" name="sch_address" class="form-control txt6" required></span>
                            <span class="txt5">Contact Person</span>
                            <span><input type="text" name="sch_person" class="form-control txt6" required></span>
                            <span class="txt5">Contact No:</span>
                            <span><input type="text" name="sch_contact" class="form-control txt6" required></span>
                            <span class="txt5">Location Map:</span>
                            <span><input type="text" name="sch_map" class="form-control txt6" required></span>
                    </div>
                    <div class="modal-footer">
                        <button id="add_sch_btn" type="submit" class="btn btn-primary">Save Changes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                    <input type="text" name="add_sch_id" id="add_sch_id" value="-1" hidden>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit_sch_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="heading lead">Edit School Details</p>
                    <p>Fill in the editable fields and click "Save Changes" or "Cancel" to go back admin page.</p>
                </div>
                <form method="POST" id="edit_sch_form" action="{{ route('schupdate') }}">
                    <div class="modal-body">
                            {{ csrf_field() }}
                            <span class="txt5">School ID:</span>
                            <span><input type="text" name="edit_sch_id" id="edit_sch_id" class="form-control txt6" readonly></span>
                            <span class="txt5">School Name:</span>
                            <span><input type="text" name="sch_name" id="sch_name" class="form-control txt6"></span>
                            <br>
                            <span class="txt5">School Address:</span>
                            <span><input type="text" name="sch_address" id="sch_address" class="form-control txt6"></span>
                            <span class="txt5">Contact Person</span>
                            <span><input type="text" name="sch_person" id="sch_person" class="form-control txt6"></span>
                            <span class="txt5">Contact No:</span>
                            <span><input type="text" name="sch_contact" id="sch_contact" class="form-control txt6"></span>
                            <span class="txt5">Location Map:</span>
                            <span><input type="text" name="sch_map" id="sch_map" class="form-control txt6"></span>
                    </div>
                    <div class="modal-footer">
                        <button id="edit_sch_btn" type="submit" class="btn btn-primary">Save Changes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delete_sch_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="heading lead">Delete School</p>
                    <p>Are you sure you want to delete this school?</p>
                </div>
                <form method="POST" id="delete_sch_form" action="{{ route('schupdate') }}">
                    <div class="modal-body">
                            {{ csrf_field() }}
                            <span class="txt5">School ID:</span>
                            <span><input type="text" name="delete_sch_id" id="delete_sch_id" class="form-control txt6" readonly></span>
                            <span class="txt5">School Name:</span>
                            <span><input type="text" name="del_sch_name" id="del_sch_name" class="form-control txt6" readonly></span>
                    </div>
                    <div class="modal-footer">
                        <button id="delete_sch_btn" type="submit" class="btn btn-primary">Confirm Delete</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Personality Test Questions Modal-->
    <div class="modal fade" id="add_qst_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="heading lead">Add Personality Test Question</p>
                    <p>Fill in the details and click "Save Changes" to add the new personality test question or "Cancel" to go back admin page.</p>
                </div>
                <form method="POST" id="add_qst_form" action="{{ route('qstupdate') }}">
                    <div class="modal-body">
                            {{ csrf_field() }}
                            <span class="txt5">MBTI Type:</span>
                            <span>
                            <select class="form-control txt6" name="add_qst_mbti" id="add_qst_mbti" disabled>
                                <option value="ei">Extrovert/Introvert</option>
                                <option value="sn">Sensing/Intuition</option>
                                <option value="tf">Thinking/Feeling</option>
                                <option value="jp">Judging/Perceiving</option>
                            </select>
                            </span>
                            <span class="txt5">Personality Test Question:</span>
                            <span><input type="text" name="qst_question" class="form-control txt6" required></span>
                            <span class="txt5">Answer Choice A:</span>
                            <span><input type="text" name="qst_answer_a" class="form-control txt6" required></span>
                            <span class="txt5">Answer Choice B:</span>
                            <span><input type="text" name="qst_answer_b" class="form-control txt6" required></span>
                    </div>
                    <div class="modal-footer">
                        <button id="add_qst_btn" type="submit" class="btn btn-primary">Save Changes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                    <input type="text" name="add_qst_id" id="add_qst_id" value="-1" hidden>
                    <input type="text" name="add_qst_mbti_type" id="add_qst_mbti_type" hidden>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit_qst_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="heading lead">Edit Personality Question</p>
                    <p>Fill in the editable fields and click "Save Changes" or "Cancel" to go back admin page.</p>
                </div>
                <form method="POST" id="edit_qst_form" action="{{ route('qstupdate') }}">
                    <div class="modal-body">
                            {{ csrf_field() }}
                            <span class="txt5">MBTI Type:</span>
                            <span>
                            <select class="form-control txt6" name="edit_qst_mbti" id="edit_qst_mbti" disabled>
                                <option value="none"></option>
                                <option value="ei">Extrovert/Introvert</option>
                                <option value="sn">Sensing/Intuition</option>
                                <option value="tf">Thinking/Feeling</option>
                                <option value="jp">Judging/Perceiving</option>
                            </select>
                            </span>
                            <span class="txt5">Personality Test Question:</span>
                            <span><input type="text" name="qst_question" id="qst_question" class="form-control txt6"></span>
                            <span class="txt5">Answer Choice A:</span>
                            <span><input type="text" name="qst_answer_a" id="qst_answer_a" class="form-control txt6"></span>
                            <span class="txt5">Answer Choice B:</span>
                            <span><input type="text" name="qst_answer_b" id="qst_answer_b" class="form-control txt6"></span>
                    </div>
                    <div class="modal-footer">
                        <button id="edit_qst_btn" type="submit" class="btn btn-primary">Save Changes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                    <input type="text" name="edit_qst_id" id="edit_qst_id" hidden>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delete_qst_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="heading lead">Delete Personality Test Question</p>
                    <p>Are you sure you want to delete this test question?</p>
                </div>
                <form method="POST" id="delete_qst_form" action="{{ route('qstupdate') }}">
                    <div class="modal-body">
                            {{ csrf_field() }}
                            <span class="txt5">Test Question ID:</span>
                            <span><input type="text" name="delete_qst_id" id="delete_qst_id" class="form-control txt6" readonly></span>
                            <span class="txt5">Test Question:</span>
                            <span><input type="text" name="del_qst_name" id="del_qst_name" class="form-control txt6" readonly></span>
                    </div>
                    <div class="modal-footer">
                        <button id="delete_qst_btn" type="submit" class="btn btn-primary">Confirm Delete</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Career Strands Modal-->
    <div class="modal fade" id="add_str_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="heading lead">Add New Career Strand</p>
                    <p>Fill in the details and click "Save Changes" to add the new career strand or "Cancel" to go back admin page.</p>
                </div>
                <form method="POST" id="add_str_form" action="{{ route('strupdate') }}">
                    <div class="modal-body">
                            {{ csrf_field() }}
                            <span class="txt5">Career Track:</span>
                            <span>
                            <select class="form-control txt6" name="add_str_trk" id="add_str_trk">
                                <option value="1">Academic Track</option>
                                <option value="2">Technical-Vocational-Livelihood Track</option>
                                <option value="3">Sports Track</option>
                                <option value="4">Arts and Design Track</option>
                            </select>
                            </span>
                            <span class="txt5">Career Strand:</span>
                            <span><input type="text" name="str_name" class="form-control txt6" required></span>
                            <span class="txt5">Description:</span>
                            <span><input type="text" name="str_desc" class="form-control txt6"></span>
                            <span class="txt5">Category (college,work,business):</span>
                            <span><input type="text" name="str_cat" class="form-control txt6" required></span>
                    </div>
                    <div class="modal-footer">
                        <button id="add_str_btn" type="submit" class="btn btn-primary">Save Changes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                    <input type="text" name="add_str_id" id="add_str_id" value="-1" hidden>
                    <input type="text" name="add_str_trk_id" id="add_str_trk_id" hidden>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit_str_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="heading lead">Edit Strand Details</p>
                    <p>Fill in the editable fields and click "Save Changes" or "Cancel" to go back admin page.</p>
                </div>
                <form method="POST" id="edit_str_form" action="{{ route('strupdate') }}">
                    <div class="modal-body">
                            {{ csrf_field() }}
                            <span class="txt5">Career Track:</span>
                            <span>
                            <select class="form-control txt6" name="edit_str_trk" id="edit_str_trk">
                                <option value="1">Academic Track</option>
                                <option value="2">Technical-Vocational-Livelihood Track</option>
                                <option value="3">Sports Track</option>
                                <option value="4">Arts and Design Track</option>
                            </select>
                            </span>
                            <span class="txt5">Career Strand:</span>
                            <span><input type="text" name="str_name" id="str_name" class="form-control txt6"></span>
                            <span class="txt5">Description:</span>
                            <span><input type="text" name="str_desc" id="str_desc" class="form-control txt6"></span>
                            <span class="txt5">Category (college,work,business):</span>
                            <span><input type="text" name="str_cat" id="str_cat" class="form-control txt6"></span>
                    </div>
                    <div class="modal-footer">
                        <button id="edit_str_btn" type="submit" class="btn btn-primary">Save Changes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                    <input type="text" name="edit_str_id" id="edit_str_id" hidden>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delete_str_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="heading lead">Delete Career Strand</p>
                    <p>Are you sure you want to delete this strand?</p>
                </div>
                <form method="POST" id="delete_str_form" action="{{ route('strupdate') }}">
                    <div class="modal-body">
                            {{ csrf_field() }}
                            <span class="txt5">Career Strand ID:</span>
                            <span><input type="text" name="delete_str_id" id="delete_str_id" class="form-control txt6" readonly></span>
                            <span class="txt5">Career Strand:</span>
                            <span><input type="text" name="del_str_name" id="del_str_name" class="form-control txt6" readonly></span>
                    </div>
                    <div class="modal-footer">
                        <button id="delete_str_btn" type="submit" class="btn btn-primary">Confirm Delete</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Career Strands to School Mapping Modal-->
    <div class="modal fade" id="add_strsch_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="heading lead">New Career Strand Offering</p>
                    <p>Fill in the details and click "Save Changes" to add the new career strand or "Cancel" to go back admin page.</p>
                </div>
                <form method="POST" id="add_strsch_form" action="{{ route('strschupdate') }}">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <span class="txt5">School:</span>
                        <span><input type="text" name="add_strsch" id="add_strsch" class="form-control txt6" readonly></span>
                        <span class="txt5">Select Career Strand:</span>
                        <span>
                            <select class="form-control txt6" name="strsch_name" id="strsch_name">
                                @if(isset($strands))
                                @foreach ($strands as $strand)
                                    <option value="{{ $strand->id }}">{{ $strand->strand }}</option>
                                @endforeach
                                @endif
                            </select>
                        </span>
                    </div>
                    <div class="modal-footer">
                        <button id="add_strsch_btn" type="submit" class="btn btn-primary">Save Changes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                    <input type="text" name="add_strsch_id" id="add_strsch_id" value="-1" hidden>
                    <input type="text" name="add_strsch_name_id" id="add_strsch_name_id" hidden>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delete_strsch_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="heading lead">Delete Career Strand Offering</p>
                    <p>Are you sure you want to delete this course offering from your school?</p>
                </div>
                <form method="POST" id="delete_strsch_form" action="{{ route('strschupdate') }}">
                    <div class="modal-body">
                            {{ csrf_field() }}
                            <span class="txt5">Career Strand ID:</span>
                            <span><input type="text" name="delete_strsch_id_1" id="delete_strsch_id_1" class="form-control txt6" readonly></span>
                            <span class="txt5">Career Strand:</span>
                            <span><input type="text" name="del_strsch_name" id="del_strsch_name" class="form-control txt6" readonly></span>
                    </div>
                    <div class="modal-footer">
                        <button id="delete_strsch_btn" type="submit" class="btn btn-primary">Confirm Delete</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                    <input type="text" name="delete_strsch_id_2" id="delete_strsch_id_2" hidden>
                </form>
            </div>
        </div>
    </div>

    <!-- Career Strands to Personalities Mapping Modal-->
    <div class="modal fade" id="add_strper_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="heading lead">New Career Strand-Personality Mapping</p>
                    <p>Fill in the details and click "Save Changes" to add the new career strand or "Cancel" to go back admin page.</p>
                </div>
                <form method="POST" id="add_strper_form" action="{{ route('strperupdate') }}">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <span class="txt5">Personality Type:</span>
                        <span><input type="text" name="add_strper" id="add_strper" class="form-control txt6" readonly></span>
                        <span class="txt5">Select Career Strand:</span>
                        <span>
                            <select class="form-control txt6" name="strper_name" id="strper_name">
                                @if(isset($strands))
                                @foreach ($strands as $strand)
                                    <option value="{{ $strand->id }}">{{ $strand->strand }}</option>
                                @endforeach
                                @endif
                            </select>
                        </span>
                    </div>
                    <div class="modal-footer">
                        <button id="add_strper_btn" type="submit" class="btn btn-primary">Save Changes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                    <input type="text" name="add_strper_id" id="add_strper_id" value="-1" hidden>
                    <input type="text" name="add_strper_name_id" id="add_strper_name_id" hidden>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delete_strper_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="heading lead">Delete Strand-Personality Mapping</p>
                    <p>Are you sure you want to delete this strand-personality mapping?</p>
                </div>
                <form method="POST" id="delete_strper_form" action="{{ route('strperupdate') }}">
                    <div class="modal-body">
                            {{ csrf_field() }}
                            <span class="txt5">Career Strand ID:</span>
                            <span><input type="text" name="delete_strper_id_1" id="delete_strper_id_1" class="form-control txt6" readonly></span>
                            <span class="txt5">Career Strand:</span>
                            <span><input type="text" name="del_strper_name" id="del_strper_name" class="form-control txt6" readonly></span>
                    </div>
                    <div class="modal-footer">
                        <button id="delete_strper_btn" type="submit" class="btn btn-primary">Confirm Delete</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                    <input type="text" name="delete_strper_id_2" id="delete_strper_id_2" hidden>
                </form>
            </div>
        </div>
    </div>

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
			<h4 align="center">Content Management</h4>
			<br>
			<p align="center">To search and edit the contents of the database; select the query by criteria, select subquery if applicable, and click "Search".</p>
			<div align="center">
				<div class="h_search_lookup">
					<form method="POST" id="search_form">
						{{ csrf_field() }}
						<table>
							<tr>
								<td style="width:250px;">
									<select class="form-control txt6" name="query_1" id="query_1">
                                        <option value="">Select Query Type</option>
                                        <option value="1">Query Personality Types</option>
                                        <option value="2">Query Personality Test Questions</option>
                                        <option value="3">Query Schools</option>
                                        <option value="7">Query All Career Strands</option>
                                        <option value="4">Query Strands By School</option>
                                        <option value="5">Query Strands By Personality</option>
                                        <option value="6">Query User Roles</option>
	                        		</select>
								</td>
								<td style="width:250px;">
									<select class="form-control txt6" name="query_2" id="query_2">
	                        		</select>
								</td>
								<td style="width:10px;"></td>
								<td>
									<button type="button" id="search_btn" class="button form-control">Search</button>
								</td>
							</tr>
						</table>
	            	</form>
				</div>
			</div>
		</div>

		<br>
		<br>
        @if (isset($result_type) && $result_type == "roles")
		<div class="technology_1 row">
			@if (isset($query_details) && count ($query_details) > 0)
				<br>
                <p><b>NOTES:</b></p>
                <a id="add_role_lnk" class="txt4"><b>1. <u>Click here to add a new role</u></b>.</a>
                <p class="txt5">2. To edit or delete a user role, click on the corresponding action.</p>
                <br>
				<form method="POST" id="display_form">
					{{ csrf_field() }}
					<table id="search_results" class="txt5">
						<tr>
							<th style="text-align:center">ID</th>
							<th style="text-align:center">Name</th>
							<th style="text-align:center">Description</th>
                            <th style="text-align:center">Action</th>
						</tr>
                        <?php $ctr = 0; ?>
						@foreach ($query_details as $detail)
						<tr>
							<td>
								@if (isset($detail->id))
								{{ $detail->id }}
								@endif
							</td>
                            <td class="txt5">{{ $detail->rolename }}</td>
                            <td class="txt5">{{ $detail->description }}</td>
                            <td style="text-align:center">
                                <a id="edit_role_lnk-{{ $detail->id }}" data-id="{{ $ctr }}-{{ $detail->id }}" class="txt4">Edit</a>
                                <a class="txt5">,</a>
                                <a id="delete_role_lnk-{{ $detail->id }}" data-id="{{ $ctr }}-{{ $detail->id }}" class="txt4">Delete</a>
                            </td>
						</tr>
                        <?php $ctr++; ?>
						@endforeach
					</table>
                    <input name="item_id" id="item_id" type="text" hidden>
				</form>
			@else
				<p align="center" class="txt7">No data found. Try refining your search.</p>
			@endif
		</div>
        @endif

        @if (isset($result_type) && $result_type == "personalities")
        <div class="technology_1 row">
            @if (isset($query_details) && count ($query_details) > 0)
                <br>
                <p><b>NOTES:</b></p>
                <a id="add_role_lnk" class="txt5">1. There are 16 MBTI Types and you can no longer add or delete.</a>
                <p class="txt5">2. You are only allowed to edit the description by click on the corresponding action.</p>
                <br>
                <form method="POST" id="display_form">
                    {{ csrf_field() }}
                    <table id="search_results" class="txt5">
                        <tr>
                            <th style="text-align:center">ID</th>
                            <th style="text-align:center">Name</th>
                            <th style="text-align:center">Description</th>
                            <th style="text-align:center">Long Description</th>
                            <th style="text-align:center">Action</th>
                        </tr>
                        <?php $ctr = 0; ?>
                        @foreach ($query_details as $detail)
                        <tr>
                            <td>
                                @if (isset($detail->id))
                                {{ $detail->id }}
                                @endif
                            </td>
                            <td class="txt5">{{ $detail->personality_type }}</td>
                            <td class="txt5">{{ $detail->short_desc }}</td>
                            <td class="txt5">{{ $detail->long_desc }}</td>
                            <td style="text-align:center">
                                <a id="edit_per_lnk-{{ $detail->id }}" data-id="{{ $ctr }}-{{ $detail->id }}" class="txt4">Edit</a>
                            </td>
                        </tr>
                        <?php $ctr++; ?>
                        @endforeach
                    </table>
                    <input name="item_id" id="item_id" type="text" hidden>
                </form>
            @else
                <p align="center" class="txt7">No data found. Try refining your search.</p>
            @endif
        </div>
        @endif

        @if (isset($result_type) && $result_type == "schools")
        <div class="technology_1 row">
            @if (isset($query_details) && count ($query_details) > 0)
                <br>
                <p><b>NOTES:</b></p>
                <a id="add_sch_lnk" class="txt4"><b>1. <u>Click here to add a new school</u></b>.</a>
                <p class="txt5">2. To edit or delete a school record, click on the corresponding action.</p>
                <br>
                <form method="POST" id="display_form">
                    {{ csrf_field() }}
                    <table id="search_results" class="txt5">
                        <tr>
                            <th style="text-align:center">Name</th>
                            <th style="text-align:center">Address</th>
                            <th style="text-align:center">Contact Person</th>
                            <th style="text-align:center">Contact No</th>
                            <th style="text-align:center">Location Map</th>
                            <th style="text-align:center">Action</th>
                        </tr>
                        <?php $ctr = 0; ?>
                        @foreach ($query_details as $detail)
                        <tr>
                            <td class="txt5">{{ $detail->name }}</td>
                            <td class="txt5">{{ $detail->address }}</td>
                            <td class="txt5">{{ $detail->contact_person }}</td>
                            <td class="txt5">{{ $detail->contact_no }}</td>
                            <td class="txt5">{{ $detail->map }}</td>
                            <td style="text-align:center">
                                <a id="edit_sch_lnk-{{ $detail->id }}" data-id="{{ $ctr }}-{{ $detail->id }}" class="txt4">Edit</a>
                                <a class="txt5">,</a>
                                <a id="delete_sch_lnk-{{ $detail->id }}" data-id="{{ $ctr }}-{{ $detail->id }}" class="txt4">Delete</a>
                            </td>
                        </tr>
                        <?php $ctr++; ?>
                        @endforeach
                    </table>
                    <input name="item_id" id="item_id" type="text" hidden>
                </form>
            @else
                <p align="center" class="txt7">No data found. Try refining your search.</p>
            @endif
        </div>
        @endif

        @if (isset($result_type) && $result_type == "questions")
        <div class="technology_1 row">
            @if (isset($query_details) && count ($query_details) > 0)
                <br>
                <p><b>NOTES:</b></p>
                <a id="add_qst_lnk" class="txt4"><b>1. <u>Click here to add a personality test question</u></b>.</a>
                <p class="txt5">2. To edit or delete a personality test question, click on the corresponding action.</p>
                <br>
                <form method="POST" id="display_form">
                    {{ csrf_field() }}
                    <table id="search_results" class="txt5">
                        <tr>
                            <th style="text-align:center">Question</th>
                            <th style="text-align:center">MBTI Type</th>
                            <th style="text-align:center">Anwer Choice A</th>
                            <th style="text-align:center">Anwer Choice B</th>
                            <th style="text-align:center">Action</th>
                        </tr>
                        <?php $ctr = 0; ?>
                        @foreach ($query_details as $detail)
                        <tr>
                            <td class="txt5">{{ $detail->question }}</td>
                            <td class="txt5">{{ $detail->mbti }}</td>
                            <td class="txt5">{{ $detail->answer_a }}</td>
                            <td class="txt5">{{ $detail->answer_b }}</td>
                            <td style="text-align:center">
                                <a id="edit_qst_lnk-{{ $detail->id }}" data-id="{{ $ctr }}-{{ $detail->id }}" class="txt4">Edit</a>
                                <a class="txt5">,</a>
                                <a id="delete_qst_lnk-{{ $detail->id }}" data-id="{{ $ctr }}-{{ $detail->id }}" class="txt4">Delete</a>
                            </td>
                        </tr>
                        <?php $ctr++; ?>
                        @endforeach
                    </table>
                    <input name="item_id" id="item_id" type="text" hidden>
                    <input name="qst_mbti_value" id="qst_mbti_value" type="text" value="{{ $query_details[0]->mbti }}" hidden>
                </form>
            @else
                <p align="center" class="txt7">No data found. Try refining your search.</p>
            @endif
        </div>
        @endif

        @if (isset($result_type) && $result_type == "strands")
        <div class="technology_1 row">
            @if (isset($query_details) && count ($query_details) > 0)
                <br>
                <p><b>NOTES:</b></p>
                <a id="add_str_lnk" class="txt4"><b>1. <u>Click here to add a new strand.</u></b></a>
                <p class="txt5">2. To edit or delete a strand, click on the corresponding action.</p>
                <br>
                <form method="POST" id="display_form">
                    {{ csrf_field() }}
                    <table id="search_results" class="txt5">
                        <tr>
                            <th style="text-align:center">Career Track</th>
                            <th style="text-align:center">Career Strand</th>
                            <th style="text-align:center">Strand Description</th>
                            <th style="text-align:center">Strand Category</th>
                            <th style="text-align:center">Action</th>
                        </tr>
                        <?php $ctr = 0; ?>
                        @foreach ($query_details as $detail)
                        <tr>
                            <td class="txt5">{{ $detail->track }}</td>
                            <td class="txt5">{{ $detail->strand }}</td>
                            <td class="txt5">{{ $detail->description }}</td>
                            <td class="txt5">{{ $detail->category }}</td>
                            <td style="text-align:center">
                                <a id="edit_str_lnk-{{ $detail->id }}" data-id="{{ $ctr }}-{{ $detail->id }}" class="txt4">Edit</a>
                                <a class="txt5">,</a>
                                <a id="delete_str_lnk-{{ $detail->id }}" data-id="{{ $ctr }}-{{ $detail->id }}" class="txt4">Delete</a>
                            </td>
                        </tr>
                        <?php $ctr++; ?>
                        @endforeach
                    </table>
                    <input name="item_id" id="item_id" type="text" hidden>
                </form>
            @else
                <p align="center" class="txt7">No data found. Try refining your search.</p>
            @endif
        </div>
        @endif

        @if (isset($result_type) && $result_type == "strand_school_map")
        <div class="technology_1 row">
            @if (isset($query_details) && count ($query_details) > 0)
                <br>
                <p><b>NOTES:</b></p>
                <a id="add_strsch_lnk" class="txt4"><b>1. <u>Click here to add a new strand offering for your school</u></b>.</a>
                <p class="txt5">2. You cannot edit strand details in this page, use the "Query All Strands" option.</p>
                <p class="txt5">3. To delete a strand offering from your school, click on the corresponding action.</p>
                <br>
                <form method="POST" id="display_form">
                    {{ csrf_field() }}
                    <table id="search_results" class="txt5">
                        <tr>
                            <th style="text-align:center">School</th>
                            <th style="text-align:center">Career Track</th>
                            <th style="text-align:center">Career Strand</th>
                            <th style="text-align:center">Action</th>
                        </tr>
                        <?php $ctr = 0; ?>
                        @foreach ($query_details as $detail)
                        <tr>
                            <td class="txt5">{{ $detail->school }}</td>
                            <td class="txt5">{{ $detail->track }}</td>
                            <td class="txt5">{{ $detail->strand }}</td>
                            <td style="text-align:center">
                                <a id="delete_strsch_lnk-{{ $detail->school_id }}-{{ $detail->career_strands_id }}" data-id="{{ $ctr }}-{{ $detail->school_id }}-{{ $detail->career_strands_id }}" class="txt4">Delete</a>
                            </td>
                        </tr>
                        <?php $ctr++; ?>
                        @endforeach
                    </table>
                    <input name="item_id" id="item_id" type="text" hidden>
                </form>
            @else
                <p align="center" class="txt7">No data found. Try refining your search.</p>
            @endif
        </div>
        @endif

        @if (isset($result_type) && $result_type == "strand_personality_map")
        <div class="technology_1 row">
            @if (isset($query_details) && count ($query_details) > 0)
                <br>
                <p><b>NOTES:</b></p>
                <a id="add_strper_lnk" class="txt4"><b>1. <u>Click here to add a strand-personality mapping</u></b>.</a>
                <p class="txt5">2. You cannot edit strand details in this page, use the "Query All Strands" option.</p>
                <p class="txt5">3. To delete a strand-personality mapping, click on the corresponding action.</p>
                <br>
                <form method="POST" id="display_form">
                    {{ csrf_field() }}
                    <table id="search_results" class="txt5">
                        <tr>
                            <th style="text-align:center">Personality Type</th>
                            <th style="text-align:center">Career Track</th>
                            <th style="text-align:center">Career Strand</th>
                            <th style="text-align:center">Action</th>
                        </tr>
                        <?php $ctr = 0; ?>
                        @foreach ($query_details as $detail)
                        <tr>
                            <td class="txt5">{{ $detail->personality_type }}</td>
                            <td class="txt5">{{ $detail->track }}</td>
                            <td class="txt5">{{ $detail->strand }}</td>
                            <td style="text-align:center">
                                <a id="delete_strper_lnk-{{ $detail->id }}-{{ $detail->career_strands_id }}" data-id="{{ $ctr }}-{{ $detail->id }}-{{ $detail->career_strands_id }}" class="txt4">Delete</a>
                            </td>
                        </tr>
                        <?php $ctr++; ?>
                        @endforeach
                    </table>
                    <input name="item_id" id="item_id" type="text" hidden>
                </form>
            @else
                <p align="center" class="txt7">No data found. Try refining your search.</p>
            @endif
        </div>
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
    $(document).ready(function() {

        // Script to submit the query form.
        $("#search_btn").on("click", function() {
            var query_1 = $('#query_1 :selected').val();
            var query_2 = $('#query_2 :selected').val();

            if (query_1 != "" && query_2 != "") {
                $("#search_form").attr('action', '{{ route('admin_3') }}');
                $("#search_form").submit();
            }
        });

        // Script to fill up the subquery.
        $('#query_1').change(function() {
            var query = $(this).val();

            if (query == "1" || query == "3" || query == "6" || query == "7") {
                $('#query_2').empty();
                var arrayList = [
                    {"id": "1", "name": "All"},
                ];

                for (var i = 0; i <= arrayList.length; i++) {
                    $('#query_2').append('<option value="' + arrayList[i].id + '">' + arrayList[i].name + '</option>');
                }
            }
            else if (query == "2") {
                $('#query_2').empty();
                var arrayList = [
                    {"id": "ei", "name": "Questions for Extrovert/Introvert"},
                    {"id": "sn", "name": "Questions for Sensing/Intuition"},
                    {"id": "tf", "name": "Questions for Thinking/Feeling"},
                    {"id": "jp", "name": "Questions for Judging/Perceiving"}
                ];

                for (var i = 0; i <= arrayList.length; i++) {
                    $('#query_2').append('<option value="' + arrayList[i].id + '">' + arrayList[i].name + '</option>');
                }
            }
            else if (query == "4") {
                // Fill up schools select option.
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('strschupdate.fetch') }}",
                    method:"POST",
                    data:{query:query, _token:_token},
                    success:function(data){
                        $('#query_2').fadeIn();
                        $('#query_2').html(data);
                    }
                });
            }
            else if (query == "5") {
                // Fill up personalities select option.
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('strperupdate.fetch') }}",
                    method:"POST",
                    data:{query:query, _token:_token},
                    success:function(data){
                        $('#query_2').fadeIn();
                        $('#query_2').html(data);
                    }
                });
            }
        });

// -----------------------------------------------
// Script for roles.
// -----------------------------------------------
        $("#add_role_lnk").click(function() {
            $('#add_role_modal').modal('show');
        });

        $("[id^=edit_role_lnk-]").on("click", function() {
            var data_item = <?php if(isset($query_details)) { echo json_encode($query_details); } else { echo "none";}?>;
            var data_id = $(this).data("id").split("-");

            $('#edit_role_id').val(data_id[1]);
            $('#rolename').val(data_item[data_id[0]]['rolename']);
            $('#description').val(data_item[data_id[0]]['description']);
            $('#edit_role_modal').modal('show');
        });

        $("[id^=delete_role_lnk-]").on("click", function() {
            var data_item = <?php if(isset($query_details)) { echo json_encode($query_details); } else { echo "none";}?>;
            var data_id = $(this).data("id").split("-");

            $('#delete_role_id').val(data_id[1]);
            $('#delete_rolename').val(data_item[data_id[0]]['rolename']);
            $('#delete_role_modal').modal('show');
        });
// -----------------------------------------------

// -----------------------------------------------
// Script for personality.
// -----------------------------------------------
        $("[id^=edit_per_lnk-]").on("click", function() {
            var data_item = <?php if(isset($query_details)) { echo json_encode($query_details); } else { echo "none";}?>;

            var data_id = $(this).data("id").split("-");

            $('#edit_per_id').val(data_id[1]);
            $('#per_name').val(data_item[data_id[0]]['personality_type']);
            $('#per_desc').val(data_item[data_id[0]]['short_desc']);
            $('#per_long_desc').val(data_item[data_id[0]]['long_desc']);
            $('#edit_per_modal').modal('show');
        });
// -----------------------------------------------

// -----------------------------------------------
// Script for schools.
// -----------------------------------------------
        $("#add_sch_lnk").click(function() {
            $('#add_sch_modal').modal('show');
        });

        $("[id^=edit_sch_lnk-]").on("click", function() {
            var data_item = <?php if(isset($query_details)) { echo json_encode($query_details); } else { echo "none";}?>;
            var data_id = $(this).data("id").split("-");
            
            $('#edit_sch_id').val(data_id[1]);
            $('#sch_name').val(data_item[data_id[0]]['name']);
            $('#sch_address').val(data_item[data_id[0]]['address']);
            $('#sch_contact').val(data_item[data_id[0]]['contact_no']);
            $('#sch_person').val(data_item[data_id[0]]['contact_person']);
            $('#sch_map').val(data_item[data_id[0]]['map']);
            $('#edit_sch_modal').modal('show');
        });

        $("[id^=delete_sch_lnk-]").on("click", function() {
            var data_item = <?php if(isset($query_details)) { echo json_encode($query_details); } else { echo "none";}?>;
            var data_id = $(this).data("id").split("-");

            $('#delete_sch_id').val(data_id[1]);
            $('#del_sch_name').val(data_item[data_id[0]]['name']);
            $('#delete_sch_modal').modal('show');
        });
// -----------------------------------------------

// -----------------------------------------------
// Script for personality questions.
// -----------------------------------------------
        $("#add_qst_lnk").click(function() {
            var mbti = $("#qst_mbti_value").val();
            $("#add_qst_mbti").val(mbti);
            $('#add_qst_modal').modal('show');
        });

        $("[id^=edit_qst_lnk-]").on("click", function() {
            var data_item = <?php if(isset($query_details)) { echo json_encode($query_details); } else { echo "none";}?>;
            var data_id = $(this).data("id").split("-");
            var mbti = $("#qst_mbti_value").val();

            $('#edit_qst_id').val(data_id[1]);
            $('#edit_qst_mbti').val(mbti);
            $('#qst_question').val(data_item[data_id[0]]['question']);
            $('#qst_mbti').val(data_item[data_id[0]]['mbti']);
            $('#qst_answer_a').val(data_item[data_id[0]]['answer_a']);
            $('#qst_answer_b').val(data_item[data_id[0]]['answer_b']);
            $('#edit_qst_modal').modal('show');
        });

        $("[id^=delete_qst_lnk-]").on("click", function() {
            var data_item = <?php if(isset($query_details)) { echo json_encode($query_details); } else { echo "none";}?>;
            var data_id = $(this).data("id").split("-");

            $('#delete_qst_id').val(data_id[1]);
            $('#del_qst_name').val(data_item[data_id[0]]['question']);
            $('#delete_qst_modal').modal('show');
        });

        $("#add_qst_btn").click(function() {
            var qst_mbti = $('#add_qst_mbti :selected').val();
            $("#add_qst_mbti_type").val(qst_mbti);
        });
// -----------------------------------------------

// -----------------------------------------------
// Script for track and strand.
// -----------------------------------------------
        $("#add_str_lnk").click(function() {
            var id = $("#add_str_trk").val();
            $("#add_str_trk_id").val(id);
            $('#add_str_modal').modal('show');
        });

        $("[id^=edit_str_lnk-]").on("click", function() {
            var data_item = <?php if(isset($query_details)) { echo json_encode($query_details); } else { echo "none";}?>;
            var data_id = $(this).data("id").split("-");

            $('#edit_str_id').val(data_id[1]);
            $('#edit_str_trk').val(data_item[data_id[0]]['career_tracks_id']);
            $('#str_name').val(data_item[data_id[0]]['strand']);
            $('#str_desc').val(data_item[data_id[0]]['description']);
            $('#str_cat').val(data_item[data_id[0]]['category']);
            $('#edit_str_modal').modal('show');
        });

        $("[id^=delete_str_lnk-]").on("click", function() {
            var data_item = <?php if(isset($query_details)) { echo json_encode($query_details); } else { echo "none";}?>;
            var data_id = $(this).data("id").split("-");

            $('#delete_str_id').val(data_id[1]);
            $('#del_str_name').val(data_item[data_id[0]]['strand']);
            $('#delete_str_modal').modal('show');
        });

        $("#add_str_btn").click(function() {
            var id = $('#add_str_trk :selected').val();
            $("#add_str_trk_id").val(id);
        });
// -----------------------------------------------

// -----------------------------------------------
// Script for strand-school mapping.
// -----------------------------------------------
        $("#add_strsch_lnk").click(function() {
            var data_item = <?php if(isset($query_details)) { echo json_encode($query_details); } else { echo "none";}?>;

            $('#add_strsch').val(data_item[0]['school']);
            $('#add_strsch_id').val(data_item[0]['school_id']);
            $('#add_strsch_modal').modal('show');
        });

        $("[id^=delete_strsch_lnk-]").on("click", function() {
            var data_item = <?php if(isset($query_details)) { echo json_encode($query_details); } else { echo "none";}?>;
            var data_id = $(this).data("id").split("-");
            var school_id = data_id[1];
            var strand_id = data_id[2];

            $('#delete_strsch_id_1').val(strand_id);
            $('#delete_strsch_id_2').val(school_id);
            $('#del_strsch_name').val(data_item[data_id[0]]['strand']);
            $('#delete_strsch_modal').modal('show');
        });

        $("#add_strsch_btn").click(function() {
            var strand_id = $('#strsch_name :selected').val();
            $("#add_strsch_name_id").val(strand_id);
        });
// -----------------------------------------------

// -----------------------------------------------
// Script for strand-personality mapping.
// -----------------------------------------------
        $("#add_strper_lnk").click(function() {
            var data_item = <?php if(isset($query_details)) { echo json_encode($query_details); } else { echo "none";}?>;

            $('#add_strper').val(data_item[0]['personality_type']);
            $('#add_strper_id').val(data_item[0]['id']);
            $('#add_strper_modal').modal('show');
        });

        $("[id^=delete_strper_lnk-]").on("click", function() {
            var data_item = <?php if(isset($query_details)) { echo json_encode($query_details); } else { echo "none";}?>;
            var data_id = $(this).data("id").split("-");
            var personality_id = data_id[1];
            var strand_id = data_id[2];

            $('#delete_strper_id_1').val(strand_id);
            $('#delete_strper_id_2').val(personality_id);
            $('#del_strper_name').val(data_item[data_id[0]]['strand']);
            $('#delete_strper_modal').modal('show');
        });

        $("#add_strper_btn").click(function() {
            var strand_id = $('#strper_name :selected').val();
            $("#add_strper_name_id").val(strand_id);
        });
// -----------------------------------------------
    });
</script>