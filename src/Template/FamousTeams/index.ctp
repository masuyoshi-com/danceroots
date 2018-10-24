<?php $this->assign('title', '有名ダンスチーム一覧'); ?>

<div class="row">
    <div class="col-lg-12 col-md-12 mb-2">
        <h6 class="h6-responsive font-weight-bold mb-0">
            <i class="fa fa-star orange-text" aria-hidden="true"></i> FAMOUS DANCE TEAM
            <span class="ml-1 grey-text none"><small>有名ダンスチーム一覧</small></span>
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

<?php if (count($famousTeams) !== 0) : ?>

<div class="row">

    <?php foreach ($famousTeams as $team) : ?>
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-4">
        <div class="card">
            <div class="view overlay">
                <?php
                    if ($team->image) {
                        print $this->Html->image($team->image, ['class' => 'card-img-top', 'alt' => $team->name . 'イメージ']);
                    } else {
                        print $this->Html->image('sample/noimage-600x360.jpg', ['class' => 'card-img-top', 'alt' => 'サンプルイメージ']);
                    }
                ?>
                <a>
                    <div class="mask rgba-white-slight"></div>
                </a>
            </div>
            <div class="card-body elegant-color white-text rounded-bottom">
                <div class="d-flex">
                    <div>
                        <h4 class="h4-responsive card-title"><?= h($team->name) ?></h4>
                    </div>
                    <div class="ml-auto">
                        <p class="activator waves-effect mr-4 mt-4 mb-0">
                            <small>
                                Genre: <?= h($team->genre) ?>
                            </small>
                        </p>
                    </div>
                </div>
                <hr class="hr-light mt-0">
                <p class="card-text white-text mb-4">
                    <?= tw(nl2br(h($team->style)), 70) ?>
                </p>
                <h5>
                    <?= $this->Html->link('PROFILE<i class="fa fa-angle-double-right ml-2"></i>',
                        ['controller' => 'FamousTeams', 'action' => 'view', $team->user->username],
                        ['class' => 'white-text d-flex justify-content-end', 'escape' => false]
                    )?>
                </h5>
            </div><!-- /.card-body -->
        </div><!-- /.card -->
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
