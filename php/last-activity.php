<?php

if (isset($_SESSION['session_id'])) {
    
include_once 'connect.php';

    $lastActivity = $pdo->prepare("UPDATE sessions SET last_activity = :last_activity WHERE session_id = :session_id");
    $lastActivity->bindValue(':last_activity', time());
    $lastActivity->bindValue(':session_id', $_SESSION['session_id']);
    $lastActivity->execute();
}

?>