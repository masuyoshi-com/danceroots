<?php $this->assign('title', 'マイアカウント'); ?>

<div class="row">

    <div class="col-lg-2">
    </div>

    <div class="col-lg-8">
        <div class="jumbotron text-center">
            <h1 class="h1-responsive"><i class="fa fa-edit pink-text"></i> マイ アカウント</h1>
            <hr class="my-2">
            <p class="lead grey-text">
                <small><i class="fa fa-info-circle"></i> アカウント編集は有効なメールアドレスが必要です。</small>
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
                    <label class="dark-gray-text w-100 text-left"><small>ユーザー名</small> <span class="badge badge-warning">変更できません</span></label>
                    <div class="md-form mt-0">
                        <?= $this->Form->control('username', ['class' => 'form-control', 'disabled']) ?>
                    </div>
                </div>
                <div class="col-lg-12">
                    <label class="dark-gray-text w-100 text-left"><small>有効なメールアドレス</small></label>
                    <div class="md-form mt-0">
                        <?= $this->Form->control('email', ['class' => 'form-control']) ?>
                    </div>
                </div>
                <div class="col-lg-12">
                    <label class="dark-gray-text w-100 text-left"><small>パスワード</small> <span class="badge badge-info">変更する場合のみ入力</span></label>
                    <div class="md-form mt-0">
                        <?= $this->Form->control('e_password', ['type' => 'password', 'class' => 'form-control']) ?>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-12">
                    <?= $this->Form->button('編集する', ['class' => 'btn btn-success btn-block']) ?>
                </div>
            </div>

            <?= $this->Form->end() ?>
        </div><!-- /.card -->
    </div><!-- /.col-lg-8 -->

    <div class="col-lg-2">
    </div>
</div><!-- /.row -->
