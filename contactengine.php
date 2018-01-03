<?php

        $EmailFrom = "asmalhi@sfu.ca";
        $EmailTo = "asmalhi@sfu.ca";
        $Subject = "New Submission from portfolio!";

        $Name;$Email;$Message;$captcha;
        if(isset($_POST['Name'])){
          $Name=$_POST['Name'];
        }if(isset($_POST['Email'])){
          $Email=$_POST['Email'];
        }if(isset($_POST['Message'])){
          $Message=$_POST['Message'];
        }if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
          print "<meta http-equiv=\"refresh\" content=\"0;URL=index.html#contactMe\">";
          // echo '<h2>Please check the the captcha form.</h2>';
          exit;
        }
        $secretKey = "6LeaEh8UAAAAAPymLt-NEBbKbbKuQa8IG0e1SVKd";
        $ip = $_SERVER['REMOTE_ADDR'];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
        $responseKeys = json_decode($response,true);

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


        if(intval($responseKeys["success"]) !== 1) {
          echo '<h2>Please stop the spamming :)</h2>';
        } else {
          // echo '<h2>Thanks for posting comment.</h2>';
          mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");
          print "<meta http-equiv=\"refresh\" content=\"0;URL=index.php#contactMe\">";
        }
?>
