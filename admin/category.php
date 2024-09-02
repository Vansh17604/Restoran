<?php
 include("connection.php");
 include("session_admin.php");

 if(isset($_REQUEST['submit']))
 {
    $category = $_REQUEST['category'];

    $insert = "INSERT INTO catagory values(null,'$category')";
    $run = mysqli_query($conn,$insert);
    echo '<script language="javascript">';
    echo 'alert("Data sent sucessfully")';
    echo '</script>';

 }
 if(isset($_REQUEST['edit']))
 {
    $edit = $_REQUEST['edit'];

    $sel = "SELECT * FROM catagory WHERE catagory_id  = '$edit'";
    $r = mysqli_query($conn,$sel);
    $fetch = mysqli_fetch_array($r);
    
 }
 if(isset($_REQUEST['updbtn']))
 {
    $categoryname = $_REQUEST['category'];
    $edit = $_REQUEST['edit'];

    $upd = "UPDATE  catagory SET catagory_name = '$categoryname' WHERE catagory_id  = '$edit'";
    $u = mysqli_query($conn,$upd);
    echo '<script language="javascript">';
    echo 'alert("Data updated sucessfully")';
    echo '</script>';

 }
 if(isset($_REQUEST['del']))
 {
    $del = $_REQUEST['del'];

    $dele = "DELETE FROM catagory WHERE catagory_id  = '$del'";
    $cas = mysqli_query($conn,$dele);
    echo '<script language="javascript">';
    echo 'alert("Data deleted sucessfully")';
    echo '</script>';
 }



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
              <li class="breadcrumb-item active"><a href="category.php">Category</a></li>
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
                <h3 class="card-title">Add Category </h3>
                
              
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php  if(isset($_REQUEST['edit'])){ ?>
              <form method="post">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Add category</label>
                      
                      <input type="text" name="category" class="form-control" id="category" placeholder="Enter Category" value="<?php echo $fetch['catagory_name']; ?>" onKeyPress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" pattern="[A-Z a-z  ]{2,}" title="Minimum 2 Character Required"required>
                    </div> 
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <div id="updcat">
                    <button type="submit" class="btn btn-warning" name="updbtn">Update</button>
                    <button onClick="history_back()" type="button" class="btn btn-danger" name="close">Close</button>
                    </div>
                  </div>
              </form>
              <?php }else{?>
                <form method="post">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Add category</label>
                      <input type="text" name="category" class="form-control" id="category" placeholder="Enter Category" onKeyPress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" pattern="[A-Z a-z  ]{2,}" title="Minimum 2 Character Required" required>
                    </div> 
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <div id="cate">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                  </div>
              </form>
             <?php } ?>
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
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
         
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Category Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th>Action</th>
                  
                  </tr>
                  </thead>
                  <?php
                    $select = "SELECT * FROM catagory";
                    $result = mysqli_query($conn,$select);
                    while($row=mysqli_fetch_array($result)){
                  
                  ?>
                  <tbody>
                  <tr>
                    <td><?php echo $row['catagory_id']; ?></td>
                    <td><?php echo $row['catagory_name']; ?></td>
                    <td>
                    
                      <a href="category.php?edit=<?php echo $row['catagory_id']; ?>"    class="btn btn-primary">Edit</a>
                    
                      <a href="category.php?del=<?php echo $row['catagory_id']; ?>"    onclick="return confirm('Do you really want to delete?')" class="btn btn-danger">Delete</a>
                   
                    </td>
                    
                  </tr>
                  
                  </tbody>
                  <?php } ?>
                  <tfoot>
                  <tr>
                  <th>Category ID</th>
                    <th>Category Name</th>
                    <th>Action</th>
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

  <script>
                $(document).ready(function(){
                $('#category').keyup(function(){
                var cat = $('#category').val();
                if(cat != '')
                {
                $.ajax({
                    url:"ajaxemailvalidate.php",
                    
                    method:"GET",
                    data:{value:cat,id:'cat'},
                    success:function(data)
                    {
                   
                        $('#cate').html(data);
                    }
                    
                });
                }
                });
                   });
</script>

<script>
                $(document).ready(function(){
                $('#category').keyup(function(){
                var cat = $('#category').val();
                if(cat != '')
                {
                $.ajax({
                    url:"updajaxemailvalidate.php",
                    
                    method:"GET",
                    data:{value:cat,id:'cat'},
                    success:function(data)
                    {
                   
                        $('#updcat').html(data);
                    }
                    
                });
                }
                });
                   });
</script>
<script>
        function history_back() {
            window.history.back();
        } 
    </script>