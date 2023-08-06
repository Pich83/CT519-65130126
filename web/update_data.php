<?php
    include('header.php');

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Database connection details
    include('connection.php');  

    // Get form data
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $hobby = $_POST['hobby'];

    // Prepare and execute the SQL statement to update data in the table
    $sql = "UPDATE detail_hobbies SET name='$name', email='$email', hobby='$hobby' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<h1 style=text-align:center> Update successfully! </h1>";
    } else {
        echo "Error updating data: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
            
}
    echo "<br><h3 style=text-align:center><a href=display_data.php>Back</a></h3></br>";
?>

