<!DOCTYPE HTML>
<html>

<head>
	<style>
		table {
		  font-family: arial, sans-serif;
		  font-size:12px;
		  border-collapse: collapse;
		  width: 100%;
		}

		td, th {
		  border: 1px solid #dddddd;
		  text-align: left;
		  padding: 3px;
		}
	</style>
</head>

<body>
	<h3 align="center">ENROLLMENT FORM</h4>
	<table>
		<tr>
			<td>School:</td>
			<td><b><u>{{ $enroll_details[0]->school}}</u></b></td>
			<td>School Year:</td>
			<td><b><u>{{ $enroll_details[0]->school_year}}</u></b></td>
		</tr>
		<tr>
			<td>Grade Level:</td>
			<td><b><u>{{ $enroll_details[0]->grade}}</u></b></td>
			<td>Career Strand:</td>
			<td><b><u>{{ $enroll_details[0]->course}}</u></b></td>
		</tr>
	</table>
	<br>
	<table>
		<tr>
			<th colspan="4" style="background-color:#D3D3D3">PERSONAL INFORMATION</th>
		</tr>
		<tr>
			<td>Learner Reference No. (LRN)</td>
			<td><u>{{ $user_educational_details[0]->lrn_no }}</u></td>
			<td>PSA Birth Certificate No.</td>
			<td>____________________</td>
		</tr>
		<tr>
			<td>Last Name:</td>
			<td colspan="3"><u>{{ $user_details[0]->last_name }}</u></td>
		</tr>
		<tr>
			<td>First Name:</td>
			<td colspan="3"><u>{{ $user_details[0]->first_name }}</u></td>
		</tr>
		<tr>
			<td>Middle Name:</td>
			<td colspan="3"><u>{{ $user_details[0]->middle_name }}</u></td>
		</tr>
		<tr>
			<td>Extension Name: e.g. Jr., III</td>
			<td colspan="3"><u>{{ $user_details[0]->extension_name }}</u></td>
		</tr>
		<tr>
			<td>Date of Birth:</td>
			<td colspan="3"><u>{{ $user_details[0]->birth_date }}</u></td>
		</tr>
		<tr>
			<td>Gender:</td>
			<td><u>
				@if ($user_details[0]->sex == 'M') Male
				@else Female
				@endif
				</u></td>
			<td>Age:</td>
			<td><u>{{ $user_details[0]->age }}</u></td>
		</tr>
		<tr>
			<td>Mother Tongue:</td>
			<td colspan="3"><u>{{ $user_details[0]->mother_tongue }}</u></td>
		</tr>
		<tr>
			<td>Indigenous People (IP) Group:</td>
			<td colspan="3"><u>{{ $user_details[0]->ip_group }}</u></td>
		</tr>
	</table>
	<br>

	<table>
		<tr>
			<th colspan="4" style="background-color:#D3D3D3">RESIDENCE and CONTACT INFORMATION</th>
		</tr>
		<tr>
			<td>House Number and Street:</td>
			<td colspan="3"><u>{{ $user_details[0]->address }}</u></td>
		</tr>
		<tr>
			<td>Barangay:</td>
			<td colspan="3"><u>{{ $user_details[0]->barangay }}</u></td>
		</tr>
		<tr>
			<td>City/Municipality:</td>
			<td><u>{{ $user_details[0]->municipality }}</u></td>
			<td>Province:</td>
			<td><u>{{ $user_details[0]->province }}</u></td>
		</tr>
		<tr>
			<td>Telephone No:</td>
			<td><u>{{ $user_details[0]->mobile_no }}</u></td>
			<td>Mobile No:</td>
			<td><u>{{ $user_details[0]->tel_no }}</u></td>
		</tr>
	</table>
	<br>

	<table>
		<tr>
			<th colspan="4" style="background-color:#D3D3D3">PARENTS/GUARDIANS' INFORMATION</th>
		</tr>
		<tr>
			<td>Father's Name:</td>
			<td><u>{{ $user_guardian_details[0]->father_name }}</u></td>
			<td>Contact No:</td>
			<td><u>{{ $user_guardian_details[0]->father_contact_no }}</u></td>
		</tr>
		<tr>
			<td>Mother's Name:</td>
			<td><u>{{ $user_guardian_details[0]->mother_name }}</u></td>
			<td>Contact No:</td>
			<td><u>{{ $user_guardian_details[0]->mother_contact_no }}</u></td>
		</tr>
		<tr>
			<td>Guardian's Name:</td>
			<td><u>{{ $user_guardian_details[0]->guardian_name }}</u></td>
			<td>Contact No:</td>
			<td><u>{{ $user_guardian_details[0]->guardian_contact_no }}</u></td>
		</tr>
	</table>

	<br>
	<table>
		<tr>
			<th colspan="4" style="background-color:#D3D3D3">EDUCATIONAL BACKGROUND</th>
		</tr>
		<tr>
			<td>Previous Junior High School:</td>
			<td><u>{{ $user_educational_details[0]->prev_junior_hs }}</u></td>
			<td>Previous Junior High School Level:</td>
			<td><u>{{ $user_educational_details[0]->prev_junior_hs_level }}</u></td>
		</tr>
		<tr>
			<td>Previous Senior High School:</td>
			<td><u>{{ $user_educational_details[0]->prev_senior_hs }}</u></td>
			<td>Previous Senior High School Level:</td>
			<td><u>{{ $user_educational_details[0]->prev_senior_hs_level }}</u></td>
		</tr>
	</table>

	<br>
	<table>
		<tr>
			<td colspan="4"><b>I hereby certify that the above information given are true and correct to the best of my knowledge and I allow the Department of Education to use my child's details to create and/or update his/her learner profile in the Learner Information System. The information herein shall be treated as confidential in compliance with the Data Privacy Act of 2012.</b></td>
		</tr>
	</table>
	<br>
	<table>
		<tr>
			<td colspan="2" rowspan="4" style="text-align: center;"></td>
			<td colspan="2" rowspan="4" style="text-align: center;"></td>
		</tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr>
			<td colspan="2" style="text-align: center;">Signature Over Printed Name of Parent/Guardian</td>
			<td colspan="2" style="text-align: center;">Date</td>
		</tr>
	</table>

	<br>
	<br>
	<table>
		<tr>
			<td colspan="2" style="background-color:#D3D3D3"><u><b>To be filled up by DepEd/School Personnel only:</b></u></td>
		</tr>
		<tr>
			<td style="text-align: right;">Evaluated By:</td>
			<td>__________________________________</td>
		</tr>
		<tr>
			<td style="text-align: right;">Date of Evaluation:</td>
			<td>__________________________________</td>
		</tr>
	</table>
</body>

</html>
