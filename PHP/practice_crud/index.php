<?php
session_start();
include "dbconfig.php";

if (isset($_GET['addUser'])) {
    header("location:addUser.php");
}

if(isset($_POST['edit'])){
    $id = $_POST['id'];

   header("location:editUser.php?id=$id");
}

if(isset($_POST['delete'])){
    $id = $_POST['id'];

    $sqlDelete = "DELETE FROM artists WHERE id = $id";
    $resultDelete = mysqli_query($conn, $sqlDelete);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <a href="index.php?addUser"><button class="btn btn-primary">New User</button></a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">Song</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sqlRead = "SELECT * FROM artists ORDER BY id DESC";
                $resultRead = mysqli_query($conn, $sqlRead);

                if (mysqli_num_rows($resultRead) > 0) {
                    while ($row = mysqli_fetch_assoc($resultRead)) {
                        echo '
                <tr>
                   <td>' . $row["firstname"] . '</td>
                   <td>' . $row["lastname"] . '</td>
                   <td>' . $row["song"] . '</td>
                   <td>
                   <form method="POST">
                        <input type="hidden" name="id" value='.$row["id"].'>
                        <button class="btn btn-info" name="edit">Edit</button>

                        <input type="hidden" name="id" value='.$row["id"].'>
                        <button class="btn btn-danger" name="delete">Delete</button>
                    </form>
                   </td>
                </tr>';
                    }
                } else {
                 echo '<tr> <td colspan ="5"> Empty table </td> </tr> ';
                }

                ?>
            </tbody>
        </table>
    </div>
</body>

</html>