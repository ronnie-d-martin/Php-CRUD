<?php
include 'db_connect.php';

$readAllPhoneNumber = "SELECT * FROM users ORDER BY id DESC";
$readAllPhoneNumberResult = $conn->query($readAllPhoneNumber);

if(isset($_POST['update'])){
    $id = $_POST['id'];

    header('Location:http://localhost/practiceFolder/updateUser.php?id='.$id);
}

if(isset($_POST['delete'])){

    $id = $_POST['id'];

    $deleteUser = "DELETE FROM `users` WHERE id = $id";
    $deleteUserResult = $conn -> query($deleteUser);

    header("Refresh:0");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script>
        function createNewUser() {
            location.href = "http://localhost/practiceFolder/addUser.php";
        }
    </script>
</head>

<body>
    <div class="container">
        <center>
            <h1>CRUD</h1>
        </center>
        <button class="btn btn-primary" onclick="createNewUser();">Add New User</button>
     
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone Number</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_array($readAllPhoneNumberResult)) {
                    echo '<tr>
                            <td>' . $row['firstname'] . '</td>
                            <td>' . $row['lastname'] . '</td>
                            <td>' . $row['phonenumber'] . '</td>
                            <td>
                            <form method="POST">
                                <input type="hidden" name="id" value=' . $row['id'] . '>
                                <button class="btn btn-info" name="update" >Update</button>
                            </form>
                            </td>
                            <td>
                            <form method="POST">
                                <input type="hidden" name="id" value=' . $row['id'] . '>
                                <button class="btn btn-danger" name="delete">Delete</button>
                            </form>
                            </td>
                        </tr>';
                }   
                ?>
            </tbody>
        </table>
 
    </div>
</body>
</html>