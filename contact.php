<?php 
session_start();
?>

<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECS concours - Coordonnées</title>
    <link rel="stylesheet" href="public/css/normalize.css">
    <link rel="stylesheet" href="public/css/styles.css">
</head>

<body>

    <header>
        <h1>Vos réponses ont bien été prises en compte</h1>
    </header>

    <main>

    <p class="section">Afin d’enregistrer votre participation, merci de remplir tous les champs du formulaire de contact ci-dessous.</p>

    <?php 
        if (isset($_SESSION["error"])) {
            echo $_SESSION["error"];
            unset($_SESSION["error"]);
        }
    ?>
        
        <form action="traitement.php" method="post">
            <div class="l-form">
                <label for="nom">Nom :</label> <br>
                <input type="text" name="nom" id="nom" required>
            </div>
            <div class="l-form">
                <label for="prénom">Prénom :</label><br>
                <input type="text" name="prénom" id="prénom" required>
            </div>
            <div class="l-form">
                <label for="email">Adresse e-mail :</label><br>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="l-form">
                <label for="tel">N° de téléphone :</label><br>
                <input type="tel" name="tel" id="tel" required>
            </div>
            <button type="submit">Envoyer</button>
        </form>

    </main>

    <footer> 
        <?php include 'includes/footer.php'; ?> 
    </footer>

</body>

</html>