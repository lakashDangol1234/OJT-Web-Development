<!-- Navbar Starts Here  -->
<nav class="navbar navbar-expand-lg <?php
                                    if (isset($_SESSION['navbarTheme'])) {
                                        if ($_SESSION['navbarTheme'] == "light" or $_SESSION['navbarTheme'] == "warning" or $_SESSION['navbarTheme'] == "danger" or $_SESSION['navbarTheme'] == "success") {
                                            echo 'bg-' . $_SESSION['navbarTheme'];
                                        } else {
                                            echo 'bg-' . $_SESSION['navbarTheme'] . ' navbar-dark';
                                        }
                                    } else {
                                        echo 'bg-dark navbar-dark';
                                    }
                                    ?>" id="navbar">

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
                     <a class="nav-link" id="addStudent" href="/lakashojt/day_20_to_day_un_loginSystem/admin/addStudent.php">
                     <svg class="mb-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                        <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                    </svg>
                     Add Student</a>
                    </li>
                <li class="nav-item">
                     <a class="nav-link" id="showStudent" href="/lakashojt/day_20_to_day_un_loginSystem/admin/showStudent.php">Show Student</a>
                 </li>
                ';
                }
                ?>


                <?php
                if (isset($_SESSION['username'])) {
                    echo ' 
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Navbar Theme
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <form method="post" id="navbarThemeForm">

                            <!-- Username  -->
                            <input type="hidden" id="navbar-username" name="navbar-username" value="' . $_SESSION['username'] . '">

                            <p id="currentColorInfo" data-current-color="' . $_SESSION['navbarTheme'] . '" class="d-none"></p>
                            <li><button class="dropdown-item nav-bar-theme-color" id="primary-navbar" data-color="primary" name="navbarColor" value="primary">Blue</button></li>
                            <li><button class="dropdown-item nav-bar-theme-color" id="dark-navbar" data-color="dark" name="navbarColor" value="dark">Black</button></li>
                            <li><button class="dropdown-item nav-bar-theme-color" id="success-navbar" data-color="success" name="navbarColor" value="success">Green</button></li>
                            <li><button class="dropdown-item nav-bar-theme-color" id="danger-navbar" data-color="danger" name="navbarColor" value="danger">Red</button></li>
                            <li><button class="dropdown-item nav-bar-theme-color" id="secondary-navbar" data-color="secondary" name="navbarColor" value="secondary">Grey</button></li>
                            <li><button class="dropdown-item nav-bar-theme-color" id="warning-navbar" data-color="warning" name="navbarColor" value="warning">Yellow</button></li>
                            <li><button class="dropdown-item nav-bar-theme-color" id="info-navbar" data-color="info" name="navbarColor" value="info">Light Blue</button></li>
                            <li><button class="dropdown-item nav-bar-theme-color" id="light-navbar" data-color="light" name="navbarColor" value="light">White</button></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><button class="dropdown-item">Something else here</button></li>
                        </form>
                    </ul>
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
                
                    <a type="button" href="/lakashojt/day_20_to_day_un_loginSystem/partials/_handleLogout.php" class="btn btn-' . ($_SESSION['navbarTheme'] == "danger" ? "secondary" : "danger") . '">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"></path>
                        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"></path>
                    </svg>
                    Logout
                </a>
                    
                    
               
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

<?php

if (isset($_SESSION['username'])) {
    echo '<script defer src="./javascript/navbarTheme.js"></script>';
}
?>