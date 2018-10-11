<!DOCTYPE html>
<html lang="jp">
<head>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-6641711520108217",
        enable_page_level_ads: true
        });
    </script>
    <?= $this->Html->charset() ?>
    <?= $this->Html->meta(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']) ?>
    <?= $this->Html->meta(['http-equiv' => 'x-ua-compatible', 'content' => 'ie=edge']) ?>
    <?= $this->Html->meta('description', $this->fetch('description')) ?>
    <title><?= $this->fetch('title') ?> | Danceroots</title>
    <?= $this->Html->meta('icon') ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-5544353-4"></script>
    <?= $this->Html->script('gtag') ?>
    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') ?>
    <?= $this->Html->css('bootstrap.min') ?>
    <?= $this->Html->css('mdb.min') ?>
    <?= $this->Html->css('top-style') ?>
    <style>
        html,
        body,
        header,
        .jarallax {
            height: 100%;
        }
    </style>

    <?= $this->Html->script('jquery-3.2.1.min') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body class="team">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar" style="background-color: #1C2331">

    <?= $this->element('Menu/header') ?>
    <?= $this->fetch('content') ?>
    <?= $this->element('Menu/footer') ?>

    <!-- Bootstrap dropdown -->
    <?= $this->Html->script('popper.min') ?>
    <?= $this->Html->script('bootstrap.min') ?>
    <?= $this->Html->script('mdb.min') ?>
    <?= $this->Html->script('script') ?>
    <?= $this->Html->script('autolink') ?>

    <?php
        if (strstr($url, 'pv')) {
            print $this->Html->script('facebook');
        }
    ?>

    <script>
        new WOW().init();
        $('[data-toggle="tooltip"]').tooltip();
        $('#mdb-lightbox-ui').load('<?= $this->Url->build('/mdb-addons/mdb-lightbox-ui.html') ?>');

        initRun.message('<?= $this->Url->build(['controller' => 'Messages', 'action' => 'add']) ?>');
    </script>
</body>
</html>
