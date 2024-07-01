<?php
$conn = mysqli_connect("localhost", "root", "", "reglog");
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $vrsta_korisnika = $_POST["vrsta_korisnika"];

  $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Username ili Email su vec zauzeti.Pokusajte ponovo!'); </script>";
  }
  else{
    if($password == $confirmpassword){
      $query = "INSERT INTO tb_user (name,username,email,password,vrsta_korisnika) VALUES('$name','$username','$email','$password','$vrsta_korisnika')";

      mysqli_query($conn, $query);
      echo
      "<script> alert('Registracija uspesna!'); 
      window.location.href = 'login.php';
      </script>";
    
    }
    else{
      echo
      "<script> 
      alert('Lozinke se ne poklapaju!'); 

      </script>";
    }
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/registration.css">
    <title>Registracija</title>
  </head>
  <body>
   
    <form class="" action="" method="post" autocomplete="on">
      <h2>Registracija</h2>
     
      <input type="text" name="name" id = "name"  placeholder="Ime" required value=""> <br>
      <input type="text" name="username" id = "username" placeholder="Username" required value=""> <br>
      <input type="email" name="email" id = "email" placeholder="Email" required value=""> <br>
      <input type="password" name="password" id = "password" placeholder="Lozinka" required value=""> <br>
      <input type="password" name="confirmpassword" id = "confirmpassword" placeholder="Potvrdi lozinku" required value=""> <br><br>
  
        <select id="vrsta_korisnika" name="vrsta_korisnika"  placeholder="Vrsta korisnika" required >
        <option value="prodavac" >Prodavac</option>
        <option value="kupac">Kupac</option >
        </select>
      <button type="submit" name="submit">Registracija</button><br><br>
       <a href="login.php">Imas nalog? Prijavi se.</a>
    </form>
    <br>
   
  </body>
</html>
