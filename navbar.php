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
                <div class="navbar-nav ms-auto py-0 pe-4">
                    <a href="index.php" class="nav-item nav-link">Home</a>
                   
                  
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                </div>
                <a href="login.php" class="btn btn-primary py-2 px-4">Login</a>
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
