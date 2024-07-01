<div id="add_user_form">
  <form method="post">
    <input id="add_user_input" type="text" id="name" name="name" required placeholder="Ime"><br>
    <input id="add_user_input" type="text" id="username" name="username" required placeholder="Korisnicko ime"><br>
    <input id="add_user_input" type="email" id="email" name="email" required placeholder="Email"><br>
    <input id="add_user_input" type="password" id="password" name="password" required placeholder="Lozinka"><br>
    <select id="vrsta_korisnika" name="vrsta_korisnika" placeholder="Ime">
      <option value="admin">Admin</option>
      <option value="prodavac">Prodavac</option>
      <option value="kupac">Kupac</option>
    </select><br>
    <input type="submit" id="add_user_dugme" name="add_user" value="Dodaj korisnika">
  </form>
  <button onclick="goBack()">Vrati se nazad!</button>
</div>

<script>
  function goBack() {
    window.history.back();
  }
</script>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/dodajkorisnika.css">
<script src="script.js"></script>
<head>
  <title>$elindo</title>
</head>
<body>
  <header></header>