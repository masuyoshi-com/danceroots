<?php $this->assign('title', 'おすすめダンス動画一覧'); ?>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="jumbotron text-center pt-4 pb-4">
            <h2 class="h2-responsive">
                <i class="fa fa-youtube-play yt-ic"></i> おすすめダンス動画
            </h2>
            <hr class="my-2">
            <p class="lead grey-text">
                <small>Dancerootsのおすすめダンス動画</small>
            </p>
            <hr class="my-2">
        </div><!-- /.jumbotron -->
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

<div class="row">
    <div class="col-lg-12">
        <?= $this->Flash->render() ?>
    </div>
</div>

<?php if (count($reco_videos) !== 0) : ?>
<div class="row">
    <div class="col-lg-12">
        <p class="dark-gray-text text-right">
            <small>
                <?= $this->Paginator->counter('{{page}} / {{pages}} ページ &nbsp; 全 {{count}} 件') ?>
            </small>
        </p>
        <hr>
    </div>
</div>

<section class="pb-3">
    <div class="row">

        <?php
            $i = 0;
            foreach ($reco_videos as $video) :
        ?>

            <div class="modal fade m--youtube" id="m--youtube<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body black pt-4 pb-4">
                            <h6 class="white-text m-3"><i class="fa fa-youtube-play yt-ic"></i> YouTube</h6>
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= h($video->youtube) ?>?rel=0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-12 mb-3">
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
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.col-lg-3 -->
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

<hr class="mt-0">
<?php else : ?>
<div class="card card-body">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h5 class="dark-gray-text mt-3">
                ダンス動画はありません
            </h5>
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
