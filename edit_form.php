<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT `id`, `imie`, `Opis` FROM `podanie` WHERE `id`='$id';";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $imie = $row['imie'];
        $opis = $row['Opis'];
    } else {
        echo "Nie znaleziono wpisu.";
        exit;
    }
} else {
    echo "Nie podano identyfikatora wpisu.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Edytuj wpis</title>
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
   <div class="content">
      <h3>Hi, <span>user</span></h3>
      <h1>Edytuj wpis</h1>
      <p>Tutaj możesz edytować swoje wpisy.</p>
      <a href="user_page.php" class="btn">Wróć</a>
   </div>
   <form action="update.php" method="POST">
		<label>Imię:</label>
		<input type="text" name="imie" value="<?php echo $imie; ?>"><br><br>
      <label>Opis</label>
      <textarea name="opis"><?php echo $opis; ?></textarea><br><br>
      <input type="hidden" name="id" value="<?php echo $id; ?>">
		<input type="submit" value="Zapisz zmiany">
	</form>
</div>
</body>
</html>
