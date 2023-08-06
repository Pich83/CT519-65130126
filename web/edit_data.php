<?php

  include('header.php');
  echo "<h1 style=text-align:center>Edit Hobbies</h1>";

// Check if the ID parameter is provided
if (isset($_GET['id'])) {
    // Database connection details
    
    include('connection.php');   
      
    // Get the ID from the parameter
    $id = $_GET['id'];

    // Fetch the data based on the provided ID
    $sql = "SELECT id, name, email, hobby FROM detail_hobbies WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Display a form to edit the data
        echo "<form align=center action='update_data.php' method='post'>";
        echo "<input type='hidden' name='id' value='".$row['id']."'>";
        echo "Name: <input type='text' name='name' value='".$row['name']."'><br><br>";
        echo "Email: <input type='email' name='email' value='".$row['email']."'><br><br>";
        echo "Hobby: <input type='text' name='hobby' value='".$row['hobby']."'><br><br>";
        echo "<input type='submit' name='submit' value='Update'>";
        echo "</form>";
    } else {
        echo "No data found";
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Invalid request";
}
?>
