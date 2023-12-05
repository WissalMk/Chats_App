<?php
// Démarrer la session PHP
session_start();

// Inclure le fichier avec les fonctions liées à la base de données
require_once('model.php');

// Récupérer la liste des messages depuis la base de données
$messages = getMessages();

// Récupérer le nom d'utilisateur actuel à partir de la session, s'il existe
$currentUsername = isset($_SESSION['user']) ? $_SESSION['user'] : '';

// Parcourir chaque message pour l'affichage
foreach ($messages as $message) {
    // Récupérer le nom d'utilisateur du message actuel
    $user = $message['user'];

    // Appliquer une classe spécifique si l'utilisateur du message est le même que l'utilisateur actuel
    $userClass = ($user == $currentUsername) ? 'current-user' : '';
    
    // Générer et stocker une couleur aléatoire pour chaque utilisateur lorsqu'il envoie son premier message
    $colorStyle = 'style="color: ' . getUserColor($user) . ';"';

    // Afficher le message dans une structure HTML
    echo "<div class='message-container'>";
    echo "<span class='user $userClass' $colorStyle>" . htmlspecialchars($user) . ":</span> ";
    echo "<span class='message'>" . htmlspecialchars($message['Message']) . "</span>";
    echo "</div>";
}

// Fonction pour obtenir la couleur de l'utilisateur, générer et stocker une couleur aléatoire si nécessaire
function getUserColor($user) {
    // Vérifier si la couleur de l'utilisateur est déjà stockée en session
    if (!isset($_SESSION['user_colors'][$user])) {
        // Si non, générer une couleur aléatoire et la stocker en session
        $_SESSION['user_colors'][$user] = getRandomColor();
    }

    // Retourner la couleur stockée
    return $_SESSION['user_colors'][$user];
}

// Fonction pour générer une couleur aléatoire
function getRandomColor() {
    $letters = '0123456789ABCDEF';
    $color = '#';
    for ($i = 0; $i < 6; $i++) {
        $color .= $letters[rand(0, 15)];
    }
    return $color;
}
?>
