<?php $this->assign('title', h($circle->name) . ' - サークルホーム'); ?>

<div class="row">
    <div class="col-lg-12">
        <?= $this->Flash->render() ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-9 col-md-12">

        <div class="row mb-4">
            <div class="col-lg-12">
                <h5>
                    <span class="badge badge-primary"><i class="fa fa-home"></i> <?= h($circle->name) ?> HOME </span>
                </h5>
                <h2 class="dark-grey-text font-weight-bold text-center">
                    <?= h($circle->title) ?>
                </h2>
                <hr>
            </div>
        </div>

        <div class="card card-cascade narrower mt-3 mb-4">
            <div class="view gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
                <div>
                    <?= $this->Html->link('<i class="fa fa-list mt-0"></i>',
                            ['controller' => 'CircleMessages', 'action' => 'index', $circle->id],
                            [
                                'class'          => 'btn btn-outline-white btn-rounded btn-sm px-2',
                                'data-toggle'    => 'tooltip',
                                'data-placement' => 'bottom',
                                'title'          => 'メッセージ一覧',
                                'escape'         => false
                            ]
                    ) ?>
                </div>
                <strong>
                    <?= $this->Html->link('メッセージ',
                            ['controller' => 'CircleMessages', 'action' => 'index', $circle->id],
                            ['class' => 'white-text mx-3']
                    ) ?>
                </strong>
                <div>
                    <?= $this->Html->link('<i class="fa fa-pencil mt-0"></i>',
                            ['controller' => 'CircleMessages', 'action' => 'add', $circle->id],
                            [
                                'class'          => 'btn btn-outline-white btn-rounded btn-sm px-2',
                                'data-toggle'    => 'tooltip',
                                'data-placement' => 'bottom',
                                'title'          => 'メッセージ作成',
                                'escape'         => false
                            ]
                    ) ?>
                </div>
            </div><!-- /. gradient-card-header -->

            <div class="px-4">
                <?php if (count($circle_messages) !== 0) : ?>
                    <p class="text-right">
                        <small>最新20件まで</small>
                    </p>
                    <hr>
                    <div class="table-wrapper mt-3 mb-4">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="th-lg" style="width: 30%;">ユーザー名</th>
                                    <th class="th-lg" style="width: 70%;">タイトル</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($circle_messages as $message) : ?>
                                    <tr>
                                        <td><?= h($message->user->username) ?></td>
                                        <td>
                                            <?= $this->Html->link($message->title,
                                                ['controller' => 'CircleMessages', 'action' => 'view', h($message->id)],
                                                [
                                                    'data-toggle'    => 'tooltip',
                                                    'data-placement' => 'bottom',
                                                    'title'          => 'メッセージ詳細',
                                                ]
                                            ) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div><!-- /.table-wrapper -->
                <?php else : ?>
                    <p class="text-center m-4">
                        メッセージはありません。
                    </p>
                <?php endif; ?>
            </div><!-- /.px-4 -->
        </div><!-- /.card -->

        <div class="card card-cascade narrower mt-5 mb-4">

            <div class="view gradient-card-header purple-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
                <div>
                    <?= $this->Html->link('<i class="fa fa-list mt-0"></i>',
                            ['controller' => 'CircleGroups', 'action' => 'index', h($circle->id)],
                            [
                                'class'          => 'btn btn-outline-white btn-rounded btn-sm px-2',
                                'data-toggle'    => 'tooltip',
                                'data-placement' => 'bottom',
                                'title'          => 'メンバーリスト',
                                'escape'         => false
                            ]
                    ) ?>
                </div>
                <strong>
                    <?= $this->Html->link('メンバー',
                            ['controller' => 'CircleGroups', 'action' => 'index', h($circle->id)],
                            ['class' => 'white-text mx-3']
                    ) ?>
                </strong>
                <div>
                    <?= $this->Html->link('<i class="fa fa-list mt-0"></i>',
                            ['controller' => 'CircleGroups', 'action' => 'index', h($circle->id)],
                            [
                                'class'          => 'btn btn-outline-white btn-rounded btn-sm px-2',
                                'data-toggle'    => 'tooltip',
                                'data-placement' => 'bottom',
                                'title'          => 'メンバーリスト',
                                'escape'         => false
                            ]
                    ) ?>
                </div>
            </div><!-- /. gradient-card-header -->

            <div class="px-4 mt-3 mb-4">
                <?php if (count($circle_members) !== 0) : ?>
                    <div class="table-wrapper">
                        <ul class="list-group">
                            <?php foreach ($circle_members as $member) : ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div class="label">
                                    <?php
                                        if ($member->profile->icon) {
                                            print $this->Html->image($member->profile->icon,
                                                [
                                                    'class' => 'rounded-circle z-depth-1-half',
                                                    'style' => 'width: 50px; heidht:50px;'
                                                ]
                                            );
                                        } else {
                                            print $this->Html->image('/img/sample/no_icon.jpg',
                                                [
                                                    'class' => 'rounded-circle z-depth-1-half',
                                                    'style' => 'width: 50px; heidht:50px;'
                                                ]
                                            );
                                        }
                                    ?>
                                </div>
                                <?= $this->Html->link($member->user->username, h($member->link), ['target' => '_blank']) ?>

                                <span class="badge badge-primary badge-pill">
                                    <?= h($member->user->classification) ?>
                                </span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div><!-- /.table-wrapper -->
                <?php else : ?>
                    <p class="text-center">
                        メンバーはいません。
                    </p>
                <?php endif; ?>
            </div><!-- /.px-4 -->
        </div><!-- /.card -->


        <div class="card card-body mb-4">

            <?php if ($circle->image) : ?>
                <div class="text-center">
                    <?= $this->Html->image($circle->image, ['class' => 'img-fluid']) ?>
                </div>
                <hr>
            <?php endif; ?>

            <div class="row mt-3">
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="md-form">
                        <?= $this->Form->control('city',
                            [
                                'class' => 'form-control',
                                'value' => h($circle->city),
                                'disabled'
                            ]
                        ) ?>
                        <label>市区町村</label>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="md-form">
                        <?= $this->Form->control('station',
                            [
                                'class' => 'form-control',
                                'value' => h($circle->station),
                                'disabled'
                            ]
                        ) ?>
                        <label>最寄り駅</label>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="md-form">
                        <?= $this->Form->control('age',
                            [
                                'class' => 'form-control',
                                'value' => h($circle->age),
                                'disabled'
                            ]
                        ) ?>
                        <label>平均年齢</label>
                    </div>
                </div>
            </div><!-- /.row -->

            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="md-form">
                        <?= $this->Form->control('place',
                            [
                                'class' => 'form-control',
                                'value' => h($circle->place),
                                'disabled'
                            ]
                        ) ?>
                        <label>主な集合場所</label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12 mt-1">
                    <label class="dark-gray-text w-100 text-left"><small>ジャンル</small></label>
                    <div class="md-form mt-0">
                        <?php
                            if ($circle->genre) {
                                print h($circle->genre);
                            } else {
                                print 'ジャンルは問わない';
                            }
                        ?>
                    </div>
                    <hr class="mdb-form-color">
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-lg-12">
                    <label class="dark-gray-text w-100 text-left"><small>サークル詳細</small></label>
                    <div class="md-form mt-0">
                        <?= nl2br(h($circle->circle_detail)) ?>
                    </div>
                    <hr class="mdb-form-color">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="md-form">
                        <?= $this->Form->control('conditions',
                            [
                                'class' => 'form-control',
                                'value' => h($circle->conditions),
                                'disabled'
                            ]
                        ) ?>
                        <label>参加条件</label>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-lg-12">
                    <label class="dark-gray-text w-100 text-left"><small>目的</small></label>
                    <div class="md-form mt-0">
                        <?= nl2br(h($circle->purpose)) ?>
                    </div>
                    <hr class="mdb-form-color">
                </div>
            </div>
        </div><!-- /.card -->
    </div><!-- /.col-lg-9 -->

    <div class="col-lg-3 col-md-12 mt-4">
        <section class="card card-cascade card-avatar mb-3 mt-5">

            <?php
                if ($circle->owner->icon) {
                    print $this->Html->image($circle->owner->icon);
                } else {
                    print $this->Html->image('/img/sample/no_icon.jpg');
                }
            ?>

            <div class="card-body">
                <p>
                    <span class="badge badge-success"><?= h($circle->owner->pref) ?></span>
                    <span class="badge indigo"><?= h($circle->owner->genre) ?></span>
                    <spna class="badge purple"><?= h($circle->user->classification) ?></span>
                </p>

                <h5 class="card-title">
                    サークル管理者
                </h5>

                <h4>
                    <strong>
                        <?= $this->Html->link($circle->user->username, $profile_links, ['class' => 'dark-grey-text', 'target' => '_blank']) ?>
                    </strong>
                </h4>

                <?php if ($circle->owner->team_name) : ?>
                <h5 class="dark-grey-text">Team: <strong><?= h($circle->owner->team_name) ?></strong></h5>
                <?php endif; ?>

                <?php
                    if ($circle->owner->facebook) {
                        print $this->Html->link('<i class="fa fa-facebook dark-grey-text"></i>', h($circle->owner->facebook),
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
                    if ($circle->owner->twitter) {
                        print $this->Html->link('<i class="fa fa-twitter dark-grey-text"></i>', h($circle->owner->twitter),
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
                    if ($circle->owner->instagram) {
                        print $this->Html->link('<i class="fa fa-instagram dark-grey-text"></i>', h($circle->owner->instagram),
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
                    <?= h($circle->intro) ?>
                </p>

                <?php if ($circle->user_id === $logins['id']) : ?>
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
                            <?= $this->Html->link('マイサークル',      ['action' => 'list'], ['class' => 'dropdown-item']) ?>
                            <?= $this->Html->link('サークル詳細',      ['action' => 'view', $circle->id], ['class' => 'dropdown-item']) ?>
                            <?= $this->Html->link('サークル編集',      ['action' => 'edit', $circle->id], ['class' => 'dropdown-item']) ?>
                            <?= $this->Html->link('サークルメッセージ', ['controller' => 'CircleMessages', 'action' => 'index', $circle->id], ['class' => 'dropdown-item']) ?>
                            <?= $this->Html->link('メンバーリスト',    ['controller' => 'CircleGroups', 'action' => 'index', $circle->id], ['class' => 'dropdown-item']) ?>
                        </div>
                    </div>
                <?php else : ?>
                    <div>
                        <?= $this->Html->link('<i class="fa fa-paper-plane-o" aria-hidden="true"></i> メッセージ',
                            'javascript:void(0)',
                            [
                                'class'       => 'btn aqua-gradient btn-rounded',
                                'escape'      => false,
                                'data-toggle' => 'modal',
                                'data-target' => '#modalMessageForm'
                            ]
                        ) ?>
                    </div>
                <?php endif; ?>
            </div><!-- /.card-body -->
        </section>

        <?php if (AD === 0) : ?>
            <div class="card card-body">
                <div class="row">
                    <div class="col-lg-12">
                        広告枠
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div><!-- /.col-lg-4 -->
</div><!-- /.row -->
