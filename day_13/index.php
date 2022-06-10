<?php
include "connection/dbconn.php";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Day 12</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>



    <div class="container my-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">SID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Contact</th>
                </tr>

            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM student";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_OBJ);

                foreach ($result as $student) {
                    echo  '<tr>
                        <th scope="row">' . $student->sid . '</th>
                        <td>' . $student->name . '</td>
                        <td>' . $student->address . '</td>
                        <td>' . $student->contact . '</td>
                        <td><button class="btn btn-primary" id=' . $student->sid . '> <a class="text-decoration-none text-light" href="./partials/_handleEdit.php?id=' . $student->sid . '">Edit</a></button>
                        <button class="btn btn-danger" id=' . $student->sid . '>
                        <a class="text-decoration-none text-light" href="./partials/_handleDelete.php?id=' . $student->sid . '">Delete</a></button></td>
                        </tr>';
                }
                ?>

            </tbody>
        </table>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>