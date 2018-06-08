<div class="card card-cascade narrower">
    <div class="col-lg-12 mb-3">
        <div class="view gradient-card-header blue-gradient">
            <h2 class="h2-responsive mb-0">
                マイ ダンスチーム
            </h2>
            <p class="mb-0">
                <small>
                    <i class="fa fa-info-circle"></i> ダンスチーム作成・参加は最大5つまで
                </small>
            </p>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <?= $this->Html->link('<i class="fa fa-plus"></i> ダンスチーム登録',
                ['controller' => 'teams', 'action' => 'add'],
                ['class' => 'btn btn-outline-primary waves-effect btn-block', 'escape' => false]
                ) ?>
            </div>
        </div>
    </div>
</div>


<div class="card card-body mt-5">
    <table class="table table-hover table-bordered">

        <thead class="mdb-color darken-3">
            <tr class="text-white">
                <th style="width: 50%">ダンスチーム名</th>
                <th style="width: 30%">参加日</th>
                <th><span class="none">アクション</span></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-lg-3 col-md-12 col-xs-12">
                            <span class="badge pink">リーダー</span>
                            <span class="badge badge-success">公開</span>
                        </div>
                        <div class="col-lg-9 col-md-12 col-xs-12">
                            <?= $this->Html->link('世捨人',
                                ['action' => 'view'],
                                [
                                    'data-toggle'    => 'tooltip',
                                    'data-placement' => 'bottom',
                                    'title'          => '詳細を見る',
                                ]
                            ) ?>
                        </div>
                    </div>
                </td>
                <td>2018-05-13</td>
                <td>
                    <?= $this->Html->link('<i class="fa fa-pencil-square fa-lg"></i>', ['action' => 'edit'],
                        [
                            'data-toggle'    => 'tooltip',
                            'data-placement' => 'bottom',
                            'title'          => '編集する',
                            'escape' => false
                        ]
                    ) ?>
                    &nbsp;
                    <?= $this->Html->link('<i class="fa fa-envelope fa-lg"></i>',
                        ['controller' => 'messages', 'action' => 'circle_message'],
                        [
                            'data-toggle'    => 'tooltip',
                            'data-placement' => 'bottom',
                            'title'          => 'メンバーにメッセージ',
                            'escape' => false
                        ]
                    ) ?>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="row">
                        <div class="col-lg-3 col-md-12 col-xs-12">
                            <span class="badge badge-primary">参加</span>
                        </div>
                        <div class="col-lg-9 col-md-12 col-xs-12">
                            <?= $this->Html->link('UP-STAIRS',
                                ['action' => 'view'],
                                [
                                    'data-toggle'    => 'tooltip',
                                    'data-placement' => 'bottom',
                                    'title'          => '詳細を見る',
                                ]
                            ) ?>
                        </div>
                    </div>
                </td>
                <td>2018-05-13</td>
                <td>
                    <?= $this->Html->link('<i class="fa fa-envelope fa-lg"></i>',
                        ['controller' => 'messages', 'action' => 'circle_message'],
                        [
                            'data-toggle'    => 'tooltip',
                            'data-placement' => 'bottom',
                            'title'          => 'メンバーにメッセージ',
                            'escape' => false
                        ]
                    ) ?>
                </td>
            </tr>

        </tbody>
    </table>
</div><!-- /.card -->
