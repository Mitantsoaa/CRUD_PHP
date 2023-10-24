<?php
declare(strict_types=1);
    include 'connexion.php';

    function getDataById($connexion,$id){
        $sql = "SELECT * FROM personnel WHERE id=".$id;
        $query = mysqli_query($connexion,$sql);
        $result = mysqli_fetch_assoc($query);
        return $result;
    }

    function deleteData($connexion,$id){
        $sql =  "DELETE FROM personnel WHERE id =".$id;
        $query = mysqli_query($connexion,$sql);
        header('Location: /List.php');
    }

    function updateData($connexion, $name,$mail,$phone,$photo,$id){
        $sql = "UPDATE personnel SET img_url = '".$photo['name']."', nom = '$name', email = '$mail', phone = '$phone' WHERE id = '$id'";
        // die($photo['name']);
        mysqli_query($connexion,$sql);
        $file = $photo['tmp_name'];
                    $nomdestination = '/image';
                    move_uploaded_file($file, SITE_ROOT.$nomdestination.'/'.$_FILES['photo']['name']);
        header('Location: /List.php');
    }

    function getAllData($connexion){
        $sql = "SELECT * FROM personnel";
        $result = mysqli_query($connexion,$sql);
        return $result;
    }

    function getPersNumber($connexion){
        $sql = "SELECT COUNT(*) FROM personnel";
        $res = mysqli_query($connexion,$sql);
        return mysqli_fetch_all($res);
    }

    function getAllDataPerPage($connexion){
        $sql = "SELECT * FROM personnel LIMIT 0, 10";
        return mysqli_query($connexion,$sql);
    }

    function isName(String $nom)
    {
        // je sais pas pourquoi celui ci ne marche plus /^[a-zA-ZÀ-ÿ.-]*[a-zA-ZÀ-ÿ][\s\t]+[a-zA-ZÀ-ÿ.-]*$/
        if(strlen($nom) <= 1){
            die('Nom trop court');
        }else if (preg_match("/^[a-zA-ZÀ-ÿ.-]*[a-zA-ZÀ-ÿ][\s\t]*[a-zA-ZÀ-ÿ.-]*$/", $nom)){
            return $nom;
        }else{
            die('Le nom doit être une chaine de caractère');
        }
    }

    function isPhone(?String $phone)
    {
        if(strlen($phone) < 10){
            die('Numero de téléphone trop court');
        }else if (strlen($phone) > 10){
            die('Numero de téléphone trop long');
        }else if(!preg_match('/^(033|032|034|038|\+261)\d{6,}$/', $phone)){
            die('Format de numero invalide');
        }else{
            return $phone;
        }
    }

    function isMail($mail){
        if(!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',$mail)){
            die('Mail invalide');
        }else{
            return $mail;
        }
    }