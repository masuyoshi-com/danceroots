<?php $this->assign('title', 'サークルメッセージ一覧') ?>

<?= $this->Form->create('', ['type' => 'get']) ?>
<div class="card p-3 mb-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="form-inline md-form input-group mt-2 mb-2">
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
        <?= $this->Flash->render() ?>
    </div>
</div>

<div class="card card-cascade narrower mt-3 mb-4">

    <div class="view gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
        <div>
            <?= $this->Html->link('<i class="fa fa-home mt-0"></i>',
                    ['controller' => 'Circles', 'action' => 'home', h($circle->id), $logins['id']],
                    [
                        'class'          => 'btn btn-outline-white btn-rounded btn-sm px-2',
                        'data-toggle'    => 'tooltip',
                        'data-placement' => 'bottom',
                        'title'          => 'サークルホーム',
                        'escape'         => false
                    ]
            ) ?>
        </div>
        <a href="javascript:void(0)" class="white-text mx-3"><?= h($circle->name) ?> メッセージ一覧</a>
        <div>
            <?= $this->Html->link('<i class="fa fa-pencil mt-0"></i>',
                    ['controller' => 'CircleMessages', 'action' => 'add', h($circle->id), $logins['id']],
                    [
                        'class'          => 'btn btn-outline-white btn-rounded btn-sm px-2',
                        'data-toggle'    => 'tooltip',
                        'data-placement' => 'bottom',
                        'title'          => 'メッセージ作成',
                        'escape'         => false
                    ]
            ) ?>
        </div>
    </div><!-- /. gradient-card-header -->

    <div class="row px-4">
        <div class="col-lg-12">
            <p class="dark-gray-text text-right">
                <small>
                    <?= $this->Paginator->counter('{{page}} / {{pages}} ページ &nbsp; 全 {{count}} 件') ?>
                </small>
            </p>
            <hr>
        </div>
    </div>

    <div class="px-4">
        <div class="table-wrapper">
            <table class="table table-hover mb-5">
                <thead>
                    <tr>
                        <th class="th-lg" style="width: 20%;">ユーザー名</th>
                        <th class="th-lg" style="width: 60%;">タイトル</th>
                        <th class="th-lg" style="width: 20%;">
                            <?= $this->Paginator->sort('created', '登録日<i class="fa fa-sort ml-1"></i>', ['escape' => false]) ?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($circle_messages as $message) : ?>
                    <tr>
                        <td><?= h($message->user->username) ?></td>
                        <td>
                            <?= $this->Html->link(h($message->title), ['action' => 'view', h($message->id)],
                                [
                                    'data-toggle'    => 'tooltip',
                                    'data-placement' => 'bottom',
                                    'title'          => '内容を見る',
                                ]
                            ) ?>
                        </td>
                        <td><?= h($message->created) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div><!-- /.table-wrapper -->

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
    </div><!-- /.px-4 -->
</div><!-- /.card -->
