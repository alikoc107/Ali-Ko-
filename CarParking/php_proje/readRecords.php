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

    $sql = "SELECT * FROM car_charging";
    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            echo '<table class="table table-bordered table-striped">';
            echo "<thead class='thead-dark'>";
            echo "<tr>";
            echo "<th>#</th>";
            echo "<th>First Name</th>";
            echo "<th>Last Name</th>";
            echo "<th>Email</th>";
            echo "<th>Plate Number</th>";
            echo "<th>Entry Time</th>";
            echo "<th>Exit Time</th>";
            echo "<th>Charge Fee</th>";
            echo "<th>Action</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['first_name'] . "</td>";
                echo "<td>" . $row['last_name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['plate_number'] . "</td>";
                echo "<td>" . $row['entry_time'] . "</td>";
                echo "<td>" . $row['exit_time'] . "</td>";
                echo "<td>" . $row['charge_fee'] . "</td>";
                echo "<td>";
                echo "<a href='updateForm.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'><i class='bi bi-pencil'></i> </a>&nbsp;";
                echo "<a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'> <i class='bi bi-trash3'></i> </a>&nbsp;";
                echo "<a href='read.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'><i class='bi bi-book'></i> </a>";

                echo "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            mysqli_free_result($result);
        } else {
            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
        }
    } else {
        echo "Oops! Something went wrong. Please try again later.";

    }

    mysqli_close($link);
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha384-vMl0JSVs15vsn8a1T46GLrFMDNoDBs7TAYWBssRXE5DJw5D4Z8ExPvRtYIqfg2UU" crossorigin="anonymous"></script>
</body>
</html>
