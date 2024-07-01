<?php
  require_once 'config.php';
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM oglasi WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="css/navbarstyle.css">
  <link rel="stylesheet" href="css/detaljioglasa1.css">
  <script src="script.js"></script>
<script>
function openAlert() {
  alert("Morate se prijaviti kao kupac kako bi dodali proizvod u korpu!");
}
</script>
  <title>$elindo</title>
</head>
<body>
  <header>
  <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="prodavac.php">Pocetna strana</a>
  <a href="oglas.php">Dodaj oglas</a>
  <a href="komentari.php">Komentari i ocene</a>
</div>
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
  </header> 
  <form action="" method="post">
    <div class="levo">
      <div class='slika'> 
    <img src='<?php echo $row['slika']; ?>'   width='400px' height='400px'>
     </div> 
   </div> 
   <div class="desno"> 
    <h1><?php echo $row['naziv']; ?></h1>
    <p>Opis: <?php echo $row['opis']; ?></p>
    <p>Kolicina: <?php echo $row['kolicina']; ?></p>
    <p>Cena: <?php echo $row['cena']; ?></p>
    <p>Lokacija: <?php echo $row['lokacija']; ?></p>
    <p>Nacin dostave: <?php echo $row['nacin_dostave']; ?></p>
    <br>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="button" class="button" onclick="openAlert()" value="Dodaj proizvod u korpu">
  </div>
  </form>

</body>
</html>
<?php
    }
    mysqli_close($conn);
?>

