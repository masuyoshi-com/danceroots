<?php $this->assign('title', h($famous->name) . ' - 活動経歴・歴史'); ?>

<!-- ユーザー区分でチームかダンサーかを変更 -->
<?php if ($user->classification === 4) : ?>
    <div class="view jarallax" data-jarallax='{"speed": 0.2}' style="background-image: url('../<?= h($famous->image) ?>'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
        <div class="mask rgba-black-slight">
            <div class="container h-100 d-flex justify-content-start align-items-center">
                <div class="row smooth-scroll">
                    <div class="col-lg-12">
                        <div class="wow fadeInUp">
                            <h1 class="display-3 font-weight-bold mb-3"><?= h($famous->name) ?></h1>
                            <?php if ($famous->team_name) : ?>
                                <h4 class="dark-grey-text text-uppercase font-weight-bold">
                                    <small>Team:</small>
                                    <?= h($famous->team_name) ?>
                                </h4>
                            <?php endif; ?>
                            <h5 class="dark-grey-text text-uppercase font-weight-bold"><small>Genre:</small> <?= h($famous->genre) ?></h5>
                            <p>
                                <a href="#roots" class="btn btn-outline-blue wow fadeIn waves-effect waves-light animated" data-wow-delay="0.4s">ROOTS</a>
                                <?= $this->Html->link('BACK', ['controller' => 'FamousDancers', 'action' => 'pv', '#' => 'roots', $user->username],
                                    ['class' => 'btn btn-outline-warning wow fadeIn waves-effect waves-light animated', 'data-wow-delay' => '0.4s']
                                ) ?>
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
                            <a href="#roots" class="btn btn-outline-info wow fadeIn" data-wow-delay="0.4s">ROOTS</a>
                            <?= $this->Html->link('Back', ['controller' => 'FamousTeams', 'action' => 'pv', '#' => 'roots', $user->username], ['class' => 'btn btn-outline-warning wow fadeIn']) ?>
                        </div>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.mask -->
    </div><!-- /.view -->
<?php endif; ?>

<main>
    <div id="roots" class="container-fluid pb-5 wow fadeIn grey lighten-4" data-wow-delay="0.2s">
        <div class="container pt-4">
            <section>
                <h2 class="section-heading text-center mb-5 my-5 mb-4 font-weight-bold wow fadeIn"><?= h($famous->name) ?> R<span class="font-blue">oo</span>ts</h2>
                <?php if (count($famousRoots) !== 0) : ?>
                <div class="row mb-3">
                    <div class="col-lg-12 mb-2">
                        <ul class="stepper stepper-vertical timeline-simple pl-0">
                            <?php $i = 0; foreach ($famousRoots as $root) : ?>
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
                                            <div class="modal fade m--youtube" id="m--youtube<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                                            'data-target' => '#m--youtube' . $i
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

                <script>
                $(function() {
                    $('.m--youtube').each(function(i, elem) {
                        $('#m--youtube' + i).on('hidden.bs.modal', function (e) {
                          $('#m--youtube' + i + ' iframe').attr("src", $('#m--youtube' + i + ' iframe').attr("src"));
                        });
                    });
                });
                </script>

                <?php else : ?>
                    <div class="card card-body mb-3">
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="text-center mb-0">
                                    登録している経歴はありません。
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </section>
        </div><!-- /.container -->
    </div><!-- /.container-fluid -->
</main>
