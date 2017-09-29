<?php require_once 'Partials/header.php';?>
<div class="container">
    <div class="row">
        <div class="col-xs-12 text-center">
            <h1><?= $action ?> une tâche</h1>
        </div>
<!--            --><?php //require_once 'Partials/menu_task.php' ?>
        <?php \toDo\Services\ToolBox::getFlash();?>
        <div class="col-xs-9 col-xs-offset-2">
            <form action="" method="POST">
                <?= $form->input('titre','Titre de votre tâche',['type'=>'text','css'=>'form-control','require'=>true]); ?>
                <?= $form->input('resume','Résumé de votre tâche',['type'=>'text','css'=>'form-control','require'=>true]); ?>
                <?= $form->input('content','Contenu de votre tâche',['type'=>'textarea','css'=>'form-control','require'=>true]); ?>
                <?= $form->select('FkIdStatut','Statut de votre tâche',$statuts,['css'=>'form-control','require'=>true]); ?>
                <?= $form->submit(['value'=>'Valider','css'=>'btn btn-primary pull-right']); ?>

            </form>

        </div>
    </div>
</div>
<?php require_once 'Partials/footer.php';?>