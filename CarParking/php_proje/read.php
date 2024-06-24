<?php

require_once "config.php";


if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {


    $sql = "SELECT * FROM car_charging WHERE id = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {


        mysqli_stmt_bind_param($stmt, "i", $param_id);


        $param_id = trim($_GET["id"]);


        if (mysqli_stmt_execute($stmt)) {


            $result = mysqli_stmt_get_result($stmt);


            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);


                $param_id = $row["id"];
                $first_name = $row["first_name"];
                $last_name = $row["last_name"];
                $plate_number = $row["plate_number"];
                $charge_fee = $row["charge_fee"];

            } else {

                header("location: error.php");
                exit();
            }

        } else {
            echo "Error: Unable to execute the query. " . mysqli_error($link);
        }


        mysqli_stmt_close($stmt);

    } else {
        echo "Error: Unable to prepare the query.";
    }


    mysqli_close($link);

} else {

    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Information Slip</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-cs9OQGq1a3JzLVEXI5K5eQ7nt6V2dZ8EmN0rbd7RrZMI9bB5Wv9EOq2VPb1oSNHf" crossorigin="anonymous">


    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand">
        <img src="logo.png" alt="Logo" height="50">
        E-Charging Station
    </a>

</nav>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div style="background-color: lightgray ; border-radius: 10px ; width: 350px" >
                 <h1  class="mt-5 mb-3"> <center> Information Slip </center></h1>
                </div>
                <div class="form-group">
                    <label style="background-color: #dcdcdc ; border-radius: 5px">Receipt Number</label>
                    <p><b><?php echo $param_id; ?></b></p>
                </div>
                <div class="form-group">
                    <label style="background-color: #dcdcdc ; border-radius: 5px">First Name</label>
                    <p><b><?php echo $first_name; ?></b></p>
                </div>
                <div class="form-group">
                    <label style="background-color: #dcdcdc ; border-radius: 5px">Last Name</label>
                    <p><b><?php echo $last_name; ?></b></p>
                </div>
                <div class="form-group">
                    <label style="background-color: #dcdcdc ; border-radius: 5px">Plate Number</label>
                    <p><b><?php echo $plate_number; ?></b></p>
                </div>
                <div class="form-group">
                    <label style="background-color: #dcdcdc ; border-radius: 5px">Charge Fee</label>
                    <p><b><?php echo $charge_fee; ?></b></p>
                </div>
                <p><a href="readRecords.php" class="btn btn-primary">Back</a></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
