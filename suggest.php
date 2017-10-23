<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$name = trim(filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING));
	$email = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));
	$suggestion = trim(filter_input(INPUT_POST, "user_suggestion", FILTER_SANITIZE_SPECIAL_CHARS));
	
	if ($name == "" || $email == "" || $suggestion == ""){
		
		$error_message = 'Please fill in all the required fields: Name, Email and Details!';		
	}
	
	if (!isset($error_message) && $_POST["address"] != ""){
		
		$error_message = "Bad form input";
	}

	
	//require("inc/phpmailer/class.phpmailer.php");
	require "inc/phpmailer/PHPMailerAutoload.php";

	$mail = new PHPMailer;
	
	if (!isset($error_message) && !$mail->ValidateAddress($email)){
		$error_message = "Invalid Email Eddress";
	}
	
	if (!isset($error_message)){
		$mail->IsSMTP();	//enable SMTP
		//$mail->SMTPDebug = 1;
		$mail->SMTPAuth = true;	//authentication enabled
		$mail->SMTPSecure = 'tls'; //secure transfer enable
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 465; // or 587
		$mail->Mailer = "smtp";
		$mail->isHTML(true);       // Set email format to HTML
		$mail->Username = "swopmatchhandler@gmail.com";
		$mail->Password = "matchit2)1&";
		$mail->setFrom($email, $name);
		$mail->addAddress("swopmatchhandler@gmail.com", 'Admin');     // Add a recipient
		$mail->Subject = 'Swop Match Application Suggestion from '.$name;
		$mail->Body    = $suggestion;
		
		if($mail->send()) {
			header("location:suggest.php?status=thanks");
			exit;
		}
			$error_message = 'Message could not be sent.';
			$error_message .= 'Mailer Error: ' . $mail->ErrorInfo;
	}		
}

$pageTitle = "SwopMatch Handler | Suggest ";
include("inc/header.php");

 ?>

<!DOCTYPE = html>
<html>
  <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
	<title><?php echo $pageTitle ?></title>
	<link rel = "stylesheet" href = "css/styles.css"> 
  </head>

  <body>
  <div class="form">
	
	  <?php if (isset($_GET["status"]) && $_GET["status"] == "thanks"){
		  echo '<p>Thank you for the email! We will check your suggestion shortly!</p>';
	  }else{?> 
	  
	  <?php
	  if (isset($error_message)){
			echo "<p class='message'>".$error_message."</p>";
			}else{
			echo '<h1>Let Us Know Your Suggestions</h1>';				
			}
	  ?>
	  <form action = "suggest.php" method = "post">
	  <fieldset>
		<h5>Please type your suggestion below and click the Send Button to send us your suggestions</h5>
		  <table>
			<tr>
				<th><label for = "name">Name:</label></th>
				<td><input type = "text" id = "name" name = "name" value = "<?php if (isset($name)){echo $name; }?>"></td>
			</tr>
			<tr>
				<th><label for = "email">Email:</label></th>
				<td><input type = "text" id = "email" name = "email" value = "<?php if (isset($email)){echo $email; }?>"></td>
			</tr>
			<tr>
				<th><label for = "user_suggestion">Suggestions:</label></th>
				<td><textarea id = "user_suggestion" name = "user_suggestion"><?php if(isset($suggestion)){echo htmlspecialchars($_POST["user_suggestion"]);} ?></textarea></td>
			</tr>
			<tr style = "display:none">
				<th><label for = "address">Address:</label></th>
				<td><input type = "text" id = "address" name = "address"><p>Please leave this field blank</p></td>
			</tr>
		  
		  </table>
	  </fieldset>
	  <button type = "submit" id="suggestsubmit">Send</button>
		
	</form>
	  <?php } ?>
	  </div>
  </body>
  <?php include("inc/footer.php"); ?>
  
  <?php /*echo '<pre>';
  var_dump($_POST);
  echo '<pre>';
  echo $error_message;*/
  ?>
