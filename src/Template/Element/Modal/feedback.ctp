<div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Feedback</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?= $this->Form->hidden('id', ['id' => 'feedback-id', 'value' => $logins['id']]) ?>
            <div class="modal-body mx-3">
                <p>
                    <small>
                    サイトをより良いものに改善するため、皆さまのご協力をお願いしております。
                    迷惑行為などの報告もこのフィードバックをご利用ください。
                    </small>
                </p>
                <hr>

                <div class="md-form mb-5">
                    <i class="fa fa-tag prefix grey-text"></i>
                    <?= $this->Form->control('subject', [
                            'id'        => 'f--subject',
                            'class'     => 'form-control',
                            'maxlength' => 150,
                            'required'
                        ])
                    ?>
                    <label for="f--subject">件名</label>
                </div>

                <div class="md-form">
                    <i class="fa fa-pencil prefix grey-text"></i>
                    <?= $this->Form->textarea('body', [
                            'id'     => 'f--body',
                            'class'  => 'md-textarea form-control',
                            'rows'   => '10',
                            'required'
                        ])
                    ?>
                    <label for="f--body">要望・迷惑報告など</label>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <?= $this->Form->button('<i class="fa fa-paper-plane-o ml-1" aria-hidden="true"></i> 送信',
                    [
                        'id'     => 'feedback-submit',
                        'class'  => 'btn btn-primary',
                        'escape' => false
                    ]
                ) ?>
            </div>
        </div>
    </div>
</div>
