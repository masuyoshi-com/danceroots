<?php $this->assign('title', h($studio->user->username) . ' ホーム'); ?>

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
        <section class="card card-cascade card-avatar mb-3 mt-5">

            <?php
                if ($studio->icon) {
                    print $this->Html->image($studio->icon, ['class' => 'icon-160']);
                } else {
                    print $this->Html->image('/img/sample/noimage.png', ['class' => 'icon-160']);
                }
            ?>

            <div class="card-body">

                <h5 class="mb-4"><?= h($studio->user->username) ?> さんのホーム</h5>

                <p class="dark-grey-text">
                    <span class="badge indigo"><?= h($studio->pref . ' ' . $studio->city) ?></span>
                    <span class="badge badge-success"><?= h($studio->main_genre) ?></span>
                </p>

                <h4 class="card-title mt-4"><strong><?= h($studio->studio_name) ?></strong></h4>

                <h5><small>スタジオ代表者:</small> <?= h($studio->name) ?></h5>

                <?php if ($studio->url) : ?>
                <p class="dark-grey-text">
                    <?= $this->Html->link($studio->url, h($studio->url), ['target' => '_blank']) ?>
                </p>
                <?php endif; ?>

                <?php
                    if ($studio->facebook) {
                        print $this->Html->link('<i class="fa fa-facebook dark-grey-text"></i>', h($studio->facebook),
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
                    if ($studio->twitter) {
                        print $this->Html->link('<i class="fa fa-twitter dark-grey-text"></i>', h($studio->twitter),
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
                    if ($studio->instagram) {
                        print $this->Html->link('<i class="fa fa-instagram dark-grey-text"></i>', h($studio->instagram),
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
                <?php if ($studio->establishment) : ?>
                    <p class="card-text mt-3">
                        設立日: <?= h($studio->establishment) ?>
                    </p>
                <?php endif; ?>
                <hr>

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
                        <?= $this->Html->link('レッスンスケジュール', ['controller' => 'StudioSchedules', 'action' => 'mySchedule'], ['class' => 'dropdown-item']) ?>
                        <?= $this->Html->link('メッセージ',      ['controller' => 'Messages',    'action' => 'index'], ['class' => 'dropdown-item']) ?>
                        <?= $this->Html->link('イベント',        ['controller' => 'Events',      'action' => 'list'], ['class' => 'dropdown-item']) ?>
                        <?= $this->Html->link('サークル',        ['controller' => 'Circles',     'action' => 'list'], ['class' => 'dropdown-item']) ?>
                        <?= $this->Html->link('ダンス関連求人',  ['controller' => 'Jobs',        'action' => 'list'], ['class' => 'dropdown-item']) ?>
                        <?= $this->Html->link('ダンス動画',      ['controller' => 'DanceVideos', 'action' => 'list'], ['class' => 'dropdown-item']) ?>
                        <?= $this->Html->link('ミュージック',    ['controller' => 'DanceMusics', 'action' => 'list'], ['class' => 'dropdown-item']) ?>
                    </div>
                </div>
            </div><!-- /.card-body -->
        </section>
    </div><!-- /.col-lg-4 -->


    <div class="col-lg-8 col-md-12 mt-4">
        <div class="row mb-3">
            <div class="col-lg-6 col-md-12 mb-3">
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
                                イベント主催や、コンテストなど予定の登録を行いましょう。イベント一覧に表示され、皆に告知することが可能です。イベント管理では、イベント登録・編集などが行えます。
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
                <div class="card card-image" style="background-image: url(../img/recruit800×450.jpg);">
                    <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4 rounded">
                        <div>
                            <h6 class="green-text">
                                <i class="fa fa-briefcase"></i>
                                <strong> Recruitment</strong>
                            </h6>
                            <h3 class="py-3 font-weight-bold">
                                <strong>StreetDancer 求人</strong>
                            </h3>
                            <p class="pb-3">
                                ダンサー人材採用を積極的に検討してください。
                                生徒獲得も大切ですが、インストラクターがいなければ始まりません。
                                ダンサーに機会を与えることで、更なる発展につながります。
                            </p>
                            <?= $this->Html->link('ダンサー求人',
                                ['controller' => 'Jobs', 'action' => 'list'],
                                ['class' => 'btn btn-success btn-rounded btn-md']

                            ) ?>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- /.row -->

        <!-- Schedules -->
        <div class="card card-image mb-3" style="background-image: url(https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20%2814%29.jpg);">
            <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
                <div>
                    <h5 class="orange-text"><i class="fa fa-calendar" aria-hidden="true"></i> Schedule</h5>
                    <h3 class="card-title pt-2"><strong>Lesson Schedules</strong></h3>
                    <p>
                        ダンススタジオ・スクールに所属するインストラクターのレッスンスケジュールを管理できます。登録したスケジュールはスタジオプロフィールに表示されます。Dancerootsに登録しているダンサーであればプロフィールリンクも可能です。
                    </p>
                    <?= $this->Html->link('<i class="fa fa-clone left"></i> スケジュール</a>',
                            ['controller' => 'StudioSchedules', 'action' => 'mySchedule'],
                            ['class' => 'btn btn-orange', 'escape' => false]
                    ) ?>
                </div>
            </div>
        </div>

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
                                        'controller' => 'informations',
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
            <div class="card mb-3 text-center py-3 red accent-2 white-text">
                <i class="fa fa-envelope fa-3x mb-3"></i>
                <h4 class="h4-responsive"><?= h($message_number) ?> メッセージがあります。</h4>
            </div>
        </a>
        <?php endif; ?>
    </div><!-- /.col-lg-8 -->
</div><!-- /. row -->

<hr class="mb-3">

<div class="row mb-3">
    <div class="col-lg-4 col-md-6 col-xs-12 mb-3">
        <a href="<?= $this->Url->build(['controller' => 'Circles', 'action' => 'list']) ?>">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title dark-grey-text"><strong><i class="fa fa-users deep-orange-text"></i> サークル</strong></h5>
                    <hr>
                    <p class="card-text">
                        サークルを作成・参加し、グループ活動を始めましょう。
                    </p>
                    <p class="card-text text-right">
                        <small class="text-muted">マイ サークルへ <i class="fa fa-arrow-circle-right blue-text"></i></small>
                    </p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-4 col-md-6 col-xs-12 mb-3">
        <a href="<?= $this->Url->build(['controller' => 'DanceVideos', 'action' => 'list']) ?>">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title dark-grey-text"><strong><i class="fa fa-youtube-play yt-ic"></i> ダンス動画</strong></h5>
                    <hr>
                    <p class="card-text">
                        インスパイアを受けたダンス動画を共有しましょう。
                    </p>
                    <p class="card-text text-right">
                        <small class="text-muted">マイ ダンス動画へ <i class="fa fa-arrow-circle-right blue-text"></i></small>
                    </p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-4 col-md-12 col-xs-12">
        <a href="<?= $this->Url->build(['controller' => 'DanceMusics', 'action' => 'list']) ?>">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title dark-grey-text"><strong><i class="fa fa-music pink-text"></i> ミュージック</strong></h5>
                    <hr>
                    <p class="card-text">
                        ミュージックプレイリストを作成し、皆で共有しましょう。
                    </p>
                    <p class="card-text text-right">
                        <small class="text-muted">マイ ミュージックへ <i class="fa fa-arrow-circle-right blue-text"></i></small>
                    </p>
                </div>
            </div>
        </a>
    </div>
</div><!-- /.row -->
