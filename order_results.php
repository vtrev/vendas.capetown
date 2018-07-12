<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "orders@vendas.capetown";
    $email_subject = "Vendas In Cape Town Shirt order";
    $query= "orders@vendas.capetown";
   // $email = "".((isset($_POST["email"]))?$_POST["email"]:"")  ."";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['contact']) ||
        !isset($_POST['email']) ||
        !isset($_POST['location']) ||
        !isset($_POST['size']) ||
		!isset($_POST['colour'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 //$email = "".((isset($_POST["email"]))?$_POST["email"]:"")  ."";
    $name = $_POST['name']; // required
    $contact = $_POST['contact']; // required
    $email = $_POST['email']; // required
    $location = $_POST['location']; // not required
    $size = $_POST['size']; // required
    $colour = $_POST['colour']; // required
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
  }
 
  if(preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $contact)) {
$error_message .= 'The contact number you entered does not appear to be valid.<br />';
  }

 
  if(strlen($location) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "An order has been received. The order details are below:\n\n";
   $email_message2 = "Thank you for placing an order with us. Your order has been received and below is the copy of your order:\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Contact: ".clean_string($contact)."\n";
    $email_message .= "Email: ".clean_string($email)."\n";
    $email_message .= "Location: ".clean_string($location)."\n";
    $email_message .= "Size: ".clean_string($size)."\n";
    $email_message .= "Colour: ".clean_string($colour)."\n";
    $email_message .= "Price: ".clean_string("R180")."\n";
	//$email_message .= "."\n";
	 
	 $email_message2 .= "Name: ".clean_string($name)."\n";
    $email_message2 .= "Contact: ".clean_string($contact)."\n";
    $email_message2 .= "Email: ".clean_string($email)."\n";
    $email_message2 .= "Location: ".clean_string($location)."\n";
    $email_message2 .= "Size: ".clean_string($size)."\n";
    $email_message2 .= "Colour: ".clean_string($colour)."\n";
	$email_message2 .= "Price: ".clean_string("R180")."\n\n\n";
	$email_message2 .= "Direct all queries to: ".clean_string("$query")."\n\n\n";
	
	 $email_message2 .= "Disclaimer" ."\n\n".clean_string("This email and any files transmitted with it are confidential and intended solely for the use of the individual or entity to whom they are addressed. If you have received this email in error please notify the system manager. This message contains confidential information and is intended only for the individual named. If you are not the named addressee you should not disseminate, distribute or copy this e-mail. Please notify the sender immediately by e-mail if you have received this e-mail by mistake and delete this e-mail from your system. If you are not the intended recipient you are notified that disclosing, copying, distributing or taking any action in reliance on the contents of this information is strictly prohibited.")."\n\n\n";
	 
// create email headers
$headers = 'From: '.$email."\r\n".
'Reply-To: '.$email."\r\n" .
'X-Mailer: PHP/' . phpversion();
mail("orders@vendas.capetown", $email_subject, $email_message, $headers);  
mail("$email", $email_subject, $email_message2, $headers);  
?>
 
<!-- include your own success html here -->
 
Thank you for placing an order with us. We will be in touch with you very soon.
 
<?php
 
}
?>