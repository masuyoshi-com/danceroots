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
                    <?= $this->Html->link('Dancer','/#dancer', ['class' => 'nav-link']) ?>
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
                <li class="nav-item">
                    <?= $this->Html->link('Webダンス講座', ['controller' => 'Lectures', 'action' => 'index'], ['class' => 'nav-link']) ?>
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
