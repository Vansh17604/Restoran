<?php include("connection.php");
 include("session_admin.php");

?>




<!DOCTYPE html>
<html lang="en">
<head>
  <?php include("css.php");
?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
 <?php include("navbar.php");?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include("sidebar.php");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active"><a href="product.php">Booking</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Booking</h3>
              
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             
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
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
         
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
              <h3 class="card-title">Resevation detail</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Booking_id</th>
                    <th>Booking_name</th>
                    <th>Booking_email</th>
                   <th>Booking_date</th>
                    <th>no_of_people</th>
                    <th>request</th>
                   
                  
                  </tr>
                  </thead>
                  <?php
                    $select = "SELECT * FROM booking";
                    $result = mysqli_query($conn,$select);
                    while($row=mysqli_fetch_array($result)){
                       
                  
                  ?>
                  
                  <tbody>
                  <tr>
                    <td><?php echo $row['book_id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['no_people']; ?></td>
                    <td><?php echo $row['request']; ?></td>
    
                   
                    
                  </tr>
                  
                  </tbody>
                  <?php } ?>
                  <tfoot>
                  <tr>
                  <th>Booking_id</th>
                    <th>Booking_name</th>
                    <th>Booking_email</th>
                   <th>Booking_date</th>
                    <th>no_of_people</th>
                    <th>request</th>
                  </tr>
                  </tfoot>
                </table>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
       
        <!-- /.row -->
      </div>
     
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    
  </div>
  <!-- /.content-wrapper -->
 
                   
           


<?php include("footer.php");?>
        <?php include("css.php"); ?> 
