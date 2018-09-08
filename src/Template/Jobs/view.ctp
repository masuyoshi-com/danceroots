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
                            <h3 class="dark-grey-text h3-responsive font-weight-bold"><?= h($job->title) ?></h2>
                        </div>

                        <hr class="mb-0">
                    </div>
                </div>

                <?php if ($job->image) : ?>
                <div class="row mb-3">
                    <div class="col-lg-1">
                    </div>
                    <div class="col-lg-10">
                        <h6 class="grey-text text-right">Job Image</h6>
                        <?= $this->Html->image($job->image, ['class' => 'd-block w-100']) ?>
                    </div>
                    <div class="col-lg-1">
                    </div>
                </div>
                <hr>
                <?php endif; ?>

                <div class="row mt-4">
                    <div class="col-lg-12">
                        <h6 class="dark-gray-text">仕事内容</h6>
                        <hr class="text-left blue mb-3 pb-1 mt-0 ml-0" style="width: 100px;">
                        <div class="md-form mt-0">
                            <?= nl2br(h($job->work_detail)) ?>
                        </div>
                    </div>
                </div>
                <hr class="mdb-form-color">

                <?php if ($job->question) : ?>
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <h6 class="dark-gray-text">応募者への質問</h6>
                            <hr class="text-left pink mb-3 pb-1 mt-0 ml-0" style="width: 100px;">
                            <div class="md-form mt-0">
                                <?= nl2br(h($job->question)) ?>
                            </div>
                        </div>
                    </div>
                    <hr class="mdb-form-color">
                <?php endif; ?>

                <div class="row">
                    <div class="col-lg-4 col-md-12 col-xs-12">
                        <div class="md-form">
                            <?= $this->Form->control('category',
                                [
                                    'class' => 'form-control font-weight-bold',
                                    'value' => h($job->category),
                                    'disabled'
                                ]
                            ) ?>
                            <label>職種</label>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-xs-12">
                        <label class="dark-gray-text w-100 text-left"><small>ジャンル</small></label>
                        <div class="md-form mt-0">
                            <?php
                                if ($job->genre) {
                                    print $this->Form->control('genre', ['class' => 'form-control', 'value' => h($job->genre), 'disabled']);
                                } else {
                                    print $this->Form->control('genre', ['class' => 'form-control', 'value' => 'ジャンルは問わない', 'disabled']);
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-xs-12">
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
                                    'class' => 'form-control font-weight-bold',
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
                                        'class' => 'form-control font-weight-bold',
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
                        <label class="dark-gray-text w-100 text-left"><small>その他</small></label>
                        <div class="md-form mt-0">
                            <?= nl2br(h($job->etc)) ?>
                        </div>
                        <hr class="mdb-form-color">
                    </div>
                </div>
                <?php endif; ?>

                <div class="row mt-4">
                    <div class="col-lg-12">
                        <h6 class="dark-grey-text"><i class="fa fa-subway" aria-hideen="true"></i> アクセス</h6>
                        <hr class="text-left success-color mb-3 pb-1 mt-0 ml-0" style="width: 100px;">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="md-form">
                            <?= $this->Form->control('address',
                                [
                                    'class' => 'form-control',
                                    'value' => h($job->pref . $job->city . $job->address),
                                    'disabled'
                                ]
                            ) ?>
                            <label>所在地</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-12 col-xs-12">
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
                        <div class="d-flex">
                            <h6 class="dark-grey-text"><i class="fa fa-map-marker"></i> GoogleMap</h6>
                            <p class="ml-auto mb-0 blue-text" data-toggle="tooltip" data-placement="bottom" title="ブラウザをリロードしてください。">
                                <small>表示されない場合</small>
                            </p>
                        </div>
                        <div id="map" class="rounded z-depth-1-half map-container" style="height: 300px"></div>
                    </div>
                </div>

                <hr>

                <?php if ($logins['id'] !== $job->user_id) : ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="md-form">
                            <?= $this->Html->link('<i class="fa fa-envelope" aria-hidden="true"></i> この求人を問い合わせる',
                                'javascript:void(0)',
                                [
                                    'class'       => 'btn btn-primary btn-block',
                                    'escape'      => false,
                                    'data-toggle' => 'modal',
                                    'data-target' => '#modalMessageForm'
                                ]
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
                        <?= $this->Html->link('<i class="fa fa-paper-plane-o"></i> メッセージ',
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
    </div><!-- /.col-lg-4 -->
</div><!-- /. row -->
<?= $this->Form->hidden('js_address', ['id' => 'address', 'value' => h($job->pref . $job->city . $job->address)]) ?>
<script>
    initGoogle.initMap();
</script>
