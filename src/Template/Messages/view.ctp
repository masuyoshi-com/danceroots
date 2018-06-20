<?php $this->assign('title', '受信メッセージ詳細'); ?>

<div class="row">
    <div class="col-lg-1">
    </div>
    <div class="col-lg-10">
        <div class="jumbotron p-5 text-center text-md-left author-box">
            <h3 class="h3-responsive text-center font-weight-bold dark-grey-text">
                 <?= h($message->user->username) ?> さんからのメッセージ
            </h3>
            <hr>
            <div class="row">
                <div class="col-12 col-md-2 mb-md-0 mb-4">
                    <?php
                        if ($message->profile->icon) {
                            print $this->Html->image($message->profile->icon, ['class' => 'img-fluid rounded-circle z-depth-2 avatar']);
                        } else {
                            print $this->Html->image('/img/sample/no_icon.jpg');
                        }
                    ?>
                </div>
                <div class="col-12 col-md-10">
                    <h5 class="font-weight-bold mb-3">
                        <strong>
                            <?= $this->Html->link(h($message->user->username), $message->link, ['class' => 'dark-grey-text', 'target' => '_blank']) ?>
                        </strong>
                    </h5>
                    <div class="personal-sm pb-3">
                        <?= $this->Html->link('<i class="fa fa-address-book pr-2 mr-2 fa-lg" area-hidden="true"></i>',
                                $message->link,
                                [
                                    'class'          => 'dark-grey-text',
                                    'data-toggle'    => 'tooltip',
                                    'data-placement' => 'bottom',
                                    'title'          => 'プロフィール',
                                    'target'         => '_blank',
                                    'escape'         => false
                                ]
                        ) ?>
                        <?php
                            if ($message->profile->facebook) {
                                print $this->Html->link('<i class="fa fa-facebook pr-2 mr-2 fb-ic fa-lg" area-hidden="true"></i>',
                                    h($message->profile->facebook),
                                        [
                                            'data-toggle'    => 'tooltip',
                                            'data-placement' => 'bottom',
                                            'title'          => 'Facebook',
                                            'target'         => '_blank',
                                            'escape'         => false
                                        ]
                                );
                            }
                        ?>
                        <?php
                            if ($message->profile->twitter) {
                                print $this->Html->link('<i class="fa fa-twitter pr-2 mr-2 tw-ic fa-lg" area-hidden="true"></i>',
                                    h($message->profile->twitter),
                                        [
                                            'data-toggle'    => 'tooltip',
                                            'data-placement' => 'bottom',
                                            'title'          => 'Twitter',
                                            'target'         => '_blank',
                                            'escape'         => false
                                        ]
                                );
                            }
                        ?>
                        <?php
                            if ($message->profile->instagram) {
                                print $this->Html->link('<i class="fa fa-instagram pr-2 mr-2 ins-ic fa-lg" area-hidden="true"></i>',
                                    h($message->profile->instagram),
                                        [
                                            'data-toggle'    => 'tooltip',
                                            'data-placement' => 'bottom',
                                            'title'          => 'Instagram',
                                            'target'         => '_blank',
                                            'escape'         => false
                                        ]
                                );
                            }
                        ?>
                    </div>
                    <hr>
                    <p>
                        <?= h($message->profile->self_intro) ?>
                    </p>
                    <?php if ($message->user_id !== $logins['id']) : ?>
                        <p>
                            <?= $this->Html->link('<i class="fa fa-paper-plane-o"></i> メッセージ',
                                ['action' => 'add', $message->user_id, $message->id],
                                ['class' => 'btn btn-primary btn-sm', 'escape' => false]
                            ) ?>
                        </p>
                    <?php endif; ?>
                </div><!-- /.col-12 -->
            </div><!-- /.row -->
        </div><!-- /.jumbotron -->
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->

<div class="row">
    <div class="col-lg-1">
    </div>
    <div class="col-lg-10">
        <div class="card card-body mb-3">

            <div class="row">
                <div class="col-lg-12">
                    <?= $this->Html->link('<i class="fa fa-list" aria-hidden="true"></i> 受信一覧',
                            ['action' => 'index', $logins['id']],
                            ['class' => 'btn btn-sm btn-info', 'escape' => false]
                    ) ?>
                    <?= $this->Form->postLink('<i class="fa fa-trash" aria-hidden="true"></i> メッセージ削除',
                        ['action' => 'to_delete', $message->id],
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

        </div><!-- /.card -->
    </div><!-- /.col-lg-10 -->
    <div class="col-lg-1">
    </div>
</div><!-- /.row -->
