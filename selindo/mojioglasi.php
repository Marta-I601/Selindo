<?php
session_start();

$db = mysqli_connect("localhost", "root", "", "reglog");

// proveri konekciju
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// uzmi trenutne podatke o korisniku
$id_user = $_SESSION['id'];
$query = "SELECT * FROM tb_user WHERE id = '$id_user'";
$user_data = mysqli_query($db, $query);
$user = mysqli_fetch_assoc($user_data);

$query = "SELECT * FROM oglasi WHERE user_id = '$id_user'";
$ad_result = mysqli_query($db, $query);

// izbrisi
if (isset($_POST['delete_oglas'])) {
    $id = mysqli_real_escape_string($db, $_POST['id']);
  
    $query = "DELETE FROM oglasi WHERE id = $id";
    mysqli_query($db, $query);
  
    header('Location: mojioglasi.php');
    exit;
}
?>

<?php
    ?>
    <head>
        <link rel='stylesheet' href='css/navbarstyle1.css'>
        <link rel='stylesheet' href='css/mojioglasi.css'>
        <script src='script.js'></script>
    </head>
    <header>
        <div id='mySidenav' class='sidenav'>
            <a href='javascript:void(0)' class='closebtn' onclick='closeNav()'>&times;</a>
            <a href='prodavac.php'>Pocetna strana</a>
            <a href='obavestenja.php'>Obavestenja</a>
            <a href='oglas.php'>Objavi Oglas</a>
        </div>
        <span style='font-size:30px;cursor:pointer' onclick='openNav()'>&#9776;</span>
    </header>
    <?php
    
    if (mysqli_num_rows($ad_result) > 0) {
        while ($row = mysqli_fetch_assoc($ad_result)) {
            ?>
            <br>
            <form method='post'>
                <div class='slika'>
                    <img src="<?= $row['slika'] ?>" class='slika' width='300px' height='300px'>
                </div>
                <div class='informacije'>
                    Naziv: <?= $row['naziv'] ?><br>
                    Opis: <?= $row['opis'] ?><br>
                    Kolicina: <?= $row['kolicina'] ?><br>
                    Nacin dostave: <?= $row['nacin_dostave'] ?><br>
                    Lokacija: <?= $row['lokacija'] ?><br><br>
                    Cena: <?= $row['cena'] ?><br>
                </div>
                <div class='dugmici'>
                    <input type="submit" name="delete_oglas" class="button" value="Obrisi">
                    <a href="izmenaoglasa.php?id=<?= $row['id'] ?>" class="button">Azuriraj</a>
                    <a href='oglas.php' class="button">Objavi novi oglas</a><br>
                    <input type='hidden' name='id' value='<?= $row['id'] ?>'>
                </div>
                <br>
            </form>
            <?php
        }
    } else {
        echo "<script>
                alert('Nema oglasa!');
                window.location.href = 'prodavac.php';
              </script>";
    }
    mysqli_close($db);
?>
