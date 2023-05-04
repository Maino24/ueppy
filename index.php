
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


    <?php

        //Connessione al db sqLite3
        $db = new PDO('sqlite:db.sqlite3');

        //verifica di invio

        if($_SERVER["REQUEST_METHOD"]== "POST"){
            $email = $_POST["email"];

            //verifica validità mail
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){

                //inserimento email in db
                $stmt = $db->prepare('INSERT INTO Emails (email) VALUES (?)');
                $stmt->execute([$email]);
                
            }
        }

    ?>
</body>
</html>


