<div class="modal fade" id="modalSignupForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <?= $this->Form->create(null, ['url' => ['controller' => 'users', 'action' => 'signup']]) ?>
        <div class="modal-content">

            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold dark-grey-text">
                    Dancer<span class="font-blue">oo</span>ts &nbsp;<small>サインアップ</small>
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
                <?= $this->Flash->render() ?>
                <div class="md-form mt-4 mb-5">
                    <i class="fa fa-envelope prefix grey-text"></i>
                    <?= $this->Form->control('email', ['id' => 'f--s_email', 'class' => 'form-control']) ?>
                    <label for="f--s_email">有効なメールアドレス</label>
                </div>

                <div class="md-form mb-5">
                    <i class="fa fa-lock prefix grey-text"></i>
                    <?= $this->Form->control('password', ['type' => 'password', 'id' => 'f--s_password', 'class' => 'form-control']) ?>
                    <label for="f--s_password">パスワード - 5文字以上</label>
                </div>

                <div class="form-group">
                    <?= $this->Form->control('classification',
                        [
                            'type'    => 'select',
                            'class'   => 'form-control',
                            'options' => ['ストリートダンサー', 'スタジオ・学校', 'オーガナイザー・企業', '一般'],
                            'empty' => '利用区分を選択してください。'
                        ]
                    ) ?>
                </div>

                <div class="form-inline d-flex justify-content-end">
                    <label for="f--agree"><?= $this->Html->link('利用規約', ['action' => 'contract'], ['target' => '_blank']) ?>に同意する</label>
                    <?= $this->Form->checkbox('agree', ['id' => 'f--agree','class' => 'signup-checkbox']) ?>
                </div>

            </div><!-- /.modal-body -->

            <div class="modal-footer d-flex justify-content-center">
                <?= $this->Form->button('サインアップ', ['class' => 'btn btn-primary']) ?>
            </div>
        </div><!-- /.modal-content -->
        <?= $this->Form->end() ?>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
