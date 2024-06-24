<?php
require_once "config.php";

$sql = "CREATE TABLE humans(
 id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
 first_name VARCHAR(30) NOT NULL,
 pasword VARCHAR(30) NOT NULL
)";

if(mysqli_query($link, $sql)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
?>
