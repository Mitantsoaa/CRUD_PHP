<?php
include 'Connexion.php';
include 'functions.php';
include 'header.php';
$result = getAllData($connexion);
if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
}else{
    $currentPage = 1;
}

$parPage = 10;
$page = getPersNumber($connexion);
$p = (int)$page[0];
$pages = ceil($p / $parPage);
$premier = ($currentPage * $parPage) - $parPage;
$perpage = mysqli_query($connexion, "SELECT * FROM personnel LIMIT ".$premier.",".$parPage);
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
    while($ligne = mysqli_fetch_assoc($perpage)){
    ?>
    <tr>
     <td><img src="image/<?php echo $ligne['img_url'] ;?>"/></td>
     <td><?php echo $ligne['nom'] ;?></td>
     <td><?php echo $ligne['email'] ;?></td>
     <td><?php echo $ligne['phone'] ;?></td>
     <td><a href="/Details.php?id=<?php echo $ligne['id'];?>">Voir</a></td>
     <td><a href="/update.php?id=<?php echo $ligne['id'];?>">Update</a></td>
     <td><a href="/delete.php?id=<?php echo $ligne['id'];?>">Delete</a></td>
    </tr>
    <?php
}

?>
</table>
<?php 
 for($pages = 1; $pages<= $p; $pages++) {  

        echo '<a href = "list.php?page=' . $pages . '">' . $pages . ' </a>';  

    }  ?>
<nav>
    <ul class="pagination">
        <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
            <a href="list.php/?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
        </li>
        <?php for($page = 1; $page <= $pages; $page++): ?>
            <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
            <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                <a href="list.php/?page=<?= $page ?>" class="page-link"><?= $page ?></a>
            </li>
        <?php endfor ?>
            <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
            <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
            <a href="list.php/?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
        </li>
    </ul>
</nav>
    </div>
