<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "reglog");

// proveri konekciju
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['submit'])) {
    if (!isset($_SESSION['id']) || $_SESSION['vrsta_korisnika'] !== 'prodavac') {
        header("Location: login.php");
        exit;
    }
}

if(isset($_POST['submit'])) {
    $location = $_POST['location'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $delivery = $_POST['delivery'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $id_user = $_SESSION['id'];

    move_uploaded_file($image_tmp, "images/$image");

    $image_path = "images/".$image;

    $query = "INSERT INTO oglasi (lokacija, naziv, opis, cena, kolicina, nacin_dostave, slika , user_id ) VALUES ('$location', '$name', '$description', '$price', '$quantity', '$delivery', '$image_path', '$id_user')";
    mysqli_query($conn, $query);

    if(mysqli_affected_rows($conn) > 0) {
        echo "<script>alert('Oglas je objavljen!')</script>";
        header("Location: prodavac.php");
    } else {
        echo "<script>alert('Greska prilikom objavljivanja oglasa.')</script>";
    }
}
?>

<head>
<link rel="stylesheet" href="css/navbarstyle.css">
<link rel="stylesheet" href="css/oglas.css">
<script src="script.js"></script>
<title>$elindo</title>
</head>
<header>
  <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="prodavac.php">Pocetna strana</a>
  <a href="mojioglasi.php">Moji oglasi</a>
  <a href="obavestenja.php">Obavestenja</a>
</div>
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
  </header> 
<form action="" method="post" enctype="multipart/form-data">
 
<div class="desno">  
<input type="text" name="name" id="name" placeholder="Naziv" required><br><br>
<textarea name="description" id="description" placeholder="Opis" required></textarea><br><br>
<input type="text" name="price" id="price" placeholder="Cena" required><br><br>
<input type="number" name="quantity" id="quantity" min="1" step="1" placeholder="Kolicina" required><br><br>
<input type="text" name="location" id="location" placeholder="Lokacija" required><br><br>
<select name="delivery" id="delivery"  required >
<option value="kurirska_sluzba">Kurirska Sluzba</option>
<option value="licno_preuzimanje">Licno Preuzimanje</option>
<option value="posta">Posta</option>
<option value="ogranizovani_transport">Ogranizovani transport</option>
<option value="city_expres_na_selindu">City expres na Selindu</option>
</select><br><br>
</div> 
<div class="desno">
<input type="file" name="image" id="image" required><br><br>
<div id="image_preview"></div><br>
<input type="submit" name="submit" class="button" value="Objavi Oglas">

</div> 
</form>
<script>
var imageInput = document.getElementById("image");
var imagePreview = document.getElementById("image_preview");
imageInput.addEventListener("change", function(){
    var file = this.files[0];
    var reader = new FileReader();

    reader.onloadend = function(){
        imagePreview.style.backgroundImage = "url("+reader.result+")";
    }

    if(file){
        reader.readAsDataURL(file);
    } else {
        imagePreview.style.backgroundImage = "";
    }
});
</script>
