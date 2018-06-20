<?php $this->assign('title', 'マイ イベント一覧'); ?>

<div class="card card-cascade narrower">
    <div class="col-lg-12 mb-3">
        <div class="view gradient-card-header purple-gradient">
            <h2 class="h2-responsive mb-0">
                <i class="fa fa-calendar"></i> マイ イベント
            </h2>
            <p class="mb-0">
                <small class="none">
                    <i class="fa fa-info-circle"></i> 登録済みのイベント一覧です。
                </small>
            </p>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <?= $this->Html->link('<i class="fa fa-plus"></i> イベント新規登録',
                    ['controller' => 'Events', 'action' => 'add'],
                    ['class' => 'btn btn-outline-secondary waves-effect btn-block', 'escape' => false]
                ) ?>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-lg-12">
        <?= $this->Flash->render() ?>
    </div>
</div>

<div class="card card-body mt-1 mb-3">
    <?php if (count($events) !== 0) : ?>

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

    <table class="table table-hover table-bordered">

        <thead class="mdb-color darken-3">
            <tr class="text-white">
                <th style="width: 50%">イベント名</th>
                <th style="width: 30%">開催日時</th>
                <th><span class="none">アクション</span></th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($events as $event) :  ?>
            <tr>
                <td>
                    <span class="badge badge-pill <?= getBadgeColor(h($event->category)) ?>"><?= h($event->category) ?></span><br>
                    <?= $this->Html->link(h($event->event_name), ['action' => 'view', h($event->id)],
                        [
                            'data-toggle'    => 'tooltip',
                            'data-placement' => 'bottom',
                            'title'          => '内容を見る',
                        ]
                    ) ?>
                </td>
                <td>
                    <strong><?= h($event->event_date) ?></strong>
                    <br> Start:<?= h($event->start) ?><br> End:<?= h($event->end) ?>
                </td>
                <td>
                    <?= $this->Html->link('<i class="fa fa-pencil-square fa-lg"></i>',
                        ['action' => 'view', h($event->id)],
                        [
                            'data-toggle'    => 'tooltip',
                            'data-placement' => 'bottom',
                            'title'          => '詳細',
                            'escape'         => false
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
        <div class="col-lg-12">
            <h6 class="dark-gray-text text-center mt-2">
                登録しているイベントはありません。
            </h6>
        </div>
    </div>
    <?php endif; ?>
</div>
