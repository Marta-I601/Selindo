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
  <link rel="stylesheet" href="css/detaljioglasa.css">
<script src="script.js"></script>
  <title>$elindo</title>
</head>
<body>
  <header>
  <div id="mySidenav" class="sidenav">  
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="kupac.php">Nazad na pocetak</a>
  <a href="mojenarudzbine.php">Moje narudzbine</a>
  <a href="obavestenja.php">Obavestenja</a>
</div>
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Jos opcija?</span>
<button id="kom_btn" class="">Komentar i ocena</button>
  </header> 

  <form action="mojenarudzbine.php" method="post" class="detalji">
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
    <input type="submit" class="button" value="Dodaj proizvod u korpu">
    <br>
  </form>
      <div id="kom_form" style="display: none;">
        <br>
    <form action="komentarisi.php"  method="post" >

    <label for="comment" >Unesite komentar:</label><br>
    <input type="hidden" name="oglas_id" value="<?php echo $id; ?>">
    <textarea id="comment" name="comment" rows="5" cols="30"></textarea>
    <br><br>
    <label>Ocenite proizvod:</label>
    <br>
    <div class="radio"> 
    <input type="radio" id="rating1" name="rating" value="1">
    <label for="rating1">1</label>
    <input type="radio" id="rating2" name="rating" value="2">
    <label for="rating2">2</label>
    <input type="radio" id="rating3" name="rating" value="3">
    <label for="rating3">3</label>
    <input type="radio" id="rating4" name="rating" value="4">
    <label for="rating4">4</label>
    <input type="radio" id="rating5" name="rating" value="5">
    <label for="rating5">5</label>
  </div>
    <br><br>
    <input type="submit" value="Pošalji komentar" class="komdugme">
  </form>
</div>

<script>
  document.getElementById("kom_btn").addEventListener("click", function() {
    document.getElementById("kom_form").style.display = "flex";
  });
</script>

</body>
</html>
<?php
    }
    mysqli_close($conn);
?>

