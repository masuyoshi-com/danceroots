<?php $this->assign('title', h($circle->name) . ' - サークルホーム'); ?>

<div class="row">
    <div class="col-lg-12">
        <?= $this->Flash->render() ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-9 col-md-12">

        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex">
                    <div>
                        <h6 class="dark-grey-text font-weight-bold">
                            <i class="fa fa-home mr-2" aria-hidden="true"></i><?= h($circle->name) ?></span>
                        </h6>
                    </div>
                    <div class="ml-auto none">
                        <p class="grey-text m-0">
                            <small>サークルホームで各種メニューを選択します。</small>
                        </p>
                    </div>
                </div>
                <hr class="mt-0">
            </div>
        </div><!-- /.row -->

        <!--
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-image mb-3" style="background-image: url(https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20%2814%29.jpg);">
                    <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
                        <div>
                            <h5 class="pink-text"><i class="fa fa-comments" aria-hidden="true"></i> BBS</h5>
                            <h3 class="card-title pt-2"><strong>GroupMessage</strong></h3>
                            <p>
                                サークルメンバーとスレッド形式でメッセージのやり取りができます。一つのスレッドにつき1000までコメントできます。
                                メンバーで疑問・質問の解決や、お知らせ、テーマの議論・雑談などに利用しましょう。
                            </p>

                            <a class="btn btn-pink"><i class="fa fa-clone left"></i> View BBS</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        -->
        <div class="row">
            <div class="col-lg-6 col-md-12 col-xs-12">
                <div class="card card-cascade narrower mb-3">
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
                            <?= $this->Html->link('<i class="fa fa-envelope none"></i> メッセージ',
                                    ['controller' => 'CircleMessages', 'action' => 'index', $circle->id],
                                    ['class' => 'white-text mx-3', 'escape' => false]
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
                            <div class="table-wrapper">
                                <table class="table table-bordered table-hover mt-3">
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
            </div>

            <div class="col-lg-6 col-md-12 col-xs-12">
                <div class="card card-cascade narrower mb-3">

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
                            <?= $this->Html->link('<i class="fa fa-users none"></i> メンバー',
                                    ['controller' => 'CircleGroups', 'action' => 'index', h($circle->id)],
                                    ['class' => 'white-text mx-3', 'escape' => false]
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
                                                            'style' => 'width: 50px; heidht:50px; object-fit: cover;'
                                                        ]
                                                    );
                                                } else {
                                                    print $this->Html->image('/img/sample/no_icon.jpg',
                                                        [
                                                            'class' => 'rounded-circle z-depth-1-half',
                                                            'style' => 'width: 50px; heidht:50px; object-fit: cover;'
                                                        ]
                                                    );
                                                }
                                            ?>
                                        </div>
                                        <?= $this->Html->link($member->user->username, h($member->link), ['target' => '_blank']) ?>

                                        <span class="badge badge-pill <?= getBadgeColor($member->user->classification) ?>">
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
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->

        <div class="card card-body mb-4">
            <h4 class="h4-responsive dark-grey-text font-weight-bold text-center mb-0">
                <?= h($circle->title) ?>
            </h4>
            <hr class="mb-2">
            <?php if ($circle->image) : ?>
                <div class="row">
                    <div class="col-lg-1">
                    </div>
                    <div class="col-lg-10">
                        <h6 class="grey-text text-right">Circle Image</h6>
                        <?= $this->Html->image($circle->image, ['class' => 'd-block w-100']) ?>
                    </div>
                    <div class="col-lg-1">
                    </div>
                </div>
                <hr class="mb-0">
            <?php endif; ?>

            <div class="row mt-4">
                <div class="col-lg-12">
                    <h6 class="dark-grey-text">サークル情報</h6>
                    <hr class="text-left blue mb-3 pb-1 mt-0 ml-0" style="width: 100px;">
                    <div class="md-form mt-0">
                        <?= nl2br(h($circle->circle_detail)) ?>
                    </div>
                </div>
            </div>
            <hr class="mdb-form-color">

            <?php if ($circle->purpose) : ?>
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <h6 class="dark-grey-text">目的</h6>
                        <hr class="text-left pink mb-3 pb-1 mt-0 ml-0" style="width: 100px;">
                        <div class="md-form mt-0">
                            <?= nl2br(h($circle->purpose)) ?>
                        </div>
                    </div>
                </div>
                <hr class="mdb-form-color">
            <?php endif; ?>

            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <label class="dark-grey-text w-100 text-left"><small>ジャンル</small></label>
                    <div class="md-form mt-0">
                        <?php
                            if ($circle->genre) {
                                print h($circle->genre);
                            } else {
                                print 'ジャンルは問わない';
                            }
                        ?>
                    </div>
                    <hr class="mdb-form-color mt-2">
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12 mt-1">
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

            <div class="row mt-4">
                <div class="col-lg-12">
                    <h6 class="dark-grey-text">活動場所など</h6>
                    <hr class="text-left success-color mb-3 pb-1 mt-0 ml-0" style="width: 100px;">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="md-form">
                        <?= $this->Form->control('pref',
                            [
                                'class' => 'form-control',
                                'value' => h($circle->pref),
                                'disabled'
                            ]
                        ) ?>
                        <label>都道府県</label>
                    </div>
                </div>
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
                <div class="col-lg-4 col-md-12">
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
            </div><!-- /.row -->

            <div class="row mb-3">
                <div class="col-lg-12">
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
            </div>
        </div><!-- /.card -->
    </div><!-- /.col-lg-9 -->

    <div class="col-lg-3 col-md-12 mt-4">
        <section class="card card-cascade card-avatar mb-3 mt-5">

            <?php
                if ($circle->owner->icon) {
                    print $this->Html->image($circle->owner->icon, ['class' => 'icon-160']);
                } else {
                    print $this->Html->image('/img/sample/no_icon.jpg', ['class' => 'icon-160']);
                }
            ?>

            <div class="card-body">
                <p>
                    <span class="badge badge-success"><?= h($circle->owner->pref) ?></span>
                    <spna class="badge purple"><?= h($circle->user->classification) ?></span>
                </p>

                <h5 class="card-title dark-grey-text">
                    <small><i class="fa fa-users"></i> サークル代表者</small>
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
