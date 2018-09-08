<?php $this->assign('title', h($organizer->user->username) . 'プロフィール'); ?>

<?php if (AD === 0) : ?>
<div class="row">
    <div class="col-lg-12 text-center">
        <section id="dynamicContentWrapper-docsPanel" class="mb-2">
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
    <div class="col-lg-8 col-md-12 mb-3">
        <div class="card card-cascade narrower mb-3">
            <div class="card-body">

                <?php if ($organizer->image1 || $organizer->image2 || $organizer->image3) : ?>
                <div class="row">
                    <div class="col-lg-1">
                    </div>
                    <div class="col-lg-10">
                        <h6 class="grey-text text-right">Event Image</h6>
                        <div id="carousel-studio" class="carousel slide carousel-fade" data-ride="carousel">

                            <ol class="carousel-indicators">
                                <li data-target="#carousel-studio" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-studio" data-slide-to="1"></li>
                                <li data-target="#carousel-studio" data-slide-to="2"></li>
                            </ol>

                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active">
                                    <?php
                                        if ($organizer->image1) {
                                            print $this->Html->image($organizer->image1, ['class' => 'd-block w-100']);
                                        } else {
                                            print $this->Html->image('/img/sample/dummy-image.jpg', ['class' => 'd-block w-100']);
                                        }
                                    ?>
                                </div>
                                <div class="carousel-item">
                                    <?php
                                        if ($organizer->image2) {
                                            print $this->Html->image($organizer->image2, ['class' => 'd-block w-100']);
                                        } else {
                                            print $this->Html->image('/img/sample/dummy-image.jpg', ['class' => 'd-block w-100']);
                                        }
                                    ?>
                                </div>
                                <div class="carousel-item">
                                    <?php
                                        if ($organizer->image3) {
                                            print $this->Html->image($organizer->image3, ['class' => 'd-block w-100']);
                                        } else {
                                            print $this->Html->image('/img/sample/dummy-image.jpg', ['class' => 'd-block w-100']);
                                        }
                                    ?>
                                </div>
                            </div>

                            <a class="carousel-control-prev" href="#carousel-studio" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel-studio" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div><!-- /.carouse-studio -->
                    </div><!-- /.col-lg-10 -->
                    <div class="col-lg-1">
                    </div>
                </div><!-- /.row -->

                <hr>
                <?php endif; ?>

                <?php if ($organizer->organaized) : ?>
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <h6 class="dark-grey-text">主催イベント</h6>
                            <hr class="text-left pink mb-3 pb-1 mt-0 ml-0" style="width: 100px;">
                            <div class="md-form mt-0">
                                <?= nl2br(h($organizer->organaized)) ?>
                            </div>
                        </div>
                    </div>
                    <hr class="mdb-form-color">
                <?php endif; ?>

                <div class="row mt-4">
                    <div class="col-lg-12">
                        <h6 class="dark-grey-text">企業紹介・各種イベントコンセプト</h6>
                        <hr class="text-left blue mb-3 pb-1 mt-0 ml-0" style="width: 100px;">
                        <div class="md-form mt-0">
                            <?= nl2br(h($organizer->introduction)) ?>
                        </div>
                    </div>
                </div>
                <hr class="mdb-form-color">

                <?php if ($organizer->plan) : ?>
                    <div class="row mt-4 mb-3">
                        <div class="col-lg-12">
                            <h6 class="dark-grey-text">今後のイベント予定など</h6>
                            <hr class="text-left success-color mb-3 pb-1 mt-0 ml-0" style="width: 100px;">
                            <div class="md-form mt-0">
                                <?= nl2br(h($organizer->plan)) ?>
                            </div>
                        </div>
                    </div>
                    <hr class="mdb-form-color">
                <?php endif; ?>

                <?php if ($organizer->address) : ?>
                    <div class="row mt-4">
                        <div class="col-lg-12 text-left">
                            <label class="dark-grey-text w-100"><small>所在地</small></label>
                            <div class="md-form mt-0">
                                <?= h($organizer->pref . $organizer->city . $organizer->address) ?>
                            </div>
                            <hr class="mdb-form-color">
                        </div>
                    </div>
                <?php endif; ?>
            </div><!-- /.card-body -->
        </div><!-- /.card -->

        <?php if ($organizer->youtube) : ?>
        <div class="card card-body mb-3 elegant-color">
            <div class="row">
                <div class="col-lg-1">
                </div>
                <div class="col-lg-10">
                    <h6 class="white-text"><i class="fa fa-youtube-play yt-ic"></i> Event Video</h6>
                    <div class="embed-responsive embed-responsive-16by9 z-depth-1">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= h($organizer->youtube) ?>?rel=0" style="height: 100%" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-lg-1">
                </div>
            </div>
        </div><!-- /.card -->
        <?php endif; ?>
    </div><!-- /.col-lg-8 -->

    <div class="col-lg-4 col-md-12">
        <section class="card card-cascade card-avatar mb-4">

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
                <h4 class="card-title dark-grey-text font-weight-bold"><?= h($organizer->user->username) ?></h4>

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
                <hr>
                <p class="card-text mt-3">
                    <?= h($organizer->self_intro) ?>
                </p>

                <?php if ($logins['id'] === $organizer->user_id) : ?>
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
                            <?= $this->Html->link('ホーム', $homes, ['class' => 'dropdown-item']) ?>
                            <?= $this->Html->link('プロフィール編集', ['controller' => 'Organizers', 'action' => 'edit'], ['class' => 'dropdown-item']) ?>
                            <?= $this->Html->link('メッセージ',      ['controller' => 'Messages',    'action' => 'index'], ['class' => 'dropdown-item']) ?>
                            <?= $this->Html->link('イベント',        ['controller' => 'Events',      'action' => 'list'], ['class' => 'dropdown-item']) ?>
                            <?= $this->Html->link('サークル',        ['controller' => 'Circles',     'action' => 'list'], ['class' => 'dropdown-item']) ?>
                            <?= $this->Html->link('ダンス関連求人',  ['controller' => 'Jobs',        'action' => 'list'], ['class' => 'dropdown-item']) ?>
                            <?= $this->Html->link('ダンス動画',      ['controller' => 'DanceVideos', 'action' => 'list'], ['class' => 'dropdown-item']) ?>
                            <?= $this->Html->link('ミュージック',    ['controller' => 'DanceMusics', 'action' => 'list'], ['class' => 'dropdown-item']) ?>
                        </div>
                    </div>
                <?php else : ?>
                    <div>
                        <?= $this->Html->link('<i class="fa fa-paper-plane-o" aria-hidden="true"></i> メッセージ',
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

        <?php if ($organizer->facebook) : ?>
            <div class=" card card-body mb-3">
                <div class="row">
                    <div class="col-lg-12">
                        <h6><i class="fa fa-facebook fb-ic"></i> Facebook</h6>
                        <hr>
                        <div class="md-form text-center mt-0 w-100">
                            <div class="fb-page" data-href="<?= h($organizer->facebook) ?>" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                                <blockquote cite="<?= h($organizer->facebook) ?>" class="fb-xfbml-parse-ignore">
                                    <a href="https://www.facebook.com/facebook">Facebook</a>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($organizer->twitter) : ?>
            <div class=" card card-body mb-3">
                <div class="row">
                    <div class="col-lg-12">
                        <h6><i class="fa fa-twitter tw-ic"></i> Twitter</h6>
                        <hr>
                        <div class="md-form mt-0">
                            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                            <?= $this->Html->link('', h($organizer->twitter) . '?ref_src=twsrc%5Etfw&height=550', ['class' => 'twitter-timeline']) ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    </div><!-- /.col-lg-4 -->
</div><!-- /. row -->

<div class="card card-body mb-3">
    <div class="row">
        <div class="col-lg-12">
            <?php
                if ($organizer->user_id === $logins['id']) {
                    print $this->Html->link('<i class="fa fa-pencil"></i> プロフィールを編集',
                        ['action' => 'edit'],
                        ['class'  => 'btn btn-primary btn-block', 'escape' => false]
                    );
                } else {
                    print $this->Html->link('<i class="fa fa-envelope" aria-hidden="true"></i> メッセージを送る',
                        'javascript:void(0)',
                        [
                            'class'       => 'btn blue-gradient btn-block',
                            'escape'      => false,
                            'data-toggle' => 'modal',
                            'data-target' => '#modalMessageForm'
                        ]
                    );
                }
            ?>
        </div>
    </div>
</div>
