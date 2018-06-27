<!DOCTYPE html>
<html lang="jp">

<head>
    <?= $this->Html->charset() ?>
    <?= $this->Html->meta(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']) ?>
    <?= $this->Html->meta(['http-equiv' => 'x-ua-compatible', 'content' => 'ie=edge']) ?>
    <title>Danceroots | <?= $this->fetch('title') ?></title>
    <?= $this->Html->meta('icon') ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-5544353-4"></script>
    <?= $this->Html->script('gtag') ?>
    <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css') ?>
    <?= $this->Html->css('/css/bootstrap.min') ?>
    <?= $this->Html->css('/css/mdb.min') ?>
    <?= $this->Html->css('/css/style') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body class="fixed-sn black-skin">
    <header>
        <?= $this->element('Menu/simple_side') ?>
        <?= $this->element('Menu/simple_nav') ?>
    </header>

    <main>
        <div class="container-fluid">
            <?= $this->element('Modal/feedback') ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>

    <?= $this->Html->script('/js/jquery-3.2.1.min') ?>
    <?= $this->Html->script('/js/popper.min') ?>
    <?= $this->Html->script('/js/bootstrap.min') ?>
    <?= $this->Html->script('/js/mdb.min') ?>
    <script>
    $(function () {
        // 各init
        $("#mdb-lightbox-ui").load('<?= $this->Url->build("/mdb-addons/mdb-lightbox-ui.html") ?>');
        $('[data-toggle="tooltip"]').tooltip();
        $(".button-collapse").sideNav();
        $('.mdb-select').material_select();
        $('.datepicker').pickadate();
        $('.time').pickatime({});
        new WOW().init();
    });
    </script>
</body>
</html>
