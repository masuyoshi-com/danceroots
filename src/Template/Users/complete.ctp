<?php $this->assign('title', 'アカウント本登録完了'); ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 mt-5">
            <h3 class="text-center"><i class="fa fa-check green-text"></i> 本登録完了しました。</h3>
            <p class="dark-grey-text text-center">
                <small>本登録完了しました。サインインへ進んでください。</small>
            </p>
        </div>
    </div>
    <hr class="mb-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="md-form">
                <?= $this->Html->link('サインイン', ['action' => 'login'], ['class' => 'btn btn-success btn-block']) ?>
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
