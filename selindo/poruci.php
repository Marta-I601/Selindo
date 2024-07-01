<?php
  require_once 'config.php';

  if(isset($_POST['id'])){
    $id = $_POST['id'];
    $query = "SELECT * FROM oglasi WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $proizvod = $row['naziv'];
    $kolicina = $row['kolicina'];
    $cena = $row['cena'];
    $lokacija = $row['lokacija'];
    $korisnik = $_SESSION['username'];

    header("Location: obavestenja.php");
  }
  mysqli_close($conn);
?>
