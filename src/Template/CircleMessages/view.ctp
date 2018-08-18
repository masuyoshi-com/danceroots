<?php $this->assign('title', 'サークルメッセージ詳細'); ?>

<div class="row">
    <div class="col-lg-1">
    </div>
    <div class="col-lg-10">
        <div class="jumbotron p-5 text-center text-md-left author-box">
            <h3 class="h3-responsive text-center font-weight-bold dark-grey-text">
                <?= h($circle_message->title) ?>
            </h3>
            <hr>
            <div class="row">
                <div class="col-12 col-md-2 mb-md-0 mb-4">
                    <?php
                        if ($circle_message->owner->icon) {
                            print $this->Html->image($circle_message->owner->icon, ['class' => 'img-fluid rounded-circle z-depth-2 avatar']);
                        } else {
                            print $this->Html->image('/img/sample/no_icon.jpg', ['class' => 'img-fluid rounded-circle z-depth-2 avatar']);
                        }
                    ?>
                </div>
                <div class="col-12 col-md-10">
                    <h5 class="font-weight-bold mb-3">
                        <strong>
                            <?= $this->Html->link(h($circle_message->user->username), $profile_links, ['class' => 'dark-grey-text', 'target' => '_blank']) ?>
                        </strong>
                    </h5>
                    <div class="personal-sm pb-3">
                        <?= $this->Html->link('<i class="fa fa-address-book pr-2 mr-2 fa-lg" area-hidden="true"></i>',
                                $profile_links,
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
                            if ($circle_message->owner->facebook) {
                                print $this->Html->link('<i class="fa fa-facebook pr-2 mr-2 fb-ic fa-lg" area-hidden="true"></i>',
                                    h($circle_message->owner->facebook),
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
                            if ($circle_message->owner->twitter) {
                                print $this->Html->link('<i class="fa fa-twitter pr-2 mr-2 tw-ic fa-lg" area-hidden="true"></i>',
                                    h($circle_message->owner->twitter),
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
                            if ($circle_message->owner->instagram) {
                                print $this->Html->link('<i class="fa fa-instagram pr-2 mr-2 ins-ic fa-lg" area-hidden="true"></i>',
                                    h($circle_message->owner->instagram),
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
                        <?= h($circle_message->owner->self_intro) ?>
                    </p>
                    <?php if ($circle_message->user_id !== $logins['id']) : ?>
                        <p>
                            <?= $this->Html->link('<i class="fa fa-paper-plane-o" aria-hidden="true"></i> メッセージ',
                                'javascript:void(0)',
                                [
                                    'class'       => 'btn btn-primary btn-sm',
                                    'escape'      => false,
                                    'data-toggle' => 'modal',
                                    'data-target' => '#modalMessageForm'
                                ]
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
                    <?= $this->Html->link('<i class="fa fa-home" aria-hidden="true"></i> サークルホーム',
                            ['controller' => 'Circles', 'action' => 'home', h($circle_message->circle_id)],
                            ['class' => 'btn btn-sm btn-warning', 'escape' => false]
                    ) ?>
                    <?= $this->Html->link('<i class="fa fa-list" aria-hidden="true"></i> <span class="none">メッセージ</span>一覧',
                            ['action' => 'index', h($circle_message->circle_id)],
                            ['class' => 'btn btn-sm btn-info', 'escape' => false]
                    ) ?>
                    <?php
                        if ($circle_message->user_id === $logins['id']) {

                            print $this->Html->link('<i class="fa fa-edit" aria-hidden="true"></i> 編集',
                                ['action' => 'edit', h($circle_message->id)],
                                ['class' => 'btn btn-sm btn-success', 'escape' => false]
                            );

                            print $this->Form->postLink('<i class="fa fa-trash" aria-hidden="true"></i> 削除',
                                ['action' => 'delete', h($circle_message->id)],
                                ['class' => 'btn btn-sm btn-danger', 'escape' => false, 'confirm' => '本当に削除しても良いですか？']
                            );

                        }
                    ?>
                </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->

            <hr>

            <?= $this->Flash->render() ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="md-form">
                        <?= $this->Form->control('title',
                                [
                                    'class' => 'form-control',
                                    'value' => h($circle_message->title),
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
                        <?= nl2br(h($circle_message->body)) ?>
                    </div>
                    <hr class="mdb-form-color">
                </div>
            </div>

        </div><!-- /.card -->
    </div><!-- /.col-lg-10 -->
    <div class="col-lg-1">
    </div>
</div><!-- /.row -->
