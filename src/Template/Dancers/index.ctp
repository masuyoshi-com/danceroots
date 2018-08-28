<?php $this->assign('title', 'ストリートダンサー検索'); ?>

<div class="row">
    <div class="col-lg-12 col-md-12 mb-2">
        <h5 class="h5-responsive mb-0">
            <i class="fa fa-universal-access indigo-text" aria-hidden="true"></i>  ストリートダンサー検索
        </h5>
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
        <p class="dark-gray-text text-right">
            <small>
                <?= $this->Paginator->counter('{{page}} / {{pages}} ページ &nbsp; 全 {{count}} 件') ?>
            </small>
        </p>
        <hr>
    </div>
</div>

<?php if (count($dancers) !== 0) : ?>

<div class="row text-center">
    <?php foreach ($dancers as $dancer) : ?>
    <div class="col-lg-3 col-md-6 mb-4">

        <div class="card card-body">

            <label class="mb-0">
                <span class="badge purple darken-2"><?= h($dancer->pref) ?></span>
                <span class="badge indigo"><?= h($dancer->genre) ?></span>
            </label>

            <div class="avatar mx-auto my-3 mt-0">
                <a href="<?= $this->Url->build(['action' => 'view', $dancer->user->username]) ?>">
                    <?php
                        if ($dancer->icon) {
                            print $this->Html->image($dancer->icon, ['class' => 'rounded-circle img-fluid']);
                        } else {
                            print $this->Html->image('/img/sample/no_icon.jpg', ['class' => 'rounded-circle img-fluid']);
                        }
                    ?>
                </a>
            </div>

            <h5 class="font-weight-bold">
                <strong>
                        <?= $this->Html->link($dancer->user->username, ['action' => 'view', $dancer->user->username], ['class' => 'dark-grey-text']) ?>
                </strong>
            </h5>

            <?php if ($dancer->team_name) : ?>
            <p><small><?= h($dancer->team_name) ?></small></p>
            <?php endif; ?>

            <?php if ($dancer->facebook || $dancer->twitter || $dancer->instagram) : ?>
            <ul class="list-unstyled personal-sm">

                <?php
                    if ($dancer->facebook) {
                        print $this->Html->link('<i class="fa fa-facebook"> </i>',
                            h($dancer->facebook),
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
                    if ($dancer->twitter) {
                        print $this->Html->link('<i class="fa fa-twitter"> </i>',
                            h($dancer->twitter),
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
                    if ($dancer->instagram) {
                        print $this->Html->link('<i class="fa fa-instagram"> </i>',
                            h($dancer->instagram),
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
            <hr class="mt-0">
            <p class="dark-grey-text mb-0">
                <small>
                    <?= h($dancer->self_intro) ?>
                </small>
            </p>
        </div>
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
