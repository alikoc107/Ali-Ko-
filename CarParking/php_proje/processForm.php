<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-cs9OQGq1a3JzLVEXI5K5eQ7nt6V2dZ8EmN0rbd7RrZMI9bB5Wv9EOq2VPb1oSNHf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <title>Car Charging Records</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand">
        <img src="logo.png" alt="Logo" height="50">
        E-Charging Station
    </a>
</nav>

<div class="container mt-4 " >
    <form style="padding-left: 1050px " class="form-inline ml-auto" action="search.php" method="get">
        You can search by first name and plate number.  <input class="form-control mr-sm-2" type="search" style="width: 225px; height: 40px; margin-top: 5px" name="query" placeholder="Search" aria-label="Search">
        <button style="margin-top: 100px" class="btn btn-outline-success my-1 my-sm-2"  type="submit">Search</button>
        <a href="index.php" class="btn btn-success pull-right my-1 my-sm-2" style="margin-left: 10px"><i class="fas fa-arrow-left"></i> + Add New Car</a>

    </form>
</div>

<div class="container mt-4">
    <?php
    require_once "config.php";
    require_once "calculateFee.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];
        $plate_number = $_POST["plate_number"];
        $entry_time = $_POST["entry_time"];
        $exit_time = $_POST["exit_time"];


        if (empty($first_name) || empty($last_name) || empty($email) || empty($plate_number) || empty($entry_time) || empty($exit_time)) {
            echo "ERROR: Please fill in all the required fields.";
            exit;
        }

        $charge_fee = calculateFee($entry_time, $exit_time);

        $sql = "INSERT INTO car_charging (first_name, last_name, email, plate_number, entry_time, exit_time, charge_fee) VALUES (?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "ssssssd", $first_name, $last_name, $email, $plate_number, $entry_time, $exit_time, $charge_fee);

            if (mysqli_stmt_execute($stmt)) {

                include "updateTable.php";
                echo "Records added successfully.";
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }

            mysqli_stmt_close($stmt);
        }

       
    }

    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha384-vMl0JSVs15vsn8a1T46GLrFMDNoDBs7TAYWBssRXE5DJw5D4Z8ExPvRtYIqfg2UU" crossorigin="anonymous"></script>
</body>
</html>
