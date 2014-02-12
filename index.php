<html>
<head>
	<title>Mayank</title>
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
	</style>
</head>
<body>
	<form name"form" method="post" action="">
		<table border = 1 cellspacing = 5 cellpadding =5>
			<tr><th colspan = 2 style="text-align:center; font-size:24px; letter-spacing:2px;">AET Admission Form</th></tr>
			<tr>
				<th>Name</th>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<th>Father's / Husband's Name</th>
				<td><input type="text" name="father_or_husband_name"></td>
			</tr>
			<tr>
				<th>Mother's Name</th>
				<td><input type="text" name="mother_name"></td>
			</tr>
			<tr>
				<th>Date of Birth</th>
				<td><input type="text" name="dob"></td>
			</tr>
			<tr>
				<th>Permanent Address</th>
				<td><textarea name="permanent_address" rows="4" cols="25"></textarea></td>
			</tr>
			<tr>
				<th>Correspondence Address</th>
				<td><textarea name="correspondence_address" rows="4" cols="25"></textarea></td>
			</tr>
			<tr>
				<th>Contact No.</th>
				<td><input type="text" name="contact_no"></td>
			</tr>
			<tr>
				<th>Email</th>
				<td><input type="text" name="email"></td>
			</tr>
			<tr>
				<th>Marital Status</th>
				<td>
					<input type="radio" name="marital_status" value="Married">Married
					<input type="radio" name="marital_status" value="Un-Married">Un-Married
				</td>
			</tr>
			<tr>
				<th>Sex</th>
				<td>
					<input type="radio" name="sex" value="Male">Male
					<input type="radio" name="sex" value="Female">Female
				</td>
			</tr>
			<tr>
				<th>Nationality</th>
				<td>
					<input type="radio" name="nationality" value="Indian">Indian
					<input type="radio" name="nationality" value="Non-Resident Indian (N.R.I)">Non-Resident Indian (N.R.I)
				</td>
			</tr>
			<tr>
				<th>University / College</th>
				<td>
					<select name="university_or_college">
						<option value="ABC">ABC</option>
					</select>
				</td>
			</tr>
			<tr>
				<th>Course Selection</th>
				<td>
					<select name="course_selection">
						<option value="ABC">ABC</option>
					</select>
				</td>
			</tr>
			<tr>
				<th>Specialization</th>
				<td><input type="text" name=""></td>
			</tr>
			<tr>
				<td colspan=2 style="text-align:center;"><input type="submit" name="submit" value="Submit and Pay"></td>
			</tr>
		</table>
	</form>
</body>
</html>