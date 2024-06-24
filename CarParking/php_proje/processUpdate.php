<?php
require_once "config.php";
require_once "calculateFee.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = isset($_POST["id"]) ? $_POST["id"] : null;
    $first_name = isset($_POST["first_name"]) ? $_POST["first_name"] : "";
    $last_name = isset($_POST["last_name"]) ? $_POST["last_name"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $plate_number = isset($_POST["plate_number"]) ? $_POST["plate_number"] : "";
    $entry_time = isset($_POST["entry_time"]) ? $_POST["entry_time"] : "";
    $exit_time = isset($_POST["exit_time"]) ? $_POST["exit_time"] : "";


    $errors = array();

    if (empty($first_name)) {
        $errors[] = "First Name is required.";
    }

    if (empty($last_name)) {
        $errors[] = "Last Name is required.";
    }

    if (empty($email)) {
        $errors[] = "Email is required.";
    }

    if (empty($plate_number)) {
        $errors[] = "Plate Number is required.";
    }

    if (empty($entry_time)) {
        $errors[] = "Entry Time is required.";
    }

    if (empty($exit_time)) {
        $errors[] = "Exit Time is required.";
    }

    if (empty($id)) {
        $errors[] = "ID is required.";
    }


    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "ERROR: $error<br>";
        }
        exit;
    }


    $charge_fee = calculateFee($entry_time, $exit_time);


    $sql = "UPDATE car_charging SET first_name=?, last_name=?, email=?, plate_number=?, entry_time=?, exit_time=?, charge_fee=? WHERE id=?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssssssdi", $first_name, $last_name, $email, $plate_number, $entry_time, $exit_time, $charge_fee, $id);

        if (mysqli_stmt_execute($stmt)) {

            include "readRecords.php";
            echo "Record updated successfully.";
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($link);
}
?>
