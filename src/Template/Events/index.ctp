<?php $this->assign('title', 'イベント検索'); ?>

<div class="row">
    <?php if (AD === 0) : ?>
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
    <?php else : ?>
        <div class="row mb-2">
        </div>
    <?php endif; ?>
</div>

<div class="row">
    <div class="col-lg-12">
        <?= $this->Flash->render() ?>
    </div>
</div>

<?= $this->Form->create('', ['type' => 'get']) ?>
<div class="card p-3 mb-5">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-xs-12 mt-2">
            <?= $this->Form->control('pref',
                [
                    'type'    => 'select',
                    'class'   => 'mdb-select colorful-select dropdown-primary',
                    'options' => $prefs,
                    'empty'   => '都道府県を選択'
                ]
            ) ?>
        </div>
        <div class="col-lg-3 col-md-6 col-xs-12 mt-2">
            <?= $this->Form->control('category',
                [
                    'type'    => 'select',
                    'class'   => 'mdb-select colorful-select dropdown-primary',
                    'options' => $categories,
                    'empty'   => 'カテゴリを選択'
                ]
            ) ?>
        </div>
        <div class="col-lg-6 col-md-12 col-xs-12">
            <div class="form-inline md-form input-group mt-1 mb-2">
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

<?php if (count($events) !== 0) : ?>
<div class="card card-cascade narrower mb-3">

    <div class="col-lg-12">
        <div class="view gradient-card-header purple-gradient">
            <h2 class="h2-responsive mb-0">
                イベント
            </h2>
            <p class="mb-0 none">
                <small>
                    イベントに関する情報を確認できます。積極的に参加しましょう!!
                </small>
            </p>
        </div>
    </div>

    <div class="card-body">

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

        <section class="py-4">

            <?php foreach ($events as $event) : ?>
            <div class="row mb-5">

                <div class="col-lg-5 col-xl-4 mb-4">
                    <div class="view overlay rounded z-depth-1">
                        <?php
                            if ($event->image) {
                                print $this->Html->image($event->image, ['class' => 'd-block w-100']);
                            } else {
                                print $this->Html->image('/img/sample/noimage-600x360.jpg', ['class' => 'd-block w-100']);
                            }
                        ?>
                        <a>
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-7 col-xl-7 ml-xl-4 mb-4">

                    <div class="row">
                        <div class="col-lg-12">
                            <h5>
                                <span class="badge <?= getBadgeColor(h($event->category)) ?>"><?= h($event->category) ?></span>
                                <span class="badge indigo"><?= h($event->pref . ' ' . $event->city) ?></span>
                            </h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="h4-responsive mb-3 font-weight-bold dark-grey-text text-center">
                                 <?= h($event->event_name) ?>
                            </h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <p class="text-center dark-grey-text mb-2">
                                <?= h($event->intro) ?>
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <p class="dark-grey-text text-right m-0">
                                <small>
                                    <?php if ($event->entry) : ?>
                                        <span class="mr-3">資格: <?= h($event->entry) ?></span>
                                    <?php endif; ?>
                                    <?php if ($event->entry_fee) : ?>
                                        参加費: <?= h($event->entry_fee) ?>
                                    <?php endif; ?>
                                </small>
                            </p>
                        </div>
                    </div>
                    <hr>

                    <div class="row grey lighten-4 p-2 text-center">
                        <div class="col-lg-5 col-md-6 col-xs-12">
                            <p class="dark-grey-text font-weight-bold">
                                <small>開催日: </small><?= h($event->event_date) ?>  <br>
                                <span class="mr-2"><small>Start: </small><?= h($event->start) ?></span>
                                <small>End: </small><?= h($event->end) ?>
                            </p>
                        </div>
                        <div class="col-lg-4 col-md-6 col-xs-12">
                            <p class="dark-grey-text">
                                <small>
                                    <i class="fa fa-calendar"></i> イベント登録者<br>
                                    <?= $this->Html->link($event->user->username,
                                        ['controller' => 'Events', 'action' => 'detail', $event->user->username],
                                        [
                                            'data-toggle'    => 'tooltip',
                                            'data-placement' => 'bottom',
                                            'title'          => h($event->user->username) . 'さんのイベントリスト'
                                        ])
                                    ?>
                                </small>
                            </p>
                        </div>
                        <div class="col-lg-3 col-md-12 mt-1 mb-1">
                            <?= $this->Html->link('詳細', ['action' => 'view', h($event->id)], ['class' => 'btn btn-primary btn-md btn-block']) ?>
                        </div>
                    </div>

                </div><!-- /.col-lg-7 -->
            </div><!-- /.row -->
            <?php endforeach; ?>

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

        </section>
    </div><!-- /.card-body -->
</div><!-- /.card -->

<?php else : ?>

<div class="card card-body">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h5 class="dark-gray-text mt-3">
                検索結果はありません。
            </h5>
            <hr>
        </div>
    </div>
</div>

<?php endif; ?>
