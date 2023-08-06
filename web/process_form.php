
<?php
  include('header.php');
// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $hobby = $_POST['hobby'];

    // Database connection details
    include('connection.php');  

    // Prepare and execute the SQL statement to insert data into the table
    $sql = "INSERT INTO detail_hobbies (name, email, hobby) VALUES ('$name', '$email', '$hobby')";

    if ($conn->query($sql) === TRUE) {
        echo "<h1 style=text-align:center> Data added successfully! </h1>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
  echo "<br><h3 style=text-align:center><a href=index.php>Back To Home</a></h3></br>";
?>

