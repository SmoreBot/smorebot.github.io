<html>

<head>
  <title>Sent</title>
  <link rel="stylesheet" type="text/css" href="styles/style1.css">
</head>

<body>

  <div class="head">
    <form method="get" action="/">
       <input type="submit" class="homeButton" value="">
    </form>
  </div>

  <?php

  //get user input from contact.html form
  $rawName = $_POST['username'];
  $rawUserEmail = $_POST['emailaddress'];
  $rawUserMessage = htmlspecialchars($_POST['message']);

  //sanitize user input
  $name = filter_var($rawName, FILTER_SANITIZE_STRING);
  $userEmail = filter_var($rawUserEmail, FILTER_SANITIZE_STRING);
  $userMessage = filter_var($rawUserMessage, FILTER_SANITIZE_STRING);

  //sanitize email address to see if is valid
  if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL) === false) {
    $to = 'smorebot@smore.romtypo.com';

    $subject = "Contact from" . $name;

    $message = $userMessage;

    //headers
    $headers = "From: " . $name . " <" . $userEmail . ">\r\n";
    $headers .= "Reply-To: " . $userEmail . "\r\n";
    $headers .= "Content-type: text\html\r\n";

    //send mail
    mail($to, $subject, $message, $headers);

    echo ("<p>Your email has been sent. The developers will contact you with a reply as soon as they can.</p><br/><br/>");
    echo ("<p>PLEASE NOTE: If you have used this feauture for spamming, you WILL face consequenses!</p>");
    echo("<p>message = $message");
  } else {
    echo("<p>$rawUserEmail is not a valid email address!</p><br/><br/>");
  }

   ?>

</body>

</html>
