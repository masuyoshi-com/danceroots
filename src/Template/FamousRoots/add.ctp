<?php $this->assign('title', 'ダンスルーツ登録'); ?>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="d-flex">
            <div>
                <h5 class="h5-responsive font-weight-bold">
                    Dance R<span class="font-blue">oo</span>ts<i class="fa fa-plus pink-text ml-2" aria-hidden="true"></i>
                </h5>
            </div>
            <div class="ml-auto">
                <p class="m-0 grey-text"><small>ダンスルーツ登録</small></p>
            </div>
        </div>
        <hr class="mt-0 mb-1">
        <?= $this->Html->link('<i class="fa fa-list mr-1" aria-hidden="true"></i>ルーツ一覧',
            ['controller' => 'FamousRoots', 'action' => 'index'],
            ['class' => 'btn btn-sm btn-warning', 'escape' => false]
        ) ?>
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <?= $this->Flash->render() ?>
    </div>
</div>

<?= $this->Form->create($famousRoot) ?>
<?= $this->Form->hidden('user_id', ['value' => $logins['id']]) ?>

<div class="row">
    <div class="col-lg-2">
    </div>
    <div class="col-lg-8">
        <div class="card card-body mt-3 mb-3">

            <div class="row">
                <div class="col-lg-12">
                    <label class="dark-grey-text w-100 text-left"><small>タイトル <span class="red-text">※</span></small></label>
                    <div class="md-form mt-0">
                        <?= $this->Form->control('title', ['class' => 'form-control']) ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="md-form">
                        <?= $this->Form->control('year',
                            [
                                'id'      => 'f--year',
                                'type'    => 'select',
                                'class'   => 'mdb-select colorful-select dropdown-primary',
                                'options' => $years,
                                'default' => 2000
                            ]
                        ) ?>
                        <label for="f--year">何年頃</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <label class="dark-gray-text w-100 text-left"><small>YouTube <span class="red-text">※</span></small> <span class="badge badge-info">動画URLをコピペ</span></label>
                    <div class="md-form mt-0">
                        <?= $this->Form->control('youtube', ['class' => 'form-control']) ?>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-lg-12">
                    <label class="dark-gray-text w-100 text-left"><small>内容</small>
                    <div class="md-form mt-0">
                        <?= $this->Form->textarea('body', [
                                'class' => 'form-control md-textarea',
                                'placeholder' => '当時の実績に関連する内容。動画があれば使用した曲名など'
                            ])
                        ?>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-12">
                    <?= $this->Form->button('<i class="fa fa-plus" aria-hidden="true"></i> 登録', [
                            'type'   => 'submit',
                            'class'  => 'btn btn-primary btn-block',
                            'escape' => false,
                        ])
                    ?>
                </div>
            </div>
        </div><!--/.card -->
    </div><!-- /.col-lg-8 -->
    <div class="col-lg-2">
    </div>
</div>
<?= $this->Form->end() ?>
