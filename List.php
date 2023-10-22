<?php
include 'Connexion.php';
include 'functions.php';
include 'header.php';
$result = getAllData($connexion);

?>
<div class="container">
<table class="table">
    <tr>
        <th></th>
        <th>Nom</th>
        <th>Email</th>
        <th>Phone</th>
        <th></th>
    </tr>
    <?php
    while($ligne = mysqli_fetch_assoc($result)){
    ?>
    <tr>
     <td><img src="image/<?php echo $ligne['img_url'] ;?>"/></td>
     <td><?php echo $ligne['nom'] ;?></td>
     <td><?php echo $ligne['email'] ;?></td>
     <td><?php echo $ligne['phone'] ;?></td>
     <td><a href="http://localhost/DTC/Eval/eval-php-bdd-Mitantsoaa/Details.php?id=<?php echo $ligne['id'];?>">Voir</a></td>
     <td><a href="http://localhost/DTC/Eval/eval-php-bdd-Mitantsoaa/update.php?id=<?php echo $ligne['id'];?>">Update</a></td>
     <td><a href="http://localhost/DTC/Eval/eval-php-bdd-Mitantsoaa/delete.php?id=<?php echo $ligne['id'];?>">Delete</a></td>
    </tr>
    <?php
}
if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
}else{
    $currentPage = 1;
}

$parPage = 10;
$page = getPersNumber($connexion);

$pages = ceil($page[0] / $parPage);
?>
</table>
    </div>
