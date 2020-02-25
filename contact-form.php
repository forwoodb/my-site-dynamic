<?php

$error = "";
$successMessage = "";

if ($_POST) {
  if (!$_POST['email']) {
    $error .= "The email field is required.<br>";
  }
  if (!$_POST['subject']) {
    $error .= "The subject field is required.<br>";
  }
  if (!$_POST['content']) {
    $error .= "The content field is required.<br>";
  }

  // Validate Email
  if (filter_var($_POST['email'] && FILTER_VALIDATE_EMAIL) === false) {
    $error .= "The email address is invalid.<br>";
  }

  // Validate Email
  if (filter_var($_POST['email'] && FILTER_VALIDATE_EMAIL) === false) {
    $error .= "The email address is invalid.<br>";
  }

  if ($error != "") {
    $error = '<div class="error">There were error(s) in your form:<br>'.$error.'</div>';
  } else {
    $emailTo = 'forwoodb77@gmail.com';
    $subject = $_POST['subject'];
    $content = $_POST['content'];
    $headers = $_POST['email'];

    if (mail($emailTo, $subject, $content, $headers)) {
      $successMessage = '<div class="success">Your message was sent!  I\'ll get back to you ASAP.';
    } else {
      $error = "Your message couldn\'t be sent - please try again later.<br>";
    }
  }
}

?>
<form class="contact-form" method="post">
  <div><?php echo $error.$successMessage ?></div>
  <div class="email">
    <label for="email">Email: </label>
    <input id="email" type="email" name="email" placeholder="Enter your email address...">
    <small>I'll never share your email with anyone else.</small>
  </div>
  <div class="subject">
    <label for="subject">Subject: </label>
    <input id="subject" type="text" name="subject">
  </div>
  <div class="message">
    <label for="message">Message</label>
    <textarea id="message" name="content" rows="8" cols="80" placeholder="Write me a message..."></textarea>
  </div>
  <button type="submit" name="submit">Send</button>
</form>