<?php $this->assign('title', h($famous->name) . ' - 出演イベント/ワークショップ一覧'); ?>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="d-flex">
            <div>
                <h5 class="h5-responsive font-weight-bold">
                    <span class="none">Profile </span>Events/Workshop
                </h5>
            </div>
            <div class="ml-auto">
                <p class="m-0 grey-text"><small>プロフィール内イベント</small></p>
            </div>
        </div>
        <hr class="mt-0">
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->

<div class="row ">
    <div class="col-lg-12">
        <div class="d-flex">
            <div>
                <?= $this->Html->link('<i class="fa fa-plus"></i> イベント登録',
                        ['controller' => 'FamousEvents', 'action' => 'add'],
                        ['class' => 'btn btn-sm cyan', 'escape' => false]
                )?>
            </div>
            <div class="ml-auto">
                <p class="dark-grey-text text-right pt-2">
                    <small>
                        <?= $this->Paginator->counter('{{page}} / {{pages}} ページ &nbsp; 全 {{count}} 件') ?>
                    </small>
                </p>
            </div>
        </div>
        <hr class="mt-0">
    </div><!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-12">
        <?= $this->Flash->render() ?>
    </div>
</div>

<?php if (count($famousEvents) !== 0) : ?>
    <div class="row">
        <?php $i = 0; foreach ($famousEvents as $event) : ?>
            <div class="modal fade event" id="event<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body pt-4 pb-4">

                            <div class="d-flex">
                                <div class="p-0">
                                    <h6 class="font-weight-bold m-3">
                                        Event Information
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
                                            if ($event->image) {
                                                print $this->Html->image($event->image, ['class' => 'img-fluid']);
                                            } else {
                                                print $this->Html->image('/img/sample/noimage-600x360.jpg', ['class' => 'img-fluid']);
                                            }
                                        ?>
                                    </h3>
                                </div>
                                <div class="col-lg-7 text-center">
                                    <p class="grey-text text-left mb-0">
                                        <small><?= h($event->category) ?></small>
                                    </p>
                                    <h3 class="h3-responsive product-name mt-2 dark-grey-text font-weight-bold">
                                        <strong><?= h($event->title) ?></strong>
                                    </h3>
                                    <hr>
                                    <h6 class="h6-responsive font-weight-bold">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i> <?= h($event->event_date) ?>
                                    </h6>
                                    <p class="font-weight-bold">
                                        START: <?= h($event->start) ?> ～ END: <?= h($event->end) ?>
                                    </p>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p class="dark-grey-text">
                                                <?= nl2br(h($event->body)) ?>
                                            </p>
                                        </div>
                                    </div><!-- /.row -->
                                    <!--Footer-->
                                    <div class="modal-footer justify-content-center">
                                        <?= $this->Html->link('<i class="fa fa-edit mr-1" aria-hidden="true"></i><span class="none">EDIT</span>',
                                            ['controller' => 'FamousEvents', 'action' => 'edit', $event->id],
                                            [
                                                'class' => 'btn btn-outline-success btn-rounded btn-md ml-4',
                                                'escape' => false
                                            ]
                                        ) ?>
                                        <?= $this->Form->postLink('<i class="fa fa-trash mr-1" aria-hidden="true"></i><span class="none">DELETE</span>',
                                            ['controller' => 'FamousEvents', 'action' => 'delete', $event->id],
                                            [
                                                'class' => 'btn btn-outline-danger btn-rounded btn-md ml-4',
                                                'escape' => false,
                                                'confirm' => 'イベントを削除します。本当によろしいですか？'
                                            ]
                                        ) ?>

                                        <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">
                                            <i class="fa fa-close mr-1" aria-hidden="true"></i><span class="none">Close</span>
                                        </button>
                                    </div>
                                </div><!-- /.col-lg-7 -->
                            </div><!-- /.row -->
                        </div><!-- /.modal-body -->
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mb-3">
                <div class="card">
                    <div class="view overlay">
                        <?php
                            if ($event->image) {
                                print $this->Html->image($event->image, ['class' => 'card-img-top', 'alt' => 'Card image cap']);
                            } else {
                                print $this->Html->image('/img/sample/noimage-600x360.jpg', ['class' => 'card-img-top', 'alt' => 'Card image cap']);
                            }
                        ?>
                        <a>
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>

                    <?= $this->Html->link('<i class="fa fa-chevron-right pl-1"></i>', 'javascript:void(0)',
                        [
                            'class'       => 'btn-floating btn-action ml-auto mr-4 mdb-color lighten-3',
                            'data-toggle' => 'modal',
                            'data-target' => '#event' . $i,
                            'escape'      => false
                        ])
                    ?>

                    <div class="card-body">
                        <h5 class="card-title h5-responsive"><?= h($event->title) ?></h5>
                        <hr>
                        <p class="card-text">
                            <?= tw(nl2br(h($event->body)), 70) ?>
                        </p>
                    </div>

                    <div class="rounded-bottom mdb-color lighten-3 text-center pt-3">
                        <ul class="list-unstyled list-inline font-small">
                            <li class="list-inline-item pr-2 white-text"><i class="fa fa-clock-o pr-1"></i><?= h($event->event_date) ?></li>
                            <li class="list-inline-item pr-2 white-text">Start: <?= h($event->start) ?></li>
                            <li class="list-inline-item pr-2 white-text">End: <?= h($event->end) ?></li>
                        </ul>
                    </div>
                </div><!-- /.card -->
            </div><!-- /.col-lg-3 -->
        <?php $i++; endforeach; ?>
    </div><!-- /.row -->
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
    <div class="card card-body">
        <p class="text-center mb-0">
            登録しているイベントはありません。
        </p>
    </div>
<?php endif; ?>
