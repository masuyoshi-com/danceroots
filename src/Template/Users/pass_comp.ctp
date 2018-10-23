<?php $this->assign('title', 'パスワード再発行完了'); ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 mt-5">
            <h3 class="text-center">パスワード再発行しました。</h3>
            <p class="dark-grey-text text-center">
                <small>無事にパスワード再発行しました。トップページよりサインインへ進んでください。</small>
            </p>
        </div>
    </div>
    <hr class="mb-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="md-form">
                <?= $this->Html->link('トップページ', ['controller' => 'pages', 'action' => 'index'], ['class' => 'btn btn-primary btn-block']) ?>
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
