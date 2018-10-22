<?php $this->assign('title', 'プロフィール内イベント登録') ?>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="d-flex">
            <div>
                <h5 class="h5-responsive font-weight-bold">
                    <span class="none">Profile </span>Events/Workshop<i class="fa fa-plus pink-text ml-2" aria-hidden="true"></i>
                </h5>
            </div>
            <div class="ml-auto">
                <p class="m-0 grey-text"><small><span class="none">プロフィール内</span>イベント登録</small></p>
            </div>
        </div>
        <hr class="mt-0 mb-1">
        <?= $this->Html->link('<i class="fa fa-list mr-1" aria-hidden="true"></i>イベント一覧',
            ['controller' => 'FamousEvents', 'action' => 'index'],
            ['class' => 'btn btn-sm btn-warning', 'escape' => false]
        ) ?>
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <?= $this->Flash->render() ?>
    </div>
</div>

<?= $this->Form->create($famousEvent, ['type' => 'file']) ?>
<?= $this->Form->hidden('user_id', ['value' => $logins['id']]) ?>

<div class="row">
    <div class="col-lg-2">
    </div>
    <div class="col-lg-8">
        <div class="card card-body mt-3 mb-3">

            <div class="row">
                <div class="col-lg-12">
                    <div class="md-form">
                        <?= $this->Form->control('category',
                            [
                                'id'      => 'f--category',
                                'type'    => 'select',
                                'class'   => 'mdb-select colorful-select dropdown-primary',
                                'options' => $categories
                            ]
                        ) ?>
                        <label for="f--category">カテゴリ <span class="red-text">※</span></label>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <label class="dark-grey-text w-100 text-left"><small>タイトル <span class="red-text">※</span></small></label>
                    <div class="md-form mt-0">
                        <?= $this->Form->control('title', ['class' => 'form-control']) ?>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="dark-grey-text w-100 text-left">
                            <small>イベントイメージ</small>
                            <span class="badge badge-primary">対応拡張子 - jpg png gif</span>
                        </label>
                        <?= $this->Form->control('image_file', ['type' => 'file', 'class' => 'form-control']) ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <label class="dark-grey-text w-100 text-left"><small>開催日 <span class="red-text">※</span></small></label>
                    <div class="md-form mt-0">
                        <?= $this->Form->control('event_date',
                            [
                                'type'  => 'text',
                                'class' => 'form-control datepicker'
                            ]
                        ) ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="md-form">
                        <?= $this->Form->control('start',
                            [
                                'id'          => 'f--start',
                                'class'       => 'form-control timepicker time',
                                'placeholder' => '開始時刻',
                                'required'
                            ]
                        ) ?>
                        <label for="f--start">START <span class="red-text">※</span></label>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="md-form">
                        <?= $this->Form->control('end',
                            [
                                'id'          => 'f--end',
                                'class'       => 'form-control timepicker time',
                                'placeholder' => '終了時刻',
                                'required'
                            ]
                        ) ?>
                        <label for="f--end">END <span class="red-text">※</span></label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="md-form">
                        <?= $this->Form->textarea('body',
                            [
                                'id'    => 'fbodyguest',
                                'class' => 'form-control md-textarea',
                                'rows'  => '8',
                            ]
                        ) ?>
                        <label for="f--body">イベント内容・紹介など</label>
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
