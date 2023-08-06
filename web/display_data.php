<!DOCTYPE html>
<html>
<head>
    <style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    table.center {
        margin-left: auto; 
        margin-right: auto;
    }
</style>
</head>
    <?php 
        include('header.php');
        include('navbar.php');
    ?>
<body>
    <h2 style="text-align:center">List Hobbies</h2>
    <table class="center">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Hobby</th>
            <th>Action</th>
        </tr>

        <?php
        // Database connection details
        include('connection.php');

        // Fetch data from the table
        $sql = "SELECT id, name, email, hobby FROM detail_hobbies";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['hobby']."</td>";
                echo "<td><a href='edit_data.php?id=".$row['id']."'>Edit</a> | <a href='delete_data.php?id=".$row['id']."'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No data found</td></tr>";
        }

        // Close the database connection
        $conn->close();
        ?>
    </table>
</body>
</html>
