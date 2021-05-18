<?php 
session_start();
?>


<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECS concours - QCM</title>
    <link rel="stylesheet" href="public/css/normalize.css">
    <link rel="stylesheet" href="public/css/styles.css">
</head>



<body>

    <header>
        <h1>Répondez correctement aux questions suivantes</h1>
    </header>

    <main>

    <?php 
        if (isset($_SESSION["error"])) {
            echo $_SESSION["error"];
            unset($_SESSION["error"]);
        }
    ?>

        <form action="questions_traitement.php" method="post">

            <fieldset class="question">
                <legend><span class="numero">Question 1 </span><span class="numero-total">/ 5</span></legend>
                <hr>
                <p>Quel est le nom du fondateur du Consumer Electronics Show ?</p>
                <input type="radio" id="Bill Gates" name="fondateur" value="Bill Gates">
                <label for="Bill Gates">Bill Gates</label> <br>
                <input type="radio" id="Steve Jobs" name="fondateur" value="Steve Jobs">
                <label for="Steve Jobs">Steve Jobs</label> <br>
                <input type="radio" id="Jack Wayman" name="fondateur" value="Jack Wayman">
                <label for="Jack Wayman">Jack Wayman</label>
            </fieldset>

            <fieldset class="question">
                <legend><span class="numero">Question 2 </span><span class="numero-total">/ 5</span></legend>
                <hr>
                <p>En quelle année est lancé le CES pour la première fois ?</p>
                <input type="radio" id="1973" name="lancement" value="1973">
                <label for="1973">1973</label> <br>
                <input type="radio" id="1970" name="lancement" value="1970">
                <label for="1970">1970</label> <br>
                <input type="radio" id="1967" name="lancement" value="1967">
                <label for="1967">1967</label>
            </fieldset>

            <fieldset class="question">
                <legend><span class="numero">Question 3 </span><span class="numero-total">/ 5</span></legend>
                <hr>
                <p>Dans quelle ville s’est déroulé le premier salon ?</p>
                <input type="radio" id="Los Angeles" name="ville" value="Los Angeles">
                <label for="Los Angeles">Los Angeles</label> <br>
                <input type="radio" id="New York" name="ville" value="New York">
                <label for="New York"> New York</label> <br>
                <input type="radio" id="Chicago" name="ville" value="Chicago">
                <label for="Chicago">Chicago</label>
            </fieldset>

            <fieldset class="question">
                <legend><span class="numero">Question 4 </span><span class="numero-total">/ 5</span></legend>
                <hr>
                <p>Quelle technologie fut présentée en avant-première au CES de 1996 ?</p>
                <input type="radio" id="RDS" name="technologie" value="RDS">
                <label for="RDS">RDS</label> <br>
                <input type="radio" id="MP3" name="technologie" value="MP3">
                <label for="MP3">MP3</label> <br>
                <input type="radio" id="DVD" name="technologie" value="DVD">
                <label for="DVD">DVD</label>
            </fieldset>

            <fieldset class="question">
                <legend><span class="numero">Question 5 </span><span class="numero-total">/ 5</span></legend>
                <hr>
                <p>Quel nom connu portent les interventions des présidents d’entreprises au CES ?</p>
                <input type="radio" id="Keynotes" name="nom" value="Keynotes">
                <label for="Keynotes">Keynotes</label> <br>
                <input type="radio" id="Tech Talks" name="nom" value="Tech Talks">
                <label for="Tech Talks">Tech Talks</label> <br>
                <input type="radio" id="Pitchs" name="nom" value="Pitchs">
                <label for="Pitchs">Pitchs</label>
            </fieldset>

            <button type="submit">Valider les réponses</button>
            
        </form>

    </main>

    <footer>
        <?php include 'includes/footer.php'; ?>
    </footer>

</body>

</html>