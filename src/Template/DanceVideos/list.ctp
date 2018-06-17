<?php $this->assign('title', 'マイダンス動画共有リスト'); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="jumbotron text-center">
            <h2 class="h2-responsive">
                <i class="fa fa-youtube-play yt-ic"></i> マイ ダンス動画
            </h2>
            <hr class="my-2">
            <p class="lead grey-text">
                <small>登録済み動画一覧です。やり直したい場合は、削除してから再度登録してください。</small>
            </p>
            <hr class="my-2">
            <div class="row">
                <div class="col-lg-12">
                    <?= $this->Html->link('<i class="fa fa-plus"></i> ダンス動画登録', ['action' => 'add', h($id)],
                        ['class' => 'btn btn-info btn-block', 'escape' => false]
                    ) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <?= $this->Flash->render() ?>
    </div>
</div>

<?php if (count($videos) !== 0) : ?>
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
            foreach ($videos as $video) :
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

            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card news-card">

                    <div class="card-body">
                        <div class="content">
                            <div class="right-side-meta"><small>Date: <?= h($video->created) ?></small></div>
                            <?php
                                if ($icon) {
                                    print $this->Html->image($icon, ['class' => 'rounded-circle avatar-img z-depth-1']);
                                } else {
                                    print $this->Html->image('/img/sample/no_icon.jpg', ['class' => 'rounded-circle avatar-img z-depth-1']);
                                }
                            ?>
                            <?= h($video->user->username) ?>
                        </div>
                    </div>

                    <div class="embed-responsive embed-responsive-16by9 d-flex justify-content-center zoom">
                        <?= $this->Html->image('http://img.youtube.com/vi/' . h($video->youtube) . '/mqdefault.jpg',
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
                            <p><strong>
                                <?= $this->Html->link($video->title, 'javascript:void(0)',
                                    [
                                        'class'       => 'dark-grey-text',
                                        'data-toggle' => 'modal',
                                        'data-target' => '#m--youtube' . $i
                                    ]
                                ) ?>
                            </strong></p>
                        </div>

                        <hr>

                        <div class="md-form">
                            <p><i class="fa fa-tag"></i> <?= h($video->tag) ?></p>
                        </div>

                        <div class="text-right">
                            <?= $this->Html->link('<i class="fa fa-pencil" aria-hidden="true"></i>',
                                    ['action' => 'edit', h($video->id)],
                                    [
                                        'class'          => 'btn btn-sm btn-outline-primary  btn-rounded waves-effect',
                                        'escape'         => false,
                                        'data-toggle'    => 'tooltip',
                                        'data-placement' => 'bottom',
                                        'title'          => '編集'
                                    ]
                            ) ?>
                            <?= $this->Form->postLink('<i class="fa fa-close" aria-hidden="true"></i>',
                                    ['action' => 'delete', h($video->id), h($id)],
                                    [
                                        'class'          => 'btn btn-sm btn-outline-danger btn-rounded waves-effect',
                                        'confirm'        => '本当に削除しますか？',
                                        'escape'         => false,
                                        'data-toggle'    => 'tooltip',
                                        'data-placement' => 'bottom',
                                        'title'          => '削除'
                                    ]
                            ) ?>
                        </div>
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.col-lg-4 -->

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
                登録済みダンス動画はありません
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
