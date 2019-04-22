<?php $this->assign('title', '有名ストリートダンサー検索・一覧'); ?>

<div class="row">
    <div class="col-lg-12 col-md-12 pb-3">
        <div class="d-flex">
            <h6 class="h6-responsive font-weight-bold mb-0">
                <i class="fa fa-universal-access orange-text" aria-hidden="true"></i> FAMOUS STREET DANCER
                <span class="ml-1 grey-text none"><small>有名<span class="none">ストリート</span>ダンサー</small></span>
            </h6>
            <?php if (!isset($logins)) : ?>
                <p class="ml-auto mb-0">
                    <small>
                        <?= $this->Html->link('もっと機能を使う', ['controller' => 'Users', 'action' => 'signup']) ?>
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

<?php if (count($famousDancers) !== 0) : ?>

<div class="row text-center">
    <?php foreach ($famousDancers as $dancer) : ?>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mb-4">

        <div class="card card-body elegant-color white-text">

            <label class="mb-0">
                <small>Genre: </small><?= h($dancer->genre) ?>
            </label>

            <div class="avatar mx-auto my-3 mt-0">
                <a href="<?= $this->Url->build(['controller' => 'FamousDancers', 'action' => 'view', $dancer->user->username]) ?>">
                    <?php
                        if ($dancer->icon) {
                            print $this->Html->image($dancer->icon, ['class' => 'rounded-circle icon-150']);
                        } else {
                            print $this->Html->image('/img/sample/no_icon.jpg', ['class' => 'rounded-circle icon-150']);
                        }
                    ?>
                </a>
            </div>

            <h5 class="font-weight-bold">
                <strong>
                        <?= $this->Html->link($dancer->user->username, ['controller' => 'FamousDancers', 'action' => 'view', $dancer->user->username], ['class' => 'white-text']) ?>
                </strong>
            </h5>

            <?php if ($dancer->team_name) : ?>
            <p><small>Team:</small> <?= h($dancer->team_name) ?></p>
            <?php endif; ?>

            <hr class="white mt-0">

            <p class="text-right mb-0">
                <?= $this->Html->link('PROFILE<i class="fa fa-arrow-circle-right ml-2 white-text" aria-hideen="true"></i>',
                    ['controller' => 'FamousDancers', 'action' => 'view', $dancer->user->username],
                    ['class' => 'white-text', 'escape' => false]
                ) ?>

            </p>
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
