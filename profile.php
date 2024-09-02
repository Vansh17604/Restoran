<?php include("admin/connection.php"); 
 include("session_customer.php");
 


 if(isset($_REQUEST['updbtn']))
 {
    $firstname=$_REQUEST['first_name'];
    $lastname = $_REQUEST['last_name'];
    $mobileno=$_REQUEST['mobile_no'];
    $address=$_REQUEST['address'];

    
    $email = $_SESSION['customer']; 
    
    $image = $_POST['oldphoto'];
    if(!empty($_FILES['newphoto']['name'])) {
        // Remove the old image
        if(file_exists('ds/' . $image)) 
        {
            unlink('ds/' . $image);
        }
        $imageFileName = $_FILES['newphoto']['name'];
        $imageTmpName = $_FILES['newphoto']['tmp_name'];
        $imageSize = $_FILES['newphoto']['size'];
        
    move_uploaded_file($imageTmpName, 'ds/' . $imageFileName);
    $image = $imageFileName;
    } else {
        
        $image = $image;
    }

    $upd = "UPDATE  register SET  first_name='$firstname', last_name='$lastname', mobile_no='$mobileno',  address='$address',photo='$image' WHERE email = '$email'";
    
    $run = mysqli_query($conn,$upd);
    echo '<script>alert("successfully updated")</script>';
    echo "<script>window.location='profile.php'</script>";
        
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
        <style>
      
      

.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}



.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}
        </style>
       <?php $select = "SELECT * FROM register";
        $result = mysqli_query($conn,$select);?>
        <?php  $row=mysqli_fetch_array($result)?>
<div class="container rounded bg-white mt-5 mb-5 ">
<form method="post" enctype="multipart/form-data">
    <div class="row">

        <div class="col-md-3 border-right mx-auto">
            
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img id="photo" name="photo" class="rounded-circle mt-5" width="150px" src="ds/<?php echo $row['photo']; ?>"><span class="font-weight-bold"><?php echo $row['first_name']; ?></span><span class="text-black-50"><?php echo $row['email']; ?></span><span> </span></div>
            <div class="d-flex flex-column align-items-center text-center "><input  class="form-control" type="file" name="newphoto" id="newphoto" value="<?php echo $row['photo']; ?>" class="btn btn-grey" ></div>
             
           <div class="d-flex flex-column align-items-center text-center"><input type="hidden" name="oldphoto" id="oldphoto" style="display:none;" value="<?php echo $row['photo']; ?>" > </div>
           
</div>
        </div>
        <div class="col-md-5 border-right mx-auto">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text mx-auto">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    
                    <div class="col-md"><label class="first_name">Name</label><input type="text" class="form-control" name="first_name" id="first_name"placeholder="<?php echo $row['first_name']; ?>" value=""></div>
                    <div class="col-md"><label class="last_name">Surname</label><input type="text" class="form-control" name="last_name" id="last_name" value="" placeholder="<?php echo $row['last_name']; ?>"></div>
                </div>
                <div class="row mt-3 ">
                    <div class="col-md-12"><label class="mobile_no">Mobile Number</label><input type="number" name="mobile_no"  id="mobile_no" class="form-control" placeholder="<?php echo $row['mobile_no']; ?>" value=""></div>
                    <div class="col-md-12"><label class="address">Address Line 1</label><textarea name="address" id="address" class="form-control"  ><?php echo $row['address']; ?></textarea></div>
                
                
                    
                </div>
                <div class="row mt-3 ">
                 
                </div>
                <div class="mt-5 text-center"><button  class="btn btn-warning profile-button" name="updbtn" type="submit"> Save Profile</button></div>
                    </form>
            </div>
        </div>
       
        </div>
    </div>
</div>
</div>
</div>
    



        <!-- Navbar & Hero End -->
        <?php include("footer.php");?>

