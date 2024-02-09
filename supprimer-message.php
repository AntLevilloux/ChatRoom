<?php

    session_start();
    include "connexion_bdd.php";

    // Vérifiez si l'utilisateur actuel est un administrateur
    $req = mysqli_query($con, "SELECT admin FROM utilisateurs WHERE email = '" . $_SESSION['user'] . "'");
    $admin = mysqli_fetch_assoc($req)['admin'];

    // Vérifiez si un ID de message a été fourni en tant que paramètre GET
    if (isset($_GET['id']) && $admin) {
        $id = intval($_GET['id']);
        mysqli_query($con, "DELETE FROM messages WHERE id_m = $id");
    }

    header("Location:chat.php");

?>