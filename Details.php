<?php
include 'Connexion.php';
include 'functions.php';
include 'header.php';
$res = getDataById($connexion,$_GET['id']);
?>
<table class="table">
    <tr>
        <th>Photo</th>
        <th>Nom</th>
        <th>Mail</th>
        <th>Phone</th>
    </tr>
    <tr>
        <td><img src="image/<?php if(isset($res['img_url'])){echo $res['img_url']; }?>"/></td>
        <td><?php if(isset($res['nom'])){echo $res['nom']; }?></td>
        <td><?php if(isset($res['email'])){echo $res['email']; }?></td>
        <td><?php if(isset($res['phone'])){echo $res['phone']; }?></td>
    </tr>
</table>