<?php
$to_email = "tharaka4146@gmail.com";
$subject = "Simple Email Test via PHP";
$body = "Hi,nn This is test email send by PHP Script";
$headers = "From: sender\'s email";

if (mail($to_email, $subject, $body, $headers)) {
} else {
}