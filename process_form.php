<?php
	include('db.php');
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	// define variables and set to empty values
	$name = $father_or_husband_name = $mother_name = $dob = $permanent_address = $correspondence_address = $contact_no = $email = $marital_status = $sex = $nationality = $university_or_college = $course_selection = $specialization = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = test_input($_POST["name"]);
		$father_or_husband_name = test_input($_POST["father_or_husband_name"]);
		$mother_name = test_input($_POST["mother_name"]);
		$dob = test_input($_POST["dob"]);
		$permanent_address = test_input($_POST["permanent_address"]);
		$correspondence_address = test_input($_POST["correspondence_address"]);
		$contact_no = test_input($_POST["contact_no"]);
		$email = test_input($_POST["email"]);
		$marital_status = test_input($_POST["marital_status"]);
		$sex = test_input($_POST["sex"]);
		$nationality = test_input($_POST["nationality"]);
		$university_or_college = test_input($_POST["university_or_college"]);
		$course_selection = test_input($_POST["course_selection"]);
		$specialization = test_input($_POST["specialization"]);

		$message  = '<table border="1" cellspacing="5" cellpadding="5" style="width:auto;">';
		$message .= '<tr><th colspan=2 style="text-align:center;">Form Data</th></tr>';
		foreach ($_POST as $key => $value) {
			if($key=='submit') continue;
			$message .= '<tr>
							<th style="text-align:left;">'.ucwords(str_replace("_", " ", $key)).'</th>
							<th style="text-align:left;">'.test_input($value).'</th>
						</tr>';
		}
		$message .= '</table>';

		if($message) {
			
			$to = "mayanktechpro@gmail.com";
			$subject = "Form data - ".$name;
			$header = "From: noreply@aet.co.in\r\n"; 
			$header.= "MIME-Version: 1.0\r\n"; 
			$header.= "Content-Type: text/html; charset=utf-8\r\n"; 
			$header.= "X-Priority: 1\r\n"; 

			$send = mail($to, $subject, $message, $header);
			
			//Mail is sent, Now save all in DB
			$db_query = "INSERT INTO form_details VALUES(
							'', '$name', '$father_or_husband_name', '$mother_name', '$dob', '$permanent_address',
							'$correspondence_address', '$contact_no', '$email', '$marital_status', '$sex',
							'$nationality', '$university_or_college', '$course_selection', '$specialization', NOW())";
			mysqli_query($con, $db_query);
			mysqli_close($con);
		}
	}
?>