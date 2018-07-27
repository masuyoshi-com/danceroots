<?php $this->assign('title', '送信済みメッセージ一覧'); ?>

<div class="row pt-1">
    <div class="col-lg-12 text-center">
        <h3 class="dark-grey-text"><i class="fa fa-send"></i> 送信メッセージ</h3>
        <small><i class="fa fa-info-circle"></i> メッセージ一覧で各種操作が行えます。</small>
    </div>
</div>

<hr>

<div class="card card-body pt-4 mb-3">
    <div class="row">
        <div class="col-lg-12">

            <ul class="nav nav-tabs nav-justified blue-gradient" role="tablist">
                <li class="nav-item">
                    <?= $this->Html->link('<i class="fa fa-inbox"></i> 受信箱',
                            ['action' => 'index', $logins['id']],
                            ['class' => 'nav-link', 'escape' => false]
                    ) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('<i class="fa fa-send"></i> 送信箱',
                            ['action' => 'outbox', $logins['id']],
                            ['class' => 'nav-link active', 'escape' => false]
                    ) ?>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade in show active" role="tabpanel">

                    <?= $this->Flash->render() ?>

                    <?php if ($from_messages) : ?>

                        <div class="row">
                            <div class="col-lg-12 mt-2">
                                <p class="dark-gray-text text-right">
                                    <small>
                                        <?= $this->Paginator->counter('{{page}} / {{pages}} ページ &nbsp; 全 {{count}} 件') ?>
                                    </small>
                                </p>
                                <hr class="mb-0">
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 15%;">To</th>
                                    <th style="width: 50%;">タイトル</th>
                                    <th style="width: 15%;">
                                        <?= $this->Paginator->sort('Date', '送信日') ?>
                                        <span class="none"><i class="fa fa-sort"></i></span>
                                    </th>
                                    <th class="text-center none" style="width: 20%;">アクション</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($from_messages as $from) : ?>
                                    <tr>
                                        <td>
                                            <?php
                                                if (isset($from->to_username[0]->username)) {
                                                    print h($from->to_username[0]->username);
                                                } else {
                                                    print '退会済みユーザー';
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?= $this->Html->link(h($from->title), ['action' => 'out_view', h($from->id)],
                                                    [
                                                        'data-toggle'    => 'tooltip',
                                                        'data-placement' => 'bottom',
                                                        'title'          => '内容を見る'
                                                    ]
                                            ) ?>
                                        </td>
                                        <td><?= h($from->created) ?></td>
                                        <td class="none text-center">
                                            <?= $this->Html->link('詳細',
                                                    ['action' => 'out_view', h($from->id)],
                                                    ['class'  => 'btn btn-sm btn-default']
                                            ) ?>
                                            <?= $this->Form->postLink('削除',
                                                    ['action' => 'from_delete', h($from->id)],
                                                    [
                                                        'class'   => 'btn btn-sm btn-danger',
                                                        'confirm' => '本当に削除しますか？'
                                                    ]
                                            ) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

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
                            <div class="col-lg-12 mt-4">
                                <h5 class="text-center dark-grey-text">メッセージはありません。</h5>
                            </div>
                        </div>
                    <?php endif; ?>

                </div><!-- /.tab-pane -->
            </div><!-- /.tab-content -->
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->
</div><!-- /.card -->
