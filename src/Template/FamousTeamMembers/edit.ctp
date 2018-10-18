<?php $this->assign('title', $famous_team->name . 'メンバー編集') ?>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="d-flex">
            <div>
                <h5 class="h5-responsive font-weight-bold dark-grey-text">
                    <span class="none">Famous</span> Team Member<i class="fa fa-pencil pink-text ml-2" aria-hidden="true"></i>
                </h5>
            </div>
            <div class="ml-auto">
                <p class="m-0 grey-text"><small>有名チームメンバー編集</small></p>
            </div>
        </div>
        <hr class="mt-0 mb-1">
        <?= $this->Html->link('<i class="fa fa-list mr-1" aria-hidden="true"></i>メンバー一覧',
            ['controller' => 'FamousTeamMembers', 'action' => 'index'],
            ['class' => 'btn btn-sm btn-warning', 'escape' => false]
        ) ?>
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <?= $this->Flash->render() ?>
    </div>
</div>

<?= $this->Form->create($famousTeamMember, ['type' => 'file']) ?>
<?= $this->Form->hidden('user_id', ['value' => $logins['id']]) ?>
<?= $this->Form->hidden('famous_team_id', ['value' => $famous_team->id]) ?>

<div class="row">
    <div class="col-lg-2">
    </div>
    <div class="col-lg-8">
        <div class="card card-body mt-3 mb-3">

            <div class="row">
                <div class="col-lg-12">
                    <label class="dark-grey-text w-100 text-left"><small>メンバー名 <span class="red-text">※</span></small></label>
                    <div class="md-form mt-0">
                        <?= $this->Form->control('name', ['class' => 'form-control']) ?>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="dark-grey-text w-100 text-left">
                            <small>アイコン画像</small>
                            <span class="badge badge-primary">変更する場合のみ選択</span>
                        </label>
                        <?= $this->Form->control('image_file', ['type' => 'file', 'class' => 'form-control']) ?>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-lg-12">
                    <label class="dark-grey-text w-100 text-left"><small>プロフィールURL</small></label>
                    <div class="md-form mt-0">
                        <?= $this->Form->control('profile_url', ['class' => 'form-control']) ?>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-lg-12">
                    <label class="dark-grey-text w-100 text-left"><small>表示順</label>
                    <div class="md-form mt-0">
                        <?= $this->Form->control('display_order',
                            [
                                'type'  => 'number',
                                'class' => 'form-control',
                                'min'   => 0,
                                'max'   => 20
                            ])
                        ?>
                    </div>
                </div>
            </div>

            <div class="row mt-3 mb-3">
                <div class="col-lg-12">
                    <div class="form-check">
                        <?= $this->Form->checkbox('leader_flag', ['class' => 'form-check-input', 'id' => 'materialUnchecked']) ?>
                        <label class="form-check-label" for="materialUnchecked"><small>リーダーの場合はチェック</small></label>
                    </div>
                </div>
            </div>

            <hr class="mt-2">

            <div class="row">
                <div class="col-lg-12">
                    <?= $this->Form->button('<i class="fa fa-edit" aria-hidden="true"></i> 編集', [
                            'type'   => 'submit',
                            'class'  => 'btn btn-primary btn-block',
                            'escape' => false,
                        ])
                    ?>
                </div>
            </div>
        </div><!--/.card -->
    </div><!-- /.col-lg-8 -->
    <div class="col-lg-2">
    </div>
</div>
<?= $this->Form->end() ?>
