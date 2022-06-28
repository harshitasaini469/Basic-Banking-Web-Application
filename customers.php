<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="style.css?<?php echo time(); ?>" rel="stylesheet">
    <title>Customers</title>

</head>

<body>
    <?php
    include "config.php";
    $sql = "select * from customers";
    $result = mysqli_query($conn, $sql);
    ?>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark w-responsive">
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
                    <li class="nav-item ms-2 me-2">
                        <a href="createUser.php"><button type="button" class="btn btn-success">Create User</button></a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <!-- navbar-end -->

    <!-- customer-section -->
    <div class="container w-responsive mt-3 mb-5" id="Table" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
        <h2 style="text-align:center; color:black;font-weight:bold;">Customer Details</h2>
        <br>
        <table class="table table-info table-striped table-hover rounded">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Balance</th>
                    <th scope="col">Transact</th>


                </tr>
            </thead>
            <tbody>
                <?php
                while ($rows = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td scope="col"><?php echo $rows['id'] ?></td>
                        <td scope="col"><?php echo $rows['Name'] ?></td>
                        <td scope="col"><?php echo $rows['Email'] ?></td>
                        <td scope="col"><?php echo $rows['Balance'] ?></td>
                        <td><a href="transferMoney.php?id=<?php echo $rows['id']; ?>"><button class="btn btn-info">Transact</button></a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- custome-section-ends -->

    <!-- footer -->
    <footer class="bg-dark text-center text-lg-start">
        <div class="text-center p-3 text-white">
            © 2022 Copyright@ <strong>Harshita</strong>. Summer Intern @ <strong>CHEAR INDIA</strong>
        </div>
    </footer>
    <!-- footer-ends -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>

</body>

</html>