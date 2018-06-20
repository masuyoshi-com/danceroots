<?php $this->assign('title', 'エラー'); ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 mt-5">
            <h3 class="text-center"><i class="fa fa-warning orange-text"></i> ページが見つかりません。</h3>
            <p class="dark-grey-text text-center">
                <small>リンク有効期限切れ、または不正なアクセスの可能性があります。解決しない場合はお問い合わせください。</small>
            </p>
        </div>
    </div>
    <hr class="mb-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="md-form">
                <?= $this->Html->link('トップページ', ['controller' => 'pages', 'action' => 'index'], ['class' => 'btn btn-warning btn-block']) ?>
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
