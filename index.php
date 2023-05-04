
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form di registrazione</title>
    <style type="text/css">
    body{
        background: rgb(85,85,85); 
        display: flex;
        margin: auto;
        justify-content: center;
        padding-top: 20px
        }
     .background {   
        background: white;
        padding: 1% 6%;
        border: 2px solid black;
        border-radius: 10px;
    }
    h1{
        border-bottom: 2px solid black;
    }
    .richiesta{
        padding-bottom: 10px;
        font-size: 1.2rem;
    }
    #backgroundInput{
        background: rgb(85,85,85);
        height: 30px;
        width: 190px;
        border-radius: 10px;
    }
    #invio{
        height: 30px;
        width: 60px;
        border-radius: 10px;
    }
    #formato{
        color: grey;
        font-size: 0.9rem;
    }
    </style>
</head>
<body>
    <div class="background">

        <h1>Form di registrazione</h1>

        <form method="post" action="">
            <div class="richiesta">
                <label >Inserisci la tua mail:</label>
            </div>
            <div class="richiesta">
                <input id="backgroundInput" type="email" name="email" required>
                <input id="invio" type="submit" value="Invia">
            </div>
            <div id="formato">formato mail: mar@example.com</div>
        </form>
    </div>

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
                
            }else{
                echo "<p style='color:red'>L'email inserita non è valida.</p>";
            }
        }

        //chiusura db
        $db = null;

    ?>
</body>
</html>

<!-- 
    MIGLIORAMENTI / OTTIMIZZAZIONI

    cambierei il colore della mail inserita in bianco in modo che sia più leggibile;
    ho inserito il pulsante invia perchè credo sia più pratico rispetto all'invio automatico dopo un certo numero di secondi (es. devo controllare che la mail che ho scritto sia giusta e prima che l'ho trovata è già stata inviata quella sbagliata).

-->