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
    <title>Danceroots | <?= $this->fetch('title') ?></title>
    <?= $this->Html->meta('icon') ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-5544353-4"></script>
    <?= $this->Html->script('gtag') ?>
    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') ?>
    <?= $this->Html->css('bootstrap.min') ?>
    <?= $this->Html->css('mdb.min') ?>
    <?= $this->Html->css('top-style') ?>
    <?= $this->Html->script('jquery-3.2.1.min') ?>

    <?php if (strstr($url, 'studios/public-view') || strstr($url, 'events/public-view')) : ?>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgKCqD5RxbGvn317awtqsiexBBd5wJRPo&callback=initGoogle.initMap" type="text/javascript"></script>
        <?= $this->Html->script('googlemap') ?>
    <?php endif; ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<?php
    if (strstr($url, 'famous')) {
        print '<body class="elegant-color">';
    } else {
        print '<body>';
    }
?>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar" style="background-color: #1C2331">
    <?= $this->element('Menu/header') ?>
    <main class="pt-4">
        <div class="container">
            <?php
                if (isset($to_user_id)) {
                    if (isset($message_id)) {
                        print $this->element('Modal/message', ['to_user_id' => $to_user_id, 'to_user_name' => $to_username, 'message_id' => $message_id] );
                    } else {
                        print $this->element('Modal/message', ['to_user_id' => $to_user_id, 'to_user_name' => $to_username]);
                    }
                }
            ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>

    <?= $this->element('Menu/footer') ?>

    <!-- Bootstrap dropdown -->
    <?= $this->Html->script('popper.min') ?>
    <?= $this->Html->script('bootstrap.min') ?>
    <?= $this->Html->script('mdb.min') ?>
    <?= $this->Html->script('script') ?>

    <?php
        if (strstr($url, 'public-view')) {
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
