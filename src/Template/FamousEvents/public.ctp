<?php $this->assign('title', h($famous->name) . ' - 出演イベント/ワークショップ一覧'); ?>

<!-- ユーザー区分でチームかダンサーかを変更 -->
<?php if ($user->classification === 4) : ?>
    <div class="view jarallax" data-jarallax='{"speed": 0.2}' style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/People/full%20page/img%20%2827%29.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
        <div class="mask rgba-black-slight">
            <div class="container h-100 d-flex justify-content-start align-items-center">
                <div class="row smooth-scroll">
                    <div class="col-lg-12">
                        <div class="wow fadeInUp">
                            <h1 class="display-3 font-weight-bold mb-3">Dancer Name</h1>
                            <h4 class="dark-grey-text text-uppercase font-weight-bold">Team: TeamName</h4>
                            <h5 class="dark-grey-text text-uppercase font-weight-bold">Genre: HipHop</h5>
                            <p>
                                <a href="#event" class="btn btn-outline-black wow fadeIn waves-effect waves-light animated" data-wow-delay="0.4s">EVENT</a>
                            </p>
                        </div>
                    </div><!-- /.col-lg-12-->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.mask -->
    </div><!-- /.view -->
<?php else : ?>
    <div class="view jarallax" data-jarallax='{"speed": 0.2}' style="background-image: url('../<?= h($famous->image) ?>'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
        <div class="mask rgba-black-strong">
            <div class="container h-100 d-flex justify-content-center align-items-center">
                <div class="row smooth-scroll">
                    <div class="col-lg-12">
                        <div class="white-text text-center">
                            <h1 class="display-3 font-weight-bold wow fadeIn"><?= h($famous->name) ?></h1>
                            <h4 class="text-uppercase wow fadeIn" data-wow-delay="0.2s"><small>Genre:</small> HipHop</h4>
                            <h5 class="text-uppercase wow fadeIn" data-wow-delay="0.2s"><small>Activity Period:</small> <?= h($famous->period) ?></h5>
                            <a href="#event" class="btn btn-outline-pink wow fadeIn" data-wow-delay="0.4s">Event</a>
                            <?= $this->Html->link('Back', ['controller' => 'FamousTeams', 'action' => 'pv', '#' => 'event', $user->username], ['class' => 'btn btn-outline-white wow fadeIn']) ?>
                        </div>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.mask -->
    </div><!-- /.view -->
<?php endif; ?>

<main>
    <div id="event" class="container-fluid pb-5 wow fadeIn grey lighten-4" data-wow-delay="0.2s">
        <div class="container pt-4">
            <section>
                <h2 class="section-heading text-center mb-0 mt-4 pt-4 font-weight-bold wow fadeIn">Event / Workshop</h2>
                <p class="text-center text-uppercase font-weight-bold mt-0 mb-3 wow fadeIn" data-wow-delay="0.2s">
                    <small>イベント・ワークショップ</small>
                </p>
                <?php if (count($famousEvents) !== 0) : ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="dark-grey-text text-right mt-0">
                                <small>
                                    <?= $this->Paginator->counter('{{page}} / {{pages}} ページ &nbsp; 全 {{count}} 件') ?>
                                </small>
                            </p>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <?php $i = 0; foreach ($famousEvents as $event) : ?>
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
                                                    <p class="grey-text text-left mb-0">
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

                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mb-3">
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
                            </div><!-- /.col-lg-3 -->
                        <?php $i++; endforeach; ?>
                    </div><!-- /.row -->
                    <hr>
                    <div class="row">
                        <div class="col-lg-12">
                            <nav aria-label="pagination">
                                <ul class="pagination pg-blue justify-content-center">
                                    <?= $this->Paginator->prev(__('前へ')) ?>
                                    <?= $this->Paginator->numbers() ?>
                                    <?= $this->Paginator->next(__('次へ')) ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                <?php else : ?>
                    <hr>
                    <div class="row mb-5">
                        <div class="col-lg-12">
                            <p class="text-center mb-0">
                                現在イベントはありません。
                            </p>
                        </div>
                    </div>
                <?php endif; ?>
            </section>
        </div><!-- /.container -->
    </div><!-- /.container-fluid -->
</main>
