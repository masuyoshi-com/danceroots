<?php $this->assign('title', 'ストリートダンスミュージック共有検索'); ?>

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
    <div class="col-lg-12 col-md-12">
        <div class="d-flex">
            <div>
                <h5 class="h5-responsive font-weight-bold">
                    <i class="fa fa-music pink-text"></i> <span class="none">Favorite</span> Dance Music
                </h5>
            </div>
            <div class="ml-auto">
                <p class="m-0 grey-text"><small>全ユーザーの共有ダンス音楽</small></p>
            </div>
        </div>
        <hr class="mt-0">
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->


<?= $this->Form->create('', ['type' => 'get']) ?>
<div class="card card-body p-3 mb-3">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-xs-12 mt-3">
            <?= $this->Form->control('genre',
                [
                    'id'      => 'f--genre',
                    'type'    => 'select',
                    'class'   => 'mdb-select colorful-select dropdown-primary',
                    'options' => $genres,
                    'empty'   => 'ジャンルを選択'
                ]
            ) ?>
        </div>
        <div class="col-lg-3 col-md-6 col-xs-12 mt-3">
            <?= $this->Form->control('year',
                [
                    'id'      => 'f--year',
                    'type'    => 'select',
                    'class'   => 'mdb-select colorful-select dropdown-primary',
                    'options' => $years,
                    'empty'   => '年代を選択'
                ]
            ) ?>
        </div>
        <div class="col-lg-6 col-md-12 col-xs-12">
            <div class="form-inline md-form input-group mt-2 mb-2">
                <?= $this->Form->control('word', ['class' => 'form-control my-0', 'placeholder' => '検索']) ?>
                <?= $this->Form->button('<i class="fa fa-search"></i>',
                    [
                        'class'  => 'btn btn-primary ml-2 waves-effect waves-light',
                        'escape' => false
                    ]
                ) ?>
            </div>
        </div>
    </div><!-- /.row -->
</div><!-- /.card -->
<?= $this->Form->end() ?>

<?php if (count($danceMusics) !== 0) : ?>

<div class="row">
    <div class="col-lg-12">
        <div class="d-flex">
            <p class="mb-0">
                <?= $this->Html->link('<i class="fa fa-plus"></i> ミュージック登録', ['controller' => 'DanceMusics', 'action' => 'add'],
                    ['class' => 'btn btn-sm btn-info', 'escape' => false]
                ) ?>
            </p>
            <p class="ml-auto dark-gray-text pt-2">
                <small>
                    <?= $this->Paginator->counter('{{page}} / {{pages}} ページ &nbsp; 全 {{count}} 件') ?>
                </small>
            </p>
        </div>
        <hr class="mt-0">
    </div>
</div>

<div class="row">

    <?php $i = 0; foreach($danceMusics as $music) : ?>

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
                    <?php
                        if ($music->profile->icon) {
                            print $this->Html->image($music->profile->icon,
                                [
                                    'class' => 'rounded-circle avatar-img z-depth-1 mr-2 mb-2',
                                    'style' => 'width: 25px; height: 25px;'
                                ]);
                        } else {
                            print $this->Html->image('/img/sample/no_icon.jpg',
                                [
                                    'class' => 'rounded-circle avatar-img z-depth-1 mr-2 mb-2',
                                    'style' => 'width: 25px; height: 25px;'
                                ]);
                        }
                    ?>

                    <?= $this->Html->link($music->user->username,
                        ['controller' => 'DanceMusics', 'action' => 'detail', $music->user->username],
                        [
                            'class'          => 'grey-text',
                            'data-toggle'    => 'tooltip',
                            'data-placement' => 'bottom',
                            'title'          => 'お気に入り音楽を見る'
                        ]
                    ) ?>

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
                    <?= h($music->primary_genre_name) ?>
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
<div class="card card-body">
    <div class="row">
        <div class="col-lg-12">
            <p>
                <?= $this->Html->link('<i class="fa fa-plus"></i> ミュージック登録', ['controller' => 'DanceMusics', 'action' => 'add'],
                    ['class' => 'btn btn-sm btn-info', 'escape' => false]
                ) ?>
            </p>
            <hr>
            <p class="dark-grey-text text-center mt-3">
                音楽が見つかりませんでした。
            </p>
            <hr>
        </div>
    </div>
</div>
<?php endif; ?>

<script>
$(function() {
    $('.m--music').each(function(i, elem) {
        $('#m--music' + i).on('hidden.bs.modal', function (e) {
          $('#m--music' + i + ' audio').attr("src", $('#m--music' + i + ' audio').attr("src"));
        });
    });
});
</script>
