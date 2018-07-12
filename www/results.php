<?php 
$errors = '';
$myemail = 'nelwamondom123@gmail.com';//<-----Put Your email address here.
if(empty($_POST['name'])  || 
    empty($_POST['contact']) || 
   empty($_POST['email']) || 
   empty($_POST['location']) || 
   empty($_POST['size']) || 
   empty($_POST['colour']))
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['name']; 
$contact = $_POST['contact']; 
$email = $_POST['email']; 
$location = $_POST['location']; 
$size = $_POST['size']; 
$colour = $_POST['colour']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "Contact form submission: $name";
	$email_body = "You have received a new message. ".
	" Here are the details:\n Name: $name \n Email: $email_address \n Message \n $message"; 
	
	$headers = "From: $email\n"; 
	$headers .= "Reply-To: $email";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: index.html');
} 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>


</body>
</html>