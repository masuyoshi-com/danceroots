<?php $this->assign('title', h($event->event_name) . '公開イベント詳細'); ?>

<?= $this->element('Modal/event_delete') ?>

<div class="row mt-5">
</div>

<div class="row">
    <div class="col-lg-8 col-md-12 mb-5">
        <div class="card card-cascade narrower">

            <div class="card-body mb-3">

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <h5>
                            <span class="badge indigo"><?= h($event->pref) ?> </span>
                            <span class="badge purple"><?= h($event->category) ?> </span>
                            <?php
                                if ($event->recruit_flag === 0) {
                                    print '<span class="badge badge-success">告知</span>';
                                } else {
                                    print '<span class="badge badge-success">参加者募集中!!</span>';
                                }
                            ?>
                        </h5>
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <?php if (isset($logins)) : ?>
                            <?php if ($logins['id'] === $event->user_id) : ?>
                            <h5 class="text-right">
                                <span class="badge badge-warning">イベント所有者</span>
                            </h5>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <hr>
                        <div class="md-form text-center">
                            <h2 class="h2-responsive"><?= h($event->event_name) ?></h2>
                        </div>
                        <hr>
                    </div>
                </div>

                <?php if ($event->image) : ?>
                <div class="row mt-3 mb-3">
                    <div class="col-lg-12">
                        <?= $this->Html->image($event->image, ['class' => 'd-block w-100']) ?>
                    </div>
                </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-lg-4 col-md-6 col-xs-12">
                        <div class="md-form">
                            <?= $this->Form->control('event_date', ['class' => 'form-control', 'value' => h($event->event_date), 'disabled']) ?>
                            <label>開催日</label>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-xs-12">
                        <div class="md-form">
                            <?= $this->form->control('start',
                                [
                                    'class' => 'form-control',
                                    'value' => h($event->start),
                                    'disabled'
                                ]
                            ) ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="md-form">
                            <?= $this->Form->control('end',
                                [
                                    'class' => 'form-control',
                                    'value' => h($event->end),
                                    'disabled'
                                ]
                            ) ?>
                            <label>End</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="md-form">
                            <?= $this->Form->control('place', ['class' => 'form-control', 'value' => h($event->place), 'disabled']) ?>
                            <label>会場・場所名</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="md-form">
                            <?= $this->Form->control('address',['class' => 'form-control', 'value' => h($event->address), 'disabled']) ?>
                            <label>開催住所</label>
                        </div>
                    </div>
                </div>

                <?php if ($event->youtube) : ?>
                <div class="row">
                    <div class="col-lg-12 mt-3 mb-2">
                        <h6 class="dark-grey-text"><i class="fa fa-youtube-play yt-ic"></i> Event Video</h6>
                        <div class="embed-responsive embed-responsive-16by9 z-depth-1">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= h($event->youtube) ?>?rel=0" style="height: 100%" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="md-form">
                            <div class="md-form">
                                <?= $this->Form->control('entry', ['class' => 'form-control', 'value' => h($event->entry), 'disabled']) ?>
                                <label>参加資格</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="md-form">
                            <?= $this->Form->control('entry_fee', ['class' => 'form-control', 'value' => h($event->entry_fee), 'disabled']) ?>
                            <label>参加費</label>
                        </div>
                    </div>
                </div>

                <?php if ($event->guest) : ?>
                <div class="row mt-3">
                    <div class="col-lg-12 text-left">
                        <label class="dark-gray-text w-100"><small>ゲスト</small></label>
                        <div class="md-form mt-0">
                            <?= nl2br(h($event->guest)) ?>
                        </div>
                        <hr class="mdb-form-color">
                    </div>
                </div>
                <?php endif; ?>

                <div class="row mt-3">
                    <div class="col-lg-12 text-left">
                        <label class="dark-gray-text w-100"><small>イベント説明</small></label>
                        <div class="md-form mt-0">
                            <?= nl2br(h($event->event_detail)) ?>
                        </div>
                        <hr class="mdb-form-color">
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-lg-12">
                        <div class="d-flex">
                            <h6 class="dark-grey-text"><i class="fa fa-map-marker"></i> GoogleMap</h6>
                            <p class="ml-auto mb-0"><small>表示されない場合は <i id="map-refresh" class="fa fa-refresh indigo-text" style="cursor: pointer;"></i></small></p>
                        </div>
                        <div id="map" class="rounded z-depth-1-half map-container" style="height: 300px"></div>
                    </div>
                </div>

                <?php if (isset($logins)) : ?>
                    <?php if ($logins['id'] !== $event->user_id) : ?>
                    <hr>
                    <div class="row">
                        <div class="col-lg-12">
                            <?= $this->Html->link('<i class="fa fa-envelope"></i> イベントの問い合わせ',
                                ['controller' => 'Messages', 'action' => 'add', $event->user_id],
                                ['class' => 'btn btn-primary btn-block', 'escape' => false]
                            ) ?>
                        </div>
                    </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div><!-- /.card-body -->
        </div><!-- /.card -->
    </div><!-- /.col-lg-8 -->

    <div class="col-lg-4 col-md-12">
        <section class="card card-cascade card-avatar mb-4">

            <?php
                if ($event->owner->icon) {
                    print $this->Html->image($event->owner->icon);
                } else {
                    print $this->Html->image('/img/sample/no_icon.jpg');
                }
            ?>

            <div class="card-body">

                <p>
                    <span class="badge indigo"><?= h($event->owner->pref) ?></span>
                    <span class="badge badge-default"><?= h($event->user->classification) ?></span>
                </p>

                <p class="mb-2 dark-grey-text"><small><i class="fa fa-calendar"></i> イベント登録者</small></p>

                <h4 class="h4-responsive card-title">
                    <strong>
                        <?= $this->Html->link(h($event->user->username), $profile_links, ['class' => 'dark-grey-text', 'target' => '_blank']) ?>
                    </strong>
                </h4>

                <?php
                    if ($event->owner->facebook) {
                        print $this->Html->link('<i class="fa fa-facebook dark-grey-text"></i>', h($event->owner->facebook),
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
                    if ($event->owner->twitter) {
                        print $this->Html->link('<i class="fa fa-twitter dark-grey-text"></i>', h($event->owner->twitter),
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
                    if ($event->owner->instagram) {
                        print $this->Html->link('<i class="fa fa-instagram dark-grey-text"></i>', h($event->owner->instagram),
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
                    <?= h($event->intro) ?>
                </p>

                <?php if (isset($logins)) : ?>
                    <?php if ($logins['id'] === $event->user_id) : ?>
                        <div class="md-form">
                            <?= $this->Html->link('<i class="fa fa-calendar"></i> マイイベント ',
                                ['action' => 'list', $event->user_id],
                                ['class'  => 'btn purple-gradient btn-rounded', 'escape' => false]
                            ) ?>
                        </div>
                    <?php else : ?>
                        <div class="md-form">
                            <?= $this->Html->link('<i class="fa fa-paper-plane-o"></i> メッセージ ',
                                ['controller' => 'Messages', 'action' => 'add', $event->user_id],
                                ['class'  => 'btn blue-gradient btn-rounded', 'escape' => false]
                            ) ?>
                        </div>
                    <?php endif; ?>
                <?php else : ?>
                    <div class="md-form">
                        <?= $this->Html->link('ログインしてメッセージ送る',
                            ['controller' => 'Users', 'action' => 'login'],
                            ['class'  => 'btn btn-sm blue-gradient btn-rounded']
                        ) ?>
                    </div>
                <?php endif; ?>
            </div><!-- /.card-body -->
        </section>

        <?php if (AD === 0) : ?>
        <div class="card card-body mb-3">
            <div class="row mt-3">
                <div class="col-lg-12 text-center">
                    <section id="dynamicContentWrapper-docsPanel" class="mb-4">
                        <div class="card border border-danger z-depth-0" style="height: 600px;">
                            <div class="card-body text-center">
                                <p>
                                    <strong>広告枠</strong>
                                </p>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div><!-- /.col-lg-4 -->
</div><!-- /. row -->


<script>
    initGoogle.initMap('<?= h($event->address) ?>');
    $('#map-refresh').click(function(){
        location.reload();
    });
</script>