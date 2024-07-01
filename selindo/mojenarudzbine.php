<?php
  require_once 'config.php';

  if(isset($_POST['id'])){
    $id = $_POST['id'];
    $user_id = $_SESSION['id'];
    $query = "INSERT INTO narudzbine (oglas_id, korisnik_id) VALUES ($id, $user_id)";
    mysqli_query($conn, $query);
    echo "<script>
    alert('Ovaj oglas je uspesno dodat u vasu korpu!');
    window.location.href = 'kupac.php';
    </script>";
  }

  $query = "SELECT oglasi.*, narudzbine.id AS narudzbina_id FROM oglasi INNER JOIN narudzbine ON oglasi.id = narudzbine.oglas_id WHERE narudzbine.korisnik_id = " . $_SESSION['id'];
  $result = mysqli_query($conn, $query);
  
  if(isset($_POST['delete_oglas'])){
    $id = $_POST['id'];
    $user_id = $_SESSION['id'];
    $query = "DELETE FROM narudzbine WHERE oglas_id = $id AND korisnik_id = $user_id";
    mysqli_query($conn, $query);
    header('Location: mojenarudzbine.php');
  }
  
?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/navbarstyle2.css">
<link rel="stylesheet" href="css/mojenarudzbine.css">
<script src="script.js"></script>
<head>
  <title>$elindo</title>
</head>
<body>
  <header>
  <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="kupac.php">Pocetna strana</a>
  <a href="obavestenja.php">Obavestenja</a>
</div>
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
  </header> 
  <h1>Moje narudzbine</h1>
  <table>
    <tr>
      <th>Slika</th>
      <th>Naziv</th>
      <th>Opis</th>
      <th>Kolicina</th>
      <th>Cena</th>
      <th>Lokacija</th>
      
      <th>Opcije</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)){ ?>
      <tr>
        <td><img src='<?php echo $row['slika']; ?>'   width='200px' height='200px'></td>
        <td class="manja"><?php echo $row['naziv']; ?></td>
        <td class="manja"><?php echo $row['opis']; ?></td>
        <td><?php echo $row['kolicina']; ?></td>
        <td><?php echo $row['cena']; ?></td>
        <td><?php echo $row['lokacija']; ?></td>
        
        <td>
        <input type="submit" name="poruci" class="button" value="Poruci proizvod" onclick="showAlertAndRedirect()">
      <script>
        function showAlertAndRedirect() {
            alert("Proizvod je porucen i poslat na Vasu adresu!");
            window.location.href = "kupac.php";
        }
    </script>
        <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="submit" name="delete_oglas" class="button" value="Obrisi iz korpe">
        </form>
        </td>
      </tr>
    <?php } ?>
  </table>