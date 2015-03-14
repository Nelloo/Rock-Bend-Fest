<!DOCTYPE html>
<?php session_start(); include("connexion.php"); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accueil | Rock Bend Festival Édition 2015</title>
    
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="css/style-home.css">
    <link rel="icon" href="img/logo.png">
</head>

<body>
    
    <header>
        <a href="home.php"><img src="img/logo_big.png" title="Rock Bend Festival 2015" alt=""></a>
    </header>
    
    <nav>
        <ul>
            <li><span class="home-but" onclick="$('header').animatescroll({scrollSpeed:800});"><img src="img/home.png" alt=""></span></li>
            <li><span class="text-but" onclick="$('#groups').animatescroll({scrollSpeed:1000});">&nbsp;Programme&nbsp;</span></li>
            <li><span class="text-but" onclick="$('#billeterie').animatescroll({scrollSpeed:1000});">Billeterie</span></li>
            <li><span class="text-but" onclick="$('#partenaires').animatescroll({scrollSpeed:1000, padding:200});">Partenaires</span></li>
            <li><span class="text-but" onclick="$('#contact').animatescroll({scrollSpeed:1000});">Contact</span></li>
        </ul>
    </nav>
    
    <div id="billeterie_form" style='display:none;'>        
        <p id="back">Retour au site</p>
        <form action="billeterie.php" method="post">
            <legend>Réservation de billet</legend>
            <table>
                <?php if (isset($_SESSION['erreur'])) {
                    echo "<tr>";
                    echo "<td colspan='2' class='error_msg'>".$_SESSION['erreur']."</td>";
                    echo "</tr>";
                    unset($_SESSION["erreur"]);
                } ?>
                <tr>
                    <td><label for="nom">Votre nom : &nbsp;</label></td>
                    <td><input required id="nom" placeholder="Nom de famille" name="nom" type="text"></td>
                </tr>
                <tr>
                    <td><label for="prenom">Votre prénom : &nbsp;</label></td>
                    <td><input required id="prenom" placeholder="Prénom" name="prenom" type="text"></td>
                </tr>
                <tr>
                    <td><label for="mail">Votre mail : &nbsp;</label></td>
                    <td><input required id="mail" placeholder="Adresse mail" name="mail" type="email"></td>
                </tr>
                <tr>
                    <td colspan="2"><center><input type="submit" name="valider" value="Réserver"></center></td>
                </tr>
            </table>
        </form>
    </div>
    
    <div id="content" class='container-fluid'>
        <div class="row" id="res-sociaux">
            <h1>Dernières actus</h1>
            <div class="col-md-2"></div>
            <div class="col-md-4" id="facebook">
                <iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2F422938247829633&width=600&colorscheme=light&show_faces=true&border_color&stream=true&header=true&height=435" scrolling="yes" frameborder="0" style="height:100%; background: #f1f1f1; " allowtransparency="true"></iframe>
            </div>
            <div class="col-md-4" id="twitter">
                <a class="twitter-timeline" href="https://twitter.com/RockBendFest" data-widget-id="570180156849782784">Tweets de @RockBendFest</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            </div>
            <div class="col-md-2"></div>
        </div>
        
        <div class="row" id="groups">
            <h1>Programmation</h1>
            <div class="col-md-4 gp">
                <a href="https://www.facebook.com/takeasipcoverband/timeline" target="_blank"><img src="img/logo_take-a-sip.png" alt="Take A Sip" title="Take A Sip" /></a>
                <h2>Take A Sip</h2>
                <div class="gp-infos">
                    <h3>Membres</h3>
                    <table>
                        <tr><td>Richard Noisyass</td><td>Chanteur / Guitariste</td></tr>
                        <tr><td>David Nonoises</td><td>Bassiste</td></tr>
                        <tr><td>Hedi Ben</td><td>Guitariste</td></tr>
                        <tr><td>Nico</td><td>Batteur</td></tr>
                    </table>
                </div>
            </div>
            <div class="col-md-4 gp">
                <a href="https://www.facebook.com/pages/Miss-Jacqueline/123150964407272?sk=timeline" target="_blank"><img src="img/logo_miss-jacqueline.png" alt="Miss Jacqueline" title="Miss Jacqueline" /></a>
                <h2>Miss Jacqueline</h2>
                <div class="gp-infos">
                    <h3>Membres</h3>
                    <table>
                        <tr><td>Jacko</td><td>Chanteur / Guitariste</td></tr>
                        <tr><td>Arno</td><td>Guitariste</td></tr>
                        <tr><td>Math</td><td>Bassiste</td></tr>
                        <tr><td>Ju</td><td>Batteur</td></tr>
                    </table>
                </div>
            </div>
            <div class="col-md-4 gp">
                <a href="http://swadershc.bandcamp.com/" target="_blank"><img src="img/logo_swaders.png" alt="Swaders" title="The Swaders" /></a>
                <h2>The Swaders</h2>
                <div class="gp-infos">
                    <h3>Membres</h3>
                    <table>
                        <tr><td>Damien</td><td>Chanteur</td></tr>
                        <tr><td>Quentin</td><td>Guitariste</td></tr>
                        <tr><td>Pierre</td><td>Bassiste</td></tr>
                        <tr><td>Sebastien</td><td>Batteur</td></tr>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="row" id="billeterie">
            <h1>Billeterie</h1>
            <?php
                $sql = "SELECT * FROM billeterie";
                $query = $pdo->prepare($sql);
                $query->execute();
                $places = $query->fetch();
            ?>
            <h2>Il reste <span style='color:#e30613; font-weight:bold;'><?php echo $places['places']; ?></span> places. Réservez la vôtre ci-dessous !</h2>
            <div id="reserver"><p id="btn_billet">Je réserve ma place !</p></div>
        </div>
                
        <div class="row" id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d40793.897845920765!2d2.794812936181639!3d50.280379373465536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xb6f6dacd70e7005d!2sMaison+des+%C3%89tudiants!5e0!3m2!1sfr!2sfr!4v1424788912874" frameborder="0" style="border:0"></iframe>
            <div class="overlay">
                <h1>Comment se rendre au Rock Bend ?</h1>
                <a class="lien-map" href="https://www.google.fr/maps/place/Maison+des+%C3%89tudiants/@50.2803794,2.7948129,13z/data=!4m5!1m2!2m1!1smaison+des+%C3%A9tudiants+arras!3m1!1s0x0000000000000000:0xb6f6dacd70e7005d" target="_blank">Voir sur Google Maps</a>
            </div>
        </div>
        
        <div class="row" id="partenaires">
            <a href="http://www.univ-artois.fr/" target="_blank"><img class="partner" src="img/logo-univ-artois.png" alt="Université d'Artois"></a>
            <a href="http://www.iut-lens.univ-artois.fr/" target="_blank"><img class="partner" src="img/logo-iut-lens.png" alt="IUT de Lens"></a>
            <a href="http://www.crous-lille.fr/" target="_blank"><img class="partner" src="img/logo-crous-lille.jpg" alt="CROUS de Lille"></a>
            <a href="https://www.facebook.com/bde.srclens?fref=ts" target="_blank"><img class="partner" src="img/logo-bde.png" alt="BDE MMI"></a>
        </div>
        
        <div class="row" id="contact">
            <h1>Contactez-nous</h1>
            <?php
                if(isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }
            ?>
            <div class="col-md-3"></div>
            <div class="col-md-4">
                <form action="mail.php" method="post">
                    <input name="nom" type="text" placeholder="Votre nom" id="nom" required>
                    <br/><input name="mail" type="mail" placeholder="Votre adresse mail" id="mail" required>
                    <br/><textarea required name="message" placeholder="Votre message..." id="message" cols="30" rows="10"></textarea>
                    <br/><input type="submit" name="send" id="send" value="Envoyer">
                </form>
            </div>
            <div class="col-md-3">
                <p class="coordonnees">
                    <span class="subtitle">Par mail :</span>
                    <span class="mail-rbf"><a href="mailto:rockbendcontact@gmail.com">rockbendcontact@gmail.com</a></span>
                    <span class="subtitle">Par téléphone :</span>
                    <span class="jude">Louisa Wable (Présidente du RBF)<br/>06.61.73.11.38</span>
                    <span class="subtitle">Par courrier :</span>
                    <span class="adresse">Rock Bend Festival
                    <br/>Bureau des Étudiants, département MMI
                    <br/>Rue de l'Université
                    <br/>62300 LENS</span>
                </p>
            </div>
            <div class="col-md-2"></div>
        </div>
        
    </div>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="script/script.js"></script>
    <script src="animatescroll/animatescroll.js" type="text/javascript"></script>
</body>

</html>