<?php
if (isset($_POST["phone"])) {
  $regex = "/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/";
  $phone = $_POST["phone"];
  if (!preg_match($regex, $phone)) {
    die('There was an error writing this file');
  } else {
    if (isset($_POST["user"])) {
      $headers = array(
        'From' => 'webmaster@example.com',
        'Reply-To' => 'webmaster@example.com',
        'X-Mailer' => 'PHP/' . phpversion()
      );
      mail($_POST["user"], 'Тестовое письмо', "Привет", $headers);
    }
    file_put_contents('phone.txt', $phone, FILE_APPEND | LOCK_EX);
    echo "ok";
  }
} else {
  die('no post data to process');
}