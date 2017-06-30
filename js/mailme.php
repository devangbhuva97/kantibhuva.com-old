<?php 
  if (isset($_REQUEST['email']))  {
  
  //Email information
  $admin_email = "sunservices@kantibhuva.com";
  $email = $_REQUEST['email'];
  $subject = "Contact Request from website";
  $comment = $_REQUEST['comment'];
  
  //send email
  mail($admin_email, "$subject", $comment, "From:" . $email);
  
  //Email response
  echo "Thank you for contacting us!";
  }
  else{
    echo "Error sending mail ! try again later";
  }
  
 ?>