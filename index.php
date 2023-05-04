
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="">
        <label for="">Email:</label>
        <input type="email" name="email" required>
        <input type="submit" value="Invia">
    </form>
</body>
</html>

<?php

//Connessione al db sqLite3
$db = new PDO('sqlite:db.sqlite3');

//Creazione della tabella "emails" se non esiste già
$db->exec('CREATE TABLE IF NOT EXISTS Emails (id_email INTEGER PRIMARY KEY NOT NULL, email TEXT NOT NULL'):

?>
