<?php
require 'config.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
function openAlert() {
  alert("Morate se prijaviti kao prodavac ako zelite da postavite oglas!");
}
</script>
    <title>$elindo</title>
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <header>
        <div class="heder">  
        <img src="images/logo.jpg">
        <a href="login.php" class="dugmee">Prijavi se</a>
        <a href="registration.php" class="dugmee">Registruj se!</a>
        <input type="button" class="objavi" onclick="openAlert()" value="Dodaj oglas">
        
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
                   <form action="index.php" method="get"><input type="text" name="search" placeholder="Pretrazi" class="pretraga">
                    <button type="submit"></button>
                   </form>
                
              
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
                        <a href='detaljioglasa0.php?id=<?= $row['id'] ?>'>Detalji</a>
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
    // vraca podatke iz baze
    $query = "SELECT * FROM oglasi";
    $result = mysqli_query($conn, $query);

    // proveri da li ima rezultata
    if(mysqli_num_rows($result) > 0) {
        ?>
        <div class='glavnidiv'>
        <?php
        $count = 0;

        // prodji kroz rezultate i prikazi ih u tabeli
        while($row = mysqli_fetch_assoc($result)) {
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
                        <p class='cena'>Cena: <?= $row['cena'] ?></p>
                        <br>
                        <p>Lokacija: <?= $row['lokacija'] ?></p>
                        <br>
                    </div>
                    <div class='dugme'>
                        <a href='detaljioglasa0.php?id=<?= $row['id'] ?>'>Detalji</a>
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
        echo "Nema oglasa u bazi.";
    }
}

mysqli_close($conn);
?>


<footer class="footer">
		<div class="container">
		  <div class="row">
			<div class="footer-col">
			  <h4>$elindo</h4>
			  <ul>
				<li><a href="projekat.html" target="_blank">O nama</a></li>
                <br></br>
				<li><a href="tabela.html" target="_blank">Info</a></li>
			  </ul>
			</div>
			<div class="footer-col">
			  <h4>Treba ti pomoc?</h4>
			  <ul>
				<li><a href="login.php" target="_blank">Prijavi se!</a></li>
                <br></br>
				<li><a href="registration.php" target="_blank">Registruj se!</a></li>
			  </ul>
			</div>
			<div class="footer-col">
			  <h4>Online $elindo</h4>
			  <ul>
				<li><a href="#">Sminka</a></li>
                <br></br>
				<li><a href="#">Nakit</a></li>
			  </ul>
			</div>
			<div class="footer-col">
			  <h4>Zaprati nas na svim drustvenim mrezama pod nazivom SELINDO!</h4>
			  </div>
			</div>
		  </div>
		</div>
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');


body{
	line-height: 1.5;
	font-family: 'Poppins', sans-serif;
}
*{
	margin:0;
	padding:0;
	box-sizing: border-box;
}
.container{
	max-width: 1170px;
	margin:auto;
}
.row{
	display: flex;
	flex-wrap: wrap;
}
ul{
	list-style: none;
}
.footer{
	background-color: #24262b;
    padding: 70px 0;
}
.footer-col{
   width: 25%;
   padding: 0 15px;
}
.footer-col h4{
	font-size: 18px;
	color: #ffffff;
	text-transform: capitalize;
	margin-bottom: 35px;
	font-weight: 500;
	position: relative;
}
.footer-col h4::before{
	content: '';
	position: absolute;
	left:0;
	bottom: -10px;
	background-color: #e91e63;
	height: 2px;
	box-sizing: border-box;
	width: 50px;
}
.footer-col ul li:not(:last-child){
	margin-bottom: 10px;
}
.footer-col ul li a{
	font-size: 16px;
	text-transform: capitalize;
	color: #ffffff;
	text-decoration: none;
	font-weight: 300;
	color: #bbbbbb;
	display: block;
	transition: all 1s ease;
}
.footer-col ul li a:hover{
	color: #ffffff;
	padding-left: 8px;
}
.footer-col .social-links a{
	display: inline-block;
	height: 40px;
	width: 40px;
	background-color: rgba(255,255,255,0.2);
	margin:0 10px 10px 0;
	text-align: center;
	line-height: 40px;
	border-radius: 50%;
	color: #ffffff;
	transition: all 0.5s ease;
}
.footer-col .social-links a:hover{
	color: #24262b;
	background-color: #ffffff;
}

/*responsive*/
@media(max-width: 767px){
  .footer-col{
    width: 50%;
    margin-bottom: 30px;
}
}
@media(max-width: 574px){
  .footer-col{
    width: 100%;
}
}
</style>

	 </footer>
</body>
</html>
