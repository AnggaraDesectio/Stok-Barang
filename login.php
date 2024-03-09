<?php 

session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $result = mysqli_query($koneksi, "SELECT * FROM login WHERE username = '$username' and password = '$password'");

  // cek username
  if( mysqli_num_rows($result) === 1 ) {

    // cek password
    $row = mysqli_fetch_assoc($result);
    if( $password === $row["password"] ) {
      // set session
      $_SESSION["login"] = true;

      header("location: index.php");
    }
  }

  $error = true;

}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Inventory Barang</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
  </head>
  <body>
    <?php  if(isset($error)) : ?>
        <p style="padding: 15px;width: 250px;/* position: absolute; */border: 5px solid red;/* margin: 20px; */background-color: red;color: white;font-style: italic;text-align: center;margin: auto;margin-top: 50px;">Username / Password salah</p>
    <?php endif; ?>
    <form class = "box" action="" method = "post" target = "_blank">
      <span class="BorderTopBottom"></span>
      <span class="BorderLeftRight"></span>
      <h1> Login </h1>
      <label for="username">Username</label> <br>
      <input type="text" name = "username" id="username" autocomplete="off"  placeholder="Username" required title = "Input your username here"> <br>
      <label for="password">Password</label> <br>
      <input type="password" name = "password" id="password" placeholder="******" required title = "Input your password here" id = "myInput"> <br>
      <input type="checkbox" name="" id="ch" onclick = "check()" title = "Show password here">
      <label for="">Show Password</label> <br>
      <script>
          function check() 
          {
            var password = document.getElementById('password');
            var ch = document.getElementById('ch');
            if (ch.checked) 
            {
              password.setAttribute('type', 'text')
            } 
            else 
            {
              password.setAttribute('type', 'password')
            }
          }
      </script>
      <input type="submit" value = "Login" name="login" title = "Submit here">
    </form>
  </body>
</html>