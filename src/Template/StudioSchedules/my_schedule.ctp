<?php $this->assign('title', 'マイ レッスンスケジュール一覧'); ?>

<div class="row">
    <div class="col-lg-12 col-md-12 mb-2">
        <h5 class="h5-responsive font-weight-bold mb-0">
            <i class="fa fa-calendar" aria-hidden="true"></i>  My Lesson Schedules
        </h5>
        <hr class="my-2">
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <p>
            <?= $this->Html->link('<i class="fa fa-plus"></i> スケジュール登録', ['controller' => 'StudioSchedules', 'action' => 'add'],
                ['class' => 'btn btn-sm btn-primary', 'escape' => false]
            ) ?>
        </p>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <?= $this->Flash->render() ?>
    </div>
</div>

<div class="card card-body mb-3 none">
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered">
                <thead class="blue-gradient white-text">
                    <tr class="text-center">
                        <th style="width: 5.5%;"></th>
                        <th class="font-weight-bold" style="width: 13.5%;">SUN</th>
                        <th class="font-weight-bold" style="width: 13.5%;">MON</th>
                        <th class="font-weight-bold" style="width: 13.5%;">TUE</th>
                        <th class="font-weight-bold" style="width: 13.5%;">WED</th>
                        <th class="font-weight-bold" style="width: 13.5%;">THU</th>
                        <th class="font-weight-bold" style="width: 13.5%;">FRI</th>
                        <th class="font-weight-bold" style="width: 13.5%;">SAT</th>
                    </tr>
                </thead>

                <tbody class="text-center">
                    <?php for ($i = 0; $i < count($times); $i++) : ?>
                        <tr>
                            <!-- 時刻 -->
                            <td class="font-weight-bold grey lighten-5"><?= $times[$i] ?></td>

                            <!-- 日 -->
                            <!-- 指定時間に登録があるか -->
                            <?php if ($times[$i] === $suns[$times[$i]]['start']) : ?>
                                <!-- modal -->
                                <div class="modal fade instructor" id="sun--instructor<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body pt-4 pb-4">

                                                <div class="d-flex">
                                                    <div class="p-0">
                                                        <h6 class="font-weight-bold m-3">
                                                            <i class="fa fa-universal-access indigo-text" aria-hidden="true"></i> Instructor Information
                                                        </h6>
                                                    </div>
                                                    <div class="ml-auto pt-3 pr-2">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <hr class="mt-0">
                                                <div class="row">
                                                    <div class="col-lg-5 text-center">
                                                        <h3>
                                                            <?php
                                                                if ($suns[$times[$i]]['image']) {
                                                                    print $this->Html->image($suns[$times[$i]]['image'], ['class' => 'img-fluid z-depth-2']);
                                                                } else {
                                                                    print $this->Html->image('/img/sample/no_icon.jpg', ['class' => 'img-fluid']);
                                                                }
                                                            ?>
                                                        </h3>
                                                    </div>
                                                    <div class="col-lg-7 text-center">
                                                        <h2 class="h2-responsive product-name mt-3">
                                                          <strong><?= h($suns[$times[$i]]['name']) ?></strong>
                                                        </h2>
                                                        <?php if ($suns[$times[$i]]['team']) : ?>
                                                            <h3 class="h3-responsive dark-gray-text"><small>Team:</small> <?= h($suns[$times[$i]]['team']) ?></h3>
                                                        <?php endif; ?>
                                                        <p>
                                                            <small>ジャンル: <strong><?= h($suns[$times[$i]]['genre']) ?></strong></small>
                                                        </p>
                                                        <p class="font-weight-bold">
                                                            <i class="fa fa-clock-o" aria-hidden="true"></i> <?= h($suns[$times[$i]]['start']) ?> ～ <?= h($suns[$times[$i]]['end']) ?>
                                                        </p>
                                                        <p>
                                                            <small><?= h($suns[$times[$i]]['difficulty']) ?></small>
                                                        </p>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <?php if ($suns[$times[$i]]['comment']) : ?>
                                                                    <p class="dark-grey-text">
                                                                        <small>
                                                                            <?= h($suns[$times[$i]]['comment']) ?>
                                                                        </small>
                                                                    </p>
                                                                <?php endif; ?>
                                                                <?php if ($suns[$times[$i]]['profile']) : ?>
                                                                    <p>
                                                                        <?= $this->Html->link('プロフィール詳細', $suns[$times[$i]]['profile'],
                                                                            ['class' => 'btn btn-sm btn-rounded btn-default waves-effect', 'target' => '_blank', 'escape' => false]
                                                                        ) ?>
                                                                    </p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div><!-- /.row -->
                                                    </div><!-- /.col-lg-7 -->
                                                </div><!-- /.row -->
                                                <?php if ($suns[$times[$i]]['youtube']) : ?>
                                                    <hr class="m-0">
                                                    <div class="row">
                                                        <div class="col-lg-12 p-4">
                                                            <h6 class="font-weight-bold text-left"><i class="fa fa-youtube-play yt-ic"></i> Dance Video</h6>
                                                            <div class="embed-responsive embed-responsive-16by9">
                                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= h($suns[$times[$i]]['youtube']) ?>?rel=0" allowfullscreen></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div><!-- /.modal-body -->
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->

                                <!-- 1時間か1時間半かでrowspanが変化する -->
                                <?php if ($suns[$times[$i]]['time'] === '1 hour') : ?>
                                    <td rowspan="2" class="grey lighten-4">
                                <?php else : ?>
                                    <td rowspan="3" class="grey lighten-4">
                                <?php endif; ?>
                                    <div class="card card-body">
                                        <label class="mb-0">
                                            <span class="badge <?= getBadgeColor($suns[$times[$i]]['genre']) ?>"><?= h($suns[$times[$i]]['genre']) ?></span>
                                        </label>

                                        <div class="avatar mx-auto my-3 mt-0">
                                            <?php
                                                if ($suns[$times[$i]]['image']) {
                                                    print $this->Html->link($this->Html->image($suns[$times[$i]]['image'], ['class' => 'img-fluid']), 'javascript:void(0)',
                                                        [
                                                            'data-toggle' => 'modal',
                                                            'data-target' => '#sun--instructor' . $i,
                                                            'escape'      => false
                                                        ]
                                                    );
                                                } else {
                                                    print $this->Html->link($this->Html->image('/img/sample/no_icon.jpg', ['class' => 'img-fluid']), 'javascript:void(0)',
                                                        [
                                                            'data-toggle' => 'modal',
                                                            'data-target' => '#sun--instructor' . $i,
                                                            'escape'      => false
                                                        ]
                                                    );
                                                }
                                            ?>
                                        </div>
                                        <h5 class="card-title font-weight-bold">
                                            <?= $this->Html->link($suns[$times[$i]]['name'], 'javascript:void(0)',
                                                [
                                                    'class'       => 'dark-grey-text',
                                                    'data-toggle' => 'modal',
                                                    'data-target' => '#sun--instructor' . $i
                                                ]
                                            ) ?>
                                        </h5>
                                        <?php if ($suns[$times[$i]]['team']) : ?>
                                            <p class="dark-grey-text mb-0"><?= h($suns[$times[$i]]['team']) ?></p>
                                        <?php endif; ?>
                                        <hr>
                                        <p class="font-weight-bold m-0"><?= h($suns[$times[$i]]['start']) ?> ～ <?= h($suns[$times[$i]]['end']) ?></p>
                                        <p class="m-0"><?= h($suns[$times[$i]]['difficulty']) ?></p>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lx-6 col-md-6 col-xs-12">
                                                <p class="m-0">
                                                    <?= $this->Html->link('<i class="fa fa-lg fa-edit indigo-text" aria-hidden="true"></i>',
                                                        ['controller' => 'StudioSchedules', 'action' => 'edit', $suns[$times[$i]]['id']],
                                                        [
                                                            'data-toggle'    => 'tooltip',
                                                            'data-placement' => 'bottom',
                                                            'title'          => '編集',
                                                            'escape'         => false
                                                        ])
                                                    ?>
                                                </p>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-xs-12">
                                                <p class="m-0">
                                                    <?= $this->Form->postLink('<i class="fa fa-lg fa-trash red-text" aria-hidden="true"></i>',
                                                        ['controller' => 'StudioSchedules', 'action' => 'delete', $suns[$times[$i]]['id']],
                                                        [
                                                            'data-toggle'    => 'tooltip',
                                                            'data-placement' => 'bottom',
                                                            'title'          => '削除',
                                                            'escape'         => false,
                                                            'confirm'        => 'スケジュールを削除します。よろしいですか？'
                                                        ])
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            <?php elseif ($suns[$times[$i]] !== 1) : ?>
                                <td></td>
                            <?php endif; ?>

                            <!-- 月 -->
                            <?php if ($times[$i] === $mons[$times[$i]]['start']) : ?>
                                <!-- modal -->
                                <div class="modal fade instructor" id="mon--instructor<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body pt-4 pb-4">

                                                <div class="d-flex">
                                                    <div class="p-0">
                                                        <h6 class="font-weight-bold m-3">
                                                            <i class="fa fa-universal-access indigo-text" aria-hidden="true"></i> Instructor Information
                                                        </h6>
                                                    </div>
                                                    <div class="ml-auto pt-3 pr-2">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <hr class="mt-0">
                                                <div class="row">
                                                    <div class="col-lg-5 text-center">
                                                        <h3>
                                                            <?php
                                                                if ($mons[$times[$i]]['image']) {
                                                                    print $this->Html->image($mons[$times[$i]]['image'], ['class' => 'img-fluid z-depth-2']);
                                                                } else {
                                                                    print $this->Html->image('/img/sample/no_icon.jpg', ['class' => 'img-fluid']);
                                                                }
                                                            ?>
                                                        </h3>
                                                    </div>
                                                    <div class="col-lg-7 text-center">
                                                        <h2 class="h2-responsive product-name mt-3">
                                                          <strong><?= h($mons[$times[$i]]['name']) ?></strong>
                                                        </h2>
                                                        <?php if ($mons[$times[$i]]['team']) : ?>
                                                            <h3 class="h3-responsive dark-gray-text"><small>Team:</small> <?= h($mons[$times[$i]]['team']) ?></h3>
                                                        <?php endif; ?>
                                                        <p>
                                                            <small>ジャンル: <strong><?= h($mons[$times[$i]]['genre']) ?></strong></small>
                                                        </p>
                                                        <p class="font-weight-bold">
                                                            <i class="fa fa-clock-o" aria-hidden="true"></i> <?= h($mons[$times[$i]]['start']) ?> ～ <?= h($mons[$times[$i]]['end']) ?>
                                                        </p>
                                                        <p>
                                                            <small><?= h($mons[$times[$i]]['difficulty']) ?></small>
                                                        </p>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <?php if ($mons[$times[$i]]['comment']) : ?>
                                                                    <p class="dark-grey-text">
                                                                        <small>
                                                                            <?= h($mons[$times[$i]]['comment']) ?>
                                                                        </small>
                                                                    </p>
                                                                <?php endif; ?>
                                                                <?php if ($mons[$times[$i]]['profile']) : ?>
                                                                    <p>
                                                                        <?= $this->Html->link('プロフィール詳細', $mons[$times[$i]]['profile'],
                                                                            ['class' => 'btn btn-sm btn-rounded btn-default waves-effect', 'target' => '_blank', 'escape' => false]
                                                                        ) ?>
                                                                    </p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div><!-- /.row -->
                                                    </div><!-- /.col-lg-7 -->
                                                </div><!-- /.row -->
                                                <?php if ($mons[$times[$i]]['youtube']) : ?>
                                                    <hr class="m-0">
                                                    <div class="row">
                                                        <div class="col-lg-12 p-4">
                                                            <h6 class="font-weight-bold text-left"><i class="fa fa-youtube-play yt-ic"></i> Dance Video</h6>
                                                            <div class="embed-responsive embed-responsive-16by9">
                                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= h($mons[$times[$i]]['youtube']) ?>?rel=0" allowfullscreen></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div><!-- /.modal-body -->
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->

                                <?php if ($mons[$times[$i]]['time'] === '1 hour') : ?>
                                    <td rowspan="2" class="grey lighten-4">
                                <?php else : ?>
                                    <td rowspan="3" class="grey lighten-4">
                                <?php endif; ?>
                                    <div class="card card-body">
                                        <label class="mb-0">
                                            <span class="badge <?= getBadgeColor($mons[$times[$i]]['genre']) ?>"><?= h($mons[$times[$i]]['genre']) ?></span>
                                        </label>

                                        <div class="avatar mx-auto my-3 mt-0">
                                            <?php
                                                if ($mons[$times[$i]]['image']) {
                                                    print $this->Html->link($this->Html->image($mons[$times[$i]]['image'], ['class' => 'img-fluid']), 'javascript:void(0)',
                                                        [
                                                            'data-toggle' => 'modal',
                                                            'data-target' => '#mon--instructor' . $i,
                                                            'escape'      => false
                                                        ]
                                                    );
                                                } else {
                                                    print $this->Html->link($this->Html->image('/img/sample/no_icon.jpg', ['class' => 'img-fluid']), 'javascript:void(0)',
                                                        [
                                                            'data-toggle' => 'modal',
                                                            'data-target' => '#mon--instructor' . $i,
                                                            'escape'      => false
                                                        ]
                                                    );
                                                }
                                            ?>
                                        </div>
                                        <h5 class="card-title font-weight-bold">
                                            <?= $this->Html->link($mons[$times[$i]]['name'], 'javascript:void(0)',
                                                [
                                                    'class'       => 'dark-grey-text',
                                                    'data-toggle' => 'modal',
                                                    'data-target' => '#mon--instructor' . $i
                                                ]
                                            ) ?>
                                        </h5>
                                        <?php if ($mons[$times[$i]]['team']) : ?>
                                            <p class="dark-grey-text mb-0"><?= h($mons[$times[$i]]['team']) ?></p>
                                        <?php endif; ?>
                                        <hr>
                                        <p class="font-weight-bold m-0"><?= h($mons[$times[$i]]['start']) ?> ～ <?= h($mons[$times[$i]]['end']) ?></p>
                                        <p class="m-0"><?= h($mons[$times[$i]]['difficulty']) ?></p>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lx-6 col-md-6 col-xs-12">
                                                <p class="m-0">
                                                    <?= $this->Html->link('<i class="fa fa-lg fa-edit indigo-text" aria-hidden="true"></i>',
                                                        ['controller' => 'StudioSchedules', 'action' => 'edit', $mons[$times[$i]]['id']],
                                                        [
                                                            'data-toggle'    => 'tooltip',
                                                            'data-placement' => 'bottom',
                                                            'title'          => '編集',
                                                            'escape'         => false
                                                        ])
                                                    ?>
                                                </p>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-xs-12">
                                                <p class="m-0">
                                                    <?= $this->Form->postLink('<i class="fa fa-lg fa-trash red-text" aria-hidden="true"></i>',
                                                        ['controller' => 'StudioSchedules', 'action' => 'delete', $mons[$times[$i]]['id']],
                                                        [
                                                            'data-toggle'    => 'tooltip',
                                                            'data-placement' => 'bottom',
                                                            'title'          => '削除',
                                                            'escape'         => false,
                                                            'confirm'        => 'スケジュールを削除します。よろしいですか？'
                                                        ])
                                                    ?>
                                                </p>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.card -->
                                </td>
                            <?php elseif ($mons[$times[$i]] !== 1) : ?>
                                <td></td>
                            <?php endif; ?>

                            <!-- 火 -->
                            <?php if ($times[$i] === $tues[$times[$i]]['start']) : ?>
                                <!-- modal -->
                                <div class="modal fade instructor" id="tue--instructor<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body pt-4 pb-4">

                                                <div class="d-flex">
                                                    <div class="p-0">
                                                        <h6 class="font-weight-bold m-3">
                                                            <i class="fa fa-universal-access indigo-text" aria-hidden="true"></i> Instructor Information
                                                        </h6>
                                                    </div>
                                                    <div class="ml-auto pt-3 pr-2">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <hr class="mt-0">
                                                <div class="row">
                                                    <div class="col-lg-5 text-center">
                                                        <h3>
                                                            <?php
                                                                if ($tues[$times[$i]]['image']) {
                                                                    print $this->Html->image($tues[$times[$i]]['image'], ['class' => 'img-fluid z-depth-2']);
                                                                } else {
                                                                    print $this->Html->image('/img/sample/no_icon.jpg', ['class' => 'img-fluid']);
                                                                }
                                                            ?>
                                                        </h3>
                                                    </div>
                                                    <div class="col-lg-7 text-center">
                                                        <h2 class="h2-responsive product-name mt-3">
                                                          <strong><?= h($tues[$times[$i]]['name']) ?></strong>
                                                        </h2>
                                                        <?php if ($tues[$times[$i]]['team']) : ?>
                                                            <h3 class="h3-responsive dark-gray-text"><small>Team:</small> <?= h($tues[$times[$i]]['team']) ?></h3>
                                                        <?php endif; ?>
                                                        <p>
                                                            <small>ジャンル: <strong><?= h($tues[$times[$i]]['genre']) ?></strong></small>
                                                        </p>
                                                        <p class="font-weight-bold">
                                                            <i class="fa fa-clock-o" aria-hidden="true"></i> <?= h($tues[$times[$i]]['start']) ?> ～ <?= h($tues[$times[$i]]['end']) ?>
                                                        </p>
                                                        <p>
                                                            <small><?= h($tues[$times[$i]]['difficulty']) ?></small>
                                                        </p>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <?php if ($tues[$times[$i]]['comment']) : ?>
                                                                    <p class="dark-grey-text">
                                                                        <small>
                                                                            <?= h($tues[$times[$i]]['comment']) ?>
                                                                        </small>
                                                                    </p>
                                                                <?php endif; ?>
                                                                <?php if ($tues[$times[$i]]['profile']) : ?>
                                                                    <p>
                                                                        <?= $this->Html->link('プロフィール詳細', $tues[$times[$i]]['profile'],
                                                                            ['class' => 'btn btn-sm btn-rounded btn-default waves-effect', 'target' => '_blank', 'escape' => false]
                                                                        ) ?>
                                                                    </p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div><!-- /.row -->
                                                    </div><!-- /.col-lg-7 -->
                                                </div><!-- /.row -->
                                                <?php if ($tues[$times[$i]]['youtube']) : ?>
                                                    <hr class="m-0">
                                                    <div class="row">
                                                        <div class="col-lg-12 p-4">
                                                            <h6 class="font-weight-bold text-left"><i class="fa fa-youtube-play yt-ic"></i> Dance Video</h6>
                                                            <div class="embed-responsive embed-responsive-16by9">
                                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= h($tues[$times[$i]]['youtube']) ?>?rel=0" allowfullscreen></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div><!-- /.modal-body -->
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->

                                <?php if ($tues[$times[$i]]['time'] === '1 hour') : ?>
                                    <td rowspan="2" class="grey lighten-4">
                                <?php else : ?>
                                    <td rowspan="3" class="grey lighten-4">
                                <?php endif; ?>
                                    <div class="card card-body">
                                        <label class="mb-0">
                                            <span class="badge <?= getBadgeColor($tues[$times[$i]]['genre']) ?>"><?= h($tues[$times[$i]]['genre']) ?></span>
                                        </label>

                                        <div class="avatar mx-auto my-3 mt-0">
                                            <?php
                                                if ($tues[$times[$i]]['image']) {
                                                    print $this->Html->link($this->Html->image($tues[$times[$i]]['image'], ['class' => 'img-fluid']), 'javascript:void(0)',
                                                        [
                                                            'data-toggle' => 'modal',
                                                            'data-target' => '#tue--instructor' . $i,
                                                            'escape'      => false
                                                        ]
                                                    );
                                                } else {
                                                    print $this->Html->link($this->Html->image('/img/sample/no_icon.jpg', ['class' => 'img-fluid']), 'javascript:void(0)',
                                                        [
                                                            'data-toggle' => 'modal',
                                                            'data-target' => '#tue--instructor' . $i,
                                                            'escape'      => false
                                                        ]
                                                    );
                                                }
                                            ?>
                                        </div>
                                        <h5 class="card-title font-weight-bold">
                                            <?= $this->Html->link($tues[$times[$i]]['name'], 'javascript:void(0)',
                                                [
                                                    'class'       => 'dark-grey-text',
                                                    'data-toggle' => 'modal',
                                                    'data-target' => '#tue--instructor' . $i
                                                ]
                                            ) ?>
                                        </h5>
                                        <?php if ($tues[$times[$i]]['team']) : ?>
                                            <p class="dark-grey-text mb-0"><?= h($tues[$times[$i]]['team']) ?></p>
                                        <?php endif; ?>
                                        <hr>
                                        <p class="font-weight-bold m-0"><?= h($tues[$times[$i]]['start']) ?> ～ <?= h($tues[$times[$i]]['end']) ?></p>
                                        <p class="m-0"><?= h($tues[$times[$i]]['difficulty']) ?></p>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lx-6 col-md-6 col-xs-12">
                                                <p class="m-0">
                                                    <?= $this->Html->link('<i class="fa fa-lg fa-edit indigo-text" aria-hidden="true"></i>',
                                                        ['controller' => 'StudioSchedules', 'action' => 'edit', $tues[$times[$i]]['id']],
                                                        [
                                                            'data-toggle'    => 'tooltip',
                                                            'data-placement' => 'bottom',
                                                            'title'          => '編集',
                                                            'escape'         => false
                                                        ])
                                                    ?>
                                                </p>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-xs-12">
                                                <p class="m-0">
                                                    <?= $this->Form->postLink('<i class="fa fa-lg fa-trash red-text" aria-hidden="true"></i>',
                                                        ['controller' => 'StudioSchedules', 'action' => 'delete', $tues[$times[$i]]['id']],
                                                        [
                                                            'data-toggle'    => 'tooltip',
                                                            'data-placement' => 'bottom',
                                                            'title'          => '削除',
                                                            'escape'         => false,
                                                            'confirm'        => 'スケジュールを削除します。よろしいですか？'
                                                        ])
                                                    ?>
                                                </p>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.card -->
                                </td>
                            <?php elseif ($tues[$times[$i]] !== 1) : ?>
                                <td></td>
                            <?php endif; ?>

                            <!-- 水 -->
                            <?php if ($times[$i] === $weds[$times[$i]]['start']) : ?>
                                <!-- modal -->
                                <div class="modal fade instructor" id="wed--instructor<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body pt-4 pb-4">

                                                <div class="d-flex">
                                                    <div class="p-0">
                                                        <h6 class="font-weight-bold m-3">
                                                            <i class="fa fa-universal-access indigo-text" aria-hidden="true"></i> Instructor Information
                                                        </h6>
                                                    </div>
                                                    <div class="ml-auto pt-3 pr-2">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <hr class="mt-0">
                                                <div class="row">
                                                    <div class="col-lg-5 text-center">
                                                        <h3>
                                                            <?php
                                                                if ($weds[$times[$i]]['image']) {
                                                                    print $this->Html->image($weds[$times[$i]]['image'], ['class' => 'img-fluid z-depth-2']);
                                                                } else {
                                                                    print $this->Html->image('/img/sample/no_icon.jpg', ['class' => 'img-fluid']);
                                                                }
                                                            ?>
                                                        </h3>
                                                    </div>
                                                    <div class="col-lg-7 text-center">
                                                        <h2 class="h2-responsive product-name mt-3">
                                                          <strong><?= h($weds[$times[$i]]['name']) ?></strong>
                                                        </h2>
                                                        <?php if ($weds[$times[$i]]['team']) : ?>
                                                            <h3 class="h3-responsive dark-gray-text"><small>Team:</small> <?= h($weds[$times[$i]]['team']) ?></h3>
                                                        <?php endif; ?>
                                                        <p>
                                                            <small>ジャンル: <strong><?= h($weds[$times[$i]]['genre']) ?></strong></small>
                                                        </p>
                                                        <p class="font-weight-bold">
                                                            <i class="fa fa-clock-o" aria-hidden="true"></i> <?= h($weds[$times[$i]]['start']) ?> ～ <?= h($weds[$times[$i]]['end']) ?>
                                                        </p>
                                                        <p>
                                                            <small><?= h($weds[$times[$i]]['difficulty']) ?></small>
                                                        </p>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <?php if ($weds[$times[$i]]['comment']) : ?>
                                                                    <p class="dark-grey-text">
                                                                        <small>
                                                                            <?= h($weds[$times[$i]]['comment']) ?>
                                                                        </small>
                                                                    </p>
                                                                <?php endif; ?>
                                                                <?php if ($weds[$times[$i]]['profile']) : ?>
                                                                    <p>
                                                                        <?= $this->Html->link('プロフィール詳細', $weds[$times[$i]]['profile'],
                                                                            ['class' => 'btn btn-sm btn-rounded btn-default waves-effect', 'target' => '_blank', 'escape' => false]
                                                                        ) ?>
                                                                    </p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div><!-- /.row -->
                                                    </div><!-- /.col-lg-7 -->
                                                </div><!-- /.row -->
                                                <?php if ($weds[$times[$i]]['youtube']) : ?>
                                                    <hr class="m-0">
                                                    <div class="row">
                                                        <div class="col-lg-12 p-4">
                                                            <h6 class="font-weight-bold text-left"><i class="fa fa-youtube-play yt-ic"></i> Dance Video</h6>
                                                            <div class="embed-responsive embed-responsive-16by9">
                                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= h($weds[$times[$i]]['youtube']) ?>?rel=0" allowfullscreen></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div><!-- /.modal-body -->
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->

                                <?php if ($weds[$times[$i]]['time'] === '1 hour') : ?>
                                    <td rowspan="2" class="grey lighten-4">
                                <?php else : ?>
                                    <td rowspan="3" class="grey lighten-4">
                                <?php endif; ?>
                                    <div class="card card-body">
                                        <label class="mb-0">
                                            <span class="badge <?= getBadgeColor($weds[$times[$i]]['genre']) ?>"><?= h($weds[$times[$i]]['genre']) ?></span>
                                        </label>

                                        <div class="avatar mx-auto my-3 mt-0">
                                            <?php
                                                if ($weds[$times[$i]]['image']) {
                                                    print $this->Html->link($this->Html->image($weds[$times[$i]]['image'], ['class' => 'img-fluid']), 'javascript:void(0)',
                                                        [
                                                            'data-toggle' => 'modal',
                                                            'data-target' => '#wed--instructor' . $i,
                                                            'escape'      => false
                                                        ]
                                                    );
                                                } else {
                                                    print $this->Html->link($this->Html->image('/img/sample/no_icon.jpg', ['class' => 'img-fluid']), 'javascript:void(0)',
                                                        [
                                                            'data-toggle' => 'modal',
                                                            'data-target' => '#wed--instructor' . $i,
                                                            'escape'      => false
                                                        ]
                                                    );
                                                }
                                            ?>
                                        </div>
                                        <h5 class="card-title font-weight-bold">
                                            <?= $this->Html->link($weds[$times[$i]]['name'], 'javascript:void(0)',
                                                [
                                                    'class'       => 'dark-grey-text',
                                                    'data-toggle' => 'modal',
                                                    'data-target' => '#wed--instructor' . $i
                                                ]
                                            ) ?>
                                        </h5>
                                        <?php if ($weds[$times[$i]]['team']) : ?>
                                            <p class="dark-grey-text mb-0"><?= h($weds[$times[$i]]['team']) ?></p>
                                        <?php endif; ?>
                                        <hr>
                                        <p class="font-weight-bold m-0"><?= h($weds[$times[$i]]['start']) ?> ～ <?= h($weds[$times[$i]]['end']) ?></p>
                                        <p class="m-0"><?= h($weds[$times[$i]]['difficulty']) ?></p>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lx-6 col-md-6 col-xs-12">
                                                <p class="m-0">
                                                    <?= $this->Html->link('<i class="fa fa-lg fa-edit indigo-text" aria-hidden="true"></i>',
                                                        ['controller' => 'StudioSchedules', 'action' => 'edit', $weds[$times[$i]]['id']],
                                                        [
                                                            'data-toggle'    => 'tooltip',
                                                            'data-placement' => 'bottom',
                                                            'title'          => '編集',
                                                            'escape'         => false
                                                        ])
                                                    ?>
                                                </p>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-xs-12">
                                                <p class="m-0">
                                                    <?= $this->Form->postLink('<i class="fa fa-lg fa-trash red-text" aria-hidden="true"></i>',
                                                        ['controller' => 'StudioSchedules', 'action' => 'delete', $weds[$times[$i]]['id']],
                                                        [
                                                            'data-toggle'    => 'tooltip',
                                                            'data-placement' => 'bottom',
                                                            'title'          => '削除',
                                                            'escape'         => false,
                                                            'confirm'        => 'スケジュールを削除します。よろしいですか？'
                                                        ])
                                                    ?>
                                                </p>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.card -->
                                </td>
                            <?php elseif ($weds[$times[$i]] !== 1) : ?>
                                <td></td>
                            <?php endif; ?>

                            <!-- 木 -->
                            <?php if ($times[$i] === $thus[$times[$i]]['start']) : ?>
                                <!-- modal -->
                                <div class="modal fade instructor" id="thu--instructor<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body pt-4 pb-4">

                                                <div class="d-flex">
                                                    <div class="p-0">
                                                        <h6 class="font-weight-bold m-3">
                                                            <i class="fa fa-universal-access indigo-text" aria-hidden="true"></i> Instructor Information
                                                        </h6>
                                                    </div>
                                                    <div class="ml-auto pt-3 pr-2">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <hr class="mt-0">
                                                <div class="row">
                                                    <div class="col-lg-5 text-center">
                                                        <h3>
                                                            <?php
                                                                if ($thus[$times[$i]]['image']) {
                                                                    print $this->Html->image($thus[$times[$i]]['image'], ['class' => 'img-fluid z-depth-2']);
                                                                } else {
                                                                    print $this->Html->image('/img/sample/no_icon.jpg', ['class' => 'img-fluid']);
                                                                }
                                                            ?>
                                                        </h3>
                                                    </div>
                                                    <div class="col-lg-7 text-center">
                                                        <h2 class="h2-responsive product-name mt-3">
                                                          <strong><?= h($thus[$times[$i]]['name']) ?></strong>
                                                        </h2>
                                                        <?php if ($thus[$times[$i]]['team']) : ?>
                                                            <h3 class="h3-responsive dark-gray-text"><small>Team:</small> <?= h($thus[$times[$i]]['team']) ?></h3>
                                                        <?php endif; ?>
                                                        <p>
                                                            <small>ジャンル: <strong><?= h($thus[$times[$i]]['genre']) ?></strong></small>
                                                        </p>
                                                        <p class="font-weight-bold">
                                                            <i class="fa fa-clock-o" aria-hidden="true"></i> <?= h($thus[$times[$i]]['start']) ?> ～ <?= h($thus[$times[$i]]['end']) ?>
                                                        </p>
                                                        <p>
                                                            <small><?= h($thus[$times[$i]]['difficulty']) ?></small>
                                                        </p>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <?php if ($thus[$times[$i]]['comment']) : ?>
                                                                    <p class="dark-grey-text">
                                                                        <small>
                                                                            <?= h($thus[$times[$i]]['comment']) ?>
                                                                        </small>
                                                                    </p>
                                                                <?php endif; ?>
                                                                <?php if ($thus[$times[$i]]['profile']) : ?>
                                                                    <p>
                                                                        <?= $this->Html->link('プロフィール詳細', $thus[$times[$i]]['profile'],
                                                                            ['class' => 'btn btn-sm btn-rounded btn-default waves-effect', 'target' => '_blank', 'escape' => false]
                                                                        ) ?>
                                                                    </p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div><!-- /.row -->
                                                    </div><!-- /.col-lg-7 -->
                                                </div><!-- /.row -->
                                                <?php if ($thus[$times[$i]]['youtube']) : ?>
                                                    <hr class="m-0">
                                                    <div class="row">
                                                        <div class="col-lg-12 p-4">
                                                            <h6 class="font-weight-bold text-left"><i class="fa fa-youtube-play yt-ic"></i> Dance Video</h6>
                                                            <div class="embed-responsive embed-responsive-16by9">
                                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= h($thus[$times[$i]]['youtube']) ?>?rel=0" allowfullscreen></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div><!-- /.modal-body -->
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->

                                <?php if ($thus[$times[$i]]['time'] === '1 hour') : ?>
                                    <td rowspan="2" class="grey lighten-4">
                                <?php else : ?>
                                    <td rowspan="3" class="grey lighten-4">
                                <?php endif; ?>
                                    <div class="card card-body">
                                        <label class="mb-0">
                                            <span class="badge <?= getBadgeColor($thus[$times[$i]]['genre']) ?>"><?= h($thus[$times[$i]]['genre']) ?></span>
                                        </label>

                                        <div class="avatar mx-auto my-3 mt-0">
                                            <?php
                                                if ($thus[$times[$i]]['image']) {
                                                    print $this->Html->link($this->Html->image($thus[$times[$i]]['image'], ['class' => 'img-fluid']), 'javascript:void(0)',
                                                        [
                                                            'data-toggle' => 'modal',
                                                            'data-target' => '#thu--instructor' . $i,
                                                            'escape'      => false
                                                        ]
                                                    );
                                                } else {
                                                    print $this->Html->link($this->Html->image('/img/sample/no_icon.jpg', ['class' => 'img-fluid']), 'javascript:void(0)',
                                                        [
                                                            'data-toggle' => 'modal',
                                                            'data-target' => '#thu--instructor' . $i,
                                                            'escape'      => false
                                                        ]
                                                    );
                                                }
                                            ?>
                                        </div>
                                        <h5 class="card-title font-weight-bold">
                                            <?= $this->Html->link($thus[$times[$i]]['name'], 'javascript:void(0)',
                                                [
                                                    'class'       => 'dark-grey-text',
                                                    'data-toggle' => 'modal',
                                                    'data-target' => '#thu--instructor' . $i
                                                ]
                                            ) ?>
                                        </h5>
                                        <?php if ($thus[$times[$i]]['team']) : ?>
                                            <p class="dark-grey-text mb-0"><?= h($thus[$times[$i]]['team']) ?></p>
                                        <?php endif; ?>
                                        <hr>
                                        <p class="font-weight-bold m-0"><?= h($thus[$times[$i]]['start']) ?> ～ <?= h($thus[$times[$i]]['end']) ?></p>
                                        <p class="m-0"><?= h($thus[$times[$i]]['difficulty']) ?></p>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lx-6 col-md-6 col-xs-12">
                                                <p class="m-0">
                                                    <?= $this->Html->link('<i class="fa fa-lg fa-edit indigo-text" aria-hidden="true"></i>',
                                                        ['controller' => 'StudioSchedules', 'action' => 'edit', $thus[$times[$i]]['id']],
                                                        [
                                                            'data-toggle'    => 'tooltip',
                                                            'data-placement' => 'bottom',
                                                            'title'          => '編集',
                                                            'escape'         => false
                                                        ])
                                                    ?>
                                                </p>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-xs-12">
                                                <p class="m-0">
                                                    <?= $this->Form->postLink('<i class="fa fa-lg fa-trash red-text" aria-hidden="true"></i>',
                                                        ['controller' => 'StudioSchedules', 'action' => 'delete', $thus[$times[$i]]['id']],
                                                        [
                                                            'data-toggle'    => 'tooltip',
                                                            'data-placement' => 'bottom',
                                                            'title'          => '削除',
                                                            'escape'         => false,
                                                            'confirm'        => 'スケジュールを削除します。よろしいですか？'
                                                        ])
                                                    ?>
                                                </p>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.card -->
                                </td>
                            <?php elseif ($thus[$times[$i]] !== 1) : ?>
                                <td></td>
                            <?php endif; ?>

                            <!-- 金 -->
                            <?php if ($times[$i] === $fris[$times[$i]]['start']) : ?>
                                <!-- modal -->
                                <div class="modal fade instructor" id="fri--instructor<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body pt-4 pb-4">

                                                <div class="d-flex">
                                                    <div class="p-0">
                                                        <h6 class="font-weight-bold m-3">
                                                            <i class="fa fa-universal-access indigo-text" aria-hidden="true"></i> Instructor Information
                                                        </h6>
                                                    </div>
                                                    <div class="ml-auto pt-3 pr-2">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <hr class="mt-0">
                                                <div class="row">
                                                    <div class="col-lg-5 text-center">
                                                        <h3>
                                                            <?php
                                                                if ($fris[$times[$i]]['image']) {
                                                                    print $this->Html->image($fris[$times[$i]]['image'], ['class' => 'img-fluid z-depth-2']);
                                                                } else {
                                                                    print $this->Html->image('/img/sample/no_icon.jpg', ['class' => 'img-fluid']);
                                                                }
                                                            ?>
                                                        </h3>
                                                    </div>
                                                    <div class="col-lg-7 text-center">
                                                        <h2 class="h2-responsive product-name mt-3">
                                                          <strong><?= h($fris[$times[$i]]['name']) ?></strong>
                                                        </h2>
                                                        <?php if ($fris[$times[$i]]['team']) : ?>
                                                            <h3 class="h3-responsive dark-gray-text"><small>Team:</small> <?= h($fris[$times[$i]]['team']) ?></h3>
                                                        <?php endif; ?>
                                                        <p>
                                                            <small>ジャンル: <strong><?= h($fris[$times[$i]]['genre']) ?></strong></small>
                                                        </p>
                                                        <p class="font-weight-bold">
                                                            <i class="fa fa-clock-o" aria-hidden="true"></i> <?= h($fris[$times[$i]]['start']) ?> ～ <?= h($fris[$times[$i]]['end']) ?>
                                                        </p>
                                                        <p>
                                                            <small><?= h($fris[$times[$i]]['difficulty']) ?></small>
                                                        </p>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <?php if ($fris[$times[$i]]['comment']) : ?>
                                                                    <p class="dark-grey-text">
                                                                        <small>
                                                                            <?= h($fris[$times[$i]]['comment']) ?>
                                                                        </small>
                                                                    </p>
                                                                <?php endif; ?>
                                                                <?php if ($fris[$times[$i]]['profile']) : ?>
                                                                    <p>
                                                                        <?= $this->Html->link('プロフィール詳細', $fris[$times[$i]]['profile'],
                                                                            ['class' => 'btn btn-sm btn-rounded btn-default waves-effect', 'target' => '_blank', 'escape' => false]
                                                                        ) ?>
                                                                    </p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div><!-- /.row -->
                                                    </div><!-- /.col-lg-7 -->
                                                </div><!-- /.row -->
                                                <?php if ($fris[$times[$i]]['youtube']) : ?>
                                                    <hr class="m-0">
                                                    <div class="row">
                                                        <div class="col-lg-12 p-4">
                                                            <h6 class="font-weight-bold text-left"><i class="fa fa-youtube-play yt-ic"></i> Dance Video</h6>
                                                            <div class="embed-responsive embed-responsive-16by9">
                                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= h($fris[$times[$i]]['youtube']) ?>?rel=0" allowfullscreen></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div><!-- /.modal-body -->
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->

                                <?php if ($fris[$times[$i]]['time'] === '1 hour') : ?>
                                    <td rowspan="2" class="grey lighten-4">
                                <?php else : ?>
                                    <td rowspan="3" class="grey lighten-4">
                                <?php endif; ?>
                                    <div class="card card-body">
                                        <label class="mb-0">
                                            <span class="badge <?= getBadgeColor($fris[$times[$i]]['genre']) ?>"><?= h($fris[$times[$i]]['genre']) ?></span>
                                        </label>

                                        <div class="avatar mx-auto my-3 mt-0">
                                            <?php
                                                if ($fris[$times[$i]]['image']) {
                                                    print $this->Html->link($this->Html->image($fris[$times[$i]]['image'], ['class' => 'img-fluid']), 'javascript:void(0)',
                                                        [
                                                            'data-toggle' => 'modal',
                                                            'data-target' => '#fri--instructor' . $i,
                                                            'escape'      => false
                                                        ]
                                                    );
                                                } else {
                                                    print $this->Html->link($this->Html->image('/img/sample/no_icon.jpg', ['class' => 'img-fluid']), 'javascript:void(0)',
                                                        [
                                                            'data-toggle' => 'modal',
                                                            'data-target' => '#fri--instructor' . $i,
                                                            'escape'      => false
                                                        ]
                                                    );
                                                }
                                            ?>
                                        </div>
                                        <h5 class="card-title font-weight-bold">
                                            <?= $this->Html->link($fris[$times[$i]]['name'], 'javascript:void(0)',
                                                [
                                                    'class'       => 'dark-grey-text',
                                                    'data-toggle' => 'modal',
                                                    'data-target' => '#fri--instructor' . $i
                                                ]
                                            ) ?>
                                        </h5>
                                        <?php if ($fris[$times[$i]]['team']) : ?>
                                            <p class="dark-grey-text mb-0"><?= h($fris[$times[$i]]['team']) ?></p>
                                        <?php endif; ?>
                                        <hr>
                                        <p class="font-weight-bold m-0"><?= h($fris[$times[$i]]['start']) ?> ～ <?= h($fris[$times[$i]]['end']) ?></p>
                                        <p class="m-0"><?= h($fris[$times[$i]]['difficulty']) ?></p>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lx-6 col-md-6 col-xs-12">
                                                <p class="m-0">
                                                    <?= $this->Html->link('<i class="fa fa-lg fa-edit indigo-text" aria-hidden="true"></i>',
                                                        ['controller' => 'StudioSchedules', 'action' => 'edit', $fris[$times[$i]]['id']],
                                                        [
                                                            'data-toggle'    => 'tooltip',
                                                            'data-placement' => 'bottom',
                                                            'title'          => '編集',
                                                            'escape'         => false
                                                        ])
                                                    ?>
                                                </p>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-xs-12">
                                                <p class="m-0">
                                                    <?= $this->Form->postLink('<i class="fa fa-lg fa-trash red-text" aria-hidden="true"></i>',
                                                        ['controller' => 'StudioSchedules', 'action' => 'delete', $fris[$times[$i]]['id']],
                                                        [
                                                            'data-toggle'    => 'tooltip',
                                                            'data-placement' => 'bottom',
                                                            'title'          => '削除',
                                                            'escape'         => false,
                                                            'confirm'        => 'スケジュールを削除します。よろしいですか？'
                                                        ])
                                                    ?>
                                                </p>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.card -->
                                </td>
                            <?php elseif ($fris[$times[$i]] !== 1) : ?>
                                <td></td>
                            <?php endif; ?>

                            <!-- 土 -->
                            <?php if ($times[$i] === $sats[$times[$i]]['start']) : ?>
                                <!-- modal -->
                                <div class="modal fade instructor" id="sat--instructor<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body pt-4 pb-4">

                                                <div class="d-flex">
                                                    <div class="p-0">
                                                        <h6 class="font-weight-bold m-3">
                                                            <i class="fa fa-universal-access indigo-text" aria-hidden="true"></i> Instructor Information
                                                        </h6>
                                                    </div>
                                                    <div class="ml-auto pt-3 pr-2">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <hr class="mt-0">
                                                <div class="row">
                                                    <div class="col-lg-5 text-center">
                                                        <h3>
                                                            <?php
                                                                if ($sats[$times[$i]]['image']) {
                                                                    print $this->Html->image($sats[$times[$i]]['image'], ['class' => 'img-fluid z-depth-2']);
                                                                } else {
                                                                    print $this->Html->image('/img/sample/no_icon.jpg', ['class' => 'img-fluid']);
                                                                }
                                                            ?>
                                                        </h3>
                                                    </div>
                                                    <div class="col-lg-7 text-center">
                                                        <h2 class="h2-responsive product-name mt-3">
                                                          <strong><?= h($sats[$times[$i]]['name']) ?></strong>
                                                        </h2>
                                                        <?php if ($sats[$times[$i]]['team']) : ?>
                                                            <h3 class="h3-responsive dark-gray-text"><small>Team:</small> <?= h($sats[$times[$i]]['team']) ?></h3>
                                                        <?php endif; ?>
                                                        <p>
                                                            <small>ジャンル: <strong><?= h($sats[$times[$i]]['genre']) ?></strong></small>
                                                        </p>
                                                        <p class="font-weight-bold">
                                                            <i class="fa fa-clock-o" aria-hidden="true"></i> <?= h($sats[$times[$i]]['start']) ?> ～ <?= h($sats[$times[$i]]['end']) ?>
                                                        </p>
                                                        <p>
                                                            <small><?= h($sats[$times[$i]]['difficulty']) ?></small>
                                                        </p>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <?php if ($sats[$times[$i]]['comment']) : ?>
                                                                    <p class="dark-grey-text">
                                                                        <small>
                                                                            <?= h($sats[$times[$i]]['comment']) ?>
                                                                        </small>
                                                                    </p>
                                                                <?php endif; ?>
                                                                <?php if ($sats[$times[$i]]['profile']) : ?>
                                                                    <p>
                                                                        <?= $this->Html->link('プロフィール詳細', $sats[$times[$i]]['profile'],
                                                                            ['class' => 'btn btn-sm btn-rounded btn-default waves-effect', 'target' => '_blank', 'escape' => false]
                                                                        ) ?>
                                                                    </p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div><!-- /.row -->
                                                    </div><!-- /.col-lg-7 -->
                                                </div><!-- /.row -->
                                                <?php if ($sats[$times[$i]]['youtube']) : ?>
                                                    <hr class="m-0">
                                                    <div class="row">
                                                        <div class="col-lg-12 p-4">
                                                            <h6 class="font-weight-bold text-left"><i class="fa fa-youtube-play yt-ic"></i> Dance Video</h6>
                                                            <div class="embed-responsive embed-responsive-16by9">
                                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= h($sats[$times[$i]]['youtube']) ?>?rel=0" allowfullscreen></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div><!-- /.modal-body -->
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->

                                <?php if ($sats[$times[$i]]['time'] === '1 hour') : ?>
                                    <td rowspan="2" class="grey lighten-4">
                                <?php else : ?>
                                    <td rowspan="3" class="grey lighten-4">
                                <?php endif; ?>
                                    <div class="card card-body">
                                        <label class="mb-0">
                                            <span class="badge <?= getBadgeColor($sats[$times[$i]]['genre']) ?>"><?= h($sats[$times[$i]]['genre']) ?></span>
                                        </label>

                                        <div class="avatar mx-auto my-3 mt-0">
                                            <?php
                                                if ($sats[$times[$i]]['image']) {
                                                    print $this->Html->link($this->Html->image($sats[$times[$i]]['image'], ['class' => 'img-fluid']), 'javascript:void(0)',
                                                        [
                                                            'data-toggle' => 'modal',
                                                            'data-target' => '#sat--instructor' . $i,
                                                            'escape'      => false
                                                        ]
                                                    );
                                                } else {
                                                    print $this->Html->link($this->Html->image('/img/sample/no_icon.jpg', ['class' => 'img-fluid']), 'javascript:void(0)',
                                                        [
                                                            'data-toggle' => 'modal',
                                                            'data-target' => '#sat--instructor' . $i,
                                                            'escape'      => false
                                                        ]
                                                    );
                                                }
                                            ?>
                                        </div>
                                        <h5 class="card-title font-weight-bold">
                                            <?= $this->Html->link($sats[$times[$i]]['name'], 'javascript:void(0)',
                                                [
                                                    'class'       => 'dark-grey-text',
                                                    'data-toggle' => 'modal',
                                                    'data-target' => '#sat--instructor' . $i
                                                ]
                                            ) ?>
                                        </h5>
                                        <?php if ($sats[$times[$i]]['team']) : ?>
                                            <p class="dark-grey-text mb-0"><?= h($sats[$times[$i]]['team']) ?></p>
                                        <?php endif; ?>
                                        <hr>
                                        <p class="font-weight-bold m-0"><?= h($sats[$times[$i]]['start']) ?> ～ <?= h($sats[$times[$i]]['end']) ?></p>
                                        <p class="m-0"><?= h($sats[$times[$i]]['difficulty']) ?></p>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lx-6 col-md-6 col-xs-12">
                                                <p class="m-0">
                                                    <?= $this->Html->link('<i class="fa fa-lg fa-edit indigo-text" aria-hidden="true"></i>',
                                                        ['controller' => 'StudioSchedules', 'action' => 'edit', $sats[$times[$i]]['id']],
                                                        [
                                                            'data-toggle'    => 'tooltip',
                                                            'data-placement' => 'bottom',
                                                            'title'          => '編集',
                                                            'escape'         => false
                                                        ])
                                                    ?>
                                                </p>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-xs-12">
                                                <p class="m-0">
                                                    <?= $this->Form->postLink('<i class="fa fa-lg fa-trash red-text" aria-hidden="true"></i>',
                                                        ['controller' => 'StudioSchedules', 'action' => 'delete', $sats[$times[$i]]['id']],
                                                        [
                                                            'data-toggle'    => 'tooltip',
                                                            'data-placement' => 'bottom',
                                                            'title'          => '削除',
                                                            'escape'         => false,
                                                            'confirm'        => 'スケジュールを削除します。よろしいですか？'
                                                        ])
                                                    ?>
                                                </p>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.card -->
                                </td>
                            <?php elseif ($sats[$times[$i]] !== 1) : ?>
                                <td></td>
                            <?php endif; ?>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->
</div><!-- /.card -->

<div class="xs-show">
    <div class="card card-body">
        <ul class="nav md-pills nav-justified pills-secondary">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#panel1" role="tab">日</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#panel2" role="tab">月</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#panel3" role="tab">火</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#panel4" role="tab">水</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#panel5" role="tab">木</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#panel6" role="tab">金</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#panel7" role="tab">土</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <?= $this->Flash->render() ?>
        </div>
    </div>

    <div class="tab-content">
        <!-- 日 -->
        <div class="tab-pane fade in show active" id="panel1" role="tabpanel">
            <?php for ($i = 0; $i < count($times); $i++) : ?>
                <?php if (isset($suns[$times[$i]]['id'])) : ?>
                    <!-- modal -->
                    <div class="modal fade instructor" id="xs--sun--instructor<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-body pt-4 pb-4">

                                    <div class="d-flex">
                                        <div class="p-0">
                                            <h6 class="font-weight-bold m-3">
                                                <i class="fa fa-universal-access indigo-text" aria-hidden="true"></i> Instructor Information
                                            </h6>
                                        </div>
                                        <div class="ml-auto pt-3 pr-2">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                    <hr class="mt-0">
                                    <div class="row">
                                        <div class="col-lg-5 text-center">
                                            <h3>
                                                <?php
                                                    if ($suns[$times[$i]]['image']) {
                                                        print $this->Html->image($suns[$times[$i]]['image'], ['class' => 'img-fluid z-depth-2']);
                                                    } else {
                                                        print $this->Html->image('/img/sample/no_icon.jpg', ['class' => 'img-fluid']);
                                                    }
                                                ?>
                                            </h3>
                                        </div>
                                        <div class="col-lg-7 text-center">
                                            <h2 class="h2-responsive product-name mt-3">
                                              <strong><?= h($suns[$times[$i]]['name']) ?></strong>
                                            </h2>
                                            <?php if ($suns[$times[$i]]['team']) : ?>
                                                <h3 class="h3-responsive dark-gray-text"><small>Team:</small> <?= h($suns[$times[$i]]['team']) ?></h3>
                                            <?php endif; ?>
                                            <p>
                                                <small>ジャンル: <strong><?= h($suns[$times[$i]]['genre']) ?></strong></small>
                                            </p>
                                            <p class="font-weight-bold">
                                                <i class="fa fa-clock-o" aria-hidden="true"></i> <?= h($suns[$times[$i]]['start']) ?> ～ <?= h($suns[$times[$i]]['end']) ?>
                                            </p>
                                            <p>
                                                <small><?= h($suns[$times[$i]]['difficulty']) ?></small>
                                            </p>
                                            <?php if ($suns[$times[$i]]['comment'] || $suns[$times[$i]]['profile']) : ?>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <?php if ($suns[$times[$i]]['comment']) : ?>
                                                            <p class="dark-grey-text">
                                                                <small>
                                                                    <?= h($suns[$times[$i]]['comment']) ?>
                                                                </small>
                                                            </p>
                                                        <?php endif; ?>
                                                        <?php if ($suns[$times[$i]]['profile']) : ?>
                                                            <p>
                                                                <?= $this->Html->link('プロフィール詳細', $suns[$times[$i]]['profile'],
                                                                    ['class' => 'btn btn-sm btn-rounded btn-default waves-effect', 'target' => '_blank', 'escape' => false]
                                                                ) ?>
                                                            </p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div><!-- /.row -->
                                            <?php endif; ?>
                                        </div><!-- /.col-lg-7 -->
                                    </div><!-- /.row -->
                                    <?php if ($suns[$times[$i]]['youtube']) : ?>
                                        <hr class="m-0">
                                        <div class="row">
                                            <div class="col-lg-12 p-4">
                                                <h6 class="font-weight-bold text-left"><i class="fa fa-youtube-play yt-ic"></i> Dance Video</h6>
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= h($suns[$times[$i]]['youtube']) ?>?rel=0" allowfullscreen></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div><!-- /.modal-body -->
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->

                        <div class="row mb-2 p-2" style="background-color: white;">
                            <div class="col-md-12 col-xs-12 text-center">
                                <p class="mb-1">
                                    <span class="badge <?= getBadgeColor($suns[$times[$i]]['genre']) ?>"><?= h($suns[$times[$i]]['genre']) ?></span>
                                </p>
                                <div class="avatar mx-auto m-2">
                                    <?php
                                        if ($suns[$times[$i]]['image']) {
                                            print $this->Html->link($this->Html->image($suns[$times[$i]]['image'], ['class' => 'img-fluid']), 'javascript:void(0)',
                                                [
                                                    'data-toggle' => 'modal',
                                                    'data-target' => '#xs--sun--instructor' . $i,
                                                    'escape'      => false
                                                ]
                                            );
                                        } else {
                                            print $this->Html->link($this->Html->image('/img/sample/no_icon.jpg', ['class' => 'img-fluid']), 'javascript:void(0)',
                                                [
                                                    'data-toggle' => 'modal',
                                                    'data-target' => '#xs--sun--instructor' . $i,
                                                    'escape'      => false
                                                ]
                                            );
                                        }
                                    ?>
                                </div><!-- /.avatar -->
                                <h6>
                                    <?= $this->Html->link($suns[$times[$i]]['name'], 'javascript:void(0)',
                                        [
                                            'class'       => 'dark-grey-text',
                                            'data-toggle' => 'modal',
                                            'data-target' => '#xs--sun--instructor' . $i
                                        ]
                                    ) ?>

                                </h6>
                                <?php if ($suns[$times[$i]]['team']) : ?>
                                    <p class="dark-grey-text mb-0"><small>team:</small> <?= h($suns[$times[$i]]['team']) ?></p>
                                <?php endif; ?>
                                <hr class="m-2">
                                <p class="font-weight-bold m-0"><?= h($suns[$times[$i]]['start']) ?> ～ <?= h($suns[$times[$i]]['end']) ?></p>
                                <p class="m-0"><?= h($suns[$times[$i]]['difficulty']) ?></p>
                                <hr class="m-1">
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">menu</button>
                                    <div class="dropdown-menu dropdown-primary">
                                        <?= $this->Html->link('編集',
                                            ['controller' => 'StudioSchedules', 'action' => 'edit', $suns[$times[$i]]['id']],
                                            ['class' => 'dropdown-item'])
                                        ?>
                                        <?= $this->Form->postLink('削除',
                                            ['controller' => 'StudioSchedules', 'action' => 'delete', $suns[$times[$i]]['id']],
                                            ['class' => 'dropdown-item', 'confirm' => '削除します。本当によろしいですか？'])
                                        ?>
                                    </div>
                                </div>
                            </div><!-- /.col-md-12 -->
                        </div><!-- /.row -->
                    <?php endif; ?>
                <?php endfor; ?>
            </div><!-- /.tab-pane -->

            <!-- 月 -->
            <div class="tab-pane fade" id="panel2" role="tabpanel">
                <?php for ($i = 0; $i < count($times); $i++) : ?>
                    <?php if (isset($mons[$times[$i]]['id'])) : ?>
                        <!-- modal -->
                        <div class="modal fade instructor" id="xs--mon--instructor<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-body pt-4 pb-4">

                                        <div class="d-flex">
                                            <div class="p-0">
                                                <h6 class="font-weight-bold m-3">
                                                    <i class="fa fa-universal-access indigo-text" aria-hidden="true"></i> Instructor Information
                                                </h6>
                                            </div>
                                            <div class="ml-auto pt-3 pr-2">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>
                                        <hr class="mt-0">
                                        <div class="row">
                                            <div class="col-lg-5 text-center">
                                                <h3>
                                                    <?php
                                                        if ($mons[$times[$i]]['image']) {
                                                            print $this->Html->image($mons[$times[$i]]['image'], ['class' => 'img-fluid z-depth-2']);
                                                        } else {
                                                            print $this->Html->image('/img/sample/no_icon.jpg', ['class' => 'img-fluid']);
                                                        }
                                                    ?>
                                                </h3>
                                            </div>
                                            <div class="col-lg-7 text-center">
                                                <h2 class="h2-responsive product-name mt-3">
                                                  <strong><?= h($mons[$times[$i]]['name']) ?></strong>
                                                </h2>
                                                <?php if ($mons[$times[$i]]['team']) : ?>
                                                    <h3 class="h3-responsive dark-gray-text"><small>Team:</small> <?= h($mons[$times[$i]]['team']) ?></h3>
                                                <?php endif; ?>
                                                <p>
                                                    <small>ジャンル: <strong><?= h($mons[$times[$i]]['genre']) ?></strong></small>
                                                </p>
                                                <p class="font-weight-bold">
                                                    <i class="fa fa-clock-o" aria-hidden="true"></i> <?= h($mons[$times[$i]]['start']) ?> ～ <?= h($mons[$times[$i]]['end']) ?>
                                                </p>
                                                <p>
                                                    <small><?= h($mons[$times[$i]]['difficulty']) ?></small>
                                                </p>
                                                <?php if ($mons[$times[$i]]['comment'] || $mons[$times[$i]]['profile']) : ?>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <?php if ($mons[$times[$i]]['comment']) : ?>
                                                                <p class="dark-grey-text">
                                                                    <small>
                                                                        <?= h($mons[$times[$i]]['comment']) ?>
                                                                    </small>
                                                                </p>
                                                            <?php endif; ?>
                                                            <?php if ($mons[$times[$i]]['profile']) : ?>
                                                                <p>
                                                                    <?= $this->Html->link('プロフィール詳細', $mons[$times[$i]]['profile'],
                                                                        ['class' => 'btn btn-sm btn-rounded btn-default waves-effect', 'target' => '_blank', 'escape' => false]
                                                                    ) ?>
                                                                </p>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div><!-- /.row -->
                                                <?php endif; ?>
                                            </div><!-- /.col-lg-7 -->
                                        </div><!-- /.row -->
                                        <?php if ($mons[$times[$i]]['youtube']) : ?>
                                            <hr class="m-0">
                                            <div class="row">
                                                <div class="col-lg-12 p-4">
                                                    <h6 class="font-weight-bold text-left"><i class="fa fa-youtube-play yt-ic"></i> Dance Video</h6>
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= h($mons[$times[$i]]['youtube']) ?>?rel=0" allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div><!-- /.modal-body -->
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->

                        <div class="row mb-2 p-2" style="background-color: white;">
                            <div class="col-md-12 col-xs-12 text-center">
                                <p class="mb-1">
                                    <span class="badge <?= getBadgeColor($mons[$times[$i]]['genre']) ?>"><?= h($mons[$times[$i]]['genre']) ?></span>
                                </p>
                                <div class="avatar mx-auto m-2">
                                    <?php
                                        if ($mons[$times[$i]]['image']) {
                                            print $this->Html->link($this->Html->image($mons[$times[$i]]['image'], ['class' => 'img-fluid']), 'javascript:void(0)',
                                                [
                                                    'data-toggle' => 'modal',
                                                    'data-target' => '#xs--mon--instructor' . $i,
                                                    'escape'      => false
                                                ]
                                            );
                                        } else {
                                            print $this->Html->link($this->Html->image('/img/sample/no_icon.jpg', ['class' => 'img-fluid']), 'javascript:void(0)',
                                                [
                                                    'data-toggle' => 'modal',
                                                    'data-target' => '#xs--mon--instructor' . $i,
                                                    'escape'      => false
                                                ]
                                            );
                                        }
                                    ?>
                                </div><!-- /.avatar -->
                                <h6>
                                    <?= $this->Html->link($mons[$times[$i]]['name'], 'javascript:void(0)',
                                        [
                                            'class'       => 'dark-grey-text',
                                            'data-toggle' => 'modal',
                                            'data-target' => '#xs--mon--instructor' . $i
                                        ]
                                    ) ?>

                                </h6>
                                <?php if ($mons[$times[$i]]['team']) : ?>
                                    <p class="dark-grey-text mb-0"><small>team:</small> <?= h($mons[$times[$i]]['team']) ?></p>
                                <?php endif; ?>
                                <hr class="m-2">
                                <p class="font-weight-bold m-0"><?= h($mons[$times[$i]]['start']) ?> ～ <?= h($mons[$times[$i]]['end']) ?></p>
                                <p class="m-0"><?= h($mons[$times[$i]]['difficulty']) ?></p>
                                <hr class="m-1">
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">menu</button>
                                    <div class="dropdown-menu dropdown-primary">
                                        <?= $this->Html->link('編集',
                                            ['controller' => 'StudioSchedules', 'action' => 'edit', $mons[$times[$i]]['id']],
                                            ['class' => 'dropdown-item'])
                                        ?>
                                        <?= $this->Form->postLink('削除',
                                            ['controller' => 'StudioSchedules', 'action' => 'delete', $mons[$times[$i]]['id']],
                                            ['class' => 'dropdown-item', 'confirm' => '削除します。本当によろしいですか？'])
                                        ?>
                                    </div>
                                </div>
                            </div><!-- /.col-md-12 -->
                        </div><!-- /.row -->
                    <?php endif; ?>
                <?php endfor; ?>
            </div><!-- /.tab-pane -->

            <!-- 火 -->
            <div class="tab-pane fade" id="panel3" role="tabpanel">
                <?php for ($i = 0; $i < count($times); $i++) : ?>
                    <?php if (isset($tues[$times[$i]]['id'])) : ?>
                        <!-- modal -->
                        <div class="modal fade instructor" id="xs--tue--instructor<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-body pt-4 pb-4">

                                        <div class="d-flex">
                                            <div class="p-0">
                                                <h6 class="font-weight-bold m-3">
                                                    <i class="fa fa-universal-access indigo-text" aria-hidden="true"></i> Instructor Information
                                                </h6>
                                            </div>
                                            <div class="ml-auto pt-3 pr-2">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>
                                        <hr class="mt-0">
                                        <div class="row">
                                            <div class="col-lg-5 text-center">
                                                <h3>
                                                    <?php
                                                        if ($tues[$times[$i]]['image']) {
                                                            print $this->Html->image($tues[$times[$i]]['image'], ['class' => 'img-fluid z-depth-2']);
                                                        } else {
                                                            print $this->Html->image('/img/sample/no_icon.jpg', ['class' => 'img-fluid']);
                                                        }
                                                    ?>
                                                </h3>
                                            </div>
                                            <div class="col-lg-7 text-center">
                                                <h2 class="h2-responsive product-name mt-3">
                                                  <strong><?= h($tues[$times[$i]]['name']) ?></strong>
                                                </h2>
                                                <?php if ($tues[$times[$i]]['team']) : ?>
                                                    <h3 class="h3-responsive dark-gray-text"><small>Team:</small> <?= h($tues[$times[$i]]['team']) ?></h3>
                                                <?php endif; ?>
                                                <p>
                                                    <small>ジャンル: <strong><?= h($tues[$times[$i]]['genre']) ?></strong></small>
                                                </p>
                                                <p class="font-weight-bold">
                                                    <i class="fa fa-clock-o" aria-hidden="true"></i> <?= h($tues[$times[$i]]['start']) ?> ～ <?= h($tues[$times[$i]]['end']) ?>
                                                </p>
                                                <p>
                                                    <small><?= h($tues[$times[$i]]['difficulty']) ?></small>
                                                </p>
                                                <?php if ($tues[$times[$i]]['comment'] || $tues[$times[$i]]['profile']) : ?>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <?php if ($tues[$times[$i]]['comment']) : ?>
                                                                <p class="dark-grey-text">
                                                                    <small>
                                                                        <?= h($tues[$times[$i]]['comment']) ?>
                                                                    </small>
                                                                </p>
                                                            <?php endif; ?>
                                                            <?php if ($tues[$times[$i]]['profile']) : ?>
                                                                <p>
                                                                    <?= $this->Html->link('プロフィール詳細', $tues[$times[$i]]['profile'],
                                                                        ['class' => 'btn btn-sm btn-rounded btn-default waves-effect', 'target' => '_blank', 'escape' => false]
                                                                    ) ?>
                                                                </p>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div><!-- /.row -->
                                                <?php endif; ?>
                                            </div><!-- /.col-lg-7 -->
                                        </div><!-- /.row -->
                                        <?php if ($tues[$times[$i]]['youtube']) : ?>
                                            <hr class="m-0">
                                            <div class="row">
                                                <div class="col-lg-12 p-4">
                                                    <h6 class="font-weight-bold text-left"><i class="fa fa-youtube-play yt-ic"></i> Dance Video</h6>
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= h($tues[$times[$i]]['youtube']) ?>?rel=0" allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div><!-- /.modal-body -->
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->

                        <div class="row mb-2 p-2" style="background-color: white;">
                            <div class="col-md-12 col-xs-12 text-center">
                                <p class="mb-1">
                                    <span class="badge <?= getBadgeColor($tues[$times[$i]]['genre']) ?>"><?= h($tues[$times[$i]]['genre']) ?></span>
                                </p>
                                <div class="avatar mx-auto m-2">
                                    <?php
                                        if ($tues[$times[$i]]['image']) {
                                            print $this->Html->link($this->Html->image($tues[$times[$i]]['image'], ['class' => 'img-fluid']), 'javascript:void(0)',
                                                [
                                                    'data-toggle' => 'modal',
                                                    'data-target' => '#xs--tue--instructor' . $i,
                                                    'escape'      => false
                                                ]
                                            );
                                        } else {
                                            print $this->Html->link($this->Html->image('/img/sample/no_icon.jpg', ['class' => 'img-fluid']), 'javascript:void(0)',
                                                [
                                                    'data-toggle' => 'modal',
                                                    'data-target' => '#xs--tue--instructor' . $i,
                                                    'escape'      => false
                                                ]
                                            );
                                        }
                                    ?>
                                </div><!-- /.avatar -->
                                <h6>
                                    <?= $this->Html->link($tues[$times[$i]]['name'], 'javascript:void(0)',
                                        [
                                            'class'       => 'dark-grey-text',
                                            'data-toggle' => 'modal',
                                            'data-target' => '#xs--tue--instructor' . $i
                                        ]
                                    ) ?>

                                </h6>
                                <?php if ($tues[$times[$i]]['team']) : ?>
                                    <p class="dark-grey-text mb-0"><small>team:</small> <?= h($tues[$times[$i]]['team']) ?></p>
                                <?php endif; ?>
                                <hr class="m-2">
                                <p class="font-weight-bold m-0"><?= h($tues[$times[$i]]['start']) ?> ～ <?= h($tues[$times[$i]]['end']) ?></p>
                                <p class="m-0"><?= h($tues[$times[$i]]['difficulty']) ?></p>
                                <hr class="m-1">
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">menu</button>
                                    <div class="dropdown-menu dropdown-primary">
                                        <?= $this->Html->link('編集',
                                            ['controller' => 'StudioSchedules', 'action' => 'edit', $tues[$times[$i]]['id']],
                                            ['class' => 'dropdown-item'])
                                        ?>
                                        <?= $this->Form->postLink('削除',
                                            ['controller' => 'StudioSchedules', 'action' => 'delete', $tues[$times[$i]]['id']],
                                            ['class' => 'dropdown-item', 'confirm' => '削除します。本当によろしいですか？'])
                                        ?>
                                    </div>
                                </div>
                            </div><!-- /.col-md-12 -->
                        </div><!-- /.row -->
                    <?php endif; ?>
                <?php endfor; ?>
            </div><!-- /.tab-pane -->

            <!-- 水 -->
            <div class="tab-pane fade" id="panel4" role="tabpanel">
                <?php for ($i = 0; $i < count($times); $i++) : ?>
                    <?php if (isset($weds[$times[$i]]['id'])) : ?>
                        <!-- modal -->
                        <div class="modal fade instructor" id="xs--wed--instructor<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-body pt-4 pb-4">

                                        <div class="d-flex">
                                            <div class="p-0">
                                                <h6 class="font-weight-bold m-3">
                                                    <i class="fa fa-universal-access indigo-text" aria-hidden="true"></i> Instructor Information
                                                </h6>
                                            </div>
                                            <div class="ml-auto pt-3 pr-2">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>
                                        <hr class="mt-0">
                                        <div class="row">
                                            <div class="col-lg-5 text-center">
                                                <h3>
                                                    <?php
                                                        if ($weds[$times[$i]]['image']) {
                                                            print $this->Html->image($weds[$times[$i]]['image'], ['class' => 'img-fluid z-depth-2']);
                                                        } else {
                                                            print $this->Html->image('/img/sample/no_icon.jpg', ['class' => 'img-fluid']);
                                                        }
                                                    ?>
                                                </h3>
                                            </div>
                                            <div class="col-lg-7 text-center">
                                                <h2 class="h2-responsive product-name mt-3">
                                                  <strong><?= h($weds[$times[$i]]['name']) ?></strong>
                                                </h2>
                                                <?php if ($weds[$times[$i]]['team']) : ?>
                                                    <h3 class="h3-responsive dark-gray-text"><small>Team:</small> <?= h($weds[$times[$i]]['team']) ?></h3>
                                                <?php endif; ?>
                                                <p>
                                                    <small>ジャンル: <strong><?= h($weds[$times[$i]]['genre']) ?></strong></small>
                                                </p>
                                                <p class="font-weight-bold">
                                                    <i class="fa fa-clock-o" aria-hidden="true"></i> <?= h($weds[$times[$i]]['start']) ?> ～ <?= h($weds[$times[$i]]['end']) ?>
                                                </p>
                                                <p>
                                                    <small><?= h($weds[$times[$i]]['difficulty']) ?></small>
                                                </p>
                                                <?php if ($weds[$times[$i]]['comment'] || $weds[$times[$i]]['profile']) : ?>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <?php if ($weds[$times[$i]]['comment']) : ?>
                                                                <p class="dark-grey-text">
                                                                    <small>
                                                                        <?= h($weds[$times[$i]]['comment']) ?>
                                                                    </small>
                                                                </p>
                                                            <?php endif; ?>
                                                            <?php if ($weds[$times[$i]]['profile']) : ?>
                                                                <p>
                                                                    <?= $this->Html->link('プロフィール詳細', $weds[$times[$i]]['profile'],
                                                                        ['class' => 'btn btn-sm btn-rounded btn-default waves-effect', 'target' => '_blank', 'escape' => false]
                                                                    ) ?>
                                                                </p>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div><!-- /.row -->
                                                <?php endif; ?>
                                            </div><!-- /.col-lg-7 -->
                                        </div><!-- /.row -->
                                        <?php if ($weds[$times[$i]]['youtube']) : ?>
                                            <hr class="m-0">
                                            <div class="row">
                                                <div class="col-lg-12 p-4">
                                                    <h6 class="font-weight-bold text-left"><i class="fa fa-youtube-play yt-ic"></i> Dance Video</h6>
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= h($weds[$times[$i]]['youtube']) ?>?rel=0" allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div><!-- /.modal-body -->
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->

                        <div class="row mb-2 p-2" style="background-color: white;">
                            <div class="col-md-12 col-xs-12 text-center">
                                <p class="mb-1">
                                    <span class="badge <?= getBadgeColor($weds[$times[$i]]['genre']) ?>"><?= h($weds[$times[$i]]['genre']) ?></span>
                                </p>
                                <div class="avatar mx-auto m-2">
                                    <?php
                                        if ($weds[$times[$i]]['image']) {
                                            print $this->Html->link($this->Html->image($weds[$times[$i]]['image'], ['class' => 'img-fluid']), 'javascript:void(0)',
                                                [
                                                    'data-toggle' => 'modal',
                                                    'data-target' => '#xs--wed--instructor' . $i,
                                                    'escape'      => false
                                                ]
                                            );
                                        } else {
                                            print $this->Html->link($this->Html->image('/img/sample/no_icon.jpg', ['class' => 'img-fluid']), 'javascript:void(0)',
                                                [
                                                    'data-toggle' => 'modal',
                                                    'data-target' => '#xs--wed--instructor' . $i,
                                                    'escape'      => false
                                                ]
                                            );
                                        }
                                    ?>
                                </div><!-- /.avatar -->
                                <h6>
                                    <?= $this->Html->link($weds[$times[$i]]['name'], 'javascript:void(0)',
                                        [
                                            'class'       => 'dark-grey-text',
                                            'data-toggle' => 'modal',
                                            'data-target' => '#xs--wed--instructor' . $i
                                        ]
                                    ) ?>

                                </h6>
                                <?php if ($weds[$times[$i]]['team']) : ?>
                                    <p class="dark-grey-text mb-0"><small>team:</small> <?= h($weds[$times[$i]]['team']) ?></p>
                                <?php endif; ?>
                                <hr class="m-2">
                                <p class="font-weight-bold m-0"><?= h($weds[$times[$i]]['start']) ?> ～ <?= h($weds[$times[$i]]['end']) ?></p>
                                <p class="m-0"><?= h($weds[$times[$i]]['difficulty']) ?></p>
                                <hr class="m-1">
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">menu</button>
                                    <div class="dropdown-menu dropdown-primary">
                                        <?= $this->Html->link('編集',
                                            ['controller' => 'StudioSchedules', 'action' => 'edit', $weds[$times[$i]]['id']],
                                            ['class' => 'dropdown-item'])
                                        ?>
                                        <?= $this->Form->postLink('削除',
                                            ['controller' => 'StudioSchedules', 'action' => 'delete', $weds[$times[$i]]['id']],
                                            ['class' => 'dropdown-item', 'confirm' => '削除します。本当によろしいですか？'])
                                        ?>
                                    </div>
                                </div>
                            </div><!-- /.col-md-12 -->
                        </div><!-- /.row -->
                    <?php endif; ?>
                <?php endfor; ?>
            </div><!-- /.tab-pane -->

            <!-- 木 -->
            <div class="tab-pane fade" id="panel5" role="tabpanel">
                <?php for ($i = 0; $i < count($times); $i++) : ?>
                    <?php if (isset($thus[$times[$i]]['id'])) : ?>
                        <!-- modal -->
                        <div class="modal fade instructor" id="xs--thu--instructor<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-body pt-4 pb-4">

                                        <div class="d-flex">
                                            <div class="p-0">
                                                <h6 class="font-weight-bold m-3">
                                                    <i class="fa fa-universal-access indigo-text" aria-hidden="true"></i> Instructor Information
                                                </h6>
                                            </div>
                                            <div class="ml-auto pt-3 pr-2">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>
                                        <hr class="mt-0">
                                        <div class="row">
                                            <div class="col-lg-5 text-center">
                                                <h3>
                                                    <?php
                                                        if ($thus[$times[$i]]['image']) {
                                                            print $this->Html->image($thus[$times[$i]]['image'], ['class' => 'img-fluid z-depth-2']);
                                                        } else {
                                                            print $this->Html->image('/img/sample/no_icon.jpg', ['class' => 'img-fluid']);
                                                        }
                                                    ?>
                                                </h3>
                                            </div>
                                            <div class="col-lg-7 text-center">
                                                <h2 class="h2-responsive product-name mt-3">
                                                  <strong><?= h($thus[$times[$i]]['name']) ?></strong>
                                                </h2>
                                                <?php if ($thus[$times[$i]]['team']) : ?>
                                                    <h3 class="h3-responsive dark-gray-text"><small>Team:</small> <?= h($thus[$times[$i]]['team']) ?></h3>
                                                <?php endif; ?>
                                                <p>
                                                    <small>ジャンル: <strong><?= h($thus[$times[$i]]['genre']) ?></strong></small>
                                                </p>
                                                <p class="font-weight-bold">
                                                    <i class="fa fa-clock-o" aria-hidden="true"></i> <?= h($thus[$times[$i]]['start']) ?> ～ <?= h($thus[$times[$i]]['end']) ?>
                                                </p>
                                                <p>
                                                    <small><?= h($thus[$times[$i]]['difficulty']) ?></small>
                                                </p>
                                                <?php if ($thus[$times[$i]]['comment'] || $thus[$times[$i]]['profile']) : ?>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <?php if ($thus[$times[$i]]['comment']) : ?>
                                                                <p class="dark-grey-text">
                                                                    <small>
                                                                        <?= h($thus[$times[$i]]['comment']) ?>
                                                                    </small>
                                                                </p>
                                                            <?php endif; ?>
                                                            <?php if ($thus[$times[$i]]['profile']) : ?>
                                                                <p>
                                                                    <?= $this->Html->link('プロフィール詳細', $thus[$times[$i]]['profile'],
                                                                        ['class' => 'btn btn-sm btn-rounded btn-default waves-effect', 'target' => '_blank', 'escape' => false]
                                                                    ) ?>
                                                                </p>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div><!-- /.row -->
                                                <?php endif; ?>
                                            </div><!-- /.col-lg-7 -->
                                        </div><!-- /.row -->
                                        <?php if ($thus[$times[$i]]['youtube']) : ?>
                                            <hr class="m-0">
                                            <div class="row">
                                                <div class="col-lg-12 p-4">
                                                    <h6 class="font-weight-bold text-left"><i class="fa fa-youtube-play yt-ic"></i> Dance Video</h6>
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= h($thus[$times[$i]]['youtube']) ?>?rel=0" allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div><!-- /.modal-body -->
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->

                        <div class="row mb-2 p-2" style="background-color: white;">
                            <div class="col-md-12 col-xs-12 text-center">
                                <p class="mb-1">
                                    <span class="badge <?= getBadgeColor($thus[$times[$i]]['genre']) ?>"><?= h($thus[$times[$i]]['genre']) ?></span>
                                </p>
                                <div class="avatar mx-auto m-2">
                                    <?php
                                        if ($thus[$times[$i]]['image']) {
                                            print $this->Html->link($this->Html->image($thus[$times[$i]]['image'], ['class' => 'img-fluid']), 'javascript:void(0)',
                                                [
                                                    'data-toggle' => 'modal',
                                                    'data-target' => '#xs--thu--instructor' . $i,
                                                    'escape'      => false
                                                ]
                                            );
                                        } else {
                                            print $this->Html->link($this->Html->image('/img/sample/no_icon.jpg', ['class' => 'img-fluid']), 'javascript:void(0)',
                                                [
                                                    'data-toggle' => 'modal',
                                                    'data-target' => '#xs--thu--instructor' . $i,
                                                    'escape'      => false
                                                ]
                                            );
                                        }
                                    ?>
                                </div><!-- /.avatar -->
                                <h6>
                                    <?= $this->Html->link($thus[$times[$i]]['name'], 'javascript:void(0)',
                                        [
                                            'class'       => 'dark-grey-text',
                                            'data-toggle' => 'modal',
                                            'data-target' => '#xs--thu--instructor' . $i
                                        ]
                                    ) ?>

                                </h6>
                                <?php if ($thus[$times[$i]]['team']) : ?>
                                    <p class="dark-grey-text mb-0"><small>team:</small> <?= h($thus[$times[$i]]['team']) ?></p>
                                <?php endif; ?>
                                <hr class="m-2">
                                <p class="font-weight-bold m-0"><?= h($thus[$times[$i]]['start']) ?> ～ <?= h($thus[$times[$i]]['end']) ?></p>
                                <p class="m-0"><?= h($thus[$times[$i]]['difficulty']) ?></p>
                                <hr class="m-1">
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">menu</button>
                                    <div class="dropdown-menu dropdown-primary">
                                        <?= $this->Html->link('編集',
                                            ['controller' => 'StudioSchedules', 'action' => 'edit', $thus[$times[$i]]['id']],
                                            ['class' => 'dropdown-item'])
                                        ?>
                                        <?= $this->Form->postLink('削除',
                                            ['controller' => 'StudioSchedules', 'action' => 'delete', $thus[$times[$i]]['id']],
                                            ['class' => 'dropdown-item', 'confirm' => '削除します。本当によろしいですか？'])
                                        ?>
                                    </div>
                                </div>
                            </div><!-- /.col-md-12 -->
                        </div><!-- /.row -->
                    <?php endif; ?>
                <?php endfor; ?>
            </div><!-- /.tab-pane -->

            <!--金 -->
            <div class="tab-pane fade" id="panel6" role="tabpanel">
                <?php for ($i = 0; $i < count($times); $i++) : ?>
                    <?php if (isset($fris[$times[$i]]['id'])) : ?>
                        <!-- modal -->
                        <div class="modal fade instructor" id="xs--fri--instructor<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-body pt-4 pb-4">

                                        <div class="d-flex">
                                            <div class="p-0">
                                                <h6 class="font-weight-bold m-3">
                                                    <i class="fa fa-universal-access indigo-text" aria-hidden="true"></i> Instructor Information
                                                </h6>
                                            </div>
                                            <div class="ml-auto pt-3 pr-2">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>
                                        <hr class="mt-0">
                                        <div class="row">
                                            <div class="col-lg-5 text-center">
                                                <h3>
                                                    <?php
                                                        if ($fris[$times[$i]]['image']) {
                                                            print $this->Html->image($fris[$times[$i]]['image'], ['class' => 'img-fluid z-depth-2']);
                                                        } else {
                                                            print $this->Html->image('/img/sample/no_icon.jpg', ['class' => 'img-fluid']);
                                                        }
                                                    ?>
                                                </h3>
                                            </div>
                                            <div class="col-lg-7 text-center">
                                                <h2 class="h2-responsive product-name mt-3">
                                                  <strong><?= h($fris[$times[$i]]['name']) ?></strong>
                                                </h2>
                                                <?php if ($fris[$times[$i]]['team']) : ?>
                                                    <h3 class="h3-responsive dark-gray-text"><small>Team:</small> <?= h($fris[$times[$i]]['team']) ?></h3>
                                                <?php endif; ?>
                                                <p>
                                                    <small>ジャンル: <strong><?= h($fris[$times[$i]]['genre']) ?></strong></small>
                                                </p>
                                                <p class="font-weight-bold">
                                                    <i class="fa fa-clock-o" aria-hidden="true"></i> <?= h($fris[$times[$i]]['start']) ?> ～ <?= h($fris[$times[$i]]['end']) ?>
                                                </p>
                                                <p>
                                                    <small><?= h($fris[$times[$i]]['difficulty']) ?></small>
                                                </p>
                                                <?php if ($fris[$times[$i]]['comment'] || $fris[$times[$i]]['profile']) : ?>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <?php if ($fris[$times[$i]]['comment']) : ?>
                                                                <p class="dark-grey-text">
                                                                    <small>
                                                                        <?= h($fris[$times[$i]]['comment']) ?>
                                                                    </small>
                                                                </p>
                                                            <?php endif; ?>
                                                            <?php if ($fris[$times[$i]]['profile']) : ?>
                                                                <p>
                                                                    <?= $this->Html->link('プロフィール詳細', $fris[$times[$i]]['profile'],
                                                                        ['class' => 'btn btn-sm btn-rounded btn-default waves-effect', 'target' => '_blank', 'escape' => false]
                                                                    ) ?>
                                                                </p>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div><!-- /.row -->
                                                <?php endif; ?>
                                            </div><!-- /.col-lg-7 -->
                                        </div><!-- /.row -->
                                        <?php if ($fris[$times[$i]]['youtube']) : ?>
                                            <hr class="m-0">
                                            <div class="row">
                                                <div class="col-lg-12 p-4">
                                                    <h6 class="font-weight-bold text-left"><i class="fa fa-youtube-play yt-ic"></i> Dance Video</h6>
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= h($fris[$times[$i]]['youtube']) ?>?rel=0" allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div><!-- /.modal-body -->
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->

                        <div class="row mb-2 p-2" style="background-color: white;">
                            <div class="col-md-12 col-xs-12 text-center">
                                <p class="mb-1">
                                    <span class="badge <?= getBadgeColor($fris[$times[$i]]['genre']) ?>"><?= h($fris[$times[$i]]['genre']) ?></span>
                                </p>
                                <div class="avatar mx-auto m-2">
                                    <?php
                                        if ($fris[$times[$i]]['image']) {
                                            print $this->Html->link($this->Html->image($fris[$times[$i]]['image'], ['class' => 'img-fluid']), 'javascript:void(0)',
                                                [
                                                    'data-toggle' => 'modal',
                                                    'data-target' => '#xs--fri--instructor' . $i,
                                                    'escape'      => false
                                                ]
                                            );
                                        } else {
                                            print $this->Html->link($this->Html->image('/img/sample/no_icon.jpg', ['class' => 'img-fluid']), 'javascript:void(0)',
                                                [
                                                    'data-toggle' => 'modal',
                                                    'data-target' => '#xs--fri--instructor' . $i,
                                                    'escape'      => false
                                                ]
                                            );
                                        }
                                    ?>
                                </div><!-- /.avatar -->
                                <h6>
                                    <?= $this->Html->link($fris[$times[$i]]['name'], 'javascript:void(0)',
                                        [
                                            'class'       => 'dark-grey-text',
                                            'data-toggle' => 'modal',
                                            'data-target' => '#xs--fri--instructor' . $i
                                        ]
                                    ) ?>

                                </h6>
                                <?php if ($fris[$times[$i]]['team']) : ?>
                                    <p class="dark-grey-text mb-0"><small>team:</small> <?= h($fris[$times[$i]]['team']) ?></p>
                                <?php endif; ?>
                                <hr class="m-2">
                                <p class="font-weight-bold m-0"><?= h($fris[$times[$i]]['start']) ?> ～ <?= h($fris[$times[$i]]['end']) ?></p>
                                <p class="m-0"><?= h($fris[$times[$i]]['difficulty']) ?></p>
                                <hr class="m-1">
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">menu</button>
                                    <div class="dropdown-menu dropdown-primary">
                                        <?= $this->Html->link('編集',
                                            ['controller' => 'StudioSchedules', 'action' => 'edit', $fris[$times[$i]]['id']],
                                            ['class' => 'dropdown-item'])
                                        ?>
                                        <?= $this->Form->postLink('削除',
                                            ['controller' => 'StudioSchedules', 'action' => 'delete', $fris[$times[$i]]['id']],
                                            ['class' => 'dropdown-item', 'confirm' => '削除します。本当によろしいですか？'])
                                        ?>
                                    </div>
                                </div>
                            </div><!-- /.col-md-12 -->
                        </div><!-- /.row -->
                    <?php endif; ?>
                <?php endfor; ?>
            </div><!-- /.tab-pane -->

            <!-- 土 -->
            <div class="tab-pane fade" id="panel7" role="tabpanel">
                <?php for ($i = 0; $i < count($times); $i++) : ?>
                    <?php if (isset($sats[$times[$i]]['id'])) : ?>
                        <!-- modal -->
                        <div class="modal fade instructor" id="xs--sat--instructor<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-body pt-4 pb-4">

                                        <div class="d-flex">
                                            <div class="p-0">
                                                <h6 class="font-weight-bold m-3">
                                                    <i class="fa fa-universal-access indigo-text" aria-hidden="true"></i> Instructor Information
                                                </h6>
                                            </div>
                                            <div class="ml-auto pt-3 pr-2">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>
                                        <hr class="mt-0">
                                        <div class="row">
                                            <div class="col-lg-5 text-center">
                                                <h3>
                                                    <?php
                                                        if ($sats[$times[$i]]['image']) {
                                                            print $this->Html->image($sats[$times[$i]]['image'], ['class' => 'img-fluid z-depth-2']);
                                                        } else {
                                                            print $this->Html->image('/img/sample/no_icon.jpg', ['class' => 'img-fluid']);
                                                        }
                                                    ?>
                                                </h3>
                                            </div>
                                            <div class="col-lg-7 text-center">
                                                <h2 class="h2-responsive product-name mt-3">
                                                  <strong><?= h($sats[$times[$i]]['name']) ?></strong>
                                                </h2>
                                                <?php if ($sats[$times[$i]]['team']) : ?>
                                                    <h3 class="h3-responsive dark-gray-text"><small>Team:</small> <?= h($sats[$times[$i]]['team']) ?></h3>
                                                <?php endif; ?>
                                                <p>
                                                    <small>ジャンル: <strong><?= h($sats[$times[$i]]['genre']) ?></strong></small>
                                                </p>
                                                <p class="font-weight-bold">
                                                    <i class="fa fa-clock-o" aria-hidden="true"></i> <?= h($sats[$times[$i]]['start']) ?> ～ <?= h($sats[$times[$i]]['end']) ?>
                                                </p>
                                                <p>
                                                    <small><?= h($sats[$times[$i]]['difficulty']) ?></small>
                                                </p>
                                                <?php if ($sats[$times[$i]]['comment'] || $sats[$times[$i]]['profile']) : ?>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <?php if ($sats[$times[$i]]['comment']) : ?>
                                                                <p class="dark-grey-text">
                                                                    <small>
                                                                        <?= h($sats[$times[$i]]['comment']) ?>
                                                                    </small>
                                                                </p>
                                                            <?php endif; ?>
                                                            <?php if ($sats[$times[$i]]['profile']) : ?>
                                                                <p>
                                                                    <?= $this->Html->link('プロフィール詳細', $sats[$times[$i]]['profile'],
                                                                        ['class' => 'btn btn-sm btn-rounded btn-default waves-effect', 'target' => '_blank', 'escape' => false]
                                                                    ) ?>
                                                                </p>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div><!-- /.row -->
                                                <?php endif; ?>
                                            </div><!-- /.col-lg-7 -->
                                        </div><!-- /.row -->
                                        <?php if ($sats[$times[$i]]['youtube']) : ?>
                                            <hr class="m-0">
                                            <div class="row">
                                                <div class="col-lg-12 p-4">
                                                    <h6 class="font-weight-bold text-left"><i class="fa fa-youtube-play yt-ic"></i> Dance Video</h6>
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= h($sats[$times[$i]]['youtube']) ?>?rel=0" allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div><!-- /.modal-body -->
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->

                        <div class="row mb-2 p-2" style="background-color: white;">
                            <div class="col-md-12 col-xs-12 text-center">
                                <p class="mb-1">
                                    <span class="badge <?= getBadgeColor($sats[$times[$i]]['genre']) ?>"><?= h($sats[$times[$i]]['genre']) ?></span>
                                </p>
                                <div class="avatar mx-auto m-2">
                                    <?php
                                        if ($sats[$times[$i]]['image']) {
                                            print $this->Html->link($this->Html->image($sats[$times[$i]]['image'], ['class' => 'img-fluid']), 'javascript:void(0)',
                                                [
                                                    'data-toggle' => 'modal',
                                                    'data-target' => '#xs--sat--instructor' . $i,
                                                    'escape'      => false
                                                ]
                                            );
                                        } else {
                                            print $this->Html->link($this->Html->image('/img/sample/no_icon.jpg', ['class' => 'img-fluid']), 'javascript:void(0)',
                                                [
                                                    'data-toggle' => 'modal',
                                                    'data-target' => '#xs--sat--instructor' . $i,
                                                    'escape'      => false
                                                ]
                                            );
                                        }
                                    ?>
                                </div><!-- /.avatar -->
                                <h6>
                                    <?= $this->Html->link($sats[$times[$i]]['name'], 'javascript:void(0)',
                                        [
                                            'class'       => 'dark-grey-text',
                                            'data-toggle' => 'modal',
                                            'data-target' => '#xs--sat--instructor' . $i
                                        ]
                                    ) ?>

                                </h6>
                                <?php if ($sats[$times[$i]]['team']) : ?>
                                    <p class="dark-grey-text mb-0"><small>team:</small> <?= h($sats[$times[$i]]['team']) ?></p>
                                <?php endif; ?>
                                <hr class="m-2">
                                <p class="font-weight-bold m-0"><?= h($sats[$times[$i]]['start']) ?> ～ <?= h($sats[$times[$i]]['end']) ?></p>
                                <p class="m-0"><?= h($sats[$times[$i]]['difficulty']) ?></p>
                                <hr class="m-1">
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">menu</button>
                                    <div class="dropdown-menu dropdown-primary">
                                        <?= $this->Html->link('編集',
                                            ['controller' => 'StudioSchedules', 'action' => 'edit', $sats[$times[$i]]['id']],
                                            ['class' => 'dropdown-item'])
                                        ?>
                                        <?= $this->Form->postLink('削除',
                                            ['controller' => 'StudioSchedules', 'action' => 'delete', $sats[$times[$i]]['id']],
                                            ['class' => 'dropdown-item', 'confirm' => '削除します。本当によろしいですか？'])
                                        ?>
                                    </div>
                                </div>
                            </div><!-- /.col-md-12 -->
                        </div><!-- /.row -->
                    <?php endif; ?>
                <?php endfor; ?>
            </div><!-- /.tab-pane -->
    </div><!-- /.tab-content -->
</div><!-- /.xs-show -->

<script>
$(function() {
    $('.instructor').each(function(i, elem) {
        $('#' + elem.id).on('hidden.bs.modal', function (e) {
          $('#' + elem.id + ' iframe').attr("src", $('#' + elem.id + ' iframe').attr("src"));
        });
    });
});
</script>
