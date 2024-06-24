<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $link = mysqli_connect("localhost", "root", "", "eCharging");

    if ($link === false) {
        die("ERROR: Connection failed. " . mysqli_connect_error());
    }

    $first_name = mysqli_real_escape_string($link, $_POST['first_name']);
    $password = mysqli_real_escape_string($link, $_POST['password']);

    $sql = "INSERT INTO humans (first_name, pasword) VALUES (?, ?)";
    $stmt = mysqli_prepare($link, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $first_name, $password);

        if (mysqli_stmt_execute($stmt)) {
            echo "Registration Successful. You can log in now.";
            header("Refresh: 2; URL=insertLogin.php");
        } else {
            echo "ERROR: Failed to run query. " . mysqli_error($link);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "ERROR: Could not prepare the query.";
    }

    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register-form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./style.css">
    <style>

        .bg-image{
            background-image: url(bmw.jpg);
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }

    </style>
</head>
<body class="text-center">

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 bg-image vh-100"></div>
        <div class="col-md-4 d-flex justify-content-center align-items-center">
            <div class="w-75">
                <h3> Register </h3>
                <p class="mb-5"></p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div>
                        <div class="d-flex bg-light mb-3 rounded-3">
                            <div class="flex-shrink-1 px-3 align-self-center">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <div class="flex-grow-1">
                                <label for="first_name" class="form-label">Username</label>
                                <input type="text" class="form-control border-0" id="first_name" name="first_name" aria-describedby="emailHelp">                                 <div id="emailHelp" class="form-text"></div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="d-flex bg-light mb-3 rounded-3">
                            <div class="flex-shrink-1 px-3 align-self-center">
                                <i class="bi bi-lock-fill"></i>
                            </div>
                            <div class="flex-grow-1">
                                <label for="pasword" class="form-label">Password</label>
                                <input type="password" class="form-control border-0" id="password" name="password" aria-describedby="password">
                                <div id="password" class="form-text"></div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 form-check">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
