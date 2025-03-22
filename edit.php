<?php

include "config.php";

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM students WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}

if (isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $class = $_POST['class'];
    
    $sql = "UPDATE students SET name = '$name', roll = '$roll' , class = '$class' WHERE id = '$id'";

    if (mysqli_query($conn, $sql)){
        header("Location: view.php");
        exit();
    } else {
        echo 'Error updating record: ' . mysqli_error($conn);

    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Student</h2>
        <form action="edit.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="roll" class="form-label">Roll</label>
                <input type="number" class="form-control" id="roll" name="roll" value="<?php echo $row['roll']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="class" class="form-label">Class</label>
                <input type="text" class="form-control" id="class" name="class" value="<?php echo $row['class']; ?>" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
            <a href="view.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
    
</body>
</html>