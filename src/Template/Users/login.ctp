<?php $this->assign('title', 'ログイン'); ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 mt-5 mb-4">
            <?= $this->Flash->render() ?>
            <h3 class="dark-grey-text text-center">
                サインイン
            </h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-xs-12">
        </div>
        <div class="col-lg-6 col-xs-12">
            <div class="card card-body mb-3">
                <?= $this->Form->create() ?>
                <div class="col-lg-12">
                    <div class="md-form mt-3 mb-4">
                        <?= $this->Form->control('email', ['id' => 'f--email', 'class' => 'form-control', 'required']) ?>
                        <label for="f--email">メールアドレス</label>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="md-form mb-4">
                        <?= $this->Form->control('password', ['type' => 'password', 'id' => 'f--password', 'class' => 'form-control', 'required']) ?>
                        <label for="f--password">パスワード</label>
                        <p class="blue-text d-flex justify-content-end">
                            <small>
                                <?= $this->Html->link('パスワードを忘れた場合', ['controller' => 'Users', 'action' => 'forgot']) ?>
                            </small>
                        </p>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="md-form">
                        <?= $this->Form->button('ログイン', ['class' => 'btn btn-primary btn-block']) ?>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="d-flex justify-content-end">
                        <p>
                            <small>
                                まだ会員でない方は <?= $this->Html->link('サインアップ', ['action' => 'signup']) ?>
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
