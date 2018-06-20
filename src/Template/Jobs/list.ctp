<?php $this->assign('title', 'マイ ダンス関連求人一覧') ?>

<div class="card card-cascade narrower">
    <div class="col-lg-12 mb-3">
        <div class="view gradient-card-header blue-gradient">
            <h2 class="h2-responsive mb-0">
                <i class="fa fa-briefcase"></i> マイ ダンス関連求人
            </h2>
            <p class="mb-0">
                <small class="none">
                    <i class="fa fa-info-circle"></i> 登録済みのダンス関連求人一覧です。
                </small>
            </p>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <?= $this->Html->link('<i class="fa fa-plus"></i> ダンサー求人登録',
                    ['controller' => 'Jobs', 'action' => 'add'],
                    ['class' => 'btn btn-outline-primary waves-effect btn-block', 'escape' => false]
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
<?php if (count($jobs) !== 0) : ?>

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
                <th style="width: 53%">求人タイトル</th>
                <th style="width: 33%">登録日</th>
                <th><span class="none">アクション</span></th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($jobs as $job) :  ?>
            <tr>
                <td>
                    <span class="badge badge-pill <?= getBadgeColor(h($job->category)) ?>"><?= h($job->category) ?></span>
                    <?php
                        if ($job->public_flag === 0) {
                            print '<span class="badge badge-success">公開</span>';
                        } else {
                            print '<span class="badge badge-danger">非公開</span>';
                        }
                    ?>
                    <br>
                    <?= $this->Html->link(h($job->title), ['action' => 'view', h($job->id)],
                        [
                            'data-toggle'    => 'tooltip',
                            'data-placement' => 'bottom',
                            'title'          => '内容を見る',
                        ]
                    ) ?>
                </td>
                <td>
                    <strong><?= h($job->created) ?></strong>
                </td>
                <td>
                    <?= $this->Html->link('<i class="fa fa-pencil-square fa-lg"></i>',
                        ['action' => 'view', h($job->id)],
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
                登録している求人はありません。
            </h6>
        </div>
    </div>
    <?php endif; ?>
</div>
