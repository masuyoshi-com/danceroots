<div class="modal fade" id="modalMessageForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 font-weight-bold"><i class="fa fa-envelope dark-grey-text" aria-hidden="true"></i> Message</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?= $this->Form->hidden('to_user_id',  ['id' => 'to-user-id',  'value' => $to_user_id]) ?>
            <?= $this->Form->hidden('to_username', ['id' => 'to-username', 'value' => $to_username]) ?>
            <?php
                // 返信時 - メッセージID
                if (isset($message_id)) {
                    print $this->Form->hidden('message_id', ['id' => 'message-id', 'value' => $message_id]);
                }
            ?>

            <div class="modal-body mx-3 mt-2">
                <p class="text-center">
                    <small>
                        <?= h($to_username) ?>さんにメッセージを送りましょう。
                    </small>
                </p>
                <hr>

                <div class="md-form mb-5">
                    <i class="fa fa-tag prefix grey-text"></i>
                    <?= $this->Form->control('title', [
                            'id'        => 'f--title',
                            'class'     => 'form-control',
                            'maxlength' => 150,
                            'required'
                        ])
                    ?>
                    <label for="f--subject">タイトル</label>
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
                    <label for="f--body">本文</label>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <?= $this->Form->button('<i class="fa fa-paper-plane-o ml-1" aria-hidden="true"></i> 送信',
                    [
                        'id'     => 'message-submit',
                        'class'  => 'btn btn-primary',
                        'escape' => false
                    ]
                ) ?>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog-->
</div><!-- /.modal -->
