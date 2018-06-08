<?php $this->assign('title', 'ホーム'); ?>

<div class="row">
    <?php if (AD === 0) : ?>
        <div class="col-lg-12 text-center">
            <section id="dynamicContentWrapper-docsPanel" class="mb-5">
                <div class="card border border-danger z-depth-0" style="height: 200px;">
                    <div class="card-body text-center">
                        <p>
                            <strong>広告枠</strong>
                        </p>
                    </div>
                </div>
            </section>
        </div>
    <?php else : ?>
        <div class="row mb-5">
        </div>
    <?php endif; ?>
</div>

<div class="row">
    <div class="col-lg-12">
        <?= $this->Flash->render() ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-4 col-md-12 mt-4">
        <section class="card card-cascade card-avatar mb-3 mt-5">

            <?php
                if ($dancer->icon) {
                    print $this->Html->image($dancer->icon);
                } else {
                    print $this->Html->image('/img/sample/no_icon.jpg');
                }
            ?>

            <div class="card-body">
                <p>
                    <span class="badge badge-success"><?= h($dancer->pref) ?></span>
                    <span class="badge indigo"><?= h($dancer->genre) ?></span>
                    <spna class="badge purple"><?= h($dancer->user->classification) ?></span>
                </p>
                <h4 class="card-title"><strong><?= h($dancer->name) ?></strong></h4>

                <?php if ($dancer->team_name) : ?>
                <h5 class="dark-grey-text">Team: <strong><?= h($dancer->team_name) ?></strong></h5>
                <?php endif; ?>

                <?php
                    if ($dancer->facebook) {
                        print $this->Html->link('<i class="fa fa-facebook dark-grey-text"></i>', h($dancer->facebook),
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
                    if ($dancer->twitter) {
                        print $this->Html->link('<i class="fa fa-twitter dark-grey-text"></i>', h($dancer->twitter),
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
                    if ($dancer->instagram) {
                        print $this->Html->link('<i class="fa fa-instagram dark-grey-text"></i>', h($dancer->instagram),
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

                <p class="card-text mt-3">
                    <?= h($dancer->self_intro) ?>
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
                        <?= $this->Html->link('メッセージ', ['controller' => 'Messages',    'action' => 'index', $logins['id']], ['class' => 'dropdown-item']) ?>
                        <!--
                        <?= $this->Html->link('チーム',     ['controller' => 'Teams',       'action' => 'list', $logins['id']], ['class' => 'dropdown-item']) ?>
                        -->
                        <?= $this->Html->link('サークル',   ['controller' => 'Circles',     'action' => 'list', $logins['id']], ['class' => 'dropdown-item']) ?>
                        <?= $this->Html->link('イベント',   ['controller' => 'Events',      'action' => 'list', $logins['id']], ['class' => 'dropdown-item']) ?>
                        <?= $this->Html->link('ダンス動画', ['controller' => 'DanceVideos', 'action' => 'list', $logins['id']], ['class' => 'dropdown-item']) ?>
                        <!--
                        <?= $this->Html->link('ダンス音楽', ['controller' => 'DanceMusics', 'action' => 'list', $logins['id']], ['class' => 'dropdown-item']) ?>
                        -->
                    </div>
                </div>
            </div><!-- /.card-body -->
        </section>
    </div><!-- /.col-lg-4 -->

    <div class="col-lg-8 col-md-12">
        <div class="row mb-4">
            <!--
            <div class="col-lg-6 col-md-12">
                <div class="card card-image mb-3" style="background-color: #0d47a1;">
                    <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4 rounded">
                        <div>
                            <h6 class="pink-text">
                                <i class="fa fa-address-card"></i>
                                <strong>Dance Team</strong>
                            </h6>
                            <h3 class="py-3 font-weight-bold">
                                <strong>Dance Team</strong>
                            </h3>
                            <p class="pb-3">
                                あなたのダンスチームを登録しておけば、チームとしてのプロフィール詳細が作成され、
                                今後の活動の可能性が広がります。利用は無料です。是非登録しておきましょう。
                            </p>
                            <?= $this->Html->link('ダンスチーム管理',
                                ['controller' => 'Teams', 'action' => 'list', $logins['id']],
                                ['class' => 'btn btn-pink btn-rounded btn-md']
                            ) ?>
                        </div>
                    </div>
                </div>
            </div>
            -->
            <div class="col-lg-12 col-md-12">
                <div class="card card-image" style="background-color: #0099CC;">
                    <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4 rounded">
                        <div>
                            <h6 class="green-text">
                                <i class="fa fa-group"></i>
                                <strong> Dance Circle</strong>
                            </h6>
                            <h3 class="py-3 font-weight-bold">
                                <strong>Dance Circle</strong>
                            </h3>
                            <p class="pb-3">
                                新しい仲間をお探しですか？それならサークルに参加、もしくはサークルを作成しましょう。
                                全国のダンサー仲間とつながる事が可能です。積極的に利用しましょう。
                            </p>
                            <?= $this->Html->link('ダンスサークル管理',
                                ['controller' => 'Circles', 'action' => 'list', $logins['id']],
                                ['class' => 'btn btn-success btn-rounded btn-md']
                            ) ?>
                        </div>
                    </div>
                </div><!-- /.card -->
            </div><!-- /.col-lg-12 -->
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
                <table class="table no-header mt-1">
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
        <a href="<?= $this->Url->build(['controller' => 'Messages', 'action' => 'index', $logins['id']]) ?>">
            <div class="card mb-4 text-center py-3 red accent-2 white-text">
                <i class="fa fa-envelope fa-3x mb-3"></i>
                <h4 class="h4-responsive"><?= h($message_number) ?> メッセージがあります。</h4>
            </div>
        </a>
        <?php endif; ?>
    </div><!-- /.col-lg-8 -->
</div><!-- /. row -->

<hr class="mb-3">

<div class="row mb-3">
    <div class="col-lg-6 col-md-12 mb-3">
        <a href="<?= $this->Url->build(['controller' => 'Events', 'action' => 'list', $logins['id']]) ?>">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title dark-grey-text"><strong><i class="fa fa-calendar"></i> イベント管理</strong></h5>
                    <hr>
                    <p class="card-text">
                        イベント主催や、出演予定のイベントの登録を行いましょう。
                        イベント一覧に表示され、皆に告知することが可能です。
                        イベント管理では、イベント登録・編集などが行えます。
                    </p>
                    <p class="card-text text-right">
                        <small class="text-muted">イベント管理へ <i class="fa fa-arrow-circle-right blue-text"></i></small>
                    </p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-6 col-md-12 mb-3">
        <a href="<?= $this->Url->build(['controller' => 'DanceVideos', 'action' => 'list', $logins['id']]) ?>">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title dark-grey-text"><strong><i class="fa fa-youtube-play yt-ic"></i> ダンス動画管理</strong></h5>
                    <hr>
                    <p class="card-text">
                        あなたがインスパイアを受けたYoutubeダンス動画を共有しましょう。
                        皆で共有することがこのSNSの目的の一つです。是非協力してください。
                    </p>
                    <p class="card-text text-right">
                        <small class="text-muted">ダンス動画管理へ <i class="fa fa-arrow-circle-right blue-text"></i></small>
                    </p>
                </div>
            </div>
        </a>
    </div>
    <!--
    <div class="col-lg-4 col-md-12">
        <a href="<?= $this->Url->build(['controller' => 'DanceMusics', 'action' => 'list', $logins['id']]) ?>">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title dark-grey-text"><strong><i class="fa fa-music"></i> ダンス音楽管理</strong></h5>
                    <hr>
                    <p class="card-text">
                        良い音楽を知ることは、ダンスのセンスを高めるために欠かせません。
                        音楽がなければダンスは生まれてこなかったのです。あなたの好きな音楽を教えてください。
                    </p>
                    <p class="card-text text-right">
                        <small class="text-muted">ダンス音楽管理へ <i class="fa fa-arrow-circle-right blue-text"></i></small>
                    </p>
                </div>
            </div>
        </a>
    </div>
    -->
</div><!-- /.row -->
