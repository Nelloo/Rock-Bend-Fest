<?php
    session_start();

    $nom = $_POST['nom'];
    $mail = $_POST['mail'];

    $message = $_POST['message']."\r\n$nom\n$mail";

    $to = 'rockbendcontact@gmail.com';
    $objet = "Nouveau message de ".$nom." sur le site";

    $headers = "From: $nom \r\n\r\n";

    if (mail($to, $objet, $message, $headers)) {
        $_SESSION['message'] = "<p class='success_msg'>Votre message a bien été envoyé !</p>";
    } else {
         $_SESSION['message'] = "<p class='success_msg'>Erreur lors de l'envoi de votre message.</p>";
    }
    header("Location:home.php#contact");
?>