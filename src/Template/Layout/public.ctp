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
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar" style="background-color: #1C2331">
        <div class="container-fluid">

            <?= $this->Html->link('<strong>Dancer<span class="font-blue">oo</span>ts</strong>', '/', ['class' => 'navbar-brand', 'escape' => false]) ?>
            <?= $this->Form->button('<span class="navbar-toggler-icon"></span>',
                [
                    'class'         => 'navbar-toggler',
                    'data-toggle'   => 'collapse',
                    'data-target'   => '#navbarSupportedContent',
                    'aria-controls' => 'navbarSupportedContent',
                    'aria-expanded' => 'false',
                    'aria-label'    => 'Toggle navigation'
                ]
            ) ?>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <?= $this->Html->link('Home', '/', ['class' => 'nav-link']) ?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link('Dancer', '/#dancer', ['class' => 'nav-link']) ?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link('Studio', '/#studio', ['class' => 'nav-link']) ?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link('Organaizer', '/#organaizer', ['class' => 'nav-link']) ?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link('General', '/#general', ['class' => 'nav-link']) ?>
                    </li>
                </ul>
                <ul class="navbar-nav nav-flex-icons">
                    <li class="nav-item">
                        <?= $this->Html->link('<i class="fa fa-facebook"></i>', 'https://facebook.com/',
                            [
                                'class'          => 'nav-link waves-effect waves-light',
                                'target'         => '_blank',
                                'escape'         => false,
                                'data-toggle'    => 'tooltip',
                                'data-placement' => 'bottom',
                                'title'          => 'Facebookでシェア'
                            ]
                        ) ?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link('<i class="fa fa-twitter"></i>', 'https://twitter.com/',
                            [
                                'class'          => 'nav-link waves-effect waves-light',
                                'target'         => '_blank',
                                'escape'         => false,
                                'data-toggle'    => 'tooltip',
                                'data-placement' => 'bottom',
                                'title'          => 'Twitterでツイート'
                            ]
                        ) ?>
                    </li>
                    <li class="nav-item">
                        <?php
                            if (isset($logins)) {
                                print $this->Html->link('マイホーム', $homes, ['class' => 'nav-link waves-effect waves-light']);
                            } else {
                                print $this->Html->link('ログイン', ['controller' => 'Users', 'action' => 'login'],
                                    ['class' => 'nav-link waves-effect waves-light']
                                );
                            }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="pt-4">
        <div class="container">
            <?= $this->fetch('content') ?>
        </div>
    </main>

    <?= $this->element('Menu/footer') ?>

    <?= $this->Html->script('/js/jquery-3.2.1.min') ?>
    <!-- Bootstrap dropdown -->
    <?= $this->Html->script('/js/popper.min') ?>
    <?= $this->Html->script('/js/bootstrap.min') ?>
    <?= $this->Html->script('/js/mdb.min') ?>
    <script>
        new WOW().init();
        $('[data-toggle="tooltip"]').tooltip()
    </script>
</body>
</html>
