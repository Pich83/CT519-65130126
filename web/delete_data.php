<?php
  include('header.php');

// Check if the ID parameter is provided
if (isset($_GET['id'])) {
    // Database connection details
    include('connection.php');

    // Get the ID from the parameter
    $id = $_GET['id'];

    // Delete the data based on the provided ID
    $sql = "DELETE FROM detail_hobbies WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<h1 style=text-align:center> Data deleted successfully! </h1>";
    } else {
        echo "Error deleting data: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Invalid request";
}
  echo "<br><h3 style=text-align:center><a href=display_data.php>Back</a></h3></br>";
?>
