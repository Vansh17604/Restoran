<?php include("admin/connection.php"); 
 include("session_customer.php");


 $msg="";
  

  if(isset($_REQUEST['submitbtn']))
  {
      $oldpassword = $_REQUEST['old_password'];
      $newpassword = $_REQUEST['password'];
      $cpassword = $_REQUEST['cpassword'];
      $email = $_SESSION['customer']; 
      $changeselect = "SELECT * FROM register WHERE password='$oldpassword' and email='$email'";
      $result = mysqli_query($conn,$changeselect);
      if(mysqli_num_rows($result)>0)
      {
        if($_REQUEST['password'] == $_REQUEST['cpassword'])
        {
          $q1 = "UPDATE register SET password ='$newpassword',cpassword ='$cpassword' WHERE  email='$email'";
          mysqli_query($conn ,$q1);
          $msg="password change";
         
        }
        else               
        {
          $msg="New and Conform password Are Not Match";
         
        }
      }
      else
      {
    $msg="old Password is Invalid";
    
      }
  }
?>
<!DOCTYPE html>
<html>
<head>
<?php include ("css.php"); ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

 <?php include ("custumer_navbar.php"); ?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
         <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              
              <!-- /.card-header -->
              <!-- form start -->
        
        
                <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp mx-auto" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Change Password</h5>
                    <h1 class="mb-5" style="text-align:center;">Change Password</h1>
                </div>
                <div class="row g-4">
                <form role="form" id="quickForm" method="POST">
                <div class="card-body">
                <center><b style="color:orange">
                        <?php
                        if($msg != '')
                        {
                        
                            echo "<script type='text/javascript'>alert('$msg');</script>";
                        }
                        ?>
                        </b></center><br>
                    <div class="col-md-8 mx-auto">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            
                                <div class="row g-3">
                                <div class="col-md-8 mx-auto">
                                        <div class="form-floating">
                                           <input type="password" name="old_password" class="form-control" id="old_password" placeholder="Enter old password" required>
                                            <label for="old_password">Old Password</label>
                                        </div>
                      </div>
                                    <div class="col-md-8 mx-auto">
                                        <div class="form-floating">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password" required>
                                            <label for="password">New Password</label>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-8 mx-auto" >
                                        <div class="form-floating">
                                            <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Enter confirm password" required>
                                            <label for="cpassword">Confirm Password</label>
                                        </div>
                                    </div>
                                    
                                    </div>
                                    <br>

                                    <div class="col-md-8 mx-auto" >
                                        <button class="btn btn-warning w-100 py-3"  type="submit" name="submitbtn" onclick="return confirm('Do you really want to change password?');">Change Password</button>
                                       
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
     
                <!-- /.card-body -->
                
              </form>
              
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    <?php  include ("footer.php"); ?>





