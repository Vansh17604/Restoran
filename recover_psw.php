<?php include("admin/connection.php");

?>
<?php include("css.php");?>



<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
   
    <title>Login Form</title>
</head>
<body>

<?php include("navbar.php");?>
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header primary bg-warning">Password Recover</div>
                    <div class="card-body">
                        <form action="#" method="POST" name="recover_psw">
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                </div>
                            </div>

                            
                    </div>
                    <div class="mx-auto">
                                <input class="btn btn-warning" type="submit" value="Recover" name="recover">
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php include("footer.php");?>
</main>
</body>
</html>

<?php 


require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST["recover"])){
    $email = $_POST["email"];

    $sql = mysqli_query($conn, "SELECT * FROM register WHERE email='$email'");
    $query = mysqli_num_rows($sql);
    $fetch = mysqli_fetch_assoc($sql);

    if(mysqli_num_rows($sql) <= 0){
        ?>
        <script>
            alert("<?php echo 'Sorry, no emails exist.' ?>");
        </script>
        <?php
    } else {
        // generate token by binaryhexa 
      

        // Generate a 6-digit OTP code
        $otp = random_int(100000, 999999);

        //session_start ();
      
        $_SESSION['email'] = $email;
        $_SESSION['otp'] = $otp;

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';

            // h-hotel account
            $mail->Username = 'vansh456patel@gmail.com';
            $mail->Password = 'xbgkodasljpypceu';

            // send by h-hotel email
            $mail->setFrom('vansh456patel@gmail.com', 'Password Reset');
            // get email from input
            $mail->addAddress($email);
            //$mail->addReplyTo('lamkaizhe16@gmail.com');

            // HTML body
            $mail->isHTML(true);
            $mail->Subject = "Recover your password";
            $mail->Body = "<b>Dear User</b>
            <h3>We received a request to reset your password.</h3>
            <p>Your OTP code is: <b>$otp</b></p>
            <p>Kindly click the below link to reset your password</p>
            
            <br><br>
            <p>With regards,</p>
            <b>Hotel restoran</b>";

            if (!$mail->send()) {
                ?>
                <script>
                    alert("<?php echo 'Invalid Email' ?>");
                </script>
                <?php
            } else {
                ?>
                <script>
                    window.location.replace("reset_psw.php");
                </script>
                <?php
            }
        } catch (Exception $e) {
            ?>
            <script>
                alert("<?php echo "Mailer Error: {$mail->ErrorInfo}" ?>");
            </script>
            <?php
        }
    }
}
?>




