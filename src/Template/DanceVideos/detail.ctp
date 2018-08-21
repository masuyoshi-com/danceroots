<?php $this->assign('title', 'ストリートダンス動画 - ユーザー別お気に入り動画詳細'); ?>

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
        <h6 class="h6-responsive">
            <i class="fa fa-youtube-play yt-ic"></i> <?= h($user->username) ?>さんのお気に入り動画
        </h6>
        <hr>
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->

<div class="card card-body">
    <div class="card-header border-0 d-flex grey lighten-4" >
        <p class="font-weight-bold mr-4 mb-0">About author</p>
        <ul class="ml-auto list-unstyled list-inline mb-0">
            <?php if ($user->id !== $logins['id']) : ?>
                <li class="list-inline-item mr-3">
                    <?= $this->Html->link('<i class="fa fa-envelope mr-1"></i> <small>メッセージ</small>',
                        'javascript:void(0)',
                        [
                            'escape'      => false,
                            'data-toggle' => 'modal',
                            'data-target' => '#modalMessageForm'
                        ]
                    ) ?>
                </li>
            <?php endif; ?>
            <li class="list-inline-item mr-3">
                <?= $this->Html->link('<i class="fa fa-user mr-1"></i> <small>プロフィール</small>',
                    $user->link,
                    ['target' => '_blank', 'escape' => false]
                ) ?>
            </li>
        </ul>
    </div>
    <div class="media mt-4 px-1">
        <?php
            if ($user->profile->icon) {
                print $this->Html->image($user->profile->icon, ['class' => 'card-img-100 d-flex z-depth-1 mr-3', 'alt' => 'ユーザーアイコン']);
            } else {
                print $this->Html->image('/img/sample/no_icon.jpg', ['class' => 'card-img-100 d-flex z-depth-1 mr-3', 'alt' => 'ユーザーアイコン']);
            }
        ?>
        <div class="media-body">
            <h5 class="font-weight-bold mt-0 blue-text">
                <?= h($user->username) ?>
            </h5>
            <p>
                <?= h($user->profile->self_intro) ?>
            </p>
            <?php if ($user->profile->facebook || $user->profile->twitter || $user->profile->instagram) : ?>
            <hr>
            <ul class="list-unstyled personal-sm ml-2">

                <?php
                    if ($user->profile->facebook) {
                        print $this->Html->link('<i class="fa fa-facebook"> </i>',
                            $user->profile->facebook,
                            [
                                'class'          => 'icons-sm fb-ic pr-2',
                                'escape'         => false,
                                'target'         => '_blank',
                                'data-toggle'    => 'tooltip',
                                'data-placement' => 'bottom',
                                'title'          => 'Facebook'
                            ]
                        );
                    }
                ?>

                <?php
                    if ($user->profile->twitter) {
                        print $this->Html->link('<i class="fa fa-twitter"> </i>',
                            $user->profile->twitter,
                            [
                                'class'          => 'icons-sm tw-ic pr-2',
                                'escape'         => false,
                                'target'         => '_blank',
                                'data-toggle'    => 'tooltip',
                                'data-placement' => 'bottom',
                                'title'          => 'Twitter'
                            ]
                        );
                    }
                ?>

                <?php
                    if ($user->profile->instagram) {
                        print $this->Html->link('<i class="fa fa-instagram"> </i>',
                            $user->profile->instagra,
                            [
                                'class'          => 'icons-sm ins-ic',
                                'escape'         => false,
                                'target'         => '_blank',
                                'data-toggle'    => 'tooltip',
                                'data-placement' => 'bottom',
                                'title'          => 'Instagram'
                            ]
                        );
                    }
                ?>
            </ul>
            <?php endif; ?>
        </div><!-- /.media-body -->
    </div><!-- /.media -->
</div><!-- /.card -->

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
