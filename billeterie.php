<?php
    session_start();
    include("connexion.php");

    // Le formulaire a-t-il été validé ?
    if (isset($_POST['valider'])) {
        $sql = "SELECT * FROM billeterie";
        $query = $pdo->prepare($sql);
        $query->execute();
        $places = $query->fetch();
        
        // Y a-t-il encore des places dispos ?
        if (isset($places['places']) && ($places['places'] > 0)) {
            
            // C'est bon, on envoie le infos par mail !
            $to = "rockbendfestival@gmail.com";
            $objet = "RESERVATION : ".$_POST['nom']." ".$_POST['prenom'];
            $message = "Nouvelle réservation !\r\n
            Réservation au nom de : ".$_POST['nom']." ".$_POST['prenom']."\n
            Adresse mail : ".$_POST['mail'];
            $headers = "From: ".$_POST['nom']." ".$_POST['prenom']." \r\n\r\n";
            if (mail($to, $objet, $message, $headers)) {
                $_SESSION['erreur'] = "<span style='color:green;'>'Votre place a bien été réservée !</span>";
                $sql = "UPDATE billeterie SET places=?";
                $query = $pdo->prepare($sql);
                $query->execute(array($places['places']-1));
            } else {
                 $_SESSION['erreur'] = "Erreur lors de la réservation. Veuillez réessayez plus tard.";
            }
            
        } elseif ($places['places'] <= 0) {
            $_SESSION['erreur'] = "Plus de places disponibles.";
        }
    }

    header("Location:home.php#billeterie");

?>