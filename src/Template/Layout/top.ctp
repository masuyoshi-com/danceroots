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
    <?= $this->Html->meta('description',
        'ストリートダンス総合SNS。ストリートダンサー・スタジオ・オーガナイザーなどの検索、ダンス動画・ミュージックの共有、イベントや求人情報もストリートダンスに特化した専用プラットフォーム。利用は全て無料です。') ?>
    <title>Danceroots | ストリートダンス総合SNS</title>
    <?= $this->Html->meta('icon') ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-5544353-4"></script>
    <?= $this->Html->script('gtag') ?>
    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') ?>
    <?= $this->Html->css('/css/top-bootstrap.min') ?>
    <!-- ※MDBFree & Tempateベースで作成 -->
    <?= $this->Html->css('/css/top-mdb.min') ?>
    <?= $this->Html->css('/css/top-style') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <style rel="stylesheet">
        html,
        body,
        .view {
            height: 100%;
        }

        .navbar {
            background-color: transparent;
        }

        .scrolling-navbar {
            -webkit-transition: background .5s ease-in-out, padding .5s ease-in-out;
            -moz-transition: background .5s ease-in-out, padding .5s ease-in-out;
            transition: background .5s ease-in-out, padding .5s ease-in-out;
        }

        .top-nav-collapse {
            background-color: #1C2331;
        }

        footer.page-footer {
            background-color: #1C2331;
            margin-top: 0;
        }

        @media only screen and (max-width: 767px) {
            .navbar {
                background-color: #1C2331;
            }
            .display-3 {
                font-size: 2rem;
                margin-top: 6rem;
            }
            h3 {
                font-size: 1rem;
            }
        }

        @media only screen and (max-width: 667px) {
            .display-3 {
                font-size: 3rem;
            }
        }

        .carousel,
        .carousel-item,
        .active {
            height: 100%;
        }

        .carousel-inner {
            height: 100%;
        }

        /*Caption*/
        .flex-center {
            color: #fff;
        }

        @media (min-width: 776px) {
            .carousel .view ul li {
                display: inline;
            }
            .carousel .view .full-bg-img ul li .flex-item {
                margin-bottom: 1.5rem;
            }
        }

        .navbar .btn-group .dropdown-menu a:hover {
            color: #000 !important;
        }

        .navbar .btn-group .dropdown-menu a:active {
            color: #fff !important;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
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
                        <?= $this->Html->link('Dancer', '#dancer', ['class' => 'nav-link']) ?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link('Studio', '#studio', ['class' => 'nav-link']) ?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link('Organaizer', '#organaizer', ['class' => 'nav-link']) ?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link('General', '#general', ['class' => 'nav-link']) ?>
                    </li>
                </ul>

                <ul class="navbar-nav nav-flex-icons">
                    <li class="nav-item">
                        <?= $this->Html->link('<i class="fa fa-facebook"></i>', 'https://www.facebook.com/share.php?u=http%3A%2F%2Fdanceroots.net%2F',
                            [
                                'class'          => 'nav-link waves-effect waves-light',
                                'target'         => '_blank',
                                'escape'         => false,
                                'onclick'        => "window.open(this.href,'FBwindow','width=650,height=450,menubar=no,toolbar=no,scrollbars=yes');return false;",
                                'data-toggle'    => 'tooltip',
                                'data-placement' => 'bottom',
                                'title'          => 'Facebookでシェア'
                            ]
                        ) ?>
                    </li>

                    <li class="nav-item">
                        <?= $this->Html->link('<i class="fa fa-twitter"></i>', 'https://twitter.com/share?url=https://danceroots.net/&text=ストリートダンス専門プラットフォーム',
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
            </div><!-- /.collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <?= $this->fetch('content') ?>

    <?= $this->element('Menu/footer') ?>

    <?= $this->Html->script('jquery-3.2.1.min') ?>
    <!-- Bootstrap dropdown -->
    <?= $this->Html->script('popper.min') ?>
    <?= $this->Html->script('bootstrap.min') ?>
    <?= $this->Html->script('mdb.min') ?>
    <script>
        new WOW().init();
        $('[data-toggle="tooltip"]').tooltip()
    </script>
</body>
</html>
