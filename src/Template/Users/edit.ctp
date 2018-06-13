<?php $this->assign('title', 'マイアカウント'); ?>

<div class="row">

    <div class="col-lg-2">
    </div>

    <div class="col-lg-8">
        <div class="jumbotron text-center">
            <h1 class="h1-responsive"><i class="fa fa-user-circle" aria-hidden="true"></i> マイ アカウント</h1>
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

        <div class="card card-body mb-3">
            <div class="row">
                <div class="col-lg-12">
                    <label class="dark-gray-text w-100 text-left"><small>ユーザー名</small></label>
                    <div class="md-form mt-0">
                        <?= $this->Form->control('username', ['class' => 'form-control']) ?>
                    </div>
                </div>
                <div class="col-lg-12">
                    <label class="dark-gray-text w-100 text-left"><small>現在のメールアドレス </small>
                        <span class="badge badge-primary">変更の際はお問い合わせ</span>
                    </label>
                    <div class="md-form mt-0">
                        <?= $this->Form->control('email', ['class' => 'form-control', 'disabled']) ?>
                    </div>
                </div>
                <div class="col-lg-12">
                    <label class="dark-gray-text w-100 text-left"><small>パスワード</small> <span class="badge badge-warning">変更する場合のみ入力</span></label>
                    <div class="md-form mt-0">
                        <?= $this->Form->control('e_password', ['type' => 'password', 'class' => 'form-control']) ?>
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
