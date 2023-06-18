<?php
@include 'config.php';

session_start();

// pobierz dane z formularza
$recipient_id = $_POST['recipient_id'];
$message = $_POST['message'];
$sender = $_SESSION['user_name'];

// zapisz wiadomość czatu w bazie danych
$sql = "INSERT INTO chat_messages (sender_id, recipient_id, message) VALUES ('$sender', '$recipient_id', '$message')";
if ($conn->query($sql) === TRUE) {
    // jeśli udało się zapisać wiadomość, przekieruj użytkownika na stronę z czatem
    header("Location: user_page.php");
    echo true;
} else {
    // jeśli nie udało się zapisać wiadomości, wyświetl błąd
    echo "Błąd: " . $sql . "<br>" . $conn->error;
}

?>
