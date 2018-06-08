<?php $this->assign('title', '送信済みメッセージ詳細'); ?>

<div class="row">
    <div class="col-lg-2">
    </div>
    <div class="col-lg-8">
        <div class="card card-cascade narrower">
            <div class="col-lg-12 mb-3">
                <div class="view gradient-card-header mx-4 blue-gradient">
                    <h4 class="h4-responsive mb-0">
                        <i class="fa fa-inbox" aria-hidden="true"></i> <?= h($message->to_username[0]->username) ?>さんへ送ったメッセージ
                    </h4>
                </div>
            </div>

            <div class="card-body">

                <div class="row">
                    <div class="col-lg-12">
                        <?= $this->Html->link('<i class="fa fa-arrow-circle-left" aria-hidden="true"></i> 戻る',
                                ['action' => 'outbox', $logins['id']],
                                ['class' => 'btn btn-sm btn-warning', 'escape' => false]
                        ) ?>
                        <?= $this->Form->postLink('<i class="fa fa-trash" aria-hidden="true"></i> メッセージ削除',
                            ['action' => 'from_delete'],
                            ['class' => 'btn btn-sm btn-danger', 'escape' => false, 'confirm' => '本当に削除しても良いですか？']
                        )?>
                    </div>
                </div>

                <hr>

                <?= $this->Flash->render() ?>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="md-form">
                            <?= $this->Form->control('title',
                                    [
                                        'class' => 'form-control',
                                        'value' => h($message->title),
                                        'disabled'
                                    ]
                            ) ?>
                            <label>タイトル</label>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-12 text-left">
                        <label class="dark-gray-text w-100"><small>メール本文</small></label>
                        <div class="md-form mt-0">
                            <?= nl2br(h($message->body)) ?>
                        </div>
                        <hr class="mdb-form-color">
                    </div>
                </div>

            </div><!-- /.card-body -->
        </div><!-- /.card -->
    </div>
    <div class="col-lg-2">
    </div>
</div>
