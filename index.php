<html>
<head>
	<title>Mayank</title>
	<script src="lib/jquery.js"></script>
	<script src="dist/jquery.validate.js"></script>
	<script>
	$().ready(function() {
		// validate form on keyup and submit
		$("#mayankForm").validate({
			rules: {
				name: "required",
				father_or_husband_name: "required",
				mother_name: "required",
				dob:{
					required: true,
					dateISO: true
				},
				permanent_address: "required",
				contact_no: {
					required: true,
					digits: true
				},
				email: {
					required: true,
					email: true
				},
				marital_status: "required",
				specialization: "required"
			},
			messages: {
				name: "Please enter your Name",
				father_or_husband_name: "Please enter your Father's or Husband's Name",
				mother_name: "Please enter your Mother's Name",
				dob: {
					required: "Please enter your Date of Birth",
					dateISO: "Please enter date in YYYY-MM-DD format"
				},
				permanent_address: "Please enter your Permanent Address",
				contact_no: {
					required: "Please enter your Contact No.",
					digits: "Only Digits Allowed"
				},	
				email: "Please enter a valid email address",
				marital_status: "Please Select your Marital Status",
				sex: "Please Select any one",
				nationality: "Plesae select your nationality",
				university_or_college: "Please Select one University",
				course_selection: "Please Select one Course",
				specialization: "Please enter your Specialization"
			}
		});
	});
	</script>
	<style type="text/css">
	body {
		font-family: "Tahoma";
		background-color: #fcfbf1;
	}
	form {
		border: 1px solid #ccc;
	}
	table {
		width: 80%;
		margin-left: 50px;
	}
	th {
		text-align: left;
	}
	label.error {
		color: #FFF;
		background-color: red;
		border: 1px solid #FFF;
		border-radius: 8px;
		-moz-border-radius: 8px;
		-webkit-border-radius: 8px;
		padding: 5px;
		margin-left: 20px;
	}
	.loading {
		float:right; 
		background:url(ajax-loader.gif) no-repeat 1px; 
		height:28px; 
		width:28px; 
		display:none;
	}
	
	</style>
</head>
<body>
	
	<form class="cmxform" name"form" id="mayankForm" method="post" enctype="multipart/form-data" action="process_form.php">
		<table border = 1 cellspacing = 5 cellpadding =5>
			<tr><th colspan = 2 style="text-align:center; font-size:24px; letter-spacing:2px;">Form</th></tr>
			<tr>
				<th>Name</th>
				<td><input type="text" name="name" id="name"></td>
			</tr>
			<tr>
				<th>Father's / Husband's Name</th>
				<td><input type="text" name="father_or_husband_name" id="father_or_husband_name"></td>
			</tr>
			<tr>
				<th>Mother's Name</th>
				<td><input type="text" name="mother_name" id="mother_name"></td>
			</tr>
			<tr>
				<th>Date of Birth</th>
				<td><input type="text" name="dob" id="dob"></td>
			</tr>
			<tr>
				<th>Permanent Address</th>
				<td><textarea name="permanent_address" id="permanent_address" rows="4" cols="25"></textarea></td>
			</tr>
			<tr>
				<th>Correspondence Address</th>
				<td><textarea name="correspondence_address" id="correspondence_address" rows="4" cols="25"></textarea></td>
			</tr>
			<tr>
				<th>Contact No.</th>
				<td><input type="text" name="contact_no" id="contact_no"></td>
			</tr>
			<tr>
				<th>Email</th>
				<td><input type="text" name="email" id="email"></td>
			</tr>
			<tr>
				<th>Marital Status</th>
				<td>
					<input type="radio" name="marital_status" id="marital_status_m" value="Married" >Married
					<input type="radio" name="marital_status" id="marital_status_um" value="Un-Married">Un-Married
				</td>
			</tr>
			<tr>
				<th>Sex</th>
				<td>
					<input type="radio" name="sex" id="sex_m" value="Male" required>Male
					<input type="radio" name="sex" id="sex_f" value="Female">Female
				</td>
			</tr>
			<tr>
				<th>Nationality</th>
				<td>
					<input type="radio" name="nationality" id="nationality_indian" value="Indian" required>Indian
					<input type="radio" name="nationality" id="nationality_nri" value="Non-Resident Indian (N.R.I)">Non-Resident Indian (N.R.I)
				</td>
			</tr>
			<tr>
				<th>University / College</th>
				<td>
					<select name="university_or_college" id="university_or_college" required>
						<option value="">Please Select any</option>
						<option value="Abc">Abc</option>

					</select>
				</td>
			</tr>
			<tr>
				<th>Course Selection</th>
				<td>
					<select name="course_selection" id="course_selection" required>
						<option value="">Please Select any</option>
						<option value="Abc">Abc</option>
					</select>
				</td>
			</tr>
			<tr>
				<th>Specialization</th>
				<td><input type="text" name="specialization" id="specialization"></td>
			</tr>
			<tr>
				<th>Upload Documents</th>
				<td><input type="file" name="upload_file" id="upload_file">
					<span style="color:red;">(Only Image or Zip file allowed, size must be less than 8 MB)</span>
				</td>
			</tr>
			<tr>
				<td colspan=2 style="text-align:center;"><input type="submit" class="submit" name="submit" value="Submit and Pay"></td>
			</tr>
			<div class="loading"></div>
		</table>
	</form>
</body>
</html>