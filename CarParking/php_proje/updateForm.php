<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $id = $_GET["id"];


    $sql = "SELECT * FROM car_charging WHERE id = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $id);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);


            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $id, $first_name, $last_name, $email, $plate_number, $entry_time, $exit_time, $charge_fee);
                mysqli_stmt_fetch($stmt);
            } else {
                echo "Record not found";
                exit;
            }
        } else {
            echo "ERROR: Could not execute $sql. " . mysqli_error($link);
            exit;
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "ERROR: Could not prepare $sql. " . mysqli_error($link);
        exit;
    }

    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand">
        <img src="logo.png" alt="Logo" height="50">
        E-Charging Station
    </a>
</nav>
<div class="container mt-5">
    <h2 class="mb-4">Update Record</h2>
    <form action="processUpdate.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" name="first_name" value="<?php echo htmlspecialchars($first_name); ?>" required>
            </div>
            <div class="form-group col-md-6">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" name="last_name" value="<?php echo htmlspecialchars($last_name); ?>" required>
            </div>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
        </div>

        <div class="form-group">
            <label for="plate_number">Plate Number</label>
            <input type="text" class="form-control" name="plate_number" value="<?php echo htmlspecialchars($plate_number); ?>" required>
        </div>

        <div class="form-group">
            <label for="entry_time">Entry Time</label>
            <input type="datetime-local" class="form-control" name="entry_time" value="<?php echo date('Y-m-d\TH:i', strtotime($entry_time)); ?>" required>
        </div>

        <div class="form-group">
            <label for="exit_time">Exit Time</label>
            <input type="datetime-local" class="form-control" name="exit_time" value="<?php echo date('Y-m-d\TH:i', strtotime($exit_time)); ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
