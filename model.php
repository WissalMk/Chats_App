<?php
// Créer une nouvelle connexion à la base de données MySQL
$db = new PDO('mysql:host=localhost;dbname=chat_app_db', 'root', '');

// Fonction pour ajouter un message à la base de données
function addMessage($user, $message) {
    global $db;
    
    // Préparer une requête SQL pour insérer un nouveau message dans la table "Conversation"
    $stmt = $db->prepare("INSERT INTO Conversation (user, Message) VALUES (?, ?)");
    
    // Exécuter la requête avec les valeurs fournies (nom d'utilisateur et message)
    $stmt->execute([$user, $message]);

    // Retourner l'identifiant du dernier message inséré
    return $db->lastInsertId();
}

// Fonction pour récupérer tous les messages de la base de données
function getMessages() {
    global $db;

    // Exécuter une requête SQL pour sélectionner tous les messages triés par identifiant de message dans l'ordre décroissant
    $stmt = $db->query("SELECT * FROM Conversation ORDER BY idMessage DESC");

    // Retourner tous les résultats sous forme de tableau associatif
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
