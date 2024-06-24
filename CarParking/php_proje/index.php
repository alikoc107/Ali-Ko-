<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car Charging Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="logo.png" alt="Logo" height="50">
        E-Charging Station
    </a>
</nav>

<div class="container mt-5">
    <form action="processForm.php" method="post">
    </form>

    <table class="table table-bordered table-striped">
    </table>
</div>

<div class="container mt-5">
    <form action="processForm.php" method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" name="first_name" required>
            </div>
            <div class="form-group col-md-6">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" name="last_name" required>
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="form-group">
            <label for="plate_number">Plate Number</label>
            <input type="text" class="form-control" name="plate_number" required>
        </div>
        <div class="form-group">
            <label for="entry_time">Entry Time</label>
            <input type="datetime-local" class="form-control" name="entry_time" required>
        </div>
        <div class="form-group">
            <label for="exit_time">Exit Time</label>
            <input type="datetime-local" class="form-control" name="exit_time" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js" integrity="sha384-CKSSz/npVtzIY86vZxAdIu6/l9aOvX+j4LDO9aTbbxUQEBdR6JwqB6J/K/Ft6Aub" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+Wy1aUJ3uMwr5L9bguCAQe4W1uU/ULJzg6I" crossorigin="anonymous"></script>
</body>
</html>
