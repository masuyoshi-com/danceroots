<?php $this->assign('title', h($famousDancer->name) . ' - ミュージックプレイリスト'); ?>

<div class="view jarallax" data-jarallax='{"speed": 0.2}' style="background-image: url('../<?= h($famousDancer->image) ?>'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
    <div class="mask rgba-black-slight">
        <div class="container h-100 d-flex justify-content-start align-items-center">
            <div class="row smooth-scroll">
                <div class="col-lg-12">
                    <div class="wow fadeInUp">
                        <h1 class="display-3 font-weight-bold mb-3"><?= h($famousDancer->name) ?></h1>
                        <h4 class="dark-grey-text text-uppercase font-weight-bold">
                            <small>Team:</small>
                            <?= h($famousDancer->team_name) ?>
                        </h4>
                        <h5 class="dark-grey-text text-uppercase font-weight-bold"><small>Genre:</small> <?= h($famousDancer->genre) ?></h5>
                        <p>
                            <a href="#music" class="btn btn-outline-pink wow fadeIn" data-wow-delay="0.4s">MUSIC</a>
                            <?= $this->Html->link('BACK', ['controller' => 'FamousDancers', 'action' => 'view', '#' => 'share', $famousDancer->user->username], ['class' => 'btn btn-outline-warning wow fadeIn']) ?>
                        </p>
                    </div>
                </div><!-- /.col-lg-12-->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.mask -->
</div><!-- /.view -->

<div id="music" class="container-fluid pb-5 wow fadeIn" data-wow-delay="0.2s">
    <section class="pt-4">
        <h3 class="h3-responsive section-heading text-center mb-0 mt-4 pt-4 font-weight-bold wow fadeIn"><i class="fa fa-music pink-text mr-2"></i>MUSIC</h3>

        <?php if (count($musics) !== 0) : ?>

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

        <div class="row">

            <?php $i = 0; foreach($musics as $music) : ?>

            <div class="modal fade m--music" id="m--music<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body pt-4 pb-4">

                            <div class="d-flex">
                                <div class="p-0">
                                    <h6 class="black-text m-3"><i class="fa fa-apple"></i> iTunes</h6>
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
                                        <?= $this->Html->image($music->artwork_url, ['class' => 'img-fluid z-depth-2']) ?>
                                    </h3>
                                    <p class="mt-4">
                                        <?= h($music->collection_name) ?>
                                    </p>
                                    <p class="mt-4">
                                        <?= $this->Html->media($music->preview_url, ['controls']) ?>
                                    </p>
                                </div>
                                <div class="col-lg-7 text-center">
                                    <h2 class="h2-responsive product-name">
                                      <strong><?= h($music->track_name) ?></strong>
                                    </h2>
                                    <h3 class="h3-responsive">
                                        <?= h($music->artist_name) ?>
                                    </h3>

                                    <p>
                                        <small>ジャンル名: <?= h($music->primary_genre_name) ?></small>
                                    </p>
                                    <p>
                                        <small>
                                            Released: <?= h($music->release_date->format('Y/m/d')) ?>
                                            <span class="badge badge-danger"><?= h($music->track_explicitness) ?></span>
                                        </small>
                                    </p>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-xs-6">
                                            <p>
                                                <?= $this->Html->link('Track<span class="none"> View</span>', $music->track_view_url,
                                                    ['class' => 'btn btn-sm btn-rounded btn-primary waves-effect', 'target' => '_blank', 'escape' => false]
                                                ) ?>
                                            </p>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-xs-6">
                                            <p>
                                                <?= $this->Html->link('Album<span class="none"> View</sapn>', $music->collection_view_url,
                                                    ['class' => 'btn btn-sm btn-rounded btn-default waves-effect', 'target' => '_blank', 'escape' => false]
                                                ) ?>
                                            </p>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-xs-12">
                                            <p>
                                                <?= $this->Html->link('Artist<span class="none"> View</span>', $music->artist_view_url,
                                                    ['class' => 'btn btn-sm btn-rounded btn-deep-purple waves-effect', 'target' => '_blank', 'escape' => false]
                                                ) ?>
                                            </p>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.col-lg-7 -->
                            </div><!-- /.row -->
                        </div><!-- /.modal-body -->
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <div class="col-lg-2 col-md-3 col-sm-6 col-xs-6 mb-3">
                <div class="card card-body text-center pb-0">
                    <p class="grey-text text-left m-0">
                        <small>
                            <?= h($music->primary_genre_name) ?>
                        </small>
                    </p>
                    <hr class="mt-1">
                    <p>
                        <?= $this->Html->link($this->Html->image($music->artwork_url, ['class' => 'img-fluid z-depth-2']),
                            'javascript:void(0)',
                            [
                                'class'       => 'dark-grey-text',
                                'data-toggle' => 'modal',
                                'data-target' => '#m--music' . $i,
                                'escape'      => false
                            ]
                        ) ?>
                    </p>
                    <p>
                        <small>
                        <?= $this->Html->link($music->artist_name, 'javascript:void(0)',
                            [
                                'class'       => 'dark-grey-text',
                                'data-toggle' => 'modal',
                                'data-target' => '#m--music' . $i
                            ]
                        ) ?>
                        </small>
                    </p>
                    <p class="mb-0">
                        <small>
                            <?= $this->Html->link($music->track_name, 'javascript:void(0)',
                                [
                                    'class'       => 'dark-grey-text',
                                    'data-toggle' => 'modal',
                                    'data-target' => '#m--music' . $i
                                ]
                            ) ?>
                        </small>
                    </p>
                    <hr class="mb-1">
                    <p class="grey-text text-right">
                        <small>
                            Released: <?= h($music->release_date->format('Y/m/d')) ?>
                        </small>
                    </p>
                </div><!-- /.card -->
            </div><!-- /.col-lg-2 -->
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
            <div class="row mt-5">
                <div class="col-lg-12">
                    <p class="dark-grey-text text-center mt-3">
                        音楽が見つかりませんでした。
                    </p>
                    <hr>
                </div>
            </div>
        <?php endif; ?>
    </section>
</div><!-- /.container-fluid -->
<script>
$(function() {
    $('.m--music').each(function(i, elem) {
        $('#m--music' + i).on('hidden.bs.modal', function (e) {
          $('#m--music' + i + ' audio').attr("src", $('#m--music' + i + ' audio').attr("src"));
        });
    });
});
</script>
