<?php $this->assign('title', 'サークルメッセージ登録'); ?>

<div class="row">
    <div class="col-lg-2">
    </div>
    <div class="col-lg-8">
        <div class="card card-cascade narrower mb-3">
            <div class="col-lg-12">
                <div class="view gradient-card-header mx-4 blue-gradient">
                    <h3 class="h3-responsive mb-0">
                        <i class="fa fa-send"></i> サークルメッセージ<span class="none">作成</span>
                    </h3>
                    <small><i class="fa fa-info-circle"></i> <span class="none">サークルメンバーに</span>メッセージを送りましょう。</small>
                </div>
            </div>

            <div class="card-body">

                <div class="row">
                    <div class="col-lg-12">
                        <?= $this->Flash->render() ?>
                    </div>
                </div>

                <?= $this->Form->create($circleMessage) ?>
                <?= $this->Form->hidden('circle_id', ['value' => h($circle_id)]) ?>
                <?= $this->Form->hidden('user_id',   ['value' => h($user_id)]) ?>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="md-form">
                            <blockquote class="blockquote bq-primary">
                                <p class="h2">メッセージ作成者 <?= h($from_user->username) ?></p>
                            </blockquote>
                        </div>
                        <hr class="mdb-form-color">
                    </div>
                </div>

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
                                    'rows'  => '13'
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
            </div><!-- /.card-body -->
        </div><!-- /.card -->
    </div>
    <div class="col-lg-2">
    </div>
</div>
