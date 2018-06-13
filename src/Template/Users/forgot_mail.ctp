<?php $this->assign('title', 'パスワード忘れたメール送信完了'); ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 mt-5">
            <h3 class="text-center">
                <i class="fa fa-send"></i> メール送信しました。
            </h3>
            <p class="dark-grey-text text-center">
                <small>メールを送信しました。送付URLをクリックしてパスワードを再発行してください。リンク有効期限は48時間です。</small>
            </p>
        </div>
    </div>
    <hr class="mb-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="md-form">
                <?= $this->Html->link('トップページへ', ['controller' => 'pages', 'action' => 'index'], ['class' => 'btn btn-primary btn-block']) ?>
            </div>
        </div>
    </div>
    <hr>
    <div class="col-lg-12">
        <p class="text-center dark-grey-text">
            <small>© <?= date('Y') ?> danceroots.net All Rights Reserved.</small>
        </p>
    </div>
</div><!-- /.container -->
