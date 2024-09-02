<div class="container-xxl bg-white p-0">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar & Hero Start -->
    <div class="container-xxl position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
            <a href="" class="navbar-brand p-0">
                <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restoran</h1>
                <!-- <img src="img/logo.png" alt="Logo"> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-1 pe-0">
                        <a href="custumer_home.php" class="nav-item nav-link "  > Home</a>
                     
                        <a href="custumer_booking.php" class="nav-item nav-link"  >Order</a>
                        <a href="custumermenu.php" class="nav-item nav-link" >Menu</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-item nav-link dropdown-toggle" data-bs-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
</svg></a>
                            <div class="dropdown-menu m-0">
                                <a href="profile.php" class="dropdown-item"><span><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
</svg></span>  <span>User Profile</span></a>
                                <a href="change_password.php" class="dropdown-item"><span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
  <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8m4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5"/>
  <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
</svg></span>  <span>Change Password</span></a>
                                <a href="logout.php" class="dropdown-item  bg-danger text-white"><span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
</svg></span>  <span>Logout</span></a>

                            </div>
                            
                    </div>
                   
                        </div>
                </div>
        </nav>

        <div class="container-xxl py-5 bg-dark hero-header mb-5">
            <div class="container my-5 py-5">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6 text-center text-lg-start">
                        <h1 class="display-3 text-white animated slideInLeft">Enjoy Our<br>Delicious Meal</h1>
                        <p class="text-white animated slideInLeft mb-4 pb-2" style="text-align: justify;">Experience unforgettable dining at Restoran, where culinary excellence 
                            meets warm hospitality in the heart of Vyara. Our talented chefs craft gourmet dishes with the freshest local ingredients, offering a menu that caters to all palates. Join us in our elegant, cozy ambiance for a memorable meal, perfect for any occasion.</p>
                       
                    </div>
                    <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                        <img class="img-fluid" src="img/hero.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
            const dropdownItems = document.querySelectorAll('.dropdown-menu .dropdown-item');

            function setActiveLink(url) {
                navLinks.forEach(link => {
                    if (link.href === url) {
                        link.classList.add('active');
                    } else {
                        link.classList.remove('active');
                    }
                });

                dropdownItems.forEach(item => {
                    const parentDropdown = item.closest('.dropdown');
                    if (item.href === url && parentDropdown) {
                        parentDropdown.querySelector('.nav-link').classList.add('active');
                    } else if (parentDropdown) {
                        parentDropdown.querySelector('.nav-link').classList.remove('active');
                    }
                });
            }

            // Set active link based on current URL
            setActiveLink(window.location.href);

            // Add click event listeners to nav links
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    setActiveLink(this.href);
                    localStorage.setItem('activeLink', this.href);
                });
            });

            // Add click event listeners to dropdown items
            dropdownItems.forEach(item => {
                item.addEventListener('click', function() {
                    const parentDropdown = this.closest('.dropdown');
                    if (parentDropdown) {
                        setActiveLink(this.href);
                        localStorage.setItem('activeLink', parentDropdown.querySelector('.nav-link').href);
                    }
                });
            });

            // Restore active link from localStorage on page load
            const storedActiveLink = localStorage.getItem('activeLink');
            if (storedActiveLink) {
                setActiveLink(storedActiveLink);
            }
        });
    </script>
</div>
