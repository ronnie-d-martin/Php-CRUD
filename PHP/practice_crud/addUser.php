<?php
include "dbconfig.php";

if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $song = $_POST['song'];

    if ($firstname == "" || $lastname == "" || $song == "") {
        echo '<div class="alert alert-danger" role="alert">
                    Please Complete all fields!
                </div>';
    } else {
        $sqlCreateUser = "INSERT INTO `artists` (firstname, lastname, song) VALUES ('$firstname','$lastname','$song')";
        $resultCreate = mysqli_query($conn, $sqlCreateUser);

        echo '
        <div class="alert alert-primary" role="alert">
            User is Succesfully added!
        </div>';
    }
}

if(isset($_POST['cancel'])){
    header("location:index.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div>
            <h1>Add User</h1>
        </div>
        <form method="POST">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" name="firstname" placeholder="Enter first name here...">
                <label>Last Name</label>
                <input type="text" class="form-control" name="lastname" placeholder="Enter last name here...">
                <label>Song</label>
                <input type="text" class="form-control" name="song" placeholder="Enter song here..."> <br>
                <button class="btn btn-primary" name="submit">Submit</button>
                <button class="btn btn-danger" name="cancel">Cancel</button>
            </div>
        </form>
    </div>

</body>

</html>