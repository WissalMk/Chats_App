<?php
// Démarrer la session PHP
session_start();

// Inclure le fichier avec les fonctions liées à la base de données
require_once('model.php');

// Vérifier si la requête est une requête POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer le nom d'utilisateur et le message depuis les données POST
    $user = $_POST['user'];
    $message = $_POST['message'];
    
    // Ajouter le message à la base de données et récupérer son identifiant
    $messageId = addMessage($user, $message);

    // Ajouter le nom d'utilisateur à la session PHP
    $_SESSION['user'] = $user;

    // Stocker l'identifiant du message dans la session PHP (utilisation potentielle future)
    $_SESSION['messageId'] = $messageId;
}
?>
