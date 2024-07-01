<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: login.php");
}
  

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>$elindo</title>
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/prodavac.css">
</head>
<body>
    <header>
        <div class="heder">  
        <img src="images/logo.jpg">
       <!-- <h3><?php echo $row["vrsta_korisnika"]; ?></h3> -->
        <a href="logout.php" class="odjava">Odjava</a>
       
        
        
        <nav class="nav-bar">

                        <ul>
                <li>
                   <form action="prodavac.php" method="get"><input type="text" name="search" placeholder="Pretrazi oglase" class="pretraga">
                    <button type="submit"></button>
                   </form>
                </li>
                <li>
                    <a href="prodavac.php" class="active">Dobrodosli na pocetak!</a>
                </li>
                <li>
                    <a href="mojioglasi.php" >Moji oglasi</a>
                </li>
                <li>
                    <a href="oglas.php" class="objavi">Objavi nov oglas besplatno!</a>
                </li>
            </ul>

        </nav>
    </header>
    <?php
$conn = mysqli_connect("localhost", "root", "", "reglog");

// Proveri konekciju
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$db = mysqli_connect("localhost", "root", "", "reglog");
if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($db, $_GET['search']);
    $query = "SELECT * FROM oglasi WHERE naziv LIKE '%$search%'";
    $results = mysqli_query($db, $query);

    if (mysqli_num_rows($results) > 0) {
        ?>
        <div class='glavnidiv'>
        <?php
        while ($row = mysqli_fetch_array($results)) {
            ?>
            <div class='oglas'>
                <div>
                    <img src="<?= $row['slika'] ?>" class='slika' width='300px' height='300px'>
                </div>
                <div class='podaci'>
                    <div class='text'>
                        <br>
                        <p><?= $row['naziv'] ?></p>
                        <br>
                        <p>Cena: <?= $row['cena'] ?></p>
                        <br>
                        <p>Lokacija: <?= $row['lokacija'] ?></p>
                        <br>
                    </div>
                    <div class='dugme'>
                        <a href='detaljioglasa1.php?id=<?= $row['id'] ?>'>Detalji</a>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        </div>
        <?php
    } else {
        echo "Nema rezultata za trazeni pojam!";
    }
} else {
    // Preuzmi podatke iz baze
    $query = "SELECT * FROM oglasi";
    $result = mysqli_query($conn, $query);

    // Proveri da li ima rezultata
    if (mysqli_num_rows($result) > 0) {
        ?>
        <div class='glavnidiv'>
        <?php
        $count = 0;

        // Prodji kroz rezultate i prikazi ih
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class='oglas'>
                <div>
                    <img src="<?= $row['slika'] ?>" class='slika' width='300px' height='300px'>
                </div>
                <div class='podaci'>
                    <div class='text'>
                        <br>
                        <p><?= $row['naziv'] ?></p>
                        <br>
                        <p>Cena: <?= $row['cena'] ?></p>
                        <br>
                        <p><?= $row['lokacija'] ?></p>
                        <br>
                    </div>
                    <div class='dugme'>
                        <a href='detaljioglasa1.php?id=<?= $row['id'] ?>' class='detalji'>Detalji</a>
                    </div>
                </div>
            </div>
            <?php
            $count++;
        }
        ?>
        </div>
        <?php
    } else {
        echo "Nema objavljenih oglasa.";
    }
}
mysqli_close($conn);
?>

</body>
</html>