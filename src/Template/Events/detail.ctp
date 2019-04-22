<?php $this->assign('title', 'イベント - ' . h($user->username) . 'さんのイベントリスト'); ?>

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
            <i class="fa fa-calendar pink-text"></i> <?= h($user->username) ?>さんのイベントリスト
        </h6>
        <hr>
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->

<div class="card card-body">
    <div class="card-header border-0 d-flex grey lighten-4" >
        <p class="font-weight-bold mr-4 mb-0">About Author</p>
        <ul class="ml-auto text-right list-unstyled list-inline mb-0">
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
                <?= $this->Html->link('<i class="fa fa-user mr-1"></i> <small>プロフィール</small>', $user->link, ['escape' => false]) ?>
            </li>
        </ul>
    </div>
    <div class="media mt-4 px-1">
        <?php
            if ($user->profile->icon) {
                print $this->Html->image($user->profile->icon, ['class' => 'icon-100 d-flex z-depth-1 mr-3', 'alt' => 'ユーザーアイコン']);
            } else {
                print $this->Html->image('/img/sample/no_icon.jpg', ['class' => 'icon-100 d-flex z-depth-1 mr-3', 'alt' => 'ユーザーアイコン']);
            }
        ?>
        <div class="media-body">
            <h5 class="font-weight-bold mt-0 blue-text">
                <?= $this->Html->link($user->username, $user->link) ?>
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
                            $user->profile->instagram,
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

<?php if (count($events) !== 0) : ?>

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
    <?php $i = 0; foreach($events as $event) : ?>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="card">
                <div class="view overlay">
                    <?php
                        if ($event->image) {
                            print $this->Html->image($event->image, ['class' => 'card-img-top', 'alt' => 'イベントイメージ']);
                        } else {
                            print $this->Html->image('/img/sample/noimage-600x360.jpg', ['class' => 'card-img-top', 'alt' => 'イベントイメージ']);
                        }
                    ?>
                    <a>
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>

                <?= $this->Html->link('<i class="fa fa-chevron-right pl-1"></i>',
                    ['controller' => 'Events', 'action' => 'view', $event->id],
                    ['class' => 'btn-floating btn-action ml-auto mr-4 mdb-color lighten-3', 'escape' => false]
                ) ?>

                <div class="card-body">
                    <p class='dark-grey-text'><small><?= h($event->pref) ?> <?= h($event->city) ?></small></p>
                    <h5 class="h5-responsive card-title"><?= h($event->event_name) ?></h5>
                    <hr>
                    <p class="card-text"><?= h($event->intro) ?></p>
                    <p class='dark-grey-text text-right m-0'>
                        <small><span class="badge <?= getBadgeColor(h($event->category)) ?>"><?= h($event->category) ?></span></small>
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
