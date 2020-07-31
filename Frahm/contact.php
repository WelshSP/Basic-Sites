<?php
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $from = 'From: Contactus'; 
    $to = 'placeholder@domain.com'; 
    $subject = 'New Contact Message';
    
			
    $body = "From: $name\n E-Mail: $email\n Message:\n $message";
	




    $email;$subject;$captcha;
        if(isset($_POST['email'])){
          $email=$_POST['email'];
        }
        if(isset($_POST['subject'])){
          $subject=$_POST['subject'];
        }
        if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
          echo '<h2>Please check the the captcha form.</h2>';
          exit;
        }
        $secretKey = "6LdcRLMUAAAAAOK5zylXxCIAm1Apw70-TWhxsjV3";
        $ip = $_SERVER['REMOTE_ADDR'];
        // post request to server
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
        $response = file_get_contents($url);
        $responseKeys = json_decode($response,true);
        // should return JSON with success as true
        if($responseKeys["success"]) {
                echo '<h2>Your message has been sent!</h2>';
        } else {
                echo '<h2>You have been flagged as a spammer.</h2>';
        }
