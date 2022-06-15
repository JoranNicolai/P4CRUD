<?php 
    include_once '../php/functions.php';
    $sql = "UPDATE reviews SET checked='yes' WHERE id='" . $_GET["id"] . "'";
    if (mysqli_query($db, $sql)) {
        echo "Record deleted successfully";
        header("Location: admin.php");
    } else {
        echo "Error deleting record: " . mysqli_error($db);
    }
    mysqli_close($db);
    ?>