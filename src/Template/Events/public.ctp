<?php $this->assign('title', '公開イベント検索'); ?>

<div class="row mt-5">
</div>

<?php if (AD === 0) : ?>
<div class="row mt-3">
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

<?= $this->Form->create('', ['type' => 'get']) ?>
<div class="card p-3 mt-2 mb-5">
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
            <h3 class="h3-responsive mb-0">
                イベント情報
            </h3>
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
                <div class="d-flex">
                    <?php if (!isset($logins)) : ?>
                        <p class="mb-0">
                            <small>
                                <?= $this->Html->link('もっとイベントを見る', ['controller' => 'Users', 'action' => 'signup']) ?>
                            </small>
                        </p>
                    <?php endif; ?>
                    <p class="ml-auto dark-gray-text mb-0">
                        <small>
                            <?= $this->Paginator->counter('{{page}} / {{pages}} ページ &nbsp; 全 {{count}} 件') ?>
                        </small>
                    </p>
                </div>
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
                            <h4 class="mb-3 font-weight-bold dark-grey-text text-center">
                                 <strong><?= h($event->event_name) ?></strong>
                            </h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <p class="dark-grey-text">
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
                                開催日: <?= h($event->event_date) ?>  <br>
                                <span class="mr-2">Start: <?= h($event->start) ?></span>
                                End: <?= h($event->end) ?>
                            </p>
                        </div>
                        <div class="col-lg-4 col-md-6 col-xs-12">
                            <p class="dark-grey-text">
                                <small><i class="fa fa-calendar"></i> イベント登録者</small> <br>
                                <?= h($event->user->username) ?>
                            </p>
                        </div>
                        <div class="col-lg-3 col-md-12 mt-1 mb-1">
                            <?= $this->Html->link('詳細', ['action' => 'publicView', h($event->id)], ['class' => 'btn btn-primary btn-md btn-block']) ?>
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


<div class="row mb-5">
    <div class="col-lg-12 text-center">
        <hr>
        <p class="dark-gray-text mt-5 mb-5">
            検索結果はありません。
        </p>
        <hr>
    </div>
</div>

<?php endif; ?>
