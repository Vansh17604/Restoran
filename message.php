<?php 

$email= $_POST['email'];
$name=$_POST['name'];

$subject='email from contect form';
$to='vansh456patel@gmail.com';

$comment= "Hi vansh this is the contact mail from" ." "  .  $name . " " . $email . " wrote the follwing" . "\n\n" . $_POST['comment'];



include('smtp/PHPMailerAutoload.php');

echo smtp_mailer($to,$subject,$comment);
function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	//$mail->SMTPDebug = 2; 
	$mail->Username = "vansh456patel@gmail.com";
	$mail->Password = "xbgkodasljpypceu";
	$mail->SetFrom("vansh456patel@gmail.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		echo '<script>alert("mail sent")</script>';
        echo "<script>window.location='contact.php'</script>";;


	}
}



?>