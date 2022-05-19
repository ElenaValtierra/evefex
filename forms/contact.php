<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'contact@evefex.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();



  // ------ Video Verion --------

  $message_sent = false;
  // 2. If the email is set and not empty 
if(isset($_POST['email']) && $_POST['email'] != ''){
// 3. If the email is valid 
  if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        // 1. We get the data from the form in index.html
      $userName = $_POST['name'];
      $userEmail = $_POST['email'];
      $userSubject = $_POST['subject'];
      $userMessage = $_POST['message'];

      $to = 'contact@evefex.com';
      $body = "";
      $body.= "From: ". $userName ."\r\n";
      $body.= "Email: ". $userEmail ."\r\n";
      $body.= "Subject: ". $userSubject ."\r\n";
      $body.= "Message: ". $userMessage ."\r\n";
    // mail the email
    // mail($to, $userMessage, $body);

    $message_sent = true;

  }

}
