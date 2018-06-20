<?php $this->assign('title', 'メッセージ作成'); ?>

<div class="row">
    <div class="col-lg-2">
    </div>
    <div class="col-lg-8">
        <div class="card card-cascade narrower mb-3">
            <div class="col-lg-12">
                <div class="view gradient-card-header mx-4 blue-gradient">
                    <h3 class="h3-responsive mb-0">
                        <i class="fa fa-send"></i> <?= h($to_user->username) ?>さんにメッセージを送る
                    </h3>
                    <small><i class="fa fa-info-circle"></i> タイトルと本文を入力してください。</small>
                </div>
            </div>

            <div class="card-body">

                <div class="row">
                    <div class="col-lg-12">
                        <?= $this->Flash->render() ?>
                    </div>
                </div>

                <?= $this->Form->create($message) ?>
                <?= $this->Form->hidden('url',        ['value' => h($url)]) ?>
                <?= $this->Form->hidden('user_id',    ['value' => h($user_id)]) ?>
                <?= $this->Form->hidden('to_user',    ['value' => h($to_user->username)]) ?>
                <?= $this->Form->hidden('to_user_id', ['value' => h($to_user_id)]) ?>

                <div class="row">
                    <div class="col-lg-12">
                        <label class="dark-grey-text w-100 text-left"><small>タイトル</small></label>
                        <div class="md-form mt-0">
                            <?= $this->Form->control('title', ['class' => 'form-control']) ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="md-form">
                            <?= $this->Form->textarea('body',
                                [
                                    'id'    => 'f--body',
                                    'class' => 'form-control md-textarea',
                                    'rows'  => '18'
                                ]
                            ) ?>
                            <label for="f--body">本文</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="md-form">
                            <?= $this->Form->button('送信', ['class' => 'btn btn-success btn-block']) ?>
                        </div>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
    <div class="col-lg-2">
    </div>
</div>
