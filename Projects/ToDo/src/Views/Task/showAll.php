<?php require_once 'Partials/header.php';?>
<div class="container">
    <div class="row">
        <div class="col-xs-12 text-center">
            <h1>Liste des tâches de l'utilisateur</h1>
    <?php require_once 'Partials/menu_task.php' ?>
            <?php \toDo\Services\ToolBox::getFlash();?>
                <table id="todolist" class="col-xs-12 table-condensed table-responsive table-striped table-bordered text-center">
                <thead>
                <tr>
                <th class="col-lg-2">Titre</th>
                <th class="col-lg-3">Resume</th>
                <th class="col-lg-3">Content</th>
                <th class="col-lg-1">Date création</th>
                <th class="col-lg-1">Statut</th>
                <th class="col-lg-2">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($tasks as $task  ) :?>
                <tr>
                    <td><?= $task->getTitre() ?></td>
                    <td><?= $task->getResume() ?></td>
                    <td><?= $task->getContent() ?></td>
                    <td><?= $task->getCreatedAt(true) ?></td>
<!--                    La propriété de l'objet task est le reflet de la table (attention au majuscule des tables sur MYSQL-->
                    <td><?= $task->libelle ?></td>
                    <td>
                        <div class="btn btn-sm btn-warning"><a href="?action=Task/manageTask&modificationId=<?= $task->getIdTask() ?>">Modifier</a></div>
                        <div class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><a href="?action=Task/deleteTask&suppressionId=<?= $task->getIdTask() ?>">Supprimer</a></div>
                    </td>
                </tr>
                <?php endforeach;  ?>
                </tbody>

                </table>

        </div>
    </div>
</div>
<?php require_once 'Partials/footer.php';?>
