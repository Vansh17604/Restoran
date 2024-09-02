<?php include("admin/connection.php"); 



 if(isset($_REQUEST['submit']))
 {
     $email = $_POST['email'];
     $password = $_POST['password'];

     $query = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
     $result = mysqli_query($conn,$query);

     $query1 = "SELECT * FROM register WHERE email = '$email' AND password = '$password'";
     $result1 = mysqli_query($conn,$query1);
     // $row = mysqli_fetch_array($result);
     if(mysqli_num_rows($result)>0)
     {
         $_SESSION['admin'] = $email;
         // $_SESSION['password'] = $row['password'];
         // header("location:adminlte/index.php");
         echo '<script>alert("Login successfull")</script>';
         echo "<script>window.location='admin/index.php'</script>";
     }
     else if(mysqli_num_rows($result1)>0)
     {
         $_SESSION['customer'] = $email;
         // $_SESSION['password'] = $row['password'];
         // header("location:customer_home.php");
         echo '<script>alert("Login successfull")</script>';
         echo "<script>window.location='custumer_home.php'</script>";

     }
     else
     {
         echo '<script>alert("Invalid Email Id & Password")</script>';
         echo "<script>window.location='login.php'</script>";
     }
 }





?>


<!DOCTYPE html>
<html lang="en">

<head>
   <?php include("css.php"); ?>
</head>


<body>
   
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <?php include("navbar.php"); ?>

        <!-- Navbar & Hero End -->


      
<!-- Contact Start -->
<div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp mx-auto" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-warning fw-normal">Login</h5>
                    <h1 class="mb-5" style="text-align:center;">LOG IN</h1>
                </div>
                <div class="row g-4">
                    
                    
                    <div class="col-md-8 mx-auto">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <form method="post" enctype="multipart/form-data">
                                <div class="row g-3">
                                   
                                    <div class="col-md-8 mx-auto">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                                            <label for="email">Email</label>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-8 mx-auto" >
                                        <div class="form-floating">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                            <label for="subject">Password</label>
                                        </div>
                                    </div>
                                    
                                    </div>
                                    <br>

                                    <div class="col-md-8 mx-auto" >
                                        <button class="btn btn-warning w-100 py-3"  type="submit" name="submit" >login</button>
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                       <center> <p class="mx-auto">if you dont have any account then<a href="register.php"> Register</a></p></center>
                                    </div>
                                    <div class="col-md-3 mx-auto">
                                
                                <a href="recover_psw.php" class=" btn-link">
                                    Forgot Your Password?
                                </a>
                            </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Contact End -->
        <?php include("footer.php"); ?>
</div>

<script>
    const toggle = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    toggle.addEventListener('click', function(){
        if(password.type === "password"){
            password.type = 'text';
        }else{
            password.type = 'password';
        }
        this.classList.toggle('bi-eye');
    });
</script>
     
        

     