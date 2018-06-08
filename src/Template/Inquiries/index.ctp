<?php $this->assign('title', 'お問い合わせ'); ?>
<div class="container">
    <div class="row mt-5">
        <div class="col-lg-12 dark-grey-text">
            <h2 class="section-heading text-center mt-5 pt-lg-3">
                <i class="fa fa-envelope-o"></i> お問い合わせ
            </h2>
            <hr>
            <p class="dark-grey-text text-center">
                <small>
                    サイトに関する不明点、または迷惑行為報告なども受け付けております。
                    皆さまの意見がより良いサービス提供につながります。ご協力の程、よろしくお願いいたします。
                </small>
            </p>
        </div>
    </div>

    <?= $this->Form->create($inquiry) ?>

    <div class="card card-body mb-5">

        <div class="col-lg-12">
            <?= $this->Flash->render() ?>
        </div>

        <div class="row">
            <div class="col-lg-6 co-md-12">
                <div class="md-form">
                    <?= $this->Form->control('name', ['id' => 'f--name', 'class' => 'form-control']) ?>
                    <label for="f--name">お名前</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="md-form">
                    <?= $this->Form->control('email', ['id' => 'f--i_email', 'class' => 'form-control']) ?>
                    <label for="f--i_email">eMail</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="md-form">
                <?= $this->Form->control('subject', ['id' => 'f--subject', 'class' => 'form-control']) ?>
                <label for="f--subject">ご用件</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="md-form">
                    <?= $this->Form->textarea('message',
                        [
                            'id'    => 'f--message',
                            'class' => 'form-control md-textarea',
                            'style'  => 'height: 200px;'
                        ]
                    ) ?>
                    <label for="f--message">メッセージ</label>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <?= $this->Form->button('送信', ['class' => 'btn btn-success btn-block']) ?>
        </div>

        <?= $this->Form->end() ?>
    </div>
</div><!-- /.container -->
