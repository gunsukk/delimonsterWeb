<?php
if(!isset($_POST['Submit']))
{
	//This page should not be accessed directly. Need to submit the form.
	echo "Success!";
  exit;
}
$name = $_POST['name'];
$visitor_email = $_POST['email'];
$visitor_phone = $_POST['phone'];
$message = $_POST['message'];

//Validate first
if(empty($name)||empty($visitor_email)||empty($message))
{
    echo "Name, email, and message are mandatory!";
    exit;
}

if(IsInjected($visitor_email))
{
    echo "Bad email value!";
    exit;
}

$email_from = $visitor_email;
$email_subject = "New Form submission";
$email_body = "You have received a new message from $name.\n".
    "Here is the message:\n $message\n\n".
    "$name's phone number is: $visitor_phone";

$to = "ekang@delimonster.com";
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $visitor_email \r\n";
//Send the email!
mail($to,$email_subject,$email_body,$headers);
//done. redirect to thank you page.
header('Location: thankyou.html');


// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}

?>
