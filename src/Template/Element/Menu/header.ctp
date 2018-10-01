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
                    <?= $this->Html->link('StreetDancer', ['controller' => 'Dancers', 'action' => 'public'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('Studio', ['controller' => 'Studios', 'action' => 'public'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('Event', ['controller' => 'Events', 'action' => 'public'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('Music', ['controller' => 'RecommendMusics', 'action' => 'public'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('DanceVideo', ['controller' => 'RecommendVideos', 'action' => 'public'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('Forum', ['controller' => 'Forums', 'action' => 'public'], ['class' => 'nav-link']) ?>
                </li>
                <!--
                <li class="nav-item dropdown">
                    <?= $this->Html->link('Famous ', '#',
                        [
                            'class'         => 'nav-link dropdown-toggle',
                            'id'            => 'navbarDropdownMenuLink',
                            'data-toggle'   => 'dropdown',
                            'aria-haspopup' => 'true',
                            'aria-expanded' => 'false',
                            'escape'        => false
                        ]
                    ) ?>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <?= $this->Html->link('有名チーム',   ['controller' => 'FamousTeams',   'action' => 'publicView'],   ['class' => 'dropdown-item']) ?>
                        <?= $this->Html->link('有名ダンサー', ['controller' => 'FamousDancers', 'action' => 'publicView'],   ['class' => 'dropdown-item']) ?>
                    </div>
                </li>
                -->
                <li class="nav-item">
                    <?= $this->Html->link('Webダンス講座', ['controller' => 'Lectures', 'action' => 'index'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item dropdown">
                    <?= $this->Html->link('ユーザー機能紹介 ', '#',
                        [
                            'class'         => 'nav-link dropdown-toggle',
                            'id'            => 'navbarDropdownMenuLink',
                            'data-toggle'   => 'dropdown',
                            'aria-haspopup' => 'true',
                            'aria-expanded' => 'false',
                            'escape'        => false
                        ]
                    ) ?>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <?= $this->Html->link('ストリートダンサー',       ['controller' => 'Pages', 'action' => 'dancer'],   ['class' => 'dropdown-item']) ?>
                        <?= $this->Html->link('ダンススタジオ・スクール',  ['controller' => 'Pages', 'action' => 'studio'],   ['class' => 'dropdown-item']) ?>
                        <?= $this->Html->link('オーガナイザー・企業',     ['controller' => 'Pages', 'action' => 'organizer'], ['class' => 'dropdown-item']) ?>
                        <?= $this->Html->link('一般',                    ['controller' => 'Pages', 'action' => 'general'],   ['class' => 'dropdown-item']) ?>
                    </div>
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
                    <?= $this->Html->link('<i class="fa fa-twitter"></i>', 'https://twitter.com/share?url=https://danceroots.net/&text=ストリートダンス総合プラットフォーム',
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
