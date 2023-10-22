<?php
include 'Connexion.php';
include 'functions.php';
include 'header.php';
$res = getDataById($connexion,$_GET['id']);
?>
<form action="" method="POST" enctype="multipart/form-data">
    <label for="nom">Nom:</label>
    <input type="text" class="form-control" name="nom" placeholder="Entrez votre nom" value="<?php if(isset($res['nom'])){echo $res['nom']; }?>">
    <label for="mail">Email:</label>
    <input type="mail" class="form-control" name="mail" placeholder="Entrez votre email" value="<?php if(isset($res['email'])){echo $res['email']; }?>">
    <label for="phone">Téléphone:</label>
    <input type="text" class="form-control" name="phone" placeholder="Entrez votre téléphone" value="<?php if(isset($res['phone'])){echo $res['phone']; }?>">
    <label for="photo">Photo:</label>
    <input type="file" class="form-control" name="photo" placeholder="Entrez votre adresse" value="<?php if(isset($res['img_url'])){echo $res['img_url']; }?>">
    <input type="submit" name="send" value="Update">
</form>
<?php
    if(isset($_POST) && isset($_POST['send'])){
        $name = isName($_POST['nom']);
        $mail = isMail($_POST['mail']);
        $phone = isPhone($_POST['phone']);
        $photo = $_FILES['photo'];
        updateData($connexion,$name,$mail,$phone,$photo,$_GET['id']);
    }