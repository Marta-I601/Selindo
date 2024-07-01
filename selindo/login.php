 <?php
require 'config.php';


if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      $_SESSION["usernameemail"] = $row["usernameemail"];
      if($row["vrsta_korisnika"] == "admin"){
        header("Location: admin.php");
        }else if($row["vrsta_korisnika"] == "kupac"){
        header("Location: kupac.php");
        } else if ($row["vrsta_korisnika"] == "prodavac") {
        header("Location: prodavac.php");
        }
    }
    else{
      echo
      "<script> alert('Netacna lozinka.'); </script>";
    }
  }
  else{
    echo
    "<script> alert('Korisnik nije registrovan.'); </script>";
  }
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Prijava</title>

<link rel="stylesheet" href="css/login.css">
  </head>
  <body>
    
    <form class="" action="" method="post" autocomplete="on">
      <h2>Prijava</h2>
      <label for="usernameemail">Username ili Email : </label>
      <input type="text" name="usernameemail" id = "usernameemail" required value=""> <br>
      <label for="password">Lozinka : </label>
      <input type="password" name="password" id = "password" required value=""> <br>
      <br><button type="submit" name="submit">Prijavi se</button><br><s></s>
      <br><a href="registration.php">Nemas nalog. Registruj se!</a>
    </form>
    <br>
    
  </body>
</html>
