<?php $this->assign('title', h($general->user->username) . ' ホーム'); ?>

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
        <section class="card card-cascade card-avatar mb-4 mt-5">

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
                        <?= $this->Html->link('マイプロフィール', $views, ['class' => 'dropdown-item']) ?>
                        <?= $this->Html->link('メッセージ',      ['controller' => 'Messages',    'action' => 'index'], ['class' => 'dropdown-item']) ?>
                        <?= $this->Html->link('イベント',        ['controller' => 'Events',      'action' => 'list'], ['class' => 'dropdown-item']) ?>
                        <?= $this->Html->link('サークル',        ['controller' => 'Circles',     'action' => 'list'], ['class' => 'dropdown-item']) ?>
                        <?= $this->Html->link('ダンス動画',      ['controller' => 'DanceVideos', 'action' => 'list'], ['class' => 'dropdown-item']) ?>
                        <?= $this->Html->link('ミュージック',    ['controller' => 'DanceMusics', 'action' => 'list'], ['class' => 'dropdown-item']) ?>
                    </div>
                </div>
            </div><!-- /.card-body -->
        </section>
    </div><!-- /.col-lg-4 -->


    <div class="col-lg-8 col-md-12">

        <div class="row mb-3">
            <div class="col-lg-6 col-md-12 text-center mb-3">
                <div class="card card-image" style="background-image: url(../img/event640×388.jpg);">
                    <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4 rounded">
                        <div>
                            <h6 class="pink-text">
                                <i class="fa fa-calendar-plus-o"></i>
                                <strong>Event</strong>
                            </h6>
                            <h3 class="py-3 font-weight-bold">
                                <strong>イベント</strong>
                            </h3>
                            <p class="pb-3">
                                参加予定のイベントや、コンテストなどの登録を行いましょう。
                                イベント一覧に表示され、皆に告知することが可能です。
                            </p>
                            <?= $this->Html->link('イベント',
                                ['controller' => 'Events', 'action' => 'list'],
                                ['class' => 'btn btn-pink btn-rounded btn-md']
                            ) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card card-image" style="background-image: url(../img/circle1600x900.jpg);">
                    <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4 rounded">
                        <div>
                            <h6 class="orange-text">
                                <i class="fa fa-users"></i>
                                <strong> Circle</strong>
                            </h6>
                            <h3 class="py-3 font-weight-bold">
                                <strong>サークル</strong>
                            </h3>
                            <p class="pb-3">
                                定期的に開催するイベントがあれば、サークルを利用しましょう。
                                メンバーにグループメッセージを送ることができます。
                            </p>
                            <?= $this->Html->link('サークル',
                                ['controller' => 'Circles', 'action' => 'list'],
                                ['class' => 'btn btn-orange btn-rounded btn-md']

                            ) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.row -->

        <?php if (count($informations) !== 0) : ?>
        <div class="card mb-4">
            <div class="card-header white-text mdb-color"><i class="fa fa-globe"></i> Danceroots からのお知らせ</div>
            <div class="card-body">
                <p class="text-right mt-0 mb-0">
                    <small>
                        <?= $this->Html->link('ー覧へ <i class="fa fa-arrow-circle-right blue-text"></i>',
                                ['controller' => 'Informations', 'action' => 'index'],
                                ['class' => 'dark-grey-text', 'escape' => false]
                        ) ?>
                    </small>
                </p>
                <table class="table table-striped table-hover no-header mt-1">
                    <tbody>
                        <?php foreach ($informations as $information) : ?>
                        <tr>
                            <td><?= h($information->created) ?></td>
                            <td>
                                <?= $this->Html->link($information->title,
                                    [
                                        'controller' => 'Informations',
                                        'action'     => 'view',
                                        $information->id
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div><!-- /.card-body -->
        </div><!-- /.card -->
        <?php endif; ?>

        <?php if ($message_number > 0) : ?>
        <a href="<?= $this->Url->build(['controller' => 'Messages', 'action' => 'index']) ?>">
            <div class="card mb-4 text-center py-3 red accent-2 white-text">
                <i class="fa fa-envelope fa-3x mb-3"></i>
                <h4 class="h4-responsive"><?= h($message_number) ?> メッセージがあります。</h4>
            </div>
        </a>
        <?php endif; ?>
    </div><!-- /.col-lg-8 -->
</div><!-- /. row -->

<hr>

<div class="row mb-3">
    <div class="col-lg-6 col-md-12 mb-3">
        <a href="<?= $this->Url->build(['controller' => 'DanceVideos', 'action' => 'list']) ?>">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title dark-grey-text"><strong><i class="fa fa-youtube-play yt-ic"></i> ダンス動画</strong></h5>
                    <hr>
                    <p class="card-text">
                        お気に入りダンス動画を共有しましょう。
                    </p>
                    <p class="card-text text-right">
                        <small class="text-muted">マイ ダンス動画へ <i class="fa fa-arrow-circle-right blue-text"></i></small>
                    </p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-6 col-md-12">
        <a href="<?= $this->Url->build(['controller' => 'DanceMusics', 'action' => 'list']) ?>">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title dark-grey-text"><strong><i class="fa fa-music pink-text"></i> ミュージック</strong></h5>
                    <hr>
                    <p class="card-text">
                        ミュージックプレイリストを作成して、良い音楽を共有しましょう。
                    </p>
                    <p class="card-text text-right">
                        <small class="text-muted">マイ ミュージックへ <i class="fa fa-arrow-circle-right blue-text"></i></small>
                    </p>
                </div>
            </div>
        </a>
    </div>
</div><!-- /.row -->
