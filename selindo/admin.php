<?php

require 'config.php';

if (empty($_SESSION)) {
  echo "<script>
  alert('Prijavite se da pristupite admin strani!');
  window.location.href = 'login.php';
  </script>";
}
// za dodavanje korisnika
if (isset($_POST['add_user'])) {
    // pripremi podatke za unos u bazi podataka
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $vrsta_korisnika = mysqli_real_escape_string($conn, $_POST['vrsta_korisnika']);
  
    // proveri da li vec postoji korisnik sa istim e-mail ili korisnickim imenom
    $query = "SELECT * FROM tb_user WHERE email = '$email' OR username = '$username'";
    $result = mysqli_query($conn, $query);
  
    if (mysqli_num_rows($result) > 0) {
      // ako postoji korisnik sa istim e-mail ili korisnickim imenom, prikazi poruku
      echo '<p>Korisnik sa unesenim emailom ili korisnickim imenom vec postoji. Molimo pokusajte ponovo.</p>';
    } else {
      // inace, unesi korisnika u bazu podataka
      $query = "INSERT INTO tb_user (name, username, email, password, vrsta_korisnika) VALUES ('$name', '$username', '$email', '$password', '$vrsta_korisnika')";
      mysqli_query($conn, $query);
  
      // preusmeri na stranicu za upravljanje korisnicima
      header('Location: admin.php');
      exit;
    }
  }

  // za blokiranje korisnika
if (isset($_POST['block_user'])) {
    // pripremi podatke za azuriranje u bazi podataka
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $status = 'Blokiran';
  
    // izvrsi upit za azuriranje korisnika u bazi podataka
    $query = "UPDATE tb_user SET status = '$status' WHERE id = $id";
    mysqli_query($conn, $query);
  
    // preusmeri na stranicu za upravljanje korisnicima
    header('Location: admin.php');
    exit;
  }
  
  //za aktiviranje korisnika
  if (isset($_POST['activate_user'])) {
    // pripremi podatke za azuriranje u bazi podataka
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $status = 'Aktivan';
  
    // izvrsi upit za azuriranje korisnika u bazi podataka
    $query ="UPDATE tb_user SET status = '$status' WHERE id = $id";
    mysqli_query($conn, $query);
  
    // preusmeri na stranicu za upravljanje korisnicima
    header('Location: admin.php');
    exit;
  }
  
  
  // za brisanje korisnika
  if (isset($_POST['delete_user'])) {
    // pripremi podatke za brisanje iz baze podataka
    $id = mysqli_real_escape_string($conn, $_POST['id']);
  
    // izvrsi upit za brisanje korisnika i njegovih oglasa iz baze podataka
    $query = "DELETE tb_user, oglasi FROM tb_user LEFT JOIN oglasi ON tb_user.id = oglasi.user_id WHERE tb_user.id = $id";
    mysqli_query($conn, $query);
  
    // preusmeri na stranicu za upravljanje korisnicima
    header('Location: admin.php');
    exit;
  }

// za dodavanje korisnika
if (isset($_POST['add_user'])) {
    // pripremi podatke za unos u bazi podataka
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $vrsta_korisnika = mysqli_real_escape_string($conn, $_POST['vrsta_korisnika']);
  
    // proveri da li vec postoji korisnik sa istim emailom ili korisnickim imenom
    $query = "SELECT * FROM tb_user WHERE email = '$email' OR username = '$username'";
    $result = mysqli_query($conn, $query);
  
    if (mysqli_num_rows($result) > 0) {
      // ako postoji korisnik sa istim emailom ili korisnickim imenom, prikazi poruku
      echo '<p>Korisnik sa unesenim emailom ili korisnickim imenom vec postoji. Molimo pokusajte ponovo.</p>';
    } else {
      // inace, unesi korisnika u bazu podataka
      $query = "INSERT INTO tb_user (name, username, email, password, vrsta_korisnika) VALUES ('$name', '$username', '$email', '$password', '$vrsta_korisnika')";
      mysqli_query($conn, $query);
  
      // preusmeri na stranicu za upravljanje korisnicima
      header('Location: admin.php');
      exit;
    }
  }

  //za blokiranje korisnika
if (isset($_POST['block_user'])) {
    // pripremi podatke za azuriranje u bazi podataka
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $status = 'Blokiran';
  
    // izvrsi upit za azuriranje korisnika u bazi podataka
    $query = "UPDATE tb_user SET status = '$status' WHERE id = $id";
    mysqli_query($conn, $query);
  
    // preusmeri na stranicu za upravljanje korisnicima
    header('Location: admin.php');
    exit;
  }
  
  //za aktiviranje korisnika
  if (isset($_POST['activate_user'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $status = 'Aktivan';
    $query ="UPDATE tb_user SET status = '$status' WHERE id = $id";
    mysqli_query($conn, $query);
  
    header('Location: admin.php');
    exit;
  }
  
  
  // za brisanje korisnika
  if (isset($_POST['delete_user'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
  
    $query = "DELETE FROM tb_user WHERE id = $id";
    mysqli_query($conn, $query);
  
    header('Location: admin.php');
    exit;
  }
  // dohvati sve korisnike iz baze podataka
$query = "SELECT * FROM tb_user";
$result = mysqli_query($conn, $query);
?>
<head>
  <title>$elindo</title>
  <link rel="stylesheet" type="text/css" href="css/admin4.css"> 
  <a href="logout.php">Izadji</a>
  <br></br>
</head>
<br>

<table border="1" max-width="auto">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Username</th>
    <th>Email</th>
    <th>Vrsta korisnika</th>
    <th>Status</th>
    <th>Opcije</th>
  </tr>

  <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <tr>
      <td><?= $row['id'] ?></td>
      <td><?= $row['name'] ?></td>
      <td><?= $row['username'] ?></td>
      <td><?= $row['email'] ?></td>
      <td><?= $row['vrsta_korisnika'] ?></td>
      <td><?= $row['status'] ?></td>
      <td>
      <select onchange="izaberiDugme(this)">
          <option value="" selected disabled>Izaberi</option>
          <option value="activate_user">Odblokiraj</option>
          <option value="block_user">Blokiraj</option>
          <option value="delete_user">Obrisi</option>
        </select>

      </td>
    </tr>
  <?php endwhile; ?>
</table>

<script>
  function izaberiDugme(selectElement) {
    var selectedOption = selectElement.value;
    var row = selectElement.parentNode.parentNode;
    var id = row.querySelector('[name="id"]').value;

    switch (selectedOption) {
      case "activate_user":
        break;
      case "block_user":
        break;
      case "delete_user":
        break;
    }
  }
</script>
<a href="dodajkorisnika.php" id="add_user_btn">Dodaj korisnika</a>
<script>

  mysqli_close($conn);
</script>

      
 
