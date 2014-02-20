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
	$max_query = mysqli_query($con, "SELECT MAX(id) FROM form_details");
	$max_result = mysqli_fetch_row($max_query);
	$max_id = $max_result[0]+1;

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		//------------------------------------------------------------
		//if they DID upload a file...
		$temp = explode(".", $_FILES["upload_file"]["name"]);
		$extension = end($temp);
		if ((($_FILES["upload_file"]["type"] == "image/gif")
			|| ($_FILES["upload_file"]["type"] == "image/jpeg")
			|| ($_FILES["upload_file"]["type"] == "image/jpg")
			|| ($_FILES["upload_file"]["type"] == "image/pjpeg")
			|| ($_FILES["upload_file"]["type"] == "image/x-png")
			|| ($_FILES["upload_file"]["type"] == "image/png")
			|| ($_FILES["upload_file"]["type"] == "application/zip")
			|| ($_FILES["upload_file"]["type"] == "application/x-zip-compressed")
			|| ($_FILES["upload_file"]["type"] == "multipart/x-zip")
			|| ($_FILES["upload_file"]["type"] == "application/x-compressed")
			|| ($_FILES["upload_file"]["type"] == "application/octet-stream"))
			&& ($_FILES["upload_file"]["size"] < 8988888))
		{

			if($_FILES['upload_file']['name'])
			{
				//if no errors...
				if(!$_FILES['upload_file']['error'])
				{
					//now is the time to modify the future file name and validate the file
					$new_file_name = strtolower($_FILES['upload_file']['name']); //rename file
					$valid_file = true;
					if($_FILES['upload_file']['size'] > (8988888)) //can't be larger than 8.47 MB
					{
						$valid_file = false;
						$msg = 'Oops!  Your file\'s size is to large.';
						$success = false;
					}
					
					//if the file has passed the test
					if($valid_file)
					{
						//move it to where we want it to be
						move_uploaded_file($_FILES['upload_file']['tmp_name'], 'uploaded_docs/'.$max_id."-".$new_file_name);
						$msg = 'Congratulations!  Your file was accepted.';
						$success = true;
					}
				}
				//if there is an error...
				else
				{
					//set that to be the returned message
					$msg = 'Ooops!  Your upload triggered the following error:  '.$_FILES['upload_file']['error'];
					$success = false;
				}
			}
		} else {
			$msg = 'Invalid File Uploaded';
			$success = false;
		}
		//------------------------------------------------------------

		if($success) {
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
	}
?>
<html>
<head><title>Processing</title>
<style type="text/css">
.done {
	background:url(ajax-loader.gif) no-repeat 315px 0px;
	background-color: #20B64D;
	color: #FFFFFF;
	font-weight: bold;
	font-size: 14px;
	text-align: center;
	margin-top: 200px;
	width: 800px !important;
	display: block;
	padding: 30px;
	letter-spacing: 1;
	font-family: sans-serif;
}
.error {
	background-color: red;
	color: #FFFFFF;
	font-weight: bold;
	font-size: 14px;
	text-align: center;
	margin-top: 200px;
	width: 800px !important;
	display: block;
	padding: 30px;
	letter-spacing: 1;
	font-family: sans-serif;	
}
</style>
</head>
<body>

<center>
	<?php if($success) { ?>
	<div class="done">
		<?php echo $msg; ?>
		<b>Thank you !</b> The form has been submitted. Please wait while we redirect you to Payment Gateway
	</div>
	<?php } else { ?>
	<div class="error">
		<?php echo $msg; ?>
	</div>
	<?php } ?>
</center>
</body>
</html>
<?php if($success) { ?>
<script type="text/javascript">
var delay = 7000; //Your delay in milliseconds
setTimeout(function(){ window.location = "https://www.google.com"; }, delay);
</script>
<?php } ?>