<?php
@include 'config.php';
session_start();
// pobierz historię czatu dla wybranego użytkownika
if(isset($_GET['recipient_id'])){
    $recipient_id = $_GET['recipient_id'];
    $sql = "SELECT * FROM `chat_messages` WHERE (`sender_id` = '".$_SESSION['user_name']."' AND `recipient_id` = '".$recipient_id."') OR (`sender_id` = '".$recipient_id."' AND `recipient_id` = '".$_SESSION['user_name']."') ORDER BY `timestamp` ASC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<p><strong>" . $row['sender_id'] . ":</strong> " . $row['message'] . "</p>";
        }
    } else {
        echo "<p>Brak historii czatu.</p>";
    }
}
?>
