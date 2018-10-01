<?php $this->assign('title', 'マイ ダンスフォーラム'); ?>

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
        <div class="d-flex">
            <div>
                <h5 class="h5-responsive font-weight-bold">
                    <i class="fa fa-comments cyan-text"></i> My Dance Forums
                </h5>
            </div>
            <div class="ml-auto">
                <p class="m-0 grey-text"><small>マイ フォーラム</small></p>
            </div>
        </div>
        <hr class="mt-0">
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->

<?php if (count($forums) !== 0) : ?>
<div class="row">
    <div class="col-lg-12">
        <div class="d-flex">
            <p class="mb-0">
                <?= $this->Html->link('<i class="fa fa-plus"></i> スレッド作成', ['controller' => 'Forums', 'action' => 'add'],
                    ['class' => 'btn btn-sm btn-default', 'escape' => false]
                ) ?>
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

<div class="card card-body">
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
                    <?php foreach ($forums as $forum) : ?>
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
                            <?= $this->Html->link($forum->title, ['controller' => 'Forums', 'action' => 'view', $forum->id], ['class' => 'blue-text']) ?><br>
                            <?= h($forum->created->timeAgoInWords(['format' => 'MMM d, YYY', 'end' => '+1 year'])) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->
</div><!-- /.card -->

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

    <div class="row">
        <div class="col-lg-12">
            <p class="mb-0">
                <?= $this->Html->link('<i class="fa fa-plus"></i> スレッド作成', ['controller' => 'Forums', 'action' => 'add'],
                    ['class' => 'btn btn-sm btn-default', 'escape' => false]
                ) ?>
            </p>
        </div>
    </div>
    <div class="row mt-2 mb-2">
        <div class="col-lg-12">
            <?= $this->Flash->render() ?>
        </div>
    </div>
    <div class="card card-body">
        <div class="row">
            <div class="col-lg-12">
                <p class="dark-grey-text text-center m-0">スレッドはありません。</p>
            </div>
        </div>
    </div>

<?php endif; ?>
