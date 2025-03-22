<?php
include "config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $class = $_POST['class'];

    $sql = "INSERT INTO students (name, roll, class) VALUES ('$name', '$roll', '$class')";

    if (mysqli_query($conn, $sql)){
        header("Location: view.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>