<div id="slide-out" class="side-nav fixed">
    <ul class="custom-scrollbar">

        <!-- Logo -->
        <li>
            <div class="logo-wrapper waves-light">
                <a href="<?= $this->Url->build('/') ?>">
                    <p style="font-size: 30px; color: white;" class="flex-center">
                        <strong>Dancer<span class="font-blue">oo</span>ts</strong><small style="font-size: 10px;">BETA</small>
                    </p>
                </a>
            </div>
        </li>
        <!--/. Logo -->

        <li>
            <ul class="collapsible collapsible-accordion">
                <li>
                    <?= $this->Html->link('<i class="fa fa-home"></i> ホーム', $homes,
                        ['class' => 'collapsible-header waves-effect arrow-r', 'escape' => false]
                    ) ?>
                </li>
                <li>
                    <?= $this->Html->link('<i class="fa fa-universal-access"></i> ダンサー<i class="fa fa-angle-down rotate-icon"></i>', 'javascript:void(0)',
                        ['class' => 'collapsible-header waves-effect arrow-r', 'escape' => false]
                    ) ?>
                    <div class="collapsible-body">
                        <ul class="list-unstyled">
                            <li>
                                <?= $this->Html->link('ダンサー検索', ['controller' => 'Dancers', 'action' => 'index'], ['class' => 'waves-effect']) ?>
                            </li>
                            <!--
                            <li>
                                <?= $this->Html->link('ダンスチーム検索', ['controller' => 'Teams', 'action' => 'index'], ['class' => 'waves-effect']) ?>
                            </li>
                            -->
                        </ul>
                    </div>
                </li>
                <li>
                    <?= $this->Html->link('<i class="fa fa-building"></i> スタジオ<i class="fa fa-angle-down rotate-icon"></i>', 'javascript:void(0)',
                        ['class' => 'collapsible-header waves-effect arrow-r', 'escape' => false]
                    ) ?>
                    <div class="collapsible-body">
                        <ul class="list-unstyled">
                            <li>
                                <?= $this->Html->link('ダンススタジオ検索', ['controller' => 'Studios', 'action' => 'index'], ['class' => 'waves-effect']) ?>
                            </li>
                            <li>
                                <?= $this->Html->link('ダンス関連求人', ['controller' => 'Jobs', 'action' => 'index'], ['class' => 'waves-effect']) ?>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <?= $this->Html->link('<i class="fa fa-users" aria-hidden="true"></i> サークル<i class="fa fa-angle-down rotate-icon"></i>', 'javascript:void(0)',
                        ['class' => 'collapsible-header waves-effect arrow-r', 'escape' => false]
                    ) ?>
                    <div class="collapsible-body">
                        <ul class="list-unstyled">
                            <li>
                                <?= $this->Html->link('サークル検索', ['controller' => 'Circles', 'action' => 'index'], ['class' => 'waves-effect']) ?>
                            </li>
                            <li>
                                <?= $this->Html->link('マイ サークル', ['controller' => 'Circles', 'action' => 'list'], ['class' => 'waves-effect']) ?>
                            </li>
                            <li>
                                <?= $this->Html->link('サークル登録', ['controller' => 'Circles', 'action' => 'add'], ['class' => 'waves-effect']) ?>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <?= $this->Html->link('<i class="fa fa-youtube-play" aria-hidden="true"></i> ダンス動画<i class="fa fa-angle-down rotate-icon"></i>', 'javascript:void(0)',
                        ['class' => 'collapsible-header waves-effect arrow-r', 'escape' => false]
                    ) ?>
                    <div class="collapsible-body">
                        <ul class="list-unstyled">
                            <li>
                                <?= $this->Html->link('ダンス動画', ['controller' => 'DanceVideos', 'action' => 'index'], ['class' => 'waves-effect']) ?>
                            </li>
                            <li>
                                <?= $this->Html->link('マイ ダンス動画', ['controller' => 'DanceVideos', 'action' => 'list'], ['class' => 'waves-effect']) ?>
                            </li>
                            <li>
                                <?= $this->Html->link('おすすめダンス動画', ['controller' => 'RecommendVideos', 'action' => 'index'], ['class' => 'waves-effect']) ?>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <?= $this->Html->link('<i class="fa fa-music" aria-hidden="true"></i> ミュージック<i class="fa fa-angle-down rotate-icon"></i>', 'javascript:void(0)',
                        ['class' => 'collapsible-header waves-effect arrow-r', 'escape' => false]
                    ) ?>
                    <div class="collapsible-body">
                        <ul class="list-unstyled">
                            <li>
                                <?= $this->Html->link('ミュージック', ['controller' => 'DanceMusics', 'action' => 'index'], ['class' => 'waves-effect']) ?>
                            </li>
                            <li>
                                <?= $this->Html->link('マイ ミュージック', ['controller' => 'DanceMusics', 'action' => 'list'], ['class' => 'waves-effect']) ?>
                            </li>
                            <li>
                                <?= $this->Html->link('最新ランキング', ['controller' => 'DanceMusics', 'action' => 'ranking'], ['class' => 'waves-effect']) ?>
                            </li>
                            <li>
                                <?= $this->Html->link('おすすめミュージック', ['controller' => 'RecommendMusics', 'action' => 'index'], ['class' => 'waves-effect']) ?>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <?= $this->Html->link('<i class="fa fa-calendar"></i> イベント<i class="fa fa-angle-down rotate-icon"></i>', 'javascript:void(0)',
                        ['class' => 'collapsible-header waves-effect arrow-r', 'escape' => false]
                    ) ?>
                    <div class="collapsible-body">
                        <ul class="list-unstyled">
                            <li>
                                <?= $this->Html->link('イベント検索', ['controller' => 'Events', 'action' => 'index'], ['class' => 'waves-effect']) ?>
                            </li>
                            <li>
                                <?= $this->Html->link('マイ イベント', ['controller' => 'Events', 'action' => 'list'], ['class' => 'waves-effect']) ?>
                            </li>
                            <li>
                                <?= $this->Html->link('イベント登録', ['controller' => 'Events', 'action' => 'add'], ['class' => 'waves-effect']) ?>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <?= $this->Html->link('<i class="fa fa-comments" aria-hidden="true"></i> フォーラム<i class="fa fa-angle-down rotate-icon"></i>', 'javascript:void(0)',
                        ['class' => 'collapsible-header waves-effect arrow-r', 'escape' => false]
                    ) ?>
                    <div class="collapsible-body">
                        <ul class="list-unstyled">
                            <li>
                                <?= $this->Html->link('フォーラム', ['controller' => 'Forums', 'action' => 'index'], ['class' => 'waves-effect']) ?>
                            </li>
                            <li>
                                <?= $this->Html->link('マイ フォーラム', ['controller' => 'Forums', 'action' => 'list'], ['class' => 'waves-effect']) ?>
                            </li>
                            <li>
                                <?= $this->Html->link('スレッド登録', ['controller' => 'Forums', 'action' => 'add'], ['class' => 'waves-effect']) ?>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <?= $this->Html->link('<i class="fa fa-paper-plane-o"></i> フィードバック', 'javascript:void(0)',
                        [
                            'class'       => 'collapsible-header waves-effect arrow-r',
                            'escape'      => false,
                            'data-toggle' => 'modal',
                            'data-target' => '#modalContactForm'
                        ]
                    ) ?>
                </li>
            </ul>
        </li>
    </ul>
    <div class="sidenav-bg mask-strong"></div>
</div><!-- /.sidebar -->
