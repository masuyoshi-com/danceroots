<?php $this->assign('title', 'ダンスフォーラム'); ?>

<div class="row mt-5">
</div>

<div class="row mt-3">
    <div class="col-lg-12 col-md-12">
        <div class="d-flex">
            <div>
                <h6 class="h6-responsive font-weight-bold">
                    <i class="fa fa-comments cyan-text"></i> Dance Forum
                </h6>
            </div>
            <div class="ml-auto">
                <p class="m-0 grey-text"><small>フォーラム一覧</small></p>
            </div>
        </div>
        <hr class="mt-0">
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->

<?php if (AD === 0) : ?>
<div class="row">
    <div class="col-lg-12 text-center">
        <section id="dynamicContentWrapper-docsPanel" class="mb-3">
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



<?= $this->Form->create('', ['type' => 'get']) ?>
<div class="card card-body p-3 mb-3">
    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 mt-3">
            <?= $this->Form->control('category',
                [
                    'id'      => 'f--category',
                    'type'    => 'select',
                    'class'   => 'mdb-select colorful-select dropdown-primary',
                    'options' => $categories,
                    'empty'   => 'カテゴリを選択'
                ]
            ) ?>
        </div>
        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
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

<?php if (count($forums) !== 0) : ?>
<div class="row">
    <div class="col-lg-12">
        <div class="d-flex">
            <p class="pt-2">
                <small>
                <?php
                    if (!isset($logins['id'])) {
                        print $this->Html->link('もっと機能を使う', ['controller' => 'Users', 'action' => 'login']);
                    }
                ?>
                </small>
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

<div class="row">
    <div class="col-lg-12">
        <?= $this->Flash->render() ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th style="width: 30%;"><?= $this->Paginator->sort('user_id', 'ユーザー<span class="none"><i class="fa fa-sort ml-1"></span>', ['escape' => false]) ?></i></th>
                    <th style="width: 16%;"><span class="none"><?= $this->Paginator->sort('category', 'カテゴリ<i class="fa fa-sort ml-1">', ['escape' => false]) ?></span></th>
                    <th style="width: 54%;"><?= $this->Paginator->sort('title', 'タイトル<span class="none"><i class="fa fa-sort ml-1"></span>', ['escape' => false]) ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($forums as $forum): ?>
                <tr>
                    <td class="dark-grey-text">
                        <?php
                            if ($forum->anonymous_flag === 1) {
                                print '匿名ユーザー';
                            } else {
                                print h($forum->user->username);
                            }
                        ?>
                    </td>
                    <td><span class="badge <?= getBadgeColor($forum->category) ?>"><?= h($forum->category) ?></td>
                    <td>
                        <?= $this->Html->link($forum->title, ['controller' => 'Forums', 'action' => 'publicView', $forum->id], ['class' => 'blue-text']) ?>
                        <a class="comm-ic mr-3"><i class="fa fa-lg fa-comments mr-2"></i></a><span class="counter orange"><?= count(h($forum->forum_comments))?></span><br>
                        <?= h($forum->created->timeAgoInWords(['format' => 'MMM d, YYY', 'end' => '+1 year'])) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div><!-- /.col-lg-12 -->
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

    <div class="row mt-2 mb-2">
        <div class="col-lg-12">
            <?= $this->Flash->render() ?>
        </div>
    </div>
    <div class="card card-body mb-5">
        <div class="row">
            <div class="col-lg-12">
                <p class="dark-grey-text text-center m-0">スレッドはありません。</p>
            </div>
        </div>
    </div>

<?php endif; ?>
