<?php
require("class.phpmailer.php");

require("./class/baglan.php");

  
  


$kime=$_POST['kime'];
$baslik=$_POST['baslik'];
$message=$_POST['mesaj'];

$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
$mail->Host = "smtp.yandex.com";
$mail->Port = 587; // or 587
$mail->IsHTML(true);
$mail->SetLanguage("tr", "phpmailer/language");
$mail->CharSet  ="utf-8";
	 
$mail->Username = "crm@demacia.org"; // Mail adresi
$mail->Password = "C49SRYeCA9QeYW3z!"; // Parola
$mail->SetFrom("crm@demacia.org", "$baslik"); // Mail adresi

$mail->AddAddress("$kime"); // Gönderilecek kişi } 

$mail->Subject = "Crmnet ile gönderildi";
$mail->Body = "$name<br />$email<br />$subject<br />$message";

if(!$mail->Send()){
                echo "Mailer Error: ".$mail->ErrorInfo;
} else {
                echo "Message has been sent";
	header("location:../class/basarili.php");
}

?>