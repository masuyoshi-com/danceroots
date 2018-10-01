<?php $this->assign('title', h($event->event_name) . 'イベント詳細'); ?>

<div class="row mt-5">
</div>

<div class="row">
    <div class="col-lg-8 col-md-12 mb-5">
        <div class="card card-cascade narrower">

            <div class="card-body mb-3">

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <h5>
                            <span class="badge indigo"><?= h($event->pref . ' ' . $event->city) ?> </span>
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
                            <h5 class="text-right mb-0">
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
                <div class="row mb-3">
                    <div class="col-lg-1">
                    </div>
                    <div class="col-lg-10">
                        <h6 class="grey-text text-right">Event Image</h6>
                        <?= $this->Html->image($event->image, ['class' => 'd-block w-100']) ?>
                    </div>
                    <div class="col-lg-1">
                    </div>
                </div>
                <hr>
                <?php endif; ?>

                <div class="row">
                    <div class="col-lg-4 col-md-6 col-xs-12">
                        <div class="md-form">
                            <?= $this->Form->control('event_date', ['class' => 'form-control font-weight-bold', 'value' => h($event->event_date), 'disabled']) ?>
                            <label>開催日</label>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-xs-12">
                        <div class="md-form">
                            <?= $this->form->control('start',
                                [
                                    'class' => 'form-control font-weight-bold',
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
                                    'class' => 'form-control font-weight-bold',
                                    'value' => h($event->end),
                                    'disabled'
                                ]
                            ) ?>
                            <label>End</label>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-12">
                        <h6 class="dark-gray-text">イベント説明</h6>
                        <hr class="text-left blue mb-3 pb-1 mt-0 ml-0" style="width: 100px;">
                        <div class="md-form mt-0">
                            <?= nl2br(h($event->event_detail)) ?>
                        </div>
                    </div>
                </div>
                <hr class="mdb-form-color">

                <?php if ($event->guest) : ?>
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <h6 class="dark-gray-text">ゲスト</h6>
                            <hr class="text-left pink mb-3 pb-1 mt-0 ml-0" style="width: 100px;">
                            <div class="md-form mt-0">
                                <?= nl2br(h($event->guest)) ?>
                            </div>
                        </div>
                    </div>
                    <hr class="mdb-form-color">
                <?php endif; ?>

                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="md-form">
                            <div class="md-form">
                                <?= $this->Form->control('entry', ['class' => 'form-control font-weight-bold', 'value' => h($event->entry), 'disabled']) ?>
                                <label>参加資格</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="md-form">
                            <?= $this->Form->control('entry_fee', ['class' => 'form-control font-weight-bold', 'value' => h($event->entry_fee), 'disabled']) ?>
                            <label>参加費</label>
                        </div>
                    </div>
                </div>

                <?php if ($event->youtube) : ?>
                <div class="row">
                    <div class="col-lg-1">
                    </div>
                    <div class="col-lg-10 mt-3 mb-3">
                        <h6 class="dark-grey-text"><i class="fa fa-youtube-play yt-ic"></i> Event Video</h6>
                        <div class="embed-responsive embed-responsive-16by9 z-depth-1">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= h($event->youtube) ?>?rel=0" style="height: 100%" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-lg-1">
                    </div>
                </div>
                <hr>
                <?php endif; ?>

                <div class="row mt-4">
                    <div class="col-lg-12">
                        <h6 class="dark-grey-text"><i class="fa fa-subway" aria-hideen="true"></i> アクセス</h6>
                        <hr class="text-left success-color mb-3 pb-1 mt-0 ml-0" style="width: 100px;">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <div class="md-form">
                            <?= $this->Form->control('pref', ['class' => 'form-control', 'value' => h($event->pref), 'disabled']) ?>
                            <label>都道府県</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <div class="md-form">
                            <?= $this->Form->control('city', ['class' => 'form-control', 'value' => h($event->city), 'disabled']) ?>
                            <label>市区町村</label>
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
                            <label>開催所在地</label>
                        </div>
                    </div>
                </div>

                <div class="row mt-3 mb-4">
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

                <?php if (isset($logins)) : ?>
                    <?php if ($logins['id'] !== $event->user_id) : ?>
                    <hr>
                    <div class="row">
                        <div class="col-lg-12">
                            <?= $this->Html->link('<i class="fa fa-paper-plane-o"></i> イベントの問い合わせ',
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

                <h4 class="h4-responsive card-title dark-grey-text">
                    <strong>
                        <?= h($event->user->username) ?>
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

<?= $this->Form->hidden('js_address', ['id' => 'address', 'value' => h($event->pref . $event->address)]) ?>
<script>
    initGoogle.initMap();
</script>
