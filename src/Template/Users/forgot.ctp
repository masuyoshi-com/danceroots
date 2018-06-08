<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 mt-5 mb-3">
            <h3 class="text-center">パスワードを忘れた場合</h3>
        </div>
    </div>
    <?= $this->Form->create() ?>
    <div class="row">
        <div class="col-lg-3 col-xs-12">
        </div>
        <div class="col-lg-6 col-xs-12">
            <div class="card card-body">
                <div class="col-lg-12 mt-3">
                    <p class="dark-grey-text text-center">
                        <small><i class="fa fa-info-circle"></i> パスワード再発行は登録済みのメールアドレスを入力してください。</small>
                    </p>
                </div>
                <hr>
                <div class="col-lg-12">
                    <div class="md-form">
                        <?= $this->Form->control('email', ['id' => 'f--email','class' => 'form-control']) ?>
                        <label for="f--email">メールアドレス</label>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="md-form">
                        <?= $this->Form->button('送信', ['class' => 'btn btn-success btn-block']) ?>
                    </div>
                </div>
                <hr>
                <div class="col-lg-12">
                    <p class="text-center dark-grey-text">
                        <small>© <?= date('Y') ?> danceroots.net All Rights Reserved.</small>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-xs-12">
        </div>
    </div><!-- /.row -->
    <?= $this->Form->end() ?>
</div><!-- /.container -->
