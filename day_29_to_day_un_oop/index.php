<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:loginPage.php");
}


$showLoginAlert = false;
$showSignUpAlert = false;
$showAdminAlert = false;

if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['login']) && $_GET['login'] == "success") {
    $showLoginAlert = true;
}
if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['signup']) && $_GET['signup'] == "success") {
    $showSignUpAlert = true;
}
if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['permission']) && $_GET['permission'] == "denied") {
    $showAdminAlert = true;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">


    <title>Login System Project</title>
</head>

<body>
    <!-- NavBar -->
    <?php include "partials/_header.php" ?>


    <!-- Success message  -->
    <div class="position-absolute w-100" style="z-index:3;">
        <div class="alert alert-success alert-dismissible fade show d-none" role="alert" id="login-signup-alert">
            <strong>Success!</strong>
            <?php
            if ($showLoginAlert) {
                echo "You are successfully logged in as " . $_SESSION['username'];
            } else if ($showSignUpAlert) {
                echo "You are successfully signed up as " . $_SESSION['username'];
            }
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>

    <!-- Error Message  -->
    <div class="position-absolute w-100" style="z-index:3;">
        <div class="alert alert-danger alert-dismissible fade show d-none" role="alert" id="permission-denied-alert">
            <strong>Success!</strong>
            <?php
            if ($showAdminAlert) {
                echo "Please login as Admin to use these features!";
            }
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>


    <!-- Slider -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://source.unsplash.com/1600x500/?coding,code
                " class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/1600x500/?programming,coding
                " class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/1600x500/?software,coding
                " class="d-block w-100" alt="..." />
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container-fluid">
        <!-- Tagline -->
        <div class="row">
            <div class="col-12 text-center display-6 mt-5 mb-2">
                <h3>Lorem ipsum dolor, sit amet consectetur adipising elit. <br>
                    Aliquid assumenda iusto cupiditate.</h3>
            </div>
        </div>

        <!-- Features -->
        <div class="row justify-content-evenly pt-3 pb-3">
            <div class="col-md-3 text-center mt-5">
                <h1><i class="bi bi-file-code-fill text-primary"></i></h1>
                <h5>Built for developers</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rehenderit placeat qui aspernr necesibus
                    quisquam dolore!</p>
            </div>
            <div class="col-md-3 text-center mt-5">
                <h1><i class="bi bi-easel-fill text-danger"></i></h1>
                <h5>Built for developers</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rehenderit placeat qui aspernr necesibus
                    quisquam dolore!</p>
            </div>
            <div class="col-md-3 text-center mt-5">
                <h1><i class="bi bi-calendar-range-fill text-success"></i></h1>
                <h5>Built for developers</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rehenderit placeat qui aspernr necesibus
                    quisquam dolore!</p>
            </div>
        </div>
        <!-- line -->
        <hr>

        <!-- Growth -->
        <div class="row justify-content-evenly pt-3 pb-5">
            <div class="col-md-5 offset-sm-2 offset-md-0 pt-3">
                <img src="https://source.unsplash.com/random/?growth,development" alt="growth" class="img-fluid">
            </div>
            <div class="col-md-5 pt-3 pt-md-1">
                <h5 class="mt-3">Website Development</h5>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h5 class="mt-3">App Development</h5>
                <div class="progress">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

                <h5 class="mt-3">Software Development</h5>
                <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

                <h5 class="mt-3">SEO</h5>
                <div class="progress">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

                <h5 class="mt-3">Marketing</h5>
                <div class="progress">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

            </div>
        </div>

        <!-- Contact -->
        <div class="row justify-content-evenly pt-2 pb-5" style="background-color: #f1f1f1;">
            <div class="col-md-5 mt-5">
                <h3 class="mb-4">Contact Form</h3>
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-danger">Submit</button>
                </form>
            </div>
            <div class="col-md-5 mt-5">
                <h3 class="mb-4">Address</h3>
                <p>1180 Kimberly Way, WILLISTON PARK<br>
                    New York - 11596<br>
                    <i class="bi bi-telephone"></i>: 917-772-5081
                </p>

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96708.3419416261!2d-74.03927103848369!3d40.75904032936045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2f9967661c975%3A0xcd9c351ca2f5cae6!2sDreamWorks%20Water%20Park!5e0!3m2!1sen!2snp!4v1628016847601!5m2!1sen!2snp" style="width:100%;" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>

        <!-- FAQ -->
        <div class="row justify-content-center">
            <div class="col-md-10 pt-5 pb-5">
                <h3 class="text-center mb-5">FAQ</h3>
                <div class="accordion accordion-flush border" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Accordion Item #1
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to
                                demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion
                                body.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Accordion Item #2
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to
                                demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion
                                body. Let's imagine this being filled with some actual content.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                Accordion Item #3
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to
                                demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion
                                body. Nothing more exciting happening here in terms of content, but just filling up the
                                space to make it look, at least at first glance, a bit more representative of how this
                                would look in a real-world application.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include "partials/_footer.php" ?>

        <!-- Container End -->
    </div>



    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <?php

    if ($showSignUpAlert || $showLoginAlert) {
        echo '<script>
        document.getElementById("login-signup-alert").classList.remove("d-none");
        setTimeout(() => {
            document.getElementById("login-signup-alert").classList.add("d-none");
        }, 5000);
    </script>';
    }
    if ($showAdminAlert) {
        echo '<script>
        document.getElementById("permission-denied-alert").classList.remove("d-none");
        setTimeout(() => {
            document.getElementById("permission-denied-alert").classList.add("d-none");
        }, 5000);
    </script>';
    }
    ?>

    <script>
        document.getElementById('home').classList.add("active");
    </script>
</body>

</html>