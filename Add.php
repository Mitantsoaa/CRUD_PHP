<?php
include 'Connexion.php';
include 'header.php';
include 'functions.php';
?>
<form action="./Add.php" method="POST"  enctype="multipart/form-data">
    <label class="" for="nom">Nom:</label>
    <input class="form-control" type="text" name="nom" placeholder="Entrez votre nom">
    <label for="email">Email:</label>
    <input class="form-control" type="mail" name="email" placeholder="Entrez votre email">
    <label for="phone">Phone:</label>
    <input class="form-control" type="text" name="phone" placeholder="Entrez votre téléphone">
    <label for="photo">Photo:</label>
    <input class="form-control" type="file" name="photo" placeholder="Entrez votre photo">
    <input type="submit" name="save" value="Enregistrer">
</form>
<?php 

if($_POST){
    $nom = isName($_POST['nom']);
    $mail = isMail($_POST['email']);
    $phone = isPhone($_POST['phone']);
    $photo = $_FILES['photo'];

    if(isset($_POST['save'])){
        $sql = sprintf('INSERT INTO personnel (img_url, nom, email, phone) VALUES ("%s", "%s", "%s", "%s")',$photo['name'], $nom, $mail, $phone);
        mysqli_query($connexion,$sql);
                    $file = $_FILES['photo']['tmp_name'];
                    $nomdestination = '/image';
                    move_uploaded_file($file, SITE_ROOT.$nomdestination.'/'.$_FILES['photo']['name']);
        header('Location: /List.php');
    }
}
