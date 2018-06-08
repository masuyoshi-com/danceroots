<?php $this->assign('title', 'お問い合わせメール送信完了'); ?>
<div class="container">
    <div class="row mt-5">
        <div class="col-lg-12 dark-grey-text">
            <h1 class="section-heading h1 text-center mt-5 pt-lg-3">
                <i class="fa fa-check"></i> 送信完了
            </h1>
        </div>
    </div>
    <hr class="mb-5">
    <div class="row">
        <div class="col-lg-12" style="height: 263px;">
            <div class="text-center">
                <p>
                    <?= $this->Html->link('送信完了しました。お問い合わせ誠にありがとうございました。', '/') ?>
                </p>
            </div>
        </div>
    </div>
</div>
