<?php $this->assign('title', 'お問い合わせメール送信完了'); ?>
<div class="container">
    <div class="row mt-5">
        <div class="col-lg-12 dark-grey-text">
            <h1 class="section-heading h1 text-center mt-5 pt-lg-3">
                <i class="fa fa-check green-text"></i> 送信完了
            </h1>
        </div>
    </div>
    <hr class="mb-5">
    <div class="row">
        <div class="col-lg-12" style="height: 263px;">
            <div class="text-center">
                <p class="pb-4">
                    送信完了しました。お問い合わせ誠にありがとうございました。
                </p>
                <hr class="p-2">
                <p>
                    <?= $this->Html->link('トップページへ',
                            ['controller' => 'pages', 'action' => 'index'],
                            ['class' => 'btn btn-primary btn-block']
                    ) ?>
                </p>
            </div>
        </div>
    </div>
</div>
