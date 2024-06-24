<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $link = mysqli_connect("localhost", "root", "", "eCharging");

    if ($link === false) {
        die("ERROR: Connection failed. " . mysqli_connect_error());
    }

    $first_name = mysqli_real_escape_string($link, $_POST['first_name']);
    $pasword = mysqli_real_escape_string($link, $_POST['pasword']);

    $sql = "SELECT * FROM humans WHERE first_name='$first_name' AND pasword='$pasword'";
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {

        header("Refresh: 2; URL=index.php");
    } else {
        echo " 
<script type='text/javascript'>  
alert('User not found. Username or password is wrong! !!'); 
</script> 
";
    }

    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Charging Station</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./style.css">
    <style>
        .bg-image {
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
                <h3> Welcome to Charging Station </h3>
                <p class="mb-5"></p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="mb-3">
                        <div class="d-flex bg-light mb-3 rounded-3">
                            <div class="flex-shrink-1 px-3 align-self-center">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <div class="flex-grow-1">
                                <label for="first_name" class="form-label">Username</label>
                                <input type="text" class="form-control border-0" id="first_name" name="first_name" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text"></div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex bg-light mb-3 rounded-3">
                            <div class="flex-shrink-1 px-3 align-self-center">
                                <i class="bi bi-lock-fill"></i>
                            </div>
                            <div class="flex-grow-1">
                                <label for="pasword" class="form-label">Password</label>
                                <input type="password" class="form-control border-0" id="pasword" name="pasword" aria-describedby="pasword">
                                <div id="pasword" class="form-text"></div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 form-check">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
                <p class="my-3">Don't have an account? <a href="register.php">Sing up</a></p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
