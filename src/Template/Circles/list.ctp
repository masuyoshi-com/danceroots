<?php $this->assign('title', 'マイ ダンスサークル'); ?>

<div class="card card-cascade narrower">
    <div class="col-lg-12 mb-3">
        <div class="view gradient-card-header aqua-gradient">
            <h2 class="h2-responsive mb-0">
                <i class="fa fa-users" aria-hidden="true"></i> マイ ダンスサークル
            </h2>
            <p class="mb-0">
                <small>
                    <i class="fa fa-info-circle"></i> サークル作成・参加は各最大5つまで
                </small>
            </p>
        </div>
        <?php if (count($circles) < 5) : ?>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <?= $this->Html->link('<i class="fa fa-plus"></i> ダンスサークル登録',
                    ['controller' => 'Circles', 'action' => 'add', h($id)],
                    ['class' => 'btn btn-outline-primary waves-effect btn-block', 'escape' => false]
                ) ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<div class="row mt-3">
    <div class="col-lg-12">
        <?= $this->Flash->render() ?>
    </div>
</div>

<div class="card card-body mt-3 mb-3">
    <h6 class="font-weight-bold dark-gray-text">所有ダンスサークル</h6>
    <hr class="mt-0">
    <?php if (count($circles) !== 0) : ?>
    <table class="table table-hover table-bordered mb-5">
        <thead class="mdb-color darken-3">
            <tr class="text-white">
                <th style="width: 50%">サークル名</th>
                <th style="width: 30%">登録日</th>
                <th class="text-center"><span class="none">アクション</span></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($circles as $circle) : ?>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-lg-3 col-md-12 col-xs-12">
                            <?php
                                if ($circle->public_flag === 0) {
                                    print '<span class="badge badge-success">公開</span>';
                                } else {
                                    print '<span class="badge badge-danger">非公開</span>';
                                }
                            ?>
                        </div>
                        <div class="col-lg-9 col-md-12 col-xs-12">
                            <?= $this->Html->link($circle->name,
                                ['action' => 'view', h($circle->id), $logins['id']],
                                [
                                    'data-toggle'    => 'tooltip',
                                    'data-placement' => 'bottom',
                                    'title'          => 'サークル詳細',
                                ]
                            ) ?>
                        </div>
                    </div>
                </td>
                <td><?= h($circle->created) ?></td>
                <td>
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <?= $this->Html->link('<i class="fa fa-home fa-lg" aria-hidden="true"></i>
                                <span class="none"> サークルホーム</span>',
                                ['action' => 'home', h($circle->id), $logins['id']],
                                [
                                    'class'  => 'btn btn-sm btn-primary',
                                    'escape' => false
                                ]
                            ) ?>
                        </div>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else : ?>
    <div class="row">
        <div class="col-lg-12">
            <p class="text-center">
                登録しているサークルはありません。
            </p>
        </div>
    </div>
    <?php endif; ?>

    <h6 class="font-weight-bold dark-gray-text">参加ダンスサークル</h6>
    <hr class="mt-0">
    <?php if (count($circle_groups) !== 0) : ?>
    <table class="table table-hover table-bordered">
        <thead class="blue-grey">
            <tr class="text-white">
                <th style="width: 50%">サークル名</th>
                <th style="width: 30%">登録日</th>
                <th class="text-center"><span class="none">アクション</span></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($circle_groups as $group) : ?>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-lg-3 col-md-12 col-xs-12">
                            <?php
                                if ($group->auth_flag === 0) {
                                    print '<span class="badge badge-warning">承認待ち</span>';
                                } else {
                                    print '<span class="badge badge-primary">参加</span>';
                                }
                            ?>
                        </div>
                        <div class="col-lg-9 col-md-12 col-xs-12">
                            <?= $this->Html->link($group->circle->name,
                                ['action' => 'view', h($group->circle_id), $logins['id']],
                                [
                                    'data-toggle'    => 'tooltip',
                                    'data-placement' => 'bottom',
                                    'title'          => 'サークル詳細',
                                ]
                            ) ?>
                        </div>
                    </div>
                </td>
                <td><?= h($group->created) ?></td>
                <td>
                    <div class="row text-center">
                        <div class="col-lg-6 col-md-6 col-xs-12">
                            <?= $this->Html->link('<i class="fa fa-home fa-lg" aria-hidden="true"></i>',
                                ['action' => 'home', h($group->circle_id), h($group->user_id)],
                                [
                                    'data-toggle'    => 'tooltip',
                                    'data-placement' => 'bottom',
                                    'title'          => 'サークルホーム',
                                    'escape' => false
                                ]
                            ) ?>
                        </div>
                        <div class="col-lg-6 col-md-6 col-xs-12">
                            <?= $this->Form->postLink('<i class="fa fa-close fa-lg" aria-hidden="true"></i>',
                                ['controller' => 'CircleGroups', 'action' => 'delete', h($group->id)],
                                [
                                    'data-toggle'    => 'tooltip',
                                    'data-placement' => 'bottom',
                                    'title'          => '参加を取消',
                                    'escape'         => false,
                                    'confirm'        => 'サークル参加を取り消します。本当によろしいですか？'
                                ]
                            ) ?>
                        </div>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else : ?>
        <div class="row">
            <div class="col-lg-12">
                <p class="text-center">
                    参加しているサークルはありません。
                </p>
            </div>
        </div>
    <?php endif; ?>
</div><!-- /.card -->
