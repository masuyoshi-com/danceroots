<?php $this->assign('title', h($famousTeam->name) . ' - ダンス動画プレイリスト'); ?>

<div class="view jarallax" data-jarallax='{"speed": 0.2}' style="background-image: url('../<?= h($famousTeam->image) ?>'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
    <div class="mask rgba-black-strong">
        <div class="container h-100 d-flex justify-content-center align-items-center">
            <div class="row smooth-scroll">
                <div class="col-lg-12">
                    <div class="white-text text-center">
                        <h1 class="display-3 font-weight-bold wow fadeIn"><?= h($famousTeam->name) ?></h1>
                        <h4 class="text-uppercase wow fadeIn" data-wow-delay="0.2s"><small>Genre:</small> HipHop</h4>
                        <h5 class="text-uppercase wow fadeIn" data-wow-delay="0.2s"><small>Activity Period:</small> <?= h($famousTeam->period) ?></h5>
                        <a href="#video" class="btn btn-outline-warning wow fadeIn" data-wow-delay="0.4s">VIDEO</a>
                        <?= $this->Html->link('BACK', ['controller' => 'FamousTeams', 'action' => 'view', '#' => 'share', $famousTeam->user->username], ['class' => 'btn btn-outline-white wow fadeIn']) ?>
                    </div>
                </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.mask -->
</div><!-- /.view -->

<div id="video" class="container-fluid pb-5 wow fadeIn" data-wow-delay="0.2s">
    <section class="pt-4">
        <h3 class="h3-responsive section-heading text-center mb-0 mt-4 pt-4 font-weight-bold wow fadeIn"><i class="fa fa-youtube-play yt-ic mr-2"></i>DANCE VIDEO</h3>

        <?php if (count($videos) !== 0) : ?>
        <div class="row">
            <div class="col-lg-12">
                <p class="text-right dark-gray-text pt-3">
                    <small>
                        <?= $this->Paginator->counter('{{page}} / {{pages}} ページ &nbsp; 全 {{count}} 件') ?>
                    </small>
                </p>
                <hr class="mt-0">
            </div>
        </div>

        <section class="pt-3">
            <div class="row">

                <?php
                    $i = 0;
                    foreach ($videos as $video) :
                ?>
                    <?php if (!empty($video->youtube)) : ?>
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
                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= h($video->youtube) ?>?rel=0" allowfullscreen></iframe>
                                    </div>
                                    <?php if ($video->comment) : ?>
                                    <h6 class="white-text m-3 "><i class="fa fa-comment"></i> Comment</h6>
                                    <p class="grey-text font-weight-bold p-2">
                                        <?= nl2br(h($video->comment)) ?>
                                    </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-5">
                        <div class="card news-card">

                            <div class="embed-responsive embed-responsive-16by9 d-flex justify-content-center zoom">
                                <?= $this->Html->image('https://img.youtube.com/vi/' . h($video->youtube) . '/mqdefault.jpg',
                                    [
                                        'class'       => 'img-thumbnail img-fluid',
                                        'data-toggle' => 'modal',
                                        'data-target' => '#m--youtube' . $i
                                    ]
                                ) ?>
                            </div>

                            <div class="card-body">
                                <div class="social-meta">
                                    <h5 class="text-right"><span class="badge <?= getBadgeColor(h($video->genre)) ?>"><?= h($video->genre) ?></span></h5>
                                    <p>
                                        <strong>
                                            <?= $this->Html->link($video->title, 'javascript:void(0)',
                                                [
                                                    'class'       => 'dark-grey-text',
                                                    'data-toggle' => 'modal',
                                                    'data-target' => '#m--youtube' . $i
                                                ]
                                            ) ?>
                                        </strong>
                                    </p>
                                </div>

                                <hr>

                                <div class="grey-text text-right">
                                    <small>
                                        <i class="fa fa-clock-o" aria-hidden="true"></i> <?= h($video->show_year) ?>年
                                    </small>
                                </div>
                            </div><!-- /.card-body -->
                        </div><!-- /.card -->
                    </div><!-- /.col-lg-4 -->
                    <?php endif; ?>
                <?php $i++; endforeach; ?>
            </div><!-- /.row -->
        </section>

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
        <div class="row mt-5">
            <div class="col-lg-12">
                <p class="dark-gray-text text-center mt-3">
                    動画はありません。
                </p>
                <hr>
            </div>
        </div>
        <?php endif; ?>
    </section>
</div><!-- /.container-fluid -->
<script>
$(function() {
    $('.m--youtube').each(function(i, elem) {
        $('#m--youtube' + i).on('hidden.bs.modal', function (e) {
          $('#m--youtube' + i + ' iframe').attr("src", $('#m--youtube' + i + ' iframe').attr("src"));
        });
    });
});
</script>
