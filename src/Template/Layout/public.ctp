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

    <footer class="page-footer center-on-small-only unique-color-dark">
        <div class="container mt-5 mb-4 text-center text-md-left">
            <div class="row">
                <div class="col-md-3 col-lg-4 col-xl-3 mb-r">
                    <h6 class="title font-bold">
                        <strong>Member Menu1</strong>
                    </h6>
                    <hr class="blue mb-4 pb-1 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        マイプロフィール作成
                    </p>
                    <!--
                    <p>
                        ダンスチーム登録・検索
                    </p>
                    -->
                    <p>
                        ダンスサークル作成・検索
                    </p>
                    <p>
                        スタジオ検索
                    </p>
                </div>
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-r">
                    <h6 class="title font-bold">
                        <strong>Member Menu2</strong>
                    </h6>
                    <hr class="blue mb-4 pb-1 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        ダンス動画
                    </p>
                    <p>
                        ミュージック
                    </p>
                    <p>
                        イベント登録・検索
                    </p>
                    <p>
                        ダンス関連求人
                    </p>
                </div>
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-r">
                    <h6 class="title font-bold">
                        <strong>Top Menu</strong>
                    </h6>
                    <hr class="blue mb-4 pb-1 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        <?= $this->Html->link('HOME', '/') ?>
                    </p>
                    <p>
                        <?= $this->Html->link('Dancer', '/#dancer') ?>
                    </p>
                    <p>
                        <?= $this->Html->link('Studio', '/#studio') ?>
                    </p>
                    <p>
                        <?= $this->Html->link('Organaizer', '/#organaizer') ?>
                    </p>
                    <p>
                        <?= $this->Html->link('General', '/#general') ?>
                    </p>
                </div>
                <div class="col-md-4 col-lg-3 col-xl-3">
                    <h6 class="title font-bold">
                        <strong>Contact / 他</strong>
                    </h6>
                    <hr class="blue mb-4 pb-1 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        <?= $this->Html->link('利用規約', ['controller' => 'Pages', 'action' => 'contract']) ?>
                    </p>
                    <p>
                        <?= $this->Html->link('プライバシーポリシー', ['controller' => 'Pages', 'action' => 'privacy']) ?>
                    </p>
                    <p>
                        <?= $this->Html->link('<i class="fa fa-envelope mr-3"></i> お問い合わせ',
                            ['controller' => 'Inquiries', 'action' => 'index'],
                            ['escape' => false]
                        ) ?>
                    </p>
                    <hr>
                    <p>
                        <span id="ss_gmo_img_wrapper_130-66_image_ja">
                            <a href="https://jp.globalsign.com/" target="_blank" rel="nofollow">
                                <img alt="SSL GMOグローバルサインのサイトシール" border="0" id="ss_img" src="//seal.globalsign.com/SiteSeal/images/gs_noscript_130-66_ja.gif">
                            </a>
                        </span>
                        <script type="text/javascript" src="//seal.globalsign.com/SiteSeal/gmogs_image_130-66_ja.js" defer="defer"></script>
                    </p>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->

        <div class="footer-copyright">
            <div class="container-fluid text-center">
                © <?= date('Y') ?> Copyright
                <span class="white-text">
                    <strong> dancer<span class="blue-text">oo</span>ts.net</strong>
                </span>
            </div>
        </div>
    </footer>

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
