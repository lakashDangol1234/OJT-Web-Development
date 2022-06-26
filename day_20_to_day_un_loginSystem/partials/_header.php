<!-- Navbar Starts Here  -->
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/lakashojt/day_20_to_day_un_loginSystem/index.php">OJT Project</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" id="home" aria-current="page" href="/lakashojt/day_20_to_day_un_loginSystem/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="about" href="#">About</a>
                </li>
                <?php

                if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
                    echo '<li class="nav-item">
                     <a class="nav-link" id="addStudent" href="/lakashojt/day_20_to_day_un_loginSystem/admin/addStudent.php">Add Student</a>
                    </li>
                <li class="nav-item">
                     <a class="nav-link" id="showStudent" href="/lakashojt/day_20_to_day_un_loginSystem/admin/showStudent.php">Show Student</a>
                 </li>
                ';
                }
                ?>

            </ul>
            <form class="d-flex me-5" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-warning" type="submit">Search</button>
            </form>
            <div class="d-flex justify-content-between">
                <?php
                if (isset($_SESSION['username'])) {
                    echo '<div class="d-flex justify-content-around align-items-center bg-primary me-3 px-2" style="border-radius:5px;">
                        <img src="/lakashojt/day_20_to_day_un_loginSystem/images/default_userImage.png" alt="userImage" class="img-fluid" width="40">
                        <p class="text-light m-0 ms-2">' . $_SESSION['username'] . '</p>
                    </div>
                
                    <a href="/lakashojt/day_20_to_day_un_loginSystem/partials/_handleLogout.php" class="btn btn-danger">Logout</a>
                    
               
                    ';
                } else {
                    echo '<a href="/lakashojt/day_20_to_day_un_loginSystem/signupPage.php" class="btn btn-danger mx-3">Sign Up</a>
                    <a href="/lakashojt/day_20_to_day_un_loginSystem/loginPage.php" class="btn btn-danger">Login</a>';
                }
                ?>


            </div>
        </div>
    </div>
    <!-- NavBar ends Here  -->
</nav>