<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from customers where id=$from";
    $query = mysqli_query($conn, $sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from customers where id=$to";
    $query = mysqli_query($conn, $sql);
    $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
    if (($amount) < 0) {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }



    // constraint to check insufficient balance.
    else if ($amount > $sql1['Balance']) {

        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }



    // constraint to check zero values
    else if ($amount == 0) {

        echo "<script type='text/javascript'>";
        echo "alert('Oops! Zero value cannot be transferred')";
        echo "</script>";
    } else {

        // deducting amount from sender's account
        $newbalance = $sql1['Balance'] - $amount;
        $sql = "UPDATE customers set Balance=$newbalance where id=$from";
        mysqli_query($conn, $sql);


        // adding amount to reciever's account
        $newbalance = $sql2['Balance'] + $amount;
        $sql = "UPDATE customers set Balance=$newbalance where id=$to";
        mysqli_query($conn, $sql);

        $sender = $sql1['Name'];
        $receiver = $sql2['Name'];
        $sql = "INSERT INTO transaction(`Sender`, `Receiver`, `Balance`) VALUES ('$sender','$receiver','$amount')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo "<script> alert('Transaction Successfull!');
                                     window.location='transactionhistory.php';
                           </script>";
        }

        $newbalance = 0;
        $amount = 0;
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="style.css?<?php echo time(); ?> " rel="stylesheet">

    <title>Transfer Money</title>

</head>

<body>
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
                    <li class="nav-item ms-2 me-2">
                        <a href="createUser.php"><button type="button" class="btn btn-success">Create User</button></a>


                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <!-- navbar-end -->

    <!-- TransferMoney-section -->
    <div class="container w-responsive mt-5 my-4" style="font-family:Georgia, 'Times New Roman', Times, serif;">
        <h2 class="text-center pt-4" style="color : black; font-weight:bold;">Transact Money</h2>
        <?php
        include 'config.php';
        $sid = $_GET['id'];
        $sql = "SELECT * FROM  customers where id=$sid";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            echo "Error : " . $sql . "<br>" . mysqli_error($conn);
        }
        $rows = mysqli_fetch_assoc($result);
        ?>
        <form method="post" name="credit" class="table-text"><br>
            <div>
                <table class="table table-primary table-striped table-condensed table-bordered">
                    <tr style="color : black;">
                        <th class="text-center">Id</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Balance</th>
                    </tr>
                    <tr style="color : black;">
                        <td class="py-2"><?php echo $rows['id'] ?></td>
                        <td class="py-2"><?php echo $rows['Name'] ?></td>
                        <td class="py-2"><?php echo $rows['Email'] ?></td>
                        <td class="py-2"><?php echo $rows['Balance'] ?></td>
                    </tr>
                </table>
            </div>
            <br><br><br>
            <label style="color : black;"><b>Transfer To:</b></label>
            <select name="to" class="form-control" required>
                <option value="" disabled selected>Choose</option>
                <?php
                include 'config.php';
                $sid = $_GET['id'];
                $sql = "SELECT * FROM customers where id!=$sid";
                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    echo "Error " . $sql . "<br>" . mysqli_error($conn);
                }
                while ($rows = mysqli_fetch_assoc($result)) {
                ?>
                    <option class="table" value="<?php echo $rows['id']; ?>">

                        <?php echo $rows['Name']; ?> (Balance:
                        <?php echo $rows['Balance']; ?> )

                    </option>
                <?php
                }
                ?>
                <div>
            </select>
            <br>
            <br>
            <label style="color : black;"><b>Amount:</b></label>
            <input type="number" class="form-control" name="amount" required>
            <br><br>
            <div class="text-center">
                <button class="btn btn-primary mt-3 px-2" name="submit" type="submit" id="myBtn">Transfer</button>
            </div>
        </form>
    </div>

    <!-- TransferMoney-section-ends -->

    <footer class="bg-dark text-center text-lg-start">
        <div class="text-center p-3 text-white">
            © 2022 Copyright@ <strong>Harshita</strong>. Summer Intern @ <strong>CHEAR INDIA</strong>
        </div>
    </footer>
    <!-- Contact Us Section ends -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>

</body>

</html>