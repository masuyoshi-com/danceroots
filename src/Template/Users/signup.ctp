<?php $this->assign('title', 'サインアップ'); ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 mt-5">
            <?= $this->Flash->render() ?>
            <h3 class="dark-grey-text text-center">
                サインアップ
            </h3>
            <p class="dark-grey-text text-center">
                <small>仮登録を行うために必要な項目を入力してください。</small>
            </p>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-3 col-xs-12">
        </div>
        <div class="col-lg-6 col-xs-12">
            <div class="card card-body">
                <?= $this->Form->create($user) ?>
                <div class="col-lg-12">
                    <div class="form-group mt-3 mb-4">
                        <label class="dark-grey-text"><small>ユーザー名</small></label>
                        <?= $this->Form->control('username', ['class' => 'form-control']) ?>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group mt-3 mb-4">
                        <label class="dark-grey-text"><small>有効なメールアドレス</small></label>
                        <?= $this->Form->control('email', ['class' => 'form-control']) ?>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group mb-5">
                        <label class="dark-grey-text"><small>パスワード</small></label>
                        <?= $this->Form->control('password',
                            [
                                'type'        => 'password',
                                'class'       => 'form-control',
                                'placeholder' => '半角英数字含む5文字以上'
                            ]
                        ) ?>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group mb-3">
                        <?= $this->Form->control('classification',
                            [
                                'type'    => 'select',
                                'class'   => 'form-control',
                                'options' => ['ストリートダンサー', 'スタジオ・学校', 'オーガナイザー・企業', '一般'],
                                'empty'   => '利用区分を選択してください。'
                            ]
                        ) ?>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-inline d-flex justify-content-end mb-4">
                        <label for="f--agree"><?= $this->Html->link('利用規約', ['controller' => 'Pages','action' => 'contract'], ['target' => '_blank']) ?>に同意する</label>
                        <?= $this->Form->checkbox('agree', ['id' => 'f--agree','class' => 'signup-checkbox']) ?>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="md-form">
                        <?= $this->Form->button('サインアップ', ['class' => 'btn btn-primary btn-block']) ?>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="d-flex justify-content-end">
                        <p>
                            <small>
                                既にアカウントをお持ちの方は <?= $this->Html->link('サインイン', ['action' => 'login']) ?>
                            </small>
                        </p>
                    </div>
                </div>
                <?= $this->Form->end() ?>
                <hr>
                <div class="col-lg-12">
                    <p class="text-center dark-grey-text">
                        <small>© <?= date('Y') ?> danceroots.net All Rights Reserved.</small>
                    </p>
                </div>
            </div><!-- /.card -->
        </div><!-- /.col-lg-6 -->
        <div class="col-lg-3 col-xs-12">
        </div>
    </div><!-- /.row -->
</div><!-- /.container -->
