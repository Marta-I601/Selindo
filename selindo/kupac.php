<?php
require 'config.php';

if (empty($_SESSION)) {
    echo "<script>
    alert('Prijavite se da pristupite kao kupac!');
    window.location.href = 'login.php';
    </script>";
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
    <link rel="stylesheet" href="css/kupac.css">
</head>
<body>
    <header>
        <div class="heder">  
        <img src="images/logo.jpg">
       <!-- <h3>kupac</h3> -->
        <a href="logout.php" class="odjava">Odjava</a>
        
</div>
    </div>
        <div class="klasa123">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
        <nav class="nav-bar">

                        <ul>
                <li>
                   <form action="kupac.php" method="get"><input type="text" name="search" placeholder="Pretrazi" class="pretraga">
                    <button type="submit"></button>
                   </form>
                </li>
                <li>
                    <a href="kupac.php" class="active">Dobrodosli na pocetak!</a>
                </li>
                <li>
                    <a href="mojenarudzbine.php" >Moje narudžbine</a>
                </li>
                <li>
                    <a href="obavestenja.php">Obaveštenja</a>
                </li>
            </ul>

        </nav>
    </header>

    <script>
        klasa123 = document.querySelector(".klasa123");
        klasa123.onclick = function() {
            navBar = document.querySelector(".nav-bar");
            navBar.classList.toggle("active");
        } 
    </script>
<?php
$conn = mysqli_connect("localhost", "root", "", "reglog");

// proveri konekciju
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$db = mysqli_connect("localhost", "root", "", "reglog");
if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($db, $_GET['search']);
    $query = "SELECT * FROM oglasi WHERE naziv LIKE '%$search%'";
    $results = mysqli_query($db, $query);

    if (mysqli_num_rows($results) > 0) {
        $output = "<div class='glavnidiv'>";
        while ($row = mysqli_fetch_array($results)) {
            $output .= "<div class='oglas'>
                            <div>
                                <img src='". $row['slika'] ."'  class='slika' width='300px' height='300px'>
                            </div>
                            <div class='podaci'>
                                <div class='text'>
                                    <br>
                                    <p>".$row['naziv']."</p>
                                    <br>
                                    <p>Cena: ".$row['cena']."</p>
                                    <br>
                                    <p>Lokacija: ".$row['lokacija']."</p>
                                    <br>
                                </div>
                                <div class='dugme'>
                                    <a href='detaljioglasa.php?id=".$row['id']."'>Detalji</a>
                                </div>
                            </div>
                        </div>";
        }
        $output .= "</div>";
        echo $output;
    } else {
        echo "Nema rezultata za trazeni pojam!";
    }
} else {
    // Retrieve data from the database
    $query = "SELECT * FROM oglasi";
    $result = mysqli_query($conn, $query);

    // Check if there are any results
    if(mysqli_num_rows($result) > 0) {
        $output = "<div class='glavnidiv'>";
        $count = 0;

        // Loop through the results and display them
        while($row = mysqli_fetch_assoc($result)) {
            $output .= "<div class='oglas'>
                            <div>
                                <img src='". $row['slika'] ."'  class='slika' width='300px' height='300px'>
                            </div>
                            <div class='podaci'>
                                <div class='text'>
                                    <br>
                                    <p>".$row['naziv']."</p>
                                    <br>
                                    <p class='cena'>Cena: ".$row['cena']."</p>
                                    <br>
                                    <p>Lokacija: ".$row['lokacija']."</p>
                                    <br>
                                </div>
                                <div class='dugme'>
                                    <a href='detaljioglasa.php?id=".$row['id']."'>Detalji</a>
                                </div>
                            </div>
                        </div>";
            $count++;
        }
        $output .= "</div>";
        echo $output;
    } else {
        echo "Nema oglasa u bazi.";
    }
}

mysqli_close($conn);
?>
</body>
</html>