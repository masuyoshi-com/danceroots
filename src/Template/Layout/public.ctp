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
    <?= $this->Html->css('/css/bootstrap.min') ?>
    <?= $this->Html->css('/css/mdb.min') ?>
    <?= $this->Html->css('/css/top-style') ?>
    <?= $this->Html->script('/js/jquery-3.2.1.min') ?>

    <?php if (strstr($url, 'studios/public-view') || strstr($url, 'events/public-view')) : ?>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgKCqD5RxbGvn317awtqsiexBBd5wJRPo" type="text/javascript"></script>
        <?= $this->Html->script('googlemap') ?>
    <?php endif; ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar" style="background-color: #1C2331">
    <?= $this->element('Menu/header') ?>
    <main class="pt-4">
        <div class="container">
            <?= $this->fetch('content') ?>
        </div>
    </main>

    <?= $this->element('Menu/footer') ?>

    <!-- Bootstrap dropdown -->
    <?= $this->Html->script('/js/popper.min') ?>
    <?= $this->Html->script('/js/bootstrap.min') ?>
    <?= $this->Html->script('/js/mdb.min') ?>
    <script>
        new WOW().init();
        $('[data-toggle="tooltip"]').tooltip();
        $('.mdb-select').material_select();
        $('#mdb-lightbox-ui').load('<?= $this->Url->build('/mdb-addons/mdb-lightbox-ui.html') ?>');
    </script>
</body>
</html>
