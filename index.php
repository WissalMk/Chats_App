<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="chat-window">
        <div id="message-title"><b><center>Chat App</center></b></div>

        <div id="message-container"></div>
        <form id="message-form" method="POST" action="controller.php">
            <input type="text" id="user" placeholder="Your Name" required>
            <input type="text" id="message" placeholder="Type your message..." required>
            <button type="submit">Send</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
