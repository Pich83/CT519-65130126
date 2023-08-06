<?php
  
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {  
      $name = $_POST['name'];
      $email = $_POST['email'];
      $hobby = $_POST['hobby'];
    
      //จัดเก็บข้อมูลลงในตาราง

      include('connection.php');
      
      $sql = "INSERT INTO `detail_hobbies`(name, email, hobby) VALUES (?, ?, ?, ?)";
      $stmt = $mysqli->stmt_init();
      $stmt->prepare($query );
      $p = [0, $name, $email, $hobby];
      $stmt->bind_param('issssss', ...$p);
      $stmt->execute();

      $err = $stmt->error;
      $aff_rows = $stmt->affected_rows;
      //$insert_id = $mysqli->insert_id;

      $stmt->close();
      $mysqli->close();

      /*if ($err || $aff_rows != 1) {
            $msg = 'การสมัครสมาชิกเกิดข้อผิดพลาด<br>อีเมลที่ระบุอาจถูกใช้แล้ว';
            $contextual = 'alert-danger';
            echo <<<HTML
            <div class="alert $contextual alert-dismissible">
                  $msg
                  <button class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            </div>
            HTML;
      } else {
            $_SESSION['member_id'] = $insert_id;
            $_SESSION['member_name'] = $fname;
            echo '<script>location="member-signin.php"</script>';
            exit;
      }*/
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>65130126 - My Website</title>
  <link rel="stylesheet" href="styles2.css">
</head>

<body>
  <header>
    <h1>Pichate Keawcharoen</h1>
    <h2>65130126</h2>
  </header>
  <?php 
        include('navbar.php');
  ?>

  <main>
    <!-- Content for the My Hobbies page -->
    <section id="hobbies">
      <h2>My Hobbies</h2>
      <p>Insert your hobbies here.</p>

      <!-- Form for the My Hobbies page -->
      <form>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email">

        <label for="hobby">Favorite Hobby:</label>
        <input type="text" id="hobby" name="hobby">

        <button type="submit">Submit</button>
      </form>
    </section>
  </main>

  <script src="script.js"></script>
</body>
</html>
