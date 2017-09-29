<hr>
<ul class="nav nav-pills">
    <li role="presentation" class="active"><a href="?action=Task/manageTask">Ajouter une tâche</a></li>
    <li role="presentation"><a href="?action=Task/showAll">Toutes les tâches</a></li>

    <?php
//    var_dump($statuts);
//    die();
    foreach ($statuts as $statut):?>
    <li role="presentation"><a href="index.php?action=Task/showAll&modificationId=<?= $statut->getIdStatut() ?>">Voir les <?= $statut->getLibelle() ?></a></li>
    <?php endforeach;?>
</ul>
<hr>