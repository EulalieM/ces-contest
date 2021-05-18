<?php

session_start() ;

include('includes/functions.php');

include('includes/bdd.php');

$nom = $_POST['nom'];
$prenom = $_POST['prénom'];
$email = $_POST['email'];
$tel = $_POST['tel'];

$question1 = $_SESSION['fondateur'];
$question2 = $_SESSION['lancement'];
$question3 = $_SESSION['ville'];
$question4 = $_SESSION['technologie'];
$question5 = $_SESSION['nom'];
 
if (isset($nom, $prenom, $email, $tel)) {
    if (!empty($nom) && !empty($prenom) && !empty($email) && !empty($tel)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if (filter_var($tel, FILTER_SANITIZE_NUMBER_INT)) {
                if (verif_participation_email($bdd, $email) && verif_participation_tel($bdd, $tel)) {
                    $participant_id = save_coordonnees($bdd, $nom, $prenom, $email, $tel);
                    if($participant_id > 0) {
                       $success = save_questions($bdd, $participant_id, $question1, $question2, $question3, $question4, $question5);
                       if($success) {
                        header('Location: confirmation.php');
                        exit();  
                       }
                    } 
                } else {
                    error('Vous ne pouvez participer qu\'une fois à ce concours !');
                }
            } else {
                error('Merci de bien vouloir entrer un numéro de téléphone valide');
            } 
        } else {
            error('Merci de bien vouloir entrer une adresse e-mail valide');
        }
    } else {
        error('Merci de bien vouloir compléter tous les champs');
    }
} else 
{
    error('Merci de bien vouloir compléter tous les champs');
}

header('Location: contact.php');

function save_coordonnees($bdd, $nom, $prenom, $email, $tel) : int {
    $query = $bdd->prepare('INSERT INTO participants(nom, prenom, email, tel) VALUES (?, ?, ?, ?)');
    $query->bindParam(1, $nom, PDO::PARAM_STR);
    $query->bindParam(2, $prenom, PDO::PARAM_STR);
    $query->bindParam(3, $email, PDO::PARAM_STR);
    $query->bindParam(4, $tel, PDO::PARAM_STR); 
    $query->execute() ;
    return $bdd->lastInsertId();   
}

function save_questions($bdd, $participant_id, $question1, $question2, $question3, $question4, $question5) : bool {
    $query = $bdd->prepare('INSERT INTO reponses(question, reponse, participant_id) VALUES (?, ?, ?), (?, ?, ?), (?, ?, ?), (?, ?, ?), (?, ?, ?)');
    $data = array(
            1, $question1, $participant_id,
            2, $question2, $participant_id,
            3, $question3, $participant_id,
            4, $question4, $participant_id,
            5, $question5, $participant_id,
    ) ;
    return $query->execute($data);    
}

function verif_participation_email($bdd, $email) : bool {
    $query = $bdd->prepare('SELECT email FROM participants WHERE email = ?');
    $query->bindParam(1, $email, PDO::PARAM_STR);
    $query->execute();
    $row = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return count($row) == 0;
}

function verif_participation_tel($bdd, $tel) : bool {
    $query = $bdd->prepare('SELECT email FROM participants WHERE tel = ?');
    $query->bindParam(1, $tel, PDO::PARAM_STR);
    $query->execute();
    $row = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return count($row) == 0;
}