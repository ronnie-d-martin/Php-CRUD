<?php
include "dbconfig.php";
$id = $_GET['id'];

$sqlUser = "SELECT * FROM artists WHERE id = $id";
$resultUser = mysqli_query($conn, $sqlUser);

if(isset($_POST['submit'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $song = $_POST['song'];


    $sqlUpdate = "UPDATE artists SET firstname = '$firstname', lastname = '$lastname', song = '$song' WHERE id = $id";
    $resultUpdate = mysqli_query($conn, $sqlUpdate);

    if($resultUpdate){
        header("location:index.php");
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
    <title>Edit User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div>
            <h1>Edit User</h1>
        </div>
        <?php
            if (mysqli_num_rows($resultUser) >= 1) {
                $row = mysqli_fetch_assoc($resultUser);
        }
        ?>
        <form method="POST">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" name="firstname" value="<?php echo $row["firstname"] ?>">
                <label>Last Name</label>
                <input type="text" class="form-control" name="lastname" value="<?php echo $row["lastname"] ?>">
                <label>Song</label>
                <input type="text" class="form-control" name="song" value="<?php echo $row["song"] ?>"> <br>
                <button class="btn btn-primary" name="submit">Submit</button>
                <button class="btn btn-danger" name="cancel">Cancel</button>
            </div>
        </form>
    </div>

</body>

</html>