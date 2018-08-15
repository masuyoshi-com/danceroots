<?php $this->assign('title', $job->title . '求人詳細'); ?>

<?= $this->element('Modal/job_delete') ?>

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

<div class="row">
    <div class="col-lg-8 col-md-12 mb-5">
        <div class="card card-cascade narrower">

            <div class="card-body mb-3">

                <div class="row">
                    <div class="col-lg-12 mb-3">

                        <h5 class="mb-0">
                            <span class="badge <?= getBadgeColor(h($job->category)) ?>"><?= h($job->category) ?></span>
                            <span class="badge indigo"><?= h($job->pref) ?></span>
                            <?php
                                if ($job->public_flag === 0) {
                                    print '<span class="badge badge-success">募集中!!</span>';
                                } else {
                                    print '<span class="badge badge-danger">非公開・募集終了</span>';
                                }
                            ?>
                        </h5>

                        <?php if ($logins['id'] === $job->user_id) : ?>
                        <h5 class="text-right mt-2">
                            <span class="badge badge-warning">求人の所有者</span>
                        </h5>
                        <?php endif; ?>

                        <hr>

                        <div class="md-form text-center">
                            <h2 class="h2-responsive"><?= h($job->title) ?></h2>
                        </div>

                        <hr class="mb-0">
                    </div>
                </div>

                <?php if ($job->image) : ?>
                <div class="row mb-3">
                    <div class="col-lg-1">
                    </div>
                    <div class="col-lg-10">
                        <?= $this->Html->image($job->image, ['class' => 'd-block w-100']) ?>
                    </div>
                    <div class="col-lg-1">
                    </div>
                </div>
                <hr>
                <?php endif; ?>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <div class="md-form">
                            <?= $this->Form->control('city',
                                [
                                    'class' => 'form-control',
                                    'value' => h($job->city),
                                    'disabled'
                                ]
                            ) ?>
                            <label>市区町村</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <div class="md-form">
                            <?= $this->Form->control('station',
                                [
                                    'class' => 'form-control',
                                    'value' => h($job->station),
                                    'disabled'
                                ]
                            ) ?>
                            <label>最寄り駅</label>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-12">
                        <label class="dark-gray-text w-100 text-left"><small>仕事依頼詳細</small></label>
                        <div class="md-form mt-0">
                            <?= nl2br(h($job->work_detail)) ?>
                        </div>
                        <hr class="mdb-form-color">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <label class="dark-gray-text w-100 text-left"><small>ジャンル</small></label>
                        <div class="md-form mt-0">
                            <?php
                                if ($job->genre) {
                                    print h($job->genre);
                                } else {
                                    print 'ジャンルは問わない';
                                }
                            ?>
                        </div>
                        <hr class="mdb-form-color">
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="md-form">
                            <?= $this->Form->control('people',
                                [
                                    'class' => 'form-control',
                                    'value' => h($job->people) . '人',
                                    'disabled'
                                ]
                            ) ?>
                            <label>募集人数</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <div class="md-form">
                            <?= $this->Form->control('working_time',
                                [
                                    'class' => 'form-control',
                                    'value' => h($job->working_time),
                                    'disabled'
                                ]
                            ) ?>
                            <label>週稼働時間</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <div class="md-form">
                            <?= $this->Form->control('compensation',
                                [
                                    'class' => 'form-control',
                                    'value' => h($job->compensation),
                                    'disabled'
                                ]
                            ) ?>
                            <label>報酬形式</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="md-form">
                            <div class="md-form">
                                <?= $this->Form->control('q_required',
                                    [
                                        'class' => 'form-control',
                                        'value' => h($job->q_required),
                                        'disabled'
                                    ]
                                ) ?>
                                <label>応募資格</label>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if ($job->etc) : ?>
                <div class="row mt-2">
                    <div class="col-lg-12">
                        <label class="dark-gray-text w-100 text-left"><small>応募者への質問</small></label>
                        <div class="md-form mt-0">
                            <?= nl2br(h($job->question)) ?>
                        </div>
                        <hr class="mdb-form-color">
                    </div>
                </div>
                <?php endif; ?>

                <?php if ($job->etc) : ?>
                <div class="row mt-2">
                    <div class="col-lg-12">
                        <label class="dark-gray-text w-100 text-left"><small>その他</small></label>
                        <div class="md-form mt-0">
                            <?= nl2br(h($job->etc)) ?>
                        </div>
                        <hr class="mdb-form-color">
                    </div>
                </div>
                <?php endif; ?>

                <?php if ($logins['id'] !== $job->user_id) : ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="md-form">
                            <?= $this->Html->link('<i class="fa fa-envelope"></i> この求人を問い合わせる',
                                ['controller' => 'Messages', 'action' => 'add', $job->user_id],
                                ['class' => 'btn btn-primary btn-block', 'escape' => false]
                            ) ?>
                        </div>
                    </div>
                </div>
                <?php else : ?>

                <div class="row mt-4">
                    <div class="col-lg-6 mb-2">
                        <?= $this->Html->link('<i class="fa fa-edit"></i> 編集',
                            ['action' => 'edit', $job->id],
                            ['class' => 'btn btn-success btn-block', 'escape' => false]
                        ) ?>
                    </div>
                    <div class="col-lg-6">
                        <?= $this->Html->link('<i class="fa fa-trash fa-lg" aria-hidden="true"></i> 削除', 'javascript:void(0)',
                            [
                                'class'       => 'btn btn-danger btn-block',
                                'escape'      => false,
                                'data-toggle' => 'modal',
                                'data-target' => '#modalJobDeleteForm'
                            ]
                        ) ?>
                    </div>
                </div>
                <?php endif; ?>

            </div><!-- /.card-body -->
        </div><!-- /.card -->
    </div><!-- /.col-lg-8 -->


    <div class="col-lg-4 col-md-12">
        <section class="card card-cascade card-avatar mb-4">

            <?php
                if ($job->owner->icon) {
                    print $this->Html->image($job->owner->icon);
                } else {
                    print $this->Html->image('/img/sample/no_icon.jpg');
                }
            ?>

            <div class="card-body">

                <p>
                    <span class="badge indigo"><?= h($job->owner->pref) ?></span>
                    <span class="badge badge-default"><?= h($job->user->classification) ?></span>
                </p>

                <p class="mb-2 dark-grey-text"><small><i class="fa fa-briefcase" aria-hidden="true"></i> Recruiter</small></p>

                <h4 class="card-title">
                    <strong>
                        <?= $this->Html->link(h($job->user->username), $profile_links, ['class' => 'dark-grey-text', 'target' => '_blank']) ?>
                    </strong>
                </h4>

                <?php
                    if ($job->owner->facebook) {
                        print $this->Html->link('<i class="fa fa-facebook dark-grey-text"></i>', h($job->owner->facebook),
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
                    if ($job->owner->twitter) {
                        print $this->Html->link('<i class="fa fa-twitter dark-grey-text"></i>', h($job->owner->twitter),
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
                    if ($job->owner->instagram) {
                        print $this->Html->link('<i class="fa fa-instagram dark-grey-text"></i>', h($job->owner->instagram),
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
                    <?= h($job->owner->self_intro) ?>
                </p>

                <?php if ($logins['id'] === $job->user_id) : ?>
                    <div class="md-form">
                        <?= $this->Html->link('<i class="fa fa-gavel" aria-hidden="true"></i> マイジョブ ',
                            ['action' => 'list', $job->user_id],
                            ['class'  => 'btn blue-gradient btn-rounded', 'escape' => false]
                        ) ?>
                    </div>
                <?php else : ?>
                    <div class="md-form">
                        <?= $this->Html->link('<i class="fa fa-envelope" aria-hidden="true"></i> この求人に関してお問い合わせ ',
                            ['controller' => 'Messages', 'action' => 'add', $job->user_id],
                            ['class'  => 'btn blue-gradient btn-rounded', 'escape' => false]
                        ) ?>
                    </div>
                <?php endif; ?>

            </div><!-- /.card-body -->
        </section>
    </div><!-- /.col-lg-4 -->
</div><!-- /. row -->
