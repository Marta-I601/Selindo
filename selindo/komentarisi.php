<?php
  require_once 'config.php';

  if (isset($_POST['id']) && isset($_POST['user_id']) && isset($_POST['oglas_id'])) {
    $id = $_POST['id'];
    $username = $_POST['user_id'];
    $oglas_id = $_POST['oglas_id'];
  } else {
    
  }

  if(isset($_POST['comment']) && isset($_POST['rating'])){
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);
    $rating = mysqli_real_escape_string($conn, $_POST['rating']);
    $username = mysqli_real_escape_string($conn, $_SESSION['id']); 
    $oglas_id = mysqli_real_escape_string($conn, $_POST['oglas_id']);
    $vlasnik_id =  mysqli_real_escape_string($conn, $_POST['user_id']);
    $query = "INSERT INTO komentari (komentar, ocena, autor_id, oglas_id , vlasnik_id) VALUES ('$comment', '$rating', '$username', '$oglas_id' , '$vlasnik_id')";
    if(mysqli_query($conn, $query)){
      echo "<script>
          alert('Komentar je uspesno dodan!');
              window.location.href = 'kupac.php';
        </script>";
    } else {
      echo "Došlo je do greške prilikom dodavanja komentara.";
    }
  }
?>


