<!DOCTYPE html>
<html lang="jp">
<head>
    <?= $this->Html->charset() ?>
    <?= $this->Html->meta(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']) ?>
    <?= $this->Html->meta(['http-equiv' => 'x-ua-compatible', 'content' => 'ie=edge']) ?>
    <title><?= $this->fetch('title') ?> | Danceroots</title>
    <?= $this->Html->meta('icon') ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-5544353-4"></script>
    <?= $this->Html->script('gtag') ?>
    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') ?>
    <?= $this->Html->css('bootstrap.min') ?>
    <?= $this->Html->css('public-mdb.min') ?>
    <?= $this->Html->css('public-style') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar" style="background-color: #1C2331">
        <div class="container">
            <?= $this->Html->link('<strong>Dancer<span class="font-blue">oo</span>ts</strong>', '/', ['class' => 'navbar-brand', 'escape' => false]) ?>
        </div>
    </nav>

    <?= $this->fetch('content') ?>

    <?= $this->Html->script('jquery-3.2.1.min') ?>
    <!-- Bootstrap dropdown -->
    <?= $this->Html->script('popper.min') ?>
    <?= $this->Html->script('bootstrap.min') ?>
    <?= $this->Html->script('mdb.min') ?>
    <script>
        new WOW().init();
    </script>
</body>
</html>
