<?php

// require_once('recaptchalib.php');
//   $privatekey = "6LeaEh8UAAAAAPymLt-NEBbKbbKuQa8IG0e1SVKd";
//   $resp = recaptcha_check_answer ($privatekey,
//                                 $_SERVER["REMOTE_ADDR"],
//                                 $_POST["recaptcha_challenge_field"],
//                                 $_POST["recaptcha_response_field"]);

$EmailFrom = "asmalhi@sfu.ca";
$EmailTo = "asmalhi@sfu.ca";
$Subject = "New Message from portfolio!";
$Name = Trim(stripslashes($_POST['Name']));
$Email = Trim(stripslashes($_POST['Email']));
$Message = Trim(stripslashes($_POST['Message']));

// validation
// $validationOK=true;
// if (!$validationOK) {
//   print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
//   exit;
// }

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $Name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $Email;
$Body .= "\n";
$Body .= "Message: ";
$Body .= "\n";
$Body .= $Message;
$Body .= "\n";

// send email
// $success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");
mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

// redirect to success page
// if ($success && ($resp->is_valid)){
//   if ($resp->is_valid){
//     print "<meta http-equiv=\"refresh\" content=\"0;URL=index.php#contact\">";
//     $success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");
//   }
//   else{
//     print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
//   }
// }

?>
