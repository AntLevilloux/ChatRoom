<?php
session_start();

// si l'utilisateur s'est connecté
if (isset($_SESSION['user'])) {
    //connexion à la base de données
    include "connexion_bdd.php";
    //requete pour afficher les messages
    $req = mysqli_query($con, "SELECT * FROM messages ORDER BY id_m DESC");

    if (mysqli_num_rows($req) == 0) {
        // s'il n'y a pas encore de message
        echo "Messagerie vide";

    } else {
        //si oui

        while ($row = mysqli_fetch_assoc($req)) {

            // les styles
            $row['msg'] = str_replace(array('%', '@', ';', '<', '>'), ' ', $row['msg']);
            $row = preg_replace('#[gras](.+)[/gras]#', '<strong>$1</strong>', $row);
            $row = preg_replace('#[italic](.+)[/italic]#', '<span style="font-style : italic">$1</span>', $row);
            if (preg_match('#https?://[^\s]+.(jpeg?|jpg?|png)#', $row['msg'])) {

                $max_width = 200; // Largeur maximale de l'image en pourcentage
                $max_height = 150; // Hauteur maximale de l'image en pourcentage

                $row = preg_replace('#https?://[^\s]+.(jpeg?|jpg?|png)#', '<img src="$0" alt="Image" width="' . $max_width . '" height="' . $max_height . '" />', $row);
            } else {
                $row = preg_replace('#(https?://[^\s]+)#', '<a href="$1" target="_blank">$1</a>', $row);
            }
            //Les couleurs
            $row = preg_replace('#[noir](.+)[/noir]#', '<span style="color : black">$1</span>', $row);
            $row = preg_replace('#[blanc](.+)[/blanc]#', '<span style="color :white">$1</span>', $row);
            $row = preg_replace('#[vert](.+)[/vert]#', '<span style="color :green">$1</span>', $row);
            $row = preg_replace('#[rouge](.+)[/rouge]#', '<span style="color :red">$1</span>', $row);
            $row = preg_replace('#[bleu](.+)[/bleu]#', '<span style="color :blue">$1</span>', $row);

            //si c'est vous qui avvez envoyé le mesage on utilise ce format :
            if ($row['email'] == $_SESSION['user']) {

                ?>
                <div class="message your_message">
                    <span>Vous</span>
                    <p>
                        <?= htmlspecialchars_decode($row['msg']) ?>
                    </p>
                    <p class="date">
                        <?= $row['date'] ?>
                    </p>
                </div>
                <?php

            } else {

                ?>
                <div class="message others_message">
                    <span>
                        <?= $row['email'] ?>
                    </span>
                    <p>
                    <?= htmlspecialchars_decode($row['msg']) ?>
                    </p>
                    <p class="date">
                        <?= $row['date'] ?>
                    </p>
                </div>
                <?php
            }
        }
    }
}

?>