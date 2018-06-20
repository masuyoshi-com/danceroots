<?php $this->assign('title', h($dancer->name) . 'プロフィール'); ?>

<div class="row mb-3">
    <?php if (AD === 0) : ?>
        <div class="col-lg-12 text-center">
            <section id="dynamicContentWrapper-docsPanel" class="mb-3">
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
        <section class="card card-cascade card-avatar mt-5 mb-3">

            <?php
                if ($dancer->icon) {
                    print $this->Html->image($dancer->icon);
                } else {
                    print $this->Html->image('/img/sample/no_icon.jpg');
                }
            ?>

            <div class="card-body">
                <p>
                    <span class="badge badge-success"><?= h($dancer->pref) ?></span>
                    <span class="badge indigo"><?= h($dancer->genre) ?></span>
                    <spna class="badge purple"><?= h($dancer->user->classification) ?></span>
                </p>
                <h4 class="card-title"><strong><?= h($dancer->user->username) ?></strong></h4>
                <?php if ($dancer->team_name) : ?>
                    <h5 class="dark-grey-text">Team: <strong><?= h($dancer->team_name) ?></strong></h5>
                <?php endif; ?>

                <?php if ($dancer->offer_flag === 0) : ?>
                    <h5>
                        <span class="badge cyan">オファー対応できます</span>
                    </h5>
                <?php endif; ?>
                <hr>
                <?php
                    if ($dancer->facebook) {
                        print $this->Html->link('<i class="fa fa-facebook dark-grey-text"></i>', h($dancer->facebook),
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
                    if ($dancer->twitter) {
                        print $this->Html->link('<i class="fa fa-twitter dark-grey-text"></i>', h($dancer->twitter),
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
                    if ($dancer->instagram) {
                        print $this->Html->link('<i class="fa fa-instagram dark-grey-text"></i>', h($dancer->instagram),
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
                    <?= h($dancer->self_intro) ?>
                </p>

                <?php if ($logins['id'] === $dancer->user_id) : ?>
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
                            <?= $this->Html->link('プロフィール編集', ['controller' => 'Dancers',  'action' => 'edit', $logins['id']], ['class' => 'dropdown-item']) ?>
                            <?= $this->Html->link('メッセージ',   ['controller' => 'Messages',    'action' => 'index', $logins['id']], ['class' => 'dropdown-item']) ?>
                            <!--
                            <?= $this->Html->link('チーム',       ['controller' => 'Teams',       'action' => 'list', $logins['id']], ['class' => 'dropdown-item']) ?>
                            -->
                            <?= $this->Html->link('サークル',     ['controller' => 'Circles',     'action' => 'list', $logins['id']], ['class' => 'dropdown-item']) ?>
                            <?= $this->Html->link('イベント',     ['controller' => 'Events',      'action' => 'list', $logins['id']], ['class' => 'dropdown-item']) ?>
                            <?= $this->Html->link('ダンス動画',   ['controller' => 'DanceVideos', 'action' => 'list', $logins['id']], ['class' => 'dropdown-item']) ?>
                            <!--
                            <?= $this->Html->link('ダンス音楽',   ['controller' => 'DanceMusics', 'action' => 'list', $logins['id']], ['class' => 'dropdown-item']) ?>
                            -->
                        </div>
                    </div>
                <?php else : ?>
                    <div>
                        <?= $this->Html->link('<i class="fa fa-paper-plane-o"></i> メッセージ',
                            ['controller' => 'Messages', 'action' => 'add', $dancer->user_id],
                            ['class' => 'btn blue-gradient btn-rounded', 'escape' => false]
                        ) ?>
                    </div>
                <?php endif; ?>

            </div><!-- /.card-body -->
        </section>
    </div><!-- /.col-lg-4 -->

    <div class="col-lg-8 col-md-12">
        <div class="card card-cascade narrower mt-3 mb-3">

            <div class="view gradient-card-header mdb-color lighten-2">
                <h5 class="mb-0 font-bold"><?= h($dancer->user->username) ?> Profile</h5>
            </div>

            <div class="card-body text-center">

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <div class="md-form">
                            <?= $this->Form->control('age',
                                [
                                    'id'    => 'f--age',
                                    'class' => 'form-control',
                                    'value' => h($dancer->age),
                                    'disabled'
                                ]
                            ) ?>
                            <label for="f--age">年齢</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <div class="md-form">
                            <?= $this->Form->control('career',
                                [
                                    'id'    => 'f--career',
                                    'class' => 'form-control',
                                    'value' => h($dancer->career),
                                    'disabled'
                                ]
                            ) ?>
                            <label for="f--age">ダンス年数</label>
                        </div>
                    </div>
                </div><!-- /.row -->

                <div class="row mt-3">
                    <div class="col-lg-12 text-left">
                        <label class="dark-gray-text w-100"><small>経歴</small></label>
                        <div class="md-form mt-0">
                            <?= nl2br(h($dancer->history)) ?>
                        </div>
                        <hr class="mdb-form-color">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 col-xs-12">
                        <div class="md-form">
                            <?= $this->Form->control('practice_place',
                                [
                                    'id'    => 'f--p_place',
                                    'class' => 'form-control',
                                    'value' => h($dancer->practice_place),
                                    'disabled'
                                ]
                            ) ?>
                            <label for="f--p_place">主な練習場所</label>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-xs-12">
                        <div class="md-form">
                            <?= $this->Form->control('favorite_brand',
                                [
                                    'id'    => 'f--f_brand',
                                    'class' => 'form-control',
                                    'value' => h($dancer->favorite_brand),
                                    'disabled'
                                ]
                            ) ?>
                            <label for="f--f_brand">好きなブランド</label>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-xs-12">
                        <div class="md-form">
                            <?= $this->Form->control('url',
                                [
                                    'id'    => 'f--url',
                                    'class' => 'form-control',
                                    'value' => h($dancer->url),
                                    'disabled'
                                ]
                            ) ?>
                            <label for="f--url">サイトURL</label>
                        </div>
                    </div>
                </div><!-- /.row -->

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <div class="md-form">
                            <?= $this->Form->control('respect_dancer',
                                [
                                    'id'    => 'f--r_dancer',
                                    'class' => 'form-control',
                                    'value' => h($dancer->respect_dancer),
                                    'disabled'
                                ]
                            ) ?>
                            <label for="f--r_dancer">リスペクトダンサー</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <div class="md-form">
                            <?= $this->Form->control('favorite_artist',
                                [
                                    'id'    => 'f--f_artist',
                                    'class' => 'form-control',
                                    'value' => h($dancer->favorite_artist),
                                    'disabled'
                                ]
                            ) ?>
                            <label for="f--f_artist">好きなアーティスト</label>
                        </div>
                    </div>
                </div>

                <?php if ($dancer->plan) : ?>
                <div class="row mt-3">
                    <div class="col-lg-12 text-left">
                        <label class="dark-gray-text w-100"><small>PR・今後の予定</small></label>
                        <div class="md-form mt-0">
                            <?= nl2br(h($dancer->plan)) ?>
                        </div>
                        <hr class="mdb-form-color">
                    </div>
                </div>
                <?php endif; ?>

            </div><!-- /.card-body -->
        </div><!-- /.card -->
    </div><!-- /.col-lg-8 -->
</div><!-- /.row -->

<div class="row">
    <div class="col-lg-4 col-md-12">
        <?php if ($dancer->image1 || $dancer->image2 || $dancer->image3) : ?>
        <div class="card card-body mb-5">
            <h6><i class="fa fa-image"></i> Image</h6>
            <hr class="mt-0">
            <div id="mdb-lightbox-ui"></div>
            <div class="mdb-lightbox">
                <figure class="col-lg-4 col-md-12">
                <?php
                    if ($dancer->image1) {
                        print $this->Html->link($this->Html->image($dancer->image1, ['class' => 'img-fluid']),
                            $dancer->image1,
                            ['data-size' => '1200x667', 'escape' => false]
                        );
                    }
                ?>
                </figure>

                <figure class="col-lg-4 col-md-12">
                <?php
                    if ($dancer->image2) {
                        print  $this->Html->link($this->Html->image($dancer->image2, ['class' => 'img-fluid']),
                            $dancer->image2,
                            ['data-size' => '1200x667', 'escape' => false]
                        );
                    }
                ?>
                </figure>

                <figure class="col-lg-4 col-md-12">
                <?php
                    if ($dancer->image3) {
                        print $this->Html->link($this->Html->image($dancer->image3, ['class' => 'img-fluid']),
                            $dancer->image3,
                            ['data-size' => '1200x667', 'escape' => false]
                        );
                    }
                ?>
                </figure>
            </div><!-- /.mdb-lightbox -->
        </div><!-- /.card -->
        <?php endif; ?>
    </div><!-- /.col-lg-4 -->

    <div class="col-lg-8 col-md-12">
        <?php if ($dancer->youtube1) : ?>
        <div class="card card-body mb-3">
            <h6><i class="fa fa-youtube-play yt-ic"></i> Youtube</h6>
            <div class="embed-responsive embed-responsive-16by9 z-depth-1">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= h($dancer->youtube1) ?>?rel=0" style="height: 100%" allowfullscreen></iframe>
            </div>
        </div><!-- /.card -->
        <?php endif; ?>
    </div><!-- /.col-lg-8 -->

</div><!-- /.row -->


<?php if ($dancer->youtube2 || $dancer->youtube3) : ?>
<div class="card card-body mb-3">
    <h6><i class="fa fa-film"></i> Dance Video</h6>
    <div class="row">
        <div class="col-lg-6 col-md-12 mb-3">
            <?php if ($dancer->youtube2) : ?>
                <div class="embed-responsive embed-responsive-16by9 z-depth-1">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= h($dancer->youtube2) ?>?rel=0" style="height: 100%" allowfullscreen></iframe>
                </div>
            <?php else : ?>
                <?= $this->Html->image('/img/sample/no_video.jpg', ['class' => 'img-fluid']) ?>
            <?php endif; ?>
        </div>

        <div class="col-lg-6 col-md-12">
            <?php if ($dancer->youtube3) : ?>
                <div class="embed-responsive embed-responsive-16by9 z-depth-1">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= h($dancer->youtube3) ?>?rel=0" style="height: 100%" allowfullscreen></iframe>
                </div>
            <?php else : ?>
                <?= $this->Html->image('/img/sample/no_video.jpg', ['class' => 'img-fluid']) ?>
            <?php endif; ?>
        </div>
    </div><!-- /.row -->
</div><!-- /.card -->
<?php endif; ?>

<div class="row">
    <div class="col-lg-6 col-md-6 col-xs-12">
        <?php if ($dancer->facebook) : ?>
            <div class="card card-body mb-3">
                <h6><i class="fa fa-facebook fb-ic"></i> Facebook</h6>
                <hr class="mt-0">
                <div class="text-center">
                    <div class="fb-page" data-href="<?= h($dancer->facebook) ?>" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="<?= h($dancer->facebook) ?>" class="fb-xfbml-parse-ignore">
                            <a href="https://www.facebook.com/facebook">Facebook</a>
                        </blockquote>
                    </div>
                </div>
                <hr>
            </div>
        <?php endif; ?>
    </div>
    <div class="col-lg-6 col-md-6 col-xs-12">
        <?php if ($dancer->twitter) : ?>
            <div class="card card-body mb-3">
                <h6><i class="fa fa-twitter tw-ic"></i> Twitter</h6>
                <hr class="m-0">
                <div>
                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    <?= $this->Html->link('', h($dancer->twitter) . '?ref_src=twsrc%5Etfw&height=500', ['class' => 'twitter-timeline']) ?>
                </div>
                <hr>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="card card-body mb-3">
    <div class="row">
        <div class="col-lg-12 text-center">
            <?php
                if ($dancer->user_id === $logins['id']) {
                    print $this->Html->link('<i class="fa fa-pencil" aria-hidden="true"></i> プロフィールを編集',
                        ['action' => 'edit', h($dancer->user_id)],
                        ['class' => 'btn btn-primary btn-block', 'escape' => false]
                    );
                } else {
                    print $this->Html->link('<i class="fa fa-envelope"></i> メッセージを送る',
                        ['controller' => 'Messages', 'action' => 'add', $dancer->user_id],
                        ['class' => 'btn blue-gradient btn-block', 'escape' => false]
                    );
                }
            ?>
        </div>
    </div>
</div>
