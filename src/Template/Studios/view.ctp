<?php $this->assign('title', h($studio->user->username) . ' プロフィール詳細'); ?>

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

<hr class="none mb-4">

<div class="row">
    <div class="col-lg-4 col-md-12 mt-4">
        <section class="card card-cascade card-avatar mb-3 mt-5">

            <?php
                if ($studio->icon) {
                    print $this->Html->image($studio->icon);
                } else {
                    print $this->Html->image('/img/sample/noimage.png');
                }
            ?>

            <div class="card-body">
                <p class="dark-grey-text">
                    <span class="badge badge-success"><?= h($studio->pref) ?></span>
                    <span class="badge badge-info"><?= h($studio->user->classification) ?></span>
                </p>
                <h5><?= h($studio->user->username) ?></h5>
                <h4 class="card-title"><strong><?= h($studio->studio_name) ?></strong></h4>
                <h5><small>スタジオ代表者:</small> <?= h($studio->name) ?></h5>

                <?php if ($studio->tel) : ?>
                    <p class="dark-grey-text">TEL: <?= h($studio->tel) ?></p>
                <?php endif; ?>

                <?php if ($studio->url) : ?>
                <p class="dark-grey-text">
                    <?= $this->Html->link($studio->url, h($studio->url), ['target' => '_blank']) ?>
                </p>
                <?php endif; ?>

                <?php
                    if ($studio->facebook) {
                        print $this->Html->link('<i class="fa fa-facebook dark-grey-text"></i>', h($studio->facebook),
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
                    if ($studio->twitter) {
                        print $this->Html->link('<i class="fa fa-twitter dark-grey-text"></i>', h($studio->twitter),
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
                    if ($studio->instagram) {
                        print $this->Html->link('<i class="fa fa-instagram dark-grey-text"></i>', h($studio->instagram),
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

                <?php if ($studio->establishment) : ?>
                    <p class="card-text mt-3">
                        設立日: <?= h($studio->establishment) ?>
                    </p>
                <?php endif; ?>
                <hr>
                <p class="card-text mt-3">
                    <?= h($studio->self_intro) ?>
                </p>

                <?php if ($logins['id'] === $studio->user_id) : ?>
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
                            <?= $this->Html->link('プロフィール編集', ['controller' => 'Studios',    'action' => 'edit',  $logins['id']], ['class' => 'dropdown-item']) ?>
                            <?= $this->Html->link('メッセージ',      ['controller' => 'Messages',   'action' => 'index', $logins['id']], ['class' => 'dropdown-item']) ?>
                            <?= $this->Html->link('イベント',        ['controller' => 'Events',     'action' => 'list',  $logins['id']], ['class' => 'dropdown-item']) ?>
                            <?= $this->Html->link('ダンス関連求人',  ['controller' => 'Jobs',        'action' => 'list',  $logins['id']], ['class' => 'dropdown-item']) ?>
                            <?= $this->Html->link('ダンス動画',      ['controller' => 'DanceVideos', 'action' => 'list',  $logins['id']], ['class' => 'dropdown-item']) ?>
                            <?= $this->Html->link('ミュージック',    ['controller' => 'DanceMusics', 'action' => 'list', $logins['id']], ['class' => 'dropdown-item']) ?>
                        </div>
                    </div>
                <?php else : ?>
                    <div>
                        <?= $this->Html->link('<i class="fa fa-paper-plane-o"></i> メッセージ',
                            ['controller' => 'Messages', 'action' => 'add', $studio->user_id],
                            ['class' => 'btn blue-gradient btn-rounded', 'escape' => false]
                        ) ?>
                    </div>
                <?php endif; ?>
            </div><!-- /.card-body -->
        </section>
    </div><!-- /.col-lg-4 -->

    <div class="col-lg-8 col-md-12">
        <div class="card card-cascade narrower">

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <div class="md-form">
                            <?= $this->Form->control('station', ['id' => 'f--station', 'class' => 'form-control', 'value' => h($studio->station), 'disabled']) ?>
                            <label for="f--station">最寄り駅</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="md-form">
                            <?= $this->Form->control('address', ['id' => 'f--address', 'class' => 'form-control', 'value' => h($studio->address), 'disabled']) ?>
                            <label for="f--address">以下住所</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-12 col-xs-12">
                        <div class="md-form">
                            <?= $this->Form->control('bussines_hours', ['id' => 'f--b_hours', 'class' => 'form-control', 'value' => h($studio->bussines_hours), 'disabled']) ?>
                            <label for="f--b_hours">営業時間</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-xs-12">
                        <div class="md-form">
                            <?= $this->Form->control('entry_fee', ['id' => 'f--e_fee', 'class' => 'form-control', 'value' => h($studio->entry_fee), 'disabled']) ?>
                            <label for="f--e_fee">入会費</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="md-form">
                            <?= $this->Form->control('monthly_tax', ['id' => 'f--m_tax', 'class' => 'form-control', 'value' => h($studio->monthly_tax), 'disabled']) ?>
                            <label for="f--m_tax">レッスン料 / 形態</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <label class="dark-gray-text w-100 text-left"><small>体験レッスン</small></label>
                        <div class="md-form mt-0">
                            <?php
                                if ($studio->ex_lesson === 0) {
                                    print $this->Form->control('s--ex_lesson', ['class' => 'form-control', 'value' => 'あり', 'disabled']);
                                } else  {
                                    print $this->Form->control('s--ex_lesson', ['class' => 'form-control', 'value' => 'なし', 'disabled']);
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <div class="md-form">
                            <?= $this->Form->control('instructors', ['id' => 'f--instructors', 'class' => 'form-control', 'value' => h($studio->instructors), 'disabled']) ?>
                            <label for="f--instructors">所属インストラクター数</label>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-12 text-left">
                        <label class="dark-gray-text w-100"><small>スタジオ紹介</small></label>
                        <div class="md-form mt-0">
                            <?= nl2br(h($studio->introduction)) ?>
                        </div>
                        <hr class="mdb-form-color">
                    </div>
                </div>

            </div><!-- /.card-body -->
        </div><!-- /.card -->
    </div><!-- /.col-lg-8 -->

    <div class="col-lg-12 mt-3 mb-3">

        <?php if ($studio->image1 || $studio->image2 || $studio->image3) : ?>

        <div class="card card-body">
            <div class="row">
                <div class="col-lg-1">

                </div>
                <div class="col-lg-10">
                    <h6><i class="fa fa-image"></i> Studio Image</h6>

                    <div id="carousel-studio" class="carousel slide carousel-fade" data-ride="carousel">

                        <ol class="carousel-indicators">
                            <li data-target="#carousel-studio" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-studio" data-slide-to="1"></li>
                            <li data-target="#carousel-studio" data-slide-to="2"></li>
                        </ol>

                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <?php
                                    if ($studio->image1) {
                                        print $this->Html->image($studio->image1, ['class' => 'd-block w-100']);
                                    } else {
                                        print $this->Html->image('/img/sample/dummy-image.jpg', ['class' => 'd-block w-100']);
                                    }
                                ?>

                            </div>
                            <div class="carousel-item">
                                <?php
                                    if ($studio->image2) {
                                        print $this->Html->image($studio->image2, ['class' => 'd-block w-100']);
                                    } else {
                                        print $this->Html->image('/img/sample/dummy-image.jpg', ['class' => 'd-block w-100']);
                                    }
                                ?>
                            </div>
                            <div class="carousel-item">
                                <?php
                                    if ($studio->image3) {
                                        print $this->Html->image($studio->image3, ['class' => 'd-block w-100']);
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

                </div>
                <div class="col-lg-1">
                </div>
            </div><!-- /.row -->
        </div><!-- /.card -->
        <?php endif; ?>
    </div>
</div><!-- /. row -->

<div class="card card-body mb-3">
    <div class="row">
        <div class="col-lg-6 col-md-12 mb-3">
            <h6><i class="fa fa-youtube-play yt-ic"></i> Studio Video</h6>
            <?php if ($studio->youtube) : ?>
                <div class="embed-responsive embed-responsive-16by9 z-depth-1">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= h($studio->youtube) ?>?rel=0" style="height: 100%" allowfullscreen></iframe>
                </div>
            <?php else : ?>
                <?= $this->Html->image('/img/sample/no_video.jpg', ['class' => 'img-fluid']) ?>
            <?php endif; ?>
        </div>

        <div class="col-lg-6 col-md-12">
            <h6><i class="fa fa-map-marker"></i> MAP</h6>
            <!--Google map-->
            <div id="map" class="rounded z-depth-1 map-container" style="height: 375px"></div>
        </div>
    </div>
</div><!-- /.card -->

<div class="row">
    <div class="col-lg-6 col-md-6 col-xs-12">
        <?php if ($studio->facebook) : ?>
            <div class="card card-body mb-3">
                <h6><i class="fa fa-facebook fb-ic"></i> Facebook</h6>
                <hr class="mt-0">
                <div class="text-center">
                    <div class="fb-page" data-href="<?= h($studio->facebook) ?>" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="<?= h($studio->facebook) ?>" class="fb-xfbml-parse-ignore">
                            <a href="https://www.facebook.com/facebook">Facebook</a>
                        </blockquote>
                    </div>
                </div>
                <hr>
            </div>
        <?php endif; ?>
    </div>
    <div class="col-lg-6 col-md-6 col-xs-12">
        <?php if ($studio->twitter) : ?>
            <div class="card card-body mb-3">
                <h6><i class="fa fa-twitter tw-ic"></i> Twitter</h6>
                <hr class="m-0">
                <div>
                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    <?= $this->Html->link('', h($studio->twitter) . '?ref_src=twsrc%5Etfw&height=500', ['class' => 'twitter-timeline']) ?>
                </div>
                <hr>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="card card-body mb-3">
    <div class="row">
        <div class="col-lg-12">
            <?php
                if ($studio->user_id === $logins['id']) {
                    print $this->Html->link('<i class="fa fa-pencil" aria-hidden="true"></i> プロフィールを編集',
                        ['action' => 'edit', $studio->user_id],
                        ['class' => 'btn btn-primary btn-block', 'escape' => false]
                    );
                } else {
                    print $this->Html->link('<i class="fa fa-envelope"></i> このスタジオに問い合わせる',
                        ['controller' => 'Messages', 'action' => 'add', $studio->user_id],
                        ['class' => 'btn blue-gradient btn-block', 'escape' => false]
                    );
                }
            ?>
        </div>
    </div>
</div>

<script>
    initGoogle.initMap('<?= $studio->address ?>');
</script>
