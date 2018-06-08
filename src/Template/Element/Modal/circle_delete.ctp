<div class="modal fade" id="modalCircleDeleteForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 font-weight-bold red-text"><i class="fa fa-warning"></i> サークル削除</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?= $this->Form->hidden('circle_id', ['id' => 'circle-id', 'value' => $circle->id]) ?>
            <?= $this->Form->hidden('user_id',   ['id' => 'user-id',   'value' => $circle->user_id]) ?>
            <div class="modal-body mx-3">
                <p>
                    <small>
                        サークルを削除することで、サークルメンバーへメール通知が届きます。
                        削除する理由を教えてください。
                    </small>
                </p>
                <hr>

                <div class="md-form">
                    <i class="fa fa-pencil prefix grey-text"></i>
                    <?= $this->Form->textarea('delete_reason', [
                            'id'    => 'f--delete_reason',
                            'class' => 'md-textarea form-control',
                            'rows'  => '10',
                            'required'
                        ])
                    ?>
                    <label for="f--body">サークルを削除する理由</label>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <?= $this->Form->button('<i class="fa fa-trash ml-1" aria-hidden="true"></i> サークル削除',
                    [
                        'id'     => 'circle-delete-submit',
                        'class'  => 'btn btn-danger',
                        'escape' => false
                    ]
                ) ?>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
