<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

if(isset($_POST['imie'])){
    $imie = $_POST['imie'];
    $opis = $_POST['Opis'];
    $user_id = $_SESSION['user_name'];
    $sql = "INSERT INTO `podanie` (`id`, `imie`, `Opis`, `user_id`) VALUES (NULL, '$imie', '$opis', '$user_id');";

    if ($conn->query($sql) === TRUE) {
        echo "Imię dodane pomyślnie";
    } else {
        echo "Błąd: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT `id`,`imie`, `Opis` FROM `podanie` WHERE `user_id`='".$_SESSION['user_name']."';";


$result = $conn->query($sql);




?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>user page</title>
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/stylejs.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<nav class="navbar bg-body-tertiary fixed-top">
  <div class="container-fluid">
    <img id="foto" src="jpg/logo.jpg" alt="">
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Hej, <span><?php echo $_SESSION['user_name'] ?></span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#section1">Zgłoszenie</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#section2">Chat</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
<section id="section1">
<div class="container"> 
<img src="jpg/envelope.png" class="addbtn2" onclick="dodajForm()">
    <div class="formulaz" style=" display: none;" >
   <form action="user_page.php" method="POST">
		<label>Imię:</label>
		<input type="text" name="imie"><br><br>
      <label>Opis</label>
      <input type="text" name="Opis"><br><br>
      <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_name']; ?>">
		<input type="submit" value="Dodaj Imię i Opis">
	</form>
</div>

<table>
        <thead>
            <tr>
                <th>Imię zgłaszającego</th>
                <th>Opis</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
        <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['imie'] . "</td>";
                    echo "<td>" . $row['Opis'] . "</td>";
                    echo "<td><a href='edit_form.php?id=".$row['id']."'>Edytuj</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>Brak wyników.</td></tr>";
            }
        ?>
         
        </tbody>
    </table>
    
</div>
</section>
<section id="section2">
        <div class="wpisz">
            
            <?php 
            $sql = "SELECT * FROM `user_form`";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>Użytkownik</th></tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td onclick='openChat(\"" . $row["name"] . "\"); loadChatHistory(\"" . $row["name"] . "\");'>" . $row["name"] . "</td></tr>";

                }
                echo "</table>";
             } else {
                echo "";
             }
            
            ?>
            </div>

            
            <div id="chat">
            <h6 id="chat-title"></h6>
            <div id="history" >
        <!-- tutaj będą wyświetlane wiadomości czatu -->
        
            </div>
            <form id="chat-form" action="send_chat_message.php" method="post">
            <input type="hidden" name="recipient_id" value="">
        <input type="text" name="message" placeholder="Wpisz wiadomość...">
        <input type="submit" value="Wyślij">
        </form>
        </div>
        
        <section id="section2">
        

<footer>
    stopka
</footer>
<script src="js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

</body>


</html>