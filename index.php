<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="index.css?<?php echo time(); ?>" rel="stylesheet">
    <title>Banking web app</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="images/Logo.png" alt="Abyss" style="width: 100px;" class="rounded-pill">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-muted ">
                    <li class="nav-item me-1">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item  me-1">
                        <a class="nav-link" href="#about-us">About us</a>
                    </li>

                    <li class="nav-item  me-1">
                        <a class="nav-link" href="#contact-us">Contact us</a>
                    </li>
                    <li class="nav-item  me-1">
                        <a class="nav-link" href="customers.php">Customer Details</a>
                    </li>
                    <li class="nav-item  me-1">
                        <a class="nav-link" href="TransactionHistory.php">Transaction History</a>

                    </li>
                    <li class="nav-item ms-2 me-2">
                        <a href="createUser.php"><button type="button" class="btn btn-success">Create User</button></a>


                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <!-- navbar-end -->
    <!-- first-section -->

    <div class="bg-image container-fluid" id="intro">
        <div id="intro-text" class="text-white text-center">
            <h2>Welcome to Abyss Bank</h2>
            <h4>A Fresh Approach to Banking</h4>
            <a type="button" href="#about-us" id="know-more-btn" class="btn btn-info">Know more</a>
        </div>
    </div>


    <!-- first-section-end -->

    <!-- About Section -->
    <div class="container-fluid mt-3" id="about-us" style="font-family:Georgia, 'Times New Roman', Times, serif;">
        <h2 style="text-align:center; font-weight:bold;">About Us</h2>
        <div class="container card mb-3 border-0 bg-muted">
            <div class="row g-0">
                <div class="col-md-6">
                    <img src="images/bank.png" class="img-fluid rounded-start" alt="bank" style="width:100% ; ">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h4 class="card-title" style="font-weight: 700;">Abyss Bank</h4>
                        <p class="card-text">A customer-focused bank that provides complete financial solutions to meet your entire financial needs</p>
                        <p class="card-text">Our employees are our greatest assests.</p>
                        <p class="card-text">We’re here to help people solve their biggest problems, starting with money.</p>
                        <p class="card-text">A bank that increases your balance while you sleep.</p>
                        <p class="card-text">We help you maintain focus on your future goals.</p>
                        <p class="card-text">Trust us with your future, we have enough for both of us.
                        </p>
                        <p class="card-text">All your banking needs under one roof.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- About section end -->
    <!-- Contact Us Section -->
    <?php
    include 'config.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $sub = $_POST['subject'];
        $msg = $_POST['message'];

        $sql = "INSERT INTO `contact`(`Name`,`Email`,`Phno`,`Subject`,`Message`) VALUES('{$name}','{$email}','{$phone}','{$sub}','{$msg}')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script> alert('Thank you for contacting us!');
               window.location='index.php';
     </script>";
        }
    }
    ?>
    <div class="container-fluid mt-3" id="contact-us">
        <div id="heading" class="container-fluid mt-5 text-center p-2 text-white" style="font-family: 'Times New Roman', Times, serif;
">
            <p>Get in touch with our team</p>
            <p>Contact Us</p>

        </div>

        <div class="container w-50 rounded mt-2 w-responsive border border-1 border-light" id="contact-form">
            <h3 class="text-white text-center m-1" style="font-family:Georgia, 'Times New Roman', Times, serif;">Contact Form</h3>
            <form action="/bwa/index.php" class="needs-validated ms-auto w-responsive text-white w-100" id="form" method="POST" style="margin:auto; font-family:Georgia, 'Times New Roman', Times, serif;">

                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter username" name="name" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone number:</label>
                    <input type="text" class="form-control" id="phone" placeholder="Enter Phone number" name="phone">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="mb-3">
                    <label for="subject" class="form-label">Subject:</label>
                    <input type="text" class="form-control" id="subject" placeholder="Enter subject" name="subject" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>

                <div class="mb-3">
                    <label for="message">Message</label>
                    <textarea class="form-control" rows="5" id="message" name="message" required></textarea>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group mb-3 mt-3">
                    <button type="submit" class="btn btn-primary" value="create" name="submit">Submit</button>
                </div>
            </form>
        </div>

    </div>



    <footer class="bg-dark text-center text-lg-start">
        <div class="text-center p-3 text-white">
            © 2022 Copyright@ <strong>Harshita</strong>. Summer Intern @ <strong>CHEAR INDIA</strong>
        </div>
    </footer>
    <!-- Contact Us Section ends -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>

</body>

</html>