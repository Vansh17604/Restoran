<?php 
include("admin/connection.php"); 
include("session_customer.php");?>
<!DOCTYPE html>
<html lang="en">

<head>
   <?php include("css.php"); ?>
</head>

<body>
    <div class="container-xxl bg-white p-0">
        

        <!-- Navbar & Hero Start -->
        <?php include("custumer_navbar.php"); ?>

        <!-- Navbar & Hero End -->


        <!-- Service Start -->
       


        <!-- Menu Start -->
       
                   
        <div class="container-xxl py-5">
        <?php
                    $select = "SELECT * FROM product";
                    $result = mysqli_query($conn,$select);
                    
                  ?>
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-warning fw-normal">Menu</h5>
                    <h1 class="mb-5">Most Popular Items</h1>
                </div>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                            <?php  while($row=mysqli_fetch_array($result)){  ?>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="admin/image/<?php echo $row['img']; ?>" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span><?php echo $row['product_name']; ?></span>
                                                <span class="text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-currency-rupee" viewBox="0 0 16 16">
  <path d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4z"/>
</svg><?php  echo $row['price']; ?></span>
                                            </h5>
                                            <small class="fst-italic"><?php echo $row['descrip']; ?></small>
                                            <a href="custumer_booking.php" class="btn btn-primary btn-xs">Order Now</a>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                      
                    </div>
                   
                </div>
                
            </div>
           
        </div>
        
        <!-- Menu End -->

                            </div>
                            <?php include("footer.php"); ?>
                            </div>
        
        <!-- Team End -->


        <!-- Testimonial Start -->
       
        <!-- Testimonial End -->
       
                        

     