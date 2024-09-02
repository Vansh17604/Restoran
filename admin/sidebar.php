
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Pannel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./category.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="sub-category.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sub-category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="product.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="booking.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Booking</p>
                </a>
              </li>
            </ul>
          </li>
          
          
      </nav>
      <!-- /.sidebar-menu -->
      <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('.nav-link');
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
    <!-- /.sidebar -->
  </aside>

  