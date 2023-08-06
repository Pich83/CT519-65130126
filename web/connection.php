<?php
    // Database connection details
        // Database connection details
        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "hobbies";
        $port = "4306";

        // Create a database connection
        $conn = new mysqli($servername, $username, $password, $dbname, $port);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?>