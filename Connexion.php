<?php
    $connexion = mysqli_connect("localhost",'root','','eval');
    if(!$connexion){
        die('Unable to connect to database');
    }