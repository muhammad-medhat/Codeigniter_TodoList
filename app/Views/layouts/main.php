<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="<?=base_url()?>/style.css"> -->
    <?= link_tag('style.css')?>
</head>
<body>
    <h1>
        Master layout
    </h1>
    <header>
        <?= $this->include('layouts/inc/header')?>
    </header>
    <div class="cont">
        <?= $this->renderSection('body-content')?>
    </div>
    <footer>
        <?= $this->include('layouts/inc/footer')?>
    </footer>

</body>
</html>