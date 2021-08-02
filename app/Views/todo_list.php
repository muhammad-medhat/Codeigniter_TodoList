<?= $this->extend('layouts/main.php')?>

<?= $this->section('body-content')?>


<div class="container">
    <ul class="list-group">
        <?php //var_dump($todos)?>
        <?php foreach($todos as $t){ ?>
            <li class="list-group-item">
                
            <div>
                
                <input type="checkbox" <?= ($t->done == 0)? '': 'checked' ?> />
                <span><?= $t->id?></span>
                <span><?= $t->name?></span>
                <span><?= $t->description?></span>
                                
            </div>    

            </li>
        <?php } ?>
    </ul>
</div>



<?= $this->endSection()?>