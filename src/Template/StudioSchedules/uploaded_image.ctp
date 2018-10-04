<?php $this->assign('title', 'レッスンスケジュール - イメージ管理'); ?>

<div class="row">

    <div class="col-lg-1">
    </div>

    <div class="col-lg-10">
        <div class="d-flex">
            <div>
                <h6 class="h6-responsive">
                    <i class="fa fa-image"></i> イメージ管理
                </h6>
            </div>
            <div class="ml-auto">
                <p class="grey-text mb-0">
                    <small>不要なイメージを削除できます。</small>
                </p>
            </div>
        </div>
        <hr class="mt-0 mb-1">
        <div class="row mb-1">
            <div class="col-lg-12">
                <?= $this->Html->link('マイ スケジュール',
                    ['controller' => 'StudioSchedules', 'action' => 'mySchedule'],
                    ['class' => 'btn btn-sm btn-primary']
                ) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <?= $this->Flash->render() ?>
            </div>
        </div>

        <?= $this->Form->create() ?>
        <?= $this->Form->hidden('user_id', ['value' => h($logins['id'])]) ?>

        <div class="card card-body mb-3">
            <div class="row">
                <?php $i = 1; foreach ($studioSchedules as $schedule) : ?>
                    <?php if (!is_null($schedule->image)) : ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="view">
                                <?= $this->Html->image($schedule->image, ['class' => 'img-fluid img-thumbnail', 'alt' => 'インストラクターイメージ']) ?>
                            </div>
                            <div class="form-check m-3 text-right">
                                <?= $this->Form->checkbox('delete_img' . $i,
                                    [
                                         'id'   => 'materialUnchecked' . $i,
                                        'class' => 'form-check-input',
                                        'value' => $schedule->image
                                    ]
                                ) ?>
                                <label class="form-check-label" for="materialUnchecked<?= $i ?>">削除する</label>
                            </div>
                        </div>
                    <?php $i++; endif; ?>
                <?php endforeach; ?>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <?= $this->Form->button('<i class="fa fa-trash"></i> 選択したイメージを削除',
                        ['class' => 'btn btn-warning btn-block', 'escape' => false, 'confirm' => '選択した画像を削除します。本当によろしいですか？']
                    ) ?>
                </div>
            </div>
            <?= $this->Form->end() ?>
        </div><!-- /.card -->
    </div><!-- /.col-lg-8 -->

    <div class="col-lg-1">
    </div>
</div><!-- /.row -->
