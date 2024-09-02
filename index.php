<?php include("admin/connection.php");?>
<!DOCTYPE html>
<html lang="en">

<head>
   <?php include("css.php");?>
   <style>
    .service-item {
    display: flex;
    flex-direction: column;
    height: 100%;
}

.service-item .p-4 {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.service-item .p-4 p {
    flex-grow: 1;
}
</style>
</head>

<body>
    <?php include("navbar.php");?>

        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                                <h5>Master Chefs</h5>
                                <p style="text-align: justify;">"Our highly skilled master chefs bring culinary excellence to every dish, ensuring a memorable dining experience."</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item rounded pt-4">
                            <div class="p-4">
                                <i class="fa fa-3x fa-utensils text-primary mb-4"></i>
                                <h5>Quality Food</h5>
                                <p style="text-align: justify;">"We source only the finest ingredients to deliver fresh, delicious, and high-quality meals."</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-cart-plus text-primary mb-4"></i>
                                <h5>Online Order</h5>
                                <p style="text-align: justify;">"Enjoy the convenience of seamless online ordering, delivering your favorite dishes straight to your doorstep."</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-headset text-primary mb-4"></i>
                                <h5>24/7 Service</h5>
                                <p style="text-align: justify;">"Our round-the-clock service guarantees you can satisfy your cravings anytime, day or night."</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="img/about-1.jpg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="img/about-2.jpg" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="img/about-3.jpg">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="img/about-4.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h5 class="section-title ff-secondary text-start text-warning fw-normal">About Us</h5>
                        <h1 class="mb-4">Welcome to <i class="fa fa-utensils text-warning me-2"></i>Restoran</h1>
                        <p class="mb-4" style="text-align: justify;">Indulge in an unforgettable dining experience at Restron, where culinary excellence meets warm hospitality. Nestled in the heart of Vyara, our restaurant offers a delightful blend of gourmet dishes, crafted with the freshest local ingredients and inspired by global flavors.</p>
                        <p class="mb-4" style="text-align: justify;">At Restron, we believe in the art of fine dining. Our talented chefs bring passion and creativity to every plate, ensuring that each dish not only tantalizes your taste buds but also tells a story. From exquisite appetizers to decadent desserts, our menu is designed to cater to all palates and preferences.</p>
                        <p class="mb-4" style="text-align: justify;">Step into our elegant and cozy ambiance, perfect for a romantic dinner, a family gathering, or a special celebration. Our attentive staff is dedicated to providing exceptional service, making sure that your visit is as memorable as the meals we serve.</p>
                        <p class="mb-4" style="text-align: justify;">Join us at Restoran and embark on a culinary journey that celebrates the joys of good food, great company, and unforgettable moments. We look forward to welcoming you and creating a dining experience that you’ll cherish.</p>
                        <p class="mb-4" style="text-align: justify;">Bon appétit!</p>
                        <div class="row g-4 mb-4">
                            <div class="col-sm-6">
                                
                            </div>
                            <div class="col-sm-6">
                                
                            </div>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


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
                                                <span class="text-primary"><?php  echo $row['price']; ?></span>
                                            </h5>
                                            <small class="fst-italic"><?php echo $row['descrip']; ?></small>
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


        <!-- Reservation Start -->
       
        <!-- Team End -->


        <!-- Testimonial Start -->
        
        <!-- Testimonial End -->
        

        <!-- Footer Start -->
       <?php include("footer.php");?>