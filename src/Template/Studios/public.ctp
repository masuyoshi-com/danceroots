<?php $this->assign('title', '公開スタジオ検索'); ?>

<div class="row mt-5">
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 pt-3 pb-3">
        <div class="d-flex">
            <h6 class="h6-responsive font-weight-bold mb-0">
                <i class="fa fa-building dark-grey-text" aria-hidden="true"></i>  ダンススタジオ・スクール検索
            </h6>
            <?php if (!isset($logins)) : ?>
                <p class="ml-auto mb-0">
                    <small>
                        <?= $this->Html->link('スタジオ登録', ['controller' => 'Users', 'action' => 'signup']) ?>
                    </small>
                </p>
            <?php endif; ?>
        </div>
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
        <div class="col-lg-9 col-md-12">
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
                <a href="<?= $this->Url->build(['controller' => 'Studios', 'action' => 'publicView', h($studio->user->username)]) ?>">
                <?php
                    if ($studio->image1) {
                        print $this->Html->image($studio->image1, ['class' => 'img-fluid']);
                    } elseif ($studio->icon) {
                        print '
                            <div class="card-up indigo lighten-1">
                            </div>
                            <div class="avatar mx-auto white">
                                ' . $this->Html->image(h($studio->icon), ['class' => 'rounded-circle']) . '
                            </div>
                        ';
                    } else {
                        print $this->Html->image('/img/sample/noimage-600x360.jpg', ['class' => 'img-fluid']);
                    }
                ?>
                </a>
            </div>
            <div class="card-body">
                <p>
                    <span class="badge badge-success"><?= h($studio->pref) ?></span>
                    <span class="badge badge-info">Studio</span>
                </p>

                <a href="<?= $this->Url->build(['controller' => 'Studios', 'action' => 'publicView', h($studio->user->username)],
                    ['class' => 'dark-grey-text']) ?>">
                    <h5 class="card-title mb-1 dark-grey-text">
                        <strong>
                            <?= h($studio->studio_name) ?>
                        </strong>
                    </h5>
                    <p class="dark-grey-text">
                        <small>代表者: <?= h($studio->name) ?></small>
                    </p>
                    <p class="dark-grey-text"><small><?= h($studio->user->username) ?></small></p>
                </a>
                <?php if ($studio->station) : ?>
                    <p class="dark-grey-text"><small>最寄り駅: <?= h($studio->station) ?></small></p>
                <?php endif; ?>
                <?php if ($studio->facebook || $studio->twitter || $studio->instagram) : ?>
                <ul class="list-unstyled personal-sm">

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

                <hr>

                <p class="card-text">
                    <?= h($studio->self_intro) ?>
                </p>
            </div>
        </div>
    </div><!-- /.col-lg-3 -->
    <?php endforeach; ?>
</div><!-- /.row -->

<?php else : ?>
<div class="row">
    <div class="col-lg-12 text-center mt-5 mb-5">
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
