<?php $this->assign('title', h($organizer->name) . ' ホーム'); ?>

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
        <div class="row mb-4">
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
        <section class="card card-cascade card-avatar mb-4 mt-5">

            <?php
                if ($organizer->icon) {
                    print $this->Html->image($organizer->icon);
                } else {
                    print $this->Html->image('/img/sample/no_icon.jpg');
                }
            ?>

            <div class="card-body">

                <p class="dark-grey-text">
                    <span class="badge badge-secondary"><?= h($organizer->pref) ?></span>
                    <span class="badge badge-default"><?= h($organizer->user->classification) ?></span>
                </p>
                <h4 class="card-title"><strong><?= h($organizer->user->username) ?></strong></h4>

                <?php if ($organizer->city) : ?>
                <p class="dark-grey-text"><?= h($organizer->city) ?></p>
                <?php endif; ?>

                <?php if ($organizer->company) : ?>
                <p class="dark-grey-text"><strong><?= h($organizer->company) ?></strong></p>
                <?php endif; ?>

                <?php if ($organizer->url) : ?>
                <p class="dark-grey-text">
                    <?= $this->Html->link($organizer->url, h($organizer->url), ['target' => '_blank']) ?>
                </p>
                <?php endif; ?>

                <?php
                    if ($organizer->facebook) {
                        print $this->Html->link('<i class="fa fa-facebook dark-grey-text"></i>', h($organizer->facebook),
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
                    if ($organizer->twitter) {
                        print $this->Html->link('<i class="fa fa-twitter dark-grey-text"></i>', h($organizer->twitter),
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
                    if ($organizer->instagram) {
                        print $this->Html->link('<i class="fa fa-instagram dark-grey-text"></i>', h($organizer->instagram),
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
                    <?= h($organizer->self_intro) ?>
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
                        <?= $this->Html->link('マイプロフィール', ['controller' => 'Organizers', 'action' => 'view',  $logins['id']], ['class' => 'dropdown-item']) ?>
                        <?= $this->Html->link('メッセージ',      ['controller' => 'Messages',    'action' => 'index', $logins['id']], ['class' => 'dropdown-item']) ?>
                        <?= $this->Html->link('イベント',        ['controller' => 'Events',      'action' => 'list',  $logins['id']], ['class' => 'dropdown-item']) ?>
                        <?= $this->Html->link('ダンス関連求人',  ['controller' => 'Jobs',        'action' => 'list',  $logins['id']], ['class' => 'dropdown-item']) ?>
                        <?= $this->Html->link('ダンス動画',      ['controller' => 'DanceVideos', 'action' => 'list',  $logins['id']], ['class' => 'dropdown-item']) ?>
                        <!--
                        <?= $this->Html->link('ダンス音楽',      ['controller' => 'DanceMusics', 'action' => 'list',  $logins['id']], ['class' => 'dropdown-item']) ?>
                          -->
                    </div>
                </div>
            </div><!-- /.card-body -->
        </section>
    </div><!-- /.col-lg-4 -->

    <div class="col-lg-8 col-md-12">

        <div class="card card-image mb-3" style="background-color: #0d47a1;">
            <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4 rounded">
                <div>
                    <h6 class="pink-text">
                        <i class="fa fa-calendar-plus-o"></i>
                        <strong>Event</strong>
                    </h6>
                    <h3 class="py-3 font-weight-bold">
                        <strong>Event 管理</strong>
                    </h3>
                    <p class="pb-3">
                        イベント主催や、コンテストなど予定のイベントの登録を行いましょう。
                        イベント一覧に表示され、効率的に告知することが可能です。
                        イベント管理では、イベント登録・編集などが行えます。
                    </p>
                    <?= $this->Html->link('イベント管理',
                        ['controller' => 'Events', 'action' => 'list', $logins['id']],
                        ['class' => 'btn btn-pink btn-rounded btn-md']
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
    <div class="col-lg-12 col-md-12 mb-3">
        <a href="<?= $this->Url->build(['controller' => 'DanceVideos', 'action' => 'list', $logins['id']]) ?>">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title dark-grey-text"><strong><i class="fa fa-youtube-play yt-ic"></i> ダンス動画管理</strong></h5>
                    <hr>
                    <p class="card-text">
                        過去に開催したイベント動画や、ダンス動画を共有してください。
                        イベント動画を通して、あなたの開催するイベントに人が集まりやすくなります。
                    </p>
                    <p class="card-text text-right">
                        <small class="text-muted">ダンス動画管理へ <i class="fa fa-arrow-circle-right blue-text"></i></small>
                    </p>
                </div>
            </div>
        </a>
    </div>
    <!--
    <div class="col-lg-6 col-md-12">
        <a href="<?= $this->Url->build(['controller' => 'DanceMusics', 'action' => 'list', $logins['id']]) ?>">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title dark-grey-text"><strong><i class="fa fa-music"></i> ダンス音楽管理</strong></h5>
                    <hr>
                    <p class="card-text">
                        良い音楽を皆で共有することでたくさんの人に良い影響を与えます。
                        ぜひ、あなたの好きな音楽を教えてください。
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
