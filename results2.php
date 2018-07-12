<?php
//if "email" variable is filled out, send email
  if (isset($_REQUEST['email']))  {
  
  //Email information
  $sendemail = "nelwamondom123@gmail.com";
  $email = $_REQUEST['email'];
  $name = $_REQUEST['name'];
   $contact = $_REQUEST['contact'];
    $location = $_REQUEST['location'];
     $size = $_REQUEST['size'];
  $colour = $_REQUEST['colour'];
  
  //send email
  mail($sendemail, "$name", $contactcomment, "From:" . $email);
  
  //Email response
  echo "Thank you for contacting us!";
  }
  
  //if "email" variable is not filled out, display the form
  else  {
?>

 <form method="post">

  Email: <input name="email" type="text" />

  Subject: <input name="subject" type="text" />

  Message:

  <textarea name="comment" rows="15" cols="40"></textarea>

  <input type="submit" value="Submit" />
  </form>
  
<?php
  }
?>