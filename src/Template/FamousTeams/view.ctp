<?php $this->assign('title', h($famousTeam->name) . ' - プロフィール'); ?>

<div class="view jarallax" data-jarallax='{"speed": 0.2}' style="background-image: url('../<?= h($famousTeam->image) ?>'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
    <div class="mask rgba-black-strong">
        <div class="container h-100 d-flex justify-content-center align-items-center">
            <div class="row smooth-scroll">
                <div class="col-lg-12">
                    <div class="white-text text-center">
                        <h1 class="display-3 font-weight-bold wow fadeIn"><?= h($famousTeam->name) ?></h1>
                        <h4 class="text-uppercase wow fadeIn" data-wow-delay="0.2s"><small>Genre:</small> HipHop</h4>
                        <h5 class="text-uppercase wow fadeIn" data-wow-delay="0.2s"><small>Activity Period:</small> <?= h($famousTeam->period) ?></h5>
                        <a href="#profile" class="btn btn-outline-white wow fadeIn" data-wow-delay="0.4s">Profile</a>
                    </div>
                </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.mask -->
</div><!-- /.view -->

<?php
    if (isset($to_user_id)) {
        if (isset($message_id)) {
            print $this->element('Modal/message', ['to_user_id' => $to_user_id, 'to_user_name' => $to_username, 'message_id' => $message_id] );
        } else {
            print $this->element('Modal/message', ['to_user_id' => $to_user_id, 'to_user_name' => $to_username]);
        }
    }
?>

<div class="container-fluid mt-3 elegant-color">
    <div id="profile" class="container pt-3 white-text">
        <section class="section pt-2 pb-5">
            <h2 class="text-center text-uppercase font-weight-bold mt-5 mb-0 wow fadeIn" data-wow-delay="0.2s">Profile</h2>
            <p class="text-center font-weight-bold mt-0 wow fadeIn" data-wow-delay="0.2s"><small>プロフィール</small></p>

            <div class="row mt-5 mb-5">
                <div class="col-lg-12 wow fadeIn" data-wow-delay="0.4s">
                    <p class="mb-4" align="justify">
                        <?= nl2br(h($famousTeam->profile)) ?>
                    </p>
                </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->
        </section>
    </div><!-- /.ccontainer -->
</div><!-- /.container-fluid -->

<div class="container">
    <section class="section team-section">

        <h2 class="section-heading text-center mb-0 pt-5 font-weight-bold wow fadeIn">Member</h2>
        <p class="text-center font-weight-bold mt-0 mb-5 wow fadeIn" data-wow-delay="0.2s"><small>メンバー</small></p>

        <div class="row text-center wow fadeIn" data-wow-delay="0.4s">
            <?php foreach ($team_members as $member) : ?>
                <div class="col-md-4 mb-5">
                    <div class="avatar mx-auto mb-4">
                        <?php
                            if ($member->image) {
                                print $this->Html->image($member->image, ['class' => 'z-depth-1 img-flued']);
                            } else {
                                print $this->Html->image('sample/no_icon.jpg', ['class' => 'z-depth-1 img-flued']);
                            }
                        ?>
                    </div>
                    <h4>
                        <?php
                            if ($member->profile_url) {
                                print $this->Html->link($member->name, $member->profile_url, ['class' => 'black-text', 'target' => '_blank']);
                            } else {
                                print h($member->name);
                            }
                        ?>
                    </h4>
                    <?php
                        if ($member->leader_flag === 1) {
                            print '<h5>Leader</h5>';
                        } else {
                            print '<h5>Member</h5>';
                        }
                    ?>
                </div>
            <?php endforeach; ?>
        </div><!-- /.row -->
    </section>
</div><!-- /.container -->

<div class="container-fluid mb-5 wow fadeIn elegant-color" data-wow-delay="0.2s">
    <div class="container mb-3 pt-1">
        <h2 class="section-heading text-center mt-5 mb-5 pt-4 font-weight-bold wow fadeIn white-text">ShowCase</h2>
        <div class="row">

            <?php if ($famousTeam->youtube1) : ?>
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
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= h($famousTeam->youtube1) ?>?rel=0" allowfullscreen></iframe>
                            </div>
                        </div><!-- /.modal-body -->
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-3">
                <div class="d-flex justify-content-center zoom" style="cursor: pointer;">
                    <?= $this->Html->image('https://img.youtube.com/vi/' . h($famousTeam->youtube1) . '/mqdefault.jpg',
                        [
                            'class'       => 'img-fluid',
                            'data-toggle' => 'modal',
                            'data-target' => '#m--youtube0'
                        ]
                    ) ?>
                </div>
            </div>
            <?php endif; ?>

            <?php if ($famousTeam->youtube2) : ?>
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
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= h($famousTeam->youtube2) ?>?rel=0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-3">
                <div class="d-flex justify-content-center zoom" style="cursor: pointer;">
                    <?= $this->Html->image('https://img.youtube.com/vi/' . h($famousTeam->youtube2) . '/mqdefault.jpg',
                        [
                            'class'       => 'img-fluid',
                            'data-toggle' => 'modal',
                            'data-target' => '#m--youtube1'
                        ]
                    ) ?>
                </div>
            </div>
            <?php endif; ?>

            <?php if ($famousTeam->youtube3) : ?>
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
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= h($famousTeam->youtube3) ?>?rel=0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-3">
                <div class="d-flex justify-content-center zoom" style="cursor: pointer;">
                    <?= $this->Html->image('https://img.youtube.com/vi/' . h($famousTeam->youtube3) . '/mqdefault.jpg',
                        [
                            'class'       => 'img-fluid',
                            'data-toggle' => 'modal',
                            'data-target' => '#m--youtube2'
                        ]
                    ) ?>
                </div>
            </div>
            <?php endif; ?>

            <div class="col-lg-12">
                <p class="text-right m-0 pb-3">
                    <small><a class="white-text" href="javascript:void(0)">さらに見る<i class="fa fa-angle-right ml-2" aria-hidden="true"></i></a></small>
                </p>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.container-fluid -->

<div class="container">
    <div class="row mb-5">
        <div class="col-lg-12">
            <section>
                <h2 class="section-heading text-center mb-5 my-5 font-weight-bold wow fadeIn">Style</h2>
                <div class="row mb-5 wow fadeIn" data-wow-delay="0.2s">
                    <div class="col-lg-12 mb-2">
                        <p class="text-center">
                            <?= h($famousTeam->style) ?>
                        </p>
                    </div>
                </div>
                <hr>
            </section>
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->
</div><!-- /.container -->

<?php if (count($team_events) !== 0) : ?>
    <div class="container-fluid mb-4 grey lighten-3">
        <div class="container mb-3 pt-1">
            <section>

                <h2 class="section-heading text-center mb-0 pt-5 mt-4 font-weight-bold wow fadeIn">Event</h2>
                <p class="text-center font-weight-bold mt-0 mb-5 wow fadeIn" data-wow-delay="0.2s"><small>イベント</small></p>

                <div class="row wow fadeIn" data-wow-delay="0.2s">
                    <?php $i = 0; foreach ($team_events as $event) : ?>
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

                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-3">
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
                                        <li class="list-inline-item pr-2 white-text"><i class="fa fa-clock-o pr-1"></i><?= h($event->event_date) ?></li>
                                        <li class="list-inline-item pr-2 white-text">Start: <?= h($event->start) ?></li>
                                        <li class="list-inline-item pr-2 white-text">End: <?= h($event->end) ?></li>
                                    </ul>
                                </div>
                            </div><!-- /.card -->
                        </div><!-- /.col-lg-4 -->
                    <?php $i++; endforeach; ?>
                </div><!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <p class="text-right m-0 mb-3">
                            <small><a href="javascript:void(0)">さらに見る<i class="fa fa-angle-right ml-2" aria-hidden="true"></i></a></small>
                        </p>
                    </div>
                </div>
            </section>
        </div><!-- /.container -->
    </div><!-- /.container-fluid -->
<?php endif; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <section>

                <h2 class="section-heading text-center mb-5 my-5 mb-4 font-weight-bold wow fadeIn"><?= h($famousTeam->name) ?> R<span class="font-blue">oo</span>ts</h2>

                <div class="row mb-3">
                    <div class="col-lg-12 mb-2">
                        <ul class="stepper stepper-vertical timeline-simple pl-0">
                            <?php $i = 0; foreach ($team_roots as $root) : ?>
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
            </section><!-- /.Section -->
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->

    <?php if (count($respect_artists) !== 0) : ?>
    <div class="card card-body grey lighten-3 mb-5">
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
    </div><!-- /.card -->
    <?php endif; ?>
</div><!-- /.container-fluid -->

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
