  <?php 
        include('header.php');
        include('navbar.php');
  ?>

  <main>
    <!-- Content for the My Hobbies page -->
    <section id="hobbies">
      <h2>My Hobbies</h2>
      <p>Insert your hobbies here.</p>

      <!-- Form for the My Hobbies page -->
      <form action="process_form.php" method="post">
        <label>Name:</label>
        <input type="text" name="name" required><br><br>

        <label>Email:</label>
        <input type="email" name="email" required><br><br>

        <label>Hobby:</label>
        <input type="text" name="hobby" required><br><br>

        <input type="submit" name="submit" value="Submit">
    </form>
    </section>
  </main>
