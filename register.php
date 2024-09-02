
<?php include("admin/connection.php"); 
 include('smtp/PHPMailerAutoload.php'); 

if(isset($_REQUEST['submit']))
 {
    
    $firstname=$_REQUEST['first_name'];
    $lastname = $_REQUEST['last_name'];
    $email=$_REQUEST['email'];
    $gender=$_REQUEST['gender'];
    $password=$_REQUEST['password'];
    $mobileno=$_REQUEST['mobile_no'];
    $address=$_REQUEST['address'];
    $filename = $_FILES['photo']['name'];
    $tempname = $_FILES['photo']['tmp_name'];
    $folder = "ds/" . $filename;
    $comment = "<b>Dear</b>" ."<b>$firstname</b>"."
            <h3>Your Registration process is complete</h3>
            
            <p>thank you for connecting with us if there is any problem you can reply below this email</p>
            
            <br><br>
            <p>With regards,</p>
            <b>Hotel restoran</b>";
    $subject = 'Registration complete';
   

    $insert = "INSERT INTO register values(null,'$firstname','$lastname','$email','$gender','$password','$mobileno','$address','$filename','')";
    $run = mysqli_query($conn,$insert);
    if (move_uploaded_file($tempname, $folder)) {
        echo smtp_mailer($email, $subject, $comment);
        echo '<script language="javascript">';
        echo 'alert("registration complete")';
        echo '</script>';
    } else {
        echo '<script language="javascript">';
        echo 'alert("there is some error")';
        echo '</script>';
    }
 }
 function smtp_mailer($to, $subject, $msg)
 {
     $mail = new PHPMailer();
     $mail->IsSMTP();
     $mail->SMTPAuth = true;
     $mail->SMTPSecure = 'tls';
     $mail->Host = "smtp.gmail.com";
     $mail->Port = 587;
     $mail->IsHTML(true);
     $mail->CharSet = 'UTF-8';
     //$mail->SMTPDebug = 2;
     $mail->Username = "your email address";
     $mail->Password = "that email address appkey";
     $mail->SetFrom("your email address");
     $mail->Subject = $subject;
     $mail->Body = $msg;
     $mail->AddAddress($to);
     $mail->SMTPOptions = array('ssl' => array(
         'verify_peer' => false,
         'verify_peer_name' => false,
         'allow_self_signed' => true
     ));
 
     if (!$mail->Send()) {
         echo $mail->ErrorInfo;
     } else {
         echo '<script>alert("Registration complete");</script>';
        
     }
 }


?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php include("css.php"); ?>

   
</head>

<body>
   
    


        <!-- Navbar & Hero Start -->
        <?php include("navbar.php"); ?>

        <!-- Navbar & Hero End -->


      
<!-- Contact Start -->
<div class="container">
            <div class="container ">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    
                    <h1 class="mb-5">Register here</h1>
                </div>
                
                    <div class="col-md-6 mx-auto"><!--mx auto mean x axix auto settele-->
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <div class="">
                            <form method="post" enctype="multipart/form-data" >
                                <div class="row g-3  center-block">
                                    <div class="col-sm-12" >
                                        <div class="form-floating   d-flex justify-content-center align-items-center"  >
                                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Your first Name" onKeyPress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" pattern="[A-Z a-z  ]{2,}" title="Minimum 2 Character Required" required>
                                            <label  for="name">Your first Name</label>
                                        </div>

                                        <br>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Your last Name" onKeyPress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" pattern="[A-Z a-z  ]{2,}" title="Minimum 2 Character Required" required>
                                            <label for="name">Your last Name</label>
                                        </div>
                                    </div>

                                    <br>

                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                                            <label for="email">Your Email</label>
                                        </div>
                                        <br>
                                        
                                        <div class="col-sm">  
                                            <label class="form-check-label">Gender:</label>
                                        <div class="col-sm">
                                        <div class="form-check">
                                      
                                         <input class="form-check-input" type="radio" name="gender" id="gender" value="male">
                                         <label class="form-check-label" for="gender">
                                              Male
                                        </label>
                                        </div>
                                        <div class="col-sm">
                                        <div class="form-check">
                                         <input class="form-check-input" type="radio" name="gender" id="gender" value="female">
                                         <label class="form-check-label" for="gender">
                                              Female
                                        </label>
                                        </div>
                                        
                                    </div>
                                    </div>
                                    <br>

                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                            <label for="passwordS">Password</label>
                                        </div>
                                        <br>

                                        <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="number" class="form-control" id="mobile_no"  name="mobile_no"placeholder="Password" pattern="[0-9]{10,10}" required >
                                            <label for="mobno">Mobil Number</label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Address" id="address" name="address" style="height: 150px" required></textarea>
                                            <label for="message">Address</label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="file" class="form-control" id="photo" name="photo" required>
                                            <label for="file">add the Profile photo</label>
                                        </div>
                                        <br>
                                        
                                    <div class="col-md-12">
                                       
                                        <button id="reg" class="btn btn-primary w-100 py-3" type="submit" name="submit">Register</button>
                                        
                                        <br>
                                       <p>if you have already an account <a href="login.php"> Login</a></p>
                                    </div>
                                   
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
      </div>  <!-- Contact End -->

</div>

</div>

</div> 
<?php include("footer.php"); ?>

        

        <script>
                $(document).ready(function(){
                $('#email').keyup(function(){
                var cat = $('#email').val();
                if(cat != '')
                {
                $.ajax({
                    url:"email.php",
                    
                    method:"GET",
                    data:{value:cat,id:'email'},
                    success:function(data)
                    {
                   
                        $('#reg').html(data);
                    }
                    
                });
                }
                });
                   });
</script>
