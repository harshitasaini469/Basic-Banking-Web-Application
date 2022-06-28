<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="style.css?<?php echo time(); ?>" rel="stylesheet">

    <style>
        #login {
            margin: auto;
            width: 500px;

        }
    </style>
    <title>Create User</title>
</head>

<body class="bg-image">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="images/Logo.png" alt="Abyss" style="width: 100px;" class="rounded-pill">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-muted ">
                    <li class="nav-item me-1">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>

                    <li class="nav-item  me-1">
                        <a class="nav-link" href="customers.php">Customer Details</a>
                    </li>
                    <li class="nav-item  me-1">
                        <a class="nav-link" href="TransactionHistory.php">Transaction History</a>

                    </li>

                </ul>

            </div>
        </div>
    </nav>
    <!-- navbar-end -->
    <!-- User-section -->
    <?php
    include 'config.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $balance = $_POST['balance'];
        $sql = "INSERT INTO `customers`(`Name`,`Email`,`Balance`) VALUES('{$name}','{$email}','{$balance}')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script> alert('Hurray! User created');
               window.location='customers.php';
     </script>";
        }
    }
    ?>
    <!-- <div class="container w-responsive mt-5 bg-light rounded border border-1 shadow shadow-lg " id="login" style="height:400px;font-family:Arial, Helvetica, sans-serif;">
        <h4 class="mb-3 mt-3 text-center">Create Account</h4>

        <form action="/bwa/createUser.php" class="needs-validated ms-auto" method="POST" style="margin:auto;">

            <div class="form-group mb-3 mt-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter username" name="name">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group mb-3 mt-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>


            <div class="form-group mb-3 mt-3">
                <label for="balance" class="form-label">Balance</label>
                <input type="number" class="form-control" id="balance" placeholder="Enter balance amount" name="balance">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group mb-3 mt-3">
                <button type="submit" class="btn btn-primary" value="create" name="submit">Submit</button>
                <button type="reset" class="btn btn-primary" value="reset" name="reset">Reset</button>
            </div>
        </form>
    </div> -->
    <div class=" container card h-75 border border-1 border-dark  shadow-lg " style="background-image: url('images/tb2.jpg');background-size:cover;">

                <div class="card-body col-md-7 mx-auto" style="font-family:Georgia, 'Times New Roman', Times, serif;">
                    <h3 class="card-title text-white text-center p-2">Create User Account</h3>
                    <form action="/bwa/createUser.php" class="needs-validated ms-auto text-white text-center" method="POST" style="margin:auto;font-size:18px;">

                        <div class="form-group mb-3 mt-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter username" name="name" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group mb-3 mt-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>


                        <div class="form-group mb-3 mt-3">
                            <label for="balance" class="form-label">Balance</label>
                            <input type="number" class="form-control" id="balance" placeholder="Enter balance amount" name="balance" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group mb-3 mt-3">
                            <button type="submit" class="btn btn-primary" value="create" name="submit">Submit</button>
                            <button type="reset" class="btn btn-primary" value="reset" name="reset">Reset</button>
                        </div>
                    </form>

                </div>

    </div>
    <!-- User-section-ends -->


    <footer class="bg-dark text-center text-lg-start">
        <div class="text-center p-3 text-white">
            © 2022 Copyright@ <strong>Harshita</strong>. Summer Intern @ <strong>CHEAR INDIA</strong>
        </div>
    </footer>
    <!-- Contact Us Section ends -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>

</body>

</html>