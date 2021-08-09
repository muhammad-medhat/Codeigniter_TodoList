<nav>
    <ul class="nav">
        <li class="nav-item"><a class="nav-link" href=<?= base_url('todos') ?> >Show toddos</a></li>
        <li class="nav-item"><a class="nav-link" href=<?= base_url('todos/insert') ?> >Add</a></li>
    </ul>
</nav>

<?php if(isset($alert) and $alert != '') { ?>
    <div class="alert <?= $alert->class?>" role="alert">
        <?= $alert->message?>
    </div>
<?php } ?>

