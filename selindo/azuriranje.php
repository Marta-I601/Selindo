<?php
include_once 'config.php';
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE tb_user set id='" . $_POST['id'] . "', name='" . $_POST['name'] . "', username='" . $_POST['username'] . "', email='" . $_POST['email'] . "' ,vrsta_korisnika='" . $_POST['vrsta_korisnika'] . "', status='" . $_POST['status'] . "' WHERE id='" . $_POST['id'] . "'");
$message = "Korisnik je uspresno azuriran!";
header('Location: admin.php');
}
$result = mysqli_query($conn,"SELECT * FROM tb_user WHERE id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
<title>Azuriranje korisnika</title>
<link rel="stylesheet" href="azuriranje.css">
</head>
<body>
<form name="frmUser" method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div style="padding-bottom:5px;">

</div>
<label>ID</label>
<input type="hidden" name="id" class="txtField" value="<?php echo $row['id']; ?>">
<input type="text" name="id"  value="<?php echo $row['id']; ?>">

<label>Ime</label>
<input type="text" name="name" class="txtField" value="<?php echo $row['name']; ?>">

<label>Username</label>
<input type="text" name="username" class="txtField" value="<?php echo $row['username']; ?>">

<label>Email</label>
<input type="text" name="email" class="txtField" value="<?php echo $row['email']; ?>">

<label >Vrsta korisnika: </label>
<select name="vrsta_korisnika" class="txtField">
<option value="admin" <?php if ($row['vrsta_korisnika'] == 'admin') echo 'selected'; ?>>Admin</option>
<option value="prodavac" <?php if ($row['vrsta_korisnika'] == 'prodavac') echo 'selected'; ?>>Prodavac</option>
<option value="kupac" <?php if ($row['vrsta_korisnika'] == 'kupac') echo 'selected'; ?>>Kupac</option>
</select>

<label >Status: </label>
<select name="status" class="txtField">
<option value="Aktivan" <?php if ($row['status'] == 'Aktivan') echo 'selected'; ?>>Aktivan</option>
<option value="Blokiran" <?php if ($row['status'] == 'Blokiran') echo 'selected'; ?>>Blokiran</option>
</select>

<input type="submit" name="submit" value="Zameni vrednosti!" class="button">
<a href="admin.php">Vrati se na admin stranu</a>
</form>
</body>


</html> 