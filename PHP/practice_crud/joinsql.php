<?php
include "dbconfig.php";



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join</title>
</head>

<body>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Album title</th>
                    <th scope="col">hits</th>
                    <th scope="col">Song</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sqlJoins = "SELECT firstname,lastname,b.title,b.views,s.newsong FROM artists a JOIN album b ON a.id_album = b.id_album JOIN songs s ON s.id_song = a.id_song";
                $resultJoins = mysqli_query($conn, $sqlJoins);

                if ($resultJoins) {
                    while ($row = mysqli_fetch_assoc($resultJoins)) {
                        echo '
                        <tr>
                            <td>' . $row["firstname"] . '  '. $row["lastname"] .'</td>
                            <td>' . $row["title"] . '</td>
                            <td>' . $row["views"] . '</td>
                            <td>' . $row["newsong"] . '</td>
                        </tr>
                        ';
                    }
                }

                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
