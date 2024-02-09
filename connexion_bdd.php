<?php 
    $con = mysqli_connect("localhost","root","","ChatRoom");
    $req= mysqli_query($con , "SET NAMES UTF8");
    if(!$con){
        echo "Connexion échouée";
    }
