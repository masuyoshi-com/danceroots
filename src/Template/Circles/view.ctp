<?php $this->assign('title', h($circle->name) . '詳細'); ?>

<?= $this->element('Modal/circle_delete') ?>

<div class="row">
    <?php if (AD === 0) : ?>
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
    <?php else : ?>
        <div class="row mb-2">
        </div>
    <?php endif; ?>
</div>

<div class="row">
    <div class="col-lg-12">
        <?= $this->Flash->render() ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-8 col-md-12 mb-5">
        <div class="card card-cascade narrower">

            <div class="view gradient-card-header aqua-gradient lighten-3">
                <h5 class="mb-0 font-weight-bold">
                    <small>サークル名: </small>
                    <?= h($circle->name) ?>
                </h5>
            </div>

            <div class="card-body mb-3">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <h5 class="">
                            <?php
                                if ($circle->genre) {
                                    print '<span class="badge ' . getBadgeColor(h($circle->genre)) . '">' . h($circle->genre) . '</span>';
                                } else {
                                    print '<span class="badge badge-primary">ジャンル問わない</span>';
                                }
                            ?>

                            <span class="badge indigo"><?= h($circle->pref) ?> </span>
                            <span class="badge badge-success"><?= h($circle->distinction) ?></span>
                        </h5>
                    </div>

                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <?php if ($logins['id'] === $circle->user_id) : ?>
                        <h5 class="text-right">
                            <span class="badge badge-warning">サークル所有者</span>
                            <?php if ($circle->public_flag === 1) : ?>
                            <span class="badge badge-danger">非公開</span>
                            <?php endif; ?>
                        </h5>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="h4-responsive text-center"><?= h($circle->title) ?></h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 mb-3">
                        <?php if ($circle->image) : ?>
                        <div class="row mt-3 mb-3">
                            <div class="col-lg-12">
                                <h6><i class="fa fa-image"></i> Circle Image</h6>
                                <?= $this->Html->image($circle->image, ['class' => 'd-block w-100']) ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>


                <hr class="mt-0">

                <div class="row">
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

                <?php if ($circle->distinction === 'メンバー募集') : ?>
                    <?php if ($logins['id'] !== $circle->user_id && $join_flag === 0 && $logins['classification'] === 0) : ?>
                        <?= $this->Form->create('', ['url' => ['controller' => 'CircleGroups', 'action' => 'add']]) ?>
                        <?= $this->Form->hidden('circle_id', ['value' => h($circle->id)]) ?>
                        <?= $this->Form->hidden('user_id',   ['value' => $logins['id']]) ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <?= $this->Form->button('<i class="fa fa-plus"></i> このサークルへ参加',
                                    [
                                      'class'   => 'btn btn-primary btn-block',
                                      'escape'  => false,
                                      'confirm' => 'このサークルに参加します。よろしいですか？'
                                    ]
                                ) ?>
                            </div>
                        </div>
                        <?= $this->Form->end() ?>
                    <?php elseif ($logins['id'] === $circle->user_id) : ?>
                        <div class="row">
                            <div class="col-lg-6 mb-2">
                                <?= $this->Html->link('<i class="fa fa-edit"></i> このサークルを編集する',
                                    ['action' => 'edit', h($circle->id)],
                                    ['class' => 'btn btn-success btn-block', 'escape' => false]
                                ) ?>
                            </div>
                            <div class="col-lg-6">
                                <?= $this->Html->link('<i class="fa fa-trash fa-lg" aria-hidden="true"></i> サークル削除', 'javascript:void(0)',
                                    [
                                        'class'       => 'btn btn-danger btn-block',
                                        'escape'      => false,
                                        'data-toggle' => 'modal',
                                        'data-target' => '#modalCircleDeleteForm'
                                    ]
                                ) ?>
                            </div>
                        </div>
                    <?php elseif ($join_flag === 1) : ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <?= $this->Html->link('サークル参加済み。マイサークルへ',
                                    ['controller' => 'Circles', 'action' => 'list', $logins['id']],
                                    ['class' => 'btn btn-default btn-block']
                                ) ?>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php elseif ($join_flag === 1) : ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <?= $this->Html->link('サークル参加済み。マイサークルへ',
                                ['controller' => 'Circles', 'action' => 'list', $logins['id']],
                                ['class' => 'btn btn-default btn-block']
                            ) ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div><!-- /.card-body -->
        </div><!-- /.card -->
    </div><!-- /.col-lg-8 -->


    <div class="col-lg-4 col-md-12 mt-4">
        <section class="card card-cascade card-avatar mb-4 mt-5">

            <?php
                if ($circle->owner->icon) {
                    print $this->Html->image($circle->owner->icon);
                } else {
                    print $this->Html->image('/img/sample/no_icon.jpg');
                }
            ?>

            <div class="card-body">
                <p class="dark-grey-text">
                    <span class="badge indigo"><?= h($circle->owner->pref) ?></span>
                    <span class="badge purple"><?= h($circle->user->classification) ?></span>
                </p>
                <p class="mb-2 dark-grey-text"><small><i class="fa fa-users"></i> サークル代表者</small></p>
                <h4 class="card-title">
                    <strong>
                        <?= $this->Html->link($circle->user->username, $profile_links, ['class' => 'dark-grey-text']) ?>
                    </strong>
                </h4>

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

                <p class="card-text mt-3 mb-2">
                    <?= h($circle->intro) ?>
                </p>

                <?php if ($logins['id'] !== $circle->user_id) : ?>
                <div class="md-form">
                    <?= $this->Html->link('<i class="fa fa-envelope"></i> メッセージ',
                        ['controller' => 'Messages', 'action' => 'add', $circle->user_id],
                        ['class'  => 'btn aqua-gradient btn-rounded', 'escape' => false]
                    ) ?>
                </div>
                <?php else : ?>
                <div class="md-form">
                    <?= $this->Html->link('マイダンスサークル',
                        ['action' => 'list', $circle->user_id],
                        ['class'  => 'btn aqua-gradient btn-rounded', 'escape' => false]
                    ) ?>
                </div>
                <?php endif; ?>

            </div><!-- /.card-body -->
        </section>

        <?php if (count($circle_members) !== 0 ) : ?>
            <div class="card card-cascade mb-5">
                <div class="card-header white-text mdb-color">
                    参加メンバー
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
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
                                                    ]);
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
                                    <?= $this->Html->link($member->user->username, $member->link, ['target' => '_blank']) ?>
                                    <span class="badge badge-primary badge-pill"><?= h($member->user->classification) ?></span>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div><!-- /.col-lg-12 -->
                    </div><!-- /.row -->
                </div><!-- /.card-body -->
            </div><!-- /.card -->
        <?php endif; ?>
    </div><!-- /.col-lg-4 -->
</div><!-- /. row -->
