<?php $this->assign('title', h($general->user->username) . 'プロフィール'); ?>

<?php if (AD === 0) : ?>
<div class="row">
    <div class="col-lg-12 text-center">
        <section id="dynamicContentWrapper-docsPanel" class="mb-4">
            <div class="card border border-danger z-depth-0" style="height: 200px;">
                <div class="card-body text-center">
                    <p>
                        <strong>広告枠</strong>
                    </p>
                </div>
            </div>
        </section>
    </div>
</div>
<?php endif; ?>

<div class="row">
    <div class="col-lg-12">
        <?= $this->Flash->render() ?>
    </div>
</div>

<hr class="none mb-4">

<div class="row">
    <div class="col-lg-4 col-md-12 mt-4">
        <section class="card card-cascade card-avatar mt-5 mb-3">

            <?php
                if ($general->icon) {
                    print $this->Html->image($general->icon, ['class' => 'icon-160']);
                } else {
                    print $this->Html->image('/img/sample/no_icon.jpg', ['class' => 'icon-160']);
                }
            ?>

            <div class="card-body">

                <p>
                    <span class="badge badge-success"><?= h($general->pref) ?></span>
                    <spna class="badge purple"><?= h($general->user->classification) ?></span>
                </p>

                <h4 class="card-title dark-grey-text font-weight-bold"><?= h($general->user->username) ?></h4>

                <?php if ($general->favorite_genre) : ?>
                <p class="dark-grey-text"><small>好きなジャンル:</small> <strong><?= h($general->favorite_genre) ?></strong></p>
                <?php endif; ?>

                <?php
                    if ($general->facebook) {
                        print $this->Html->link('<i class="fa fa-facebook dark-grey-text"></i>', h($general->facebook),
                            [
                                'type'           => 'button',
                                'class'          => 'btn-floating btn-small transparent',
                                'target'         => '_blank',
                                'escape'         => false,
                                'data-toggle'    => 'tooltip',
                                'data-placement' => 'bottom',
                                'title'          => 'Facebook'
                            ]
                        );
                    }
                ?>

                <?php
                    if ($general->twitter) {
                        print $this->Html->link('<i class="fa fa-twitter dark-grey-text"></i>', h($general->twitter),
                            [
                                'type'           => 'button',
                                'class'          => 'btn-floating btn-small transparent',
                                'target'         => '_blank',
                                'escape'         => false,
                                'data-toggle'    => 'tooltip',
                                'data-placement' => 'bottom',
                                'title'          => 'Twitter'
                            ]
                        );
                    }
                ?>

                <?php
                    if ($general->instagram) {
                        print $this->Html->link('<i class="fa fa-instagram dark-grey-text"></i>', h($general->instagram),
                            [
                                'type'           => 'button',
                                'class'          => 'btn-floating btn-small transparent',
                                'target'         => '_blank',
                                'escape'         => false,
                                'data-toggle'    => 'tooltip',
                                'data-placement' => 'bottom',
                                'title'          => 'Instagram'
                            ]
                        );
                    }
                ?>
                <hr>
                <p class="card-text mt-3">
                    <?= h($general->self_intro) ?>
                </p>

                <?php if ($logins['id'] === $general->user_id) : ?>
                    <div class="dropdown">
                        <?= $this->Form->button('メインメニュー ',
                            [
                                'class'         => 'btn btn-primary btn-rounded dropdown-toggle',
                                'data-toggle'   => 'dropdown',
                                'aria-haspopup' => 'true',
                                'area-expanded' => 'false'
                            ]
                        ) ?>
                        <div class="dropdown-menu dropdown-primary">
                            <?= $this->Html->link('ホーム', $homes, ['class' => 'dropdown-item']) ?>
                            <?= $this->Html->link('プロフィール編集', ['controller' => 'Generals',   'action' => 'edit'], ['class' => 'dropdown-item']) ?>
                            <?= $this->Html->link('メッセージ',      ['controller' => 'Messages',    'action' => 'index'], ['class' => 'dropdown-item']) ?>
                            <?= $this->Html->link('イベント',        ['controller' => 'Events',      'action' => 'list'], ['class' => 'dropdown-item']) ?>
                            <?= $this->Html->link('サークル',        ['controller' => 'Circles',     'action' => 'list'], ['class' => 'dropdown-item']) ?>
                            <?= $this->Html->link('ダンス動画',      ['controller' => 'DanceVideos', 'action' => 'list'], ['class' => 'dropdown-item']) ?>
                            <?= $this->Html->link('ミュージック',    ['controller' => 'DanceMusics', 'action' => 'list'], ['class' => 'dropdown-item']) ?>
                        </div>
                    </div>
                <?php else : ?>
                    <div>
                        <?= $this->Html->link('<i class="fa fa-paper-plane-o" aria-hidden="true"></i> メッセージ',
                            'javascript:void(0)',
                            [
                                'class'       => 'btn blue-gradient btn-rounded',
                                'escape'      => false,
                                'data-toggle' => 'modal',
                                'data-target' => '#modalMessageForm'
                            ]
                        ) ?>
                    </div>
                <?php endif; ?>

            </div><!-- /.card-body -->
        </section>

        <?php if ($music !== 0 || $video !== 0 || $event !== 0) : ?>
        <div class="row">
            <div class="col-lg-12">
                <?php if ($music !== 0) : ?>
                    <p class="mb-2">
                        <?= $this->Html->link('<i class="fa fa-music" aria-hidden="true"></i> Music',
                            ['controller' => 'DanceMusics', 'action' => 'detail', $general->user->username],
                            [
                                'class'          => 'btn btn-block purple-gradient',
                                'escape'         => false,
                                'data-toggle'    => 'tooltip',
                                'data-placement' => 'bottom',
                                'title'          => h($general->user->username) . 'さんのミュージックプレイリスト'
                            ]
                        ) ?>
                    </p>
                <?php endif ?>
                <?php if ($video !== 0) : ?>
                    <p class="mb-2">
                        <?= $this->Html->link('<i class="fa fa-youtube-play" aria-hidden="true"></i> Dance Video',
                            ['controller' => 'DanceVideos', 'action' => 'detail', $general->user->username],
                            [
                                'class'          => 'btn btn-block peach-gradient',
                                'escape'         => false,
                                'data-toggle'    => 'tooltip',
                                'data-placement' => 'bottom',
                                'title'          => h($general->user->username) . 'さんのダンス動画プレイリスト'
                            ]
                        ) ?>
                    </p>
                <?php endif; ?>
                <?php if ($event !== 0) : ?>
                    <p class="mb-3">
                        <?= $this->Html->link('<i class="fa fa-calendar" aria-hidden="true"></i> Event',
                            ['controller' => 'Events', 'action' => 'detail', $general->user->username],
                            [
                                'class'          => 'btn btn-block aqua-gradient',
                                'escape'         => false,
                                'data-toggle'    => 'tooltip',
                                'data-placement' => 'bottom',
                                'title'          => h($general->user->username) . 'さんのイベントリスト'
                            ]
                        ) ?>
                    </p>
                <?php endif; ?>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
        <?php endif; ?>

    </div><!-- /.col-lg-4 -->

    <div class="col-lg-8 col-md-12 mb-3 mt-2">
        <div class="card card-cascade narrower">

            <div class="view gradient-card-header mdb-color lighten-2">
                <h5 class="mb-0 font-bold"><?= h($general->user->username) ?> Profile</h5>
            </div>

            <div class="card-body mb-3">
                <div class="row">
                    <?php if ($general->favorite_dancer) : ?>
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <div class="md-form">
                            <?= $this->Form->control('favorite_dancer',
                                [
                                    'id'    => 'f--f_dancer',
                                    'class' => 'form-control',
                                    'value' => h($general->favorite_dancer),
                                    'disabled'
                                ]
                            ) ?>
                            <label for="f--f_dancer">好きなダンサー</label>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if ($general->favorite_artist) : ?>
                    <div class="col-lg-6 col-md-12 col-xs-12">
                        <div class="md-form">
                            <?= $this->Form->control('favorite_artist',
                                [
                                    'id'    => 'f--f_artist',
                                    'class' => 'form-control',
                                    'value' => h($general->favorite_artist),
                                    'disabled'
                                ]
                            ) ?>
                            <label for="f--f_artist">好きなアーティスト</label>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>

                <?php if ($general->notes) : ?>
                    <div class="row mt-2">
                        <div class="col-lg-12">
                            <h6 class="dark-grey-text">紹介詳細</h6>
                            <hr class="text-left blue mb-3 pb-1 mt-0 ml-0" style="width: 100px;">
                            <div class="md-form mt-0">
                                <?= nl2br(h($general->notes)) ?>
                            </div>
                        </div>
                    </div>
                    <hr class="mdb-form-color">
                <?php endif; ?>
            </div><!-- /.card-body -->
        </div><!-- /.card -->
    </div><!-- /.col-lg-8 -->
</div><!-- /. row -->

<div class="row">
    <div class="col-lg-6 col-md-6 col-xs-12">
        <?php if ($general->facebook) : ?>
            <div class="card card-body mb-3">
                <h6><i class="fa fa-facebook fb-ic"></i> Facebook</h6>
                <hr class="mt-0">
                <div class="text-center w-100">
                    <div class="fb-page" data-href="<?= h($general->facebook) ?>" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="<?= h($general->facebook) ?>" class="fb-xfbml-parse-ignore">
                            <a href="https://www.facebook.com/facebook">Facebook</a>
                        </blockquote>
                    </div>
                </div>
                <hr>
            </div>
        <?php endif; ?>
    </div>
    <div class="col-lg-6 col-md-6 col-xs-12">
        <?php if ($general->twitter) : ?>
            <div class="card card-body mb-3">
                <h6><i class="fa fa-twitter tw-ic"></i> Twitter</h6>
                <hr class="m-0">
                <div>
                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    <?= $this->Html->link('', h($general->twitter) . '?ref_src=twsrc%5Etfw&height=500', ['class' => 'twitter-timeline']) ?>
                </div>
                <hr>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="row mb-3">
    <div class="col-lg-12">
        <div class="card card-body">
            <?php
                if ($general->user_id === $logins['id']) {
                    print $this->Html->link('<i class="fa fa-edit" aria-hidden="true"></i> プロフィールを編集',
                        ['action' => 'edit'],
                        ['class' => 'btn btn-primary', 'escape' => false]
                    );
                } else {
                    print $this->Html->link('<i class="fa fa-envelope" aria-hidden="true"></i> メッセージを送る',
                        'javascript:void(0)',
                        [
                            'class'       => 'btn blue-gradient btn-block',
                            'escape'      => false,
                            'data-toggle' => 'modal',
                            'data-target' => '#modalMessageForm'
                        ]
                    );
                }
            ?>
        </div>
    </div>
</div>
