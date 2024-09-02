<?php
 include("connection.php");

include("session_admin.php"); 



 if(isset($_REQUEST['submit']))
 {
    
    $category=$_REQUEST['subcata'];
    $subcategory = $_REQUEST['sucate'];
    $product=$_REQUEST['product'];
    $price=$_REQUEST['price'];
    $description=$_REQUEST['desc'];
    $quantity=$_REQUEST['qty'];
    $filename = $_FILES["img"]["name"];
    $tempname = $_FILES["img"]["tmp_name"];
    $folder = "image/" . $filename;
   

    $insert = "INSERT INTO product values(null,'$product','$category','$subcategory','$price','$quantity','$description','$filename')";
    $run = mysqli_query($conn,$insert);
    if (move_uploaded_file($tempname, $folder)) {
      echo '<script language="javascript">';
      echo 'alert("Data sent sucessfully")';
      echo '</script>';
    } else {
      echo '<script language="javascript">';
      echo 'alert("image failed to sent")';
      echo '</script>';
    }
 }
 if(isset($_REQUEST['edit']))
 {
    $edit = $_REQUEST['edit'];

    $sel = "SELECT * FROM product WHERE product_id  = '$edit'";
    $r = mysqli_query($conn,$sel);
    $fetch = mysqli_fetch_array($r);

 }
 if(isset($_REQUEST['updbtn']))
 {
    $category=$_REQUEST['subcata'];
    $subcategory = $_REQUEST['sucate'];
    $product=$_REQUEST['product'];
    $price=$_REQUEST['price'];
    $description=$_REQUEST['desc'];
    $quantity=$_REQUEST['qty'];

    $edit = $_REQUEST['edit'];

    $upd = "UPDATE  product SET product_name='$product', cid='$category', subid='$subcategory', price='$price', qty='$quantity', descrip='$description' WHERE product_id  = '$edit'";
    $u = mysqli_query($conn,$upd);
 echo '<script language="javascript">';
        echo 'alert("Data updates sucessfully")';
        echo '</script>';

 }
 if(isset($_REQUEST['del']))
 {
    $del = $_REQUEST['del'];

    $dele = "DELETE FROM product WHERE product_id  = '$del'";
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
              <li class="breadcrumb-item active"><a href="product.php">Product</a></li>
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
                <h3 class="card-title">Add Product </h3>
                
              
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php  if(isset($_REQUEST['edit'])){ ?>
                <form method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group">
                      
                      <label for="subcata">Select category</label>
                      <?php
                    $select = "SELECT * FROM catagory";
                    $result = mysqli_query($conn,$select);
                  ?>
                            <select  name="subcata"   value="<?php echo $fetch['cid'];?>" id="subcata" class="form-control"   required="true">
                            <option>select category</option>
                            <?php  while($row=mysqli_fetch_array($result)){
                  
                   ?><option value="<?php echo $row['catagory_id']; ?>"
                   <?php if($fetch['cid'] == $row['catagory_id'])
                        {
                          echo "selected";
                        }
                   
                   ?>
                   
                   
                   > <?php echo $row['catagory_name']; ?></option>
                            <?php } ?>

                            </select>
                                <br>

                                <label for="subcata">Select Sub-category</label>
                      <?php
                    $select = "SELECT * FROM subcategory";
                    $result = mysqli_query($conn,$select);
                  ?>
                            <select  name="sucate"  value="<?php echo $fetch['subid'];?>" id="sucate" class="form-control"   required>
                            <option>select category</option>
                            <?php  while($row=mysqli_fetch_array($result)){
                  
                   ?><option value="<?php echo $row['subcatagory_id']; ?>"
                   
                   <?php if($fetch['cid'] == $row['catid'])
                        {
                          echo "selected";
                        }
                   
                   ?>
                   
                   > <?php echo $row['subcatagory_name']; ?></option>
                            <?php } ?>
                            </select>
                            <br>

                    

                    <label for="product">Enter the Product Name</label>
                     
                    <input type="text" name="product" class="form-control" id="product" value="<?php echo $fetch['product_name']; ?>" placeholder="Enter Product" onKeyPress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)"  required>
                                    <br>
                    <label for="price">Enter Price</label>
                     
                    <input type="number" name="price" class="form-control" id="price" value="<?php echo $fetch['price']; ?>" placeholder="Enter Product price"   required>
                                    <br>
                    <label for="qty">Enter Quntity</label>
                    <input type="number" name="qty" class="form-control" id="qty" value="<?php echo $fetch['qty'];?>" placeholder="Enter Quntity"   required>
                    <br>
                    <label for="desc">Description</label>
                    <textarea id="desc"  name="desc" class="form-control" required><?php echo $fetch['descrip'];?></textarea>
                                <br>
                  
                
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <div id="updprocat">
                    <button type="submit" class="btn btn-warning" name="updbtn">Update</button>
                    <button onClick="history_back()" type="button" class="btn btn-danger" name="close">Close</button>
                    </div>
                  </div>
              </form>
              <?php }else{?>
              
                <form method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group">
                      
                      <label for="subcata">Select category</label>
                      <?php
                    $select = "SELECT * FROM catagory";
                    $result = mysqli_query($conn,$select);
                  ?>
                            <select  name="subcata"   id="subcata" class="form-control"   required>
                            <option>select category</option>
                            <?php  while($row=mysqli_fetch_array($result)){
                  
                   ?><option value="<?php echo $row['catagory_id']; ?>"> <?php echo $row['catagory_name']; ?></option>
                            <?php } ?>
                            </select>
                                <br>

                                <label for="subcata">Select Sub-category</label>
                      <?php
                    $select = "SELECT * FROM subcategory";
                    $result = mysqli_query($conn,$select);
                  ?>
                            <select  name="sucate"   id="sucate" class="form-control"   required>
                            <option>select category</option>
                            <?php  while($row=mysqli_fetch_array($result)){
                  
                   ?><option value="<?php echo $row['subcatagory_id']; ?>"> <?php echo $row['subcatagory_name']; ?></option>
                            <?php } ?>
                            </select>
                            <br>

                    

                    <label for="product">Enter the Product Name</label>
                     
                    <input type="text" name="product" class="form-control" id="product" placeholder="Enter Product" onKeyPress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)"  required>
                                    <br>
                    <label for="price">Enter Price</label>
                     
                    <input type="number" name="price" class="form-control" id="price" placeholder="Enter Product price"  min="0" required>
                                    <br>
                    <label for="qty">Enter Quntity</label>
                    <input type="number" name="qty" class="form-control" id="qty" placeholder="Enter Quntity" min="0"  required>
                    <br>
                    <label for="desc">Description</label>
                    <textarea id="desc"  name="desc" class="form-control" required></textarea>
                                <br>
                    
                    <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="img" class="custom-file-input" id="img">
                            <label class="custom-file-label" for="file">Choose file</label>
                          </div>
                          
                        </div>

                    </div> 
                  </div>
                  
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <div id="procate">
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
                <h3 class="card-title">Product Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Product_id</th>
                    <th>Product_name</th>
                    <th>Category_name</th>
                    <th>Sub-Category_name</th>
                    <th>Price</th>
                    <th>Quntity</th>
                    <th>description</th>
                    <th>Image</th>
                    <th>Action</th>
                  
                  </tr>
                  </thead>
                  <?php
                    $select = "SELECT catagory.*,subcategory.*,product.* FROM product JOIN catagory ON product.cid = catagory.catagory_id JOIN subcategory ON product.subid = subcategory.subcatagory_id";
                    $result = mysqli_query($conn,$select);
                    while($row=mysqli_fetch_array($result)){
                       
                  
                  ?>
                  
                  <tbody>
                  <tr>
                    <td><?php echo $row['product_id']; ?></td>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><?php echo $row['catagory_name']; ?></td>
                    <td><?php echo $row['subcatagory_name']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['qty']; ?></td>
                    <td><?php echo $row['descrip']; ?></td>
                    <td> <img src="image/<?php echo $row['img']; ?>" style="width:60px;height:60px;"></td>
                    
                    <td>
                    
                     <a href="product.php?edit=<?php echo $row['product_id']; ?>"   class="btn btn-primary">Edit</a>
                    
                      <a href="product.php?del=<?php echo $row['product_id']; ?>"    onclick="return confirm('Do you really want to delete?')" class="btn btn-danger">Delete</a>
                    
                    </td>
                    
                  </tr>
                  
                  </tbody>
                  <?php } ?>
                  <tfoot>
                  <tr>
                  <th>Product_id</th>
                    <th>Product_name</th>
                    <th>Category_name</th>
                    <th>Sub-Category_name</th>
                    <th>Price</th>
                    <th>Quntity</th>
                    <th>description</th>
                    <th>Image</th>
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
                $('#product').keyup(function(){
                var cat = $('#product').val();
                if(cat != '')
                {
                $.ajax({
                    url:"proajaxemailvalidate.php",
                    
                    method:"GET",
                    data:{value:cat,id:'cat'},
                    success:function(data)
                    {
                   
                        $('#procate').html(data);
                    }
                    
                });
                }
                });
                   });
</script>

<script>
                $(document).ready(function(){
                $('#product').keyup(function(){
                var cat = $('#product').val();
                if(cat != '')
                {
                $.ajax({
                    url:"proupdajaxemailvalidate.php",
                    
                    method:"GET",
                    data:{value:cat,id:'cat'},
                    success:function(data)
                    {
                   
                        $('#updprocat').html(data);
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