<?php include("admin/connection.php"); ?>
<?php include("css.php"); ?>
<!doctype html>
<html lang="en">
<head>
</head>
<body>
    <?php include("navbar.php");?>
<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header primary bg-warning">Reset Your Password</div>
                    <div class="card-body">
                        <form action="#" method="POST" name="login">
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
                                
                                    
                                    <div class="col-md-6 d-flex">
                                    <span class="p-2"><input type="password" id="password" class="form-control" name="password" required autofocus></span>
                                    <span class="p-2"> <i class="bi bi-eye-slash  " id="togglePassword"></i></span>
                                    </div>      
                                   
                              
                                <label for="otp" class="col-md-4 col-form-label text-md-right">OTP Code</label>
                                <div class="col-md-6 d-flex">
                                    <span class="p-2"><input type="number" id="otp" class="form-control" name="otp_code" required autofocus></span>
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4">
                               <input class="btn btn-warning" class="form-control" style="margin-left: 50;"type="submit" value="Reset" name="reset">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("footer.php")?>
</main>
</body>
</html>

<?php
if (isset($_POST["reset"])) {
    
    
    $psw = $_POST["password"];
    $token = $_SESSION['token'];
    $Email = $_SESSION['email'];
    $otp = $_SESSION['otp'];
   
    
    $otp_code = $_POST['otp_code'];
    
    if ($otp != $otp_code) {
        ?>
        <script>
            alert("Invalid OTP code");
        </script>
        <?php
    } else {
        $sql = mysqli_query($conn, "SELECT * FROM register WHERE email='$Email'");
        $query = mysqli_num_rows($sql);
        
        if ($query > 0) {
            $new_pass = $_POST['password'];
            if (mysqli_query($conn, "UPDATE register SET password='$new_pass' WHERE email='$Email'")) {
                ?>
                <script>
                    alert("<?php echo 'Your password has been successfully reset'; ?>");
                    window.location.replace("login.php");
                   
                </script>
                <?php
            } 
            
            else {
                ?>
                <script>
                    alert("<?php echo 'Failed to update password. Please try again.'; ?>");
                    window.location.replace("reset_psw.php");
                </script>
                <?php
            }
        } else {
            ?>
            <script>
                alert("<?php echo 'Email not found. Please try again.'; ?>");
            </script>
            <?php
        }
    }
}
?>

<script>
    const toggle = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    toggle.addEventListener('click', function() {
        if (password.type === "password") {
            password.type = 'text';
        } else {
            password.type = 'password';
        }
        this.classList.toggle('bi-eye');
    });
</script>
