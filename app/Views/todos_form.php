<?= $this->extend('layouts/main.php')?>

<?= $this->section('body-content')?>

    <div class="container">
        <h2><?=$title?></h2>

            <?= form_open('todos/insert')?>
            <div class="form-group">
                <label for="exampleInputName">Task Name</label>
                <?= form_input(array(
                    'type'=>"text", 
                    'class'=>"form-control", 
                    'id'=>"exampleInputName", 
                    'name'=>'name'
                ))?>
            </div>
            <div class="form-group">
                <label for="exampleInputDesc">Description</label>
                <?= form_textarea(array(
                    'class'=>"form-control", 
                    'id'=>"exampleInputDesc", 
                    'name'=>'description'
                ))?>
            </div>

            <div class="form-check">
                <?= form_checkbox(array(
                    'class'=>"form-check-input", 
                    'id'=>"exampleInputDone", 
                    'name'=>'done'
                ))?>
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Done</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        <?= form_close()?>        
    </div>

<?= $this->endSection()?>