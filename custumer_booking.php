<?php include("admin/connection.php"); 
 include("session_customer.php");
 include('smtp/PHPMailerAutoload.php'); 

    if (isset($_REQUEST['submit'])) {

    // Fetching the form data
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $date = $_REQUEST['date'];
    $noofpeople = $_REQUEST['no_people'];
    $request = $_REQUEST['request'];

    // Composing the email body
    $comment="<b>Dear </b>" . "<b>$name</b>"."
            <h3>your Reservation process is complete</h3>
            
            <p>thank you for Order from our hotel.</p>
            <b>Your resrvation date is on </b>" .  "<b>$date</b>" ."<b> for </b> " . "<b>$noofpeople</b>" . " people.
            <b> and the request of your</b>"  .  "<b> '$request' </b>" ."<b>will be fullfild</b>
            <br><br>
            <p>With regards,</p>
            <b>Hotel restoran</b>";
    
    $subject = 'Booking Confirmation Mail';

    // Insert query
    $insert = "INSERT INTO booking VALUES (null, '$name', '$email', '$date', '$noofpeople', '$request')";
    $run = mysqli_query($conn, $insert);

    // Check if the query was successful
    if ($run) {
        echo smtp_mailer($email, $subject, $comment);
        echo '<script language="javascript">';
        echo 'alert("Your reservation is confirmed");';
        echo '</script>';
    } else {
        echo '<script language="javascript">';
        echo 'alert("There was an error in your reservation. Please try again.");';
        echo '</script>';
    }
}

// Email sending function
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
    $mail->Username = "Your email eddress";
    $mail->Password = "and its google appkey";
    $mail->SetFrom("your emaill");
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
        echo '<script>alert("Booking confirmed");</script>';
       
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
        <?php include("custumer_navbar.php"); ?>

        <!-- Navbar & Hero End -->


        <!-- Service Start -->
        

        <!-- Menu Start -->
           <!-- Menu End -->
           <div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
            <div class="row g-0">
                <div class="col-md-6">
                    <div class="video">
                        <button type="button" class="btn-play" data-bs-toggle="modal" data-src="https://youtu.be/MdcrZFpNjTA" data-bs-target="#videoModal">
                            <span></span>
                        </button>
                    </div>
                </div>
                <div class="col-md-6 bg-dark d-flex align-items-center">
                    <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                        <h5 class="section-title ff-secondary text-start text-warning fw-normal">Reservation</h5>
                        <h1 class="text-white mb-4">Book A Table Online</h1>
                        <form >
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating date" id="date3" data-target-input="nearest">
                                        <input type="date" class="form-control datetimepicker-input" name="date" id="datetime" placeholder="Date & Time" />
                                        <label for="datetime">Date & Time</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="no_people" id="no_people">
                                          <option value="1">People 1</option>
                                          <option value="2">People 2</option>
                                          <option value="3">People 3</option>
                                        </select>
                                        <label for="select1">No Of People</label>
                                      </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Special Request" name="request" id="request" style="height: 100px"></textarea>
                                        <label for="message">Special Request</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-warning w-100 py-3" name="submit" type="submit">Book Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- 16:9 aspect ratio -->
                        <div class="ratio ratio-16x9">
                            <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                                allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
    <?php include("footer.php"); 
    
    ?>
</div>

        
        <!-- Team End -->


        <!-- Testimonial Start -->
          
        <!-- Testimonial End -->
       


     
