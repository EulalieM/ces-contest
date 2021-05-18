<?php

include('includes/functions.php') ;

session_start() ;

$question1 = $_POST['fondateur'];
$question2 = $_POST['lancement'];
$question3 = $_POST['ville'];
$question4 = $_POST['technologie'];
$question5 = $_POST['nom'];

if (isset($question1, $question2, $question3, $question4, $question5)) {
    if (!empty($question1) && !empty($question2) && !empty($question3) && !empty($question4) && !empty($question5)) {
        $_SESSION["fondateur"] = $question1 ;
        $_SESSION["lancement"] = $question2 ;
        $_SESSION["ville"] = $question3 ;
        $_SESSION["technologie"] = $question4 ;
        $_SESSION["nom"] = $question5 ;
        header ('Location: contact.php') ;
    } else {
        error('Merci de répondre à toutes les questions.') ;
        header ('Location: questions.php') ;
    }
} else {
    error('Merci de répondre à toutes les questions.') ;
    header ('Location: questions.php') ;
}
