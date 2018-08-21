<?php $this->assign('title', 'ストリートダンス動画共有検索'); ?>

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
        <h5 class="h5-responsive font-weight-bold">
            <i class="fa fa-youtube-play yt-ic"></i> Favorite Dance Videos
        </h5>
        <hr>
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->

<?= $this->Form->create('', ['type' => 'get']) ?>
<div class="card card-body p-3 mb-3">
    <div class="row">
        <div class="col-lg-3 col-md-5 col-xs-12 mt-3">
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
        <div class="col-lg-9 col-md-7 col-xs-12">
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

<?php if (count($videos) !== 0) : ?>
<div class="row">
    <div class="col-lg-12">
        <div class="d-flex">
            <p class="mb-0">
                <?= $this->Html->link('<i class="fa fa-plus"></i> ダンス動画登録', ['action' => 'add'],
                        ['class' => 'btn btn-sm btn-default', 'escape' => false]
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
                            <h6 class="white-text m-3"><i class="fa fa-youtube-play yt-ic"></i> YouTube</h6>
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

                    <div class="card-body">
                        <div class="d-flex">
                            <div class="content">
                                <!--<div class="right-side-meta"><span><i class="fa fa-heart-o"></i> 265 likes</span></div>-->
                                <a href=<?= $this->Url->build(h($video->link)) ?> class="dark-gray-text" target="_blank">
                                    <?php
                                        if ($video->profile->icon) {
                                            print $this->Html->image($video->profile->icon, ['class' => 'rounded-circle avatar-img z-depth-1']);
                                        } else {
                                            print $this->Html->image('/img/sample/no_icon.jpg', ['class' => 'rounded-circle avatar-img z-depth-1']);
                                        }
                                    ?>
                                    <small>
                                        <?= $this->Html->link($video->user->username,
                                            ['controller' => 'DanceVideos', 'action' => 'detail', $video->user->id],
                                            [
                                                'class'          => 'grey-text',
                                                'data-toggle'    => 'tooltip',
                                                'data-placement' => 'bottom',
                                                'title'          => 'お気に入り動画を見る'
                                            ]
                                        ) ?>
                                    </small>
                                </a>
                            </div>
                            <div class="grey-text ml-auto pt-1">
                                <small>
                                    <i class="fa fa-clock-o" aria-hidden="true"></i> <?= h($video->show_year) ?>年
                                </small>
                            </div>
                        </div><!-- /.d-flex -->
                    </div><!-- /.card-body -->

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
                            <h5 class="text-left"><span class="badge <?= getBadgeColor(h($video->genre)) ?>"><?= h($video->genre) ?></span></h5>
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

                        <?php if ($video->tag) : ?>
                        <div class="md-form">
                            <p><i class="fa fa-tag"></i> <?= h($video->tag) ?></p>
                        </div>
                        <?php endif; ?>

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
<div class="card card-body">
    <div class="row">
        <div class="col-lg-12">
            <p>
                <?= $this->Html->link('<i class="fa fa-plus"></i> ダンス動画登録', ['controller' => 'DanceVideos', 'action' => 'add'],
                    ['class' => 'btn btn-sm btn-default', 'escape' => false]
                ) ?>
            </p>
            <hr>
            <p class="dark-gray-text text-center mt-3">
                動画はありません。
            </p>
            <hr>
        </div>
    </div>
</div>
<?php endif; ?>

<script>
$(function() {
    $('.m--youtube').each(function(i, elem) {
        $('#m--youtube' + i).on('hidden.bs.modal', function (e) {
          $('#m--youtube' + i + ' iframe').attr("src", $('#m--youtube' + i + ' iframe').attr("src"));
        });
    });
});
</script>
