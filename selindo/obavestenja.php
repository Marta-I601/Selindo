<?php
   // primanje podataka iz poruci.php
   $oglasi = isset($_POST['oglasi']) ? $_POST['oglasi'] : array();
   $kupac = isset($_POST['kupac']) ? $_POST['kupac'] : array();

   // prikazivanje podataka na obavestenja.php
   $output = "<h2>Porudžbina od kupca</h2>";
   $output .= "<p>Informacije o oglasu:</p>";
   $output .= "<ul>";
   if (is_array($oglasi)) {
      foreach ($oglasi as $oglas) {
         $output .= "<li>$oglas</li>";
      }
   }
   $output .= "</ul>";
   $output .= "<p>Informacije o kupcu:</p>";
   $output .= "<ul>";
   if (is_array($kupac)) {
      foreach ($kupac as $podatak) {
         $output .= "<li>$podatak</li>";
      }
   }
   $output .= "</ul>";
   echo $output;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/obavestenja.css">

  <title>$elindo</title>
</head>
<body>
  <header></header>
</body>
</html>