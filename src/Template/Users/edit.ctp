<?php $this->assign('title', 'マイアカウント'); ?>

<div class="row">

    <div class="col-lg-2">
    </div>

    <div class="col-lg-8">
        <div class="jumbotron text-center">
            <h2 class="h2-responsive"><i class="fa fa-address-card-o pink-text" aria-hidden="true"></i> マイ アカウント</h2>
            <hr class="my-2">
            <p class="lead dark-grey-text">
                <small><i class="fa fa-info-circle"></i> メールアドレス変更の際は有効なメールアドレスか確認させていただきます。</small>
            </p>
            <hr class="my-2">
        </div>

        <div class="row">
            <div class="col-lg-12">
                <?= $this->Flash->render() ?>
            </div>
        </div>

        <?= $this->Form->create($user) ?>
        <?= $this->Form->hidden('id', ['value' => $user->id]) ?>
        <div class="card card-body mb-3">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <label class="dark-gray-text w-100 text-left"><small>ユーザー名</small></label>
                    <div class="md-form mt-0">
                        <?= $this->Form->control('username', ['class' => 'form-control']) ?>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <label class="dark-gray-text w-100 text-left"><small>現在のメールアドレス </small>
                        <span class="badge badge-primary">変更の際はお問い合わせ</span>
                    </label>
                    <div class="md-form mt-0">
                        <?= $this->Form->control('email', ['class' => 'form-control', 'disabled']) ?>
                    </div>
                </div>
            </div>

            <div class="row mt-3 mb-0">
                <div class="col-lg-12">
                    <h5><span class="badge badge-default">パスワードの変更</span></h5>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <label class="dark-gray-text w-100 text-left"><small>現在のパスワード</small></label>
                    <div class="md-form mt-0">
                        <?= $this->Form->control('current_password', ['type' => 'password', 'class' => 'form-control']) ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <label class="dark-gray-text w-100 text-left"><small>新たなパスワード</small></label>
                    <div class="md-form mt-0">
                        <?= $this->Form->control('new_password', ['type' => 'password', 'class' => 'form-control']) ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <label class="dark-gray-text w-100 text-left"><small>パスワード確認</small></label>
                    <div class="md-form mt-0">
                        <?= $this->Form->control('confirm_password', ['type' => 'password', 'class' => 'form-control']) ?>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-12">
                    <?= $this->Form->button('<i class="fa fa-edit"></i> 編集', ['class' => 'btn btn-success btn-block', 'escape' => false]) ?>
                </div>
            </div>

            <?= $this->Form->end() ?>
        </div><!-- /.card -->
    </div><!-- /.col-lg-8 -->

    <div class="col-lg-2">
    </div>
</div><!-- /.row -->
