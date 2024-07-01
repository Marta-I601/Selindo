<?php
include_once 'config.php';
if(count($_POST)>0) {
  if(isset($_FILES['slika']['name']) && $_FILES['slika']['name'] != '') {
    $img_path = 'images/' . time() . '_' . $_FILES['slika']['name'];
    move_uploaded_file($_FILES['slika']['tmp_name'], $img_path);
    mysqli_query($conn,"UPDATE oglasi set id='" . $_POST['id'] . "', slika='" . $img_path . "', lokacija='" . $_POST['lokacija'] . "', naziv='" . $_POST['naziv'] . "', opis='" . $_POST['opis'] . "' ,cena='" . $_POST['cena'] . "', kolicina='" . $_POST['kolicina'] . "', nacin_dostave='" . $_POST['nacin_dostave'] . "' WHERE id='" . $_POST['id'] . "'");
  } else {
    mysqli_query($conn,"UPDATE oglasi set id='" . $_POST['id'] . "', lokacija='" . $_POST['lokacija'] . "', naziv='" . $_POST['naziv'] . "', opis='" . $_POST['opis'] . "' ,cena='" . $_POST['cena'] . "', kolicina='" . $_POST['kolicina'] . "', nacin_dostave='" . $_POST['nacin_dostave'] . "' WHERE id='" . $_POST['id'] . "'");
  }
  $message = "Oglas je uspesno izmenjen!";
  header('Location: mojioglasi.php');
}
$result = mysqli_query($conn,"SELECT * FROM oglasi WHERE id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
  <title>$elindo</title>
  <link rel="stylesheet" href="css/izmenaoglasa.css">
</head>
<body>
  <form  method="post" action="" enctype="multipart/form-data">

  <div class="levo">
  <label>ID</label>
  <input type="hidden" name="id" class="txtField" value="<?php echo $row['id']; ?>">
  <input type="text" name="id"  value="<?php echo $row['id']; ?>">

  <label>Lokacija</label>
  <input type="text" name="lokacija" class="txtField" value="<?php echo $row['lokacija']; ?>">
  
  <label>Naziv oglasa</label>
  <input type="text" name="naziv" class="txtField" value="<?php echo $row['naziv']; ?>">
  
  <label>Opis oglasa</label><br>
  <textarea type="text-area" name="opis" class="txtField" value="<?php echo $row['opis']; ?>"></textarea>
  
  <label >Cena proizvoda</label>
  <input type="number" name="cena" class="txtField" value="<?php echo $row['cena']; ?>">
  
  <label >Kolicina: </label>
  <input type="number" name="kolicina" class="txtField" value="<?php echo $row['kolicina']; ?>">
  
  <label >Nacin dostave: </label>
  <input type="text" name="nacin_dostave" class="txtField" value="<?php echo $row['nacin_dostave']; ?>">
  
  
</div>
<div class="desno">
    <div class="slika-oglas" id="image_preview">
    <img src="<?php echo $row['slika']; ?>">
  </div>
    <label>Slika oglasa:</label>
  <input type="file" name="slika" id="image" accept="image/*">
  <input type="submit" name="submit" value="Izmeni oglas!" class="button" ><br> 
  <a href="mojioglasi.php">Vrati se na prethodnu stranu</a>
  
</div>

</form>
<script>
var imageInput = document.getElementById("image");
var imagePreview = document.getElementById("image_preview");
imageInput.addEventListener("change", function(){
    var file = this.files[0];
    var reader = new FileReader();

    reader.onloadend = function(){
        imagePreview.innerHTML = "";
        var img = document.createElement("img");
        img.src = reader.result;
        imagePreview.appendChild(img);
    }

    if(file){
        reader.readAsDataURL(file);
    } else {
        imagePreview.innerHTML = "";
    }
});
</script>
</body>
</html>
