<?php
require_once(dirname(__FILE__)."/emailconfig.php");
require(dirname(__FILE__)."/phpmailer/PHPMailerAutoload.php");
$mail = new PHPMailer;
//$mail->SMTPDebug = 3;            // Enable verbose debug output

$mail->isSMTP();                 // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;          // Enable SMTP authentication


$mail->Username = EMAIL_USER;    // SMTP username
$mail->Password = EMAIL_PASS;    // SMTP password
$mail->SMTPSecure = 'tls';       // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;               // TCP port to connect to
$options = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->smtpConnect($options);

$sanitized_email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL);
if ($validated_email = filter_var($sanitized_email, FILTER_VALIDATE_EMAIL)) {
    $fromName = "No Name";
    if ($sanitized_name = filter_input(INPUT_POST,"name",FILTER_SANITIZE_STRING)) {
        $fromName = $sanitized_name;
    }
    $mail->setFrom($validated_email,$fromName);
    $mail->addReplyTo($validated_email);
}

$output = ["success"=>false];

$mail->addAddress(RECIPIENT);     // Add a recipient
$mail->isHTML(true);                                  // Set email format to HTML

$subject = isset($_POST['subject']) ? $_POST['subject'] : "Contact form message"; // Enter your subject here
if ($sanitized_subject = filter_var($subject,FILTER_SANITIZE_STRING)) {// filter_input(INPUT_POST,"subject",FILTER_SANITIZE_STRING)
    $mail->Subject = $sanitized_subject;
}
if ($sanitized_body = filter_input(INPUT_POST,"message",FILTER_SANITIZE_FULL_SPECIAL_CHARS)) {
    $mail->Body = $sanitized_body;
}
if ($sanitized_altbody = filter_input(INPUT_POST,"message",FILTER_SANITIZE_STRING)) {
    $mail->AltBody = $sanitized_altbody;
}

if(!$mail->send()) {
    $output["error"] = 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    $output["success"] = true;
}

$json = json_encode($output);
echo $json;