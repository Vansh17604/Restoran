<?php
 $msg="";
  include ("connection.php");
  include("session_admin.php");
  if(isset($_REQUEST['submitbtn']))
  {
      $oldpassword = $_REQUEST['old_password'];
      $newpassword = $_REQUEST['password'];
      $cpassword = $_REQUEST['cpassword'];
      $email = $_SESSION['admin'];
      
      $changeselect = "SELECT * FROM admin WHERE password='$oldpassword' and email='$email'";
      $result = mysqli_query($conn,$changeselect);
      if(mysqli_num_rows($result)>0)
      {
        if($_REQUEST['password'] == $_REQUEST['cpassword'])
        {
          $q1 = "UPDATE admin SET password ='$newpassword',cpassword ='$cpassword' WHERE  email='$email'";
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

 <?php include ("navbar.php"); ?>

<?php include ("sidebar.php"); ?>

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
              <div class="card-header">
                <h3 class="card-title">Change Password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
        
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
                  <div class="form-group">
                    <label for="old_password">Old Password</label>
                    <input type="password" name="old_password" class="form-control" id="old_password" placeholder="Enter old password" required>
                  </div>
                  <hr>
                  <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter new password" required >
                  </div>
                  <div class="form-group">
                    <label for="cpassword">Confirm Password</label>
                    <input type="password" name="cpassword" class="form-control" id="cpassword" placeholder="Enter confirm password" required>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary"  onclick="return confirm('Do you really want to change password?');"  name="submitbtn">Submit</button>
                </div>
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





