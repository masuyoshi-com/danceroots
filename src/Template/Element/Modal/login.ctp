<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <?= $this->Form->create() ?>
        <div class="modal-content">

            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold dark-grey-text">
                    Dancer<span class="font-blue">oo</span>ts &nbsp;<small>ログイン</small>
                </h4>
                <?= $this->Form->button('<span aria-hidden="true">&times;</span>',
                    [
                        'class'        => 'close',
                        'data-dismiss' => 'modal',
                        'aria-label'   => 'Close'
                    ]
                ) ?>
            </div>

            <div class="modal-body mx-3">
                <div class="md-form mt-4 mb-5">
                    <i class="fa fa-envelope prefix grey-text"></i>
                    <?= $this->Form->control('email', ['id' => 'f--email', 'class' => 'form-control']) ?>
                    <label for="f--email">メールアドレス</label>
                </div>

                <div class="md-form mb-3">
                    <i class="fa fa-lock prefix grey-text"></i>
                    <?= $this->Form->control('password', ['type' => 'password', 'id' => 'f--password', 'class' => 'form-control']) ?>
                    <label for="f--password">パスワード</label>
                    <p class="blue-text d-flex justify-content-end">
                        <small>
                            <?= $this->Html->link('パスワードを忘れた場合', ['controller' => 'users', 'action' => 'forgot']) ?>
                        </small>
                    </p>
                </div>
            </div>

            <div class="modal-footer d-flex justify-content-center">
                <?= $this->Form->button('ログイン', ['class' => 'btn btn-success']) ?>
            </div>

        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
