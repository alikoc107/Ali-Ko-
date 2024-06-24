<?php
require_once "config.php";

$sql = "INSERT INTO car_charging (first_name, last_name, email, plate_number, entry_time, exit_time, charge_fee) VALUES
    ('Ali', 'Koç', 'koç@example.com', '34ABC123', '2023-01-01 08:00:00', '2023-01-01 17:30:00', 210.00),
    ('Mehmet Faik', 'Ayhan', 'mehmet@example.com', '34XYZ987', '2023-01-02 09:15:00', '2023-01-02 15:45:00', 135.00),
    ('Emirhan', 'Vural', 'emir@example.com', '34DEF456', '2023-01-03 12:30:00', '2023-01-03 16:45:00', 70.00)";

if (mysqli_query($link, $sql)) {
    echo "Records added successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
?>


