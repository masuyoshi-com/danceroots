<?php $this->assign('title', 'メールアドレス変更完了'); ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 mt-5">
            <h3 class="text-center">メールアドレスを変更しました。</h3>
            <p class="dark-grey-text text-center">
                <small>自動ログアウトしました。再度ログインしてください。</small>
            </p>
        </div>
    </div>
    <hr class="mb-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="md-form">
                <?= $this->Html->link('ログイン', ['controller' => 'users', 'action' => 'login'], ['class' => 'btn btn-primary btn-block']) ?>
            </div>
        </div>
    </div>
    <hr>
    <div class="col-lg-12">
        <p class="text-center dark-grey-text">
            <small>© <?= date('Y') ?> danceroots.net All Rights Reserved.</small>
        </p>
    </div>
</div>
