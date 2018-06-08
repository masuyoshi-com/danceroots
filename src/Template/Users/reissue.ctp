<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 mt-5">
            <h3 class="text-center">パスワード再発行</h3>
            <p class="dark-grey-text text-center">
                <small>パスワードを再発行してください。</small>
            </p>
        </div>
    </div>
    <hr class="mb-5">
    <?= $this->Form->create() ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="md-form">
                <?= $this->Form->control('password', ['id' => 'f--password', 'class' => 'form-control']) ?>
                <label for="f--email">パスワードは5文字以上</label>
            </div>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-lg-12">
            <div class="md-form">
                <?= $this->Form->control('confirm', ['id' => 'f--confirm', 'class' => 'form-control']) ?>
                <label for="f--confirm">もう一度</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="md-form">
                <?= $this->Form->button('パスワード再発行', ['class' => 'btn btn-success btn-block']) ?>
            </div>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>
