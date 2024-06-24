
<?php
require_once "config.php";

$sql = "SELECT * FROM car_charging";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        echo '<table class="table table-bordered table-striped">';
        echo "<thead>";
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
            echo "<a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'><i class='bi bi-trash3'></i> </a>&nbsp;";
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
