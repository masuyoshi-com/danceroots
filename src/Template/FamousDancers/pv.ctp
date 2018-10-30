<?php $this->assign('title', h($famousDancer->name) . ' - 有名ダンサープロフィール'); ?>

<div class="view jarallax" data-jarallax='{"speed": 0.2}' style="background-image: url('../<?= h($famousDancer->image) ?>'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
    <div class="mask rgba-black-slight">
        <div class="container h-100 d-flex justify-content-start align-items-center">
            <div class="row smooth-scroll">
                <div class="col-lg-12">
                    <div class="wow fadeInUp">
                        <h1 class="display-3 font-weight-bold mb-3"><?= h($famousDancer->name) ?></h1>

                        <?php if ($famousDancer->team_name) : ?>
                            <h4 class="dark-grey-text text-uppercase font-weight-bold">
                                <small>Team:</small>
                                <?php
                                    if ($team_user) {
                                        print $this->Html->link(h($famousDancer->team_name), ['controller' => 'famousTeams', 'action' => 'pv', $team_user->username], ['target' => '_blank']);
                                    } else {
                                        print h($famousDancer->team_name);
                                    }
                                ?>
                            </h4>
                        <?php endif; ?>

                        <h5 class="dark-grey-text text-uppercase font-weight-bold"><small>Genre:</small> <?= h($famousDancer->genre) ?></h5>
                        <p>
                            <a href="#profile" class="btn btn-outline-black wow fadeIn waves-effect waves-light animated" data-wow-delay="0.4s">PROFILE</a>
                            <?= $this->Html->link('BACK', ['controller' => 'FamousDancers', 'action' => 'public'],
                                ['class' => 'btn btn-outline-warning wow fadeIn waves-effect waves-light animated', 'data-wow-delay' => '0.4s']
                            ) ?>
                        </p>
                    </div>
                </div><!-- /.col-lg-12-->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.mask -->
</div><!-- /.view -->

<main>
    <div class="container-fluid" style="background-color: #323438;">
        <div id="profile" class="container pt-3">
            <section class="section pt-2 pb-5 white-text">

                <h2 class="text-center text-uppercase font-weight-bold mt-5 mb-0 wow fadeIn" data-wow-delay="0.2s">Profile</h2>
                <p class="text-center font-weight-bold mt-0 wow fadeIn" data-wow-delay="0.2s"><small>プロフィール</small></p>

                <div class="row mt-5 mb-5">
                    <div class="col-lg-12 wow fadeIn" data-wow-delay="0.4s">
                        <p class="mb-4" align="justify">
                            <?= nl2br(h($famousDancer->profile)) ?>
                        </p>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
            </section><!-- /.section -->
        </div><!-- /.container -->
    </div><!-- /.container-fluid -->

    <?php if ($famousDancer->iv_trigger || $famousDancer->iv_inspire || $famousDancer->iv_dancer || $famousDancer->iv_instructor || $famousDancer->iv_advice) : ?>
        <div class="container">
            <section class="section team-section">

                <h2 class="text-center text-uppercase font-weight-bold mt-5 pt-4 mb-0 wow fadeIn" data-wow-delay="0.2s">Interview</h2>
                <p class="text-center text-uppercase font-weight-bold mt-0 mb-5 wow fadeIn" data-wow-delay="0.2s"><small>インタビュー</small></p>

                <div class="row wow fadeIn mb-4" data-wow-delay="0.4s">
                    <div class="col-lg-12 col-md-12 text-center wow fadeIn" data-wow-delay="0.4s">

                        <?php if ($famousDancer->iv_trigger) : ?>
                            <h5 class="dark-grey-text font-weight-bold">ダンスを始めたキッカケ</h5>
                            <hr class="grey mb-4 pb-0 mt-0 d-inline-block mx-auto" style="width: 100px;">
                            <p class="text-center mb-5" align="justify">
                                <?= nl2br(h($famousDancer->iv_trigger)) ?>
                            </p>
                        <?php endif; ?>

                        <?php if ($famousDancer->iv_inspire) : ?>
                            <h5 class="dark-grey-text font-weight-bold">インスパイアを受けたもの</h5>
                            <hr class="grey mb-4 pb-0 mt-0 d-inline-block mx-auto" style="width: 100px;">
                            <p class="text-center mb-5" align="justify">
                                <?= nl2br(h($famousDancer->iv_inspire)) ?>
                            </p>
                        <?php endif; ?>

                        <?php if ($famousDancer->iv_dancer) : ?>
                            <h5 class="dark-grey-text font-weight-bold">ダンサーとして大切にしていること</h5>
                            <hr class="grey mb-4 pb-0 mt-0 d-inline-block mx-auto" style="width: 100px;">
                            <p class="text-center mb-5" align="justify">
                                <?= nl2br(h($famousDancer->iv_dancer)) ?>
                            </p>
                        <?php endif; ?>

                        <?php if ($famousDancer->iv_instructor) : ?>
                            <h5 class="dark-grey-text font-weight-bold">インストラクターとして心掛けていること</h5>
                            <hr class="grey mb-4 pb-0 mt-0 d-inline-block mx-auto" style="width: 100px;">
                            <p class="text-center mb-5" align="justify">
                                <?= nl2br(h($famousDancer->iv_instructor)) ?>
                            </p>
                        <?php endif; ?>

                        <?php if ($famousDancer->iv_advice) : ?>
                            <h5 class="dark-grey-text font-weight-bold">これからのダンサーへアドバイス</h5>
                            <hr class="grey mb-4 pb-0 mt-0 d-inline-block mx-auto" style="width: 100px;">
                            <p class="text-center mb-5" align="justify">
                                <?= nl2br(h($famousDancer->iv_advice)) ?>
                            </p>
                        <?php endif; ?>

                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
            </section>
        </div><!-- /.container -->
    <?php endif; ?>

    <?php if ($famousDancer->youtube1 || $famousDancer->youtube2 || $famousDancer->youtube3) : ?>
        <div class="container-fluid mb-5 wow fadeIn elegant-color" data-wow-delay="0.2s">
            <div class="container mb-3 pt-1 pb-3">
                <h2 class="section-heading text-center mt-5 mb-5 pt-4 font-weight-bold wow fadeIn white-text">ShowCase</h2>
                <div class="row">

                    <?php if ($famousDancer->youtube1) : ?>
                    <div class="modal fade m--youtube" id="m--youtube0" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-body black pt-4 pb-4">
                                    <div class="d-flex">
                                        <div class="p-0">
                                            <h6 class="white-text m-3"><i class="fa fa-youtube-play yt-ic"></i> YouTube</h6>
                                        </div>
                                        <div class="ml-auto pt-3 pr-2">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span class="white-text" aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= h($famousDancer->youtube1) ?>?rel=0" allowfullscreen></iframe>
                                    </div>
                                </div><!-- /.modal-body -->
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->

                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-3">
                        <div class="d-flex justify-content-center zoom" style="cursor: pointer;">
                            <?= $this->Html->image('https://img.youtube.com/vi/' . h($famousDancer->youtube1) . '/mqdefault.jpg',
                                [
                                    'class'       => 'img-fluid',
                                    'data-toggle' => 'modal',
                                    'data-target' => '#m--youtube0'
                                ]
                            ) ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if ($famousDancer->youtube2) : ?>
                    <div class="modal fade m--youtube" id="m--youtube1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-body black pt-4 pb-4">
                                    <div class="d-flex">
                                        <div class="p-0">
                                                <h6 class="white-text m-3"><i class="fa fa-youtube-play yt-ic"></i> YouTube</h6>
                                        </div>
                                        <div class="ml-auto pt-3 pr-2">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span class="white-text" aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= h($famousDancer->youtube2) ?>?rel=0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-3">
                        <div class="d-flex justify-content-center zoom" style="cursor: pointer;">
                            <?= $this->Html->image('https://img.youtube.com/vi/' . h($famousDancer->youtube2) . '/mqdefault.jpg',
                                [
                                    'class'       => 'img-fluid',
                                    'data-toggle' => 'modal',
                                    'data-target' => '#m--youtube1'
                                ]
                            ) ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if ($famousDancer->youtube3) : ?>
                    <div class="modal fade m--youtube" id="m--youtube2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-body black pt-4 pb-4">
                                    <div class="d-flex">
                                        <div class="p-0">
                                            <h6 class="white-text m-3"><i class="fa fa-youtube-play yt-ic"></i> YouTube</h6>
                                        </div>
                                        <div class="ml-auto pt-3 pr-2">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span class="white-text" aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= h($famousDancer->youtube3) ?>?rel=0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-3">
                        <div class="d-flex justify-content-center zoom" style="cursor: pointer;">
                            <?= $this->Html->image('https://img.youtube.com/vi/' . h($famousDancer->youtube3) . '/mqdefault.jpg',
                                [
                                    'class'       => 'img-fluid',
                                    'data-toggle' => 'modal',
                                    'data-target' => '#m--youtube2'
                                ]
                            ) ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <!--
                    <div class="col-lg-12">
                        <p class="text-right m-0 pb-3">
                            <small><a class="white-text" href="javascript:void(0)">さらに見る<i class="fa fa-angle-right ml-2" aria-hidden="true"></i></a></small>
                        </p>
                    </div>
                    -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.container-fluid -->
    <?php endif; ?>

    <?php if (
        $famousDancer->sche_sun || $famousDancer->sche_mon || $famousDancer->sche_tue || $famousDancer->sche_wed ||
        $famousDancer->sche_thu || $famousDancer->sche_fri || $famousDancer->sche_sat
    ) : ?>
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-12">
                <section>

                    <h2 class="section-heading text-center mb-0 mt-4 font-weight-bold wow fadeIn">Studio / School</h2>
                    <p class="text-center text-uppercase font-weight-bold mt-0 mb-5 wow fadeIn" data-wow-delay="0.2s"><small>スタジオ・スクール</small></p>

                    <div class="row mb-5 wow fadeIn" data-wow-delay="0.2s">
                        <div class="col-lg-12">
                            <ul class="nav md-pills nav-justified pills-pink">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#sunday" role="tab">日</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#monday" role="tab">月</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tuesday" role="tab">火</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#wednesday" role="tab">水</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#thursday" role="tab">木</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#friday" role="tab">金</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#saturday" role="tab">土</a>
                                </li>
                            </ul>
                            <div class="tab-content text-center pt-0">
                                <div class="tab-pane fade in show active" id="sunday" role="tabpanel">
                                    <br>
                                    <p class="mt-3">
                                        <?= nl2br(h($famousDancer->sche_sun)) ?>
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="monday" role="tabpanel">
                                    <br>
                                    <p class="mt-3">
                                        <?= nl2br(h($famousDancer->sche_mon)) ?>
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="tuesday" role="tabpanel">
                                    <br>
                                    <p class="mt-3">
                                        <?= nl2br(h($famousDancer->sche_tue)) ?>
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="wednesday" role="tabpanel">
                                    <br>
                                    <p class="mt-3">
                                        <?= nl2br(h($famousDancer->sche_wed)) ?>
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="thursday" role="tabpanel">
                                    <br>
                                    <p class="mt-3">
                                        <?= nl2br(h($famousDancer->sche_thu)) ?>
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="friday" role="tabpanel">
                                    <br>
                                    <p class="mt-3">
                                        <?= nl2br(h($famousDancer->sche_fri)) ?>
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="saturday" role="tabpanel">
                                    <br>
                                    <p class="mt-3">
                                        <?= nl2br(h($famousDancer->sche_sat)) ?>
                                    </p>
                                </div>
                            </div><!-- /.tab-content -->
                        </div><!-- /.col-lg-12 -->
                    </div><!-- /.First row -->
                </section>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
    <?php endif; ?>

    <?php if (count($events) !== 0) : ?>
        <div id="event" class="container-fluid mb-4 grey lighten-3">
            <div class="container mb-3 pt-1">
                <section>

                    <h2 class="section-heading text-center mb-0 pt-5 mt-4 font-weight-bold wow fadeIn">Event</h2>
                    <p class="text-center font-weight-bold mt-0 mb-5 wow fadeIn" data-wow-delay="0.2s"><small>イベント</small></p>

                    <div class="row wow fadeIn" data-wow-delay="0.2s">
                        <?php $i = 0; foreach ($events as $event) : ?>
                            <div class="modal fade event" id="event<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body pt-4 pb-4">

                                            <div class="d-flex">
                                                <div class="p-0">
                                                    <h6 class="font-weight-bold m-3">
                                                        Event Information
                                                    </h6>
                                                </div>
                                                <div class="ml-auto pt-3 pr-2">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <hr class="mt-0">
                                            <div class="row">
                                                <div class="col-lg-5 text-center">
                                                    <h3>
                                                        <?php
                                                            if ($event->image) {
                                                                print $this->Html->image($event->image, ['class' => 'img-fluid']);
                                                            } else {
                                                                print $this->Html->image('/img/sample/noimage-600x360.jpg', ['class' => 'img-fluid']);
                                                            }
                                                        ?>
                                                    </h3>
                                                </div>
                                                <div class="col-lg-7 text-center">
                                                    <p class="text-left mb-0">
                                                        <span class="badge <?= getBadgeColor($event->category) ?>"><?= h($event->category) ?></span>
                                                    </p>
                                                    <h3 class="h3-responsive product-name mt-2 dark-grey-text font-weight-bold">
                                                        <strong><?= h($event->title) ?></strong>
                                                    </h3>
                                                    <hr>
                                                    <h6 class="h6-responsive font-weight-bold">
                                                        <i class="fa fa-clock-o" aria-hidden="true"></i> <?= h($event->event_date) ?>
                                                    </h6>
                                                    <p class="font-weight-bold">
                                                        START: <?= h($event->start) ?> ～ END: <?= h($event->end) ?>
                                                    </p>

                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <p class="dark-grey-text">
                                                                <?= nl2br(h($event->body)) ?>
                                                            </p>
                                                        </div>
                                                    </div><!-- /.row -->
                                                    <!--Footer-->
                                                    <div class="modal-footer justify-content-center">
                                                        <!--
                                                        <a type="button" class="btn-floating btn-sm btn-fb">
                                                            <i class="fa fa-facebook"></i>
                                                        </a>
                                                        <a type="button" class="btn-floating btn-sm btn-tw">
                                                            <i class="fa fa-twitter"></i>
                                                        </a>
                                                        <a type="button" class="btn-floating btn-sm btn-pink">
                                                            <i class="fa fa-instagram"></i>
                                                        </a>
                                                        -->
                                                        <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">
                                                            <i class="fa fa-close mr-1" aria-hidden="true"></i><span class="none">Close</span>
                                                        </button>
                                                    </div>
                                                </div><!-- /.col-lg-7 -->
                                            </div><!-- /.row -->
                                        </div><!-- /.modal-body -->
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->

                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-3">
                                <div class="card">
                                    <div class="view overlay">
                                        <?php
                                            if ($event->image) {
                                                print $this->Html->image($event->image, ['class' => 'card-img-top', 'alt' => 'Card image cap']);
                                            } else {
                                                print $this->Html->image('/img/sample/noimage-600x360.jpg', ['class' => 'card-img-top', 'alt' => 'Card image cap']);
                                            }
                                        ?>
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>

                                    <?= $this->Html->link('<i class="fa fa-chevron-right pl-1"></i>', 'javascript:void(0)',
                                        [
                                            'class'       => 'btn-floating btn-action ml-auto mr-4 mdb-color lighten-3',
                                            'data-toggle' => 'modal',
                                            'data-target' => '#event' . $i,
                                            'escape'      => false
                                        ])
                                    ?>

                                    <div class="card-body">
                                        <h5 class="card-title h5-responsive"><?= h($event->title) ?></h5>
                                        <hr>
                                        <p class="card-text">
                                            <?= tw(nl2br(h($event->body)), 70) ?>
                                        </p>
                                    </div>

                                    <div class="rounded-bottom mdb-color lighten-3 text-center pt-3">
                                        <ul class="list-unstyled list-inline font-small">
                                            <li class="list-inline-item white-text"><?= h($event->event_date) ?></li>
                                            <li class="list-inline-item white-text">Start: <?= h($event->start) ?></li>
                                            <li class="list-inline-item white-text">End: <?= h($event->end) ?></li>
                                        </ul>
                                    </div>
                                </div><!-- /.card -->
                            </div><!-- /.col-lg-4 -->
                        <?php $i++; endforeach; ?>
                    </div><!-- /.row -->

                    <div class="row">
                        <div class="col-lg-12">
                            <p class="text-right m-0 mb-3">
                                <small>
                                    <?php
                                        if (isset($logins)) {
                                            print $this->Html->link('さらに見る<i class="fa fa-angle-right ml-2" aria-hidden="true"></i>',
                                                    ['controller' => 'FamousEvents', 'action' => 'public', $famousDancer->user->username],
                                                    ['escape' => false]
                                            );
                                        } else {
                                            print $this->Html->link('サインインして更に見る<i class="fa fa-angle-right ml-2" aria-hidden="true"></i>',
                                                    ['controller' => 'Users', 'action' => 'login'],
                                                    ['escape' => false]
                                            );
                                        }
                                    ?>
                                </small>
                            </p>
                        </div>
                    </div>
                </section>
            </div><!-- /.container -->
        </div><!-- /.container-fluid -->
    <?php endif; ?>

    <?php if (count($roots) !== 0) : ?>
    <div id="roots" class="container">
        <div class="row">
            <div class="col-lg-12">
                <section>

                    <h2 class="section-heading text-center mb-5 my-5 mb-4 font-weight-bold wow fadeIn"><?= h($famousDancer->name) ?> R<span class="font-blue">oo</span>ts</h2>

                    <div class="row mb-3">
                        <div class="col-lg-12 mb-2">
                            <ul class="stepper stepper-vertical timeline-simple pl-0">
                                <?php $i = 0; foreach ($roots as $root) : ?>
                                    <?php
                                        if ($i % 2 === 0) {
                                            print '<li>';
                                        } else {
                                            print '<li class="timeline-inverted">';
                                        }
                                    ?>
                                        <a href="#!">
                                            <span class="circle grey"></span>
                                        </a>
                                        <div class="step-content z-depth-1 ml-xl-0 p-4 hoverable">
                                            <h5 class="h5-responsive font-weight-bold text-center"><?= h($root->title) ?></h5>
                                            <p class="text-muted mt-3"><i class="fa fa-clock-o" aria-hidden="true"></i> <?= h($root->year) ?></p>
                                            <p class="mb-0">
                                                <?= nl2br(h($root->body)) ?>
                                            </p>
                                            <?php if ($root->youtube) : ?>
                                                <div class="modal fade r--youtube" id="r--youtube<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body black pt-4 pb-4">
                                                                <div class="d-flex">
                                                                    <div class="p-0">
                                                                        <h6 class="white-text m-3"><i class="fa fa-youtube-play yt-ic"></i> YouTube</h6>
                                                                    </div>
                                                                    <div class="ml-auto pt-3 pr-2">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span class="white-text" aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="embed-responsive embed-responsive-16by9">
                                                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= h($root->youtube) ?>?rel=0" allowfullscreen></iframe>
                                                                </div>
                                                            </div><!-- /.modal-body -->
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->

                                                <hr>

                                                <div class="col-lg-12">
                                                    <div class="text-center" style="cursor: pointer;">
                                                        <?= $this->Html->image('https://img.youtube.com/vi/' . h($root->youtube) . '/mqdefault.jpg',
                                                            [
                                                                'class'       => 'img-fluid',
                                                                'data-toggle' => 'modal',
                                                                'data-target' => '#r--youtube' . $i
                                                            ]
                                                        ) ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div><!-- /.step-content -->
                                    </li>
                                <?php $i++; endforeach; ?>
                            </ul>
                        </div><!-- /.col-lg-12 -->
                    </div><!-- /.row -->

                    <div class="row">
                        <div class="col-lg-12">
                            <p class="text-right m-0 mb-3">
                                <small>
                                    <?php
                                        if (isset($logins)) {
                                            print $this->Html->link('さらに見る<i class="fa fa-angle-right ml-2" aria-hidden="true"></i>',
                                                    ['controller' => 'FamousRoots', 'action' => 'public', $famousDancer->user->username],
                                                    ['escape' => false]
                                            );
                                        } else {
                                            print $this->Html->link('サインインして更に見る<i class="fa fa-angle-right ml-2" aria-hidden="true"></i>',
                                                    ['controller' => 'Users', 'action' => 'login'],
                                                    ['escape' => false]
                                            );
                                        }
                                    ?>
                                </small>
                            </p>
                        </div>
                    </div>

                </section><!-- /.Section -->
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    <?php endif; ?>

    <?php if (count($respect_artists) !== 0) : ?>
    <div class="container-fluid grey lighten-3 pt-4 pb-5">
        <div class="container">
                <div class="row">
                    <div class="col-lg-12 pt-4">
                        <h2 class="section-heading text-center mb-5 mb-4 font-weight-bold wow fadeIn">Respect Artists</h2>
                    </div>
                </div>

                <div class="row">
                    <?php foreach ($respect_artists as $artist) : ?>
                        <div class="col-lg-6 col-md-12 col-xs-12">
                            <?= $artist->iframe ?>
                        </div>
                    <?php endforeach; ?>
                </div>

        </div>
    </div><!-- /.container-fluid -->
    <?php endif; ?>

    <?php if (!isset($logins)) : ?>
    <div class="container">
        <div class="row mt-3 mb-3">
            <div class="col-lg-12">
                <?= $this->Html->link('サインインをして更に情報を見る', ['controller' => 'Users', 'action' => 'login'], ['class' => 'btn btn-cyan btn-block']) ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
</main>

<script>
$(function() {
    $('.m--youtube').each(function(i, elem) {
        $('#m--youtube' + i).on('hidden.bs.modal', function (e) {
          $('#m--youtube' + i + ' iframe').attr("src", $('#m--youtube' + i + ' iframe').attr("src"));
        });
    });
    $('.r--youtube').each(function(i, elem) {
        $('#r--youtube' + i).on('hidden.bs.modal', function (e) {
          $('#r--youtube' + i + ' iframe').attr("src", $('#r--youtube' + i + ' iframe').attr("src"));
        });
    });
});
</script>
