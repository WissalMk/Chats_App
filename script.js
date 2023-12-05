$(document).ready(function() {
    // Fonction pour récupérer et afficher les messages depuis le serveur
    function getMessages() {
        // Effectuer une requête GET vers le script PHP qui récupère les messages
        $.get('getMessages.php', function(data) {
            // Mettre à jour le contenu de l'élément HTML avec l'id 'message-container'
            $('#message-container').html(data);
        });
    }

    // Soumettre le formulaire de message lorsqu'il est envoyé
    $('#message-form').submit(function(e) {
        e.preventDefault(); // Empêcher le comportement par défaut du formulaire

        // Récupérer les valeurs des champs utilisateur et message
        var user = $('#user').val();
        var message = $('#message').val();

        // Effectuer une requête POST vers le script PHP qui ajoute un message
        $.post('controller.php', { user: user, message: message }, function(data) {
            // Traiter la réponse si nécessaire
            getMessages(); // Mettre à jour les messages après l'ajout d'un nouveau message
        });
    });

    // Fonction pour générer une couleur HTML aléatoire
    function getRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    // Actualiser les messages toutes les secondes en appelant la fonction getMessages
    setInterval(getMessages, 1000);

    // Appeler getMessages lors du chargement initial de la page
    getMessages();
});
