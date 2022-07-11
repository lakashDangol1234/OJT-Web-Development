<?php
session_start();
if (empty($_SESSION['username']) && empty($_SESSION['admin'])) {
    header("location:loginPage.php");
}
if (!empty($_SESSION['username']) && empty($_SESSION['admin'])) {
    header("location:index.php?permission=denied");
}
$showAlert = false;
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>

    <?php include "../partials/_header.php"; ?>



    <!--Edit Modal -->
    <div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="editStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editStudentModalLabel">Edit Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editStudentForm" action="/lakashojt/day_29/partials/_handleEdit.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="editSid" id="editSid">
                        <div class="mb-3">
                            <label for="editName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="editName" name="editName" required>
                        </div>
                        <div class="mb-3">
                            <label for="editAddress" class="form-label">Address</label>
                            <input type="text" class="form-control" id="editAddress" name="editAddress" required>
                        </div>
                        <div class="mb-3">
                            <label for="editContact" class="form-label">Contact</label>
                            <input type="text" class="form-control" id="editContact" name="editContact" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="editClass" class="form-label">Class</label>
                                    <select class="form-select" id="editClass" aria-label="Default select example" name="editClass" required>
                                        <option value="10" selected>10</option>
                                        <option value="9">9</option>
                                        <option value="8">8</option>
                                        <option value="7">7</option>
                                        <option value="6">6</option>
                                        <option value="5">5</option>
                                        <option value="4">4</option>
                                        <option value="3">3</option>
                                        <option value="2">2</option>
                                        <option value="1">1</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="editSection" class="form-label">Section</label>
                                    <select id="editSection" class="form-select" aria-label="Default select example" name="editSection" required>
                                        <option value="A" selected>A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Delete Modal  -->
    <div class="modal fade" id="deleteStudentModal" tabindex="-1" aria-labelledby="deleteStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteStudentModalLabel">Delete Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="deleteStudentForm" action="/lakashojt/day_29/partials/_handleDelete.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="deleteSid" id="deleteSid">
                        <h4>Are you sure ?</h4>
                        <p class="pt-2">Do you really want to delete this record? This process cannot be undone</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Alert Message Edit/Delete  -->
    <div class="position-absolute w-100">
        <div class="alert alert-success alert-dismissible fade show d-none" role="alert" id="editDelete-alert">
            <strong>Success!</strong>
            <?php
            if ($_SERVER['REQUEST_METHOD'] === "GET") {
                if (isset($_GET['edit']) && $_GET['edit'] === "success") {
                    echo "Student Record Updated Successfully";
                    $showAlert = true;
                }
                if (isset($_GET['delete']) && $_GET['delete'] === "success") {
                    echo "Student Record Deleted Successfully";
                    $showAlert = true;
                }
            }
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>


    <div class="container-fluid container-md my-5 py-3">
        <h2 class="mb-3">Students</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">SID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Class</th>
                    <th scope="col">Section</th>
                </tr>

            </thead>
            <tbody>
                <?php
                include "../connection/dbconn.php";
                $sql = "SELECT * FROM studentWithClass";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_OBJ);



                // Displaying record from the database 
                foreach ($result as $student) {
                    echo '<tr>
                        <th scope="row" class="student-info">' . $student->sid . '</th>
                        <td class="student-info">' . $student->name . '</td>
                        <td class="student-info">' . $student->address . '</td>
                        <td class="student-info">' . $student->contact . '</td>
                        <td class="student-info">' . $student->class . '</td>
                        <td class="student-info">' . $student->section . '</td>
                        <td>
                        <button class="btn btn-primary edit-btn" id="edit-' . $student->sid . '" data-bs-toggle="modal" data-bs-target="#editStudentModal">Edit</button>

                        <button class="btn btn-danger delete-btn" id="delete-' . $student->sid . '" data-bs-toggle="modal"
                        data-bs-target="#deleteStudentModal">Delete</button>
                        </td>
                        </tr>';
                }
                ?>

            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <script src="../javascript/showStudentEditDelete.js"></script>
    <?php
    if ($showAlert) {
        echo "<script>
                let editDeleteAlert = document.getElementById('editDelete-alert');
                editDeleteAlert.classList.remove('d-none');
                setTimeout(() => {
                    editDeleteAlert.classList.add('d-none');
                }, 5000);
              </script>";
    }
    ?>



</body>

</html>