<?php $this->assign('title', 'ダンススタジオ・スクール検索'); ?>

<div class="row">
    <div class="col-lg-12 col-md-12 mb-2">
        <h6 class="h6-responsive font-weight-bold mb-0">DANCE STUDIO / SCHOOL
            <span class="ml-1 grey-text none"><small>ダンススタジオ<span class="none">・スクール</span>検索</small></span>
        </h6>
        <hr class="my-2">
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->

<?= $this->Form->create('', ['type' => 'get']) ?>
<div class="card p-3 mb-3">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-xs-12 mt-2">
            <?= $this->Form->control('pref',
                [
                    'id'      => 'f--genre',
                    'type'    => 'select',
                    'class'   => 'mdb-select colorful-select dropdown-primary',
                    'options' => $prefs,
                    'empty'   => '都道府県を選択'
                ]
            ) ?>
        </div>
        <div class="col-lg-3 col-md-6 col-xs-12 mt-2">
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
        <div class="col-lg-6 col-md-12 col-xs-12">
            <div class="form-inline md-form input-group mt-1 mb-2">
                <?= $this->Form->control('word', ['class' => 'form-control my-0', 'placeholder' => '検索']) ?>
                <?= $this->Form->button('<i class="fa fa-search"></i>',
                    [
                        'class'  => 'btn btn-primary ml-2 waves-effect waves-light',
                        'escape' => false,
                    ]
                ) ?>
            </div>
        </div>
    </div><!-- /.row -->
</div><!-- /.card -->
<?= $this->Form->end() ?>

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

<?php if (count($studios) !== 0) : ?>

<div class="row text-center">

    <?php foreach ($studios as $studio) : ?>
    <div class="col-lg-3 col-md-6 mb-4">

        <div class="card testimonial-card">
            <div class="view overlay">
                <?php
                    if ($studio->image1) {
                        print $this->Html->link($this->Html->image($studio->image1, ['class' => 'img-fluid']),
                            ['controller' => 'Studios', 'action' => 'view', $studio->user->username],
                            ['escape' => false]
                        );
                    } elseif ($studio->icon) {
                        print '
                            <div class="card-up indigo lighten-1">
                            </div>
                            <!-- Avatar -->
                            <div class="avatar mx-auto white">
                                ' . $this->Html->link($this->Html->image($studio->icon, ['class' => 'rounded-circle']),
                                    ['controller' => 'Studios', 'action' => 'view', $studio->user->username],
                                    ['escape' => false]
                                ) . '
                            </div>
                        ';
                    } else {
                        print $this->Html->image('/img/sample/noimage-600x360.jpg', ['class' => 'img-fluid']);
                    }
                ?>
            </div>
            <div class="card-body">
                <p>
                    <span class="badge indigo"><?= h($studio->pref . ' ' . $studio->city) ?></span>
                    <span class="badge badge-success"><?= h($studio->main_genre) ?></span>
                </p>
                <a href="<?= $this->Url->build(['action' => 'view', h($studio->user->username)], ['class' => 'dark-grey-text']) ?>">
                    <h5 class="card-title mb-1 mt-4 black-text">
                        <strong>
                            <?= h($studio->studio_name) ?>
                        </strong>
                    </h5>
                    <hr>
                    <p class="blue-text">
                        <small><?= h($studio->self_intro) ?></small>
                    </p>
                </a>
                <?php if ($studio->station) : ?>
                    <p class="dark-grey-text mt-3"><small>最寄り駅: <?= h($studio->station) ?></small></p>
                <?php endif; ?>
                <p class="dark-grey-text">
                    <small>
                        <span class="mr-3">体験: <?= ($studio->ex_lesson === 0) ? 'あり' : 'なし'; ?></span>
                        <?php
                            if ($studio->entry_fee) {
                                print '入: ' . h($studio->entry_fee);
                            }
                        ?>
                    </small>
                </p>
                <?php if ($studio->monthly_tax) : ?>
                    <p class="dark-grey-text">
                        <small>
                            受: <?= h($studio->monthly_tax) ?>
                        </small>
                    </p>
                <?php endif; ?>
                <hr>
                <?php if ($studio->facebook || $studio->twitter || $studio->instagram) : ?>
                <ul class="list-unstyled personal-sm mb-0">

                    <?php
                        if ($studio->facebook) {
                            print $this->Html->link('<i class="fa fa-facebook"> </i>',
                                h($studio->facebook),
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
                        if ($studio->twitter) {
                            print $this->Html->link('<i class="fa fa-twitter"> </i>',
                                h($studio->twitter),
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
                        if ($studio->instagram) {
                            print $this->Html->link('<i class="fa fa-instagram"> </i>',
                                h($studio->instagram),
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
            </div><!-- /.card-body -->
        </div><!-- /.card -->
    </div><!-- /.col-lg-3 -->
    <?php endforeach; ?>
</div><!-- /.row -->

<?php else : ?>
<div class="row">
    <div class="col-lg-12 text-center">
        検索結果はありません。
    </div>
</div>
<?php endif; ?>

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
