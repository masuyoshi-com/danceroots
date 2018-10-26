<?php $this->assign('title', '有名ダンサープロフィール編集'); ?>

<div class="row">
    <div class="col-lg-12">
        <?= $this->Flash->render() ?>
    </div>
</div>

<?= $this->Form->create($famousDancer, ['type' => 'file']) ?>
<?= $this->Form->hidden('user_id', ['value' => $logins['id']]) ?>
<div class="row">

    <div class="col-lg-4 col-md-12 mt-4">
        <section class="card card-cascade card-avatar mb-4 mt-5">

            <?= $this->Html->image('/img/sample/no_icon.jpg') ?>
            <div class="card-body">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="dark-grey-text w-100 text-left">
                                <small>アイコン画像</small>
                                <span class="badge badge-primary">変更する場合のみ選択</span>
                            </label>
                            <?= $this->Form->control('icon_file', ['type' => 'file', 'class' => 'form-control']) ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="dark-grey-text w-100 text-left">
                                <small>プロフィール画像</small>
                                <span class="badge badge-primary">2064×1152</span>
                            </label>
                            <?= $this->Form->control('image_file', ['type' => 'file', 'class' => 'form-control']) ?>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <label class="dark-grey-text w-100 text-left"><small>ダンサー名</small></label>
                        <div class="md-form mt-0">
                            <?= $this->Form->control('name', ['class' => 'form-control']) ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <label class="dark-grey-text w-100 text-left"><small>所属チーム名</small></label>
                        <div class="md-form mt-0">
                            <?= $this->Form->control('team_name', ['class' => 'form-control']) ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="md-form">
                            <?= $this->Form->control('genre',
                                [
                                    'id'      => 'f--genre',
                                    'type'    => 'select',
                                    'class'   => 'mdb-select colorful-select dropdown-primary',
                                    'options' => $genres,
                                ]
                            ) ?>
                            <label for="f--genre">ジャンル <span class="red-text">※</span></label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="md-form">
                            <?= $this->Form->control('pref',
                                [
                                    'id'      => 'f--pref',
                                    'type'    => 'select',
                                    'class'   => 'mdb-select colorful-select dropdown-primary',
                                    'options' => $prefs,
                                ]
                            ) ?>
                            <label for="f--pref">都道府県 <span class="red-text">※</span></label>
                        </div>
                    </div>
                </div>

            </div><!-- /.card-body -->
        </section>
    </div><!-- /.col-lg-4 -->


    <div class="col-lg-8 col-md-12 mb-3">
        <div class="card card-cascade narrower">

            <div class="view gradient-card-header mdb-color lighten-2">
                <h5 class="mb-0 font-bold"><i class="fa fa-address-card" aria-hidden="true"></i> プロフィール編集</h5>
                <small><i class="fa fa-info-circle"></i> 閲覧者の印象に残るように詳細に項目を入力しましょう。</small>
            </div>

            <div class="card-body text-center">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="md-form">
                            <?= $this->Form->textarea('profile',
                                [
                                    'id'          => 'f--profile',
                                    'class'       => 'form-control md-textarea',
                                    'rows'        => '7',
                                    'placeholder' => 'コンテスト実績・クラブゲスト歴など'
                                ]
                            ) ?>
                            <label for="f--profile">プロフィール <span class="red-text">※</span></label>
                        </div>
                    </div>
                </div>

                <h4 class="font-weight-bold text-center mt-3">INTERVIEW</h4>
                <hr class="w-50">

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="md-form">
                            <?= $this->Form->textarea('iv_trigger',
                                [
                                    'id'    => 'f--iv_trigger',
                                    'class' => 'form-control md-textarea',
                                    'rows'  => '5',
                                ]
                            ) ?>
                            <label for="f--iv_trigger">ダンスを始めたキッカケ</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="md-form">
                            <?= $this->Form->textarea('iv_inspire',
                                [
                                    'id'    => 'f--iv_inspire',
                                    'class' => 'form-control md-textarea',
                                    'rows'  => '5',
                                ]
                            ) ?>
                            <label for="f--iv_inspire">インスパイアを受けたもの</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="md-form">
                            <?= $this->Form->textarea('iv_dancer',
                                [
                                    'id'    => 'f--iv_dancer',
                                    'class' => 'form-control md-textarea',
                                    'rows'  => '5',
                                ]
                            ) ?>
                            <label for="f--iv_dancer">ダンサーとして大切にしているもの</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="md-form">
                            <?= $this->Form->textarea('iv_instructor',
                                [
                                    'id'    => 'f--iv_instructor',
                                    'class' => 'form-control md-textarea',
                                    'rows'  => '5',
                                ]
                            ) ?>
                            <label for="f--iv_instructor">インストラクターとして心掛けていること</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="md-form">
                            <?= $this->Form->textarea('iv_advice',
                                [
                                    'id'    => 'f--iv_advice',
                                    'class' => 'form-control md-textarea',
                                    'rows'  => '5',
                                ]
                            ) ?>
                            <label for="f--iv_advice">これからのダンサーへアドバイス</label>
                        </div>
                    </div>
                </div>

                <h4 class="font-weight-bold text-center mt-3">SCHEDULE</h4>
                <hr class="w-50">

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="md-form">
                            <?= $this->Form->textarea('sche_sun', ['id' => 'f--sche_sun', 'class' => 'form-control md-textarea']) ?>
                            <label for="f--sche_sun">日曜スケジュール</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="md-form">
                            <?= $this->Form->textarea('sche_mon', ['id' => 'f--sche_mon', 'class' => 'form-control md-textarea']) ?>
                            <label for="f--sche_mon">月曜スケジュール</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="md-form">
                            <?= $this->Form->textarea('sche_tue', ['id' => 'f--sche_tue', 'class' => 'form-control md-textarea']) ?>
                            <label for="f--sche_tue">火曜スケジュール</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="md-form">
                            <?= $this->Form->textarea('sche_wed', ['id' => 'f--sche_wed', 'class' => 'form-control md-textarea']) ?>
                            <label for="f--sche_wed">水曜スケジュール</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="md-form">
                            <?= $this->Form->textarea('sche_thu', ['id' => 'f--sche_thu', 'class' => 'form-control md-textarea']) ?>
                            <label for="f--sche_thu">木曜スケジュール</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="md-form">
                            <?= $this->Form->textarea('sche_fri', ['id' => 'f--sche_fri', 'class' => 'form-control md-textarea']) ?>
                            <label for="f--sche_fri">金曜スケジュール</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="md-form">
                            <?= $this->Form->textarea('sche_sat', ['id' => 'f--sche_sat', 'class' => 'form-control md-textarea']) ?>
                            <label for="f--sche_sat">土曜スケジュール</label>
                        </div>
                    </div>
                </div>

                <h4 class="font-weight-bold text-center mt-3">SNS</h4>
                <hr class="w-50">

                <div class="row">
                    <div class="col-lg-6 col-xs-12">
                        <label class="dark-grey-text w-100 text-left"><small>YouTube①</small> <span class="badge badge-info">YouTubeURLをコピペ</span></label>
                        <div class="md-form mt-0">
                            <?= $this->Form->control('youtube1', ['class' => 'form-control']) ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xs-12">
                        <label class="dark-grey-text w-100 text-left"><small>YouTube②</small></label>
                        <div class="md-form mt-0">
                            <?= $this->Form->control('youtube2', ['id' => 'f--youtube2', 'class' => 'form-control']) ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <label class="dark-grey-text w-100 text-left"><small>YouTube③</small></label>
                        <div class="md-form mt-0">
                            <?= $this->Form->control('youtube3', ['class' => 'form-control']) ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-4 col-md-6 col-xs-12">
                        <label class="dark-grey-text w-100 text-left mt-3"><small>Twitter</small></label>
                        <div class="md-form mt-0">
                            <?= $this->Form->control('twitter', ['class' => 'form-control']) ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-xs-12">
                        <label class="dark-grey-text w-100 text-left mt-3"><small>Facebook</small></label>
                        <div class="md-form mt-0">
                            <?= $this->Form->control('facebook', ['class' => 'form-control']) ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-xs-12">
                        <label class="dark-grey-text w-100 text-left mt-3"><small>Instagram</small></label>
                        <div class="md-form mt-0">
                            <?= $this->Form->control('instagram', ['class' => 'form-control']) ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <?= $this->Form->button('<i class="fa fa-edit"></i> 基本プロフィール編集', [
                                'type'   => 'submit',
                                'class'  => 'btn btn-success btn-block',
                                'escape' => false,
                            ])
                        ?>
                    </div>
                </div>
            </div><!-- /.card-body -->
        </div><!-- /.card -->
    </div><!-- /.col-lg-8 -->
</div><!-- /.row -->
<?= $this->Form->end() ?>
