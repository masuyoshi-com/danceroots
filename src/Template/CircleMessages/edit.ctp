<?php $this->assign('title', 'サークルメッセージ編集'); ?>

<div class="row">
    <div class="col-lg-2">
    </div>
    <div class="col-lg-8">
        <div class="card card-cascade narrower mb-3">
            <div class="col-lg-12">
                <div class="view gradient-card-header mx-4 blue-gradient">
                    <h3 class="h3-responsive mb-0">
                        <i class="fa fa-edit"></i> サークルメッセージ<span class="none">編集</span>
                    </h3>
                    <small><i class="fa fa-info-circle"></i> メッセージ変更通知をするか選択してください。</small>
                </div>
            </div>

            <div class="card-body">

                <div class="row">
                    <div class="col-lg-12">
                        <?= $this->Flash->render() ?>
                    </div>
                </div>

                <?= $this->Form->create($circleMessage) ?>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-check">
                            <?= $this->Form->checkbox('notice', ['class' => 'form-check-input', 'id' => 'f--notice', 'value' => '1']) ?>
                            <label class="form-check-label" for="f--notice">
                                <span class="none">メンバーに</span>メッセージの変更を通知する
                            </label>
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
                                    'rows'  => '15'
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
    </div><!-- /.col-lg-10 -->
    <div class="col-lg-2">
    </div>
</div>
